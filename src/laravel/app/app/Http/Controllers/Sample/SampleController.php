<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;
use Cache;
use Memcached;
use DB;


class SampleController extends Controller
{
    /**
     * 表示されるとルーティングできている
     */
    public function hello(){
        echo "Hello SampleController.";
    }

    /**
     * 表示されると環境編集が取得できている
     */
    public function env() {
        echo "Hello env; ";
        echo "APP_NAME = " . env("APP_NAME") . "; ";
        echo "DB_USERNAME = " . env("DB_USERNAME") . "; ";
        echo "TZ = " . env("TZ") . "; ";
    }

    /**
     * 表示されるとCacheと接続できている
     */
    public function cache() {
        $value = Cache::get('sample', 0);
        $value = $value + 1;
        echo "Hello Cache = $value";
        Cache::put('sample', $value);
    }

    /**
     * 表示されるとMemcachedと接続できている
     */
    public function memcached() {
        $mc = new Memcached();
        $mc->addServer("memcached", 11211);
        $value = $mc->get("sample_memcached");
        $value = $value + 1;
        echo "Hello Memcached = $value";
        $mc->set("sample_memcached", $value);
    }

    /**
     * 表示されるとデータベースと接続できている
     */
    public function db(){
        $simpleNumber = DB::select('select 123+200');
        var_dump($simpleNumber);
        echo "<br />";
        $databases = DB::select('show databases');
        var_dump($databases);
        echo "<br />";
    }
}
