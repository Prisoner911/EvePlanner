<?php

namespace Database\Seeders;

use App\Models\AgentDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            $faker = Faker::create();
            $agents = new AgentDetails();
            $agents->Name = $faker->name;
            $agents->PhoneNo = $faker->phoneNumber;
            $agents->Email = $faker->email;
            $agents->Address = $faker->address;
            $agents->Access_Rights = "yes";
            $agents->Password = Hash::make($faker->password);
            $agents->save();
        }
    }
}
