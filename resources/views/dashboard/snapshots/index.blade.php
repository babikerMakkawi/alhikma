@extends('layout.master')

@section('content')
    <main id="main" dir="rtl">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class=" wow animate__animated animate__fadeInRight">إدارة لقطات قاعدة البيانات</h2>
                    <ol class=" wow animate__animated animate__fadeInLeft">
                        <li><a href="/">الرئيسية</a></li>
                        <li>إدارة اللقطات</li>
                    </ol>
                </div>
            </div>
        </section>

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

                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @endif

                                @if ($message = Session::get('warning'))
                                    <div class="alert alert-warning">
                                        {{ $message }}
                                    </div>
                                @endif

                                {{-- Card --}}
                                <div class="card bg-light  wow animate__animated animate__fadeInLeft">
                                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                                        <h5 class="mb-0">لقطات قاعدة البيانات</h5>

                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#createSnapshotModal">
                                            إنشاء لقطة جديدة
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        @if ($snapshots->count() > 0)
                                            <table class="table">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">اسم اللقطة</th>
                                                        <th scope="col">الحجم</th>
                                                        <th scope="col">تاريخ الإنشاء</th>
                                                        <th scope="col">التحكم</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($snapshots as $snapshot)
                                                        <tr>
                                                            <td>{{ $snapshot['name'] }}</td>
                                                            <td>{{ $snapshot['size'] }}</td>
                                                            <td>
                                                                {{ $snapshot['createdAt'] }}
                                                                <small class="text-muted d-block">({{ $snapshot['createdAtDiff'] }})</small>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex gap-1">
                                                                    <button type="button" class="btn btn-success btn-sm"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#loadSnapshotModal{{ $loop->index }}"
                                                                        title="تحميل">
                                                                        <i class="fa fa-download" aria-hidden="true"></i>
                                                                    </button>

                                                                    <button type="button" class="btn btn-danger btn-sm"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteSnapshotModal{{ $loop->index }}"
                                                                        title="حذف">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        {{-- Load Modal --}}
                                                        <div class="modal fade" id="loadSnapshotModal{{ $loop->index }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="loadSnapshotModalLabel{{ $loop->index }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="loadSnapshotModalLabel{{ $loop->index }}">
                                                                            تحميل اللقطة</h5>
                                                                        <button type="button" class="btn btn-secondary pb-0 pt-1 px-2"
                                                                            data-bs-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form method="POST"
                                                                        action="{{ route('snapshots.load', $snapshot['name']) }}">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="alert alert-warning">
                                                                                <strong>تحذير!</strong> سيتم استبدال جميع البيانات الحالية في قاعدة البيانات بالبيانات من هذه اللقطة. هذا الإجراء لا يمكن التراجع عنه.
                                                                            </div>
                                                                            <p>هل أنت متأكد من تحميل اللقطة: <strong>{{ $snapshot['name'] }}</strong>؟</p>
                                                                            <input type="hidden" name="confirm" value="1">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">إلغاء</button>
                                                                            <button type="submit" class="btn btn-success">تحميل</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Delete Modal --}}
                                                        <div class="modal fade" id="deleteSnapshotModal{{ $loop->index }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="deleteSnapshotModalLabel{{ $loop->index }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="deleteSnapshotModalLabel{{ $loop->index }}">
                                                                            حذف اللقطة</h5>
                                                                        <button type="button" class="btn btn-secondary pb-0 pt-1 px-2"
                                                                            data-bs-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form method="POST"
                                                                        action="{{ route('snapshots.destroy', $snapshot['name']) }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <div class="modal-body">
                                                                            <p>هل أنت متأكد من حذف اللقطة: <strong>{{ $snapshot['name'] }}</strong>؟</p>
                                                                            <p class="text-danger">هذا الإجراء لا يمكن التراجع عنه.</p>
                                                                            <input type="hidden" name="confirm" value="1">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">إلغاء</button>
                                                                            <button type="submit" class="btn btn-danger">حذف</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <div class="alert alert-info text-center">
                                                لا توجد لقطات حالياً. قم بإنشاء لقطة جديدة لبدء حفظ نسخ احتياطية من قاعدة البيانات.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Create Snapshot Modal --}}
        <div class="modal fade" id="createSnapshotModal" tabindex="-1" role="dialog"
            aria-labelledby="createSnapshotModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createSnapshotModalLabel">إنشاء لقطة جديدة</h5>
                        <button type="button" class="btn btn-secondary pb-0 pt-1 px-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('snapshots.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">اسم اللقطة</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required
                                    pattern="[a-zA-Z0-9_-]+"
                                    placeholder="مثال: backup-2024-01-15">
                                <small class="form-text text-muted">
                                    يجب أن يحتوي الاسم فقط على أحرف وأرقام وشرطة سفلية وشرطة (a-z, A-Z, 0-9, _, -)
                                </small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-primary">إنشاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main><!-- End #main -->
@endsection

