const chartContainer = document.querySelector(".chart_container");

const students = JSON.parse(chartContainer.getAttribute("name"));

const approved = students.filter((student) => student.approved == 1);

const denied = students.filter((student) => student.approved == 0);

const pendingApproval = students.filter((student) => student.approved == null);

const data = {
    labels: ["Não Autorizados", "Autorizados", "Pendentes"],
    datasets: [
        {
            label: "Students",
            data: [approved.length, denied.length, pendingApproval.length],
            backgroundColor: [
                "rgb(255, 99, 132)",
                "rgb(54, 150, 120)",
                "rgb(255, 205, 86)",
            ],
            hoverOffset: 4,
        },
    ],
    options: {
        responsive: true,

        plugins: {
            legends: {
                labels: {
                    color: ["red", "red", "red"],
                },
            },
        },
    },
};

const studentChart = new Chart("studentChart", {
    type: "doughnut",
    data: data,
});

// window.addEventListener("resize", () => {
//     new Chart("myChart", {
//         type: "doughnut",
//         data: data,
//     });
// });
