<?php
namespace Anote;
use Anote\Library\Core;
/**
 * Anote Core
 * @package Core
 */

class AnoteCore extends Core
{
    /**
     * A function for TOP page
     * @anoteURL(/index)
     * @anoteLayout(default)
     */
    public function index()
    {
        $this->viewer->h1 = 'PHP Framework';
        $this->viewer->content = 'Hello, Anote !';
    }

    /**
     * @anoteURL(/test)
     * @anoteLayout(default)
     */
    public function test()
    {
        $this->viewer->h1 = 'my test';
        $this->viewer->content = 'Hello, Anote !!';
    }

    /**
     * @anoteURL(/hoge/ほげ)
     * @anoteLayout(default)
     */
    public function hoge()
    {
        $this->viewer->h1 = 'my hoge';
        $this->viewer->content = 'Hello, Anote !!!';
    }
}
