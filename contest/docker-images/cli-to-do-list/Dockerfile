# Python 이미지 다운로드
FROM python:latest

# 컨테이너에서 명령어를 사용할 경로 지정(작업 디렉토리)
RUN mkdir -p /app
WORKDIR /app

# To-do 데이터베이스 설정 파일을 저장하는 디렉토리
RUN mkdir /root/.config

# 현재 폴더에 있는 내용 복사, 작업 디렉토리에 붙여넣기
COPY . .

# 라이브러리 추가
RUN pip install --no-cache-dir --upgrade pip && \
    pip install -r requirements.txt

# 컨테이너가 중지되지 않도록 설정
CMD tail -f /dev/null
