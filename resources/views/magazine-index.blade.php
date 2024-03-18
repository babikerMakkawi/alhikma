@extends('layout.master')

@section('content')
    <main id="main" dir="rtl">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class=" wow animate__animated animate__fadeInRight">فهرس كشاف المجلة</h2>
                    <ol class=" wow animate__animated animate__fadeInLeft">
                        <li><a href="/">الرئيسية</a></li>
                        <li>فهرس كشاف المجلة</li>
                    </ol>
                </div>
            </div>
        </section>

        <!--  -->

        <section id="about" class="about" dir="rtl">
            <div class="container">
                <div class="row content">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card bg-light  wow animate__animated animate__fadeInLeft">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">عنوان البحث</th>
                                                    <th scope="col">إسم الباحث</th>
                                                    <th scope="col">عدد الصفحات</th>
                                                    <th scope="col">تاريخ النشر</th>
                                                    <th scope="col">عرض الملف</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse  ($researches as $research)
                                                    <tr>
                                                        <th scope="row">{{ $research->id }}</th>
                                                        <td>{{ $research->title }}</td>
                                                        <td>{{ $research->researcher }}</td>
                                                        <td>{{ $research->number_of_pages }}</td>
                                                        <td>{{ $research->date }}</td>
                                                        <td>
                                                            <a href="http://localhost:8000/storage/uploads/{{ $research->file }}"
                                                                target="_blank" class="btn btn-primary btn-sm">عرض</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6">
                                                            <small class="text-center w-100 d-block">
                                                                لا يوجد بحوث في الوقت الحالي
                                                            </small>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>

                                        <div dir="ltr">
                                            {{ $researches->links() }}
                                        </div>

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
