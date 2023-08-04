<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalHistory extends Model
{
    use HasFactory;
     protected $fillable = [
        'user_id',
        'quantity',
        'withdraw_type',
        'status',
        'withdrawal_in'
    ];
    public function userInfo()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}