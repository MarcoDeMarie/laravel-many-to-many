<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['HTML', 'CSS', 'JavaScrip', 'PHP', 'C++'];

        foreach($data as $technology){
            $new_technology = New Technology();
            $new_technology->name = $technology;
            $new_technology->slug = Str::slug($technology, '-');
            $new_technology->save();
        }
    }
}

