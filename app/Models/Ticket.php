<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
     protected $fillable = [
        'user_id',
        'title',
        'message',
        'status'
    ];

    public function userInfo()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
