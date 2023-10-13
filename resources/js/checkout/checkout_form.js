const checkoutForm = document.querySelector(".checkout_form");
const bookCheckboxes = Array.from(document.querySelectorAll(".book_checkbox"));

// mark checkboxes if they are in local storage array
setCheckboxes();

// handle checkboxes, save to local storage to persist the ones that are checked even if page reloads when using search
bookCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", (e) => {
        let checkedItems = getCheckedItems();
        let isChecked = e.target.checked;
        let id = e.target.value;

        if (isChecked) {
            checkedItems.push(id);
        } else {
            checkedItems = checkedItems.filter((item) => item != id);
        }

        // save updated array to local storage
        localStorage.setItem(
            "librarian.checkout.checked_items",
            JSON.stringify(checkedItems)
        );
    });
});

checkoutForm.addEventListener("submit", (e) => {
    e.preventDefault();

    // reset localstorage
    localStorage.removeItem("librarian.checkout.checked_items");

    // submit
    e.currentTarget.submit();
});

function getCheckedItems() {
    // get checked items from local storage
    let checkedItems = localStorage.getItem("librarian.checkout.checked_items");

    if (checkedItems) {
        checkedItems = JSON.parse(checkedItems);
    } else {
        checkedItems = [];
    }

    return checkedItems;
}

function setCheckboxes() {
    // set checked ones when page loads
    bookCheckboxes.forEach((checkbox) => {
        let checkedItems = getCheckedItems();

        // mark as checked if item is in array
        if (checkedItems.includes(checkbox.value)) {
            checkbox.checked = true;
        }
    });
}
