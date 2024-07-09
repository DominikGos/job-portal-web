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
        Schema::create('job_offer_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'job_offer_applications_user_id'
            )
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('job_offer_id')->constrained(
                table: 'job_offers',
                indexName: 'job_offer_applications_job_offer_id'
            )
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_offer_applications');
    }
};
