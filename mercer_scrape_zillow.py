import requests
import os
import json

# Set your API key and listing URL
api_key = "0b4c93ad-04c2-4a34-9ed3-cd496227c532"  # CHANGE WITH YOUR API KEY
listing_url = "https://www.zillow.com/mercer-county-nj/?searchQueryState=%7B%22pagination%22%3A%7B%7D%2C%22isMapVisible%22%3Atrue%2C%22mapBounds%22%3A%7B%22north%22%3A40.48594370838104%2C%22south%22%3A40.07473526922728%2C%22east%22%3A-74.31105452343749%2C%22west%22%3A-75.11305647656249%7D%2C%22usersSearchTerm%22%3A%22Mercer%20County%20NJ%20homes%22%2C%22regionSelection%22%3A%5B%7B%22regionId%22%3A1201%2C%22regionType%22%3A4%7D%5D%2C%22filterState%22%3A%7B%22sort%22%3A%7B%22value%22%3A%22globalrelevanceex%22%7D%2C%22price%22%3A%7B%22min%22%3A100000%2C%22max%22%3A1000000%7D%2C%22mp%22%3A%7B%22min%22%3A478%2C%22max%22%3A4784%7D%2C%22ah%22%3A%7B%22value%22%3Atrue%7D%7D%2C%22isListVisible%22%3Atrue%2C%22mapZoom%22%3A11%2C%22category%22%3A%22cat1%22%7D"  # The URL of the listing page with the 'searchQueryState' parameter.

# API endpoint and default headers
api_url = "https://app.scrapeak.com/v1/scrapers/zillow/listing"

parameters = {"api_key": api_key, "url": listing_url}

# Make the API request
response = requests.get(api_url, params=parameters)

# Check if the request was successful
if response.status_code != 200:
    print(f"Failed to retrieve data. Status code: {response.status_code}")
    print(f"Response content: {response.text}")
else:
    # Parse the response JSON
    data = response.json()

    # Define the file path
    file_path = "https://github.com/apondok/apso/main/properties/1201_data.json"

    # Create directories if they do not exist
    os.makedirs(os.path.dirname(file_path), exist_ok=True)

    # Save the JSON data to a file
    with open(file_path, 'w') as file:
        json.dump(data, file, indent=4)

    print(f"Data successfully saved to {file_path}")
