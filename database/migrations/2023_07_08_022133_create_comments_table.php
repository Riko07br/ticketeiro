<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('ticket_id');
            $table->boolean('show_user');   //let users see the comment
            $table->mediumText('comment');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ticket_id')->references('id')->on('tickets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('comments');
    }
};
