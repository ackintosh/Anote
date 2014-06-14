<?php
namespace Anote\Library;
/**
 * FrontController
 * @package Library
 */

class FrontController
{
    public static function act($environment, $request)
    {
        self::init();
        (new Dispatcher($environment, $request))->boot();
    }

    private static function init()
    {
        ini_set('default_charset', 'utf-8');
        ini_set('mbstring.script_encoding', 'utf-8');
        ini_set('mbstring.internal_encoding', 'utf-8');
        ini_set('mbstring.substitute_character', '?');
        ini_set('mbstring.http_input' , 'pass');
        ini_set('mbstring.http_output' , 'pass');

        header_register_callback(function(){
            foreach (headers_list() as $header) {
                if (strpos($header, 'X-Powered-By:') !== false) header_remove('X-Powered-By');
            }
        });
    }
}
