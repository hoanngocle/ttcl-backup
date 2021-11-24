<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $courseJapaneseData = [
            [
                'name' => 'Minna No Nihongo I',
                'description' => 'Giáo trình tiếng Nhật cho mọi người level sơ cấp phần 1',
                'created_by' => 'Emillia',
                'level' => 'N5'
            ],
            [
                'name' => 'Minna No Nihongo II',
                'description' => 'Giáo trình tiếng Nhật cho mọi người level sơ cấp phần 2',
                'created_by' => 'Emillia',
                'level' => 'N4'
            ],
            [
                'name' => 'Marugoto B1 Intermediate 1',
                'description' => 'Giáo trình tiếng Nhật giao tiếp level trung cấp phần 1',
                'created_by' => 'Emillia',
                'level' => 'N3'
            ],
            [
                'name' => 'Marugoto B1 Intermediate 2',
                'description' => 'Giáo trình tiếng Nhật giao tiếp level trung cấp phần 2',
                'created_by' => 'Emillia',
                'level' => 'N3'
            ],
            [
                'name' => 'Mimikara Oboeru N3',
                'description' => 'Giáo trình tiếng Nhật cho level N3',
                'created_by' => 'Emillia',
                'level' => 'N3'
            ],
            [
                'name' => 'Mimikara Oboeru N2',
                'description' => 'Giáo trình tiếng Nhật cho level N2',
                'created_by' => 'Emillia',
                'level' => 'N2'
            ],
            [
                'name' => 'Mimikara Oboeru N1',
                'description' => 'Giáo trình tiếng Nhật cho level N1',
                'created_by' => 'Emillia',
                'level' => 'N1'
            ],
            [
                'name' => 'Kanji Look And Learn ',
                'description' => 'Giáo trình Hán tự cho level sơ cấp',
                'created_by' => 'Emillia',
                'level' => 'N5'
            ],
            [
                'name' => 'Kanji Soumatome N3',
                'description' => 'Giáo trình Hán tự cho level N3',
                'created_by' => 'Emillia',
                'level' => 'N3'
            ],
            [
                'name' => 'Kanji 300 Shokyuu',
                'description' => '300 từ Hán tự cho level sơ cấp',
                'created_by' => 'Emillia',
                'level' => 'N5'
            ],
            [
                'name' => 'Kanji 700 Chuukyu',
                'description' => '700 từ Hán tự cho level trung cấp',
                'created_by' => 'Emillia',
                'level' => 'N3'
            ],
            [
                'name' => 'Kanji 1000 Koukyuu',
                'description' => '1000 từ Hán tự cho level cao cấp',
                'created_by' => 'Emillia',
                'level' => 'N2'
            ],
        ];

        $courseEnglishData = [
            [
                'name' => 'Vocabulary Class 6',
                'description' => 'Tổng hợp từ vựng tiếng Anh lớp 6',
                'created_by' => 'Emillia',
                'level' => LEVEL_BEGINNER
            ],
            [
                'name' => 'Vocabulary Class 7',
                'description' => 'Tổng hợp từ vựng tiếng Anh lớp 7',
                'created_by' => 'Emillia',
                'level' => LEVEL_BEGINNER
            ],
            [
                'name' => 'Vocabulary Class 8',
                'description' => 'Tổng hợp từ vựng tiếng Anh lớp 8',
                'created_by' => 'Emillia',
                'level' => LEVEL_ELEMENTARY
            ],
            [
                'name' => 'Vocabulary Class 9',
                'description' => 'Tổng hợp từ vựng tiếng Anh lớp 9',
                'created_by' => 'Emillia',
                'level' => LEVEL_ELEMENTARY
            ],
            [
                'name' => 'Vocabulary Class 10',
                'description' => 'Tổng hợp từ vựng tiếng Anh lớp 10',
                'created_by' => 'Emillia',
                'level' => LEVEL_PRE_INTERMEDIATE
            ],
            [
                'name' => 'Vocabulary Class 11',
                'description' => 'Tổng hợp từ vựng tiếng Anh lớp 11',
                'created_by' => 'Emillia',
                'level' => LEVEL_PRE_INTERMEDIATE
            ],
            [
                'name' => 'Vocabulary Class 12',
                'description' => 'Tổng hợp từ vựng tiếng Anh lớp 12',
                'created_by' => 'Emillia',
                'level' => LEVEL_INTERMEDIATE
            ],
            [
                'name' => '600 Essential Words For The TOEIC',
                'description' => 'Cung cấp những từ vựng cần thiết để luyện thi TOEIC',
                'created_by' => 'Emillia',
                'level' => LEVEL_ELEMENTARY
            ],
            [
                'name' => '4000 Essential English Words 1',
                'description' => '4000 Essential English Words cuốn 1. Bao gồm 30 units, mỗi unit khoảng 20-25 từ tùy theo từng bài',
                'created_by' => 'Emillia',
                'level' => LEVEL_BEGINNER
            ],
            [
                'name' => '4000 Essential English Words 2',
                'description' => '4000 Essential English Words cuốn 2. Bao gồm 30 units, mỗi unit khoảng 20-25 từ tùy theo từng bài',
                'created_by' => 'Emillia',
                'level' => LEVEL_BEGINNER
            ],
            [
                'name' => '4000 Essential English Words 3',
                'description' => '4000 Essential English Words cuốn 3. Bao gồm 30 units, mỗi unit khoảng 20-25 từ tùy theo từng bài',
                'created_by' => 'Emillia',
                'level' => LEVEL_BEGINNER
            ],
            [
                'name' => '4000 Essential English Words 4',
                'description' => '4000 Essential English Words cuốn 4. Bao gồm 30 units, mỗi unit khoảng 20-25 từ tùy theo từng bài',
                'created_by' => 'Emillia',
                'level' => LEVEL_BEGINNER
            ],
            [
                'name' => '4000 Essential English Words 5',
                'description' => '4000 Essential English Words cuốn 5. Bao gồm 30 units, mỗi unit khoảng 20-25 từ tùy theo từng bài',
                'created_by' => 'Emillia',
                'level' => LEVEL_BEGINNER
            ],
            [
                'name' => '4000 Essential English Words 6',
                'description' => '4000 Essential English Words cuốn 6. Bao gồm 30 units, mỗi unit khoảng 20-25 từ tùy theo từng bài',
                'created_by' => 'Emillia',
                'level' => LEVEL_BEGINNER
            ],
        ];

        foreach ($courseJapaneseData as $key => $value) {
            $data[$key] = [
                'language' => 'JP',
                'name' => $value['name'],
                'description' =>  $value['description'],
                'created_by' =>  $value['created_by'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];
        }

        foreach ($courseEnglishData as $key => $value) {
            $data[$key] = [
                'language' => 'EN',
                'name' => $value['name'],
                'description' =>  $value['description'],
                'created_by' =>  $value['created_by'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];
        }

        DB::table(TBL_COURSE)->truncate();
        DB::table(TBL_COURSE)->insert($data);
    }
}
