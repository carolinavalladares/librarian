const studentSelectForm = document.querySelector(".select_student_form");
const studentSelect = document.querySelector(".student_select_return_page");

// Submit checkout page form when student is selected from dropdown, once the form is submitted the page will reload with all the books that the selected student is currently borrowing
studentSelect.addEventListener("change", (e) => {
    studentSelectForm.submit();
});
