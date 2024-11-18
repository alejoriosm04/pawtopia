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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('coupon_code')->nullable()->after('total'); // Para el cupón
            $table->string('external_product_link')->nullable()->after('coupon_code'); // Para el link del producto
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('coupon_code');
            $table->dropColumn('external_product_link');
        });
    }
};
