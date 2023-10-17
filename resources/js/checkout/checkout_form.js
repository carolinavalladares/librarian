const checkoutForm = document.querySelector(".checkout_form");
const bookCheckboxes = Array.from(document.querySelectorAll(".book_checkbox"));
const studentSelect = document.querySelector(".student_select");
const checkboxContainer = document.querySelector(".input_container");

// mark checkboxes if they are in local storage array
setCheckboxes();

// handle checkboxes, save to local storage to persist the ones that are checked even if page reloads when using search or pagination
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

checkoutForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    // get book ids array from local storage
    const checked = getCheckedItems();

    // get all checkboxes currently on the page
    const formCheckboxes = Array.from(
        document.querySelectorAll(".book_checkbox")
    );

    // get id from checkboxes currently on the page
    const checkboxIds = formCheckboxes.map((item) => {
        return item.getAttribute("value");
    });

    // include the checked books that are not currently on the page because of pagination or filter
    checked.forEach((item) => {
        if (!checkboxIds.includes(item)) {
            const input = document.createElement("input");
            input.setAttribute("type", "checkbox");
            input.classList.add("hidden");
            input.setAttribute("name", "books[]");
            input.setAttribute("value", item);
            input.setAttribute("id", item);
            input.setAttribute("checked", true);

            checkboxContainer.append(input);
        }
    });

    // submit
    e.currentTarget.submit();

    // reset localstorage
    localStorage.removeItem("librarian.checkout.checked_items");
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
