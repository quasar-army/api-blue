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
        Schema::create('org_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->softDeletes();

            $table->foreignUuid('org_id')->references('id')->on('orgs');
            $table->foreignUuid('user_id')->references('id')->on('users');

            $table->foreignUuid('created_by_id')->references('id')->on('users');
            $table->foreignUuid('updated_by_id')->nullable()->references('id')->on('users');
            $table->foreignUuid('deleted_by_id')->nullable()->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('org_users');
    }
};
