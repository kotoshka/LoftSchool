<?php
require_once "vendor/autoload.php";
require_once "app/config.php";

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Product;
use App\Models\Category;

Capsule::schema()->dropIfExists('products');
Capsule::schema()->create('products', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->string('category');
    $table->integer('price');
    $table->string('description');
    $table->string('photo');
    $table->string('currency');
});

Capsule::schema()->dropIfExists('categories');
Capsule::schema()->create('categories', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->string('description');
    $table->string('photo');
});

for ($i = 0; $i < 20; $i++) {
    $faker = \Faker\Factory::create();
    $user = new Product();
    $user->name = $faker->word;
    $user->category = $faker->numberBetween($min = 1, $max = 20);
    $user->price = $faker->numberBetween($min = 1000, $max = 20000);
    $user->description = $faker->text;
    $user->photo = $faker->imageUrl(200, 200, 'cats', true, 'Faker');
    $user->description = $faker->currencyCode;
    $user->save();
}

for ($i = 0; $i < 20; $i++) {
    $faker = \Faker\Factory::create();
    $user = new Category();
    $user->name = $faker->word;
    $user->description = $faker->text;
    $user->photo = $faker->imageUrl(200, 200, 'cats', true, 'Faker');
    $user->save();
}
