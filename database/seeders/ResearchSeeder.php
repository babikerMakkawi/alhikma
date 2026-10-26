<?php

namespace Database\Seeders;

use App\Models\Researches\Research;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $researches = [
            [
                'title' => 'منهج أبي عبيد في تفسير غريب الحديث',
                'researcher' => 'كاصد ياسر الزيدي - وليد بن أحمد الحسين',
                'number_of_pages' => 380,
                'date' => '1999-01-15',
                'file' => 'research-1.pdf',
                'views' => 245,
            ],
            [
                'title' => 'دراسة تحليلية لأصول الفقه الإسلامي',
                'researcher' => 'أحمد محمد العلي',
                'number_of_pages' => 250,
                'date' => '2000-03-20',
                'file' => 'research-2.pdf',
                'views' => 189,
            ],
            [
                'title' => 'البلاغة العربية في القرآن الكريم',
                'researcher' => 'فاطمة حسن السعيد',
                'number_of_pages' => 320,
                'date' => '2001-06-10',
                'file' => 'research-3.pdf',
                'views' => 312,
            ],
            [
                'title' => 'التفسير الموضوعي في الدراسات القرآنية',
                'researcher' => 'محمد عبدالله القرشي',
                'number_of_pages' => 410,
                'date' => '2002-09-05',
                'file' => 'research-4.pdf',
                'views' => 278,
            ],
            [
                'title' => 'الشعر الجاهلي: دراسة نقدية تحليلية',
                'researcher' => 'علي سعد المحمدي',
                'number_of_pages' => 290,
                'date' => '2003-12-15',
                'file' => 'research-5.pdf',
                'views' => 156,
            ],
            [
                'title' => 'المصطلح النحوي في كتب التراث',
                'researcher' => 'خالد يوسف العبدالله',
                'number_of_pages' => 340,
                'date' => '2004-04-22',
                'file' => 'research-6.pdf',
                'views' => 201,
            ],
            [
                'title' => 'علم التفسير وتطوره عبر العصور',
                'researcher' => 'عمر بن سلمان الحارثي',
                'number_of_pages' => 375,
                'date' => '2005-07-30',
                'file' => 'research-7.pdf',
                'views' => 267,
            ],
            [
                'title' => 'النقد الأدبي في العصر العباسي',
                'researcher' => 'ليلى أحمد الفهد',
                'number_of_pages' => 280,
                'date' => '2006-11-12',
                'file' => 'research-8.pdf',
                'views' => 193,
            ],
            [
                'title' => 'الدراسات اللغوية المقارنة',
                'researcher' => 'حسام الدين محمد',
                'number_of_pages' => 360,
                'date' => '2007-02-18',
                'file' => 'research-9.pdf',
                'views' => 224,
            ],
            [
                'title' => 'التفسير بالرأي: دراسة تحليلية',
                'researcher' => 'نورا عبدالرحمن الشمري',
                'number_of_pages' => 305,
                'date' => '2008-05-25',
                'file' => 'research-10.pdf',
                'views' => 178,
            ],
            [
                'title' => 'البلاغة والفصاحة في نهج البلاغة',
                'researcher' => 'طارق بن حمد العتيبي',
                'number_of_pages' => 395,
                'date' => '2009-08-08',
                'file' => 'research-11.pdf',
                'views' => 289,
            ],
            [
                'title' => 'المدرسة الكوفية في النحو العربي',
                'researcher' => 'ريم خالد الدوسري',
                'number_of_pages' => 330,
                'date' => '2010-10-14',
                'file' => 'research-12.pdf',
                'views' => 245,
            ],
            [
                'title' => 'الحديث النبوي ودراسة الأسانيد',
                'researcher' => 'ياسر عبدالعزيز القحطاني',
                'number_of_pages' => 420,
                'date' => '2011-01-30',
                'file' => 'research-13.pdf',
                'views' => 301,
            ],
            [
                'title' => 'الشعر الإسلامي: خصائصه وفنونه',
                'researcher' => 'هند محمد الحربي',
                'number_of_pages' => 270,
                'date' => '2012-04-17',
                'file' => 'research-14.pdf',
                'views' => 167,
            ],
            [
                'title' => 'المنهج التحليلي في دراسة النصوص الأدبية',
                'researcher' => 'سالم بن فهد العنزي',
                'number_of_pages' => 350,
                'date' => '2013-07-23',
                'file' => 'research-15.pdf',
                'views' => 234,
            ],
            [
                'title' => 'التفسير بالمأثور: دراسة تطبيقية',
                'researcher' => 'مها عبدالله الزهراني',
                'number_of_pages' => 385,
                'date' => '2014-09-11',
                'file' => 'research-16.pdf',
                'views' => 256,
            ],
            [
                'title' => 'النحو العربي بين القواعد والاستعمال',
                'researcher' => 'فهد سليمان المطيري',
                'number_of_pages' => 310,
                'date' => '2015-12-05',
                'file' => 'research-17.pdf',
                'views' => 198,
            ],
            [
                'title' => 'البلاغة القرآنية في سورة البقرة',
                'researcher' => 'نورا صالح الدغيثر',
                'number_of_pages' => 365,
                'date' => '2016-03-19',
                'file' => 'research-18.pdf',
                'views' => 287,
            ],
            [
                'title' => 'المدرسة البصرية في النحو',
                'researcher' => 'عبدالله راشد العسيري',
                'number_of_pages' => 340,
                'date' => '2017-06-27',
                'file' => 'research-19.pdf',
                'views' => 212,
            ],
            [
                'title' => 'التفسير الإشاري: دراسة نقدية',
                'researcher' => 'سارة أحمد الغامدي',
                'number_of_pages' => 300,
                'date' => '2018-10-03',
                'file' => 'research-20.pdf',
                'views' => 179,
            ],
        ];

        foreach ($researches as $research) {
            Research::create($research);
        }
    }
}
