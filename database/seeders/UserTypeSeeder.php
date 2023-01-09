<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $document_types = [
            [
                'id' => 1,
                'name' => 'area manager'
            ],
            [
                'id' => 2,
                'name' => 'broker agents',
            ],
            [
                'id' => 3,
                'name' => 'broker company',
            ]
        ];



        UserType::upsert($document_types,
            ['name'],['name']
        );

    }
}
