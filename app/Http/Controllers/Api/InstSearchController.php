<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class InstSearchController extends Controller
{
    public function search(): void
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/api/graphql');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        $av = 17841462606892082;
        $__d = 'www';
        $user = 0;
        $__a = 1;
        $__req = '1j';
        $__hs = '19659.HYP%3Ainstagram_web_pkg.2.1..0.1';
        $dpr = 2;
        $__ccg = 'UNKNOWN';
        $__rev = 1009552260;
        $__s = '%3A3bv5uc%3Ai40yq5';
        $__hsi = 7295168783508131896;
        $__dyn = '7xeUmwlEnwn8K2WnFw9-2i5U4e1ZyUW3qi2K360CEbotw50x609vCwjE1xoswIwuo2awlU-cw5Mx62G3i1ywOwv89k2C1Fwc60D8vw8OfK0EUjwGzEaE7622362W2K0zK5o4q3y1Sx_w4HwJCwLyESE7i3u2C2O0z8c86-3u2WE5B0oo5C1Iwqo5q1IGp1yUow';
        $__csr = 'grP9gDin24DNdqbaiBRLjGQOCSBaLLQFXLmGQl2FZeA-fy98hjCBfDCyp4GmF4t68umREwghmGKqpG49BHDxeuEqyF88pFUXzrxe00h3x03ji09hw8Ka81uw1uq05r328Vpqfa0F61fxy1no1ni04Sw6ao1mEwU3pwpU0z4M17802lRw';
        $__comet_req = 7;
        $fb_dts = 'NAcPnRFFwlHBSe6tvGpJXZuXRHjOxqpE0f-1ZwOdHyh3OG24TJEKZEg%3A17843683126168011%3A1698002215';
        $jazoest = 26192;
        $lsd = 'oGmbIikvhSpGSdpgaXUDXd';
        $__spin_r = 1009552260;
        $__spin_b = 'trunk';
        $__spin_t = 1638884622;
        $fb_api_caller_class = 'RelayModern';
        $fb_api_req_friendly_name = 'PolarisSearchBoxRefetchableQuery';
        $query = 'webdevelop';
        $variables = "%7B%22data%22%3A%7B%22context%22%3A%22blended%22%2C%22include_reel%22%3A%22true%22%2C%22query%22%3A%22{$query}%22%2C%22rank_token%22%3A%221698538860622%7C1253bb517182d43a1fedf8ccef845e8ce8131217e8cc4653b49aa994a74c9a3e%22%2C%22search_surface%22%3A%22web_top_search%22%7D%2C%22hasQuery%22%3Atrue%7D";
        $server_timestamps = 'true';
        $doc_id = 6460896210645763;

        curl_setopt($ch, CURLOPT_POSTFIELDS, "av=$av&__d=$__d&__user=$user&__a=$__a&__req=$__req&__hs=$__hs&dpr=$dpr&__ccg=$__ccg&__rev=$__rev&__s=$__s&__hsi=$__hsi&__dyn=$__dyn&__csr=$__csr&__comet_req=$__comet_req&fb_dtsg=$fb_dts&jazoest=$jazoest&lsd=$lsd&__spin_r=$__spin_r&__spin_b=$__spin_b&__spin_t=$__spin_t&fb_api_caller_class=$fb_api_caller_class&fb_api_req_friendly_name=$fb_api_req_friendly_name&variables=$variables&server_timestamps=$server_timestamps&doc_id=$doc_id");

        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_PROXY, '104.239.124.88:6366');
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'nwdthtif:3u160iuuvmie');

        $headers = array();
        $headers[] = 'Cookie: ds_user_id=62496662896; sessionid=62496662896%3As9aCx6DlpFFCpD%3A27%3AAYfHIBBKWrQR1en8PLXyfZtHwb9D4BhDJlBp5Tg3eQ;';
        $headers[] = 'Sec-Fetch-Site: same-origin';
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
