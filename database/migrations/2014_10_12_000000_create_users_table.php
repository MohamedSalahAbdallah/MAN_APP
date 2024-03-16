<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->collation('utf8mb4_bin')->unique();
            $table->string('nid')->unique(); // Add User NID column
            $table->string('phone');
            $table->string('university')->nullable();
            $table->string('user_name')->unique();
            $table->string('user_role')->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        //create admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@localhost.com',
            'nid' => '123456789',
            'phone' => '123456789',
            'user_name' => 'admin',
            'user_role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
            'password' => bcrypt("password"),

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
