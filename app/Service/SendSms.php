<?php

namespace App\Service;


use Mrgoon\AliSms\AliSms;

class SendSms
{
    public $phone;
    public $code;
    public $param;
    private $aliSms=null;

    /**
     * SendSms constructor.
     * @param string $phone
     * @param string $code
     * @param array $param
     */
    public function __construct($phone='15964366508',$code='SMS_150571944',$param=['code'=>1234])
    {
        $this->phone = $phone;
        $this->code = $code;
        $this->param = $param;
        $this->aliSms = new AliSms();


    }

    /**
     * @return mixed|\SimpleXMLElement
     */
    public function sendmsg()
    {
        return $this->aliSms->sendSms($this->phone, $this->code,$this->param );

    }

}
