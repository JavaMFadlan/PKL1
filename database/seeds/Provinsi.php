<?php

use Illuminate\Support\Facades\DB;
use Flynsarmy\CsvSeeder\CsvSeeder;

class Provinsi extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
    {
        $this->table = 'provinsis';
        $this->csv_delimiter= ';';
        $this->filename = base_path().'/database/seeds/csv/provinces.csv';
    }

    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
