@extends('layout.master')

@section('content')
    <main id="main" dir="rtl">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class=" wow animate__animated animate__fadeInRight">إرسال البحوث</h2>
                    <ol class=" wow animate__animated animate__fadeInLeft">
                        <li><a href="/">الرئيسية</a></li>
                        <li>إرسال البحوث</li>
                    </ol>
                </div>
            </div>
        </section>

        <!--  -->

        <section id="about" class="about" dir="rtl">
            <div class="container">
                <div class="row content">
                    <div class="col-lg-12">
                        <h2 class="wow animate__animated animate__fadeInDown">
                            إرسال البحوث
                        </h2>
                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-3">
                                <img src="{{ asset('/images/hikma-magala.gif') }}"
                                    class="w-100  wow animate__animated animate__fadeInRight" alt="" srcset="">
                            </div>
                            <div class="col-12 col-md-8 col-lg-9">
                                <div class="card bg-light  wow animate__animated animate__fadeInLeft">
                                    <div class="card-body ">
                                        <p>
                                            يتم ارسال البحث بنسختين، الاولى عبر الايميل ( <a
                                                href="mailto:alhikma59@hotmail.com">alhikma59@hotmail.com</a> ) والثانية
                                            عبر الواتس اب (<a href="http://wa.me/966505751684"
                                                target="_blank">0505751684</a>) وعند استلامنا
                                            البحث نشعر الباحث باستلام البحث وإن لم
                                            يصله اشعار بالاستلام يعني اننا لم نستلمه فعليه الاعادة حتى يتحقق ارساله كما أنه
                                            لا يمكن رفع البحث للتحكيم الا بعد سداد رسوم التحكيم وقدرها سبعمائة وخمسون ريالا
                                            سعوديا او ما يعادله بالدولار مائتي دولار ويودع المبلغ في حسابنا لدى مصرف الراجحي
                                            بالسعودية رقم ( 198608010097451 ) باسم وليد بن احمد بن صالح الحسين واشعارنا
                                            بالتسديد عبر الواتس اب أما بالنسبة لمن هو خارج المملكة العربية السعودية يمكنه ان
                                            يسدد رسوم التحكيم عن طريق الحوالة المالية البنكية لشركة ( وسترن يونيون ) وتكون
                                            الحوالة باسم وليد أحمد صالح الحسين ( waleed ahmed al Husain ) السعودية المدينة
                                            المنورة وبعد ارسال الحوالة تزويدنا برقم الحوالة لنتمكن من استلام الحوالة.
                                            وللراغبين بالنشر الالكتروني فرسوم النشر هي (٨٠٠ ريال سعودي) ويكون النشر فوري في
                                            موقع المجلة بعد الانتهاء من التحكيم .
                                        </p>

                                        <br>

                                        <p>
                                            معايير البحوث المقدمة لمجلة الحكمة للتحكيم:
                                        </p>
                                        <ul>
                                            <li style="padding: 10px 28px 0 0px !important;">
                                                {{-- <i class="ri-check-double-line wow animate__animated animate__fadeInDown">
                                                </i> --}}
                                                ١- أن يكون البحث ضمن تخصص المجلة في العلوم الشرعية والعربية والتربوية
                                                والإنسانية.

                                            </li>
                                            <li style="padding: 10px 28px 0 0px !important;">
                                                {{-- <i class="ri-check-double-line wow animate__animated animate__fadeInDown">
                                                </i> --}}
                                                ٢- أن يتسم البحث في الاصالة و الموضوعية والطرح الجديد عنوانًا ومضمونًا
                                                والابتعاد عن أسلوب التكرار.

                                            </li>
                                            <li style="padding: 10px 28px 0 0px !important;">
                                                {{-- <i class="ri-check-double-line wow animate__animated animate__fadeInDown">
                                                </i> --}}
                                                ٣- أن يلتزم الباحث في بحثه بمعايير اللغة العربية وعلامات الترقيم وتوثيق
                                                النصوص من مصادرها الاصلية.

                                            </li>
                                            <li style="padding: 10px 28px 0 0px !important;">
                                                {{-- <i class="ri-check-double-line wow animate__animated animate__fadeInDown">
                                                </i> --}}
                                                ٤- أن يتضمن البحث المقدمة التي تشمل موضوع البحث وأهميته وأهدافه وأسباب
                                                اختياره والمنهج العلمي الذي سار عليه البحث والدراسات السابقة والجديدة الذي
                                                سيقدمه البحث.

                                            </li>
                                            <li style="padding: 10px 28px 0 0px !important;">
                                                {{-- <i class="ri-check-double-line wow animate__animated animate__fadeInDown">
                                                </i> --}}
                                                ٥- أن تتضمن خاتمة البحث أهم نتائج الدراسة والتوصيات العلمية في عناصر واضحة.

                                            </li>
                                            <li style="padding: 10px 28px 0 0px !important;">
                                                {{-- <i class="ri-check-double-line wow animate__animated animate__fadeInDown">
                                                </i> --}}
                                                ٦- أن يكون بنط الخط لمادة البحث 16 والهوامش 14 و مقاس خط العناوين الرئيسية
                                                20 مسودًا ومقاس خط العناوين الفرعية 18 مسودًا ونوع الخط (Lotus Linotype).

                                            </li>
                                            <li style="padding: 10px 28px 0 0px !important;">
                                                {{-- <i class="ri-check-double-line wow animate__animated animate__fadeInDown">
                                                </i> --}}
                                                ٧- أن لا يقل عدد صفحات البحث عن 20 صفحه واما الزيادة فلا حد لها.

                                            </li>
                                            <li style="padding: 10px 28px 0 0px !important;">
                                                {{-- <i class="ri-check-double-line wow animate__animated animate__fadeInDown">
                                                </i> --}}
                                                ٨- أن يكون البحث لم يسبق تحكيمه او نشره في أي جهة.

                                            </li>
                                            <li style="padding: 10px 28px 0 0px !important;">
                                                {{-- <i class="ri-check-double-line wow animate__animated animate__fadeInDown">
                                                </i> --}}
                                                ٩- أن يقدم الباحث بحثه نسخة منه (word) والثانية (pdf) وترسل على إيميل و واتس
                                                اب المجلة.

                                            </li>
                                            <li style="padding: 10px 28px 0 0px !important;">
                                                {{-- <i class="ri-check-double-line wow animate__animated animate__fadeInDown">
                                                </i> --}}
                                                ١٠- أن يقدم الباحث سيرته الذاتية في ملخص مختصر.

                                            </li>
                                            <li style="padding: 10px 28px 0 0px !important;">
                                                {{-- <i class="ri-check-double-line wow animate__animated animate__fadeInDown">
                                                </i> --}}
                                                ١١- إذا كان البحث يتمثل في تحقيق مخطوط من التراث فعليه إرفاق الصفحة الأولى
                                                والثانية والأخيرة من المخطوط مع البحث المحقق.

                                            </li>
                                            <li style="padding: 10px 28px 0 0px !important;">
                                                {{-- <i class="ri-check-double-line wow animate__animated animate__fadeInDown">
                                                </i> --}}
                                                ١٢- لا تعاد البحوث لأصحابها ، نشرت أم لم تنشر ويلتزم الباحث عدم نشر بحثه
                                                الذي تم تحكيمه من طرفنا في أي جهة كانت الا بعد مضي ستة أشهر من صدور خطاب
                                                التحكيم هذا إذا لم يتيسر نشره في مجلتنا.

                                            </li>
                                            <li style="padding: 10px 28px 0 0px !important;">
                                                {{-- <i class="ri-check-double-line wow animate__animated animate__fadeInDown">
                                                </i> --}}
                                                ١٣- يتحمل الباحث المسؤولية القانونية الكاملة في حال الاعتداء على الحقوق
                                                الفكرية للآخرين.

                                            </li>
                                            <li style="padding: 10px 28px 0 0px !important;">
                                                {{-- <i class="ri-check-double-line wow animate__animated animate__fadeInDown">
                                                </i> --}}
                                                ١٤- أن تتضمن قائمة المصادر والمراجع جميع الأعمال التي تمت الإشارة إليها في
                                                البحث ويكون ترتيبها ترتيبًا أبجديًا والمصادر غير العربية تكون بعد المصادر
                                                والمراجع العربية.

                                            </li>
                                            <li style="padding: 10px 28px 0 0px !important;">
                                                {{-- <i class="ri-check-double-line wow animate__animated animate__fadeInDown">
                                                </i> --}}
                                                ١٥- لا تقبل المجلة أي بحث يجنح عن أصول العقيدة التي تتبناها مجلتنا وهي عقيدة
                                                أهل السنة والجماعة، واما في مسائل الفروع مما للرأي فيها مجال فللباحث أن يحرر
                                                في بحثه ما يميل إليه وفق الأدلة والبراهين وقواعد الدين.
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main><!-- End #main -->
@endsection
