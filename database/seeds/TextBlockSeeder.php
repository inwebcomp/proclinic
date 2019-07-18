<?php

use App\Models\Textblock;
use Illuminate\Database\Seeder;

class TextBlockSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Textblock::create([
            'uid'   => 'main_header',
            'title' => 'Главный заголовок',
        ]);
        Textblock::create([
            'uid'   => 'sub_main_header',
            'title' => 'Главный подзаголовок',
        ]);
        Textblock::create([
            'uid'   => 'clinic_subheading',
            'title' => 'Подзаголовок раздела Наша клиника',
        ]);
        Textblock::create([
            'uid'   => 'address',
            'title' => 'Адрес',
        ]);
        Textblock::create([
            'uid'   => 'copyrights',
            'title' => 'Подпись внизу сайта (Copyrights)',
        ]);
    }
}
