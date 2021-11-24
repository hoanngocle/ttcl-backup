<?php

namespace Database\Seeders;

use App\Imports\TermImport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TermTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(TBL_TERM)->truncate();

        Excel::import(
            new TermImport(),
            storage_path('app/public/data_seeder/seeder_terms.xlsx')
        );
    }
}
