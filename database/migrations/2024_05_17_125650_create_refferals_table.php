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
        Schema::create('refferals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->integer('order_id');
            $table->integer('refferal_percentage');
            $table->decimal('refferal_profit', 20, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refferals');
    }
};
