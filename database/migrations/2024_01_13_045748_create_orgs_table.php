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
        Schema::create('orgs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->softDeletes();

            $table->string('name');

            $table->foreignUuid('created_by_id')->references('id')->on('users');
            $table->foreignUuid('updated_by_id')->nullable()->references('id')->on('users');
            $table->foreignUuid('deleted_by_id')->nullable()->references('id')->on('users');

            $table->foreignUuid('tenant_id')->references('id')->on('tenants');

            $table->unique(['name', 'tenant_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orgs');
    }
};
