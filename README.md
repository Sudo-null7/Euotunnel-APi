# Eurotunnel-API
##### Remove font due to copyright (i think dont't wanna get in trouble)
Use Eurotunnels API to pull boarding data!

change this in grabToken.py on line 30
Uk Terminal: `https://www.eurotunnel.com/api/v1/departures/GetCombinedBoardResults?terminal=uk`
<br>
<br>
<br>
Fr Terminal: `https://www.eurotunnel.com/api/v1/departures/GetCombinedBoardResults?terminal=Fr`

#### Requirements
no suprise here just do `pip install -r Requirements.txt`
got to install selenium and stuff

#### Web UI
Shows trains
if you want to have all trains and not just 6 then replace on line 7
<br>
`const limitedTrains = trains.slice(0,7)`
<br>
to
<br>
`const limitedTrains = trains`
<br>
to show all trains (might be broken)

#### grabToken.py
grabToken.py will go to eurotunnel.com and get a fresh token for you for use with ^^
<br>
if your having issues go to line 47 and replace add a `3` or `2` to the end of `python` as shown
<br>
in the below example for python 3
<br>
Python Code at line 47:
<br>
`
subprocess.run(["python3", "refreshToken.py"])
`
## JSON DATA TABLE - demo site's json in a table

| Letter | LinesEn                                              | LinesFr                                              | FormattedDepartureTimes           |
|-------|---------------------------------------------------|---------------------------------------------------|----------------------------------|
| A1    | Please proceed                                     | Appel en cours                                     | FormattedFolkestoneTerminalTime: 0:00 |
| A3    | Please proceed                                     | Appel en cours                                     | FormattedFolkestoneTerminalTime: 0:05 |
| A5    | Please proceed                                     | Appel en cours                                     | FormattedFolkestoneTerminalTime: 0:10 |
| B1    | Wait for call, First call in 1h 43m                | Attendez l'appel, Premier appel 1h 43m                | FormattedFolkestoneTerminalTime: 0:10 |
| B2    | Wait for call, First call in 1h 43m                | Attendez l'appel, Premier appel 1h 43m                | FormattedFolkestoneTerminalTime: 0:15 |
| B5    | Wait for call, First call in 1h 43m                | Attendez l'appel, Premier appel 1h 43m                | FormattedFolkestoneTerminalTime: 0:15 |


<br><br>
Hope you Enjoy (non-commerical use only)
