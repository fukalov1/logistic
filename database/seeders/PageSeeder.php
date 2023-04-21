<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
                [
                    'name' => 'Главная',
                    'url' => '',
                    'order' => 1
                ],
                [
                    'name' => 'Услуги',
                    'url' => 'uslugi',
                    'relation' => 1,
                    'order' => 2
                ],
                [
                    'name' => 'Новости',
                    'url' => 'novosti',
                    'order' => 3
                ],
                [
                    'name' => 'О Компании',
                    'url' => 'o_kompanii',
                    'order' => 4
                ],
                [
                    'name' => 'Контакты',
                    'url' => 'kontakti',
                    'order' => 5
                ],
                [
                    'parent_id' => 2,
                    'name' => 'Внутрироссийские перевозки',
                    'url' => $this->translit('услуги/'),
                    'order' => 1
                ],
                [
                    'parent_id' => 2,
                    'name' => 'Международная логистика',
                    'url' => $this->translit('услуги/Международная логистика'),
                    'order' => 2
                ],
                [
                    'parent_id' => 2,
                    'name' => 'Контейнерные перевозки',
                    'url' => $this->translit('услуги/Контейнерные перевозки'),
                    'order' => 3
                ],
                [
                    'parent_id' => 2,
                    'name' => 'Логистика нефтяных и газовых месторождений',
                    'url' => $this->translit('услуги/Логистика нефтяных и газовых месторождений'),
                    'order' => 4
                ],
                [
                    'parent_id' => 2,
                    'name' => 'Перевозки негабаритных грузов',
                    'url' => $this->translit('услуги/Перевозки негабаритных грузов'),
                    'order' => 5
                ],
                [
                    'parent_id' => 2,
                    'name' => 'Перевозки зерновых культур',
                    'url' => $this->translit('услуги/Перевозки зерновых культур'),
                    'order' => 6
                ]
        ];

        Page::truncate();
        foreach ($data as $item) {
            Page::updateOrCreate($item);
        }
    }

    private function translit($s)
    {
        $s = (string)$s; // преобразуем в строковое значение
        $s = strip_tags($s); // убираем HTML-теги
        $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
        $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
        $s = trim($s); // убираем пробелы в начале и конце строки
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
        $s = strtr($s, array('а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'ъ' => '', 'ь' => ''));
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
        $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
        return $s; // возвращаем результат
    }
}
