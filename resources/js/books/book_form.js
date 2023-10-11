const imageInput = document.querySelector(".image_input");
const display = document.querySelector(".display");
const removeBtn = document.querySelector(".remove_image");
const imageInputLabel = document.querySelector(".label");
const showFormToggle = document.querySelector(".add_new_book");
const formContainer = document.querySelector(".form_container");
const btnArrow = document.querySelector(".btn_arrow");
let formOpen = false;

// display selected image in form
imageInput.addEventListener("change", (e) => {
    const input = e.target;

    // create image element
    const imageElem = document.createElement("img");
    imageElem.classList.add(["object-center", "w-full"]);

    // create new instance of file reader
    const reader = new FileReader();

    // get file data
    reader.onload = function () {
        const fileData = reader.result;
        imageElem.src = fileData;
    };

    // append image element to form
    display.append(imageElem);
    display.classList.remove("hidden");

    reader.readAsDataURL(input.files[0]);

    imageInputLabel.classList.remove("pointer-events-auto");
    imageInputLabel.classList.add("pointer-events-none");

    removeBtn.classList.remove("hidden");
});

// remover imagem
removeBtn.addEventListener("click", () => {
    display.remove(".imageElem");

    imageInputLabel.classList.remove("pointer-events-none");
    imageInputLabel.classList.add("pointer-events-auto");

    removeBtn.classList.add("hidden");
});

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
