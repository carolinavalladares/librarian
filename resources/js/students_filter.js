const filterLinks = Array.from(document.querySelectorAll(".filter_link"));

filterLinks.forEach((link) => {
    link.classList.remove("bg-gray-100");
    const query = window.location.search;
    const name = link.getAttribute("name");
    if (!query && name == "all") {
        link.classList.add("bg-gray-100");
        return;
    }

    const filter = window.location.search.split("=")[1];

    if (filter == name) {
        link.classList.add("bg-gray-100");
    }
});
