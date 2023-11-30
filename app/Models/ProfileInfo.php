<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ProfileInfo
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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ProfileInfo newModelQuery()
 * @method static Builder|ProfileInfo newQuery()
 * @method static Builder|ProfileInfo query()
 * @method static Builder|ProfileInfo whereAiAgentType($value)
 * @method static Builder|ProfileInfo whereBioLinks($value)
 * @method static Builder|ProfileInfo whereBiography($value)
 * @method static Builder|ProfileInfo whereBiographyWithEntities($value)
 * @method static Builder|ProfileInfo whereBlockedByViewer($value)
 * @method static Builder|ProfileInfo whereBusinessAddressJson($value)
 * @method static Builder|ProfileInfo whereBusinessCategoryName($value)
 * @method static Builder|ProfileInfo whereBusinessContactMethod($value)
 * @method static Builder|ProfileInfo whereBusinessEmail($value)
 * @method static Builder|ProfileInfo whereBusinessPhoneNumber($value)
 * @method static Builder|ProfileInfo whereCategoryEnum($value)
 * @method static Builder|ProfileInfo whereCategoryName($value)
 * @method static Builder|ProfileInfo whereConnectedFbPage($value)
 * @method static Builder|ProfileInfo whereCountryBlock($value)
 * @method static Builder|ProfileInfo whereCreatedAt($value)
 * @method static Builder|ProfileInfo whereEdgeFelixVideoTimeline($value)
 * @method static Builder|ProfileInfo whereEdgeFollow($value)
 * @method static Builder|ProfileInfo whereEdgeFollowedBy($value)
 * @method static Builder|ProfileInfo whereEdgeMediaCollections($value)
 * @method static Builder|ProfileInfo whereEdgeMutualFollowedBy($value)
 * @method static Builder|ProfileInfo whereEdgeOwnerToTimelineMedia($value)
 * @method static Builder|ProfileInfo whereEdgeSavedMedia($value)
 * @method static Builder|ProfileInfo whereEimuId($value)
 * @method static Builder|ProfileInfo whereExternalUrl($value)
 * @method static Builder|ProfileInfo whereExternalUrlLinkshimmed($value)
 * @method static Builder|ProfileInfo whereFbProfileBiolink($value)
 * @method static Builder|ProfileInfo whereFbid($value)
 * @method static Builder|ProfileInfo whereFollowedByViewer($value)
 * @method static Builder|ProfileInfo whereFollowsViewer($value)
 * @method static Builder|ProfileInfo whereFullName($value)
 * @method static Builder|ProfileInfo whereGroupMetadata($value)
 * @method static Builder|ProfileInfo whereGuardianId($value)
 * @method static Builder|ProfileInfo whereHasArEffects($value)
 * @method static Builder|ProfileInfo whereHasBlockedViewer($value)
 * @method static Builder|ProfileInfo whereHasChannel($value)
 * @method static Builder|ProfileInfo whereHasClips($value)
 * @method static Builder|ProfileInfo whereHasGuides($value)
 * @method static Builder|ProfileInfo whereHasRequestedViewer($value)
 * @method static Builder|ProfileInfo whereHideLikeAndViewCounts($value)
 * @method static Builder|ProfileInfo whereHighlightReelCount($value)
 * @method static Builder|ProfileInfo whereId($value)
 * @method static Builder|ProfileInfo whereInstId($value)
 * @method static Builder|ProfileInfo whereIsBusinessAccount($value)
 * @method static Builder|ProfileInfo whereIsEmbedsDisabled($value)
 * @method static Builder|ProfileInfo whereIsGuardianOfViewer($value)
 * @method static Builder|ProfileInfo whereIsJoinedRecently($value)
 * @method static Builder|ProfileInfo whereIsPrivate($value)
 * @method static Builder|ProfileInfo whereIsProfessionalAccount($value)
 * @method static Builder|ProfileInfo whereIsRegulatedC18($value)
 * @method static Builder|ProfileInfo whereIsSupervisedByViewer($value)
 * @method static Builder|ProfileInfo whereIsSupervisedUser($value)
 * @method static Builder|ProfileInfo whereIsSupervisionEnabled($value)
 * @method static Builder|ProfileInfo whereIsVerified($value)
 * @method static Builder|ProfileInfo whereIsVerifiedByMv4b($value)
 * @method static Builder|ProfileInfo whereOverallCategoryName($value)
 * @method static Builder|ProfileInfo wherePinnedChannelsListCount($value)
 * @method static Builder|ProfileInfo whereProfilePicUrl($value)
 * @method static Builder|ProfileInfo whereProfilePicUrlHd($value)
 * @method static Builder|ProfileInfo wherePronouns($value)
 * @method static Builder|ProfileInfo whereRequestedByViewer($value)
 * @method static Builder|ProfileInfo whereRestrictedByViewer($value)
 * @method static Builder|ProfileInfo whereShouldShowCategory($value)
 * @method static Builder|ProfileInfo whereShouldShowPublicContacts($value)
 * @method static Builder|ProfileInfo whereShowAccountTransparencyDetails($value)
 * @method static Builder|ProfileInfo whereTransparencyLabel($value)
 * @method static Builder|ProfileInfo whereTransparencyProduct($value)
 * @method static Builder|ProfileInfo whereUpdatedAt($value)
 * @method static Builder|ProfileInfo whereUsername($value)
 * @mixin Eloquent
 */
class ProfileInfo extends Model
{
    use HasFactory;
}
