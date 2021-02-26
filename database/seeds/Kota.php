<?php

use Illuminate\Support\Facades\DB;
use Flynsarmy\CsvSeeder\CsvSeeder;

class Kota extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
    {
        $this->table = 'kotas';
        $this->csv_delimiter= ';';
        $this->filename = base_path().'/database/seeds/csv/cities.csv';
    }

    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
