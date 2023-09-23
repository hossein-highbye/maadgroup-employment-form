<?php
error_reporting(0);

// adding phpmailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '/home/maadgrou/PHPMailer-master/src/Exception.php';
require '/home/maadgrou/PHPMailer-master/src/PHPMailer.php';
require '/home/maadgrou/PHPMailer-master/src/SMTP.php';

// Load wordpress files
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

global $wpdb;

$table_name = $wpdb->prefix . "employment";

// table creation sql query
$sql = "CREATE TABLE IF NOT EXISTS $table_name (
  ID INT NOT NULL AUTO_INCREMENT,
  full_name VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  father_name VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  birth_date DATE NOT NULL COLLATE 'utf8mb4_unicode_ci',
  birth_location VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  nationality VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  soldiership VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  marriage_state VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  number_of_children INT NOT NULL COLLATE 'utf8mb4_unicode_ci',
  landline_number VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  phone_number VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  email VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  zip_code VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  residence_address VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  grade VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  field_of_study VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  city_of_education VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  name_of_school_university VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  from_year VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  to_year VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  job_title VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  workplace_name VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  workplace_number VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  job_start_time VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  job_end_time VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  income VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  reason_of_leaving VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  course_title VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  course_institution VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  city_of_course VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  course_duration VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  course_start_time VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  course_end_time VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  certificate VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  language_title VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  speaking_level VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  reading_level VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  writing_level VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  hearing_level VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  software_title VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  software_level VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  employment_status VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  requested_income VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  employment_start_date VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  insurance_records VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  daily_work_mission VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  overtime VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  judicial_records VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  method_of_familiarity VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  disease_or_allergy VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  relative_name_1 VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  method_of_relative_familiarity_1 VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  relative_job_1 VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  relative_number_1 VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  relative_name_2 VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  method_of_relative_familiarity_2 VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  relative_job_2 VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  relative_number_2 VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
  TimeStamp DATE NOT NULL DEFAULT CURRENT_TIMESTAMP COLLATE 'utf8mb4_unicode_ci',
  PRIMARY KEY (id)
) COLLATE 'utf8mb4_unicode_ci';";

// preparing query
$prepared_query = $wpdb->prepare($sql);
// inserting
$wpdb->query($prepared_query);
?>

<!-- get header -->
<?php
// changing page title
function title_tag_filtering($title)
{
    if ($_SERVER['REQUEST_URI'] == '/employment/') {
        $title = "هلدینگ صنعتی ماد | فرم پرسشنامه استخدامی";
    }
    return $title;
}

add_filter('document_title', 'title_tag_filtering');

// requesting header
get_header();

