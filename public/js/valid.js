$(document).ready(function () {
    // Bind input event handlers for each input field
    $("#fname").on("input", function () {
        validateName();
        //enableSubmitButton();
    });

    $("#email").on("input", function () {
        validateEmail();
        //enableSubmitButton();
    });

    $("#salary").on("input", function () {
        validateSalary();
        //enableSubmitButton();
    });

    $("#myForm").submit(function (e) {
        e.preventDefault();
        validateName();
        validateEmail();
        validateSalary();

        if ($("#myForm .error").length === 0) {
            // All fields are valid; submit the form
            this.submit(); // Use this.submit() instead of $('#myForm').submit()
        }

    });

    function validateName() {
        var nameValue = $("#fname").val().trim();
        if (nameValue === "") {
            setError($("#nameError"), "Name cannot be empty!!");
        } else if (!isValidName(nameValue)) {
            setError($("#nameError"), "Invalid Name");
        } else {
            setSuccess($("#fname"));
        }
    }

    function validateEmail() {
        var emailValue = $("#email").val().trim();
        if (emailValue === "") {
            setError($("#emailError"), "Email is required!!");
        } else if (!isValidEmail(emailValue)) {
            setError($("#emailError"), "Please enter a valid Email Address!");
        } else {
            setSuccess($("#email"));
        }
    }

    function validateSalary() {
        var salaryValue = $("#salary").val().trim();
        if (salaryValue === "") {
            setError($("#salaryError"), "Salary field cannot be left blank");
        } else if (isNaN(+salaryValue)) {
            setError($("#salaryError"), "Enter only numbers in the Salary Field.");
        } else {
            setSuccess($("#salary"));
        }
    }

    function setError(element, message) {
        element.text(message);
        element.siblings("input").addClass("error").removeClass("success");
    }

    function setSuccess(element) {
        element.siblings(".error").text("");
        element.addClass("success").removeClass("error");
    }

    function isValidName(nameValue) {
        return /^[a-zA-Z\s]{3,}$/.test(nameValue);
    }

    function isValidEmail(emailValue) {
        return /^[a-zA-Z0-9][a-zA-Z0-9._%\-]+@[a-zA-Z0-9_.-]{0,7}\.[a-zA-Z]{2,}$/.test(emailValue);
    }

    // function enableSubmitButton() {
    //     var isValid = ($("#myForm .error").length === 0);
    //     $('#myForm').prop('disabled', !isValid);
    // }
});
