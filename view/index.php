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
<script type="text/javascript" src="../assets/DataTables/numberTo/numberTo.js"></script>
<link rel="stylesheet" href="/employment/assets/css/styles.css">

<!-- Main Section -->
<script>
    jQuery(document).ready(function ($) {

        let employmentData = <?php echo json_encode($results); ?>;
        let table = new DataTable("#viewData", {
            data: employmentData,
            dom: '<"topControl"i<"filter_search"f>>rt<"bottom"lBp>',
            order: [['57', 'desc']],
            stateSave: true,
            responsive: true,
            pagingType: 'full_numbers',
            scrollCollapse: true,
            scrollY: '70vh',
            fixedColumns: true,
            buttons: [
                'copy', 'excel'
            ],
            language: {
                url: '../assets/DataTables/persian/fa.json'
            },
            autoWidth: false,
            columns: [
                {data: 'full_name', class: 'dtr-control', title: "نام و نام خانوادگی", width: 200},
                {data: 'father_name', title: "نام پدر", width: 200},
                {data: 'birth_date', title: "تاریخ تولد", render: DataTable.render.numberTo('fa'), width: 200},
                {data: 'birth_location', title: "محل تولد", width: 200},
                {data: 'nationality', title: "ملیت", width: 200},
                {data: 'soldiership', title: "وضعیت سربازی"},
                {data: 'marriage_state', title: "وضعیت تاهل"},
                {data: 'number_of_children', title: "تعداد فرزند", render: DataTable.render.numberTo('fa')},
                {data: 'landline_number', title: "تلفن ثابت", render: DataTable.render.numberTo('fa')},
                {data: 'phone_number', title: "تلفن همراه", render: DataTable.render.numberTo('fa')},
                {data: 'email', title: "آدرس ایمیل"},
                {data: 'zip_code', title: "کد پستی", render: DataTable.render.numberTo('fa')},
                {data: 'residence_address', title: "آدرس محل سکونت"},
                {data: 'grade', title: "مقطع تحصیلی"},
                {data: 'field_of_study', title: "رشته تحصیلی"},
                {data: 'city_of_education', title: "شهر محل تحصیل"},
                {data: 'name_of_school_university', title: "نام آموزشگاه/دانشگاه"},
                {data: 'from_year', title: "از سال", render: DataTable.render.numberTo('fa')},
                {data: 'to_year', title: "تا سال", render: DataTable.render.numberTo('fa')},
                {data: 'job_title', title: "عنوان شغلی"},
                {data: 'workplace_name', title: "نام محل کار"},
                {data: 'workplace_number', title: "شماره تماس", render: DataTable.render.numberTo('fa')},
                {data: 'job_start_time', title: "تاریخ شروع فعالیت", render: DataTable.render.numberTo('fa')},
                {data: 'job_end_time', title: "تاریخ اتمام فعالیت", render: DataTable.render.numberTo('fa')},
                {data: 'income', title: "حقوق دریافتی"},
                {data: 'reason_of_leaving', title: "علت ترک کار"},
                {data: 'course_title', title: "عنوان دوره"},
                {data: 'course_institution', title: "نام مؤسسه آموزشی"},
                {data: 'city_of_course', title: "شهر محل آموزش"},
                {data: 'course_duration', title: "مدت دوره"},
                {data: 'course_start_time', title: "زمان شروع دوره"},
                {data: 'course_end_time', title: "زمان اتمام دوره"},
                {data: 'certificate', title: "گواهینامه"},
                {data: 'language_title', title: "نام زبان"},
                {data: 'speaking_level', title: "سطح مکالمه"},
                {data: 'reading_level', title: "سطح خواندن"},
                {data: 'writing_level', title: "سطح نوشتاری"},
                {data: 'hearing_level', title: "سطح شنیداری"},
                {data: 'software_title', title: "نام نرم افزار"},
                {data: 'software_level', title: "سطح دانش"},
                {data: 'employment_status', title: "وضعیت اشتغال"},
                {data: 'requested_income', title: "حقوق درخواستی"},
                {data: 'employment_start_date', title: "تاریخ شروع همکاری", render: DataTable.render.numberTo('fa')},
                {data: 'insurance_records', title: "سابقه بیمه"},
                {data: 'daily_work_mission', title: "ماموریت روزانه"},
                {data: 'overtime', title: "اضافه کاری"},
                {data: 'judicial_records', title: "سوابق قضایی"},
                {data: 'method_of_familiarity', title: "نحوه آشنایی"},
                {data: 'disease_or_allergy', title: "بیماری و یا حساسیت"},
                {data: 'relative_name_1', title: "نام آشنا اول"},
                {data: 'method_of_relative_familiarity_1', title: "نحوه آشنایی اول"},
                {data: 'relative_job_1', title: "شغل آشنا اول"},
                {data: 'relative_number_1', title: "شماره تماس آشنا اول", render: DataTable.render.numberTo('fa')},
                {data: 'relative_name_2', title: "نام آشنا دوم"},
                {data: 'method_of_relative_familiarity_2', title: "نحوه آشنایی دوم"},
                {data: 'relative_job_2', title: "شغل آشنا دوم"},
                {data: 'relative_number_2', title: "شماره تماس آشنا دوم", render: DataTable.render.numberTo('fa')},
                {data: 'TimeStamp', title: "تاریخ ثبت", render: DataTable.render.numberTo('fa')},
            ]
        });
    })
</script>

<div id="mainDiv">
    <div class="mainsection">
        <table class="display" id="viewData" style="width: 90%"></table>
    </div>
</div>

<!-- Main Section -->

<!-- get footer -->
<?php get_footer() ?>
<!-- get footer -->