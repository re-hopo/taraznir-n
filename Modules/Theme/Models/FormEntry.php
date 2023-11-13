<?php

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Model;

class FormEntry extends Model
{

    protected $table = 'forms_entries';

    protected $fillable = [
        'form_id',
        'user_id'
    ];
}
