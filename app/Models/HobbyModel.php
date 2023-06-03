<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HobbyModel extends Model
{
    use HasFactory;

    public function aboutMe()
    {
        $result = [
            [
                'id' => 'MyHobby',
                'name' => 'Мои хобби',
                'description' => ['Писательство/чтение', 'Вязание на спицах', 'Плавание', 'Компьютерные игры'],
            ],

            [
                'id' => 'FavBands',
                'name' => 'Любимая музыка',
                'description' => ['My Chemical Romance', 'Silverstein', 'Imagine Dragons', 'The Rasmus', 'Skillet', 'Breaking Benjamin'],
            ],

            [
                'id' => 'FavBooks',
                'name' => 'Любимые произведения',
                'description' => ['"Опиумная война" Р. Куанг', '"Франкенштейн" М. Шелли'],
            ],
        ];
        return $result;
    }
}
