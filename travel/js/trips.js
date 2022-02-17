gsap.registerPlugin(ScrollTrigger);

const locoScroll = new LocomotiveScroll({
    el: document.querySelector("[data-scroll-container]"),
    smooth: true,
    smoothMobile: true,
    lerp: .07, 
})
locoScroll.on("scroll", ScrollTrigger.update);

ScrollTrigger.scrollerProxy(".scroll-container", {
    scrollTop(value) {
        return arguments.length ? locoScroll.scrollTo(value, 0, 0) : locoScroll.scroll.instance.scroll.y;
    }, // we don't have to define a scrollLeft because we're only scrolling vertically.
    getBoundingClientRect() {
        return { top: 0, left: 0, width: window.innerWidth, height: window.innerHeight };
    },
    // LocomotiveScroll handles things completely differently on mobile devices - it doesn't even transform the container at all! So to get the correct behavior and avoid jitters, we should pin things with position: fixed on mobile. We sense it by checking to see if there's a transform applied to the container (the LocomotiveScroll-controlled element).
    pinType: document.querySelector(".scroll-container").style.transform ? "transform" : "fixed"
});



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
//START---HERO ANIMATION
let heroTl = gsap.timeline()
window.addEventListener('load',()=> {

    setTimeout(() => {        
        heroTl.to('.hero-img-wrapper',{
            scale:1,
            clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0 100%)',
            duration:2.5,
            ease:"power3"
            })
            heroTl.to('.tagline',{
            y: 0,
            opacity:1,
            duration:1,
            ease:"power1"
            },'-=0.5')
    }, 100);


})
//END---HERO ANIMATION

// START--FILTER ANIMATION
const filterBtn = document.querySelector('.filter__icon__wrapper');
const filterMenu = document.querySelector('.filter-menu');

filterBtn.addEventListener('click',()=> {
    filterMenu.classList.toggle('filter-menu-show')
})
// END--FILTER ANIMATION

// each time the window updates, we should refresh ScrollTrigger and then update LocomotiveScroll. 
ScrollTrigger.addEventListener("refresh", () => locoScroll.update());

// after everything is set up, refresh() ScrollTrigger and update LocomotiveScroll because padding may have been added for pinning, etc.
ScrollTrigger.refresh();