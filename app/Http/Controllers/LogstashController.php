<?php

namespace App\Http\Controllers;

use App\Jobs\ProducerConsumerQueue;
use App\Jobs\RabbitTestQueue;
use App\Jobs\SendEmailQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\QueueManager;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;

class LogstashController extends Controller
{
    public function index()
    {
        Log::channel('logstash')->info('Hello logstash!');
        Log::channel('daily')->info('Hello daily!');



        echo 'done';
    }
}
