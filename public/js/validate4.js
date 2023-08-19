const form = document.querySelector("form");
const fname = document.getElementById("fname");
const email = document.getElementById("email");
const salary = document.getElementById("salary");

let nameValue, emailValue, salaryValue;

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector(".error");

    errorDisplay.innerText = message;
    inputControl.classList.add("error");
    inputControl.classList.remove("success");
};

const setSuccess = (element) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector(".error");

    errorDisplay.innerText = "";
    inputControl.classList.add("success");
    inputControl.classList.remove("error");
};

const isValidEmail = (emailValue) => {
    return /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(emailValue);
};

const validateInputs = () => {
    nameValue = fname.value.trim();
    emailValue = email.value.trim();
    salaryValue = salary.value.trim();

    if (nameValue === "") {
        setError(fname, "Name cannot be empty");
    } else {
        setSuccess(fname);
    }

    if (emailValue === "") {
        setError(email, "Email address is required");
    } else if (!isValidEmail(emailValue)) {
        setError(email, "Please enter a valid Email Address");
    } else {
        setSuccess(email);
    }

    if (salaryValue === "") {
        setError(salary, "Salary field can't be left blank.");
    } else if (isNaN(+salaryValue)) {
        setError(salary, "Enter only numbers into this field.");
    } else {
        setSuccess(salary);
    }
};

// Add input event listeners to each field
fname.addEventListener("input", validateInputs);
email.addEventListener("input", validateInputs);
salary.addEventListener("input", validateInputs);

// Add focus and blur event listeners
fname.addEventListener("focus", () => setError(fname, "Name cannot be empty"));
email.addEventListener("focus", () =>
    setError(email, "Email address is required")
);
salary.addEventListener("focus", () =>
    setError(salary, "Salary field can't be left blank.")
);

form.addEventListener("submit", (e) => {
    e.preventDefault();

    const isValidForm =
        nameValue !== "" && isValidEmail(emailValue) && !isNaN(+salaryValue);
    if (isValidForm) {
        form.submit();
    }
});
