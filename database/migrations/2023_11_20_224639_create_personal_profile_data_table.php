<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_profile_data', static function (Blueprint $table) {
            $table->id();
            $table->string('ai_agent_type')->nullable();
            $table->text('biography')->nullable();
            $table->json('bio_links')->nullable();
            $table->string('fb_profile_biolink')->nullable();
            $table->json('biography_with_entities')->nullable();
            $table->boolean('blocked_by_viewer')->nullable();
            $table->boolean('restricted_by_viewer')->nullable();
            $table->boolean('country_block')->nullable();
            $table->string('eimu_id')->nullable();
            $table->text('external_url')->nullable();
            $table->text('external_url_linkshimmed')->nullable();
            $table->json('edge_followed_by')->nullable();
            $table->string('fbid')->nullable();
            $table->boolean('followed_by_viewer')->nullable();
            $table->json('edge_follow')->nullable();
            $table->boolean('follows_viewer')->nullable();
            $table->string('full_name')->nullable();
            $table->json('group_metadata')->nullable();
            $table->boolean('has_ar_effects')->nullable();
            $table->boolean('has_clips')->nullable();
            $table->boolean('has_guides')->nullable();
            $table->boolean('has_channel')->nullable();
            $table->boolean('has_blocked_viewer')->nullable();
            $table->integer('highlight_reel_count')->nullable();
            $table->boolean('has_requested_viewer')->nullable();
            $table->boolean('hide_like_and_view_counts')->nullable();
            $table->string('inst_id')->nullable();
            $table->boolean('is_business_account')->nullable();
            $table->boolean('is_professional_account')->nullable();
            $table->boolean('is_supervision_enabled')->nullable();
            $table->boolean('is_guardian_of_viewer')->nullable();
            $table->boolean('is_supervised_by_viewer')->nullable();
            $table->boolean('is_supervised_user')->nullable();
            $table->boolean('is_embeds_disabled')->nullable();
            $table->boolean('is_joined_recently')->nullable();
            $table->string('guardian_id')->nullable();
            $table->json('business_address_json')->nullable();
            $table->string('business_contact_method')->nullable();
            $table->string('business_email')->nullable();
            $table->string('business_phone_number')->nullable();
            $table->string('business_category_name')->nullable();
            $table->string('overall_category_name')->nullable();
            $table->string('category_enum')->nullable();
            $table->string('category_name')->nullable();
            $table->boolean('is_private')->nullable();
            $table->boolean('is_verified')->nullable();
            $table->boolean('is_verified_by_mv4b')->nullable();
            $table->boolean('is_regulated_c18')->nullable();
            $table->json('edge_mutual_followed_by')->nullable();
            $table->integer('pinned_channels_list_count')->nullable();
            $table->text('profile_pic_url')->nullable();
            $table->text('profile_pic_url_hd')->nullable();
            $table->boolean('requested_by_viewer')->nullable();
            $table->boolean('should_show_category')->nullable();
            $table->boolean('should_show_public_contacts')->nullable();
            $table->boolean('show_account_transparency_details')->nullable();
            $table->text('transparency_label')->nullable();
            $table->string('transparency_product')->nullable();
            $table->string('username')->nullable();
            $table->text('connected_fb_page')->nullable();
            $table->json('pronouns')->nullable();
            $table->json('edge_felix_combined_post_uploads')->nullable();
            $table->json('edge_felix_combined_draft_uploads')->nullable();
            $table->json('edge_felix_video_timeline')->nullable();
            $table->json('edge_felix_drafts')->nullable();
            $table->json('edge_felix_pending_post_uploads')->nullable();
            $table->json('edge_felix_pending_draft_uploads')->nullable();
            $table->json('edge_owner_to_timeline_media')->nullable();
            $table->json('edge_saved_media')->nullable();
            $table->json('edge_media_collections')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_profile_data');
    }
};
