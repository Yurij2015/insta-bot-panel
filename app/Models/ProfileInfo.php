<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereAiAgentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereBioLinks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereBiography($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereBiographyWithEntities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereBlockedByViewer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereBusinessAddressJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereBusinessCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereBusinessContactMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereBusinessEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereBusinessPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereCategoryEnum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereConnectedFbPage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereCountryBlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereEdgeFelixVideoTimeline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereEdgeFollow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereEdgeFollowedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereEdgeMediaCollections($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereEdgeMutualFollowedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereEdgeOwnerToTimelineMedia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereEdgeSavedMedia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereEimuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereExternalUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereExternalUrlLinkshimmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereFbProfileBiolink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereFbid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereFollowedByViewer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereFollowsViewer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereGroupMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereGuardianId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereHasArEffects($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereHasBlockedViewer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereHasChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereHasClips($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereHasGuides($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereHasRequestedViewer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereHideLikeAndViewCounts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereHighlightReelCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereInstId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereIsBusinessAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereIsEmbedsDisabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereIsGuardianOfViewer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereIsJoinedRecently($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereIsPrivate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereIsProfessionalAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereIsRegulatedC18($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereIsSupervisedByViewer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereIsSupervisedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereIsSupervisionEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereIsVerifiedByMv4b($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereOverallCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo wherePinnedChannelsListCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereProfilePicUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereProfilePicUrlHd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo wherePronouns($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereRequestedByViewer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereRestrictedByViewer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereShouldShowCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereShouldShowPublicContacts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereShowAccountTransparencyDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereTransparencyLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereTransparencyProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileInfo whereUsername($value)
 * @mixin \Eloquent
 */
class ProfileInfo extends Model
{
    use HasFactory;
}
