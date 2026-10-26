<?php

namespace Database\Seeders;

use App\Models\Researches\ResearchIndex;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResearchIndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampleData = [
            [
                'subject' => 'التفسير',
                'title' => 'منهج أبي عبيد في تفسير غريب الحديث',
                'researcher' => 'كاصد ياسر الزيدي',
                'number' => '1',
            ],
            [
                'subject' => 'أصول الفقه',
                'title' => 'دراسة تحليلية لأصول الفقه الإسلامي',
                'researcher' => 'أحمد محمد العلي',
                'number' => '2',
            ],
            [
                'subject' => 'البلاغة',
                'title' => 'البلاغة العربية في القرآن الكريم',
                'researcher' => 'فاطمة حسن السعيد',
                'number' => '3',
            ],
            [
                'subject' => 'التفسير',
                'title' => 'التفسير الموضوعي في الدراسات القرآنية',
                'researcher' => 'محمد عبدالله القرشي',
                'number' => '4',
            ],
            [
                'subject' => 'الأدب',
                'title' => 'الشعر الجاهلي: دراسة نقدية تحليلية',
                'researcher' => 'علي سعد المحمدي',
                'number' => '5',
            ],
            [
                'subject' => 'النحو',
                'title' => 'المصطلح النحوي في كتب التراث',
                'researcher' => 'خالد يوسف العبدالله',
                'number' => '6',
            ],
            [
                'subject' => 'التفسير',
                'title' => 'علم التفسير وتطوره عبر العصور',
                'researcher' => 'عمر بن سلمان الحارثي',
                'number' => '7',
            ],
            [
                'subject' => 'النقد الأدبي',
                'title' => 'النقد الأدبي في العصر العباسي',
                'researcher' => 'ليلى أحمد الفهد',
                'number' => '8',
            ],
            [
                'subject' => 'اللغة',
                'title' => 'الدراسات اللغوية المقارنة',
                'researcher' => 'حسام الدين محمد',
                'number' => '9',
            ],
            [
                'subject' => 'التفسير',
                'title' => 'التفسير بالرأي: دراسة تحليلية',
                'researcher' => 'نورا عبدالرحمن الشمري',
                'number' => '10',
            ],
            [
                'subject' => 'البلاغة',
                'title' => 'البلاغة والفصاحة في نهج البلاغة',
                'researcher' => 'طارق بن حمد العتيبي',
                'number' => '11',
            ],
            [
                'subject' => 'النحو',
                'title' => 'المدرسة الكوفية في النحو العربي',
                'researcher' => 'ريم خالد الدوسري',
                'number' => '12',
            ],
            [
                'subject' => 'الحديث',
                'title' => 'الحديث النبوي ودراسة الأسانيد',
                'researcher' => 'ياسر عبدالعزيز القحطاني',
                'number' => '13',
            ],
            [
                'subject' => 'الأدب',
                'title' => 'الشعر الإسلامي: خصائصه وفنونه',
                'researcher' => 'هند محمد الحربي',
                'number' => '14',
            ],
            [
                'subject' => 'النقد الأدبي',
                'title' => 'المنهج التحليلي في دراسة النصوص الأدبية',
                'researcher' => 'سالم بن فهد العنزي',
                'number' => '15',
            ],
        ];

        foreach ($sampleData as $data) {
            ResearchIndex::create($data);
        }
    }
}
