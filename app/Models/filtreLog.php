<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filtreLog extends Model
{
    protected $table = 'filtreLog';
    protected $fillable = [
        'cami_adi',
        'il_adi',
        'ilce_adi'
    ];
}
