<?php

namespace Database\Factories;

// use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = \App\Models\User::select('UserID')->get();
        return [
            'PhoneID' => "TELE-X-".Str::random(18)."-PHO-NY",
            'phone_name' => $this->faker->name(),
            'model' => $this->faker->name(),
            'serial_number' => $this->faker->imei(),
            'imei' => $this->faker->imei(),
            'imei2' => $this->faker->imei(),
            'UserID' => ($userIds)[random_int(0,count($userIds)-1)]['UserID'],//'bTeCoOnwdOl5YpT8SkoNRvFGx0jXAcyS',
        ];
    }
}