<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sector;
use Illuminate\Support\Facades\File;

class SectorsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sector::truncate();

        $sectors = json_decode(File::get('database/data/sectors.json'));

        foreach ($sectors as $sector) {
            Sector::create([
                'name' => $sector->name,
                'value' => $sector->value
            ]);
        }
    }
}
