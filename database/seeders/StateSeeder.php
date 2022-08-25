<?php

namespace Database\Seeders;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Http::get('https://massivehome.com.mx/api/v1/public/States/151')->json();

        foreach($data as $key)
        {
            State::create([
                'country_id' => $key["countryId"] ,
                'code' =>  $key["StateCode"] ,
                'name' =>  $key["StateName"]
            ]);
        }
        
    }
}
