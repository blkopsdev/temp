import argparse
import requests
import datetime
import os

from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from time import sleep
import traceback

try:
    chrome_options = Options()
    chromedriver = "/usr/bin/chromedriver"
    os.environ["webdriver.chrome.driver"] = chromedriver
    chrome_options.add_argument("--headless")
    # chrome_options.add_argument("--window-size=1920x1080")
    chrome_options.add_argument("--disable-notifications")
    chrome_options.add_argument("--disable-dev-shm-usage")
    chrome_options.add_argument('--no-sandbox')
    chrome_options.add_argument('--verbose')
    chrome_options.add_experimental_option("prefs", {
        "download.default_directory": "./pdf/russia/downloaded",
        "download.prompt_for_download": False,
        "download.directory_upgrade": True,
        "safebrowsing_for_trusted_sources_enabled": False,
        "safebrowsing.enabled": False
    })
    driver = webdriver.Chrome(chromedriver, chrome_options=chrome_options)
    driver.get('https://visa.kdmid.ru/PetitionChoice.aspx')
    print(driver.find_element_by_id('ctl00_phBody_lblCountryTip').get_attribute("innerHTML"))
    driver.close()
    driver.quit()
except:
    print(traceback.format_exc())
