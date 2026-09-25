<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('product_masters', function (Blueprint $table) {
            $table->longText('installation_videos')->nullable()->after('product_technical');
        });
    }

    public function down()
    {
        Schema::table('product_masters', function (Blueprint $table) {
            $table->dropColumn('installation_videos');
        });
    }
};