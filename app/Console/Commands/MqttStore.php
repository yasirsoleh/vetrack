<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Salman\Mqtt\Facades\Mqtt;
use App\Http\Controllers\DetectionController;
use App\Models\Camera;

class MqttStore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mqtt:store';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscribe to mqtt topics then store it to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $mqtt_topic = Camera::pluck('mqtt_topic');
        if ($mqtt_topic->isEmpty()) {
            $this->subscribeToTopic("detection");
        }elseif ($mqtt_topic->count()==1) {
            $this->subscribeToTopic($mqtt_topic->pop());
        }else{
            $this->subscribeToTopic($mqtt_topic->toArray());
        }
    }

    public function subscribeToTopic($topic)
    {
        Mqtt::ConnectAndSubscribe($topic, function($topic, $msg){
            echo "Msg Received: \n";
            echo "Topic: {$topic}\n\n";
            echo "\t$msg\n\n";
            $data = json_decode($msg);
            $detection = new DetectionController();
            $detection->store_from_mqtt($topic, $data);
        });
    }
}
