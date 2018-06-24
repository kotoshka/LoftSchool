<?php

namespace App\Models;

class File extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'user_id'];

    public static function getList(int $userId, int $id = 0)
    {
        if ($id > 0) {
            return File::where('id', $id)->where('user_id', $userId)->first();
        }
        $data = File::where('user_id', $userId)->get();
        $data = $data->toArray();
        return $data;
    }

    public static function addFile(int $userId, string $fileName)
    {
        $newFile = File::create(['name' => $fileName, 'user_id' => $userId]);
        return $newFile;
    }

    public static function removeFile(int $id, int $userId)
    {
        try {
            $file = File::getList($userId, $id);
            if (!$file['id']) {
                throw new \Exception('Файл не существует!');
            }
            return File::destroy($id);
        } catch (\Exception $e) {
            $data['error'] = $e->getMessage();
            return $data['error'];
        }
    }
}
