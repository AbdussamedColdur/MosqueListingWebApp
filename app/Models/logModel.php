<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logModel extends Model
{
    protected $table = 'log_activity';
    protected $fillable = [
        'ip_address',
        'url',
        'islemTürü',
        'platform',
        'device',
        'browser'
    ];
}
