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
        // Create Pivot Table
        Schema::create('professional_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professional_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->decimal('price', 10, 2)->nullable();
            $table->string('duration')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        // Remove columns from Services table (since it's now a catalog)
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['professional_id']);
            $table->dropColumn(['professional_id', 'price', 'duration_estimate', 'active']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Revert Pivot Table
        Schema::dropIfExists('professional_service');

        // Restore columns to Services table
        Schema::table('services', function (Blueprint $table) {
            $table->foreignId('professional_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->decimal('price', 10, 2)->default(0);
            $table->string('duration_estimate')->nullable();
            $table->boolean('active')->default(true);
        });
    }
};
