<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jsonLogModel extends Model
{
    protected $table = 'json_log';
    protected $fillable = [
        'log_mesajı'
    ];
}
