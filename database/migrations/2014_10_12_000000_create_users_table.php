<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gebruikers', function (Blueprint $table) {
            $table->id();
            $table->boolean('blogger')->default(0); //Account is blogger if value is 1
            $table->string('naam');
            $table->date('geboortedatum')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('wachtwoord');
            $table->integer('mobiel')->nullable();
            $table->string('straat')->nullable();
            $table->string('huisnmr')->nullable();
            $table->string('woonplaats')->nullable();
            $table->string('postcode')->nullable();
            $table->rememberToken();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gebruikers');
    }
}
