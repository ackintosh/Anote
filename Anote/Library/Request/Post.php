<?php
namespace Anote\Library\Request;
use Anote\Library\Exception\ChangingRequestException;
/**
 * Post
 * @package Request
 */

class Post
{
    private $values;

    public function __construct($post)
    {
        $this->values = $post;
    }

    public function __get($key)
    {
        return $this->values[$key];
    }

    public function __set($key, $value)
    {
        throw new ChangingRequestException('POST value is immutable.');
    }
}
