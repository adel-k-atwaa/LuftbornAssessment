<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::insert("insert into users (name,email,password) values()",[])
        User::create([
            'name' => "adel kamal",
            'password' => Hash::make("test12345"),
            'email' => "adelkamal911@gmail.com"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
