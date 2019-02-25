<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Mrgoon\AliSms\AliSms;

class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $phone;
    public $code;
    public $param;


    /**
     * SendSms constructor.
     * @param string $phone
     * @param string $code
     * @param array $param
     */
    public function __construct($phone,$code,$param=['code'=>1234])
    {
        $this->phone = $phone;
        $this->code = $code;
        $this->param = $param;


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(\App\Service\SendSms $sendSms)
    {

       $res =  $sendSms->sendmsg( $this->phone,
        $this->code ,
        $this->param);
       Log::debug('send-msg-result::',$res);

    }
}
