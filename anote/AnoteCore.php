<?php
namespace anote;

/**
 * Anote Core
 * @package Core
 */

class AnoteCore
{
	public function __construct($request)
	{
		$this->viewer = new library\Viewer();
		$this->request = $request;
	}

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
	 * A function for 404 error page.
	 * @anoteLayout(default)
	 */
	public function anote404()
	{
		header('HTTP/1.0 404 Not Found');
	}

	/**
	 * @anoteURL(/test.html)
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