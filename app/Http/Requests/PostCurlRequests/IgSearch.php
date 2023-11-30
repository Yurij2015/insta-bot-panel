<?php

namespace App\Http\Requests\PostCurlRequests;

use App\Models\Profile;
use JsonException;

class IgSearch
{
    /**
     * @throws JsonException
     */
    public function search(string $key_word, int $profile_id): \stdClass
    {
        $profile = Profile::with('proxy')->find($profile_id);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/api/graphql');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_PROXY, $profile->proxy->proxy . ':' . $profile->proxy->port);
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $profile->proxy->login . ':' . $profile->proxy->password);

        $variables = "%7B%22data%22%3A%7B%22context%22%3A%22blended%22%2C%22include_reel%22%3A%22true%22%2C%22query%22%3A%22{$key_word}%22%2C%22search_surface%22%3A%22web_top_search%22%7D%2C%22hasQuery%22%3Atrue%7D";
        $doc_id = 6460896210645763;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "fb_dtsg=$profile->fb_dtsg&variables=$variables&doc_id=$doc_id");
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = "Cookie: $profile->cookie";
        $headers[] = 'Sec-Fetch-Site: same-origin';
        $headers[] = "User-Agent: $profile->user_agent";
        $headers[] = 'X-Ig-App-Id: 936619743392459';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return json_decode($result, false, 512, JSON_THROW_ON_ERROR);
    }
}
