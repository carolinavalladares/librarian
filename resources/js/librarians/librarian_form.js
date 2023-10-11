const showFormToggle = document.querySelector(".add_new_librarian");
const formContainer = document.querySelector(".form_container");
const btnArrow = document.querySelector(".btn_arrow");
let formOpen = false;

// toggle form
showFormToggle.addEventListener("click", () => {
    if (formOpen) {
        formContainer.classList.remove("max-h-[500px]");
        formContainer.classList.add("max-h-0");

        formOpen = false;
    } else {
        formContainer.classList.remove("max-h-0");
        formContainer.classList.add("max-h-[500px]");

        formOpen = true;
    }

    btnArrow.classList.toggle("rotate-180");
});
