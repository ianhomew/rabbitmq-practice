<?php

namespace App\Http\Controllers;

use App\Jobs\ProducerConsumerQueue;
use App\Jobs\RabbitTestQueue;
use App\Jobs\SendEmailQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\QueueManager;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Queue;

class SimpleRabbitMQController extends Controller
{
    /**
     * For queue test
     * Command:
     * 1. php artisan rabbitmq:consume
     *    如果開兩個 php artisan rabbitmq:consume 可以更快
     * 2. php artisan queue:work
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
     * Command:
     * 1. php artisan rabbitmq:consume --queue=sendEmailQueue
     * 2. php artisan queue:work --queue=sendEmailQueue
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

    /**
     * rabbitmq 發布訂閱
     * 單純的傳文字
     *
     * @param QueueManager $queueManager
     * @return \Illuminate\Http\JsonResponse
     */
    public function producerSimple(QueueManager $queueManager)
    {
        $queueManager->setDefaultDriver('rabbitmqProducerAndConsumer');

        $faker = Faker::create();
        $text = $faker->userName;
        $queueManager->pushRaw($text);

        return response()->json(['code' => 0, 'msg' => "success", 'res' => $text]);
    }

    /**
     * rabbitmq 發布訂閱
     *
     * @param QueueManager $queueManager
     */
    public function consumerSimple(QueueManager $queueManager)
    {
        $queueManager->setDefaultDriver('rabbitmqProducerAndConsumer');
        $consumer = $queueManager->pop();
        $data = $consumer->getRawBody();
        $consumer->delete();
        dd($data);
    }


    /**
     * rabbitmq 發布訂閱
     * 也可以傳整個物件進去 但是要先做 serialize
     *
     * @param QueueManager $queueManager
     * @return \Illuminate\Http\JsonResponse
     */
    public function producer(QueueManager $queueManager)
    {
        $queueManager->setDefaultDriver('rabbitmqProducerAndConsumer');

        $faker = Faker::create();
        $text = $faker->userName;
        $job = new ProducerConsumerQueue($text);
        $queueManager->pushRaw(serialize($job));

        return response()->json(['code' => 0, 'msg' => "success", 'res' => $text]);
    }

    /**
     * rabbitmq 發布訂閱
     *
     * @param QueueManager $queueManager
     */
    public function consumer(QueueManager $queueManager)
    {
        $queueManager->setDefaultDriver('rabbitmqProducerAndConsumer');
        $consumer = $queueManager->pop();
        $data = $consumer->getRawBody();
        $job = unserialize($data);

        if ($job instanceof ProducerConsumerQueue) {
            $job->handle();
        }

        $consumer->delete();
        dd($job, $consumer);
    }
}
