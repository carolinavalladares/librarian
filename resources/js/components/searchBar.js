export const setUpSearchBar = () => {
    const searchForm = document.querySelector(`.search_form`);
    const searchInput = document.querySelector(".search_input");

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
};

setUpSearchBar();
