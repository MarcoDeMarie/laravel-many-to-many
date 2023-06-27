<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;


class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['FrontEnd', 'Backend', 'FullStack', 'Web Application', 'Mobile App'];

        foreach($data as $type){
            $new_type = New Type();
            $new_type->name = $type;
            $new_type->slug = Str::slug($type, '-');
            $new_type->save();
        }
    }
}
