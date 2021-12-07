<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;
    public $otp;

    public function __construct($otp)
    {
        return $this->otp = $otp;
    }

    public function build(): OtpMail
    {
        // from برای چه کسی ایمیل تایید سایت ارسال بشه | اسم قبل ایمیل میاد اگه نام بنویسیم
        return $this->from('mahdishmshm13781999@gmail.com' , 'mahdi')->view('mail.otp');
    }

}
