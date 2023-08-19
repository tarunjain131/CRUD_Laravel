$(document).ready(function () {
    $("#myForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
            },
            email: {
                required: true,
                email: true,
            },
            salary: {
                required: true,
                minlength: 3,
                number: true,
            },
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Name should be at least 3 characters long",
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address",
            },
            salary: {
                required: "Please enter your salary",
                minlength: "Salary should be at least 3 characters long",
                number: "Please enter a valid number",
            },
            submitHandler: function (form) {
                if (form.valid()) {
                form.submit();
                }
            },
        }
    });
});
