const showFormToggle = document.querySelector(".toggle-form");
const formContainer = document.querySelector(".form_container");
const btnArrow = document.querySelector(".btn_arrow");
const dateInput = document.querySelector(".date_input");
let formOpen = false;

// set book published date as default
let date = dateInput.getAttribute("data-date");

let dateArr = date.split("-");

if (dateArr[0].length < 4) {
    dateArr = dateArr.reverse();
}

date = dateArr.join("-");

dateInput.value = date;

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
