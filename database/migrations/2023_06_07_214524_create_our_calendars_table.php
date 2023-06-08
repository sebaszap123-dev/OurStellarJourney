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
        Schema::create('our_calendars', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->date('event_date');
            $table->boolean('repeat')->default(false);
            $table->string('color')->nullable();
            $table->string('repeat_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_calendars');
    }
};