<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clicks extends Model
{
    use HasFactory;
    public static function click($id) 
    {
        $click = new static;
        $click->link_id = $id;
        $click->save();
    }
}
