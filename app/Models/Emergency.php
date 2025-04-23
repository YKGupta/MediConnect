<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emergency extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'location',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
