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
                                    <div class="card-header">
                                        <p>
                                            نقدم بين يدي الباحثين فهرس كشاف مجلة الحكمة من العدد الاول الصادر في
                                            عام ١٤٠١٤ الى ماوصلت اليه العدد (٦٦) الصادر في عام ١٤٤٥هـ . وهو
                                            عبارة عن عنوان البحث واسم الباحث وعدد الصفحات ورقم العدد المنشور فيه
                                            البحث. اما مايتعلق بمادة البحث فيمكن للباحث الحصول عليها في موقع
                                            "دار المنظومة" <a href="https://www.mandumah.com">www.mandumah.com</a>
                                        </p>
                                        <hr>
                                        <form action="{{ route('magazine-index') }}" method="GET" class="form-inline">
                                            <div class="input-group">

                                                {{-- Search --}}
                                                <input type="text" name="search"
                                                    class="form-control rounded-0 rounded-end-3" placeholder="بحث"
                                                    value="{{ app('request')->input('search') }}">

                                                {{-- Sort By --}}
                                                <select name="sort_by" class="form-control">
                                                    <option value="subject"
                                                        {{ app('request')->input('sort_by') == 'subject' ? 'selected' : '' }}>
                                                        الموضوع
                                                    </option>
                                                    <option value="title"
                                                        {{ app('request')->input('sort_by') == 'title' ? 'selected' : '' }}>
                                                        عنوان البحث
                                                    </option>
                                                    <option value="researcher"
                                                        {{ app('request')->input('sort_by') == 'researcher' ? 'selected' : '' }}>
                                                        إسم الباحث</option>
                                                    <option value="number"
                                                        {{ app('request')->input('sort_by') == 'number' ? 'selected' : '' }}>
                                                        العدد
                                                    </option>
                                                </select>

                                                {{-- Sort Order --}}
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
                                                    <th scope="col">الموضوع</th>
                                                    <th scope="col">إسم البحث</th>
                                                    <th scope="col">إسم الباحث</th>
                                                    <th scope="col">العدد</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse  ($research_index as $index)
                                                    <tr>
                                                        <td>{{ $index->subject }}</td>
                                                        <td>{{ $index->title }}</td>
                                                        <td>{{ $index->researcher }}</td>
                                                        <td>{{ $index->number }}</td>
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
                                            {{ $research_index->appends([
                                                    'search' => request()->input('search'),
                                                    'sort_by' => request()->input('sort_by'),
                                                    'sort_order' => request()->input('sort_order'),
                                                ])->onEachSide(2)->links() }}
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
