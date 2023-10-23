<?php

namespace Modules\Misc\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
