<?php

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
