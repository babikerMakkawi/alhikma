@extends('layout.master')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url({{ asset('/images/slide/background-2.jpeg') }})">
                    <div class="carousel-container">
                        <div class="container">
                            <div class="row">
                                <div
                                    class="col-12 col-lg-4 d-flex align-items-center justify-content-center  animate__animated animate__fadeInDown">
                                    <img src="{{ asset('images/mockups/1.png') }}" class="book-mockup" alt=""
                                        srcset="">
                                </div>
                                <div class="col-12 col-lg-8 d-flex justify-content-center align-items-center flex-column">
                                    <h2 class="animate__animated animate__fadeInDown">من إصداراتنا</span></h2>
                                    <p class="animate__animated animate__fadeInUp">
                                        منهج أبي عبيد في تفسير غريب الحديث
                                        <br>
                                        المؤلف: كاصد ياسر الزيدي - وليد بن أحمد الحسين
                                        <br>
                                        الناشر: مجلة الحكمة
                                        <br>
                                        سنة النشر: 1420 - 1999
                                        <br>
                                        عدد الصفحات: 380
                                        <br>
                                    </p>
                                    <a href="#about"
                                        class="btn btn-primary animate__animated animate__fadeInUp scrollto">المزيد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url({{ asset('/images/slide/background-2.jpeg') }})">

                    <div class="carousel-container">
                        <div class="container">
                            <div class="row">
                                <div
                                    class="col-12 col-lg-4 d-flex align-items-center justify-content-center  animate__animated animate__fadeInDown">
                                    <img src="{{ asset('images/mockups/5.png') }}" class="book-mockup" alt=""
                                        srcset="">
                                </div>
                                <div class="col-12 col-lg-8 d-flex justify-content-center align-items-center flex-column">
                                    <h2 class="animate__animated animate__fadeInDown">من إصداراتنا</span></h2>
                                    <p class="animate__animated animate__fadeInUp">
                                        مجموعة رسائل ابن الجوزي في الخطب والمواعظ والحكايات والفوائد العامة
                                        <br>
                                        المؤلف: ابن الجوزي؛ عبد الرحمن بن علي بن محمد الجوزي القرشي البغدادي، أبو
                                        الفرج
                                        <br>
                                        الناشر: مجلة الحكمة - بريطانيا
                                        <br>
                                        سنة النشر: 1421 - 2000
                                        <br>
                                        عدد الصفحات: 270
                                        <br>

                                    </p>
                                    <a href="#about"
                                        class="btn btn-primary animate__animated animate__fadeInUp scrollto">المزيد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background-image: url({{ asset('/images/slide/background-2.jpeg') }})">
                    <div class="carousel-container">
                        <div class="container">
                            <div class="row">
                                <div
                                    class="col-12 col-lg-4 d-flex align-items-center justify-content-center  animate__animated animate__fadeInDown">
                                    <img src="{{ asset('images/mockups/20.png') }}" class="book-mockup" alt=""
                                        srcset="">
                                </div>
                                <div class="col-12 col-lg-8 d-flex justify-content-center align-items-center flex-column">
                                    <h2 class="animate__animated animate__fadeInDown">من إصداراتنا</span></h2>
                                    <p class="animate__animated animate__fadeInUp">
                                        خلق الإنسان
                                        <br>
                                        المؤلف : الزجاج أبي إسحق إبراهيم بن السري
                                        <br>
                                        أسماء ذات صلة : تحقيق وتعليق وليد بن أحمد الحسين
                                        <br>
                                        الموضوع :اللغة العربية المعاجم العربية - المتخصصة - خلق الإنسان
                                        <br>
                                        الصفحات : 106
                                        <br>
                                    </p>
                                    <a href="#about"
                                        class="btn btn-primary animate__animated animate__fadeInUp scrollto">المزيد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about" dir="rtl">
            <div class="container">

                <div class="row content mb-5">
                    <div class="col-lg-12 pt-4 pt-lg-0">
                        <div class="card">
                            <div class="card-body">

                                <div class="text-center">
                                    <p class="wow animate__animated animate__fadeInDown">
                                        مجلة بحثية علمية شرعية ثقافية محكّمة سنوية
                                    </p>
                                    <br>
                                    <strong class="text-bold wow animate__animated animate__fadeInDown">
                                        " أكثر مجلات البحوث الإسلامية انتشاراً في العالم "
                                    </strong>
                                    <br>
                                    <strong class="text-bold wow animate__animated animate__fadeInDown">
                                        الرقم الدولي لمجلة الحكمة في بريطانيا (ISSN 2754-7906)
                                    </strong>
                                </div>
                                <hr>
                                <p class="wow animate__animated animate__fadeInDown">
                                    لجنة التحكيم :
                                </p>
                                <ul>
                                    <li style="padding: 10px 28px 0 0px !important;">
                                        <i class="ri-check-double-line wow animate__animated animate__fadeInDown">
                                        </i>
                                        - أ.د: حكمت بشير ياسين - جامعة الملك عبدالعزيز - السعودية - جدة.
                                    </li>
                                    <li style="padding: 10px 28px 0 0px !important;"><i
                                            class="ri-check-double-line wow animate__animated animate__fadeInDown"></i>
                                        - ⁠أ.د: ناصر بن عبدالله القفاري - جامعة القصيم - السعودية - القصيم.
                                    </li>
                                    <li style="padding: 10px 28px 0 0px !important;"><i
                                            class="ri-check-double-line wow animate__animated animate__fadeInDown"></i>
                                        - ⁠أ.د: محمد اسحاق محمد آل ابراهيم - جامعة الامام محمد بن سعود الاسلامية - السعودية
                                        -
                                        الرياض.
                                    </li>
                                    <li style="padding: 10px 28px 0 0px !important;"><i
                                            class="ri-check-double-line wow animate__animated animate__fadeInDown"></i>
                                        - ⁠أ.د: احمد خالد شكري - الجامعة الاردنيه- الاردن - عمَّان.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row content">
                    <div class="col-lg-12">
                        <h2 class="wow animate__animated animate__fadeInDown  ">
                            التعريف ب <span style="color: #73091f">مجلة الحكمة</span>
                        </h2>
                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-3">
                                <img src="{{ asset('/images/hikma-magala.gif') }}"
                                    class="shadow-lg bg-white rounded w-100 wow animate__animated animate__fadeInRight animated">
                            </div>
                            <div class="col-12 col-md-8 col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="wow animate__animated animate__fadeInDown" style="text-align: justify;">
                                            منذ سنوات طويلة قريب من العشرين سنة خالجتني فكرة إنشاء مجلة بحوث علمية شرعية
                                            عربية
                                            ذات طابع علمي
                                            أكاديمي ولعل ذلك كان بتاريخ 1405 هـ وكنت أستشير شيخي العلامة محمد بن صالح
                                            العثيمين
                                            رحمه الله وأطرح
                                            عليه مثل هذه الفكرة ويشجعني عليها ، وأبدى استعداده في دعمه لهذه الفكرة ماليا
                                            وعلميا
                                            ومعنويا وقد أوفى
                                            بوعده رحمه الله فكانت له مشاركة في أول عدد من صدورها وذلك بتاريخ 1/5/1414 هـ
                                            وكانت
                                            بعنوان ( منظومة في
                                            أصول الفقه ـ 102 بيت ) خص بها المجلة ولم تطبع من قبل وكانت في أدراج مكتبته سنوات
                                            طويلة وهي من أجمل ما
                                            نظم في أصول الفقه.
                                            <a href="/magazine-Introduction" class="btn-get-started scrollto">
                                                قراءة المزيد
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End About Section -->

    </main><!-- End #main -->
@endsection
