<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class InstProfileInfoController extends Controller
{
    public function index(): void{
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/api/v1/users/web_profile_info/?username=webdevelopervizag');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_PROXY, '104.239.124.88:6366');
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'nwdthtif:3u160iuuvmie');

        $headers = array();
        $headers[] = 'Cookie: ds_user_id=62496662896; sessionid=62496662896%3As9aCx6DlpFFCpD%3A27%3AAYfHIBBKWrQR1en8PLXyfZtHwb9D4BhDJlBp5Tg3eQ;';
        $headers[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36';
        $headers[] = 'X-Ig-App-Id: 936619743392459';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $result = json_decode($result, true);
        dd($result);
    }
}
