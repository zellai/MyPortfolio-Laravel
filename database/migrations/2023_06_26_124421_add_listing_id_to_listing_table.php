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
        Schema::table('comments', function (Blueprint $table) {
            $table->integer('listing_id')->after('userComment');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void    
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('userComment')->nullable();
        });
    }
};
