

let tl = gsap.timeline()

window.addEventListener('load',()=> {
    setTimeout(()=> {
        tl.to('.login__form',{scale:1,boxShadow : "var(--box-shadow-card)",ease: 'circ', duration: 1});
        tl.to('.login__form-content',{y:0,opacity : 1,stagger:0.25,ease: 'power3', duration: 1.5});
    },150)

})