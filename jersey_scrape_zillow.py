import json
import time
import subprocess
import os

def run_script(script_path):
    try:
        if os.path.exists(script_path):
            print(f"Running script: {script_path}")
            subprocess.run(['python', script_path], check=True)
            print(f"Finished script: {script_path}")
            time.sleep(5)  # Wait for 5 seconds
        else:
            print(f"Script not found: {script_path}")
    except subprocess.CalledProcessError as e:
        print(f"Error running script {script_path}: {e}")

# Paths to the scripts
scripts = [
    'C:/Projects/MyProject/real_estate_bot/PHP/website/burlington_scrape_zillow.py',
    'C:/Projects/MyProject/real_estate_bot/PHP/website/camden_scrape_zillow.py',
    'C:/Projects/MyProject/real_estate_bot/PHP/website/gloucester_scrape_zillow.py',
    'C:/Projects/MyProject/real_estate_bot/PHP/website/mercer_scrape_zillow.py'
]

# Run each script
for script in scripts:
    run_script(script)