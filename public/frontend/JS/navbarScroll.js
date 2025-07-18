let lastScrollTop = 0;

window.addEventListener("scroll", function() {
  let currentScroll = window.scrollY || document.documentElement.scrollTop;
  let navbar = document.getElementById('navbarDiv');

  if (currentScroll > lastScrollTop) {
    // Scroll down
    navbar.style.transform = "translateY(-100%)"; // Adjust the value as needed
  } else {
    // Scroll up
    navbar.style.transform = "translateY(0%)";
  }

  lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
}, false);

// Toggle menu function
// const toggleMenuButton = document.querySelector('.toggle-menu');
// const menu = document.querySelector('.menu');

// toggleMenuButton.addEventListener('click', function () {
//   navbar.classList.toggle('open');
// });



const PhoneQuery = window.matchMedia('(max-width: 480px)');

function handlePhoneChange(mediaQuery) {
  if (mediaQuery.matches) {
    // Only execute this code if the media query matches (i.e., for phones)

    // Add event listener for DOMContentLoaded event to ensure the page is fully loaded before executing the JavaScript
    document.addEventListener('DOMContentLoaded', function() {
      const toggleButton = document.querySelector('.toggle-menu');
      const menu = document.querySelector('.menu');

      toggleButton.addEventListener('click', function() {
        menu.classList.toggle('open'); // Toggle the 'open' class on the menu

        // Toggle the icon between hamburger and cross
        if (menu.classList.contains('open')) {
          toggleButton.innerHTML = '<span style="color: red;">&#10006;</span>'; // Cross icon in red color
          addMenuLines();
        } else {
          toggleButton.innerHTML = '&#9776;'; // Hamburger icon
          removeMenuLines();
        }

        function addMenuLines() {
          const menuLinks = document.querySelectorAll('.menu a');
          menuLinks.forEach(link => {
            link.style.borderBottom = '1px solid black'; // Add red border to bottom of menu item
          });
        }

        function removeMenuLines() {
          const menuLinks = document.querySelectorAll('.menu a');
          menuLinks.forEach(link => {
            link.style.borderBottom = 'none'; // Remove border from menu item
          });
        }
      });
    });
  }
}

// Call handlePhoneChange initially to check the media query state
handlePhoneChange(PhoneQuery);

// Add a listener to handle changes in the media query
PhoneQuery.addListener(handlePhoneChange);
