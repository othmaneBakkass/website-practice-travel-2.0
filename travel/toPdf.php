<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if ($_SESSION['allowPdf'] == false) {
    header('location: intro.php');
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divine Travel</title>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/toPdf.css">
</head>

<body>
    <header class="navbar-container">
        <div class="navbar">
            <a class="nav-item nav-link">
                <span class="material-icons-sharp icon">
                    arrow_back
                </span>
                <p class="nav-link">Continue Shopping</p>
            </a>
            <div class="nav-item nav-pdf">
                <span class="material-icons-sharp icon">file_download</span>
                <button class="nav-btn">Download PDF</button>
            </div>
        </div>
    </header>
    <main id="element-to-print" class="content-wrapper">
        <div class="vertical-text-wrapper">
            <h1 class="content_body-vertical-text">DIVINE</h1>
        </div>
        <div class="content_body-heading_mobile-wrapper">
            <h1 class="content_body-heading_mobile-divine">Divine</h1>
            <h1 class="content_body-heading_mobile-travel">Travel</h1>
        </div>
        <div class="content_header-line"></div>
        <h4 class="content_header-trips-wrapper">Trips:<br><span class="content_header-trips-name"></span></h4>
        <div class="content_body">
            <div class="content_body-blue-rectangle"></div>
            <div class="content_body-heading-wrapper heading_divine">
                <h1 class="content_body-heading ">Divine</h1>
            </div>
            <div class="content_body-heading-wrapper heading_travel">
                <h1 class="content_body-heading ">Travel</h1>
            </div>
        </div>
        <h4 class="content_footer-trips-wrapper heading_Ticket_code">Ticket code:<br><span class="content_footer-trips-code"></span></h4>
        <h4 class="content_footer-trips-wrapper heading_Total">Total:<br><span class="content_footer-trips-total"></span>$</h4>
        <div class="content_footer-line"></div>
    </main>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="ajax/a_toPdf.js"></script>

</body>

</html>