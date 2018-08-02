<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Country::class, 2)->create()->each(function ($country) {
            /** @var  App\Country $country */
            $country->cities()->saveMany(factory(App\City::class, 10)->create(['country_id' => $country->id])->each(function ($city) use($country) {
                /** @var  App\City $city */
                $city->users()->saveMany(factory(App\User::class, 10)->create(['country_id' => $country->id, 'city_id' => $city->id])->each(function ($user) {
                    /** @var  App\User $user */
                    $user->posts()->saveMany(factory(App\Post::class, 10)->make());
                }));
            }));
        });
    }
}
