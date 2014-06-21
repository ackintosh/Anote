<?php
namespace Anote\Library\Request;
use Anote\Library\Exception\ChangingRequestException;
/**
 * Get
 * @package Request
 */

class Get
{
    private $values;

    public function __construct($get)
    {
        $this->values = $get;
    }

    public function __get($key)
    {
        if (isset($this->values[$key])) {
            return $this->values[$key];
        }

        return null;
    }

    public function __set($key, $value)
    {
        throw new ChangingRequestException('GET value is immutable.');
    }
}
