<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        // Количество игроков
        Setting::query()->create(['name' => 'max_gamers_2']);
        Setting::query()->create(['name' => 'max_gamers_3']);
        Setting::query()->create(['name' => 'max_gamers_4']);
        Setting::query()->create(['name' => 'max_gamers_5']);
        Setting::query()->create(['name' => 'max_gamers_6']);

        // Скорость игры
        Setting::query()->create(['name' => 'normal']);
        Setting::query()->create(['name' => 'fast']);

        // Количество карт в колоде
        Setting::query()->create(['name' => 'cards_24']);
        Setting::query()->create(['name' => 'cards_36']);
        Setting::query()->create(['name' => 'cards_52']);

        // Режимы игры
        Setting::query()->create(['name' => 'thrown']); // Подкидной
        Setting::query()->create(['name' => 'transferable']); // Переводной

        Setting::query()->create(['name' => 'neighbors']); // Соседи
        Setting::query()->create(['name' => 'all']); // Все

        Setting::query()->create(['name' => 'cheaters']); // С шулерами
        Setting::query()->create(['name' => 'honest']); // Честная игра

        Setting::query()->create(['name' => 'classic']); // Классика
        Setting::query()->create(['name' => 'draw']); // Ничья

        // Валюта игры
        Setting::query()->create(['name' => 'select_mode_1']); // Монеты
        Setting::query()->create(['name' => 'select_mode_2']); // Деньги
    }
}
