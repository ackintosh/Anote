<?php
namespace Anote\Library\Request;
use Anote\Library\Exception\ChangingRequestException;
/**
 * Get
 * @package Request
 */

class Get
{
    private $values = array();

    public function __construct($get)
    {
        $this->values = $get;
    }

    public function __get($key)
    {
        return $this->values[$key];
    }

    public function __set($key, $value)
    {
        throw new ChangingRequestException('GET value is immutable.');
    }
}
