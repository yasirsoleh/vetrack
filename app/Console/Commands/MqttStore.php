<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Salman\Mqtt\Facades\Mqtt;
use App\Http\Controllers\DetectionController;

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
        //$camera = Camera::pluck('mqtt_topic');
        //$this->subscribeToTopic($camera);
        $this->subscribeToTopic(['werk','detection']);
    }

    public function subscribeToTopic($topic)
    {
        Mqtt::ConnectAndSubscribe($topic, function($topic, $msg){
            echo "Msg Received: \n";
            echo "Topic: {$topic}\n\n";
            echo "\t$msg\n\n";
            $data = json_decode($msg);
            $detection = new DetectionController();
            $detection->store_from_mqtt($data);
        });
    }
}
