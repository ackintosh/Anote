<?php
namespace Anote\Library;
use Anote\Library\Request\Get;
use Anote\Library\Request\Post;

class Request
{
    private $get;
    private $post;

    public function __construct()
    {
        $this->get =  new Get($_GET);
        $this->post = new Post($_POST);
    }

    /**
     * @throws \InvalidArgumentException
     */
    public function __get($name)
    {
        switch ($name) {
        case 'get':
            return $this->get;
            break;
        case 'post':
            return $this->post;
            break;
        default:
            throw new \InvalidArgumentException();
            break;
        }
    }
}

