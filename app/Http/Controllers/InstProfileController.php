<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstProfileController extends Controller
{
    public function index()
    {
        $ch = curl_init();
        $url = 'https://www.instagram.com/api/v1/friendships/56193441514/followers/?count=12&search_surface=follow_list_page';
        $url2 = 'https://www.instagram.com/api/v1/friendships/56193441514/followers/?count=12&max_id=QVFESnNXWHJFaGJWVkJLM25LcUNDTGVkbEU0MEJIcmpaS2xxQlZqb1U4cXJvQ1EyM2w5Zjgwcm9sbXlTT3hKSVRwWXZGZFlLNmRNTDdvbmk5czR6R3lVVw%3D%3D';

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_PROXY, '104.239.124.88:6366');
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'nwdthtif:3u160iuuvmie');

        $headers = array();
        $headers[] = 'Authority: www.instagram.com';
        $headers[] = 'Accept: */*';
        $headers[] = 'Accept-Language: en-US,en;q=0.9';
        $headers[] = 'Cookie: mid=ZTVyTwAEAAELP5IhEzHVWgInyDuo; ig_did=144D620C-0295-430D-8BA4-641E8332FA10; ig_nrcb=1; datr=TnI1ZfYi85zbfjwKaC3WnWuJ; dpr=1; csrftoken=IuZpFySJFwd9C539FqUqOkFrv3nKac3C; ds_user_id=62496662896; sessionid=62496662896%3As9aCx6DlpFFCpD%3A27%3AAYfHIBBKWrQR1en8PLXyfZtHwb9D4BhDJlBp5Tg3eQ; rur=\"LDC054624966628960541729643771:01f7e3213ca2f0f52ff62700950a77787a76da3260ce3143afbfdc99b95ba558c6849cd8\"';
        $headers[] = 'Dpr: 2';
//        $headers[] = 'Referer: https://www.instagram.com/web.design.trends/followers/';
        $headers[] = 'Sec-Ch-Prefers-Color-Scheme: dark';
        $headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"118\", \"Google Chrome\";v=\"118\", \";Not A Brand\";v=\"99\"';
        $headers[] = 'Sec-Ch-Ua-Full-Version-List: \"Not=A?Brand\";v=\"99.0.0.0\", \"Chromium\";v=\"118.0.5993.70\"';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'Sec-Ch-Ua-Model: \"\"';
        $headers[] = 'Sec-Ch-Ua-Platform: \"Mac OS X\"';
        $headers[] = 'Sec-Ch-Ua-Platform-Version: \"10_15_7\"';
        $headers[] = 'Sec-Fetch-Dest: empty';
        $headers[] = 'Sec-Fetch-Mode: cors';
        $headers[] = 'Sec-Fetch-Site: same-origin';
        $headers[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36';
//        $headers[] = 'Viewport-Width: 859';
//        $headers[] = 'X-Asbd-Id: 129477';
//        $headers[] = 'X-Csrftoken: IuZpFySJFwd9C539FqUqOkFrv3nKac3C';
        $headers[] = 'X-Ig-App-Id: 936619743392459';
//        $headers[] = 'X-Ig-Www-Claim: hmac.AR0OcP7fiHSUdyUODGvM0IaVU-CkdHUFhM09xQ7t9GJxJDY0';
        $headers[] = 'X-Requested-With: XMLHttpRequest';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        print_r($result); die();
        return view('inst-profile/index');
    }
}
