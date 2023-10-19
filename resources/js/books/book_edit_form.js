const showFormToggle = document.querySelector(".toggle-form");
const formContainer = document.querySelector(".form_container");
const btnArrow = document.querySelector(".btn_arrow");

let formOpen = false;

// toggle form
showFormToggle.addEventListener("click", () => {
    if (formOpen) {
        formContainer.classList.remove("max-h-[3000px]");
        formContainer.classList.add("max-h-0");

        formOpen = false;
    } else {
        formContainer.classList.remove("max-h-0");
        formContainer.classList.add("max-h-[3000px]");

        formOpen = true;
    }
    btnArrow.classList.toggle("rotate-180");
});
