<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت درخواست پرداخت</title>
    <!-- Bootstrap RTL CSS CDN (5.3.7) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.rtl.min.css" integrity="sha384-Xbg45MqvDIk1e563NLpGEulpX6AvL404DP+/iCgW9eFa2BqztiwTexswJo2jLMue" crossorigin="anonymous">
    <!-- Vazir Font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Vazir:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Vazir', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>فرم ثبت درخواست پرداخت</h2>
        <form method="POST" action="{{ route("user.paymentRequest.store") }}" id="contactForm" class="row">
            @csrf
            <div class="mb-3 col-6">
                <label for="nationalCodeInput" class="form-label">کد ملی</label>
                <input type="nationalCode" class="form-control @error('nationalCode') is-invalid @enderror" id="nationalCodeInput" name="nationalCode" placeholder="کد ملی خود را وارد کنید" value="{{ old('nationalCode') }}">
                @error('nationalCode')
                    <div class="invalid-feedback" id="nationalCodeError">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="expenditureCategory" class="form-label">دسته‌بندی</label>
                <select class="form-select @error('expenditureCategory') is-invalid @enderror" id="expenditureCategory" name="expenditureCategory" value="{{ old('expenditureCategory') }}">
                    <option value="" selected>انتخاب کنید</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('expenditureCategory') == $category->id)>{{$category->name}}</option>
                    @endforeach
                </select>
                @error('expenditureCategory')
                    <div class="invalid-feedback" id="expenditureCategoryError">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="shabaInput" class="form-label">شماره شبا</label>
                <input type="text" class="form-control @error('shaba') is-invalid @enderror" id="shabaInput" name="shaba" value="{{ old('shaba') }}" placeholder="شماره شبا را وارد کنید">
                @error('shaba')
                    <div class="invalid-feedback" id="shabaError">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="amountInput" class="form-label">مبلغ</label>
                <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amountInput" name="amount" value="{{ old('amount') }}" placeholder="مبلغ را وارد کنید">
                @error('amount')
                    <div class="invalid-feedback" id="amountError">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="descriptionTextarea" class="form-label">پیام</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="descriptionTextarea" name="description" rows="4" placeholder="پیام خود را وارد کنید">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback" id="descriptionError">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="attachmentInput" class="form-label">آپلود فایل</label>
                <input type="file" class="form-control @error('attachment') is-invalid @enderror" id="attachmentInput" name="attachment">
                @error('attachment')
                    <div class="invalid-feedback" id="attachmentError">{{$message}}</div>
                @enderror
            </div>
            <button class="btn btn-primary">ارسال</button>
        </form>
    </div>
    <!-- Bootstrap JS and Popper.js CDN (5.3.7) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
</body>
</html>