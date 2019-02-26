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
    public function __construct($phone,$code,$param)
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

//        throw new \Exception('回调异常!'.$this->phone.
//        $this->code);

        $res =  $sendSms->sendmsg(
            $this->phone,
            $this->code ,
            $this->param
        );
        if($res->Message=='OK'){
            //发送成功可做 成功后的逻辑处理   入库 改状态等
            Log::debug('send-msg-result:: success',[$this->phone, $this->code , $this->param]);
        }else{
            //抛出异常
            // php artisan queue:work   --tries=3   代表尝试三次就不再尝试 直接入库  ->failed_jobs
            throw new \Exception('短信发送异常!'.$this->phone. $this->code);
        }


    }
}
