<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\prospects;
use App\Models\State;

class ProspectsFactory extends Factory
{
    protected $model = prospects::class;
     /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,            
            'phone' => $this->faker->unique()->phoneNumber ,           
            'state' => $this->faker->state() , 
            'city' => $this->faker->city() ,
            'address' => $this->faker->address ,
            'zip_code' =>  $this->faker->postcode  ,
            'comercial_business' =>  $this->faker->text() ,
            'commentary' => $this->faker->paragraph ,
        ];
    }
}
