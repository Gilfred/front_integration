<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $data=[
            "Dépot d'argent",
            "Retrait d'argent",
        ];
        foreach($data as $element ){
            DB::table('operations')->insert([
                'type_operation'=>$element
            ]);
        }

        

        // DB::table('operations')-insert
    }
}
