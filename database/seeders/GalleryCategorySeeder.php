<?php

namespace Database\Seeders;

use App\Models\GalleryCategory;
use Illuminate\Database\Seeder;

class GalleryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaults = [
            ['name' => 'Resort', 'short_description' => 'Property and amenities'],
            ['name' => 'Rooms', 'short_description' => 'Room interiors and features'],
            ['name' => 'Dining', 'short_description' => 'Food and restaurant'],
            ['name' => 'Activities', 'short_description' => 'Experiences and events'],
        ];

        foreach ($defaults as $data) {
            GalleryCategory::firstOrCreate(['name' => $data['name']], $data);
        }
    }
}
