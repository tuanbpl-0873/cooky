<?php

namespace App\Helpers;

use Session;
use Auth;
use App;
use Storage;

class Helper
{
    public static function getCurrentLanguage()
    {
        return Session::get('language', config('app.locale'));
    }

    public static function setLanguage($lang = 'vi')
    {
        Session::put('language', $lang);
    }

    public static function setLocaleLanguage()
    {
        $language = self::getCurrentLanguage();
        switch ($language) {
            case 'en':
                $language = 'en';
                break;
            
            default:
                $language = 'vi';
                break;
        }
        App::setLocale($language);
    }

    public static function getContentFile($file)
    {
        return file_get_contents($file->getRealPath());
    }

    public static function putImageToUploadsFolder($fileName, $file)
    {
        $fileContent = self::getContentFile($file);
        
        Storage::disk('public_uploads')->put($fileName, $fileContent);
    }
}
