<?php

namespace App\Jobs;

use App\Posts;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RabbitTestQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;

    /**
     * Queue constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep(3);
        try {
            $insert = [
                'title' => $this->data->title,
                'author_id' => $this->data->author_id,
                'content' => $this->data->content,
                'description' => $this->data->description,
            ];
            $result = Posts::create($insert);
            echo json_encode(['code' => 200, 'msg' => $result], JSON_PRETTY_PRINT);
        } catch (\Exception $exception) {
            echo json_encode(['code' => 0, 'msg' => $exception->getMessage()], JSON_PRETTY_PRINT);
        }
    }
}
