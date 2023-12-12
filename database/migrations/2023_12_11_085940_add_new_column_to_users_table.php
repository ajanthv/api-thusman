<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->enum('type', ['hero', 'impactor']);
            $table->string('first_name');
            $table->string('last_name');
            $table->text('address');
            $table->string('city');
            $table->string('country');
            $table->string('phone_number');
            $table->string('nationality');
            $table->text('company_esg_initiatives')->nullable();
            $table->text('ideal_esg_project')->nullable();
            $table->text('most_important_un_sdgs')->nullable();
            $table->text('why_our_initiative_is_important')->nullable();
            $table->text('what_do_you_hope_to_get_out_of_the_heros_academy_course')->nullable();
            $table->integer('project_length_of_project_on_weeks')->nullable()->default(0);
            $table->text('what_passsion_do_you_have')->nullable();
            $table->text('what_expertise_would_you_like_to_sell_to_international_clients')->nullable();
            $table->text('what_do_you_plan_to_spend_the_initial_kickstart_sponsorship')->nullable();
            $table->string('project_name')->nullable();
            $table->string('project_impact')->nullable();
            $table->string('project_theme')->nullable();
            $table->tinyInteger('terms_and_condition')->default(false);
            $table->tinyInteger('privacy_policy')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');
            $table->dropColumn('type');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('phone_number');
            $table->dropColumn('nationality');
            $table->dropColumn('company_esg_initiatives');
            $table->dropColumn('ideal_esg_project');
            $table->dropColumn('most_important_un_sdgs');
            $table->dropColumn('why_our_initiative_is_important');
            $table->dropColumn('what_do_you_hope_to_get_out_of_the_heros_academy_course');
            $table->dropColumn('project_length_of_project_on_weeks');
            $table->dropColumn('what_passsion_do_you_have');
            $table->dropColumn('what_expertise_would_you_like_to_sell_to_international_clients');
            $table->dropColumn('what_do_you_plan_to_spend_the_initial_kickstart_sponsorship');
            $table->dropColumn('project_name');
            $table->dropColumn('project_impact');
            $table->dropColumn('project_theme');
            $table->dropColumn('terms_and_condition');
            $table->dropColumn('privacy_policy');
        });
    }
};
