$(document).ready(function () {
    var nameValue, emailValue, salaryValue;
    $("#fname").on("input", function () {
        validateName();
    });

    $("#email").on("input", function () {
        validateEmail();
    });

    $("#salary").on("input", function () {
        validateSalary();
    });

    // Submit button
    $("#submit").click(function () {
        validateName();
        validateEmail();
        validateSalary();
        if (isValidName(nameValue) && isValidEmail(emailValue) && !isNaN(salaryValue)) {
            return true;
        } else {
            return false;
        }
    });

    function validateName() {
        nameValue = $("#fname").val().trim();
        var nameErrorElement = $("#nameError");

        if (nameValue === "") {
            setError(nameErrorElement, "Name cannot be empty!!");
        } else if (!isValidName(nameValue)) {
            setError(nameErrorElement, "Invalid Name");
        } else {
            setSuccess(nameErrorElement);
        }
    }

    function validateEmail() {
        emailValue = $("#email").val().trim();
        var emailErrorElement = $("#emailError");

        if (emailValue === "") {
            setError(emailErrorElement, "Email is required!!");
        } else if (!isValidEmail(emailValue)) {
            setError(emailErrorElement, "Please enter a valid Email Address!");
        } else {
            setSuccess(emailErrorElement);
        }
    }

    function validateSalary() {
        salaryValue = $("#salary").val().trim();
        var salaryErrorElement = $("#salaryError");

        if (salaryValue === "") {
            setError(salaryErrorElement, "Salary field cannot be left blank");
        } else if (!isValidSalary(salaryValue)) {
            setError(
                salaryErrorElement,
                "Enter only whole numbers in the Salary Field."
            );
        } else {
            setSuccess(salaryErrorElement);
        }
    }

    function setError(element, message) {
        element.text(message);
        element.siblings("input").addClass("error").removeClass("success");
    }

    function setSuccess(element) {
        element.text("");
        element.siblings("input").removeClass("error").addClass("success");
    }

    function isValidName(nameValue) {
        return /^[a-zA-Z\s]{3,}$/.test(nameValue);
    }

    function isValidEmail(emailValue) {
        return /^[a-zA-Z0-9][a-zA-Z0-9._%\-]+@[a-zA-Z0-9_.-]{0,7}\.[a-zA-Z]{2,}$/.test(emailValue);
    }

    function isValidSalary(salaryValue) {
        return /^[1-9]\d*$/.test(salaryValue);
    }
});
