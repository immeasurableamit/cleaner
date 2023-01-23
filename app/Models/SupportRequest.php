<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'issue_type',
        'requested_resolution_type',
        'explanation_for_other_type',
        'description',
        'issue',
        'requested_resolution',
        'user_id',
    ];

    public static function issuesForCleaner()
    {
        return [
            'abusive' => 'Report Customer - Abusive',
            'not_matched_quote' => 'Report Customer - Home did not match quote',
            'other' => 'Other'
        ];
    }

    public static function resolutionsForCleaner()
    {
        return [
            'block_customer' => 'Block Customer from my account',
            'other' => 'Other',
        ];
    }

    public static function issuesForUser()
    {
        return [
            'not_satisfied' => 'Job not done Satisfactory',
            'job_not_started' => 'Job wasn’t Started',
            'report_provider' => 'Report Provider (explain in notes)',
            'other' => 'Other'
        ];
    }

    public static function resolutionsForUser()
    {
        return [
            'correct_issue' => 'Give cleaner chance to correct the issue',
            'block_cleaner' => 'Remove future cleanings with cleaner',
            'refund'         => 'Request refund',
            'other' => 'Other',
        ];
    }


public function order()
{
    return $this->belongsTo(Order::class, 'order_id','id');
}


public function user()
{
    return $this->belongsTo(User::class, 'user_id','id');
}

}
