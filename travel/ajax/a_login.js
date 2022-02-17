$(document).ready(
    function() {

        const email = document.getElementById("email");
        const password = document.getElementById("password");

        //on button click
        $('.login-btn').click(
            function() {

                //get inputs info
                const email_error = document.getElementById("email_msg");
                let email_value = email.value;
                const emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                let email_valid = false;

                let password_value = document.getElementById("password").value;
                const password_error = document.getElementById("password_msg");
                const passwordFormat = /^.{10,16}$/;
                let password_valid = false;
                
                const login_error = document.getElementById("validate_login_msg");
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
                //show login error message
                function loginError( msg, msg_color, msg_content) {
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


                //ajax call
                if (email_valid === true && password_valid === true) {
                    $.ajax({
                        type: 'POST',
                        url: './includes/inc_login.php',
                        data: { email: email_value, password: password_value},
                        dataType: 'json'
                    }).done(function(res) {
                        if(res[0].response === true) {
                            window.location.assign('index.php');
                        }else {
                            loginError(login_error,"red","invalid password or email.");

                        }
                    })
                }


            }
        )
    }
)