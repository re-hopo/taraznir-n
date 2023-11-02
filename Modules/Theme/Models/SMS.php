<?php

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'mobile',
        'code',
        'type',
        'sent_count',
        'last_sent',
        'verified'
    ];

    protected $table = 'sms';



}
