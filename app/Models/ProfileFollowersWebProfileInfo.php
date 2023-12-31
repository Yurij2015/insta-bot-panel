<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ProfileFollowersWebProfileInfo
 *
 * @property int $id
 * @property string|null $ai_agent_type
 * @property string|null $biography
 * @property mixed|null $bio_links
 * @property string|null $fb_profile_biolink
 * @property mixed|null $biography_with_entities
 * @property int|null $blocked_by_viewer
 * @property int|null $restricted_by_viewer
 * @property int|null $country_block
 * @property string|null $eimu_id
 * @property string|null $external_url
 * @property string|null $external_url_linkshimmed
 * @property mixed|null $edge_followed_by
 * @property string|null $fbid
 * @property int|null $followed_by_viewer
 * @property mixed|null $edge_follow
 * @property int|null $follows_viewer
 * @property string|null $full_name
 * @property mixed|null $group_metadata
 * @property int|null $has_ar_effects
 * @property int|null $has_clips
 * @property int|null $has_guides
 * @property int|null $has_channel
 * @property int|null $has_blocked_viewer
 * @property int|null $highlight_reel_count
 * @property int|null $has_requested_viewer
 * @property int|null $hide_like_and_view_counts
 * @property string|null $inst_id
 * @property int|null $is_business_account
 * @property int|null $is_professional_account
 * @property int|null $is_supervision_enabled
 * @property int|null $is_guardian_of_viewer
 * @property int|null $is_supervised_by_viewer
 * @property int|null $is_supervised_user
 * @property int|null $is_embeds_disabled
 * @property int|null $is_joined_recently
 * @property string|null $guardian_id
 * @property mixed|null $business_address_json
 * @property string|null $business_contact_method
 * @property string|null $business_email
 * @property string|null $business_phone_number
 * @property string|null $business_category_name
 * @property string|null $overall_category_name
 * @property string|null $category_enum
 * @property string|null $category_name
 * @property int|null $is_private
 * @property int|null $is_verified
 * @property int|null $is_verified_by_mv4b
 * @property int|null $is_regulated_c18
 * @property mixed|null $edge_mutual_followed_by
 * @property int|null $pinned_channels_list_count
 * @property string|null $profile_pic_url
 * @property string|null $profile_pic_url_hd
 * @property int|null $requested_by_viewer
 * @property int|null $should_show_category
 * @property int|null $should_show_public_contacts
 * @property int|null $show_account_transparency_details
 * @property string|null $transparency_label
 * @property string|null $transparency_product
 * @property string|null $username
 * @property string|null $connected_fb_page
 * @property mixed|null $pronouns
 * @property mixed|null $edge_felix_video_timeline
 * @property mixed|null $edge_owner_to_timeline_media
 * @property mixed|null $edge_saved_media
 * @property mixed|null $edge_media_collections
 * @property mixed|null $edge_felix_combined_post_uploads
 * @property mixed|null $edge_felix_combined_draft_uploads
 * @property mixed|null $edge_felix_drafts
 * @property mixed $edge_felix_pending_post_uploads
 * @property mixed|null $edge_felix_pending_draft_uploads
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ProfileFollowersWebProfileInfo newModelQuery()
 * @method static Builder|ProfileFollowersWebProfileInfo newQuery()
 * @method static Builder|ProfileFollowersWebProfileInfo query()
 * @method static Builder|ProfileFollowersWebProfileInfo whereAiAgentType($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereBioLinks($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereBiography($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereBiographyWithEntities($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereBlockedByViewer($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereBusinessAddressJson($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereBusinessCategoryName($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereBusinessContactMethod($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereBusinessEmail($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereBusinessPhoneNumber($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereCategoryEnum($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereCategoryName($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereConnectedFbPage($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereCountryBlock($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereCreatedAt($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereEdgeFelixCombinedDraftUploads($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereEdgeFelixCombinedPostUploads($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereEdgeFelixDrafts($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereEdgeFelixPendingDraftUploads($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereEdgeFelixPendingPostUploads($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereEdgeFelixVideoTimeline($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereEdgeFollow($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereEdgeFollowedBy($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereEdgeMediaCollections($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereEdgeMutualFollowedBy($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereEdgeOwnerToTimelineMedia($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereEdgeSavedMedia($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereEimuId($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereExternalUrl($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereExternalUrlLinkshimmed($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereFbProfileBiolink($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereFbid($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereFollowedByViewer($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereFollowsViewer($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereFullName($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereGroupMetadata($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereGuardianId($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereHasArEffects($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereHasBlockedViewer($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereHasChannel($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereHasClips($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereHasGuides($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereHasRequestedViewer($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereHideLikeAndViewCounts($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereHighlightReelCount($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereId($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereInstId($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereIsBusinessAccount($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereIsEmbedsDisabled($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereIsGuardianOfViewer($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereIsJoinedRecently($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereIsPrivate($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereIsProfessionalAccount($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereIsRegulatedC18($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereIsSupervisedByViewer($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereIsSupervisedUser($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereIsSupervisionEnabled($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereIsVerified($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereIsVerifiedByMv4b($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereOverallCategoryName($value)
 * @method static Builder|ProfileFollowersWebProfileInfo wherePinnedChannelsListCount($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereProfilePicUrl($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereProfilePicUrlHd($value)
 * @method static Builder|ProfileFollowersWebProfileInfo wherePronouns($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereRequestedByViewer($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereRestrictedByViewer($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereShouldShowCategory($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereShouldShowPublicContacts($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereShowAccountTransparencyDetails($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereTransparencyLabel($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereTransparencyProduct($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereUpdatedAt($value)
 * @method static Builder|ProfileFollowersWebProfileInfo whereUsername($value)
 * @mixin Eloquent
 */
class ProfileFollowersWebProfileInfo extends Model
{
    protected $fillable = [
        'ai_agent_type',
        'biography',
        'bio_links',
        'fb_profile_biolink',
        'biography_with_entities',
        'blocked_by_viewer',
        'restricted_by_viewer',
        'country_block',
        'eimu_id',
        'external_url',
        'external_url_linkshimmed',
        'edge_followed_by',
        'fbid',
        'followed_by_viewer',
        'edge_follow',
        'follows_viewer',
        'full_name',
        'group_metadata',
        'has_ar_effects',
        'has_clips',
        'has_guides',
        'has_channel',
        'has_blocked_viewer',
        'highlight_reel_count',
        'has_requested_viewer',
        'hide_like_and_view_counts',
        'inst_id',
        'is_business_account',
        'is_professional_account',
        'is_supervision_enabled',
        'is_guardian_of_viewer',
        'is_supervised_by_viewer',
        'is_supervised_user',
        'is_embeds_disabled',
        'is_joined_recently',
        'guardian_id',
        'business_address_json',
        'business_contact_method',
        'business_email',
        'business_phone_number',
        'business_category_name',
        'overall_category_name',
        'category_enum',
        'category_name',
        'is_private',
        'is_verified',
        'is_verified_by_mv4b',
        'is_regulated_c18',
        'edge_mutual_followed_by',
        'pinned_channels_list_count',
        'profile_pic_url',
        'profile_pic_url_hd',
        'requested_by_viewer',
        'should_show_category',
        'should_show_public_contacts',
        'show_account_transparency_details',
        'transparency_label',
        'transparency_product',
        'username',
        'connected_fb_page',
        'pronouns',
        'edge_felix_combined_post_uploads',
        'edge_felix_combined_draft_uploads',
        'edge_felix_video_timeline',
        'edge_felix_drafts',
        'edge_felix_pending_post_uploads',
        'edge_felix_pending_draft_uploads',
        'edge_owner_to_timeline_media',
        'edge_saved_media',
        'edge_media_collections'
    ];

    protected $casts = [
        'bio_links' => 'array',
        'fb_profile_biolink' => 'array',
        'biography_with_entities' => 'array',
        'edge_followed_by' => 'array',
        'edge_follow' => 'array',
        'group_metadata' => 'array',
        'edge_mutual_followed_by' => 'array',
        'business_address_json' => 'array',
        'pronouns' => 'array',
        'edge_felix_combined_post_uploads' => 'array',
        'edge_felix_combined_draft_uploads' => 'array',
        'edge_felix_video_timeline' => 'array',
        'edge_felix_drafts' => 'array',
        'edge_felix_pending_post_uploads' => 'array',
        'edge_felix_pending_draft_uploads' => 'array',
        'edge_owner_to_timeline_media' => 'array',
        'edge_saved_media' => 'array',
        'edge_media_collections' => 'array'
    ];
}
