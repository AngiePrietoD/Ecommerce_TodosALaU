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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->decimal('alto', 8, 2);
            $table->decimal('ancho', 8, 2);
            $table->decimal('largo', 8, 2);
            $table->decimal('peso', 8, 2);
            $table->string('tracking', 64);
            $table->text('notas')->nullable();
            $table->foreignId('user_id')->constrained()->restrictOnDelete('cascade');
            $table->foreignId('package_type_id')->constrained()->restrictOnDelete('cascade');
            $table->foreignId('shipper_id')->constrained()->restrictOnDelete('cascade');
            $table->foreignId('transport_id')->restrictOnDelete('cascade')->nullable();
            $table->foreignId('package_status_id')->default(1);
            $table->foreignId('dispatch_id')->nullable();
            $table->timestamp('dispatched_at', 0)->nullable();
            $table->timestamp('delivered_at', 0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
