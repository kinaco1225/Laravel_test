<?php

namespace Database\Factories;

use App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'=> $this->faker->lastName,
            'last_name'=> $this->faker->firstName,
            'gender'=>$this->faker->numberBetween(1,3),
            'email' =>$this->faker->email,
            'tel'=> rand(1000, 9999) . '-' . rand(1000, 9999) . '-' . rand(1000, 9999),
            'address' => $this->faker->address,
            'building' => $this->faker->randomElement([
                'テストマンション101',
                'ハイツさくら202',
                '青山ビル3F',
                'アーバンコート105',
                'グリーンハイム201',
            ]),
            'detail' => $this->faker->text(120),'category_id' =>$this->faker->numberBetween(1,5),
        ];
    }
}
