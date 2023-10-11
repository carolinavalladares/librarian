const searchForm = document.querySelector(".search_authors_form");
const searchInput = document.querySelector(".search_input");

searchForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const term = searchInput.value;
    const baseUrl = window.location.href.split("?")[0];
    let url = "";
    if (term != "") {
        url = `${baseUrl}?search=${term}`;
    } else {
        url = baseUrl;
    }

    window.location.assign(url);
});