// input xss prevention
function test_input($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

// full form statement query
$stmnt = $wpdb->prepare("INSERT INTO $table_name (`full_name`, `father_name`, `birth_date`, `birth_location`, `nationality`, `soldiership`, `marriage_state`, `number_of_children`, `landline_number`, `phone_number`, `email`, `zip_code`, `residence_address`, `grade`, `field_of_study`, `city_of_education`, `name_of_school_university`, `from_year`, `to_year`, `job_title`, `workplace_name`, `workplace_number`, `job_start_time`, `job_end_time`, `income`, `reason_of_leaving`, `course_title`, `course_institution`, `city_of_course`, `course_duration`, `course_start_time`, `course_end_time`, `certificate`, `language_title`, `speaking_level`, `reading_level`, `writing_level`, `hearing_level`, `software_title`, `software_level`, `employment_status`, `requested_income`, `employment_start_date`, `insurance_records`, `daily_work_mission`, `overtime`, `judicial_records`, `method_of_familiarity`, `disease_or_allergy`, `relative_name_1`, `method_of_relative_familiarity_1`, `relative_job_1`, `relative_number_1`, `relative_name_2`, `method_of_relative_familiarity_2`, `relative_job_2`, `relative_number_2`) VALUES ('" . test_input($_POST['full_name']) . "', '" . test_input($_POST['father_name']) . "', '" . test_input($_POST['birth_date']) . "', '" . test_input($_POST['birth_location']) . "', '" . test_input($_POST['nationality']) . "', '" . test_input($_POST['soldiership']) . "', '" . test_input($_POST['marriage_state']) . "', '" . test_input($_POST['number_of_children']) . "', '" . test_input($_POST['landline_number']) . "', '" . test_input($_POST['phone_number']) . "', '" . test_input($_POST['email']) . "', '" . test_input($_POST['zip_code']) . "', '" . test_input($_POST['residence_address']) . "', '" . test_input($_POST['grade']) . "', '" . test_input($_POST['field_of_study']) . "', '" . test_input($_POST['city_of_education']) . "', '" . test_input($_POST['name_of_school_university']) . "', '" . test_input($_POST['from_year']) . "', '" . test_input($_POST['to_year']) . "', '" . test_input($_POST['job_title']) . "', '" . test_input($_POST['workplace_name']) . "', '" . test_input($_POST['workplace_number']) . "', '" . test_input($_POST['job_start_time']) . "', '" . test_input($_POST['job_end_time']) . "', '" . test_input($_POST['income']) . "', '" . test_input($_POST['reason_of_leaving']) . "', '" . test_input($_POST['course_title']) . "', '" . test_input($_POST['course_institution']) . "', '" . test_input($_POST['city_of_course']) . "', '" . test_input($_POST['course_duration']) . "', '" . test_input($_POST['course_start_time']) . "', '" . test_input($_POST['course_end_time']) . "', '" . test_input($_POST['certificate']) . "', '" . test_input($_POST['language_title']) . "', '" . test_input($_POST['speaking_level']) . "', '" . test_input($_POST['reading_level']) . "', '" . test_input($_POST['writing_level']) . "', '" . test_input($_POST['hearing_level']) . "', '" . test_input($_POST['software_title']) . "', '" . test_input($_POST['software_level']) . "', '" . test_input($_POST['employment_status']) . "', '" . test_input($_POST['requested_income']) . "', '" . test_input($_POST['employment_start_date']) . "', '" . test_input($_POST['insurance_records']) . "', '" . test_input($_POST['daily_work_mission']) . "', '" . test_input($_POST['overtime']) . "', '" . test_input($_POST['judicial_records']) . "', '" . test_input($_POST['method_of_familiarity']) . "', '" . test_input($_POST['disease_or_allergy']) . "', '" . test_input($_POST['relative_name_1']) . "', '" . test_input($_POST['method_of_relative_familiarity_1']) . "', '" . test_input($_POST['relative_job_1']) . "', '" . test_input($_POST['relative_number_1']) . "', '" . test_input($_POST['relative_name_2']) . "', '" . test_input($_POST['method_of_relative_familiarity_2']) . "', '" . test_input($_POST['relative_job_2']) . "', '" . test_input($_POST['relative_number_2']) . "')");

// inserting
$insert_query = $wpdb->query($stmnt);

// Mail part

// getting last inserted result
$insertId = $wpdb->insert_id;
$results = $wpdb->get_row("SELECT * FROM $table_name WHERE id = $insertId");

// mail configuration
$mail = new PHPMailer(true);

try {
    // Configure SMTP server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'maadgroup-co.com';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Username = 'hr.recruitment@maadgroup-co.com';
    $mail->Password = 'BF@d8CaqU$_PONhFN^';

    // mail message part
    $mail->setFrom('hr.recruitment@maadgroup-co.com', 'hr.recruitment@maadgroup-co.com');
    $mail->addAddress('hosseinbarzegar1414@gmail.com', 'HR-MaadGroup');
    $mail->isHTML(true);
    $mail->Subject = 'New Rrecruitment Form';
    $message = "";
    foreach ($results as $key => $value) {
        switch ($key) {
            case "relative_name_1":
            case "relative_name_2":
            case "full_name":
                $key = "نام و نام خانوادگی";
                $message .= "$key:\t$value\n";
                break;
            case "father_name":
                $key = "نام پدر";
                $message .= "$key:\t$value\n";
                break;
            case "birth_date":
                $key = "تاریخ تولد";
                $message .= "$key:\t$value\n";
                break;
            case "birth_location":
                $key = "محل تولد";
                $message .= "$key:\t$value\n";
                break;
            case "nationality":
                $key = "ملیت";
                $message .= "$key:\t$value\n";
                break;
            case "soldiership":
                $key = "وضعیت سربازی";
                $message .= "$key:\t$value\n";
                break;
            case "marriage_state":
                $key = "وضعیت تاهل";
                $message .= "$key:\t$value\n";
                break;
            case "number_of_children":
                $key = "تعداد فرزند";
                $message .= "$key:\t$value\n";
                break;
            case "landline_number":
                $key = "تلفن ثابت";
                $message .= "$key:\t$value\n";
                break;
            case "phone_number":
                $key = "تلفن همراه";
                $message .= "$key:\t$value\n";
                break;
            case "email":
                $key = "آدرس پست الکترونیکی";
                $message .= "$key:\t$value\n";
                break;
            case "zip_code":
                $key = "کد پستی";
                $message .= "$key:\t$value\n";
                break;
            case "residence_address":
                $key = "آدرس محل سکونت";
                $message .= "$key:\t$value\n";
                break;
            case "grade":
                $key = "مقطع تحصیلی";
                $message .= "$key:\t$value\n";
                break;
            case "field_of_study":
                $key = "رشته تحصیلی";
                $message .= "$key:\t$value\n";
                break;
            case "city_of_education":
                $key = "شهر محل تحصیل";
                $message .= "$key:\t$value\n";
                break;
            case "name_of_school_university":
                $key = "نام آموزشگاه-دانشگاه";
                $message .= "$key:\t$value\n";
                break;
            case "from_year":
                $key = "از سال";
                $message .= "$key:\t$value\n";
                break;
            case "to_year":
                $key = "تا سال";
                $message .= "$key:\t$value\n";
                break;
            case "job_title":
                $key = "عنوان شغلی";
                $message .= "$key:\t$value\n";
                break;
            case "workplace_name":
                $key = "نام محل کار";
                $message .= "$key:\t$value\n";
                break;
            case "relative_number_1":
            case "relative_number_2":
            case "workplace_number":
                $key = "شماره تماس";
                $message .= "$key:\t$value\n";
                break;
            case "job_start_time":
                $key = "تاریخ شروع فعالیت";
                $message .= "$key:\t$value\n";
                break;
            case "job_end_time":
                $key = "تاریخ اتمام فعالیت";
                $message .= "$key:\t$value\n";
                break;
            case "income":
                $key = "حقوق دریافتی";
                $message .= "$key:\t$value\n";
                break;
            case "reason_of_leaving":
                $key = "علت ترک کار";
                $message .= "$key:\t$value\n";
                break;
            case "course_title":
                $key = "عنوان دوره";
                $message .= "$key:\t$value\n";
                break;
            case "course_institution":
                $key = "نام مؤسسه آموزشی";
                $message .= "$key:\t$value\n";
                break;
            case "city_of_course":
                $key = "شهر محل آموزش";
                $message .= "$key:\t$value\n";
                break;
            case "course_duration":
                $key = "مدت دوره";
                $message .= "$key:\t$value\n";
                break;
            case "course_start_time":
                $key = "زمان شروع دوره";
                $message .= "$key:\t$value\n";
                break;
            case "course_end_time":
                $key = "زمان اتمام دوره";
                $message .= "$key:\t$value\n";
                break;
            case "certificate":
                $key = "گواهینامه";
                $message .= "$key:\t$value\n";
                break;
            case "language_title":
                $key = "نام زبان";
                $message .= "$key:\t$value\n";
                break;
            case "speaking_level":
                $key = "سطح مکالمه";
                $message .= "$key:\t$value\n";
                break;
            case "reading_level":
                $key = "سطح خواندن";
                $message .= "$key:\t$value\n";
                break;
            case "writing_level":
                $key = "سطح نوشتاری";
                $message .= "$key:\t$value\n";
                break;
            case "hearing_level":
                $key = "سطح شنیداری";
                $message .= "$key:\t$value\n";
                break;
            case "software_title":
                $key = "نام نرم افزار";
                $message .= "$key:\t$value\n";
                break;
            case "software_level":
                $key = "سطح دانش";
                $message .= "$key:\t$value\n";
                break;
            case "employment_status":
                $key = "وضعیت اشتغال";
                $message .= "$key:\t$value\n";
                break;
            case "requested_income":
                $key = "حقوق درخواستی";
                $message .= "$key:\t$value\n";
                break;
            case "employment_start_date":
                $key = "تاریخ شروع همکاری";
                $message .= "$key:\t$value\n";
                break;
            case "insurance_records":
                $key = "سابقه بیمه";
                $message .= "$key:\t$value\n";
                break;
            case "daily_work_mission":
                $key = "ماموریت روزانه";
                $message .= "$key:\t$value\n";
                break;
            case "overtime":
                $key = "اضافه کاری";
                $message .= "$key:\t$value\n";
                break;
            case "judicial_records":
                $key = "سوابق قضایی";
                $message .= "$key:\t$value\n";
                break;
            case "method_of_relative_familiarity_1":
            case "method_of_relative_familiarity_2":
            case "method_of_familiarity":
                $key = "نحوه آشنایی";
                $message .= "$key:\t$value\n";
                break;
            case "disease_or_allergy":
                $key = "بیماری و یا حساسیت";
                $message .= "$key:\t$value\n";
                break;
            case "relative_job_2":
            case "relative_job_1":
                $key = "شغل";
                $message .= "$key:\t$value\n";
                break;
        }
        $message .= "$key: $value\n";
    }
    $mail->Body = $message;
    $mail->send();

    if ($mail->send()) {
        echo 'Email sent successfully!';
    } else {
        echo 'Error sending email: ' . $mail->ErrorInfo;
    }

// Mail part
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
<!-- get header -->
<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/employment/assets/css/styles.css">
<!-- main -->
<div class="col-12" id="main-section"></div>
<div class="last-card">
    <!--  start section  -->
    <div class="boxes active" id="start-section">
        <div class="logo-box"></div>
        <div class="text-box">
            <h1>اطلاعات شما با موفقیت ثبت شد!</h1>
            <p style="text-align: center">از وقتی که برای ثبت اطلاعات گذاشتید، سپاس گذاریم.</p>
        </div>
    </div>
</div>
<!-- main -->

<!-- get footer -->
<?php get_footer() ?>
<!-- get footer -->
<script type="text/javascript" src="/employment/assets/js/scripts.js"></script>
</body>
</html>