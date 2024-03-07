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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Foreign key to the users table
            $table->string('company_name');
            $table->string('address');
            $table->string('phone_number')->unique();
            $table->string('bank_name');
            $table->longText('details')->nullable();
            $table->string('bank_account_number');
            $table->string('payment_gateway_info')->nullable();
            $table->string('facebook_store_url')->nullable();
            $table->string('instagram_store_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
