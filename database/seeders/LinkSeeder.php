<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Link::create([
        'sequence' => '1',
        'link_name' => 'Linkedin',
        'link_addres' => 'https://linkedin',
        ]);
    }
}
