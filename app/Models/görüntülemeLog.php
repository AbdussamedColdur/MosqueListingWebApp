<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class görüntülemeLog extends Model
{
    protected $table = 'görüntüleme_log';
    protected $fillable = [
        'cami_adi',
        'görüntüleme_sayisi'
    ];
}
