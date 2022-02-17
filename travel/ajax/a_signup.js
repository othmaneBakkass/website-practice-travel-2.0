$(document).ready(function() {

    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("cnfrm_password");
    const firstName = document.getElementById("firstname");
    const lastName = document.getElementById("lastname");
    const date_birth = document.getElementById("birth");

    //on button click
    $(".signup-btn").click(function() {
        //get inputs info
        const email_error = document.getElementById("email_msg");
        let email_value = email.value;
        const emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        let email_valid = false;


        let password_value = document.getElementById("password").value;
        const password_error = document.getElementById("password_msg");
        const passwordFormat = /^.{10,16}$/;
        let password_valid = false;


        let confirmPassword_value = document.getElementById("cnfrm_password").value;
        const confirmPassword_error = document.getElementById("cnfrm_password_msg");
        let confirmPassword_valid = false;


        let firstName_value = document.getElementById("firstname").value;
        const firstName_error = document.getElementById("firstname_msg");
        let firstName_valid = false;
        const nameFormat = /^[a-zA-Z\-]+$/;;


        let lastName_value = document.getElementById("lastname").value;
        const lastName_error = document.getElementById("lastname_msg");
        let lastName_valid = false;


        let date_birth_value = document.getElementById("birth").value;
        const date_birth_error = document.getElementById("birth_msg");
        let date_birth_valid = false;


        //check if the input field is empty
        function isEmpty(field) {
            if (field === '') {
                return true;
            } else {
                return false;
            }
        }
        //show error message
        function ErrorMsg(input, msg, msg_color, msg_content) {
            input.style.borderBottom = `3px solid ${msg_color}`;
            msg.style.color = msg_color;
            msg.innerText = msg_content;
        }

        //remove error message styling
        function onfocus(input) {
            input.addEventListener('focusin', () => {
                input.style.borderBottom = "3px solid #0075ff";
            })
        }

        function onfocusOut(input) {
            input.addEventListener('focusout', () => {
                input.style.borderBottom = "3px solid #f3f3f3";
            })
        }
        //validation of input format using regex
        function validateFormat(input, format) {
            if (input.match(format)) {
                return true;
            } else {
                return false;
            }
        }
        //check if the two passwords are the same
        function validateConfirmPassword() {
            if (confirmPassword_value === password_value) {
                return true;
            } else {
                return false;
            }

        }
        //check user age
        function checkAge(date_value) {
            let userDate = new Date(date_value);
            let userYear = userDate.getFullYear();
            let date = new Date();
            let year = date.getFullYear();
            let age = year - userYear
            if (age > 18) {
                return true;
            } else {
                return false;

            }
        }

        //email validation
        if (isEmpty(email_value) === true) {
            ErrorMsg(email, email_error, "red", "Please fill the input field.");
            onfocus(email);
            onfocusOut(email);
        } else {
            //regex validation
            if (validateFormat(email_value, emailFormat) === false) {
                ErrorMsg(email, email_error, "red", "invalid email format.");
                onfocus(email);
                onfocusOut(email);
            } else {
                ErrorMsg(email, email_error, "#0075ff", "");
                email_valid = true;
            }
        }

        //password validation
        if (isEmpty(password_value) === true) {
            ErrorMsg(password, password_error, "red", "Please fill the input field.");
            onfocus(password);
            onfocusOut(password);
        } else {
            //regex validation
            if (validateFormat(password_value, passwordFormat) === false) {
                ErrorMsg(password, password_error, "red", "Password must be 10-16 Characters Long.");
                onfocus(password);
                onfocusOut(password);
            } else {
                ErrorMsg(password, password_error, "#0075ff", "");
                password_valid = true;
            }
        }

        //confirm Password validation
        if (isEmpty(confirmPassword_value) === true) {
            ErrorMsg(confirmPassword, confirmPassword_error, "red", "Please fill the input field.");
            onfocus(confirmPassword);
            onfocusOut(confirmPassword);

        } else {
            //check if the two passwords are the same
            if (validateConfirmPassword() !== true) {
                ErrorMsg(confirmPassword, confirmPassword_error, "red", "the password is not the same.");
                onfocus(confirmPassword);
                onfocusOut(confirmPassword);
            } else {
                ErrorMsg(confirmPassword, confirmPassword_error, "#0075ff", "");
                confirmPassword_valid = true;
            }
        }

        //firstName validation
        if (isEmpty(firstName_value) === true) {
            ErrorMsg(firstName, firstName_error, "red", "Please fill the input field.");
            onfocus(firstName);
            onfocusOut(firstName);
        } else {
            //regex validation
            if (validateFormat(firstName_value, nameFormat) === false) {
                ErrorMsg(firstName, firstName_error, "red", "Only characters A-Z and a-z are acceptable.");
                onfocus(firstName);
                onfocusOut(firstName);
            } else {
                ErrorMsg(firstName, firstName_error, "#0075ff", "");
                firstName_valid = true;
            }
        }

        //lastName validation
        if (isEmpty(lastName_value) === true) {
            ErrorMsg(lastName, lastName_error, "red", "Please fill the input field.");
            onfocus(lastName);
            onfocusOut(lastName);

        } else {
            //regex validation
            if (validateFormat(lastName_value, nameFormat) === false) {
                ErrorMsg(lastName, lastName_error, "red", "Only characters A-Z and a-z are acceptable.");
                onfocus(lastName);
                onfocusOut(lastName);
            } else {
                lastName_valid = true;
                ErrorMsg(lastName, lastName_error, "#0075ff", "");
            }
        }


        //date_birth validation
        if (isEmpty(date_birth_value) === true) {
            ErrorMsg(date_birth, date_birth_error, "red", "Please fill the input field");
            onfocus(date_birth);
            onfocusOut(date_birth);
        } else {
            //check user age 
            if (checkAge(date_birth_value)) {
                ErrorMsg(date_birth, date_birth_error, "#0075ff", "");
                date_birth_valid = true;
            } else {
                ErrorMsg(date_birth, date_birth_error, "red", "You must be 18 years old or above.");
                onfocus(date_birth);
                onfocusOut(date_birth);
            }

        }

        if (email_valid === true && password_valid === true && confirmPassword_valid === true && firstName_valid === true && lastName_valid === true && date_birth_valid === true) {
            $.ajax({
                type: 'POST',
                url: './includes/inc_signup.php',
                data: {
                    email: email_value,
                    password: password_value,
                    firstName: firstName_value,
                    lastName: lastName_value,
                    birth: date_birth_value
                },
                dataType: 'json'
            }).done(function(res) {
                if (res[0].result == "email already exists") {
                    ErrorMsg(email, email_error, "red", "email already exists");
                    onfocus(email);
                    onfocusOut(email);
                }
                if (res[0].result == "true") {
                    window.location.assign('index.php');
                }
            })
        }

    })
})