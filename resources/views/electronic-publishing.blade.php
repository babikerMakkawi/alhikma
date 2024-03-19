@extends('layout.master')

@section('content')
    <main id="main" dir="rtl">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class=" wow animate__animated animate__fadeInRight">النشر الإلكتروني</h2>
                    <ol class=" wow animate__animated animate__fadeInLeft">
                        <li><a href="/">الرئيسية</a></li>
                        <li>النشر الإلكتروني</li>
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
                                    <div class="card-header">
                                        <form action="{{ route('electronic-publishing') }}" method="GET"
                                            class="form-inline">
                                            <div class="input-group">
                                                <input type="text" name="search"
                                                    class="form-control rounded-0 rounded-end-3" placeholder="بحث"
                                                    value="{{ app('request')->input('search') }}">
                                                <select name="sort_by" class="form-control">
                                                    <option value="title"
                                                        {{ app('request')->input('sort_by') == 'title' ? 'selected' : '' }}>
                                                        عنوان البحث</option>
                                                    <option value="researcher"
                                                        {{ app('request')->input('sort_by') == 'researcher' ? 'selected' : '' }}>
                                                        إسم الباحث</option>
                                                    <option value="number_of_pages"
                                                        {{ app('request')->input('sort_by') == 'number_of_pages' ? 'selected' : '' }}>
                                                        عدد الصفحات</option>
                                                    <option value="date"
                                                        {{ app('request')->input('sort_by') == 'date' ? 'selected' : '' }}>
                                                        التاريخ</option>
                                                </select>
                                                <select name="sort_order" class="form-control">
                                                    <option value="asc"
                                                        {{ app('request')->input('sort_order') == 'asc' ? 'selected' : '' }}>
                                                        تصاعدي</option>
                                                    <option value="desc"
                                                        {{ app('request')->input('sort_order') == 'desc' ? 'selected' : '' }}>
                                                        تنازلي</option>
                                                </select>
                                                <button type="submit"
                                                    class="btn btn-sm btn-primary rounded-0 rounded-start-3">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
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
                                                            <a href="storage/app/public/uploads/{{ $research->file }}"
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
                                            {{ $researches->appends([
                                                    'search' => request()->input('search'),
                                                    'sort_by' => request()->input('sort_by'),
                                                    'sort_order' => request()->input('sort_order'),
                                                ])->onEachSide(5)->links() }}
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
