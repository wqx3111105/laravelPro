<?php

namespace App\Http\Controllers;


use App\Events\LoginEvent;
use App\Jobs\LoginRemind;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;

class webController extends Controller
{

    public function index(){
        $v = 'name'.date('i',time());
        $v1 = 'name1'.date('i',time());
        $job = 'job'.date('i',time());
        $job_1 = 'job_2017';
        $message = 'message_'.time();
        //event(new LoginEvent($v));
        $channel ='channel';
        $channel1 ='channel-1';

        Event::fire(new LoginEvent($v, $channel));
        Event::fire(new LoginEvent($v1, $channel1));
        echo 'name'.date('i',time());

        $values  = Redis::set('name_user', '1');
        var_dump($values);


        $job_name = (new LoginRemind($job_1))
            ->delay(Carbon::now()->addMinutes(2));

        dispatch(new LoginRemind($job));
        dispatch($job_name);


        $data = [
            'aNewMessage',
            'data'=>[
                'name'=>'test-name'
            ]
        ];

        //Redis::publish('message',json_encode($data));
        echo $job;
    }

    public function webIndex()
    {
        return view('socket');
    }
    public function webIndex1()
    {
        return view('socket1');
    }
}
