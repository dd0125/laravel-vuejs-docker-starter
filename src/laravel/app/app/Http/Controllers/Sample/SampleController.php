<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;
use Cache;
use Memcached;

class SampleController extends Controller
{
    public function hello(){
        echo "Hello SampleController";
    }

    public function cache() {
        $value = Cache::get('sample', 0);
        $value = $value + 1;
        echo "Hello Cache = $value";
        Cache::put('sample', $value);
    }

    public function memcached() {
        $mc = new Memcached();
        $mc->addServer("memcached", 11211);
        $value = $mc->get("sample_memcached");
        $value = $value + 1;
        echo "Hello Memcached = $value";
        $mc->set("sample_memcached", $value);
    }
}
