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
        Schema::create('customer_alamat', function (Blueprint $table) {
            $table->id('idcustomeralamat');
            $table->foreignId('customer_id')->references('customerid')->on('customer');
            $table->char('customer_alamat', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_alamat');
    }
};
