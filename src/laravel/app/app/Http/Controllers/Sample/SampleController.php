<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;
use Cache;
use Illuminate\Http\Request;
use Session;
use Memcached;
use DB;
use Cookie;

class SampleController extends Controller
{
    /**
     * 表示されるとルーティングできている
     */
    public function hello(){
        echo "Hello SampleController.";
    }

    public function phpinfo() {
        phpinfo();
    }

    /**
     * 表示されると環境編集が取得できている
     */
    public function env(Request $request) {
        echo "Hello env; ";
        echo "APP_NAME = " . env("APP_NAME") . "; ";
        echo "DB_USERNAME = " . env("DB_USERNAME") . "; ";
        echo "TZ = " . env("TZ") . "; ";
    }

    /**
     * 表示されるとCacheと接続できている
     */
    public function cache(Request $request) {
        $value = Cache::get('sample', 0);
        $value = $value + 1;
        echo "Hello Cache = $value";
        Cache::put('sample', $value);
    }

    /**
     * 表示されるとMemcachedと接続できている
     */
    public function memcached(Request $request) {
        $mc = new Memcached();
        $mc->addServer("memcached", env("MEMCACHED_PORT"));
        $value = $mc->get("sample_memcached");
        $value = $value + 1;
        echo "Hello Memcached = $value";
        $mc->set("sample_memcached", $value);
    }

    /**
     * 表示されるとデータベースと接続できている
     */
    public function db(Request $request){
        $simpleNumber = DB::select('select 123+200');
        var_dump($simpleNumber);
        echo "<br />";
        $databases = DB::select('show databases');
        var_dump($databases);
        echo "<br />";
    }

    public function user(Request $request) {
        $userId = $request->session()->get('user_id');
        echo "session user id = $userId";
    }


    public function login(Request $request) {
        setcookie("setcookie_key", "value", strtotime("+1 hour"), '/', false);
//        setcookie("SESSID", "value3111", strtotime("+1 hour"), '/', false);
//        setcookie(
//            'setcookie_cookiename',
//            'cookievalue1',
//            strtotime("+1 hour"),
//            '/',
//            null
//        );
//        setcookie(
//            'setcookie_cookiename22',
//            'cookievalue1222',
//            strtotime("+1 hour"),
//            '/',
//            null,
//            false,
//            false
//        );

//        $session_id = session()->getId();
//        echo "session id = " . $session_id;

//        $number = session()->get("sample");
//        $number = $number + 1;
//        echo "<br>session number = " . $number . "<br>";
//        session()->put("sample", $number);

        // string $name, string $value = null, $expire = 0, ?string $path = '/', string $domain = null,
        // ?bool $secure = false, bool $httpOnly = true, bool $raw = false, string $sameSite = null
        $response = response('sss');
        $c = Cookie::make('coo1', 'val11', strtotime("+1 hour"), '/', null, false, false);
        var_dump($c);
        Cookie::queue($c);
        $response->headers->setCookie($c);
        $response->send();


        $cookie = Cookie::queue(Cookie::make('CookieName111', 'CookieValue111', strtotime("+1 hour"), '/', false));

        $paramUserId = $request->get('user_id');
        $request->session()->put('user_id', $paramUserId);

        $userId = $request->session()->get('user_id');
        echo "session login user id = $userId";
//        Symfony\Component\HttpFoundation\c

        Cookie::queue(Cookie::make('name2', 'value2', 6000));


        return $response;
    }
}
