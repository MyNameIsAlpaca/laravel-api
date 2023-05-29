<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = new Project();

        $project->name = 'Boolzapp';
        $project->desc = 'riproduzione di whatsapp';
        $project->language = 'Javascript';
        $project->publication_date = '22/03/2023';
        $project->link = 'https://github.com/MyNameIsAlpaca/vue-boolzapp';
        $project->slug = Str::slug($project->name, '-');

        $project->save();
    }
}
