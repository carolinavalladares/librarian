const filterLinks = Array.from(document.querySelectorAll(".filter_link"));

filterLinks.forEach((link) => {
    link.classList.remove("bg-orange-200");
    const query = window.location.search;
    const name = link.getAttribute("name");
    if (!query && name == "all") {
        link.classList.add("bg-orange-200");
        return;
    }

    const filter = window.location.search.split("=")[1];

    if (filter == name) {
        link.classList.add("bg-orange-200");
    }
});
