<?php

namespace App\Http\Controllers;

use App\Jobs\RabbitTestQueue;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * For queue test
     * Command: php artisan rabbitmq:consume
     * 如果開兩個 php artisan rabbitmq:consume 可以更快
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function index()
    {
        // 這邊是異步的 讚
        for ($i = 0; $i < 20; $i++) {
            $post = new \stdClass();
            $post->title = "title $i";
            $post->author_id = random_int(1, 999);
            $post->content = "content $i";
            $post->description = "descriptions $i";

            $this->dispatch(new RabbitTestQueue($post));
        }

        return response()->json(['code' => 0, 'msg' => "success"]);
    }
}
