@extends('layout.master')

@section('content')
    <main id="main" dir="rtl">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class=" wow animate__animated animate__fadeInRight">إدارة فهرس كشاف المجلة</h2>
                    <ol class=" wow animate__animated animate__fadeInLeft">
                        <li><a href="/">الرئيسية</a></li>
                        <li>إدارة فهرس كشاف المجلة</li>
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
                                {{-- Errors & Success Displaying --}}
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ $message }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                {{-- Card --}}
                                <div class="card bg-light  wow animate__animated animate__fadeInLeft">
                                    <div class="card-header d-flex justify-content-between">

                                        <form action="{{ route('researchesIndex.index') }}" method="GET"
                                            class="form-inline">
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


                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            إصافة بحث
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>

                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">الموضوع</th>
                                                    <th scope="col">إسم البحث</th>
                                                    <th scope="col">إسم الباحث</th>
                                                    <th scope="col">العدد</th>
                                                    <th scope="col">التحكم</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse  ($research_index as $index)
                                                    <tr>
                                                        <td>{{ $index->subject }}</td>
                                                        <td>{{ $index->title }}</td>
                                                        <td>{{ $index->researcher }}</td>
                                                        <td>{{ $index->number }}</td>
                                                        <td>
                                                            <form method="post"
                                                                action="{{ route('researchesIndex.destroy', $index->id) }}"
                                                                onSubmit='return confirm("هل أنت متأكد؟")'
                                                                class="btn-group">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm rounded-0">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </button>
                                                            </form>

                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6">
                                                            <small class="text-center w-100 d-block">
                                                                لا يوجد بحوث مفهرسة في الوقت الحالي
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
                                                ])->links() }}

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        {{-- Create Modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">إنشاء بحث</h5>
                        <button type="button" class="btn btn-secondary pb-0 pt-1 px-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('researchesIndex.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            {{-- subject --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form">الموضوع</label>
                                <div class="col-sm-10">
                                    <input type="text" name="subject" value="{{ old('subject') }}"
                                        class="form-control" />
                                </div>
                            </div>

                            {{-- title --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form">عنوان البحث</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="{{ old('title') }}"
                                        class="form-control" />
                                </div>
                            </div>

                            {{-- researcher --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form">إسم الباحث</label>
                                <div class="col-sm-10">
                                    <input type="text" name="researcher" value="{{ old('researcher') }}"
                                        class="form-control" />
                                </div>
                            </div>

                            {{-- number --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form">العدد</label>
                                <div class="col-sm-10">
                                    <input type="text" name="number" value="{{ old('number') }}"
                                        class="form-control" />
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main><!-- End #main -->
@endsection
