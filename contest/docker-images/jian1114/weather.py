import requests
import sys

API_KEY = None

def main():
    global API_KEY
    API_KEY = input("https://openweathermap.org/api에 접속하여 본인의 API KEY를 입력해주세요😀: ")
    city = input("도시 이름을 영어로 입력하세요😀: ")
    city = city.replace(" ", "")
    weather = get_weather(city)
    print(f"{city}의 날씨는 {weather['description']}이고, 온도는 {weather['temp']}°C 입니다.")

def get_weather(city_name):
    global API_KEY
    url = f"https://api.openweathermap.org/data/2.5/weather?q={city_name}&appid={API_KEY}&units=metric&lang=kr"
    response = requests.get(url)
    if response.status_code != 200:
        print("Error fetching weather data")
        sys.exit(1)

    weather_data = response.json()
    description = weather_data['weather'][0]['description']
    temp = weather_data['main']['temp']
    return {'description': description, 'temp': temp}

if __name__ == "__main__":
    main()