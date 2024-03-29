<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use function PHPSTORM_META\type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = Type::all();
        $typeIds = $types->pluck('id');

        $technologies = Technology::all();
        $technologyIds = $technologies->pluck('id');

        for ($i = 0; $i < 20; $i++) {

            $new_project = new Project();
            $new_project->name = $faker->name();
            $new_project->admin = $faker->name();
            $new_project->bio = $faker->paragraph();
            $new_project->thumb = ('https://api.lorem.space/image/movie?w=150&amp;amp;amp;amp;h=220');
            $new_project->type_id = $faker->optional()->randomElement($typeIds);


            $new_project->save();
           $new_project->technologies()->attach($faker->randomElements($technologyIds, null));
        }
    }
}
