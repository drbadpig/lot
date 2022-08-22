<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComplaintReason>
 */
class ComplaintReasonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->sentence()
//            [
//                'name' => 'Спам',
//                'description' => 'Жалоба за рекламу в не предназначенном для этого месте'
//            ],
//            [
//                'name' => 'Запрещённые товары',
//                'description' => 'Реклама или прямая торговля оружием, наркотиками, проституцией и другими запрещёнными товарами'
//            ],
//            [
//                'name' => 'Обман',
//                'description' => 'Опасная массовая дезинформация или мошенничество'
//            ],
//            [
//                'name' => 'Насилие и вражда',
//                'description' => 'Насилие, дискриминация по любым признакам, призывы к травле, склонение к самоубийству'
//            ],
//            [
//                'name' => 'Материалы для взрослых',
//                'description' => 'Порнография, в т.ч. детская'
//            ],
        ];
    }
}
