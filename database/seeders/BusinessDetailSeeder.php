<?php

namespace Database\Seeders;

use App\Models\BusinessDetail;
use Illuminate\Database\Seeder;

class BusinessDetailSeeder extends Seeder
{
    public function run(): void
    {
        BusinessDetail::updateOrCreate(
            ['id' => 1],
            [
                'address' => 'Shop G8, Essence of the Middle East',
                'phone' => '+27 67 684 4506',
                'email' => 'info@essencemiddleeast.co.za',
                'hours' => 'Mon-Sat 9am–6pm | Sun 9am–3pm',
            ]
        );
    }
}
