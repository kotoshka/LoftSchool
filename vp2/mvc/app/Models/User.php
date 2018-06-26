<?php

namespace App\Models;

class User extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
    protected $fillable = ['login', 'password', 'photo', 'name', 'age', 'description'];

    public static function getList(int $id = 0, string $order = 'desc')
    {
        if ($id > 0) {
            return User::where('id', $id)->first();
        }
        return User::orderBy('age', $order)->get();
    }

    public static function isExist(string $login)
    {
        $user = User::where(function ($db) use ($login) {
            $db->whereRaw('LOWER(login) = ?', strtolower($login));
        })->first();

        if (!empty($user)) {
            return $user;
        }
        return false;
    }

    public static function checkPass(int $id, string $pass)
    {
        $hash = User::getHash($pass);
        $user = User::where(function ($db) use ($id, $hash) {
            $db->whereRaw('id = ?', $id);
            $db->whereRaw('password = ?', $hash);
        })->get();
        $user = $user->toArray();
        if (!empty($user)) {
            return $user;
        }
        return false;
    }

    public static function register(string $login, string $pass)
    {
        $hash = User::getHash($pass);
        $newUser = User::create(['login' => $login, 'password' => $hash]);
        return $newUser;
    }

    private static function getHash(string $pass)
    {
        $options = [
            'salt' => 'sredgftgyjhklj;liubyyjcrrftugyihjvjyrdytfughuki',
        ];
        $hash = password_hash($pass, PASSWORD_BCRYPT, $options);
        return $hash;
    }

    public static function remove(int $id)
    {
        return User::destroy($id);
    }

    public static function uploadFile(array $files)
    {
        try {
            // нужно ли использовать обе или достаточно move_uploaded_file?
            if (!is_uploaded_file($files['tmp_name'])) {
                throw new \Exception('Возможная атака с участием загрузки файла');
            }
            if (!move_uploaded_file($files['tmp_name'], "upload/" . $files['name'])) {
                throw new \Exception('Возможная атака с участием загрузки файла');
            }
            return $files['name'];
        } catch (\Exception $e) {
            $data['error'] = $e->getMessage();
        }
    }

    public static function updateProfile(int $id, array $data)
    {
        User::where('id', $id)->update($data);
    }

    public static function fake(int $num)
    {
        for ($i = 0; $i < $num; $i++) {
            $faker = \Faker\Factory::create();
            $user = new User();
            $user->login = $faker->name;
            $user->name = $faker->name;
            $user->age = $faker->numberBetween($min = 1, $max = 90);
            $user->password = $faker->password;
            $user->description = $faker->text;
            $user->photo = $faker->imageUrl(200, 200, 'cats', true, 'Faker');
            $user->save();
        }
    }
}
