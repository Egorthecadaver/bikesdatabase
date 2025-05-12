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
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->foreignId('bike_type_id')->constrained('bike_types');
            $table->boolean('is_available')->default(true);
            $table->decimal('price_per_hour', 8, 2);
            $table->timestamp('created_at')->useCurrent(); // Текущее время по умолчанию
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // Автообновление
        });

    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bikes');
    }
};
