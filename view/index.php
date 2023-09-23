<?php
error_reporting(1);
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

global $wpdb;
$table_name = $wpdb->prefix . "employment";

// changing page title
function title_tag_filtering($title)
{
    if ($_SERVER['REQUEST_URI'] == '/employment/') {
        $title = "هلدینگ صنعتی ماد | نتایج فرم استخدامی";
    }
    return $title;
}

add_filter('document_title', 'title_tag_filtering');

// Header
get_header();

// retrieve data
$sql = "SELECT * FROM $table_name";
$results = $wpdb->get_results($sql);

?>

<!-- get header -->
<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/DataTables/datatables.css">
<script type="text/javascript" src="../assets/DataTables/datatables.js"></script>
<link rel="stylesheet" href="/employment/assets/css/styles.css">

<!-- Main Section -->
<script>
    jQuery(document).ready(function ($) {

        let employmentData = <?php echo json_encode($results); ?>;
        $("#viewData").DataTable({
            data: employmentData,
            dom: '<"topControl"i<"filter_search"f>>rt<"bottom"lp>',
            order: [['57', 'desc']],
            stateSave: true,
            responsive: true,
            pagingType: 'full_numbers',
            scrollCollapse: true,
            scrollY: '70vh',
            // columnDefs: [{ width: 200, targets: 1 }],
            fixedColumns: true,
            columns: [
                {data: 'full_name'},
                {data: 'father_name'},
                {data: 'birth_date'},
                {data: 'birth_location'},
                {data: 'nationality'},
                {data: 'soldiership'},
                {data: 'marriage_state'},
                {data: 'number_of_children'},
                {data: 'landline_number'},
                {data: 'phone_number'},
                {data: 'email'},
                {data: 'zip_code'},
                {data: 'residence_address'},
                {data: 'grade'},
                {data: 'field_of_study'},
                {data: 'city_of_education'},
                {data: 'name_of_school_university'},
                {data: 'from_year'},
                {data: 'to_year'},
                {data: 'job_title'},
                {data: 'workplace_name'},
                {data: 'workplace_number'},
                {data: 'job_start_time'},
                {data: 'job_end_time'},
                {data: 'income'},
                {data: 'reason_of_leaving'},
                {data: 'course_title'},
                {data: 'course_institution'},
                {data: 'city_of_course'},
                {data: 'course_duration'},
                {data: 'course_start_time'},
                {data: 'course_end_time'},
                {data: 'certificate'},
                {data: 'language_title'},
                {data: 'speaking_level'},
                {data: 'reading_level'},
                {data: 'writing_level'},
                {data: 'hearing_level'},
                {data: 'software_title'},
                {data: 'software_level'},
                {data: 'employment_status'},
                {data: 'requested_income'},
                {data: 'employment_start_date'},
                {data: 'insurance_records'},
                {data: 'daily_work_mission'},
                {data: 'overtime'},
                {data: 'judicial_records'},
                {data: 'method_of_familiarity'},
                {data: 'disease_or_allergy'},
                {data: 'relative_name_1'},
                {data: 'method_of_relative_familiarity_1'},
                {data: 'relative_job_1'},
                {data: 'relative_number_1'},
                {data: 'relative_name_2'},
                {data: 'method_of_relative_familiarity_2'},
                {data: 'relative_job_2'},
                {data: 'relative_number_2'},
                {data: 'TimeStamp'},
            ]
        });
    })
</script>

<div class="display">
    <table id="viewData" style="width: 100%">
        <thead>
        <tr>
            <th>نام و نام خانوادگی</th>
            <th>نام پدر</th>
            <th>تاریخ تولد</th>
            <th>محل تولد</th>
            <th>ملیت</th>
            <th>وضعیت سربازی</th>
            <th>وضعیت تاهل</th>
            <th>تعداد فرزند</th>
            <th>تلفن ثابت</th>
            <th>تلفن همراه</th>
            <th>آدرس ایمیل</th>
            <th>کد پستی</th>
            <th>آدرس محل سکونت</th>
            <th>مقطع تحصیلی</th>
            <th>رشته تحصیلی</th>
            <th>شهر محل تحصیل</th>
            <th>نام آموزشگاه/دانشگاه</th>
            <th>از سال</th>
            <th>تا سال</th>
            <th>عنوان شغلی</th>
            <th>نام محل کار</th>
            <th>شماره تماس</th>
            <th>تاریخ شروع فعالیت</th>
            <th>تاریخ اتمام فعالیت</th>
            <th>حقوق دریافتی</th>
            <th>علت ترک کار</th>
            <th>عنوان دوره</th>
            <th>نام مؤسسه آموزشی</th>
            <th>شهر محل آموزش</th>
            <th>مدت دوره</th>
            <th>زمان شروع دوره</th>
            <th>زمان اتمام دوره</th>
            <th>گواهینامه</th>
            <th>نام زبان</th>
            <th>سطح مکالمه</th>
            <th>سطح خواندن</th>
            <th>سطح نوشتاری</th>
            <th>سطح شنیداری</th>
            <th>نام نرم افزار</th>
            <th>سطح دانش</th>
            <th>وضعیت اشتغال</th>
            <th>حقوق درخواستی</th>
            <th>تاریخ شروع همکاری</th>
            <th>سابقه بیمه</th>
            <th>ماموریت روزانه</th>
            <th>اضافه کاری</th>
            <th>سوابق قضایی</th>
            <th>نحوه آشنایی</th>
            <th>بیماری و یا حساسیت</th>
            <th>نام آشنا ۱</th>
            <th>نحوه آشنایی ۱</th>
            <th>شغل آشنا ۱</th>
            <th>شماره تماس آشنا ۱</th>
            <th>نام آشنا ۱</th>
            <th>نحوه آشنایی ۲</th>
            <th>شغل آشنا ۲</th>
            <th>شماره تماس آشنا ۲</th>
            <th>تاریخ ثبت</th>
        </tr>
        </thead>
    </table>
</div>

<!-- Main Section -->

<!-- get footer -->
<?php get_footer() ?>
<!-- get footer -->