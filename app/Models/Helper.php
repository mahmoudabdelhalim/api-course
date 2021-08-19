<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Helper extends Model
{
    public static function send_sms($param)
    {
        // Base URL ( Query Params ) : https://smsmisr.com/api/webapi/? Base URL ( From Body ) : https://smsmisr.com/api/v2/?

        $URL = 'https://smsmisr.com/api/v2/';

        $data['Username'] = '73W4CURL';
        $data['password'] = 'KT3HMT';
        $data['language'] = 2;
        $data['sender'] = 'testingApp';
        $data['Mobile'] = $param['mobile'];
        $data['message'] = $param['msg'];
// dd($data);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $URL);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // ----
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            // "accept: text/plain"
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        var_dump($response);

        return $response;
    }
}
