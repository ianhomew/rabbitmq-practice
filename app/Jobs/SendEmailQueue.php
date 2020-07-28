<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\SendEmailQueue as SendEmailQueueModel;

class SendEmailQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $sendTo;
    private $content;

    /**
     * Create a new job instance.
     *
     * @param string $sendTo
     * @param string $content
     */
    public function __construct(string $sendTo, string $content)
    {
        $this->sendTo = $sendTo;
        $this->content = $content;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep(1);
        SendEmailQueueModel::create([
            'send_to' => $this->sendTo,
            'content' => $this->content,
        ]);

        echo PHP_EOL;
        echo json_encode(['code' => 200, 'msg' => "Send to: $this->sendTo, content: $this->content"], JSON_PRETTY_PRINT);
    }
}
