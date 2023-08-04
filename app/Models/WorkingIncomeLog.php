<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingIncomeLog extends Model
{

    use HasFactory;
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'referal_amount',
        'referal_hierarchy_ids',
        'level_no',
        'user_plan_id'
    ];

    public function fromUserInfo()
    {
        return $this->belongsTo(User::class,'from_user_id','id');
    }
     public function fromUser()
    {
        return $this->belongsTo(User::class,'from_user_id','id');
    }
}
