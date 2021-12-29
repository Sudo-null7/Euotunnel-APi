<?php

$url = "https://www.eurotunnel.com/api/v1/departures/GetCombinedBoardResults?terminal=uk";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyZWFsbSI6ImRlZmF1bHQiLCJ1bmlxdWVfbmFtZSI6IlRoZURpUUE5K2RtQkRuRTJuRklDb21nUlV6QSIsIm5hbWVpZCI6IlRoZURpUUE5K2RtQkRuRTJuRklDb21nUlV6QSIsInJvbGUiOiJFdXJvdHVubmVsLkFwaUNsaWVudCIsIm5iZiI6MTY0MDc1MDE1OCwiZXhwIjoxNjQwNzU3NDE4LCJpYXQiOjE2NDA3NTAxNTh9.DQHsUxXpHAoYqQosD4Htgi-qu93PwRMpMWmatnXwQ8k",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);


$var_str = var_export($resp, true);
$var = "$resp";
file_put_contents('eurotunnel.json', $var);

?>


<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <noscript>Please use a updated browser or allow javascript</noscript>
    <title>Eurotunnel Departures</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>
  
<body>
    <section>
        <h1>Eurotunnel Boarding Groups</h1>
  
        <table id='table'>
            <tr>
                <th>Letter</th>
                <th>Departure Time</th>
                <th>Planned Departure Time</th>
                <th>Messages</th>
            </tr>
  
            <script>
                $(document).ready(function () {
  
                    $.getJSON("eurotunnel.json", 
                            function (data) {
                        var trains = '';
  
                        $.each(data, function (key, value) {
  
                            trains += '<tr>';
                            trains += '<td>' + 
                                value.Letter + '</td>';
  
                            trains += '<td>' + 
                                value.DepartureTime + '</td>';
  
                            trains += '<td>' + 
                                value.PlannedDepartureTime + '</td>';
  
                            trains += '<td>' + 
                                value.LinesEn + '</td>';
  
                            trains += '</tr>';
                        });
                          
                        $('#table').append(trains);
                    });
                });
            </script>
    </section>
</body>
</html>