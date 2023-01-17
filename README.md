# Eurotunnel-API
Use Eurotunnels API to pull boarding data!

Change boarding data go to change on line 3

Uk Terminal: `https://www.eurotunnel.com/api/v1/departures/GetCombinedBoardResults?terminal=uk`
Fr Terminal: `https://www.eurotunnel.com/api/v1/departures/GetCombinedBoardResults?terminal=Fr`

#### Web UI
Shows trains
if you want to have all trains and not just 6 then replace on line 7
`const limitedTrains = trains.slice(0,7)`
to
`const limitedTrains = trains`
to show all trains (might be broken)

#### grabToken.py
grabToken.py will go to eurotunnel.com and get a fresh token for you for use with ^^
if your having issues go to line 47 and replace add a `3` or `2` to the end of `python` as shown
in the below example for python 3
Python Code at line 47:

`
subprocess.run(["python3", "refreshToken.py"])
`
Hope you Enjoy (non-commerical use only)
