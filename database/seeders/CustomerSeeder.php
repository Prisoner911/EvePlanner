<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\customerDetails;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i < 20; $i++) {
            $faker = Faker::create();
            $customers = new customerDetails();
            $customers->FirstName = $faker->firstName;
            $customers->LastName = $faker->lastName;
            $customers->email = $faker->email;
            $customers->PhoneNo = $faker->phoneNumber;
            $customers->EventType =  "wedding";
            $customers->Venue = "own";
            $customers->EventDate = $faker->date;
            $customers->GuestsAmount =  $faker->numberBetween(1, 100);
            $customers->CommunicationMethod = "MeetingAtOffice";
            $customers->StartTime =  $faker->time();
            $customers->EndTime = $faker->time();
            $customers->Services = json_encode("Decoration");
            $customers->AdditionalComments = "";
            $customers->EventStatus = "pending";
            $customers->save();
        }
    }
}
