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
        <form id="contactForm" novalidate>
            <div class="mb-3">
                <label for="categorySelect" class="form-label">دسته‌بندی</label>
                <select class="form-select" id="categorySelect" name="category">
                    <option value="" selected>انتخاب کنید</option>
                    <option value="support">پشتیبانی</option>
                    <option value="sales">فروش</option>
                    <option value="feedback">بازخورد</option>
                </select>
                <div class="invalid-feedback" id="categoryError">لطفاً یک دسته‌بندی انتخاب کنید.</div>
            </div>
            <div class="mb-3">
                <label for="shabaInput" class="form-label">شماره شبا</label>
                <input type="text" class="form-control" id="shabaInput" name="shaba" placeholder="شماره شبا را وارد کنید">
                <div class="invalid-feedback" id="shabaError">لطفاً شماره شبا معتبر وارد کنید.</div>
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">ایمیل</label>
                <input type="email" class="form-control" id="emailInput" name="email" placeholder="ایمیل خود را وارد کنید">
                <div class="invalid-feedback" id="emailError">لطفاً یک آدرس ایمیل معتبر وارد کنید.</div>
            </div>
            <div class="mb-3">
                <label for="messageTextarea" class="form-label">پیام</label>
                <textarea class="form-control" id="messageTextarea" name="message" rows="4" placeholder="پیام خود را وارد کنید"></textarea>
                <div class="invalid-feedback" id="messageError">لطفاً پیام خود را وارد کنید.</div>
            </div>
            <div class="mb-3">
                <label for="fileInput" class="form-label">آپلود فایل</label>
                <input type="file" class="form-control" id="fileInput" name="file">
                <div class="invalid-feedback" id="fileError">لطفاً یک فایل آپلود کنید.</div>
            </div>
            <button type="submit" class="btn btn-primary">ارسال</button>
        </form>
    </div>
    <!-- Bootstrap JS and Popper.js CDN (5.3.7) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-Df2nUM8O4uC4u6c6H2L2dG7S3K6D9L5M8N9P4R6T7U8V9W0X1Y2Z3A4B5C6D7E8" crossorigin="anonymous"></script>
    <script>
        // SHABA API call on change
        document.getElementById('shabaInput').addEventListener('change', async function() {
            const shabaValue = this.value;
            const shabaError = document.getElementById('shabaError');
            if (shabaValue) {
                try {
                    const response = await fetch('https://api.example.com/validate-shaba', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ shaba: shabaValue })
                    });
                    const result = await response.json();
                    if (result.valid) {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                        shabaError.textContent = '';
                    } else {
                        this.classList.add('is-invalid');
                        shabaError.textContent = 'شماره شبا نامعتبر است.';
                    }
                } catch (error) {
                    console.error('Error calling API:', error);
                    this.classList.add('is-invalid');
                    shabaError.textContent = 'خطا در اعتبارسنجی شبا.';
                }
            } else {
                this.classList.add('is-invalid');
                shabaError.textContent = 'لطفاً شماره شبا معتبر وارد کنید.';
            }
        });

        // Form validation on submit
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault();
            let isValid = true;

            // Category validation
            const categorySelect = document.getElementById('categorySelect');
            const categoryError = document.getElementById('categoryError');
            if (!categorySelect.value) {
                categorySelect.classList.add('is-invalid');
                categoryError.textContent = 'لطفاً یک دسته‌بندی انتخاب کنید.';
                isValid = false;
            } else {
                categorySelect.classList.remove('is-invalid');
                categorySelect.classList.add('is-valid');
                categoryError.textContent = '';
            }

            // SHABA validation (basic check, API validation handled on change)
            const shabaInput = document.getElementById('shabaInput');
            const shabaError = document.getElementById('shabaError');
            if (!shabaInput.value) {
                shabaInput.classList.add('is-invalid');
                shabaError.textContent = 'لطفاً شماره شبا معتبر وارد کنید.';
                isValid = false;
            }

            // Email validation
            const emailInput = document.getElementById('emailInput');
            const emailError = document.getElementById('emailError');
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailInput.value || !emailPattern.test(emailInput.value)) {
                emailInput.classList.add('is-invalid');
                emailError.textContent = 'لطفاً یک آدرس ایمیل معتبر وارد کنید.';
                isValid = false;
            } else {
                emailInput.classList.remove('is-invalid');
                emailInput.classList.add('is-valid');
                emailError.textContent = '';
            }

            // Message validation
            const messageTextarea = document.getElementById('messageTextarea');
            const messageError = document.getElementById('messageError');
            if (!messageTextarea.value.trim()) {
                messageTextarea.classList.add('is-invalid');
                messageError.textContent = 'لطفاً پیام خود را وارد کنید.';
                isValid = false;
            } else {
                messageTextarea.classList.remove('is-invalid');
                messageTextarea.classList.add('is-valid');
                messageError.textContent = '';
            }

            // File validation
            const fileInput = document.getElementById('fileInput');
            const fileError = document.getElementById('fileError');
            if (!fileInput.files.length) {
                fileInput.classList.add('is-invalid');
                fileError.textContent = 'لطفاً یک فایل آپلود کنید.';
                isValid = false;
            } else {
                fileInput.classList.remove('is-invalid');
                fileInput.classList.add('is-valid');
                fileError.textContent = '';
            }

            if (isValid) {
                alert('فرم با موفقیت ارسال شد!');
                this.reset();
                document.querySelectorAll('.is-valid').forEach(el => el.classList.remove('is-valid'));
            }
        });
    </script>
</body>
</html>