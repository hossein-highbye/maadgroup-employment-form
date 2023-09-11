let persianText, persianNumber;
jQuery(document).ready(function ($) {
    $(function () {
        $("#birth_date").persianDatepicker();
    })

    // input Masks
    $('#birth_date').inputmask("9{4}/9{1,2}/9{1,2}");
    $("#landline_number").inputmask('099-99999999');
    $("#number_of_children").inputmask('9{1,2}');
    $("#phone_number").inputmask('0\\999-9999999');
    $("#email").inputmask("*{1,20}@*{1,20}.[.*{2,6}]");
    $("#zip_code").inputmask("9{10}");

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
            $(inputElement).css("border", "2px solid green");
        }
    }

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
        let activeInputs = document.querySelectorAll(".active input[required]");
        if (activeInputs.length === 0) {
            return false;
        } else {
            for (let i = 0; i < activeInputs.length; i++) {
                let inputElement = activeInputs[i];
                let errorMessage = "<span style='color:red'>لطفا" + $(inputElement).prev().text() + " را وارد نمایید.</span>";
                if (inputElement.value === "" && $(inputElement).next().children().length === 0) {
                    $(inputElement).next().append(errorMessage);
                    $(inputElement).css("border", "2px solid red");
                    return false;
                }
                if (inputElement.value !== "") {
                    // $(inputElement).css("border", "2px solid green");
                    $(inputElement).next().children().fadeOut(500);
                }
            }
            nextButton.on('click', function () {
                let activeInputs = document.querySelectorAll(".active input[required]");
                let isAllRequiredFieldsFilled = true;

                for (let i = 0; i < activeInputs.length; i++) {
                    let inputElement = activeInputs[i];
                    if (inputElement.value === "") {
                        isAllRequiredFieldsFilled = false;
                        break;
                    }
                }

                if (isAllRequiredFieldsFilled) {
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

    function submitForm() {
        $("form").attr('action', 'success/index.php');
    }
})