import requests
import json
import os

# refresh token of MY server
def refreshToken():
    with open("headers.json", "r") as json_file:
        headers = json.load(json_file)
    try:
        authJson = headers["Authorization"]
        return authJson
    except KeyError:
        authJson = "Not Found Sorry!"
        return authJson

# saves to singular token to file
print("Pulled Fresh token")
token = {"Authorization": refreshToken()}
with open("token.json", "w") as outfile:
    json.dump(token, outfile)
os.remove("headers.json")