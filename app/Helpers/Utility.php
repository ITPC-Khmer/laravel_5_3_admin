<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;

class Utility
{
    public static function translate($txt)
    {
        $lang = strtolower($txt);
        $lang = trim($lang);
        while (strpos($lang, '  ') !== false) {
            $lang = str_replace('  ', ' ', $lang);
        }

        while (strpos($lang, ' ') !== false) {
            $lang = str_replace(' ', '-', $lang);
        }
        $lang = str_replace("'", "''", $lang);
        
        return strtolower($lang);
    }
}