import requests
from requests.structures import CaseInsensitiveDict
from seleniumwire import webdriver
import time
import json
import os
import subprocess

# NOTICE: Worked on a 4 GBPS Connection and 70 MBPS 
# connection so this shouldn't matter

# non-commerical use only

firefox_options = webdriver.FirefoxOptions()
firefox_options.add_argument('--headless')
driver = webdriver.Firefox(options=firefox_options)
# this is done and has a 85% chance it will not break
webdriver.Firefox.log_path = '/dev/null'

def update():
  # get site
  driver.get("https://www.eurotunnel.com/uk/travelling-with-us/latest/")
  time.sleep(25)
  for request in driver.requests:
    rhs = dict(request.headers)
    json_data = json.dumps(rhs)
    with open("/var/www/html/headers.json", "w") as outfile:
      json.dump(rhs, outfile)
  # store current trains here
  url = "https://www.eurotunnel.com/api/v1/departures/GetCombinedBoardResults?terminal=Uk"
  print("stored and now getting new train data")
  headers = CaseInsensitiveDict()
  headers["Authorization"] = rhs["Authorization"]
  resp = requests.get(url, headers=headers)
  print(resp.json())
  trains = resp.json()
  with open("/var/www/html/trains.json", "w") as outfile:
    json.dump(trains, outfile)
  time.sleep(10)

# Run the function
update()

# Clean the file for just header comment if you too lazy for this
# by calling the refreshToken.py script
# if your getting errors from add a 3 or a 2 to the end of `python`
subprocess.run(["python", "refreshToken.py"])
