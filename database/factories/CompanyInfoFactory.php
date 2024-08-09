<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyInfos>
 */
class CompanyInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'     => 'Royal Eco Land',
            'title'    => 'The New City For Modern Dhaka!',
            'slogan'   => 'The New City For Modern Dhaka !',
            'mission'  => 'Company Mission Goes Here',
            'vission'  => 'CompanyVission Goes Here',
            'overview' => 'Company Overview Goes Here... Lorem ipsum dolor amet consetetur adi pisicing elit sed eiusm tempor in cididunt ut labore dolore',
            'logo_png' => 'royal_eco_land.png',
            'favicon'  => 'fevicon.ico',
            'email' => 'royalecoland@gmail.com',
            'contact_number_one' => '+8802226664008',
            'contact_number_two' => '+1 (972) 818-4965',
            'address_one' => 'Nirman Samad Trade Center,(3rd Floor) Flat-C3 63/1, pioneer Road,Kakril,Dhaka-1000',
        ];
    }
}
