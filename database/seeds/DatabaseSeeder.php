<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Kecamatan::class);
        $this->call(Kota::class);
        $this->call(Provinsi::class);
    }
}
