<?php

namespace App\Http\Controllers\Api;


use App\Jobs\SendSms as SmsQueue;
use App\Service\SendSms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mrgoon\AliSms\AliSms;
use App\Jobs\ProcessPodcast;

class SendmsgController extends Controller
{
    public function sendmsg(Request $request)
    {



        $phone = '15964366508';
        $SMS_code = 'SMS_150571944';
        $code = rand(10000,99999);
        //入队
        SmsQueue::dispatch(new SendSms($phone,$SMS_code,$param=['code'=>$code]));


    }

}
