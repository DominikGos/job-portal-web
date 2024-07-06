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
        $this->createTable('requirements');
        $this->createTable('responsibilities');
        $this->createTable('benefits');
    }

    /**
     * Create table with common structure.
     */
    private function createTable(string $tableName): void
    {
        Schema::create($tableName, function(Blueprint $table) {
            $table->id();
            $table->foreignId('job_offer_id')->constrained('job_offers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirements');
        Schema::dropIfExists('responsibilities');
        Schema::dropIfExists('benefits');
    }
};
