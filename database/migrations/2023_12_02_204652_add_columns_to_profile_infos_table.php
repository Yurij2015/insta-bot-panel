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
        Schema::table('profile_infos', static function (Blueprint $table) {
            $table->json('edge_felix_combined_post_uploads')->nullable()->after('pronouns');
            $table->json('edge_felix_combined_draft_uploads')->nullable()->after('pronouns');;
            $table->json('edge_felix_drafts')->nullable()->after('pronouns');
            $table->json('edge_felix_pending_post_uploads')->nullable()->after('pronouns');;
            $table->json('edge_felix_pending_draft_uploads')->nullable()->after('pronouns');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profile_infos', static function (Blueprint $table) {
            $table->dropColumn('edge_felix_combined_post_uploads');
            $table->dropColumn('edge_felix_combined_draft_uploads');
            $table->dropColumn('edge_felix_drafts');
            $table->dropColumn('edge_felix_pending_post_uploads');
            $table->dropColumn('edge_felix_pending_draft_uploads');
        });
    }
};
