window.onload = function() {
    fetch('trains.json')
            .then(response => response.json())
            .then(trains => {
                    const trainList = document.getElementById('train-list');
                    // only process the first six trains
                    const limitedTrains = trains.slice(0,7)
                    limitedTrains.forEach(train => {
                            const row = document.createElement('tr');

                            const letterCell = document.createElement('td');
                            letterCell.textContent = train.Letter;
                            row.appendChild(letterCell);

                            const linesEnCell = document.createElement('td');
                            // check the length of the LinesEn array
                            if (train.LinesEn.length === 1) {
                                    // if there is only one element in the array
                                    linesEnCell.innerHTML = train.LinesEn[0];
                            } else {
                                    // if there are two elements in the array
                                    linesEnCell.innerHTML = `<div>${train.LinesEn[0]}</div><div class="smallerText">${train.LinesEn[1]}</div>`;
                            }
                            linesEnCell.classList.add("trainMessages"); // add the class to the cell
                            row.appendChild(linesEnCell);

                            const timeCell = document.createElement('td');
                            timeCell.textContent = train.FormattedDepartureTimes.FormattedFolkestoneTerminalTime
                            timeCell.classList.add("trainTimes"); // add the class to the cell
                            row.appendChild(timeCell);

                            trainList.appendChild(row);
                    });
            });
}

setInterval(function() {
// code to refresh the page goes here
location.reload();
}, 30000); // 60000 milliseconds = 1 minute

setInterval(showTime, 1000);
function showTime() {
    let time = new Date();
    let hour = time.getHours();
    let min = time.getMinutes();
    let sec = time.getSeconds();
    am_pm = "AM";

    if (hour > 12) {
            hour -= 12;
            am_pm = " PM";
    }
    if (hour == 0) {
            hr = 12;
            am_pm = " AM";
    }

    hour = hour < 10 ? "0" + hour : hour;
    min = min < 10 ? "0" + min : min;
    sec = sec < 10 ? "0" + sec : sec;

    let currentTime = hour + ":"
            + min + ":" + sec + am_pm;

    document.getElementById("clock").innerHTML = currentTime;
}
showTime();
