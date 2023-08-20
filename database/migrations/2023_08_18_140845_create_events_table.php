<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Organizer;
use App\Models\User;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class,'user_id');
            $table->foreignIdFor(Organizer::class,'organizer_id');
            $table->string('name');
            $table->string('detail');
            $table->dateTime('dateTime');
            $table->string('image_path')->nullable();
            $table->string('address');
            $table->string('province');
            $table->string('district');
            $table->string('subdistrict');
            $table->string('location_detail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
