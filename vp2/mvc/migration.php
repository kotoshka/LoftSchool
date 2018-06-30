<?php
require_once "vendor/autoload.php";
require_once "app/config.php";

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\User;
use App\Models\File;

Capsule::schema()->dropIfExists('users');
Capsule::schema()->create('users', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->string('email')->unique();
    $table->string('login');
    $table->string('password');
    $table->integer('age');
    $table->string('description');
    $table->string('photo');
});

Capsule::schema()->dropIfExists('files');
Capsule::schema()->create('files', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('user_id');
    $table->string('name');
});

for ($i = 0; $i < 20; $i++) {
    $faker = \Faker\Factory::create();
    $user = new User();
    $user->login = $faker->name;
    $user->name = $faker->name;
    $user->email = $faker->email;
    $user->age = $faker->numberBetween($min = 1, $max = 90);
    $user->password = $faker->password;
    $user->description = $faker->text;
    $user->photo = $faker->imageUrl(200, 200, 'cats', true, 'Faker');
    $user->save();
}

for ($i = 0; $i < 20; $i++) {
    $faker = \Faker\Factory::create();
    $user = new File();
    $user->name = $faker->imageUrl(200, 200, 'cats', true, 'Faker');
    $user->user_id = $faker->numberBetween($min = 1, $max = 90);
    $user->save();
}
