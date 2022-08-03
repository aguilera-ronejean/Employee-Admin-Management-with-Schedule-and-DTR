$(".btnedit").click(e => {
    let textvalues = displayData(e);

    let DepartmentID = $("input[name*='DepartmentID']");
    let Department = $("input[name*='Department']");

    Department.val(textvalues[1]);
    DepartmentID.val(textvalues[0]);


})

function displayData(e) {
    let counter = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td) {
        if (value.dataset.id == e.target.dataset.id) {
            textvalues[counter++] = value.textContent;
        }
    }
    return textvalues;
}