<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;
use App\Events\Notify;

class PusherNotificationController extends Controller
{
    public function notification($str = 'Hello Devops New Data')
    {
        $options = array(
            'cluster' => 'ap2',
            'encrypted' => true
        );
        // print_r(env('PUSHER_APP_KEY'));die;
        $pusher = new Pusher( '58813031c0a48ad19efc', '9169ce425e46c55bd2ae','1476697', $options );

        $message = $str;
        $pusher->trigger('PrivateChannel','Notify', $message);
    }

    public function sendNotification(){
        //Remember to change this with your cluster name.
        $options = array(
            'cluster' => 'ap2',
            'encrypted' => true
        );

        //Remember to set your credentials below.
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID')
            , $options
        );

        $message= "Hello Cloudways";

        //Send a message to notify channel with an event name of notify-event
        $pusher->trigger('notify-channel', 'App\\Events\\Notify', $message);
    }
}
