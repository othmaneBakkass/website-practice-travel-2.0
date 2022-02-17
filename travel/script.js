/* ----------------------FORM--------------------------- */
let step = document.getElementsByClassName('step');
let prevBtn = document.getElementById('prev-btn');
let nextBtn = document.getElementById('next-btn');
let submitBtn = document.getElementById('submit-btn');
let form = document.getElementsByTagName('form')[0];
let bodyElement = document.querySelector('body');
let succcessDiv = document.getElementById('success');
let formTitle = document.getElementById('form-title');
let formProgress = document.getElementById('form-progress');
let current_step = 0;
let stepCount = 2;


/* ----------------------FORM--------------------------- */

/* ----------------------NAVBAR--------------------------- */
let cstNav = document.getElementById('navbar');

window.onscroll = function () {

    if (this.scrollY >= 10) {
        cstNav.classList.add('shadow');
    }
    else {
        cstNav.classList.remove('shadow');
    }
}
/* ----------------------NAVBAR--------------------------- */
/* ----------------------elements appear on scroll --------------------------- */

window.addEventListener('load', (e) => {
    document.body.scrollTop = document.documentElement.scrollTop = 0;
});

let reveals = document.querySelectorAll('.cst-element-fade-hidden');
window.addEventListener('scroll', function () {
    for (let i = 0; i < reveals.length; i++) {
        let windowHeight = window.innerHeight;
        let revealTop = reveals[i].getBoundingClientRect().top;
        let revealPoint = 150;

        if (revealTop < windowHeight - revealPoint & this.scrollY > 1) {
            // reveals[i].classList.remove('cst-element-fade-hidden');
            reveals[i].classList.add('cst-element-fade-in');
        }
        else {
            reveals[i].classList.remove('cst-element-fade-in');

        }
    }
})

/* ----------------------elements appear on scroll --------------------------- */

/* ----------------------ABOUT US VIDEO--------------------------- */
let videoModal = document.getElementById('abt-video');
let videoParent = document.getElementById('video-parent');


document.addEventListener('DOMContentLoaded', function () {
    aboutUsVideo();
}, false);


function aboutUsVideo() {
    videoModal.addEventListener('shown.bs.modal', function (e) {
        videoParent.innerHTML = `
        <iframe id="cst-abt-video" class="cst-abt-video embed-responsive-item"
                                title="YouTube video player" src="https://www.youtube.com/embed/6CVUm_L2tAI"
                                frameborder="0" allow=" autoplay;" allowfullscreen allowscriptaccess="always"></iframe>
        `
    })

    videoModal.addEventListener('hide.bs.modal', function (e) {
        videoParent.innerHTML = ``
    })
}

/* ----------------------/ABOUT US VIDEO--------------------------- */
