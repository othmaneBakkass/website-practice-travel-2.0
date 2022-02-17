$(document).ready(
    function(){

                 //do an ajax call
                let pdf = true;

                $.ajax({
                    type:'POST',
                        url:"./includes/inc_checkout.php",
                        data:{pdf:pdf},
                        dataType:'json'
                }).done(function(data) {
                    if(data[0].response) {
                        //send data to check out
                        let tripNameArray = data[1].trip_name;
                        let tripCodeArray = data[2].trip_code;
                        let tripCode = tripCodeArray.join('.');
                        let tripName = tripNameArray.join(',');
                        let total = data[3].total;

                        let tripNameDOM = document.querySelector('.content_header-trips-name');
                        let tripCodeDOM = document.querySelector('.content_footer-trips-code');
                        let totalDOM = document.querySelector('.content_footer-trips-total');

                        tripCodeDOM.textContent = tripCode;
                        tripNameDOM.textContent = tripName;
                        totalDOM.textContent = total;
                    }
                })








                    $('.nav-link').click(
                        function(){
                            let deleteItems = true;
                            //do an ajax call delete everything in shopping cart table
                            $.ajax(
                                {
                                    type:'post',
                                    url:'./includes/inc_pdf.php',
                                    data:{delete_items:deleteItems},
                                    dataType:'json'
                                }
                            ).done(function(data){
                                    window.location.assign('trips.php');
                            })
                        }
                    )

                   
                    $('.nav-btn').click(
                                function(){
                                    let deleteItems = true;
                                    //do an ajax call delete everything in shopping cart table
                                    $.ajax(
                                        {
                                            type:'post',
                                            url:'./includes/inc_pdf.php',
                                            data:{delete_items:deleteItems},
                                            dataType:'json'
                                        }
                                    ).done(function(data){
                                        if(data[0].response){
                                            //success
                                            let element = document.getElementById('element-to-print');
                                            html2pdf(element);
                                        }
                                    })
                                }
                                
                            )


    }
)