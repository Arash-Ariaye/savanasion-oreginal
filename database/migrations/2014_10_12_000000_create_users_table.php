<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('user')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role')->default(2);
            $table->integer('status')->default(1);
            $table->string('group');
            $table->rememberToken();
            $table->timestamps();
        });
        User::create([
            'name' => 'آرش اسدی',
            'user' => 'admin',
            'email' => 'arash@yahoo.com',
            'email_verified_at' => time(),
            'password' => bcrypt('0123450'),
            'role' => 1,
            'group' => '00'

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
