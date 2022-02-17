const btn = document.querySelector('.btn');

const cardMonth = document.getElementById('card_month');
const cardMonth_msg = document.getElementById('card_month_msg');

const cardYear = document.getElementById('card_year');
const cardYear_msg = document.getElementById('card_year_msg');

const cardHolder = document.getElementById('card_holder');
const cardHolder_msg = document.getElementById('card_holder_msg');

const cardNumber = document.getElementById('card_number');
const cardNumber_msg = document.getElementById('card_number_msg');

const cardCrypto = document.getElementById('card_crypto');
const cardCrypto_msg = document.getElementById('crypto_msg');



$(document).ready(function(){
    btn.addEventListener('click',()=> {
        //get data
        let month_value = cardMonth.value;
        let year_value = cardYear.value;
        let holder_value = cardHolder.value;
        let number_value = cardNumber.value;
        let crypto_value = cardCrypto.value;
    
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
    
        if (isEmpty(month_value)) {
            ErrorMsg(cardMonth,cardMonth_msg,"red","please fill input field");
            onfocus(cardMonth);
            onfocusOut(cardMonth);
        }
        if (isEmpty(year_value)) {
            ErrorMsg(cardYear,cardYear_msg,"red","please fill input field");
            onfocus(cardYear);
            onfocusOut(cardYear);
        }
        if (isEmpty(holder_value)) {
            ErrorMsg(cardHolder,cardHolder_msg,"red","please fill input field");
            onfocus(cardHolder);
            onfocusOut(cardHolder);
        }
        if (isEmpty(number_value)) {
            ErrorMsg(cardNumber,cardNumber_msg,"red","please fill input field");
            onfocus(cardNumber);
            onfocusOut(cardNumber);
        }
        if (isEmpty(crypto_value)) {
            ErrorMsg(cardCrypto,cardCrypto_msg,"red","please fill input field");
            onfocus(cardCrypto);
            onfocusOut(cardCrypto);
        }
    
        if (!isEmpty(month_value) && !isEmpty(year_value) && !isEmpty(holder_value) && !isEmpty(number_value) && !isEmpty(crypto_value)) {
            ErrorMsg(cardCrypto,cardCrypto_msg,"#f3f3f3","");
            ErrorMsg(cardNumber,cardNumber_msg,"#f3f3f3","");
            ErrorMsg(cardHolder,cardHolder_msg,"#f3f3f3","");
            ErrorMsg(cardYear,cardYear_msg,"#f3f3f3","");
            ErrorMsg(cardMonth,cardMonth_msg,"#f3f3f3","");

            //do an ajax call
            let key = true;
            $.ajax({
                type:'POST',
                    url:"./includes/inc_checkout.php",
                    data:{key:key,month_value:month_value,year_value:year_value,holder_value:holder_value,number_value:number_value,crypto_value:crypto_value},
                    dataType:'json'
            }).done(function(data) {
                if(data[0].response) {
                    window.location.assign('toPdf.php');
                }
            })
        }
    
    })
})