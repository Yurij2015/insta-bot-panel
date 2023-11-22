<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
