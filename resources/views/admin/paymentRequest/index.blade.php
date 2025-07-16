<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت کاربران</title>
    <!-- Bootstrap RTL CSS CDN -->
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
        <h2>مدیریت کاربران</h2>
        <div class="mb-3">
            <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#bulkConfirmModal">تأیید گروهی</button>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#bulkRejectModal">رد گروهی</button>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col"><input type="checkbox" id="selectAll"></th>
                    <th scope="col">نام</th>
                    <th scope="col">ایمیل</th>
                    <th scope="col">نقش</th>
                    <th scope="col">عملیات</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                <!-- Static user data -->
                <tr class="user-row" data-user-id="1">
                    <td><input type="checkbox" class="row-checkbox"></td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class="text-decoration-none" data-bs-toggle="dropdown">جان دو</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#userDetailsOffcanvas" onclick="showUserDetails(1)">مشاهده جزئیات</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>john.doe@example.com</td>
                    <td>توسعه‌دهنده</td>
                    <td>
                        <button class="btn btn-sm btn-success confirm-btn" data-user-id="1">تأیید</button>
                        <button class="btn btn-sm btn-danger reject-btn" data-bs-toggle="modal" data-bs-target="#rejectModal" data-user-id="1">رد</button>
                    </td>
                </tr>
                <tr class="user-row" data-user-id="2">
                    <td><input type="checkbox" class="row-checkbox"></td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class="text-decoration-none" data-bs-toggle="dropdown">جین اسمیت</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#userDetailsOffcanvas" onclick="showUserDetails(2)">مشاهده جزئیات</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>jane.smith@example.com</td>
                    <td>طراح</td>
                    <td>
                        <button class="btn btn-sm btn-success confirm-btn" data-user-id="2">تأیید</button>
                        <button class="btn btn-sm btn-danger reject-btn" data-bs-toggle="modal" data-bs-target="#rejectModal" data-user-id="2">رد</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Offcanvas for User Details -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="userDetailsOffcanvas" aria-labelledby="userDetailsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="userDetailsLabel">جزئیات کاربر</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div id="userDetailsContent">
                <!-- User details will be populated here -->
            </div>
        </div>
    </div>

    <!-- Modal for Single Reject -->
    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">رد کاربر</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="rejectForm">
                        <div class="mb-3">
                            <label for="rejectReason" class="form-label">دلیل رد</label>
                            <textarea class="form-control" id="rejectReason" rows="4" required></textarea>
                            <div class="invalid-feedback">لطفاً دلیل رد را وارد کنید.</div>
                        </div>
                        <input type="hidden" id="rejectUserId">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لغو</button>
                    <button type="button" class="btn btn-danger" id="confirmReject">تأیید رد</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Bulk Confirm -->
    <div class="modal fade" id="bulkConfirmModal" tabindex="-1" aria-labelledby="bulkConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bulkConfirmModalLabel">تأیید گروهی کاربران</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>آیا مطمئن هستید که می‌خواهید تمام کاربران انتخاب‌شده را تأیید کنید؟</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لغو</button>
                    <button type="button" class="btn btn-success" id="confirmBulkConfirm">تأیید</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Bulk Reject -->
    <div class="modal fade" id="bulkRejectModal" tabindex="-1" aria-labelledby="bulkRejectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bulkRejectModalLabel">رد گروهی کاربران</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="bulkRejectForm">
                        <div class="mb-3">
                            <label for="bulkRejectReason" class="form-label">دلیل رد</label>
                            <textarea class="form-control" id="bulkRejectReason" rows="4" required></textarea>
                            <div class="invalid-feedback">لطفاً دلیل رد را وارد کنید.</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لغو</button>
                    <button type="button" class="btn btn-danger" id="confirmBulkReject">تأیید رد</button>
                </div>
            </div>
        </div>
    </div “[bulkRejectModal]”>
    <!-- Bootstrap JS and Popper.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        // Fetch user details from API
        async function fetchUserDetails(userId) {
            try {
                const response = await fetch(`https://api.example.com/users/${userId}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                });
                if (!response.ok) throw new Error('Failed to fetch user details');
                const user = await response.json();
                return user;
            } catch (error) {
                console.error('Error fetching user details:', error);
                return null;
            }
        }

        // Show user details in offcanvas
        async function showUserDetails(userId) {
            const user = await fetchUserDetails(userId);
            const content = document.getElementById('userDetailsContent');
            if (user) {
                content.innerHTML = `
                    <p><strong>نام:</strong> ${user.name}</p>
                    <p><strong>ایمیل:</strong> ${user.email}</p>
                    <p><strong>نقش:</strong> ${user.role}</p>
                    <p><strong>جزئیات:</strong> ${user.details || 'جزئیات اضافی در دسترس نیست.'}</p>
                `;
            } else {
                contenta.innerHTML = '<p>بارگذاری جزئیات کاربر ناموفق بود. لطفاً دوباره تلاش کنید.</p>';
            }
        }

        // Select all checkboxes
        document.getElementById('selectAll').addEventListener('change', function() {
            document.querySelectorAll('.row-checkbox').forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // Single Confirm button
        document.querySelectorAll('.confirm-btn').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-user-id');
                alert(`کاربر ${userId} تأیید شد!`);
                // Implement API call or logic for confirmation
            });
        });

        // Single Reject button
        document.querySelectorAll('.reject-btn').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-user-id');
                document.getElementById('rejectUserId').value = userId;
            });
        });

        // Confirm single rejection
        document.getElementById('confirmReject').addEventListener('click', function() {
            const form = document.getElementById('rejectForm');
            const reason = document.getElementById('rejectReason');
            const userId = document.getElementById('rejectUserId').value;
            if (reason.value.trim()) {
                reason.classList.remove('is-invalid');
                alert(`کاربر ${userId} با دلیل: ${reason.value} رد شد`);
                // Implement API call or logic for rejection
                bootstrap.Modal.getInstance(document.getElementById('rejectModal')).hide();
                form.reset();
            } else {
                reason.classList.add('is-invalid');
            }
        });

        // Bulk Confirm
        document.getElementById('confirmBulkConfirm').addEventListener('click', function() {
            const selectedIds = Array.from(document.querySelectorAll('.row-checkbox:checked')).map(cb => cb.closest('tr').getAttribute('data-user-id'));
            if (selectedIds.length > 0) {
                alert(`کاربران تأییدشده گروهی: ${selectedIds.join(', ')}`);
                // Implement API call or logic for bulk confirmation
                bootstrap.Modal.getInstance(document.getElementById('bulkConfirmModal')).hide();
            } else {
                alert('لطفاً حداقل یک کاربر انتخاب کنید.');
            }
        });

        // Bulk Reject
        document.getElementById('confirmBulkReject').addEventListener('click', function() {
            const form = document.getElementById('bulkRejectForm');
            const reason = document.getElementById('bulkRejectReason');
            const selectedIds = Array.from(document.querySelectorAll('.row-checkbox:checked')).map(cb => cb.closest('tr').getAttribute('data-user-id'));
            if (selectedIds.length === 0) {
                alert('لطفاً حداقل یک کاربر انتخاب کنید.');
                return;
            }
            if (reason.value.trim()) {
                reason.classList.remove('is-invalid');
                alert(`کاربران ردشده گروهی: ${selectedIds.join(', ')} با دلیل: ${reason.value}`);
                // Implement API call or logic for bulk rejection
                bootstrap.Modal.getInstance(document.getElementById('bulkRejectModal')).hide();
                formServings.reset();
            } else {
                reason.classList.add('is-invalid');
            }
        });
    </script>
</body>
</html>