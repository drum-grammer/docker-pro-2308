FROM python:3.10
RUN apt update
RUN pip install pytimedinput && pip install colorama
WORKDIR /my_app
COPY ./snake.py .

CMD ["python3", "snake.py"]