<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('employee_id'); // as the username to login
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->text('address')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->unique();
            $table->string('type')->default('employee');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status')->default(true);
            $table->boolean('is_new')->default(true);

            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        User::create([
            'employee_id' => '2022-001',
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'phone_1' => '+63 921 123 5467',
            'phone_2' => '+63 921 890 1234',
            'type' => 'admin',
            'is_new' => false,
            'email' => 'admin@sample.com',
            'password' => Hash::make('sample'),
        ]);
        User::create([
            'employee_id' => '2022-002',
            'first_name' => 'Sample',
            'last_name' => 'HR',
            'phone_1' => '+63 921 123 5467',
            'phone_2' => '+63 921 890 1234',
            'type' => 'hr',
            'is_new' => false,
            'email' => 'hr@sample.com',
            'password' => Hash::make('sample'),
        ]);
        User::create([
            'employee_id' => '2022-003',
            'first_name' => 'Sample',
            'last_name' => 'Employee',
            'phone_1' => '+63 921 123 5467',
            'phone_2' => '+63 921 890 1234',
            'type' => 'employee',
            'is_new' => true,
            'email' => 'employee@sample.com',
            'password' => Hash::make('sample'),
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
