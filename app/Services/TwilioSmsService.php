<?php

namespace App\Services;


class TwilioSmsService implements SmsService
{
    public function sendSMS($mobile, $message)
    {
        //Logic to Send SMS here, using Queue
        return "Success: Message Develered Via Twilio";
    }
}
