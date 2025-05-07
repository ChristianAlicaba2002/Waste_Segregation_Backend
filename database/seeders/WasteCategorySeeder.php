<?php

namespace Database\Seeders;

use App\Models\WasteCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WasteCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['category_id' => 1 , 'category_name' => 'Metal'],
            ['category_id' => 2 , 'category_name' => 'Paper'],
            ['category_id' => 3 , 'category_name' => 'Plastic'],
            
        ];

        foreach($items as $item)
        {
            WasteCategory::create($item);
        }

       
    }
}
