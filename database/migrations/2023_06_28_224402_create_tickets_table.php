<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('agent_id')->nullable();
            $table->foreignId('stat_id');
            $table->foreignId('priority_id');
            $table->string('title');
            $table->mediumText('description');
            $table->mediumText('files')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('tickets');
    }
};
