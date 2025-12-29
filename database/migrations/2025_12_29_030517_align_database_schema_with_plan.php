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
        Schema::table('services', function (Blueprint $table) {
            $table->renameColumn('title', 'name');
            $table->softDeletes();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('image_url')->nullable()->after('name');
        });

        Schema::table('professional_profiles', function (Blueprint $table) {
            $table->string('address')->nullable()->after('bio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->renameColumn('name', 'title');
            $table->dropSoftDeletes();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });

        Schema::table('professional_profiles', function (Blueprint $table) {
            $table->dropColumn('address');
        });
    }
};
