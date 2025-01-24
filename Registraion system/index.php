<?php
session_start();
$title = 'سامانه ثبت‌نام کنفرانس';
$header = 'سامانه ثبت‌نام کنفرانس';
include 'header.php';

// اگر فرم ارسال شده است، داده‌ها را در سشن ذخیره کن
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // پاکسازی ورودی‌ها
    $_SESSION['conferenceName'] = htmlspecialchars($_POST['conferenceName']);
    $_SESSION['conferenceDate'] = htmlspecialchars($_POST['conferenceDate']);
    $_SESSION['conferenceLocation'] = htmlspecialchars($_POST['conferenceLocation']);
    $_SESSION['participantCount'] = (int) $_POST['participantCount'];
    
    // هدایت به فرم ورود اطلاعات شرکت‌کنندگان
    header('Location: form-handler.php');
    exit();
}
?>

<!-- فرم ثبت‌نام کنفرانس با اعتبارسنجی JavaScript -->
<form id="registrationForm" method="post" action="">
    <label for="conferenceName">نام کنفرانس:</label>
    <input type="text" id="conferenceName" name="conferenceName" placeholder="مثال: کنفرانس توسعه وب" required>
    <span class="error" id="conferenceNameError"></span>

    <label for="conferenceDate">تاریخ کنفرانس:</label>
    <input type="date" id="conferenceDate" name="conferenceDate" required>
    <span class="error" id="conferenceDateError"></span>

    <label for="conferenceLocation">مکان کنفرانس:</label>
    <input type="text" id="conferenceLocation" name="conferenceLocation" placeholder="مثال: تهران" required>
    <span class="error" id="conferenceLocationError"></span>

    <label for="participantCount">تعداد شرکت‌کنندگان:</label>
    <input type="number" id="participantCount" name="participantCount" min="1" max="50" placeholder="حداکثر 50 نفر" required>
    <span class="error" id="participantCountError"></span>

    <button type="submit">ادامه</button>
</form>

<?php include 'footer.php'; ?>

<!-- اسکریپت JavaScript برای اعتبارسنجی فرم -->
<script>
document.getElementById('registrationForm').addEventListener('submit', function(event) {
    // پاکسازی پیام‌های خطا
    document.getElementById('conferenceNameError').textContent = '';
    document.getElementById('conferenceDateError').textContent = '';
    document.getElementById('conferenceLocationError').textContent = '';
    document.getElementById('participantCountError').textContent = '';

    let isValid = true;

    // اعتبارسنجی نام کنفرانس
    const conferenceName = document.getElementById('conferenceName').value.trim();
    if (conferenceName === '') {
        document.getElementById('conferenceNameError').textContent = 'نام کنفرانس نمی‌تواند خالی باشد.';
        isValid = false;
    }

    // اعتبارسنجی تاریخ کنفرانس
    const conferenceDate = document.getElementById('conferenceDate').value;
    if (conferenceDate === '') {
        document.getElementById('conferenceDateError').textContent = 'تاریخ کنفرانس نمی‌تواند خالی باشد.';
        isValid = false;
    } else {
        const selectedDate = new Date(conferenceDate);
        const today = new Date();
        today.setHours(0,0,0,0); // تنظیم ساعت به صفر برای مقایسه صحیح
        if (selectedDate < today) {
            document.getElementById('conferenceDateError').textContent = 'تاریخ کنفرانس باید در آینده باشد.';
            isValid = false;
        }
    }

    // اعتبارسنجی مکان کنفرانس
    const conferenceLocation = document.getElementById('conferenceLocation').value.trim();
    if (conferenceLocation === '') {
        document.getElementById('conferenceLocationError').textContent = 'مکان کنفرانس نمی‌تواند خالی باشد.';
        isValid = false;
    }

    // اعتبارسنجی تعداد شرکت‌کنندگان
    const participantCount = parseInt(document.getElementById('participantCount').value, 10);
    if (isNaN(participantCount) || participantCount < 1 || participantCount > 50) {
        document.getElementById('participantCountError').textContent = 'تعداد شرکت‌کنندگان باید بین 1 تا 50 باشد.';
        isValid = false;
    }

    // اگر فرم معتبر نیست، جلوگیری از ارسال فرم
    if (!isValid) {
        event.preventDefault();
    }
});
</script>

<!-- افزودن استایل برای نمایش پیام‌های خطا -->
<style>
.error {
    color: red;
    font-size: 0.9em;
    margin-left: 10px;
}
</style>
