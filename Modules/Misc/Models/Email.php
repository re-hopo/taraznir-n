<?php

namespace Modules\Misc\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Email extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'email',
        'code',
        'type',
        'sent_count',
        'last_sent',
        'verified'
    ];

    protected $table = 'email';



}
