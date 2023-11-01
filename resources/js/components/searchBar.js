export const setUpSearchBar = () => {
    const searchForm = document.querySelector(`.search_form`);
    const searchInput = document.querySelector(".search_input");
    const seeAllBtn = document.querySelector(".all-btn");

    // handle show or hide see-all button, the see-all button will reset the page to show all records again after a search has been made
    if (window.location.href.includes("search")) {
        seeAllBtn.classList.remove("hidden");
    } else {
        seeAllBtn.classList.add("hidden");
    }

    // manipulate url to send serch term to route
    searchForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const term = searchInput.value;
        const baseUrl = window.location.href.split("?")[0];
        let url = "";

        if (term == "") {
            url = baseUrl;
        } else {
            url = `${baseUrl}?search=${term}`;
        }

        window.location.assign(url);
    });

    seeAllBtn.addEventListener("click", () => {
        // remove all queries from url
        const baseUrl = window.location.href.split("?")[0];
        window.location.assign(baseUrl);
    });
};

setUpSearchBar();
