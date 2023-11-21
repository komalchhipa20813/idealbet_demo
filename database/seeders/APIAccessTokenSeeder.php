<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\APIAccessToken;
use Illuminate\Support\Str;
use Carbon\Carbon;

class APIAccessTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        APIAccessToken::insert([
            [
                'access_token' => Str::random(150),
                'created_at' =>  Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
