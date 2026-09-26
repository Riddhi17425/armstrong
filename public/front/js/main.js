const swiper = new Swiper(".hero_swiper", {
    loop: !0,
    slidesPerView: 4.5,
    spaceBetween: 20,
    pauseOnFocus: !1,
    autoplay: {
        delay: 5e3,
        disableOnInteraction: !1
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
    },
    breakpoints: {
        1400: {
            slidesPerView: 4.5,
            spaceBetween: 20
        },
        1100: {
            slidesPerView: 4.5,
            spaceBetween: 20
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 30,
            centeredSlides: !0
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 15,
            centeredSlides: !0
        },
        100: {
            slidesPerView: 1.5,
            spaceBetween: 10,
            centeredSlides: !0
        }
    }
});

// home page slider 

$(document).ready(function () {
    var e = $(".how-slider");
    e.owlCarousel({
        items: 3,
        loop: true,
        margin: 30,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        center: true,
        dots: false,
        nav: false,
        responsive: {
            0: { items: 1 },
            992: { items: 1 },
            1024: { items: 3 }
        }
    });

    // ==== Custom Arrows Control ====
    $(".custom-next").on("click", function () {
        e.trigger("next.owl.carousel");
    });

    $(".custom-prev").on("click", function () {
        e.trigger("prev.owl.carousel");
    });
});


let testswiper = new Swiper(".testi_slider", {
    slidesPerView: 4,
    spaceBetween: 40,
    loop: !0,
    speed: 5e3,
    autoplay: {
        delay: 0,
        disableOnInteraction: !1
    },
    allowTouchMove: !1,
    freeMode: {
        enabled: !0,
        momentum: !1
    },
    allowTouchMove: !0,
    breakpoints: {
        1400: {
            slidesPerView: 4,
            spaceBetween: 20
        },
        1281: {
            slidesPerView: 3,
            spaceBetween: 20
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 30,
            centeredSlides: !0
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 15,
            centeredSlides: !0
        },
        100: {
            slidesPerView: 1,
            spaceBetween: 10,
            centeredSlides: !0
        }
    }
});
document.addEventListener("DOMContentLoaded", (function () {
    const e = new Swiper(".time_line_bt", {
        loop: !1,
        slidesPerView: 1,
        effect: "fade",
        fadeEffect: {
            crossFade: !0
        },
        navigation: {
            nextEl: ".swiper-button-next1",
            prevEl: ".swiper-button-prev1"
        },
        on: {
            slideChange: function () {
                document.querySelectorAll(".time_line .year").forEach(((t, n) => {
                    t.classList.toggle("active", n === e.realIndex)
                }))
            }
        }
    });
    document.querySelectorAll(".time_line .year").forEach(((t, n) => {
        t.addEventListener("click", (() => {
            e.slideTo(n)
        }))
    }))
})), new Swiper(".infrastructure_slider", {
    slidesPerView: 1.2,
    spaceBetween: 20,
    loop: !0,
    autoplay: {
        delay: 2500,
        disableOnInteraction: !1
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: !0
    },
    breakpoints: {
        768: {
            slidesPerView: 3,
            spaceBetween: 30
        },
        100: {
            slidesPerView: 2,
            spaceBetween: 20
        }
    }
}), Fancybox.bind("[data-fancybox='certificates']", {});
$(document).ready(function () {

    var owl = $(".product_list_slider");

    owl.owlCarousel({
        loop: true,
        margin: 50,

        nav: false,
        dots: false,
        autoplay: {
            delay: 0,
            disableOnInteraction: !1
        },
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3,
                margin: 30
            }
        }
    });

    // Custom arrow controls
    $("#productnext").click(function () {
        owl.trigger("next.owl.carousel");
    });

    $("#productprev").click(function () {
        owl.trigger("prev.owl.carousel");
    });

});

$("#productprev").click(function () {
    owl.trigger("prev.owl.carousel");
});

var owl = $(".blog_list_slider").owlCarousel({
    loop: !0,
    margin: 50,
    nav: !1,
    dots: !1,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1e3: {
            items: 3,
            margin: 30
        }
    }
});
$("#customPrev").click((function () {
    owl.trigger("prev.owl.carousel")
})), $("#customNext").click((function () {
    owl.trigger("next.owl.carousel")
})), document.querySelector(".nav-link").addEventListener("click", (function (e) {
    // e.preventDefault();
    this.parentElement.querySelector(".mega_menu").classList.toggle("active")
}));
const hamburger = document.getElementById("hamburger");
hamburger.addEventListener("click", (function () {
    this.classList.toggle("active")
})), document.addEventListener("DOMContentLoaded", (() => {
    const e = document.querySelectorAll(".counter");
    if (!e.length) return void console.warn("⚠️ No counters found with class '.counter'");
    const t = new IntersectionObserver(((t, n) => {
        t.forEach((t => {
            t.isIntersecting && (e.forEach((e => {
                ! function (e) {
                    const t = parseFloat(e.getAttribute("data-count")),
                        n = e.getAttribute("data-suffix") || "+",
                        i = t % 1 != 0,
                        a = Math.ceil(100);
                    let s = 0;
                    const o = t / a,
                        r = () => {
                            s += o, s < t ? (e.textContent = i ? s.toFixed(1) + n : Math.floor(s) + n, setTimeout(r, 20)) : e.textContent = i ? t.toFixed(1) + n : t + n
                        };
                    r()
                }(e)
            })), n.unobserve(t.target))
        }))
    }), {
        threshold: .3
    }),
        n = document.querySelector(".counter_start");
    n && t.observe(n)
})), $(".team-carousel").owlCarousel({
    loop: !0,
    nav: !1,
    dots: !1,
    autoplay: !0,
    autoplayTimeout: 3e3,
    margin: 10,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        }
    }
}), document.addEventListener("DOMContentLoaded", (function () {
    document.querySelectorAll(".nav-item").forEach((e => {
        const t = e.querySelector(".nav-link"),
            n = e.querySelector(".mega_menu");
        t && n && t.addEventListener("click", (function (e) {
            if (window.innerWidth <= 992) {
                e.preventDefault();
                const t = n.classList.contains("active");
                document.querySelectorAll(".mega_menu.active").forEach((e => {
                    e.classList.remove("active")
                })), t || n.classList.add("active")
            }
        }))
    }))
})), document.querySelectorAll(".scroll-tabs .nav-link").forEach((e => {
    e.addEventListener("click", (function () {
        let e = this.closest(".scroll-tabs"),
            t = e.offsetWidth,
            n = this.offsetLeft - t / 2 + this.offsetWidth / 2;
        e.scrollTo({
            left: n,
            behavior: "smooth"
        })
    }))
})), window.addEventListener("load", (() => {
    const e = document.getElementById("loader");
    setTimeout((() => {
        e.classList.add("hidden")
    }), 3200)
}));

$(document).ready(function () {
    $("#product_details").owlCarousel({
        items: 1,
        margin: 10,
        loop: true,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
    });
});

//-------------------- spare-par-------------------

$(document).ready(function () {
    $(".spare_par_slider").owlCarousel({
        items: 1,
        loop: true,
        margin: 30,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        dots: false,
        nav: false, // show arrows
        navText: false, // optional

    });
});

$(document).ready(function () {

    var owl = $(".Home_slider_new_sec");

    owl.owlCarousel({
        items: 1,
        loop: true,
        margin: 50,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1,
                margin: 30
            }
        }
    });

    // Custom arrow controls
    $("#productnext").click(function () {
        owl.trigger("next.owl.carousel");
    });

    $("#productprev").click(function () {
        owl.trigger("prev.owl.carousel");
    });

});