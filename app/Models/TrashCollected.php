<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrashCollected extends Model
{
    protected $table = 'trash_collected';
    protected $primaryKey = 'collection_id';
    protected $fillable = [
        'trash_binnie_id',
        'weightRecorded',
    ];
}
