# Eurotunnel-API
Use Eurotunnels API to pull boarding data!


Change boarding data for the France Terminal change on line 3

`https://www.eurotunnel.com/api/v1/departures/GetCombinedBoardResults?terminal=uk`
with
`https://www.eurotunnel.com/api/v1/departures/GetCombinedBoardResults?terminal=Fr`

that data is saved to a file called eurotunnel.json then javascript take that data and makes a table css makes it look nice.

arrivals isnt a supported api request
