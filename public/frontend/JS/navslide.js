let lastScrollTop = 0;
let navbar = document.querySelector(".navlist");

window.addEventListener("scroll", function() {
    let currentScroll = window.scrollY|| document.documentElement.scrollTop;

    if (currentScroll > lastScrollTop) {
        // Scroll down
        navbar.style.transform = "translateY(-100%)";
    } else {
        // Scroll up
        navbar.style.transform = "translateY(0%)";
    }

    lastScrollTop = currentScroll;
});