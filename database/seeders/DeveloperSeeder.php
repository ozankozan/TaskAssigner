<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developers = $this->generateDevelopers();
        Developer::insert($developers);
    }

    private function generateDevelopers(): array
    {
        $developers = [];
        for ($i = 1; $i < 6; $i++) {
            $developers[] = [
                'name' => 'DEV' . $i,
                'level' => $i,
                'weekly_capacity' => 45
            ];
        }

        return $developers;
    }
}
