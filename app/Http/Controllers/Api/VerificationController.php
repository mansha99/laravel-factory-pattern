<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MobileVerificationRequest;
use App\Services\SmsService;

class VerificationController extends Controller
{

    private $smsService;
    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }


    public function getVerificationCode(MobileVerificationRequest $request)
    {
        $data = $request->validated();
        $mobile = $data['mobile'];
        //Step-1 should be : Check if mobile number is registered with us
        //Step-2 should : Check if an SMS has already been sent in last 60 seconds
        //Step-3 : if mobile number is registered and no SMS been sent in last 60 seconds
        $code = rand(100000, 999999);
        //Write logic to Store code in database
        //send SMS
        $result = $this->smsService->sendSMS($data['mobile'], 'Verification Code for WowApp is ' . $code);
        return response()->json($result);
    }
}