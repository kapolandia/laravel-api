<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use illuminate\Support\Str;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['HTML', 'CSS', 'SCSS', 'SASS', 'Javascript', 'Vue', 'PHP', 'Laravel 5'];

        foreach($technologies as $technology){
            $newTech = new Technology();
            $newTech->name = $technology;
            $newTech->slug = Str::slug($technology, '-');
            $newTech->save();
        }
    }
}
