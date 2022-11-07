<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\State;
use App\Models\User;
use App\Models\UserDetails;
use App\Http\Livewire\Customer;
use App\Http\Livewire\CustomerUpdate;
use App\Http\Controllers\admin\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Home
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('sigup', function () {
    $title = array(
        'active' => 'signup',
    );
    return view('home.signup', compact('title'));
})->name('signup');

Route::get('signup-customers', function () {
    $title = array(
        'active' => 'signup-customers',
    );
    $states = State::all();
    return view('auth.register-customer', compact('title', 'states'));
})->name('signup-customers');

Route::get('signup-cleaner', function () {
    $title = array(
        'active' => 'signup-cleaner',
    );
    $states = State::all();
    return view('auth.register-cleaner', compact('title', 'states'));
})->name('signup-cleaner');


Route::middleware(['auth', 'verified'])->group(function () {
    //admin

    Route::get('/admin-customer', function () {
        $title = array(
            'active' => 'admin-account',
        );
        return view('admin.dashboard');
    })->name('admin-customer');


    //cleaner
    Route::get('/admin-cleaner', function () {
        $title = array(
            'active' => 'admin-cleaner',
        );
        return view('admin.cleaner');
    })->name('admin-cleaner');

  //Cleaner Update
    Route::get('/update-cleaner/{id}', function () {
        $title = array(
            'active' => 'admin-account',
        );
       return view('admin.cleaner-edit', ["id" => request()->id]);
    })->name('update-cleaner');



    //Customer
    Route::get('/update-account/{id}', function () {
        $title = array(
            'active' => 'admin-account',
        );

       return view('admin.customer-edit', ["id" => request()->id]);

        return view('admin.customer-edit');

    })->name('customer-update');

});

// 
Route::middleware(['auth', 'verified'])->group(function () {
    //customer
    Route::prefix('customer')->group(function () {



        Route::get('-account', function () {
            $title = array(
                'active' => 'customer-account',
            );
            return view('customer.account', compact('title'));
        })->name('customer-account');
    });

    //cleaner
    Route::prefix('cleaner')->group(function () {
        Route::get('/account', function () {
            $title = array(
                'title' => 'Account',
                'active' => 'account',
            );
            return view('cleaner.account', compact('title'));
        })->name('cleaner.account');

        Route::get('/team', function () {
            $title = array(
                'title' => 'Team',
                'active' => 'team',
            );
            return view('cleaner.team', compact('title'));
        })->name('cleaner.team');
    });
});
