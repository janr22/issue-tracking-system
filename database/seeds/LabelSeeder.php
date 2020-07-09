<?php

use Illuminate\Database\Seeder;
use App\Label;
use Illuminate\Support\Facades\Lang;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Label::create([
            'name' => 'bug',
            'description' => 'Something is not working',
            'color' => 'danger'
        ]);
        Label::create([
            'name' => 'duplicate',
            'description' => 'This issue or pull request already exists',
            'color' => 'secondary',
        ]);
        Label::create([
            'name' => 'enhancement',
            'description' => 'New feature or request',
            'color' => 'success',
        ]);
        Label::create([
            'name' => 'good first issue',
            'description' => 'Good for newcomers',
            'color' => 'white',
        ]);
        Label::create([
            'name' => 'help wanted',
            'description' => 'Extra attention is needed',
            'color' => 'info',
        ]);
        Label::create([
            'name' => 'invalid',
            'description' => 'This does not seem right',
            'color' => 'warning',
        ]);
        Label::create([
            'name' => 'question',
            'description' => 'Further information is requested',
            'color' => 'primary',
        ]);
        Label::create([
            'name' => 'wontfix',
            'description' => 'This will not be worked on',
            'color' => 'dark',
        ]);
    }
}
