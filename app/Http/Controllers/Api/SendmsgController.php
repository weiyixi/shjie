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



        $phone = '18663582623';
        $SMS_code = '';
        $code = rand(10000,99999);
        //入队
        $this->dispatch(new SmsQueue($phone,$SMS_code,$param=['code'=>$code]));
echo  111;die;

    }

}
