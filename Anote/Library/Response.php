<?php
namespace Anote\Library;
/**
 * Response
 * @package Library
 */

class Response
{
    /**
     * @codeCoverageIgnore
     */
    public function notFound()
    {
        header('HTTP/1.0 404 Not Found');
    }
}
