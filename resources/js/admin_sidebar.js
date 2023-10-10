const navLinks = Array.from(document.querySelectorAll(".nav_link"));

navLinks.forEach((link) => {
    link.classList.remove("bg-orange-200");
    const name = link.getAttribute("name");
    const path = window.location.pathname;
    const pathName = path.split("/");

    if (name == pathName[pathName.length - 1]) {
        link.classList.add("bg-orange-200");
    }
});
