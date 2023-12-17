<?php

namespace App\Http\Requests\GetCurlRequests;

use App\Models\PersonalProfileData;
use App\Models\Profile;
use App\Models\ProfileInfo;
use App\Models\ProfileList;
use Illuminate\Support\Facades\Log;
use Exception;
use JsonException;

class WebProfileInfo
{
    /**
     * @throws JsonException
     */
    public function getWebProfileInfo(Profile $profile, $username = null): bool|\stdClass
    {
        $curl = curl_init();
        $usernameToUrl = $username ?? $profile->username;
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.instagram.com/api/v1/users/web_profile_info/?username=$usernameToUrl",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_PROXY => $profile->proxy->proxy . ':' . $profile->proxy->port,
            CURLOPT_PROXYUSERPWD => $profile->proxy->login . ':' . $profile->proxy->password,
            CURLOPT_HTTPHEADER => array(
                "cookie: $profile->cookie",
                "user-agent: $profile->user_agent",
                'x-ig-app-id: 936619743392459'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        if ($username) {
            $this->saveProfileInfos($response);
        }

        if (!$username) {
            $this->savePersonalProfileData($response);
        }
        return json_decode($response, false, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function getProfilesFromListInfo(Profile $profile, string $username, int $profileListId): bool|\stdClass
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.instagram.com/api/v1/users/web_profile_info/?username=$username",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_PROXY => $profile->proxy->proxy . ':' . $profile->proxy->port,
            CURLOPT_PROXYUSERPWD => $profile->proxy->login . ':' . $profile->proxy->password,
            CURLOPT_HTTPHEADER => array(
                "cookie: $profile->cookie",
                "user-agent: $profile->user_agent",
                'x-ig-app-id: 936619743392459'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $this->saveProfilesFromListInfo($response, $profileListId);
        return json_decode($response, false, 512, JSON_THROW_ON_ERROR);
    }

    private function saveProfilesFromListInfo($response, $profileListId): void
    {
        try {
            $responseData = json_decode($response, false, 512, JSON_THROW_ON_ERROR);
            $profile = $responseData->data->user;
            $profileInfo = ProfileInfo::updateOrCreate(
                [
                    'inst_id' => $profile->id,
                ],
                $this->paramsArray($profile)
            );
            $profileInfo->profileList()->syncWithoutDetaching($profileListId);
            Log::info('profile info for list saved');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    private function savePersonalProfileData($response): void
    {
        try {
            $responseData = json_decode($response, false, 512, JSON_THROW_ON_ERROR);
            $profile = $responseData->data->user;

            PersonalProfileData::updateOrCreate(
                [
                    'inst_id' => $profile->id,
                ],
                $this->paramsArray($profile)
            );
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    private function saveProfileInfos($response): void
    {
        try {
            $responseData = json_decode($response, false, 512, JSON_THROW_ON_ERROR);
            $profile = $responseData->data->user;
            ProfileInfo::updateOrCreate(
                [
                    'inst_id' => $profile->id,
                ],
                $this->paramsArray($profile)
            );
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    private function paramsArray($profile): array
    {
        return [
            'ai_agent_type' => $profile->ai_agent_type,
            'biography' => $profile->biography,
            'bio_links' => $profile->bio_links,
            'fb_profile_biolink' => $profile->fb_profile_biolink,
            'biography_with_entities' => $profile->biography_with_entities,
            'blocked_by_viewer' => $profile->blocked_by_viewer,
            'restricted_by_viewer' => $profile->restricted_by_viewer,
            'country_block' => $profile->country_block,
            'eimu_id' => $profile->eimu_id,
            'external_url' => $profile->external_url,
            'external_url_linkshimmed' => $profile->external_url_linkshimmed,
            'edge_followed_by' => $profile->edge_followed_by,
            'fbid' => $profile->fbid,
            'followed_by_viewer' => $profile->followed_by_viewer,
            'edge_follow' => $profile->edge_follow,
            'follows_viewer' => $profile->follows_viewer,
            'full_name' => $profile->full_name,
            'group_metadata' => $profile->group_metadata,
            'has_ar_effects' => $profile->has_ar_effects,
            'has_clips' => $profile->has_clips,
            'has_guides' => $profile->has_guides,
            'has_channel' => $profile->has_channel,
            'has_blocked_viewer' => $profile->has_blocked_viewer,
            'highlight_reel_count' => $profile->highlight_reel_count,
            'has_requested_viewer' => $profile->has_requested_viewer,
            'hide_like_and_view_counts' => $profile->hide_like_and_view_counts,
            'inst_id' => $profile->id,
            'is_business_account' => $profile->is_business_account,
            'is_professional_account' => $profile->is_professional_account,
            'is_supervision_enabled' => $profile->is_supervision_enabled,
            'is_guardian_of_viewer' => $profile->is_guardian_of_viewer,
            'is_supervised_by_viewer' => $profile->is_supervised_by_viewer,
            'is_supervised_user' => $profile->is_supervised_user,
            'is_embeds_disabled' => $profile->is_embeds_disabled,
            'is_joined_recently' => $profile->is_joined_recently,
            'guardian_id' => $profile->guardian_id,
            'business_address_json' => $profile->business_address_json,
            'business_contact_method' => $profile->business_contact_method,
            'business_email' => $profile->business_email,
            'business_phone_number' => $profile->business_phone_number,
            'business_category_name' => $profile->business_category_name,
            'overall_category_name' => $profile->overall_category_name,
            'category_enum' => $profile->category_enum,
            'category_name' => $profile->category_name,
            'is_private' => $profile->is_private,
            'is_verified' => $profile->is_verified,
            'is_verified_by_mv4b' => $profile->is_verified_by_mv4b,
            'is_regulated_c18' => $profile->is_regulated_c18,
            'edge_mutual_followed_by' => $profile->edge_mutual_followed_by,
            'pinned_channels_list_count' => $profile->pinned_channels_list_count,
            'profile_pic_url' => $profile->profile_pic_url,
            'profile_pic_url_hd' => $profile->profile_pic_url_hd,
            'requested_by_viewer' => $profile->requested_by_viewer,
            'should_show_category' => $profile->should_show_category,
            'should_show_public_contacts' => $profile->should_show_public_contacts,
            'show_account_transparency_details' => $profile->show_account_transparency_details,
            'transparency_label' => $profile->transparency_label,
            'transparency_product' => $profile->transparency_product,
            'username' => $profile->username,
            'connected_fb_page' => $profile->connected_fb_page,
            'pronouns' => $profile->pronouns,
            'edge_felix_combined_post_uploads' => property_exists($profile, 'edge_felix_combined_post_uploads') ? $profile->edge_felix_combined_post_uploads : null,
            'edge_felix_combined_draft_uploads' => property_exists($profile, 'edge_felix_combined_draft_uploads') ? $profile->edge_felix_combined_draft_uploads : null,
            'edge_felix_video_timeline' => property_exists($profile, 'edge_felix_video_timeline') ? $profile->edge_felix_video_timeline : null,
            'edge_felix_drafts' => property_exists($profile, 'edge_felix_drafts') ? $profile->edge_felix_drafts : null,
            'edge_felix_pending_post_uploads' => property_exists($profile, 'edge_felix_pending_post_uploads') ? $profile->edge_felix_pending_post_uploads : null,
            'edge_felix_pending_draft_uploads' => property_exists($profile, 'edge_felix_pending_draft_uploads') ? $profile->edge_felix_pending_draft_uploads : null,
            'edge_owner_to_timeline_media' => property_exists($profile, 'edge_owner_to_timeline_media') ? $profile->edge_owner_to_timeline_media : null,
            'edge_saved_media' => property_exists($profile, 'edge_saved_media') ? $profile->edge_saved_media : null,
            'edge_media_collections' => property_exists($profile, 'edge_media_collections') ? $profile->edge_media_collections : null
        ];
    }
}
