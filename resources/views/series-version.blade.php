@extends('layout.master')

@section('content')
    <main id="main" dir="rtl">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class=" wow animate__animated animate__fadeInRight">التعريف بسلسلة الاصدارات</h2>
                    <ol class=" wow animate__animated animate__fadeInLeft">
                        <li><a href="/">الرئيسية</a></li>
                        <li>التعريف بسلسلة الاصدارات</li>
                    </ol>
                </div>
            </div>
        </section>

        <!--  -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about" dir="rtl">
            <div class="container">

                <div class="row content">
                    <div class="card">
                        <div class="card-body  d-flex flex-column gap-5 m-auto mb-3">
                            <h3 class=" wow animate__animated animate__fadeInDown">
                                تعريف بسلسلة إصدارات الحكمة
                            </h3>
                            <p class=" wow animate__animated animate__fadeInDown animate__delay-1s">
                                هذه السلسلة عبارة عن كتب مستقلة عن المجلة وليس لها أي علاقة ببحوث المجلة صدر أول
                                إصدارمنها
                                بتاريخ 1420 هـ ثم تبعته باقي الاصدارات وتتميز بتنوعها العلمي فمنها ما يأخذ طابع الدراسات
                                العلمية ومنها ما يأخذ طابع الموسوعية ومنها ما يختص بتحقيق المخطوطات ومنها فهارس الكشاف
                                للرسائل الجامعية ومنها رسائل ماجستير أو دكتوراة وقد راعينا دقة الاختيار لهذه السلسلة من
                                الاصدارات والمتصفح لها سيتبين له ذلك .
                            </p>
                            <strong class=" wow animate__animated animate__fadeInDown animate__delay-2s">
                                ويمكنك الحصول على هذه الإصدارات عن طريق عنواننا بالمملكة العربية السعودية وهو
                                (السعودية
                                ـ المدينة المنورة ـ )
                            </strong>

                            <strong class=" wow animate__animated animate__fadeInDown animate__delay-3s">
                                جوال : 00966505751684
                                <br>
                                العنوان : السعودية ــ المدينة المنورة
                                <br>
                                البريد الإلكتروني : alhikma59@hotmail.com
                            </strong>
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Portfolio Gallery Section ======= -->
        <section id="portfolio" class="portfolio" dir="rtl">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">الكل</li>
                            <li data-filter=".filter-1-5">1-5</li>
                            <li data-filter=".filter-6-10">6-10</li>
                            <li data-filter=".filter-11-15">11-15</li>
                            <li data-filter=".filter-16-20">16-20</li>
                            <li data-filter=".filter-21-23">20-23</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container">

                    <!-- Filter-1-5 -->
                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-1-5">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/1.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>إصدار رقم 1</h4>
                                <p>منهج ابي عبيدة في تفسير غريب الحديث</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/1.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="منهج ابي عبيدة في تفسير غريب الحديث">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-1-5">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/2.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/2.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-1-5">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/3.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/3.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-1-5">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/4.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/4.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-1-5">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/5.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/5.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Filter-6-10 -->
                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-6-10">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/6.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('images/version/6.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-6-10">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/7.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/7.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-6-10">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/8.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/8.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-6-10">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/9.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/9.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-6-10">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/10.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/10.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Filter-11-15 -->
                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-11-15">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/11.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/11.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-11-15">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/12.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/12.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-11-15">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/13.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/13.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-11-15">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/14.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/14.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-11-15">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/15.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/15.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Filter-16-20 -->
                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-16-20">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/16.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/16.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-16-20">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/17.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/17.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-16-20">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/18.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/18.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-16-20">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/19.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/19.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-16-20">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/20.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/20.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Filter-21-23 -->
                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-21-23">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/21.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/21.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-21-23">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/22.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/22.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-4 portfolio-item filter-21-23">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('/images/version/23.png') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                {{-- <h4>العنوان</h4>
                                <p>العنوان</p> --}}
                                <div class="portfolio-links">
                                    <a href="{{ asset('/images/version/23.png') }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->
@endsection
