<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$title = 'ورود اطلاعات شرکت‌کنندگان';
$header = 'اطلاعات شرکت‌کنندگان';
include 'header.php';

// بررسی اینکه آیا اطلاعات اولیه وجود دارد
if (
    isset($_SESSION['conferenceName'], $_SESSION['conferenceDate'], $_SESSION['conferenceLocation'], $_SESSION['participantCount'])
) {
    $conferenceName = $_SESSION['conferenceName'];
    $conferenceDate = $_SESSION['conferenceDate'];
    $conferenceLocation = $_SESSION['conferenceLocation'];
    $participantCount = $_SESSION['participantCount'];

    // بررسی اینکه participantCount یک عدد مثبت است
    if ($participantCount < 1 || $participantCount > 50) {
        echo "<p>تعداد شرکت‌کنندگان باید بین 1 تا 50 باشد.</p>";
        echo "<button onclick=\"location.href='index.php'\">بازگشت به فرم اصلی</button>";
        include 'footer.php';
        exit();
    }

    // اگر فرم ارسال شده است (ثبت یا ویرایش اطلاعات)
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['participantName'], $_POST['participantEmail'], $_POST['participantPhone'], $_POST['participantJob'])) {
        // بررسی اینکه تعداد نام‌ها، ایمیل‌ها، تلفن‌ها و شغل‌ها با participantCount مطابقت دارد
        if (
            count($_POST['participantName']) === $participantCount &&
            count($_POST['participantEmail']) === $participantCount &&
            count($_POST['participantPhone']) === $participantCount &&
            count($_POST['participantJob']) === $participantCount
        ) {
            // پاکسازی و ذخیره اطلاعات شرکت‌کنندگان در سشن
            $participantNames = array_map('htmlspecialchars', $_POST['participantName']);
            $participantEmails = array_map('htmlspecialchars', $_POST['participantEmail']);
            $participantPhones = array_map('htmlspecialchars', $_POST['participantPhone']);
            $participantJobs = array_map('htmlspecialchars', $_POST['participantJob']);
            $_SESSION['participantNames'] = $participantNames;
            $_SESSION['participantEmails'] = $participantEmails;
            $_SESSION['participantPhones'] = $participantPhones;
            $_SESSION['participantJobs'] = $participantJobs;

            // هدایت به گزارش نهایی
            header('Location: final-report.php');
            exit();
        } else {
            echo "<p>تعداد نام‌ها، ایمیل‌ها، تلفن‌ها و شغل‌ها باید با تعداد شرکت‌کنندگان مطابقت داشته باشد.</p>";
        }
    }

    // اگر اطلاعات شرکت‌کنندگان قبلاً وارد شده باشد (برای ویرایش)
    if (isset($_SESSION['participantNames'], $_SESSION['participantEmails'], $_SESSION['participantPhones'], $_SESSION['participantJobs'])) {
        $participantNames = $_SESSION['participantNames'];
        $participantEmails = $_SESSION['participantEmails'];
        $participantPhones = $_SESSION['participantPhones'];
        $participantJobs = $_SESSION['participantJobs'];
    } else {
        // ایجاد آرایه‌های خالی برای شرکت‌کنندگان جدید
        $participantNames = array_fill(0, $participantCount, '');
        $participantEmails = array_fill(0, $participantCount, '');
        $participantPhones = array_fill(0, $participantCount, '');
        $participantJobs = array_fill(0, $participantCount, '');
    }
    ?>

    <form method="post" action="">
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
                <?php for ($i = 0; $i < $participantCount; $i++): ?>
                    <tr>
                        <td><?= $i + 1; ?></td>
                        <td>
                            <input type="text" name="participantName[]" value="<?= htmlspecialchars($participantNames[$i]); ?>" required>
                        </td>
                        <td>
                            <input type="email" name="participantEmail[]" value="<?= htmlspecialchars($participantEmails[$i]); ?>" required>
                        </td>
                        <td>
                            <input type="text" name="participantPhone[]" value="<?= htmlspecialchars($participantPhones[$i]); ?>" required>
                        </td>
                        <td>
                            <input type="text" name="participantJob[]" value="<?= htmlspecialchars($participantJobs[$i]); ?>" required>
                        </td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        <div class="buttons">
            <button type="button" onclick="location.href='index.php'">بازگشت</button>
            <button type="submit">ثبت اطلاعات</button>
        </div>
    </form>

<?php
} else {
    echo "<p>اطلاعات وارد شده ناقص است.</p>";
    echo "<button onclick=\"location.href='index.php'\">بازگشت به فرم اصلی</button>";
}

include 'footer.php';
?>
