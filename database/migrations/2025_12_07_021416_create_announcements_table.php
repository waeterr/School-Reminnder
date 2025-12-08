<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->foreignId('classroom_id')->constrained()->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users');
            $table->json('attachments')->nullable();
            $table->boolean('pinned')->default(false);
            $table->timestamp('publish_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};