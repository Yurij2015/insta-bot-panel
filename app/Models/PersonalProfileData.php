<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\PersonalProfileData
 *
 * @property int $id
 * @property string|null $ai_agent_type
 * @property string|null $biography
 * @property array|null $bio_links
 * @property string|null $fb_profile_biolink
 * @property array|null $biography_with_entities
 * @property int|null $blocked_by_viewer
 * @property int|null $restricted_by_viewer
 * @property int|null $country_block
 * @property string|null $eimu_id
 * @property string|null $external_url
 * @property string|null $external_url_linkshimmed
 * @property array|null $edge_followed_by
 * @property string|null $fbid
 * @property int|null $followed_by_viewer
 * @property array|null $edge_follow
 * @property int|null $follows_viewer
 * @property string|null $full_name
 * @property array|null $group_metadata
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
 * @property array|null $business_address_json
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
 * @property array|null $edge_mutual_followed_by
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
 * @property array|null $pronouns
 * @property array|null $edge_felix_combined_post_uploads
 * @property array|null $edge_felix_combined_draft_uploads
 * @property array|null $edge_felix_video_timeline
 * @property array|null $edge_felix_drafts
 * @property array|null $edge_felix_pending_post_uploads
 * @property array|null $edge_felix_pending_draft_uploads
 * @property array|null $edge_owner_to_timeline_media
 * @property array|null $edge_saved_media
 * @property array|null $edge_media_collections
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|PersonalProfileData newModelQuery()
 * @method static Builder|PersonalProfileData newQuery()
 * @method static Builder|PersonalProfileData query()
 * @method static Builder|PersonalProfileData whereAiAgentType($value)
 * @method static Builder|PersonalProfileData whereBioLinks($value)
 * @method static Builder|PersonalProfileData whereBiography($value)
 * @method static Builder|PersonalProfileData whereBiographyWithEntities($value)
 * @method static Builder|PersonalProfileData whereBlockedByViewer($value)
 * @method static Builder|PersonalProfileData whereBusinessAddressJson($value)
 * @method static Builder|PersonalProfileData whereBusinessCategoryName($value)
 * @method static Builder|PersonalProfileData whereBusinessContactMethod($value)
 * @method static Builder|PersonalProfileData whereBusinessEmail($value)
 * @method static Builder|PersonalProfileData whereBusinessPhoneNumber($value)
 * @method static Builder|PersonalProfileData whereCategoryEnum($value)
 * @method static Builder|PersonalProfileData whereCategoryName($value)
 * @method static Builder|PersonalProfileData whereConnectedFbPage($value)
 * @method static Builder|PersonalProfileData whereCountryBlock($value)
 * @method static Builder|PersonalProfileData whereCreatedAt($value)
 * @method static Builder|PersonalProfileData whereEdgeFelixCombinedDraftUploads($value)
 * @method static Builder|PersonalProfileData whereEdgeFelixCombinedPostUploads($value)
 * @method static Builder|PersonalProfileData whereEdgeFelixDrafts($value)
 * @method static Builder|PersonalProfileData whereEdgeFelixPendingDraftUploads($value)
 * @method static Builder|PersonalProfileData whereEdgeFelixPendingPostUploads($value)
 * @method static Builder|PersonalProfileData whereEdgeFelixVideoTimeline($value)
 * @method static Builder|PersonalProfileData whereEdgeFollow($value)
 * @method static Builder|PersonalProfileData whereEdgeFollowedBy($value)
 * @method static Builder|PersonalProfileData whereEdgeMediaCollections($value)
 * @method static Builder|PersonalProfileData whereEdgeMutualFollowedBy($value)
 * @method static Builder|PersonalProfileData whereEdgeOwnerToTimelineMedia($value)
 * @method static Builder|PersonalProfileData whereEdgeSavedMedia($value)
 * @method static Builder|PersonalProfileData whereEimuId($value)
 * @method static Builder|PersonalProfileData whereExternalUrl($value)
 * @method static Builder|PersonalProfileData whereExternalUrlLinkshimmed($value)
 * @method static Builder|PersonalProfileData whereFbProfileBiolink($value)
 * @method static Builder|PersonalProfileData whereFbid($value)
 * @method static Builder|PersonalProfileData whereFollowedByViewer($value)
 * @method static Builder|PersonalProfileData whereFollowsViewer($value)
 * @method static Builder|PersonalProfileData whereFullName($value)
 * @method static Builder|PersonalProfileData whereGroupMetadata($value)
 * @method static Builder|PersonalProfileData whereGuardianId($value)
 * @method static Builder|PersonalProfileData whereHasArEffects($value)
 * @method static Builder|PersonalProfileData whereHasBlockedViewer($value)
 * @method static Builder|PersonalProfileData whereHasChannel($value)
 * @method static Builder|PersonalProfileData whereHasClips($value)
 * @method static Builder|PersonalProfileData whereHasGuides($value)
 * @method static Builder|PersonalProfileData whereHasRequestedViewer($value)
 * @method static Builder|PersonalProfileData whereHideLikeAndViewCounts($value)
 * @method static Builder|PersonalProfileData whereHighlightReelCount($value)
 * @method static Builder|PersonalProfileData whereId($value)
 * @method static Builder|PersonalProfileData whereInstId($value)
 * @method static Builder|PersonalProfileData whereIsBusinessAccount($value)
 * @method static Builder|PersonalProfileData whereIsEmbedsDisabled($value)
 * @method static Builder|PersonalProfileData whereIsGuardianOfViewer($value)
 * @method static Builder|PersonalProfileData whereIsJoinedRecently($value)
 * @method static Builder|PersonalProfileData whereIsPrivate($value)
 * @method static Builder|PersonalProfileData whereIsProfessionalAccount($value)
 * @method static Builder|PersonalProfileData whereIsRegulatedC18($value)
 * @method static Builder|PersonalProfileData whereIsSupervisedByViewer($value)
 * @method static Builder|PersonalProfileData whereIsSupervisedUser($value)
 * @method static Builder|PersonalProfileData whereIsSupervisionEnabled($value)
 * @method static Builder|PersonalProfileData whereIsVerified($value)
 * @method static Builder|PersonalProfileData whereIsVerifiedByMv4b($value)
 * @method static Builder|PersonalProfileData whereOverallCategoryName($value)
 * @method static Builder|PersonalProfileData wherePinnedChannelsListCount($value)
 * @method static Builder|PersonalProfileData whereProfilePicUrl($value)
 * @method static Builder|PersonalProfileData whereProfilePicUrlHd($value)
 * @method static Builder|PersonalProfileData wherePronouns($value)
 * @method static Builder|PersonalProfileData whereRequestedByViewer($value)
 * @method static Builder|PersonalProfileData whereRestrictedByViewer($value)
 * @method static Builder|PersonalProfileData whereShouldShowCategory($value)
 * @method static Builder|PersonalProfileData whereShouldShowPublicContacts($value)
 * @method static Builder|PersonalProfileData whereShowAccountTransparencyDetails($value)
 * @method static Builder|PersonalProfileData whereTransparencyLabel($value)
 * @method static Builder|PersonalProfileData whereTransparencyProduct($value)
 * @method static Builder|PersonalProfileData whereUpdatedAt($value)
 * @method static Builder|PersonalProfileData whereUsername($value)
 * @mixin Eloquent
 */
class PersonalProfileData extends Model
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
