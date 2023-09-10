<?php
error_reporting(1);
// Load wordpress files
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
?>

<!-- get header -->
<?php
function title_tag_filtering($title)
{
    if ($_SERVER['REQUEST_URI'] == '/employment/') {
        $title = "هلدینگ صنعتی ماد | فرم پرسشنامه استخدامی";
    }
    return $title;
}

add_filter('document_title', 'title_tag_filtering');

get_header()
?>
<!-- get header -->
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/styles.css">
<script type="text/javascript" src="assets/js/loadash.js"></script>
<script type="text/javascript" src="assets/js/scripts.js"></script>
<!-- main -->
<div class="col-12" id="main-section"></div>
<form class="inner-card" id="employment_form" method="post" action="" autocomplete="off">
    <!--  start section  -->
    <div class="boxes active" id="start-section">
        <div class="logo-box"></div>
        <div class="text-box">
            <h1>فرم پرسشنامه استخدامی</h1>
            <p style="text-align: center">متقاضی گرامی<br>عرض سلام، خوش آمد گویی و سپاس از زمانی که برای آشنایی با این
                مجموعه صرف نموده اید،
                خواهشمندیم فرم زیر را بادقت تکمیل فرمایید.</p>
            <button class="start_button" id="start_button">شروع</button>
        </div>
    </div>
    <!--  second section  -->
    <div class="boxes" id="second-section" style="display: none">
        <div class="title-heading">
            <h2>مشخصات فردی</h2>
            <img style="height: 3.375rem;" src="assets/images/logo.webp">
        </div>
        <div class="row">
            <div class="col-4">
                <label for="full_name">نام و نام خانوادگی*</label>
                <input type="text" name="full_name" id="full_name" minlength="4" placeholder="مانند: امیر البرز"
                       required>
                <div class="error"></div>
            </div>
            <div class="col-4">
                <label for="father_name">نام پدر*</label>
                <input type="text" name="father_name" id="father_name" minlength="2" placeholder="مانند: علی" required>
                <div class="error"></div>
            </div>
            <div class="col-4">
                <label for="birth_date">تاریخ تولد*</label>
                <input type="text" name="birth_date" id="birth_date" placeholder="مانند: ۱۳ بهمن ۱۳۶۱" required>
                <div class="error"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="birth_location">محل تولد*</label>
                <input type="text" name="birth_location" id="birth_location" placeholder="مانند: تهران" required>
                <div class="error"></div>
            </div>
            <div class="col-4">
                <label for="nationality">ملیت*</label>
                <input type="text" name="nationality" id="nationality" placeholder="مانند: ایرانی" required>
                <div class="error"></div>
            </div>
            <div class="col-4">
                <label for="soldiership">وضعیت سربازی*</label>
                <input type="text" name="soldiership" id="soldiership" placeholder="مانند: معاف" required>
                <div class="error"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="marriage_state">وضعیت تاهل*</label>
                <input type="text" name="marriage_state" id="marriage_state" placeholder="مانند: مجرد" required>
                <div class="error"></div>
            </div>
            <div class="col-4">
                <label for="number_of_children">تعداد فرزند</label>
                <input type="number" name="number_of_children" id="number_of_children"
                       placeholder="در صورت داشتن فرزند تعداد را وارد کنید.">
            </div>
            <div class="col-4">
                <label for="landline_number">تلفن ثابت*</label>
                <input type="tel" name="landline_number" id="landline_number" placeholder="مانند: ۶۶۴۷۰۰۰۰-۰۲۱" required>
                <div class="error"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="phone_number">تلفن همراه*</label>
                <input type="tel" name="phone_number" id="phone_number" placeholder="مانند: ۰۹۱۲۷۶۳۱۰۳۷" required>
                <div class="error"></div>
            </div>
            <div class="col-4">
                <label for="email">آدرس پست الکترونیکی:</label>
                <input type="email" name="email" id="email" placeholder="مانند: alijafari.k1997@gmail.com">
            </div>
            <div class="col-4">
                <label for="zip_code">کد پستی</label>
                <input type="number" name="zip_code" id="zip_code" placeholder="مانند: ۶۶۴۷۰۰۰۰۰۰">
            </div>
        </div>
        <div class="row" style="width: 100%;">
            <div class="col-12" style="padding: 0;">
                <label for="residence_address">آدرس محل سکونت*</label>
                <input type="text" name="residence_address" id="residence_address"
                       placeholder="مانند: تهران، میدان ونک، برج نگار، طبقه دهم واحد ۹" required>
                <div class="error"></div>
            </div>
        </div>
        <div class="col-12" style="margin-top: 2rem">
            <button class="blue_button next">مرحله بعدی</button>
        </div>
    </div>
    <!--  third section  -->
    <div class="boxes" id="third-section" style="display: none">
        <div class="title-heading">
            <h2>سوابق تحصیلی</h2>
            <img style="height: 3.375rem;" src="assets/images/logo.webp">
        </div>
        <div id="education_container">
            <div class="edu_container_inner boxes">
                <div class="row">
                    <div class="col-4">
                        <label for="grade">مقطع تحصیلی*</label>
                        <input type="text" name="grade" placeholder="مانند: کارشناسی" required>
                        <div class="error"></div>
                    </div>
                    <div class="col-4">
                        <label for="field_of_study">رشته تحصیلی*</label>
                        <input type="text" name="field_of_study" placeholder="مانند: کامپیوتر" required>
                        <div class="error"></div>
                    </div>
                    <div class="col-4">
                        <label for="city_of_education">شهر محل تحصیل*</label>
                        <input type="text" name="city_of_education" placeholder="مانند: تهران"
                               required>
                        <div class="error"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="name_of_school_university">نام آموزشگاه/دانشگاه*</label>
                        <input type="text" name="name_of_school_university"
                               placeholder="مانند: دانشگاه تهران" required>
                        <div class="error"></div>
                    </div>
                    <div class="col-4">
                        <label for="from_year">از سال*</label>
                        <input type="number" name="from_year" placeholder="مانند: ۱۳۸۱" required>
                        <div class="error"></div>
                    </div>
                    <div class="col-4">
                        <label for="to_year">تا سال*</label>
                        <input type="number" name="to_year" placeholder="مانند: ۱۳۸۶" required>
                        <div class="error"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="width: 100%">
            <div class="col">
                <p id="add_more_education" class="add_more">افزودن سوابق تحصیلی بیشتر</p>
            </div>
        </div>
        <div class="row" style="width: 100%">
            <div class="col two_buttons">
                <button class="blue_button next">مرحله بعدی</button>
                <button class="white_button prev">مرحله قبلی</button>
            </div>
        </div>
    </div>
    <!--  forth section  -->
    <div class="boxes" id="forth-section" style="display: none">
        <div class="title-heading">
            <h2>سوابق کاری</h2>
            <img style="height: 3.375rem;" src="assets/images/logo.webp">
        </div>
        <div id="resume_container">
            <div class="resume_container_inner boxes">
                <div class="row">
                    <div class="col-4">
                        <label for="job_title">عنوان شغلی*</label>
                        <input type="text" name="job_title" placeholder="مانند: مدیر پروژه" required>
                        <div class="error"></div>
                    </div>
                    <div class="col-4">
                        <label for="workplace_name">نام محل کار*</label>
                        <input type="text" name="workplace_name" placeholder="مانند: گروه ماد" required>
                        <div class="error"></div>
                    </div>
                    <div class="col-4">
                        <label for="workplace_number">شماره تماس*</label>
                        <input type="text" name="workplace_number" placeholder="مانند: ۶۶۴۷۰۰۰۰" required>
                        <div class="error"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="job_start_time">تاریخ شروع فعالیت*</label>
                        <input type="text" name="job_start_time" placeholder="مانند: اسفند ۱۴۰۰" required>
                        <div class="error"></div>
                    </div>
                    <div class="col-4">
                        <label for="job_end_time">تاریخ اتمام فعالیت*</label>
                        <input type="number" name="job_end_time" placeholder="مانند: تیر ۱۴۰۱" required>
                        <div class="error"></div>
                    </div>
                    <div class="col-4">
                        <label for="income">حقوق دریافتی*</label>
                        <input type="number" name="income" placeholder="مانند: ۱۵ میلیون" required>
                        <div class="error"></div>
                    </div>
                </div>
                <div class="row" style="width: 100%;">
                    <div class="col-12" style="padding: 0;">
                        <label for="reason_of_leaving">علت ترک کار</label>
                        <input type="text" name="reason_of_leaving" placeholder="مانند: حل چالش‌های جدید">
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="width: 100%">
            <div class="col">
                <p id="add_more_resume" class="add_more">افزودن سوابق کاری بیشتر</p>
            </div>
        </div>
        <div class="row" style="width: 100%">
            <div class="col two_buttons">
                <button class="blue_button next">مرحله بعدی</button>
                <button class="white_button prev">مرحله قبلی</button>
            </div>
        </div>
    </div>
    <!--  fifth section  -->
    <div class="boxes" id="fifth-section" style="display: none">
        <div class="title-heading">
            <h2>دوره‌های آموزشی</h2>
            <img style="height: 3.375rem;" src="assets/images/logo.webp">
        </div>
        <div id="course_container">
            <div class="course_container_inner boxes">
                <div class="row">
                    <div class="col-4">
                        <label for="course_title">عنوان دوره</label>
                        <input type="text" name="course_title" placeholder="مانند: مارکتینگ">
                    </div>
                    <div class="col-4">
                        <label for="course_institution">نام مؤسسه آموزشی</label>
                        <input type="text" name="course_institution" placeholder="مانند: رهنما کالج">
                    </div>
                    <div class="col-4">
                        <label for="city_of_course">شهر محل آموزش</label>
                        <input type="text" name="city_of_course" placeholder="مانند: تهران">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="course_duration">مدت دوره</label>
                        <input type="text" name="course_duration" placeholder="مانند: ۸۰ ساعت">
                    </div>
                    <div class="col-4">
                        <label for="course_start_time">زمان شروع دوره</label>
                        <input type="number" name="course_start_time" placeholder="مانند: شهریور ۱۴۰۰">
                    </div>
                    <div class="col-4">
                        <label for="course_end_time">زمان اتمام دوره</label>
                        <input type="number" name="course_end_time" placeholder="مانند: آبان ۱۴۰۰">
                    </div>
                </div>
                <div class="row" style="width: 103%">
                    <div class="col-4">
                        <label for="certificate">گواهینامه</label>
                        <input type="number" name="certificate" placeholder="در صورت داشتن گواهینامه آن را اعلام کنید.">
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4"></div>
                </div>
            </div>
        </div>
        <div class="row" style="width: 100%">
            <div class="col">
                <p id="add_more_course" class="add_more">افزودن دوره‌های آموزشی بیشتر</p>
            </div>
        </div>
        <div class="row" style="width: 100%">
            <div class="col two_buttons">
                <button class="blue_button next">مرحله بعدی</button>
                <button class="white_button prev">مرحله قبلی</button>
            </div>
        </div>
    </div>
    <!--  sixth section  -->
    <div class="boxes" id="sixth-section" style="display: none">
        <div class="title-heading">
            <div class="col-8">
                <h2>زبان‌های خارجه</h2>
                <p>سطح زبان را بصورت خیلی بد، بد، متوسط، خوب و خیلی خوب وارد کنید.</p>
            </div>
            <div class="col-4" style="display: flex;height: 100%;padding-left: 2rem;justify-content: flex-end;">
                <img style="height: 3.375rem;" src="assets/images/logo.webp">
            </div>
        </div>
        <div id="language_container">
            <div class="language_container_inner boxes">
                <div class="row">
                    <div class="col-4">
                        <label for="language_title">نام زبان</label>
                        <input type="text" name="language_title" placeholder="مانند: انگلیسی">
                    </div>
                    <div class="col-4">
                        <label for="speaking_level">سطح مکالمه</label>
                        <input type="text" name="speaking_level" placeholder="مانند: متوسط">
                    </div>
                    <div class="col-4">
                        <label for="reading_level">سطح خواندن</label>
                        <input type="text" name="reading_level" placeholder="مانند: متوسط">
                    </div>
                </div>
                <div class="row" style="width: 103%">
                    <div class="col-4">
                        <label for="writing_level">سطح نوشتاری</label>
                        <input type="text" name="writing_level" placeholder="مانند: متوسط">
                    </div>
                    <div class="col-4">
                        <label for="hearing_level">سطح شنیداری</label>
                        <input type="number" name="hearing_level" placeholder="مانند: متوسط">
                    </div>
                    <div class="col-4"></div>
                </div>
            </div>
        </div>
        <div class="row" style="width: 100%">
            <div class="col">
                <p id="add_more_language" class="add_more">افزودن زبان بیشتر</p>
            </div>
        </div>
        <div class="row" style="width: 100%">
            <div class="col two_buttons">
                <button class="blue_button next">مرحله بعدی</button>
                <button class="white_button prev">مرحله قبلی</button>
            </div>
        </div>
    </div>
    <!--  seventh section  -->
    <div class="boxes" id="seventh-section" style="display: none">
        <div class="title-heading">
            <div class="col-8">
                <h2>نرم افزار</h2>
                <p>سطح دانش در نرم افزارهای مرتبط با حوزه کاری خود را بصورت خیلی بد، بد، متوسط، خوب و خیلی خوب وارد
                    کنید.</p>
            </div>
            <div class="col-4" style="display: flex;height: 100%;padding-left: 2rem;justify-content: flex-end;">
                <img style="height: 3.375rem;" src="assets/images/logo.webp">
            </div>
        </div>
        <div id="software_container" style="width: 100%">
            <div class="software_container_inner boxes">
                <div class="row" style="width: 103%">
                    <div class="col-4">
                        <label for="software_title">نام نرم افزار</label>
                        <input type="text" name="software_title" placeholder="مانند: word">
                    </div>
                    <div class="col-4">
                        <label for="software_level">سطح دانش</label>
                        <input type="text" name="software_level" placeholder="مانند: متوسط">
                    </div>
                    <div class="col-4"></div>
                </div>
            </div>
        </div>
        <div class="row" style="width: 100%">
            <div class="col">
                <p id="add_more_software" class="add_more">افزودن نرم افزار بیشتر</p>
            </div>
        </div>
        <div class="row" style="width: 100%">
            <div class="col two_buttons">
                <button class="blue_button next">مرحله بعدی</button>
                <button class="white_button prev">مرحله قبلی</button>
            </div>
        </div>
    </div>
    <!--  eighth section  -->
    <div class="boxes" id="eighth-section" style="display: none">
        <div class="title-heading">
            <h2>سایر اطلاعات</h2>
            <img style="height: 3.375rem;" src="assets/images/logo.webp">
        </div>
        <div id="other_info_container">
            <div class="other_info_container_inner boxes">
                <div class="row">
                    <div class="col-4">
                        <label for="employment_status">وضعیت اشتغال</label>
                        <input type="text" name="employment_status" placeholder="آیا در حال حاضر مشغول به کار هستید؟">
                    </div>
                    <div class="col-4">
                        <label for="requested_income">حقوق درخواستی</label>
                        <input type="text" name="requested_income" placeholder="میزان حقوق درخواستی خود را وارد کنید.">
                    </div>
                    <div class="col-4">
                        <label for="employment_start_date">تاریخ شروع همکاری</label>
                        <input type="text" name="employment_start_date"
                               placeholder="از چه تاریخی میتوانید شروع به کار نمایید؟">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="insurance_records">سابقه بیمه</label>
                        <input type="text" name="insurance_records" placeholder="آیا سابقه پرداخت حق بیمه دارید؟">
                    </div>
                    <div class="col-4">
                        <label for="daily_work_mission">ماموریت روزانه</label>
                        <input type="text" name="daily_work_mission"
                               placeholder="قادر به مسافرت برای مأموریت روزانه هستید؟">
                    </div>
                    <div class="col-4">
                        <label for="overtime">اضافه کاری</label>
                        <input type="text" name="overtime" placeholder="در صورت نیاز امکان اضافه کاری دارید؟">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="judicial_records">سوابق قضایی</label>
                        <input type="text" name="judicial_records"
                               placeholder="آیا نزد مراجع قضایی سابقه دارید؟ در وصرت وجود نام ببرید.">
                    </div>
                    <div class="col-4">
                        <label for="method_of_familiarity">نحوه آشنایی</label>
                        <input type="text" name="method_of_familiarity"
                               placeholder="نحوه آشنایی با ما از چه طریقی بوده است؟">
                    </div>
                    <div class="col-4">
                        <label for="disease_or_allergy">بیماری و یا حساسیت</label>
                        <input type="text" name="disease_or_allergy"
                               placeholder="آیا دارای بیماری و یا حساسیت نسبت به دارو و ماده خاصی هستید؟">
                    </div>
                </div>
                <div class="row" style="width: 100%">
                    <div class="col">
                        <p>دو نفر از آشنایان خود را که با شما نسبت خانوادگی نداشته و میتوانند معرف و ضامن شما باشند را
                            بنویسید.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="relative_name_1">نام و نام خانوادگی</label>
                        <input type="text" name="relative_name_1" placeholder="مانند: علی جعفری">
                    </div>
                    <div class="col-4">
                        <label for="method_of_relative_familiarity_1">نحوه آشنایی</label>
                        <input type="text" name="method_of_relative_familiarity_1" placeholder="مانند: اقوام">
                    </div>
                    <div class="col-4">
                        <label for="relative_job_1">شغل</label>
                        <input type="text" name="relative_job_1" placeholder="مانند: مدیر پروژه">
                    </div>
                </div>
                <div class="row" style="width: 103%">
                    <div class="col-4">
                        <label for="relative_number_1">شماره تماس</label>
                        <input type="text" name="relative_number_1" placeholder="مانند: ۰۹۱۲۷۶۳۱۰۳۷">
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="relative_name_2">نام و نام خانوادگی</label>
                        <input type="text" name="relative_name_2" placeholder="مانند: علی جعفری">
                    </div>
                    <div class="col-4">
                        <label for="method_of_relative_familiarity_2">نحوه آشنایی</label>
                        <input type="text" name="method_of_relative_familiarity_2" placeholder="مانند: اقوام">
                    </div>
                    <div class="col-4">
                        <label for="relative_job_2">شغل</label>
                        <input type="text" name="relative_job_2" placeholder="مانند: مدیر پروژه">
                    </div>
                </div>
                <div class="row" style="width: 103%">
                    <div class="col-4">
                        <label for="relative_number_2">شماره تماس</label>
                        <input type="text" name="relative_number_2" placeholder="مانند: ۰۹۱۲۷۶۳۱۰۳۷">
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4"></div>
                </div>
            </div>
        </div>
        <div class="row" style="width: 100%">
            <div class="col two_buttons">
                <button class="blue_button next">مرحله آخر</button>
                <button class="white_button prev">مرحله قبلی</button>
            </div>
        </div>
    </div>
    <!--  ninth section  -->
    <div class="boxes" id="ninth-section" style="display: none">
        <div class="title-heading">
            <h2>تعهدات متقاضی استخدام</h2>
            <img style="height: 3.375rem;" src="assets/images/logo.webp">
        </div>
        <div id="obligations_container" style="width: 100%">
            <div class="obligations_container_inner boxes">
                <div class="row" style="width: 103%">
                    <div class="col-12">
                        <p style="font-size: 1rem;">اینجانب نام شخص صحت و دقت اطلاعات ذکر شده در این پرسشنامه را تأیید
                            نموده و مسئولیت عدم ارائه
                            اطلاعات صحیح را می‌پذیرم؛ و در صورت اثبات خلاف اظهارات فوق، شرکت اختیار قطع یکطرفه همکاری در
                            هر مقطعی را خواهد داشت.
                            ضمناً مطلع هستم که با تکمیل این پرسشنامه، شرکت ملزم به استخدام اینجانب نمیباشد.</p>
                    </div>
                    <div class="col-12">
                        <label for="obligations_agreement" class="input_checkbox">
                            <input type="checkbox" name="obligations_agreement" id="obligations_agreement">اطلاعات را به
                            درستی وارد کردم و موارد فوق را می‌پذیرم.
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="width: 100%">
            <div class="col two_buttons">
                <button type="button" class="blue_button">پایان</button>
                <button class="white_button prev">مرحله قبلی</button>
            </div>
        </div>
    </div>
</form>
<!-- main -->

<!-- get footer -->
<?php get_footer() ?>
<!-- get footer -->
<script type="text/javascript" src="assets/persianRex/dist/persian-rex.js"></script>
<script type="text/javascript" src="assets/persian-datepicker/js/persianDatepicker.min.js"></script>
<link type="text/css" rel="stylesheet" href="assets/persian-datepicker/css/persianDatepicker-default.css">
</body>
</html>
