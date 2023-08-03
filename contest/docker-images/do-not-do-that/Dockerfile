FROM python:latest

RUN mkdir /app
WORKDIR /app
COPY choiceArt.py /app/choiceArt.py
RUN chmod +x /app/choiceArt.py
ENTRYPOINT ["python", "/app/choiceArt.py"]
