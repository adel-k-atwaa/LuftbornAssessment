<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

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
        $user = User::create([
            'name' => "adel kamal",
            'password' => Hash::make("test12345"),
            'email' => "adelkamal911@gmail.com"
        ]);
        $user->givePermissionTo(Permission::all());

        $user = User::create([
            'name' => "adel kamal 2",
            'password' => Hash::make("test12345"),
            'email' => "adelkamal922@gmail.com"
        ]);
        $user->givePermissionTo(Permission::all());
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
