$(document).ready(
    function() {
        //cart x buttons
            const xBtn = document.querySelectorAll('.x-btn');
        //cart qte buttons
        const qteIncrement = document.querySelectorAll('.cart-quantity-inc');
        const qteDecrement = document.querySelectorAll('.cart-quantity-desc');

        let increment = 1;

        //increase

        qteIncrement.forEach(el => {
            el.addEventListener('click',(e)=> {
                increaseQte(e);
            })
        });

        function increaseQte(e) {
            // get the trip id
            let tripId = e.target.getAttribute("data-trip-id");

            //select total of an order
            let tripTotal = document.querySelector(`.default_total[data-trip-id='${tripId}']`).childNodes[0];

            //select cart total
            let cartTotal = document.getElementById('summary-total');


            //set the new qte value
            const qteValue = document.querySelector(`.cart-quantity[data-trip-id='${tripId}']`);
            qteValue.textContent = Number(qteValue.textContent) + increment;

            // do an ajax call
            $.ajax(
                {
                    type:'POST',
                    url:"./includes/inc_cart.php",
                    data:{newQte :qteValue.textContent,tripId:tripId},
                    datatType:'json'
                }
            ).done(
                function(res) {

                    //check if the operation is a success
                    let result = JSON.parse(res);

                    if(result[0].response) {
                        tripTotal.nodeValue = result[1].new_total;
                        cartTotal.innerText = result[2].total_sum;
                    }
                }
            )
        }


         //decrease

         qteDecrement.forEach(el => {
            el.addEventListener('click',(e)=> {
                decreaseQte(e);
            })
        });

        function decreaseQte(e) {
            let allowAjax = false;

            // get the trip id
            let tripId = e.target.getAttribute("data-trip-id");

            //select total of an order
            let tripTotal = document.querySelector(`.default_total[data-trip-id='${tripId}']`).childNodes[0];

            //select cart total
            let cartTotal = document.getElementById('summary-total');

            //set the new qte value
            const qteValue = document.querySelector(`.cart-quantity[data-trip-id='${tripId}']`);
            if(qteValue.textContent > 0) {
                allowAjax = true;
                qteValue.textContent = Number(qteValue.textContent) - increment;
            }

            if(allowAjax) {
                // do an ajax call
                $.ajax(
                    {
                        type:'POST',
                        url:"./includes/inc_cart.php",
                        data:{newQte :qteValue.textContent,tripId:tripId},
                        datatType:'json'
                    }
                ).done(
                    function(res) {

                        //check if the operation is a success
                        let result = JSON.parse(res);

                        if(result[0].response) {
                            tripTotal.nodeValue = result[1].new_total;
                            cartTotal.innerText = result[2].total_sum;
                        }
                    }
                )
            }


          }

          //remove row

          xBtn.forEach((btn)=> {
            btn.addEventListener('click',(e)=> {
                removeRow(e);
            })
          })

          const removeRow = (e)=> {
                let key = true;
                //get trip id
                let tripId = e.target.getAttribute('data-trip-id');
                //select btn
                let btn = e.target;
                //select the row containing this button
                let row = btn.parentNode.parentNode;
                //select cart total
                let cartTotal = document.getElementById('summary-total');
                //do an ajax call
                $.ajax(
                    {
                        type:'POST',
                        url:"./includes/inc_cart.php",
                        data:{delete_row:key,trip_id:tripId},
                        dataType:'json'
                    }
                ).done(
                    function(data) {
                        //returns true on success
                        if (data[0].response) {
                            row.remove();
                            cartTotal.innerText = data[1].total;
                        }
                    }
                )

          }
    
    
    }
)
