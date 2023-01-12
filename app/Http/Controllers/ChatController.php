<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageEvent;
use App\Events\MessageCount;

use App\Models\User;
use App\Models\Order;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;

use DB;

class ChatController extends Controller
{
    //
    public function index()
    {
        $title = array(
            'title' => 'Messages',
            'active' => 'messages'
        );
        return view('chat', compact('title'));
    }

    public function fetchUsers(Request $request)
    {
        $user = auth()->user();

        if(@$request->user){
            $usersArray = array($request->user);
        }
        else {
            /*$sender = Message::where('sender_id', $user->id)->select('rec_id')->groupBY('rec_id')->get()->toArray();
            $rec = Message::where('rec_id', $user->id)->select('sender_id')->groupBY('sender_id')->get()->toArray();
            $usersArray = array_merge($sender, $rec);*/

            if($user->role=='cleaner'){
                $usersArray = Order::where('cleaner_id', $user->id)->pluck('user_id')->toArray();
            }

            if($user->role=='customer'){
               $usersArray =  Order::where('user_id', $user->id)->pluck('cleaner_id')->toArray();
            }
        }
        
        
        $usersArray = array_unique($usersArray);

        $users_list = User::whereIn('id', $usersArray)
                    //->whereStatus('1')
                    ->get();


        foreach ($users_list as $list) {
            $unread = Message::where('sender_id', $list->id)
                ->where('rec_id', $user->id)
                ->where('read', '0')
                ->count();

            $list->unread = $unread;
        }


        $data = array(
            'listUsers' => $users_list,
            'currentUser' => $user,
        );


        return json_encode($data);
    }

    //...
    public function fetchMessages(Request $request)
    {
        $sender_id = auth()->user()->id;
        $receiver = User::find($request->rec_id);

        $rec_id = $receiver->id;

        $msg_list = Message::where(function ($query) use ($sender_id, $rec_id) {
            $query->where('sender_id', $sender_id);
            $query->orWhere('sender_id', $rec_id);
        })
            ->where(function ($query) use ($sender_id, $rec_id) {
                $query->where('rec_id', $sender_id);
                $query->orWhere('rec_id', $rec_id);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        Message::where('rec_id', $sender_id)->where('read', '0')->update(['read' => '1']);

        $data = array(
            'msg_list' => $msg_list,
            'receiverUser' => $receiver,
        );

        return json_encode($data);
    }

    public function sendMessage(Request $request)
    {
        $user = auth()->user();

        $m = new Message();
        $m->sender_id = $user->id;
        $m->rec_id = $request->rec_id;
        $m->message = $request->message;
        $m->files = json_encode($request->files_attached);
        $m->save();


        //....
        $messageCount = Message::where('rec_id', $request->rec_id)
            ->where('read', '0')
            ->count();


        $created_at = date('Y-m-d H:i:s', strtotime($request->created_at));

        //broadcasting message
        event(new MessageEvent($user->id, $request->rec_id, $request->message, $request->files_attached, $created_at));

        //broadcast(new MessageCount($request->rec_id, $messageCount));
        event(new MessageCount($request->rec_id, $messageCount));


        return ['success' => 'msg sent'];
    }


    public function fileUpload(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'files' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,csv,docx,xlsx,mov|max:2048'
            ]
        );

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "message" => "Validation error", "errors" => $validator->errors()]);
        }


        if ($request->hasFile('files')) {

            $path = 'uploads/files/';
            if (!is_dir($path)) {
                mkdir($path, 0775, true);
                chown($path, exec('whoami'));
            }

            $file = $request->file('files');


            $mime = $file->getClientMimeType();

            $filename = auth()->user()->id . '-' . uniqid(time()) . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/files/', $filename);

            $checkMime = explode('/', $mime);

            return json_encode(['name' => $filename, 'mime' => $mime, 'is_image' => ($checkMime[0] == 'image' ? true : false)]);
        }
    }
}
