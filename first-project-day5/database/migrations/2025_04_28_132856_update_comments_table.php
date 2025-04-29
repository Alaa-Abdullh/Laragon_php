<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->after('id');
            $table->unsignedBigInteger('commentable_id')->after('user_id');
            $table->string('commentable_type')->after('commentable_id');
            $table->text('content')->after('commentable_type');
        });
    }

    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'commentable_id', 'commentable_type', 'content']);
        });
    }
};