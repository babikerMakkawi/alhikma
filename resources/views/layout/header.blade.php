<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="" srcset="">
                مجلة الحكمة
            </a>
        </h1>
        <!-- <a href="/" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul dir="rtl">

                <li><a href="/" class="active">الرئيسية</a></li>

                <li class="dropdown"><a href="#">
                        <span>التعريف</span>
                        <i class="bi bi-chevron-down pe-2 pb-1"></i></a>
                    <ul>
                        <li><a href="magazine-Introduction">التعريف بالمجلة</a></li>
                        <li><a href="editor-in-chief">التعريف برئيس التحرير</a></li>
                    </ul>
                </li>

                <li><a href="series-version">التعريف بسلسلة الاصدارات</a></li>
                <li><a href="magazine-index">فهرس كشاف المجلة</a></li>
                <li><a href="xxxxxxxxxxxxxxxxxxxx">النشر الالكتروني</a></li>
                <li><a href="sending-researches">إرسال البحوث</a></li>

                @auth
                    <li><a href="{{ route('researches.index') }}">التحكم</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-transparent border-0 " href="route('logout')"
                                onclick="event.preventDefault();this.closest('form').submit();">
                                تسجيل الخروج
                            </button>
                        </form>
                    </li>
                @endauth

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
