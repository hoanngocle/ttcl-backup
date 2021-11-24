<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SetCourseImport;

class SetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(TBL_SET)->truncate();

        Excel::import(
            new SetCourseImport(),
            storage_path('app/public/data_seeder/seeder_sets.xlsx')
        );
    }
}
