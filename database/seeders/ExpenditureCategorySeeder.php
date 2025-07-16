<?php

namespace Database\Seeders;

use App\Models\ExpenditureCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenditureCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                "id" => "transportation",
                "name" => "حمل و نقل",
            ],
            [
                "id" => "commuting",
                "name" => "ایاب ذهاب",
            ],
            [
                "id" => "equipment_purchase",
                "name" => "خرید تجهیزات",
            ]
        ];

        foreach ($categories as $category) {
            $new = ExpenditureCategory::query()
                ->findOrNew($category["id"]);
            $new->id = $category["id"];
            $new->name = $category["name"];
            $new->save();
        }
    }
}
