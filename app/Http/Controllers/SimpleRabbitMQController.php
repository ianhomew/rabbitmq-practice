<?php

namespace App\Http\Controllers;

use App\Jobs\RabbitTestQueue;
use App\Jobs\SendEmailQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\QueueManager;
use Faker\Factory as Faker;

class SimpleRabbitMQController extends Controller
{
    /**
     * For queue test
     * Command: php artisan rabbitmq:consume
     * 如果開兩個 php artisan rabbitmq:consume 可以更快
     *
     * @param QueueManager $queueManager
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function index(QueueManager $queueManager)
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

    /**
     * Command: php artisan rabbitmq:consume --queue=sendEmailQueue
     *
     * @param QueueManager $queueManager
     * @return \Illuminate\Http\JsonResponse
     */
    public function useQueueManager(QueueManager $queueManager)
    {
        // use queue manager to change the rabbitmq connection
        $queueManager->setDefaultDriver('rabbitmqSendEmailQueue');
        $res = [];
        for ($i = 0; $i < 20; $i++) {
            $faker = Faker::create();
            $sendTo = $faker->email;
            $content = 'I am from ' . $faker->country;
            $res[] = $queueManager->push(new SendEmailQueue($sendTo, $content));
        }

        return response()->json(['code' => 0, 'msg' => "success", 'res' => $res]);
    }
}
