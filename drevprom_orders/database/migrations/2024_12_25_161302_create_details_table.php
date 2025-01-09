<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('shipment_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('order');
            $table->string('size');
            $table->string(column: 'status');
            $table->string(column: 'place');
            $table->string('quantity');
            $table->string('color');
            $table->string('info')->nullable();
            $table->boolean('active')->default(true);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
