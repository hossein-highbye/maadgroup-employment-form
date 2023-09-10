jQuery(document).ready(function ($) {
    $(function () {
        $("#birth_date").persianDatepicker();
    })

    let full_name = $("#full_name");

    // full_name.on('change', function () {
    //     if (persianRex.letter.test(full_name.val())) {
    //         full_name.css("border", "2px solid green");
    //         $("#full_name:focus").css("border", "2px solid green");
    //     } else {
    //         full_name.css("border", "2px solid red");
    //         $("#full_name:focus").css("border", "2px solid red");
    //     }
    // });

    let startButton = $("#start_button");
    startButton.on("click", function () {
        let startSection = $("#start-section");
        startSection.removeClass("active");
        startSection.next().addClass("active");
        startSection.fadeOut(500, function () {
            startSection.next().fadeIn(500);
        })
    })

    let nextButton = $(".next");
    let prevButton = $(".prev");

    let activeInputs = document.querySelectorAll(".active input[required]");
    nextButton.onclick = function () {
        let isAllRequiredFieldsFilled = true;

        for (let i = 0; i < activeInputs.length; i++) {
            let inputElement = activeInputs[i];
            if (inputElement.value === "") {
                isAllRequiredFieldsFilled = false;
                break;
            }
        }

        if (isAllRequiredFieldsFilled) {
            Event.preventDefault();
            let activeTab = $(".active");
            let nextTab = activeTab.next();
            if (nextTab) {
                nextTab.addClass("active");
                activeTab.removeClass("active");
                activeTab.fadeOut(500, function () {
                    nextTab.fadeIn(500);
                })
            }
        } else {
            return false;
        }
    };

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

    document.addEventListener("change", function () {
        let activeInputs = document.querySelectorAll(".active input[required]");
        for (let i = 0; i < activeInputs.length; i++) {
            let inputElement = activeInputs[i];
            let errorMessage = "<span style='color:red'>لطفا " + $(inputElement).prev().text() + " را وارد نمایید.</span>";
            if (inputElement.value === "" && $(inputElement).next().children().length === 0) {
                $(inputElement).css("border", "2px solid red");
                $(inputElement).next().append(errorMessage);
                $(inputElement).next().get(0).originalEvent.preventDefault();
            }
            if (inputElement.value !== "") {
                $(inputElement).next().children().fadeOut(500);
            }
        }
    })

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