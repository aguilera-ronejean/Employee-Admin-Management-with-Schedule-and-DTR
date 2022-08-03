$(".btnedit").click(e => {
    let textvalues = displayData(e);

    let ScheduleID = $("input[name*='ScheduleID']");
    let schedule = $("input[name*='schedule']");
    let startTime = $("input[name*='startTime']");
    let endTime = $("input[name*='endTime']");

    ScheduleID.val(textvalues[0]);
    schedule.val(textvalues[1]);
    startTime.val(textvalues[2]);
    endTime.val(textvalues[3]);
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