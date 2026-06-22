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
    Schema::create('profiles', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->date('date_of_birth')->nullable();

        $table->enum('gender', [
            'Male',
            'Female',
            'Other'
        ])->nullable();

        $table->string('phone',20)->nullable();

        $table->string('address')->nullable();

        $table->string('blood_group',5)->nullable();

        $table->decimal('height',5,2)->nullable();

        $table->decimal('weight',5,2)->nullable();

        $table->string('emergency_contact')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
