@extends('layout.master')

@section('content')
    <main id="main" dir="rtl">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class=" wow animate__animated animate__fadeInRight">إدارة البحوث</h2>
                    <ol class=" wow animate__animated animate__fadeInLeft">
                        <li><a href="/">الرئيسية</a></li>
                        <li>إدارة البحوث</li>
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
                                    <div class="card-header">
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
                                                    <th scope="col">#</th>
                                                    <th scope="col">عنوان البحث</th>
                                                    <th scope="col">إسم الباحث</th>
                                                    <th scope="col">عدد الصفحات</th>
                                                    <th scope="col">تاريخ النشر</th>
                                                    <th scope="col">التحكم</th>

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
                                                            <form method="post"
                                                                action="{{ route('researches.destroy', $research->id) }}"
                                                                onSubmit='return confirm("هل أنت متأكد؟")'
                                                                class="btn-group">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a href="http://localhost:8000/storage/uploads/{{ $research->file }}"
                                                                    target="_blank" class="btn btn-primary btn-sm">عرض</a>

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
                    <form method="post" action="{{ route('researches.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            {{-- Title --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form">عنوان البحث</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="{{ old('title') }}"
                                        class="form-control" />
                                </div>
                            </div>

                            {{-- Researcher Name --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form">إسم الباحث</label>
                                <div class="col-sm-10">
                                    <input type="text" name="researcher" value="{{ old('researcher') }}"
                                        class="form-control" />
                                </div>
                            </div>

                            {{-- Number OF Pages --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form">عدد الصفحات</label>
                                <div class="col-sm-10">
                                    <input type="number" name="number_of_pages" value="{{ old('number_of_pages') }}"
                                        class="form-control" />
                                </div>
                            </div>

                            {{-- Date --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form">تاريخ النشر</label>
                                <div class="col-sm-10">
                                    <input type="date" name="date" value="{{ old('date') }}"
                                        class="form-control" />
                                </div>
                            </div>

                            {{-- File --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form">
                                    ملف البحث
                                    <span class="text-danger">(Pdf ملف)</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="file" name="file" value="{{ old('file') }}"
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
