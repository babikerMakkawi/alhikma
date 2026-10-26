<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>خطأ في قاعدة البيانات</title>
    <style>
        body {
            font-family: Tahoma, Arial, sans-serif;
            background: #f5f5f5;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .box {
            background: #fff;
            padding: 32px;
            border-radius: 8px;
            max-width: 480px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .1);
        }

        a {
            color: #0d6efd;
        }
    </style>
</head>

<body>
    <div class="box">
        <h2>تعذر الاتصال بقاعدة البيانات</h2>
        <p>حدث خطأ أثناء تنفيذ العملية. تم تسجيل الخطأ، يرجى المحاولة مرة أخرى بعد قليل.</p>
        <p><a href="{{ url()->previous() }}">العودة للصفحة السابقة</a></p>
    </div>
</body>

</html>
