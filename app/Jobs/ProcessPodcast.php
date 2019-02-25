<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Mrgoon\AliSms\AliSms;

class ProcessPodcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $phone;
    protected $SMS_code;
    protected $code;
    /**
       * Create a new job instance.
     *
     * @return void
     */
    public function __construct($phone,$SMS_code,$code)
    {
        $this->phone = $phone;
        $this->SMS_code = $SMS_code;
        $this->code = $code;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        log::info($this->phone."+".$this->SMS_code."+".$this->code);

        $aliSms = new AliSms();
        $aa = $aliSms->sendSms($this->phone, $this->SMS_code, ['code'=> $this->code]);

//        return $response;


    }
}
