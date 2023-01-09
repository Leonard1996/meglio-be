<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;

trait CSVSeeder
{
    public function insert_from_csv($table_name, $csv_name)
    {
        DB::table($table_name)->delete();

        $row = 0;
        $header_row = array();
        $data_to_insert = array();
        $import = fopen(base_path("database/data/" . $csv_name . ".csv"), 'r');
        while ($data = fgetcsv($import)) {
            $row ++;
            if ($row == 1) {
                $header_row = $data;
                continue;
            }
            $data_to_insert[] = array_combine($header_row, $data);
            if ($row % 500 == 0){
                DB::table($table_name)->insert($data_to_insert);
                $data_to_insert = array();
            }
        }
        if ($data_to_insert) {
            DB::table($table_name)->insert($data_to_insert);
        }
        fclose($import);
    }

    public function insert_from_csv_large_file(string $table_name,string  $csv_name, int $chunk_split, array $header_row)
    {
        LazyCollection::make(function () use ($csv_name) {
            $handle = fopen(base_path("database/data/" . $csv_name . ".csv"), 'r');
            
            while (($line = fgetcsv($handle)) !== false) {
                $row = $line;
                yield $row;
            }
    
            fclose($handle);
        })
        ->skip(1)
        ->chunk($chunk_split)
        ->each(function (LazyCollection $chunk) use ($table_name, $header_row) {
            $records = $chunk->map(function ($row) use ($header_row) {
                // dd($row);
              if(count($row) !== count($header_row)){
                echo json_encode($row);
                return [];
              }else{
                return array_combine($header_row, $row); 
              }                    
            })->toArray();
            DB::table($table_name)->insert($records);
        });

    }
}
