#Anote  

[![Build Status](https://secure.travis-ci.org/ackintosh/Anote.png?branch=master)](http://travis-ci.org/ackintosh/Anote)  
[![Coverage
Status](https://coveralls.io/repos/ackintosh/Anote/badge.png?branch=refact)](https://coveralls.io/r/ackintosh/Anote?branch=master)

=====

Anote(アノート)  
PHPで作ったWebアプリケーションフレームワークです。  
アノテーションを使って何かやりたいと思ったのと、フレームワークの習作を兼ねて作りはじめました。  
シンプルなフレームワークを目指しています。

#ライセンス
GPL v3  

#動作環境
PHP5.4以上  

#概要
コントローラはAnoteCoreクラスだけです。
各メソッドのアノテーションを使って、簡単なルーティングを定義します。

AnoteCore.php 

    /**
     * @anoteURL(/test)
     * @anoteLayout(default)
     */
    public function hoge()
    {
        $this->viewer->h1 = 'my test';
        $this->viewer->content = 'Hello, Anote !!';
    }

上記の場合、http://example.com/test にアクセスしたときに  

* コントローラ
AnoteCore::hoge()  
* レイアウト
anote/view/layout/default.php  
* テンプレート
anote/view/test.php  
  
が実行されます。  
#メモ書き
- twitter bootstrap v2.0.4 を使用しています。
- mod_headersが有効な場合、リクエストを受け取った時刻とヘッダを送り出した時間との差を  
X-Runtimeヘッダとして送出します。(単位：マイクロ秒)  
[http://httpd.apache.org/docs/2.2/ja/mod/mod_headers.html](http://httpd.apache.org/docs/2.2/ja/mod/mod_headers.html)
- PHP5.4以上の環境では、X-Powered-Byヘッダを送出しません。
- ORMライブラリとしてphp-activerecord v1.0 を使用しています。  
[http://www.phpactiverecord.org/](http://www.phpactiverecord.org/)  
AnoteCore.php で下記のように利用してください。  
    $user = \User::find(1);
- YAMLパーサーとしてspyc v0.4.5を使用しています。  
[https://github.com/tekimaki/spyc](https://github.com/tekimaki/spyc)
