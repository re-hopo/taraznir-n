<?php

namespace Modules\Misc\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meta extends Model
{

    protected $fillable = [
        'key',
        'value',
    ];

    protected  $table = 'meta';
    public $timestamps = false;

}
