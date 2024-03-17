@extends('layout.master')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url({{ asset('images/slide/slider-1.avif') }})">
                    <div class="carousel-container">
                        <div class="container">
                            <div class="row">
                                <div
                                    class="col-12 col-lg-4 d-flex align-items-center justify-content-center  animate__animated animate__fadeInDown">
                                    <img src="{{ 'images/mockups/1.png' }}" class="book-mockup" alt=""
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
                <div class="carousel-item" style="background-image: url({{ asset('images/slide/slider-1.avif') }})">

                    <div class="carousel-container">
                        <div class="container">
                            <div class="row">
                                <div
                                    class="col-12 col-lg-4 d-flex align-items-center justify-content-center  animate__animated animate__fadeInDown">
                                    <img src="{{ 'images/mockups/5.png' }}" class="book-mockup" alt=""
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
                <div class="carousel-item" style="background-image: url({{ asset('images/slide/slider-1.avif') }})">
                    <div class="carousel-container">
                        <div class="container">
                            <div class="row">
                                <div
                                    class="col-12 col-lg-4 d-flex align-items-center justify-content-center  animate__animated animate__fadeInDown">
                                    <img src="{{ 'images/mockups/20.png' }}" class="book-mockup" alt=""
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

                <div class="row content">
                    <div class="col-12 d-flex flex-column gap-2 mb-5 m-auto text-center w-50">
                        <p class="wow animate__animated animate__fadeInDown">
                            مجلة بحثية علمية شرعية ثقافية محكّمة سنوية
                        </p>
                        <strong class="wow animate__animated animate__fadeInDown">
                            " أكثر مجلات البحوث الإسلامية انتشاراً في العالم "
                        </strong>
                    </div>
                </div>
                <div class="row content">
                    <div class="col-lg-12">
                        <h2 class="wow animate__animated animate__fadeInDown  ">
                            التعريف ب <span style="color: #73091f">مجلة الحكمة</span>
                        </h2>
                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-3">
                                <img src="{{ asset('images/hikma-magala.gif') }}"
                                    class="shadow-lg bg-white rounded w-100 wow animate__animated animate__fadeInRight animated">
                            </div>
                            <div class="col-12 col-md-8 col-lg-9">
                                <p class="pt-5 wow animate__animated animate__fadeInDown" style="text-align: justify;">
                                    منذ سنوات طويلة قريب من العشرين سنة خالجتني فكرة إنشاء مجلة بحوث علمية شرعية عربية
                                    ذات طابع علمي
                                    أكاديمي ولعل ذلك كان بتاريخ 1405 هـ وكنت أستشير شيخي العلامة محمد بن صالح العثيمين
                                    رحمه الله وأطرح
                                    عليه مثل هذه الفكرة ويشجعني عليها ، وأبدى استعداده في دعمه لهذه الفكرة ماليا وعلميا
                                    ومعنويا وقد أوفى
                                    بوعده رحمه الله فكانت له مشاركة في أول عدد من صدورها وذلك بتاريخ 1/5/1414 هـ وكانت
                                    بعنوان ( منظومة في
                                    أصول الفقه ـ 102 بيت ) خص بها المجلة ولم تطبع من قبل وكانت في أدراج مكتبته سنوات
                                    طويلة وهي من أجمل ما
                                    نظم في أصول الفقه.
                                    <a href="magazine-Introduction.html" class="btn-get-started scrollto">قرائة
                                        المزيد</a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End About Section -->

    </main><!-- End #main -->
@endsection
