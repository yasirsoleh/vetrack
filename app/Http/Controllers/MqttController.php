<?php

namespace App\Http\Controllers;

use Salman\Mqtt\Facades\Mqtt;

class MqttController extends Controller
{
    public function subscribeToTopic($topic)
    {
        Mqtt::ConnectAndSubscribe($topic, function($topic, $msg){
            echo "Msg Received: \n";
            echo "Topic: {$topic}\n\n";
            echo "\t$msg\n\n";
            $data = json_decode($msg);
            dd($data);
        });
        
    }
}
