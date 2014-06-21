<?php
namespace Anote\Library;
use Anote\Library\Dispatcher;
use Anote\Library\Request;
use Anote\Library\Response;

/**
 * FrontController
 * @package Library
 */

class FrontController
{
    public static function run($environment)
    {
        self::init();
        Dispatcher::boot($environment, new Request, new Response);
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
