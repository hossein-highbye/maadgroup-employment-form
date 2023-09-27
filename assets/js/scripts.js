let persianText, persianNumber;
const $j = jQuery.noConflict();
jQuery(document).ready(function ($) {
    $(function () {
        jalaliDatepicker.startWatch({
            minDate: "attr",
            maxDate: "attr",
            hideAfterChange: true,
            persianDigits: true
        });
    });

    // input Masks
    $('#birth_date').inputmask("9999/99/99", {
        "oncomplete": function () {
            $("#birth_date").css("border", "2px solid green");
            $("#birth_date").next().children().fadeOut(500);
        }
    });
    $("#landline_number").inputmask('099-99999999', {
        "oncomplete": function () {
            $("#landline_number").css("border", "2px solid green");
            $("#landline_number").next().children().fadeOut(500);
        }
    });
    $("#number_of_children").inputmask('9{1,2}', {
        "oncomplete": function () {
            $("#number_of_children").css("border", "2px solid green");
            $("#number_of_children").next().children().fadeOut(500);
        }
    });
    $("#phone_number").inputmask('0\\999-9999999', {
        "oncomplete": function () {
            $("#phone_number").css("border", "2px solid green");
            $("#phone_number").next().children().fadeOut(500);
        }
    });
    $("#email").inputmask("*{1,20}@*{1,20}.[.*{2,6}]", {
        "oncomplete": function () {
            $("#email").css("border", "2px solid green");
            $("#email").next().children().fadeOut(500);
        }
    });
    $("#zip_code").inputmask("9{10}", {
        "oncomplete": function () {
            $("#zip_code").css("border", "2px solid green");
            $("#zip_code").next().children().fadeOut(500);
        }
    });
    $('input[name="from_year[]"]').inputmask("9{2,4}", {
        "oncomplete": function () {
            $('input[name="from_year[]"]').css("border", "2px solid green");
            $('input[name="from_year[]"]').next().children().fadeOut(500);
        }
    });
    $("input[name='to_year[]']").inputmask("9{2,4}", {
        "oncomplete": function () {
            $("input[name='to_year[]']").css("border", "2px solid green");
            $("input[name='to_year[]']").next().children().fadeOut(500);
        }
    });
    $("input[name='workplace_number[]']").inputmask('099-99999999', {
        "oncomplete": function () {
            $("input[name='workplace_number[]']").css("border", "2px solid green");
            $("input[name='workplace_number[]']").next().children().fadeOut(500);
        }
    });
    $('input[name="relative_number_1"]').inputmask('0\\999-9999999', {
        "oncomplete": function () {
            $('input[name="relative_number_1"]').css("border", "2px solid green");
        }
    });
    $('input[name="relative_number_2"]').inputmask('0\\999-9999999', {
        "oncomplete": function () {
            $('input[name="relative_number_2"]').css("border", "2px solid green");
        }
    });

    persianText = function onInputChange(inputElement) {
        if (persianRex.letter.test(inputElement.value)) {
            $(inputElement).css("border", "2px solid green");
        } else {
            $(inputElement).css("border", "2px solid red");
        }
    }
    persianNumber = function onInputChange(inputElement) {
        if (persianRex.number.test(inputElement.value)) {
            $(inputElement).css("border", "2px solid green");
        } else {
            $(inputElement).css("border", "2px solid red");
        }
    }
    let job_start_time = $('input[name="job_start_time[]"]');
    job_start_time.on('change', function () {
        if (job_start_time.val() === "") {
            job_start_time.css("border", "2px solid red");
        }
        else {
            job_start_time.css("border", "2px solid green");
        }
    })
    let job_end_time = $('input[name="job_end_time[]"]');
    job_end_time.on('change', function () {
        if (job_end_time.val() === "") {
            job_end_time.css("border", "2px solid red");
        }
        else {
            job_end_time.css("border", "2px solid green");
        }
    })
    let income = $('input[name="income[]"]');
    income.on('change', function () {
        if (income.val() === "") {
            income.css("border", "2px solid red");
        }
        else {
            income.css("border", "2px solid green");
        }
    })
    let birth_date = $('input[name="birth_date"]');
    birth_date.on('change', function () {
        if (birth_date.val() === "") {
            birth_date.css("border", "2px solid red");
        }
        else {
            birth_date.css("border", "2px solid green");
        }
    })

    let startButton = $("#start_button");
    startButton.on("click", function () {
        let startSection = $("#start-section");
        startSection.removeClass("active");
        startSection.next().addClass("active");
        startSection.fadeOut(500, function () {
            startSection.next().fadeIn(500);
        })
    })

    let prevButton = $(".prev");
    $(prevButton).on('click', function () {
        let activeTab = $(".active");
        let prevTab = activeTab.prev();
        if (prevTab) {
            prevTab.addClass("active");
            activeTab.removeClass("active");
            activeTab.fadeOut(500, function () {
                prevTab.fadeIn(500);
            })
        }
    });

    let thenButton = $(".then");
    $(thenButton).on('click', function () {
        let activeInputs = document.querySelectorAll(".active input[required]");
        let activeTab = $('.active');
        let thenTab = activeTab.next();
        if (thenTab) {
            thenTab.addClass('active');
            activeTab.removeClass('active');
            activeTab.fadeOut(500, function () {
                thenTab.fadeIn(500);
            })
        }
    })

    let nextButton = $(".next");

    document.addEventListener("change", function () {
        let activeInputs = document.querySelectorAll(".active input");
        if (activeInputs.length === 0) {
            return false;
        } else {
            for (let i = 0; i < activeInputs.length; i++) {
                let inputElement = activeInputs[i];
                if ($(inputElement).attr('required')) {
                    let errorMessage = "<span style='color:red'>لطفا" + $(inputElement).prev().text() + " را وارد نمایید.</span>";
                    if ($(inputElement).val() === "" && $(inputElement).next().children().length === 0) {
                        $(inputElement).next().append(errorMessage).hide().show('slow');
                        $(inputElement).css("border", "2px solid red");
                        return false;
                    } else {
                        $(inputElement).next().children().fadeOut(500);
                    }
                }
            }
            nextButton.on('click', function () {
                let activeInputs = document.querySelectorAll(".active input[required]");
                let isAllRequiredFieldsFilled = true;

                for (let i = 0; i < activeInputs.length; i++) {
                    let inputElement = activeInputs[i];
                    if ($(inputElement).val() === "") {
                        isAllRequiredFieldsFilled = false;
                        break;
                    }
                }

                let i = 0;
                if (isAllRequiredFieldsFilled && i <= 3) {
                    i++;
                    let activeTab = $(".active");
                    let nextTab = activeTab.next();
                    nextTab.addClass("active");
                    activeTab.removeClass("active");
                    activeTab.fadeOut(500, function () {
                        nextTab.fadeIn(500);
                    })

                }
            })
        }
    });

    let edu_container = $("#education_container");
    let edu_container_inner = $(".edu_container_inner");
    let cloned_edu_container_inner = edu_container_inner.clone();
    $("#add_more_education").on('click', function () {
        cloned_edu_container_inner = edu_container_inner.clone();
        edu_container.append(cloned_edu_container_inner);
    });
    let resume_container = $("#resume_container");
    let resume_container_inner = $(".resume_container_inner");
    let cloned_resume_container_inner = resume_container_inner.clone();
    $("#add_more_resume").on('click', function () {
        cloned_resume_container_inner = resume_container_inner.clone();
        resume_container.append(cloned_resume_container_inner);
    });
    let course_container = $("#course_container");
    let course_container_inner = $(".course_container_inner");
    let cloned_course_container_inner = course_container_inner.clone();
    $("#add_more_course").on('click', function () {
        cloned_course_container_inner = course_container_inner.clone();
        course_container.append(cloned_course_container_inner);
    });
    let language_container = $("#language_container");
    let language_container_inner = $(".language_container_inner");
    let cloned_language_container_inner = language_container_inner.clone();
    $("#add_more_language").on('click', function () {
        cloned_language_container_inner = language_container_inner.clone();
        language_container.append(cloned_language_container_inner);
    });
    let software_container = $("#software_container");
    let software_container_inner = $(".software_container_inner");
    let cloned_software_container_inner = software_container_inner.clone();
    $("#add_more_software").on('click', function () {
        cloned_software_container_inner = software_container_inner.clone();
        software_container.append(cloned_software_container_inner);
    });

    $("#end_button").on('click', function () {
        $("form").attr('action', './success/');
    })
})