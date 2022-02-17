// import {
//     Curtains,
//     Plane,
//     Vec2
// } from "https://cdn.jsdelivr.net/npm/curtainsjs@8.1.3/src/index.mjs";



// const vs ="\n        precision mediump float;\n\n        // default mandatory variables\n        attribute vec3 aVertexPosition;\n        attribute vec2 aTextureCoord;\n\n        uniform mat4 uMVMatrix;\n        uniform mat4 uPMatrix;\n        \n        // our texture matrix uniform\n        uniform mat4 simplePlaneTextureMatrix;\n\n        // custom variables\n        varying vec3 vVertexPosition;\n        varying vec2 vTextureCoord;\n\n        uniform float uTime;\n        uniform vec2 uResolution;\n        uniform vec2 uMousePosition;\n        uniform float uMouseMoveStrength;\n\n\n        void main() {\n\n            vec3 vertexPosition = aVertexPosition;\n\n            // get the distance between our vertex and the mouse position\n            float distanceFromMouse = distance(uMousePosition, vec2(vertexPosition.x, vertexPosition.y));\n\n            // calculate our wave effect\n            float waveSinusoid = cos(5.0 * (distanceFromMouse - (uTime / 75.0)));\n\n            // attenuate the effect based on mouse distance\n            float distanceStrength = (0.4 / (distanceFromMouse + 0.4));\n\n            // calculate our distortion effect\n            float distortionEffect = distanceStrength * waveSinusoid * uMouseMoveStrength;\n\n            // apply it to our vertex position\n            vertexPosition.z +=  distortionEffect / 30.0;\n            vertexPosition.x +=  (distortionEffect / 30.0 * (uResolution.x / uResolution.y) * (uMousePosition.x - vertexPosition.x));\n            vertexPosition.y +=  distortionEffect / 30.0 * (uMousePosition.y - vertexPosition.y);\n\n            gl_Position = uPMatrix * uMVMatrix * vec4(vertexPosition, 1.0);\n\n            // varyings\n            vTextureCoord = (simplePlaneTextureMatrix * vec4(aTextureCoord, 0.0, 1.0)).xy;\n            vVertexPosition = vertexPosition;\n        }\n    ",

//  fs ="\n        precision mediump float;\n\n        varying vec3 vVertexPosition;\n        varying vec2 vTextureCoord;\n\n        uniform sampler2D simplePlaneTexture;\n\n        void main() {\n            // apply our texture\n            vec4 finalColor = texture2D(simplePlaneTexture, vTextureCoord);\n\n            // fake shadows based on vertex position along Z axis\n            finalColor.rgb -= clamp(-vVertexPosition.z, 0.0, 1.0);\n            // fake lights based on vertex position along Z axis\n            finalColor.rgb += clamp(vVertexPosition.z, 0.0, 1.0);\n\n            // handling premultiplied alpha (useful if we were using a png with transparency)\n            finalColor = vec4(finalColor.rgb * finalColor.a, finalColor.a);\n\n            gl_FragColor = finalColor;\n        }\n    ";





// window.addEventListener("load",()=> {
//     //set up the WebGl context
//     const curtains = new Curtains(
//         {
//             container: "canvas",
//             watchScroll: false,
//             pixelRatio:Math.min(1.5, window.devicePixelRatio),
//         }
//     );
//     //create mouse position and deltas
//     const mousePosition = new Vec2();
//     const mouseLastPosition = new Vec2();
//     const deltas = {
//         max:10,
//         applied:0,
//     };
//     //create plane element
//     const planeElements = document.getElementsByClassName('curtain');
//     // Basic parameters
//     const params = {
//         vertexShader:vs,
//         fragmentShader:fs,
//         widthSegments:20,
//         heightSegments:20,
//         uniforms:{
//             resolution:{
//                 name:"uResolution",
//                 type:"2f",
//                 value: [planeElements[0].clientWidth,planeElements[0].clientHeight],
//             },
//             time: {
//                 name: "uTime",
//                 type: "1f",
//                 value: 0,
//             },
//             mousePosition: {
//                 name: "uMousePosition",
//                 type: "2f",
//                 value: mousePosition,
//             },
//             mouseMoveStrength: {
//                 name: "uMouseMoveStrength",
//                 type: "1f",
//                 value: 0,
//             },
//         },
//     };
//     //create the plane
//     const simplePlane = new Plane(curtains, planeElements[0], params);

//     simplePlane.onReady(() => {
//         //set the fov between 1 -130 to get the perspective animation or wobbly animation
//         simplePlane.setPerspective(20);

//         //deltas for a little bit effect on the plane
//         deltas.max = 2;

//         const wrapper = document.getElementById('curtainJs');
//         wrapper.addEventListener('mousemove',(e)=> {
//             handleMovement(e, simplePlane);
//         });
//     })
//     .onRender(() => {
//         simplePlane.uniforms.time.value++;
//         // if the cursor doesn't move the wobbly effect will fade away
//         //and when we hover over canvas then effect again start
//         deltas.applied += (deltas.max - deltas.applied) * 1;
//         deltas.max += (0 - deltas.max) * 0.01;

//         simplePlane.uniforms.mouseMoveStrength.value = deltas.applied;
//     });
//     //handle the mouse move event
//     function handleMovement(e,plane) {
//         mouseLastPosition.copy(mousePosition);

//         const mouse = new Vec2();
//         // touch event
//         if (e.targetTouches) {
//             mouse.set(e.targetTouches[0].clientX, e.targetTouches[0].clientY);
//         } else {
//             mouse.set(e.clientX, e.clientY);
//         }

//         //lerp the mouse position to smooth the overall effect
//         mousePosition.set(
//             curtains.lerp(mousePosition.x, mouse.x, 0.5),
//             curtains.lerp(mousePosition.y, mouse.y, 0.5)
//         )

//         //update our uniform
//         plane.uniforms.mousePosition.value = plane.mouseToPlaneCoords(mousePosition);
//         //calculate  the mouse move strength
//         if(mouseLastPosition.x && mouseLastPosition.y) {
//             let delta = Math.sqrt(Math.pow(mousePosition.x - mouseLastPosition.x,2) + Math.pow(mousePosition.y -mouseLastPosition.y, 2)) /20;
//             delta = Math.min(4, delta);

//             if (delta >= deltas.max) {
//                 deltas.max = delta;
//             }
//         }
//     }
// });