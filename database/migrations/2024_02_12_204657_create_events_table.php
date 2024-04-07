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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->string('name');
            // $table->string('description');
            $table->string('location')->nullable();
            // $table->string('time');
            $table->string('image');
            $table->string('category');
            $table->string('status')->default('active');
            // $table->date('date');
            $table->integer("ticket_price");
            $table->integer("free_guests")->default(0)->nullable();
            // $table->integer("paid_guests");
            $table->float("extra_price")->nullable();
            $table->string('vod__cash');
            $table->string('etis__cash');


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
