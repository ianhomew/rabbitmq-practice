<?php

namespace App\Jobs;

use App\ProducerConsumer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProducerConsumerQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $producerName;

    /**
     * Create a new job instance.
     *
     * @param string $producerName
     */
    public function __construct(string $producerName)
    {
        $this->producerName = $producerName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ProducerConsumer::create([
            'data' => $this->producerName,
        ]);
        echo $this->producerName;
    }

}
