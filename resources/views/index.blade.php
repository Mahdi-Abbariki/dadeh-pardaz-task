<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه اصلی</title>
    <!-- Bootstrap RTL CSS CDN (5.3.7) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.rtl.min.css" integrity="sha384-Xbg45MqvDIk1e563NLpGEulpX6AvL404DP+/iCgW9eFa2BqztiwTexswJo2jLMue" crossorigin="anonymous">
    <!-- Vazir Font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Vazir:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Vazir', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .btn {
            margin: 10px;
            padding: 15px 30px;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>به سیستم خوش آمدید</h2>
        <a href="{{ route("user.paymentRequest.store") }}" class="btn btn-primary">فرم ثبت درخواست پرداخت</a>
        <a href="{{ route("admin.paymentRequest.index") }}" class="btn btn-warning">مدیریت کاربران</a>
    </div>
    <!-- Bootstrap JS and Popper.js CDN (5.3.7) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-Df2nUM8O4uC4u6c6H2L2dG7S3K6D9L5M8N9P4R6T7U8V9W0X1Y2Z3A4B5C6D7E8" crossorigin="anonymous"></script>
</body>
</html>