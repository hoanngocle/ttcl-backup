<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $listTerm = Term::query()->where('set_id', 3)->get();

        foreach ($listTerm as $key => $value) {
            $data[$key] = [
                'user_id' => 1,
                'set_id' => $value['set_id'],
                'term_id' => $value['id'],
                'correct' => rand(0,3),
                'incorrect' => rand(0,3),
                'favorite' => rand(0,1)
            ];
        }

        DB::table(TBL_RECORD)->truncate();
        DB::table(TBL_RECORD)->insert($data);
    }
}
