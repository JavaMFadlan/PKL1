<?php

use Illuminate\Support\Facades\DB;
use Flynsarmy\CsvSeeder\CsvSeeder;

class Kecamatan extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
    {
        $this->table = 'kecamatans';
        $this->csv_delimiter= ';';
        $this->filename = base_path().'/database/seeds/csv/districts.csv';
    }

    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
