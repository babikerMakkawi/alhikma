<?php

namespace Database\Seeders;

use App\Models\Researches\ResearchIndex;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class ResearchIndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = public_path('research-index.xlsx');

        $rows = Excel::toCollection([], $filePath);

        $research_index = [];
        $looplimit = 0;

        foreach ($rows[0] as $row) {
            if ($looplimit++ == 700) break;


            $research_index[] = [
                'subject' => $row[7] ?? '',
                'title' => $row[6] ?? '',
                'researcher' => $row[5] ?? '',
                'number' => $row[4] ?? '',
            ];
        }

        ResearchIndex::insert($research_index);
    }
}
