const filterLinks = Array.from(document.querySelectorAll(".filter_link"));

filterLinks.forEach((link) => {
    link.classList.remove("bg-orange-200");
    const query = window.location.search;
    const name = link.getAttribute("name");

    // check what tab should be active
    if (!query.includes("filter") && name == "all") {
        link.classList.add("bg-orange-200");
        return;
    }

    if (!query && name == "all") {
        link.classList.add("bg-orange-200");
        return;
    }

    const filter = window.location.search;

    if (filter.includes(name)) {
        link.classList.add("bg-orange-200");
    }
});
