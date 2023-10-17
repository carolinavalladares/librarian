const studentSelectForm = document.querySelector(".select_student_form");
const studentSelect = document.querySelector(".student_select_return_page");

studentSelect.addEventListener("change", (e) => {
    studentSelectForm.submit();
});
