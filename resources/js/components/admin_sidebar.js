const navLinks = Array.from(document.querySelectorAll(".nav_link"));
const hambuergerBtn = document.querySelector(".hamburger");
const navList = document.querySelector(".nav-list");
const hamburgerContainer = document.querySelector(".hamburger-container");

let navOpen = false;

// set background color to active tab
navLinks.forEach((link) => {
    link.classList.remove("bg-orange-200");
    const name = link.getAttribute("name");
    const path = window.location.pathname;
    const pathName = path.split("/");

    if (name == pathName[pathName.length - 1]) {
        link.classList.add("bg-orange-200");
    }
});

// mobile nav hamburger, handle open nav, close nav, and hamburger icon animation
hambuergerBtn.addEventListener("click", () => {
    if (navOpen) {
        navList.classList.remove("max-h-[2000px]");
        navList.classList.add("max-h-0");
        hamburgerContainer.classList.remove("open");

        navOpen = false;
    } else {
        navList.classList.remove("max-h-0");
        navList.classList.add("max-h-[2000px]");
        hamburgerContainer.classList.add("open");
        navOpen = true;
    }
});
