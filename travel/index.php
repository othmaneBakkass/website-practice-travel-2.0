<?php

session_start();

//if user not logged return him to intro page
if ($_SESSION['isLogged'] == false) {
    header('location:intro.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divine Travel</title>
    <link rel="icon" type="image/svg" href="./imgs/mono-icon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="cst-nav fixed-top container-fluid" style="padding: 0;">
            <nav id="navbar" class="navbar posi navbar-expand-lg navbar-light bg-light cst-nav-ani">
                <div class="container">


                    <a class="navbar-brand cst-sf" href="#" style="font-weight: 700;">
                        <svg width="25" height="20" viewBox="0 0 131 126" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M65.5 0C29.326 0 0 28.2067 0 63C0 97.7933 29.326 126 65.5 126C101.674 126 131 97.7933 131 63C131 28.2067 101.674 0 65.5 0ZM66.0837 32.7535C78.3804 32.4954 90.5598 42.1815 94.0843 54.9026C108.077 53.5772 115.905 71.4923 105.15 80.5811H24.5298C14.16 63.6308 26.9539 41.0737 45.6619 45.4502C51.2865 36.645 58.7047 32.9083 66.0819 32.7533L66.0837 32.7535Z" fill="url(#paint0_linear_63_3)" />
                            <defs>
                                <linearGradient id="paint0_linear_63_3" x1="73.5" y1="32.5" x2="58.5" y2="93.5" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#2400FF" />
                                    <stop offset="1" stop-color="#0075FF" />
                                </linearGradient>
                            </defs>
                        </svg>
                        Divine
                        <span class="cst-cf" style="font-weight: 400;"> Travel</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0 ">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item ms-3">
                                <a class="nav-link" href="#about">About us</a>
                            </li>
                            <li class="nav-item dropdown ms-3">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#tours" role="button" aria-expanded="false">Tours</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#what-to-do">What to do</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#tickets">Offers</a></li>
                                </ul>
                            </li>
                            <li class="nav-item ms-3">
                                <a class="nav-link" href="#testimonials">Testimonials</a>
                            </li>
                            <li class="nav-item ms-3">
                                <a class="nav-link" href="#faq">FAQ</a>
                            </li>
                            <li class="nav-item ms-3">
                                <a class="nav-link" href="./trips.php">Book Now</a>
                            </li>
                            <li class="nav-item ms-3">
                                <a class="nav-link" href="signout.php">sign out</a>
                            </li>
                    </div>
                </div>
            </nav>
        </div>

        <div class="cst-header">
            <div class="card">
                <img src="./imgs/header.jpg" class="card-img img-fluid cst-header-img" alt="...">
                <div class="card-img-overlay ms-md-5 ms-sm-3 cst-header-card" style="top: 35%;">
                    <h1 class="card-title cst-sf cst-header-title" style="font-weight: 700;">Divine<span class="cst-cf" style="font-weight: 400;"> Travel</span></h1>
                    <p class="card-text mb-5 cst-sf cst-header-slogan" style="font-weight: 400;">Trust us, we're
                        professionals.</p>
                    <a href="trips.php" class="btn btn-primary btn-lg cst-cf cst-btn"> Book Now</a>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section id="about" class="about-us container cst-element-fade-hidden">
            <div class="card text-white text-center align-items-center shadow" style="border-radius: 2rem;">
                <img src="./imgs/about.jpg" class="card-img" style="height: 41rem;object-fit: cover;border-radius: 2rem;" alt="...">
                <div class="card-img-overlay" style="background-color: rgba(0, 0, 0, 0.2);font-weight: 500;border-radius: 2rem;">
                    <h5 class="card-title cst-about-title cst-sf" style="font-weight: 700;">About Us</h5>
                    <p class="card-text cst-sf cst-about-slogan" style="font-weight: 700;">Explore The Land Of Marvelous
                        Landscape</p>
                    <p class="card-text mt-3 mx-sm-5">Divine Travel is Proin condimentum ligula sed urna ultricies,
                        ultrices
                        fringilla mauris tempor. Curabitur imperdiet hendrerit mi a ullamcorper. Aenean suscipit neque
                        tellus, sed vehicula sem euismod ut. Morbi iaculis magna consectetur odio imperdiet varius.
                        Vestibulum ut ornare ipsum. Donec viverra rhoncus lectus. Suspendisse ac risus et ante consequat
                        aliquam. </p>
                    <p class="card-text mx-sm-5 cst-text-hidden">Morbi iaculis magna consectetur odio imperdiet varius.
                        Vestibulum ut
                        ornare
                        ipsum. Donec viverra rhoncus lectus. Suspendisse ac risus et ante consequat aliquam. </p>
                    <button id="video-btn" type="button" class="btn btn-primary btn-lg cst-cf cst-btn mt-sm-3" data-bs-toggle="modal" data-bs-target="#abt-video" data-src="https://www.youtube.com/embed/6CVUm_L2tAI">Learn
                        more</button>
                </div>
            </div>
        </section>
        <section id="tours" class="tours container cst-element-fade-hidden">
            <div class="row text-center" id="what-to-do">
                <h5 class="col-12 cst-tours-title cst-sf mb-3" style="font-weight: 700;">Tours</h5>
                <p class="col-12 cst-tours-slogan cst-sf mb-5" style="font-weight: 700;">What to do in ireland ?</p>
            </div>
            <div class=" row g-4">
                <div class="col-12">
                    <div class="card mb-3 shadow row g-0 " style="border-radius: 2rem;flex-direction: row;">
                        <div class="col-lg-6 col-md-12">
                            <img src="./imgs/scenery.jpg" class="card-img-top cst-wtd-card-img" alt="...">
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card-body cst-tours-card text-black ">
                                <h5 class="card-title mt-2 ms-2 cst-tours-card-title cst-cf">Go Sightseeing</h5>
                                <p class="card-text my-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel
                                    nemo
                                    exercitationem atque, ad vitae quod aspernatur? Soluta recusandae reiciendis
                                    dolorum.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptatum.
                                </p>
                                <p class="card-text my-4 cst-text-hidden">
                                    exercitationem atque, ad vitae quod aspernatur? Soluta recusandae reiciendis
                                    dolorum.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptatum.
                                </p>
                                <p class="card-text my-4 cst-text-hidden">Lorem, ipsum dolor sit amet consectetur
                                    adipisicing elit. Vel
                                    nemo
                                    exercitationem atque, ad vitae quod aspernatur? Soluta recusandae reiciendis
                                    dolorum.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptatum.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, at?
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 h-100">
                    <div class="card mb-3 shadow" style="border-radius: 2rem;">
                        <img src="./imgs/food.jpg" class="card-img-top" style="object-fit: cover;max-width: 100%;height: 20rem;border-top-left-radius: 2rem;border-top-right-radius: 2rem;" alt="...">
                        <div class="card-body cst-tours-card text-black " style="border-bottom-left-radius: 2rem;border-bottom-right-radius: 2rem;">
                            <h5 class="card-title mt-2 ms-2 cst-tours-card-title  cst-cf">Exprience The Food</h5>
                            <p class="card-text my-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel nemo
                                exercitationem atque, ad vitae quod aspernatur? Soluta recusandae reiciendis dolorum.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptatum.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 h-100">
                    <div class="card mb-3 shadow h-100" style="border-radius: 2rem;">
                        <img src="./imgs/cultre.jpg" class="card-img-top" style="object-fit: cover;max-width: 100%;height: 20rem;border-top-left-radius: 2rem;border-top-right-radius: 2rem;" alt="...">
                        <div class="card-body cst-tours-card text-black " style="border-bottom-left-radius: 2rem;border-bottom-right-radius: 2rem;">
                            <h5 class="card-title mt-2 ms-2 cst-tours-card-title  cst-cf">Exprience The Culture</h5>
                            <p class="card-text my-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel nemo
                                exercitationem atque, ad vitae quod aspernatur? Soluta recusandae reiciendis dolorum.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptatum.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="tickets" class="container my-5 tickets cst-element-fade-hidden">
            <div class="row">
                <div class="row text-center">
                    <p class="col-12 cst-tours-title  cst-sf mb-5" style="font-weight: 700;font-size: 2rem;padding-top: 5rem;">Our Offers
                    </p>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-4 col-md-12 mb-3" style="width: 20rem;margin:auto">
                    <div class="card text-center text-white shadow" style="border-radius: 2rem;">
                        <img src="./imgs/trip1.jpg" class="card-img-top" alt="..." style="border-top-left-radius: 2rem;border-top-right-radius: 2rem;">
                        <div class="card-header cst-sf cst-tickets-header">
                            Cork Tour
                        </div>
                        <hr>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-white" style="background-color: #091b30;font-size: 1rem;">
                                1 Week Trip
                            </li>
                        </ul>
                        <hr>
                        <div style="width: 100%;background-color: #091b30;border-bottom-left-radius: 2rem;border-bottom-right-radius: 2rem;">
                            <a href="#" class="btn btn-primary cst-cf cst-btn my-3 stretched-link" style="margin: auto;width: 8rem;font-size: 1.1rem;" data-bs-toggle="modal" data-bs-target="#cork">
                                Learn more
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-3" style="width: 20rem;margin:auto">
                    <div class="card text-center text-white shadow" style="border-radius: 2rem;">
                        <img src="./imgs/trip2.jpg" class="card-img-top" alt="..." style="border-top-left-radius: 2rem;border-top-right-radius: 2rem;">
                        <div class="card-header cst-sf cst-tickets-header">
                            Galway Tour
                        </div>
                        <hr>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-white" style="background-color: #091b30;font-size: 1rem;">
                                1 Week Trip
                            </li>
                        </ul>
                        <hr>
                        <div style="width: 100%;background-color: #091b30;border-bottom-left-radius: 2rem;border-bottom-right-radius: 2rem;">
                            <a href="#" class="btn btn-primary cst-cf cst-btn my-3 stretched-link" style="margin: auto;width: 8rem;font-size: 1.1rem;" data-bs-toggle="modal" data-bs-target="#Galway">Learn
                                more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mx-auto mb-3" style="width: 20rem;margin:auto">
                    <div class="card text-center text-white shadow" style="border-radius: 2rem;">
                        <img src="./imgs/trip3.jpg" class="card-img-top" alt="..." style="border-top-left-radius: 2rem;border-top-right-radius: 2rem;object-fit: cover;height: 12.25rem;">
                        <div class="card-header cst-sf cst-tickets-header">
                            Dublin Tour
                        </div>
                        <hr>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-white" style="background-color: #091b30;font-size: 1rem;">
                                2 Weeks Trip
                            </li>
                        </ul>
                        <hr>
                        <div style="width: 100%;background-color: #091b30;border-bottom-left-radius: 2rem;border-bottom-right-radius: 2rem;">
                            <a href="#" class="btn btn-primary cst-cf cst-btn my-3 stretched-link" style="margin: auto;width: 8rem;font-size: 1.1rem;" data-bs-toggle="modal" data-bs-target="#dublin">Learn
                                more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 100%;display:flex;justify-content:center;align-items:center;">
                <a href="trips.php" class="btn btn-primary cst-cf cst-btn my-4" style="margin: auto;width: 8rem;font-size: 1.1rem;">book now</a>
            </div>
        </section>
        <!--------------------------------MODALS------------------->
        <div class="modal fade " id="abt-video" tabindex="-1" aria-labelledby="video" aria-hidden="true">
            <div class="modal-dialog  	modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" style="background-color: black;border-radius:2rem">
                    <div class="modal-header justify-content-center" style="border: none;">
                        <h5 class="modal-title mt-3 cst-cf fs-2 text-white ">The Story of a couple of friends with a
                            dream.
                        </h5>
                    </div>
                    <div class="modal-body cst-abt-video-container" style="padding-bottom: 0;">
                        <div id="video-parent" class="ratio ratio-16*9 ">

                        </div>
                    </div>
                    <div class="modal-footer my-3" style="border: none;">
                        <button type="button" class="btn btn-primary btn-lg cst-cf cst-btn ms-3  mt-3" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="cork" tabindex="-1" aria-labelledby="corkTourLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header text-white" style="background-image: url(./imgs/trip1.jpg);background-position: top;background-size: cover;background-repeat: no-repeat;">
                        <h5 class="modal-title cst-sf fs-2">Cork Tour</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light" style="padding-bottom: 0;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 cst-sf mb-2  cst-modal-content-titles">Description:</div>
                                <div class="col-12">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati,
                                    pariatur omnis ullam ex ut nostrum illum nulla eaque beatae ab!</div>
                            </div>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-12 cst-sf mb-2  cst-modal-content-titles">Activities:</div>
                                <div class="col-12">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati,
                                    pariatur omnis ullam ex ut nostrum illum nulla eaque beatae ab!</div>
                            </div>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-12 cst-sf mb-2  cst-modal-content-titles">The Trip Plan:</div>
                                <div class="col-12">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati,
                                    pariatur omnis ullam ex ut nostrum illum nulla eaque beatae ab!</div>
                            </div>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-12 cst-sf mb-2 cst-modal-content-titles">Additional Information:</div>
                                <div class="col-12">
                                    <ul class="list-group">
                                        <li class="list-group-item">lorem : Lorem, ipsum dolor.</li>
                                        <li class="list-group-item">lorem : Lorem, ipsum dolor.</li>
                                        <li class="list-group-item">lorem : Lorem, ipsum dolor.</li>
                                        <li class="list-group-item">lorem : Lorem, ipsum dolor.</li>
                                        <li class="list-group-item">Alorem : Lorem, ipsum dolor.</li>
                                    </ul>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-12 cst-sf cst-modal-content-titles">Pricing:</div>
                                <div class="col-12">250$ for 1 person</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer my-3">
                        <button type="button" class="btn btn-primary btn-lg cst-cf cst-btn ms-3  mt-3" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="Galway" tabindex="-1" aria-labelledby="GalwayTourLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header text-white" style="background-image: url(./imgs/trip2.jpg);background-position: left;background-size: cover;background-repeat: no-repeat;">
                        <h5 class="modal-title cst-sf fs-2">Galway Tour</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light" style="padding-bottom: 0;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 cst-sf mb-2  cst-modal-content-titles">Description:</div>
                                <div class="col-12">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati,
                                    pariatur omnis ullam ex ut nostrum illum nulla eaque beatae ab!</div>
                            </div>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-12 cst-sf mb-2  cst-modal-content-titles">Activities:</div>
                                <div class="col-12">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati,
                                    pariatur omnis ullam ex ut nostrum illum nulla eaque beatae ab!</div>
                            </div>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-12 cst-sf mb-2  cst-modal-content-titles">The Trip Plan:</div>
                                <div class="col-12">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati,
                                    pariatur omnis ullam ex ut nostrum illum nulla eaque beatae ab!</div>
                            </div>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-12 cst-sf mb-2 cst-modal-content-titles">Additional Information:</div>
                                <div class="col-12">
                                    <ul class="list-group">
                                        <li class="list-group-item">lorem : Lorem, ipsum dolor.</li>
                                        <li class="list-group-item">lorem : Lorem, ipsum dolor.</li>
                                        <li class="list-group-item">lorem : Lorem, ipsum dolor.</li>
                                        <li class="list-group-item">lorem : Lorem, ipsum dolor.</li>
                                        <li class="list-group-item">Alorem : Lorem, ipsum dolor.</li>
                                    </ul>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-12 cst-sf cst-modal-content-titles">Pricing:</div>
                                <div class="col-12">500$ for 1 person</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer my-3">
                        <button type="button" class="btn btn-primary btn-lg cst-cf cst-btn ms-3  mt-3" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="dublin" tabindex="-1" aria-labelledby="dublinTourLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header text-white" style="background-image: url(./imgs/trip3.jpg);background-position: top;background-size: cover;background-repeat: no-repeat;">
                        <h5 class="modal-title cst-sf fs-2">Dublin Tour</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light" style="padding-bottom: 0;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 cst-sf mb-2  cst-modal-content-titles">Description:</div>
                                <div class="col-12">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati,
                                    pariatur omnis ullam ex ut nostrum illum nulla eaque beatae ab!</div>
                            </div>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-12 cst-sf mb-2  cst-modal-content-titles">Activities:</div>
                                <div class="col-12">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati,
                                    pariatur omnis ullam ex ut nostrum illum nulla eaque beatae ab!</div>
                            </div>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-12 cst-sf mb-2  cst-modal-content-titles">The Trip Plan:</div>
                                <div class="col-12">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati,
                                    pariatur omnis ullam ex ut nostrum illum nulla eaque beatae ab!</div>
                            </div>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-12 cst-sf mb-2 cst-modal-content-titles">Additional Information:</div>
                                <div class="col-12">
                                    <ul class="list-group">
                                        <li class="list-group-item">lorem : Lorem, ipsum dolor.</li>
                                        <li class="list-group-item">lorem : Lorem, ipsum dolor.</li>
                                        <li class="list-group-item">lorem : Lorem, ipsum dolor.</li>
                                        <li class="list-group-item">lorem : Lorem, ipsum dolor.</li>
                                        <li class="list-group-item">Alorem : Lorem, ipsum dolor.</li>
                                    </ul>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-12 cst-sf cst-modal-content-titles">Pricing:</div>
                                <div class="col-12">250$ for 1 person</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer my-3">
                        <button type="button" class="btn btn-primary btn-lg cst-cf cst-btn ms-3  mt-3" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------/MODALS------------------>
        <section id="testimonials" class="container-fluid " style="padding: 0;">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319">
                    <path fill="#0067dd" fill-opacity="1" d="M0,320L60,293.3C120,267,240,213,360,192C480,171,600,181,720,192C840,203,960,213,1080,181.3C1200,149,1320,75,1380,37.3L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                    </path>
                </svg>
            </div>
            <div class="container-fluid" style="background-color: #0067dd;">
                <div class="container">
                    <div class="row text-center g-0">
                        <h5 class="col-12 cst-testimonials-title cst-sf mb-3  text-white" style="font-weight: 700;">
                            Testimonials</h5>
                        <p class="col-12 cst-testimonials-slogan cst-sf mb-5  text-white" style="font-weight: 700;margin: 0;">hear what
                            other people
                            say</p>
                    </div>
                    <div class="row">
                        <div id="carouselExampleIndicators" class="carousel  slide col-12" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner py-3">
                                <div class="carousel-item active" data-bs-interval="2000">
                                    <div class="card shadow cst-slider" style="background-color: rgba(255, 255, 255, 0);">
                                        <div class="card-header text-white cst-sf m3" style=" background-color: #091b30 ;border-top-left-radius: 1rem;border-top-right-radius: 1rem;display: flex;justify-content: flex-start;align-items: center;">
                                            <div class="navbar-brand" style="border-radius: 2rem;">
                                                <img src="./imgs/trip1.jpg" alt="" width="36" height="36" style="border-radius: 2rem;">
                                            </div>
                                            <h5>John doe</h5>
                                        </div>
                                        <hr>
                                        <div class="card-body mt-auto mb-auto py-5" style="background-color: #fff;">
                                            <p class="card-text"><i class="fas fa-quote-left ps-2 me-1"></i>Lorem ipsum
                                                dolor
                                                sit amet, consectetur adipisicing
                                                elit.
                                                Excepturi in harum quam nostrum possimus architecto perferendis libero
                                                distinctio aliquam atque.
                                                content.Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                Excepturi in harum quam nostrum possimus architecto perferendis libero
                                                distinctio aliquam atque.</p>
                                        </div>

                                        <div class="card-footer text-white" style="display: flex;justify-content: space-between;align-items: center;background-color: #091b30 ;border-bottom-left-radius: 1rem;border-bottom-right-radius: 1rem;">
                                            <div>
                                                <i class="fas fa-star "> </i>
                                                <i class="fas fa-star "> </i>
                                                <i class="fas fa-star "> </i>
                                                <i class="fas fa-star "> </i>
                                                <i class="fas fa-star-half-alt "> </i>
                                            </div>
                                            <p class=" ms-2 mt-2" style="text-transform: none;font-family: 'Roboto';">
                                                2021-12-12</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="3000">
                                    <div class="card shadow cst-slider" style="background-color: rgba(255, 255, 255, 0);">
                                        <div class="card-header text-white cst-sf m3" style=" background-color: #091b30 ;border-top-left-radius: 1rem;border-top-right-radius: 1rem;display: flex;justify-content: flex-start;align-items: center;">
                                            <div class="navbar-brand" style="border-radius: 2rem;">
                                                <img src="./imgs/trip2.jpg" alt="" width="36" height="36" style="border-radius: 2rem;">
                                            </div>
                                            <h5>david.D.doe</h5>
                                        </div>
                                        <hr>
                                        <div class="card-body mt-auto mb-auto py-5" style="background-color: #fff;">
                                            <p class="card-text"><i class="fas fa-quote-left ps-2 me-1"></i>
                                                Excepturi in harum quam nostrum possimus architecto perferendis libero
                                                distinctio aliquam atque.
                                                distinctio aliquam atque.</p>
                                        </div>

                                        <div class="card-footer text-white" style="display: flex;justify-content: space-between;align-items: center;background-color: #091b30 ;border-bottom-left-radius: 1rem;border-bottom-right-radius: 1rem;">
                                            <div>
                                                <i class="fas fa-star "> </i>
                                                <i class="fas fa-star "> </i>
                                                <i class="fas fa-star "> </i>
                                                <i class="fas fa-star "> </i>
                                                <i class="fas fa-star-half-alt "> </i>
                                            </div>
                                            <p class=" ms-2 mt-2" style="text-transform: none;font-family: 'Roboto';">
                                                2021-12-12</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="5000">
                                    <div class="card shadow cst-slider" style="background-color: rgba(255, 255, 255, 0);">
                                        <div class="card-header text-white cst-sf m3" style=" background-color: #091b30 ;border-top-left-radius: 1rem;border-top-right-radius: 1rem;display: flex;justify-content: flex-start;align-items: center;">
                                            <div class="navbar-brand" style="border-radius: 2rem;">
                                                <img src="./imgs/trip3.jpg" alt="" width="36" height="36" style="border-radius: 2rem;">
                                            </div>
                                            <h5>John doe</h5>
                                        </div>
                                        <hr>
                                        <div class="card-body mt-auto mb-auto py-5" style="background-color: #fff;">
                                            <p class="card-text"><i class="fas fa-quote-left ps-2 me-1"></i>Lorem ipsum
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus,
                                                placeat? et, consectetur adipisicing elit.
                                                Excepturi in harum quam nostrum possimus architecto perferendis libero
                                                distinctio aliquam atque.</p>
                                        </div>

                                        <div class="card-footer text-white" style="display: flex;justify-content: space-between;align-items: center;background-color: #091b30 ;border-bottom-left-radius: 1rem;border-bottom-right-radius: 1rem;">
                                            <div>
                                                <i class="fas fa-star "> </i>
                                                <i class="fas fa-star "> </i>
                                                <i class="fas fa-star "> </i>
                                                <i class="fas fa-star "> </i>
                                                <i class="fas fa-star-half-alt "> </i>
                                            </div>
                                            <p class=" ms-2 mt-2" style="text-transform: none;font-family: 'Roboto';">
                                                2021-12-12</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319">
                    <path fill="#0067dd" fill-opacity="1" d="M0,320L60,293.3C120,267,240,213,360,192C480,171,600,181,720,192C840,203,960,213,1080,181.3C1200,149,1320,75,1380,37.3L1440,0L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
                    </path>
                </svg>
            </div>
        </section>
        <section id="faq" style="margin-bottom: 5rem;" class="container-fluid cst-element-fade-hidden">
            <div class="container mb-5">
                <div class="row text-center">
                    <h5 class="col-12 cst-testimonials-title cst-sf mb-3" style="font-weight: 700;">FAQ</h5>
                </div>
            </div>
            <div class="accordion accordion-flush container" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Question 1
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos
                            perferendis repellat iusto ipsum vitae ipsam sit eos voluptas libero laboriosam!.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Question 2
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore a
                            ex est perspiciatis deleniti aut iste aliquam numquam minus cupiditate nam, sint voluptatum
                            eveniet incidunt aliquid ut itaque repellat? Mollitia.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Question 3
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi
                            dolorem nisi, explicabo commodi perspiciatis id maiores aspernatur blanditiis mollitia
                            officia earum quod quibusdam quos voluptatibus possimus hic quaerat perferendis rem sapiente
                            vel velit repellat expedita deleniti! Maxime sunt odio blanditiis.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            Question 4
                        </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi
                            dolorem nisi, explicabo commodi perspiciatis id maiores aspernatur blanditiis mollitia
                            officia earum quod quibusdam quos voluptatibus possimus hic quaerat perferendis rem sapiente
                            vel velit repellat expedita deleniti! Maxime sunt odio blanditiis.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseThree">
                            Question 5
                        </button>
                    </h2>
                    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi
                            dolorem nisi, explicabo commodi perspiciatis id maiores aspernatur blanditiis mollitia
                            officia earum quod quibusdam quos voluptatibus possimus hic quaerat perferendis rem sapiente
                            vel velit repellat expedita deleniti! Maxime sunt odio blanditiis.</div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="container-fluid" style="margin-top: 8rem;padding: 0;position: relative;overflow: hidden;color: black;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="position: absolute;opacity: 0.25;bottom:0; pointer-events: none;">
            <path fill="#0067dd" fill-opacity="1" d="M0,64L18.5,69.3C36.9,75,74,85,111,117.3C147.7,149,185,203,222,202.7C258.5,203,295,149,332,138.7C369.2,128,406,160,443,149.3C480,139,517,85,554,90.7C590.8,96,628,160,665,192C701.5,224,738,224,775,192C812.3,160,849,96,886,101.3C923.1,107,960,181,997,181.3C1033.8,181,1071,107,1108,96C1144.6,85,1182,139,1218,149.3C1255.4,160,1292,128,1329,106.7C1366.2,85,1403,75,1422,69.3L1440,64L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z">
            </path>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="position: absolute;opacity: 0.25;bottom:0;pointer-events: none;">
            <path fill="#5ba7ff" fill-opacity="1" d="M0,256L30,261.3C60,267,120,277,180,234.7C240,192,300,96,360,85.3C420,75,480,149,540,186.7C600,224,660,224,720,213.3C780,203,840,181,900,165.3C960,149,1020,139,1080,165.3C1140,192,1200,256,1260,277.3C1320,299,1380,277,1410,266.7L1440,256L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
            </path>
        </svg>

        <div class="upper-footer row container mx-auto my-3">
            <div class="col-sm-12 col-md-4">
                Our Socials:
            </div>
            <div class="col-sm-12 col-md-4"></div>
            <div class="col-sm-12 col-md-4 text-md-end">
                <a href="" class="me-4 " style="text-decoration: none;color: #091b30;">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="" class="me-4 " style="text-decoration: none;color: #091b30;">
                    <i class="fab fa-twitter-square"></i>
                </a>
                <a href="" class="me-4 " style="text-decoration: none;color: #091b30;">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>

            <hr>
        </div>
        <div class="main-footer row container mx-auto">
            <form action="" class="col-lg-6 col-sm-12">
                <div class=" footer-news" style="z-index: 3;">
                    <h4>Join Our Newsletter:</h4>
                    <p style="font-weight: 500;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed,
                        veritatis esse aut eaque quasi
                        magnam
                        similique enim consectetur obcaecati suscipit natus explicabo ullam? Assumenda, iusto!</p>
                    <div class="mb-4">
                        <label class="form-label" for="footeremail" style="color: #091b30;font-weight: 500;">Your email:
                        </label>
                        <input type="email" id="footeremail" class="form-control w-md-50" style="border: 2px solid black;border-radius: 1rem;font-weight: 500;" />
                    </div>
                </div>

            </form>
            <div class="col-lg-3"></div>
            <div class="col-lg-3 col-sm-12">
                <h4>Contact us:</h4>
                <p style="font-weight: 500;">
                    <i class="fas fa-phone-square-alt me-2"></i>
                    Phone number: +700 631-996674
                </p>
                <p style="font-weight: 500;">
                    <i class="fas fa-map-marker-alt me-2"></i>
                    Location: st.zoro 34th Wano
                </p>
                <p style="font-weight: 500;">
                    <i class="far fa-envelope me-2"></i>
                    Divine.Travel@gmail.com
                </p>
            </div>
        </div>
        <div class="lower-footer row container mx-auto">
            <hr>
            <div class=" col-sm-12 col-md-6 mt-2">

                <p style="font-weight: 500;"><span class="cst-sf">
                        Divine</span> <span class="cst-cf">Travel</span>
                    &copy; since 2021</p>
            </div>
            <div class="col-sm-12 col-md-6  text-md-end mt-2">
                <p style="font-weight: 500;">Made by Monochrome</p>
            </div>
        </div>
    </footer>
    <script src="script.js"></script>
</body>

</html>