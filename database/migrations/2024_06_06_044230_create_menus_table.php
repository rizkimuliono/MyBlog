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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link_type')->nullable(); // 'custom', 'post', 'category'
            $table->unsignedBigInteger('link_id')->nullable(); // id dari post atau category
            $table->string('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('link_type');
            $table->dropColumn('link_id');
        });
    }
};
