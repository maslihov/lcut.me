<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    use HasFactory;
    private const LINK_ID_LENGTH = 7;
    public const VALID_FULL_URL = 'bail|url|size:2000';
    
    public static function new($full_url)
    {
        
        $link_id = self::randCharStr(self::LINK_ID_LENGTH);
        
        $link = new static;
        $link->full_url = $full_url;
        $link->link_id = $link_id;
        $link->save();
        
        return $link_id;
    }
    
    private static function randCharStr($len)
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyz'.
                 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $len_chars = strlen($chars);
        $out = '';
        for($i = 0; $i != $len; $i++){
            $out .= $chars[random_int(0, $len_chars - 1)];
        }
        return $out;
    }
}
