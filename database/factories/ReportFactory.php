<?php

namespace Database\Factories;

use ArrayIterator;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $phoneIds = \App\Models\Phone::select('PhoneID')->get();
        // $status = [ 1, 2, 3 ];
        return [
            'ReportID' => "RE-".Str::random(18)."-PORT",
            'status' => random_int(1, 3),
            'report_text' => $this->faker->name(),
            'PhoneID' => ($phoneIds)[random_int(0,count($phoneIds)-1)]['PhoneID'],
        ];
    }
}
