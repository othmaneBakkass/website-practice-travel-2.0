// START--NAVIGATION ANIMATION

const linkHome = document.querySelector('.link-home');
const linkCart = document.querySelector('.link-cart');
const linkDashboard = document.querySelector('.link-dashboard');
const linkSign = document.querySelector('.link-sign');

const linkHomeBg = document.querySelector('.link-home-bg');
const linkCartBg = document.querySelector('.link-cart-bg');
const linkDashboardBg = document.querySelector('.link-dashboard-bg');
const linkSignBg = document.querySelector('.link-sign-bg');

const navIcon = document.querySelector('.nav-icon');

//toggles class to show or hide the background text of the links on the Nav
function toggleShowBgLink(bg, check) {
    if (check === true) {
        bg.classList.add('link-bg-show');
    }
    else {
        bg.classList.remove('link-bg-show');

    }
}
linkHome.addEventListener('mouseenter', () => {
    toggleShowBgLink(linkHomeBg, true);
})
linkHome.addEventListener('mouseleave', () => {
    toggleShowBgLink(linkHomeBg, false);
})
linkCart.addEventListener('mouseenter', () => {
    toggleShowBgLink(linkCartBg, true);
})
linkCart.addEventListener('mouseleave', () => {
    toggleShowBgLink(linkCartBg, false);
})
linkDashboard.addEventListener('mouseenter', () => {
    toggleShowBgLink(linkDashboardBg, true);
})
linkDashboard.addEventListener('mouseleave', () => {
    toggleShowBgLink(linkDashboardBg, false);
})
linkSign.addEventListener('mouseenter', () => {
    toggleShowBgLink(linkSignBg, true);
})
linkSign.addEventListener('mouseleave', () => {
    toggleShowBgLink(linkSignBg, false);
})


//Timeline Animation


let navIconTl = gsap.timeline({defaults:{ease: 'power2', duration: 0.25},paused : true});
let navTl = gsap.timeline({defaults:{ease: 'power2', duration: 0.7},paused : true});

navTl.to('.nav-overlay',{scaleX:1,zIndex: "1"});
navTl.to('.nav-item',{y:0,opacity:1,stagger: 0.25});


navIconTl.to(".nav-icon-el",{backgroundColor :"var(--color-white)",transformOrigin:"center"});
navIconTl.to(".nav-icon-top",{y:7});
navIconTl.to(".nav-icon-bottom",{y:"-8"},"<");
navIconTl.to(".nav-icon-el",{scaleX:0,height: 3});
navIconTl.to(".nav-icon-top",{scaleX:1,rotate:"-45"});
navIconTl.to(".nav-icon-bottom",{scaleX:1,rotate:45},"<");

function animateToggle(tl) {
    if (tl.paused() === true || tl.reversed() === true) {
        tl.play();
    } else {
        tl.reverse();
    } 
}



navIcon.addEventListener('click',()=> {
    animateToggle(navIconTl);
    animateToggle(navTl);

})



// END--NAVIGATION ANIMATION