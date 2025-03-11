// resources/js/particles-config.js

export function initParticles() {
    particlesJS('particles-js', {
        "particles": {
            "number": {
                "value": 90,
                "density": {
                    "enable": true,
                    "value_area": 900
                }
            },
            "color": {
                "value": "#8B0000"
            },
            "shape": {
                "type": "circle"
            },
            "opacity": {
                "value": 1,
                "random": false,
                "anim": {
                    "enable": false
                }
            },
            "size": {
                "value": 7,
                "random": true,
                "anim": {
                    "enable": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#8B0000",
                "opacity": 0.9,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 4,
                "direction": "none",
                "random": true,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {
                    "enable": true,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "repulse"
                },
                "onclick": {
                    "enable": true
                },
                "resize": true
            },
            "modes": {
                "repulse": {
                    "distance": 100,
                    "duration": 0.4
                },
                "grab": {
                    "distance": 200,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 200,
                    "size": 10,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 4
                }
            }
        },
        "retina_detect": true
    });
}
