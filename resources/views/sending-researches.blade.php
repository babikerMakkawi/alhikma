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
                                            يتم ارسال البحث بنسختين، الاولى عبر الايميل ( alhikma59@hotmail.com )
                                            والثانية عبر الواتس اب (0505751684) وعند استلامنا البحث نشعر الباحث باستلام
                                            البحث وإن لم لم يصله اشعار بالاستلام يعني اننا لم نستلمه فعليه الاعادة حتى
                                            يتحقق ارساله كما أنه لا يمكن رفع البحث للتحكيم الا بعد سداد رسوم التحكيم
                                            وقدرها سبعمائة وخمسون ريالا سعوديا او ما يعادله بالدولار مائتي دولار ويودع
                                            المبلغ في حسابنا لدى مصرف الراجحي بالسعودية رقم ( 198608010097451 ) باسم
                                            وليد بن احمد بن صالح الحسين واشعارنا بالتسديد عبر الواتس اب
                                            أما بالنسبة لمن هو خارج المملكة العربية السعودية يمكنه ان يسدد رسوم التحكيم
                                            عن طريق الحوالة المالية البنكية لشركة ( وسترن يونيون ) وتكون الحوالة باسم
                                            وليد أحمد صالح الحسين ( waleed ahmed al Husain ) السعودية المدينة المنورة
                                            وبعد ارسال الحوالة تزويدنا برقم الحوالة لنتمكن من استلام الحوالة.

                                            وللراغبين بالنشر الالكتروني فرسوم النشر هي (٨٠٠ ريال سعودي)
                                            ويكون النشر فوري في موقع المجلة بعد الانتهاء من التحكيم
                                        </p>
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
