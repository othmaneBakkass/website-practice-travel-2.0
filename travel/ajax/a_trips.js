$(document).ready(
    function() {


         //set up the shopping cart count
         let allowCartCount = true;
         if(allowCartCount) {

            //do an ajax call
            $.ajax(
                {
                    type:"POST",
                    url:"./includes/inc_trips.php",
                    data:{allowCartCount : allowCartCount},
                    datatType:'json'
                }
            ).done(
                function(res) {
                    let result = JSON.parse(res);

                    $('.cart-count').html(result['number']);
                }
            )
         }
        let btns =  document.querySelectorAll('.order_now-btn');
        
        
        btns.forEach((btn)=> {
            btn.addEventListener('click',(e)=> {
                addOrder(e)
            });
        })
        
        function addOrder(e) {
            let order = true;
        
            // get the trip id
            let tripId = e.target.getAttribute("data-trip-id");
        
            //do an ajax call
            $.ajax(
                {
                    type:"POST",
                    url:"./includes/inc_trips.php",
                    data:{order : order,tripId : tripId},
                    dataType:"json"
                }
            ).done(
                function(res) {
                    
                    $('.cart-count').html(res[1]);
                }
            )
        }
        
        
        
        
        //observe changes in the DOM
        let AjaxObserver = new MutationObserver(function() {
        
            //select the buttons
            let btns =  document.querySelectorAll('.order_now-btn');
        
            // add events listeners the second time
            btns.forEach((btn)=> {
                btn.addEventListener('click',(e)=> {
                    addOrder(e);
                });
            })
        
            function addOrder(e) {
        
                let order = true;
        
                // get the trip id
                let tripId = e.target.getAttribute("data-trip-id");
        
                //do an ajax call
                $.ajax(
                    {
                        type:"POST",
                        url:"./includes/inc_trips.php",
                        data:{order : order,tripId : tripId},
                        dataType:"json"
                    }
                ).done(
                    function(res) {
                        $('.cart-count').html(res[1]);
                    }
                )
            }
        
         
          }); 
        
        AjaxObserver.observe(document.querySelector(".all_products"), {childList: true, subtree: true});
            //-----------------search field section-----------
            const searchBar = document.getElementById('search_field');

                searchBar.addEventListener('keypress',(e)=> {
                    
                    if (e.code === "Enter") {
                        //when the user press enter
                        let searchValue = searchBar.value
                        console.log(searchValue);
                        //Ajax call

                        $.ajax(
                            {
                                type:"POST",
                                url:"./includes/inc_trips.php",
                                data:{search_value : searchValue},
                            }
                        ).done(
                            function(response) {
                                $('.all_products').html(response);
                            }
                        )
                    }
                })
            //-----------------Filter field section-----------
            $('.btn-filter').click(
                function() {
                    let allowFilter = false;
                    let filter = true;
                    //select elements
                    let price = document.querySelector('.filter-price:checked');
                    let priceValue = ''

                    let startingPoint = document.querySelectorAll('.filter-startPoint:checked');
                    let startingPointValues = '';

                    let endingPoint = document.querySelectorAll('.filter-endPoint:checked');
                    endingPointValues = '';

                    // set element value if not null
                    if(price) {
                        priceValue = price.value;
                         allowFilter = true;

                    }
                    
                    // set element value if not null
                    if(startingPoint.length !== 0) {

                        //store values inside an array
                        startingPointValues = [];

                        startingPoint.forEach((el)=> {
                            startingPointValues.push(el.value);
                        });

                        allowFilter = true;
                    }

                    // set element value if not null
                    if(endingPoint.length !== 0) {

                        //store values inside an array
                        endingPointValues = [];

                        endingPoint.forEach((el)=> {
                            endingPointValues.push(el.value);
                        });

                        allowFilter = true;
                    }
                    
                    if(allowFilter) {
                        $.ajax({
                            url:"./includes/inc_trips.php",
                            data:{filter:filter,price:priceValue,start_point:startingPointValues,end_point:endingPointValues},
                            type:'POST',
                        }).done(
                            function(result) {
                                $('.all_products').html(result);
                            }
                        )
                    }
                   
                }
            )
                //-----------------UnFilter field -----------
                $('.btn-unfilter').click(
                    function() {
                        let unfilter = true;
                        //uncheck the inputs
                        let price = document.querySelectorAll('.filter-price');
                        let startPoint = document.querySelectorAll('.filter-startPoint');
                        let endPoint = document.querySelectorAll('.filter-endPoint');

                        function removeCheck(v) {
                            v.forEach((el)=> {
                                el.checked = false;
                            })
                        }
                        removeCheck(price);
                        removeCheck(startPoint);
                        removeCheck(endPoint);

                        $.ajax({
                            url:"./includes/inc_trips.php",
                            data:{unfilter:unfilter},
                            type:'POST',
                        }).done(
                            function(result) {
                                $('.all_products').html(result);
                            }
                        )
                    }
                )
    }
)
