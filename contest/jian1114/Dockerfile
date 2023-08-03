FROM python:latest

RUN pip install requests

RUN mkdir /app
WORKDIR /app
COPY weather.py /app/weather.py
RUN chmod +x /app/weather.py
ENTRYPOINT ["python", "/app/weather.py"]