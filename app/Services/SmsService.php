<?php

namespace App\Services;


interface SmsService
{
    public function sendSMS($mobile, $message);
}
