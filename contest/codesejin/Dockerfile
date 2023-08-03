## Dockerfile

# 사용할 이미지 기반으로 컨테이너 실행, Java11을 설치한 공식적인 도커 이미지
FROM openjdk:11

# 컨테이너 내부에 /app디렉토리를 생성하고, 해당 디렉토리를 현재 작업 디렉토리로 설정한다
# 이후 모든 작업은 /app 디렉토리에서 이뤄진다
WORKDIR /app

# 호스트 환경에 있는 Timer.java 파일을 컨테이너 내부의 /app디렉토리로 복사
COPY Timer.java .

# Java 코드를 컴파일하여 클래스 파일 생성
# javac 명령어를 사용하여 java 소스코드(Timer.java)를 컴ls파일하여 실행 가능한 java 바이트코드로 변환(Timer.class)
RUN javac Timer.java

# 컨테이너 실행 시 자동으로 'java Timer' 명령어 실행
CMD ["java", "Timer"]
