<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WasteItem extends Model
{
    protected $table = 'waste_item';
    protected $primaryKey = 'item_id';

    protected $fillable = [
        'binnie_id',
        'category_id',
    ];
}
