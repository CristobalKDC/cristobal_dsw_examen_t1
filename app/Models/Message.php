<?php

namespace App\Models;

use App\Models\Message;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'text',
        'subrayado',
        'negrita',
        'img_path'
    ];
}
