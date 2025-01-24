<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$title = 'گزارش نهایی ثبت‌نام';
$header = 'گزارش نهایی ثبت‌نام';
include 'header.php';

// بررسی اینکه آیا اطلاعات شرکت‌کنندگان وجود دارد
if (
    isset($_SESSION['conferenceName'], $_SESSION['conferenceDate'], $_SESSION['conferenceLocation'], $_SESSION['participantNames'], $_SESSION['participantEmails'], $_SESSION['participantPhones'], $_SESSION['participantJobs']) &&
    count($_SESSION['participantNames']) === count($_SESSION['participantEmails']) &&
    count($_SESSION['participantNames']) === count($_SESSION['participantPhones']) &&
    count($_SESSION['participantNames']) === count($_SESSION['participantJobs'])
) {
    $conferenceName = $_SESSION['conferenceName'];
    $conferenceDate = $_SESSION['conferenceDate'];
    $conferenceLocation = $_SESSION['conferenceLocation'];
    $participantNames = $_SESSION['participantNames'];
    $participantEmails = $_SESSION['participantEmails'];
    $participantPhones = $_SESSION['participantPhones'];
    $participantJobs = $_SESSION['participantJobs'];
    ?>

    <p><strong>نام کنفرانس:</strong> <?= $conferenceName; ?></p>
    <p><strong>تاریخ کنفرانس:</strong> <?= $conferenceDate; ?></p>
    <p><strong>مکان کنفرانس:</strong> <?= $conferenceLocation; ?></p>
    <table>
        <thead>
            <tr>
                <th>ردیف</th>
                <th>نام شرکت‌کننده</th>
                <th>ایمیل</th>
                <th>شماره تلفن</th>
                <th>شغل</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($participantNames as $index => $name): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= htmlspecialchars($name); ?></td>
                    <td><?= htmlspecialchars($participantEmails[$index]); ?></td>
                    <td><?= htmlspecialchars($participantPhones[$index]); ?></td>
                    <td><?= htmlspecialchars($participantJobs[$index]); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="buttons">
        <!-- دکمه ثبت‌نام جدید -->
        <button onclick="location.href='index.php'">ثبت‌نام جدید</button>
        <!-- دکمه ویرایش اطلاعات -->
        <form method="post" action="form-handler.php" style="display: inline;">
            <button type="submit">ویرایش اطلاعات</button>
        </form>
    </div>

<?php
} else {
    echo "<p>اطلاعات کافی برای نمایش گزارش وجود ندارد.</p>";
    echo "<button onclick=\"location.href='index.php'\">بازگشت به فرم اصلی</button>";
}

include 'footer.php';
?>
