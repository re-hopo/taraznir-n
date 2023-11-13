<?php

namespace Modules\Theme\Models;

use Illuminate\Database\Eloquent\Model;

class FormEntryMeta extends Model
{
    protected $table = 'form_entries_meta';

    protected $fillable = [
        'key',
        'value',
        'form_id',
        'metaable_id',
        'metaable_type',
    ];

}
