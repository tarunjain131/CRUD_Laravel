$(document).ready(function () {
    $("#myForm").submit(function (e) {
        e.preventDefault();
        $("input").on("input", function () {
            var nameValue = $("#fname").val().trim();
            var emailValue = $("#email").val().trim();
            var salaryValue = $("#salary").val().trim();

            let isValid = true;

            if (nameValue === "") {
                setError($("#nameError").text("Name cannot be empty!!"));
                isValid = false;
            } else if (!isValidName(nameValue)) {
                setError($("#nameError").text("Invalid Name"));
            } else {
                setSuccess($("#fname"));
            }

            if (emailValue === "") {
                setError($("#emailError").text("Email is required!!"));
                isValid = false;
            } else if (!isValidEmail(emailValue)) {
                setError(
                    $("#emailError").text("Please enter a valid Email Address!")
                );
                isValid = false;
            } else {
                setSuccess($("#email"));
            }

            if (salaryValue === "") {
                setError(
                    $("#salaryError").text("Salary field can not left blank")
                );
                isValid = false;
            } else if (isNaN(+salaryValue)) {
                setError(
                    $("#salaryError").text(
                        "Enter only numbers in Salary Field."
                    )
                );
                isValid = false;
            } else {
                setSuccess($("#salary"));
            }

            // if (isValid) {
            //     if ($(e.submitter).is("#submit")) { // Check if the submit button triggered the form submission
            //       $("#myForm")[0].submit(); // Submit the form
            //     }
            // }
            if (isValid) {
                if (e.submitter !== $("#submit ")) {
                    return;
                }
                $("#myForm")[0].submit();
            }


        });
    });
    function setError(element, message) {
        element.siblings(".error").text(message);
        element.addClass("error");
        element.removeClass("success");
    }

    function setSuccess(element) {
        element.siblings(".error").text("");
        element.addClass("success");
        element.removeClass("error");
    }

    function isValidName(nameValue) {
        return /^[a-zA-Z\s]{3,}$/.test(nameValue);
    }

    function isValidEmail(emailValue) {
        return /^[a-zA-Z0-9][a-zA-Z0-9._%\-]+@[a-zA-Z0-9_.-]{0,7}\.[a-zA-Z]{2,}$/.test(emailValue);
    }
});
