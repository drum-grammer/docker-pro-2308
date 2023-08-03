FROM alpine:latest
CMD ["echo", "Hello, World"]


# FROM ~ : 도커 이미지의 기반이 될 베이스 이미지를 지정합니다.
# aipine Linux 최신 버전인 alpine:latest 를 기반으로 합니다.

# CMD ~ : 컨테이너가 실행될 때 수행할 명령어를 지정합니다.
# 컨테이너가 실행되면 Hello World 를 출력하는 echo 명령어가 실행됩니다.


# 도커 파일을 이용하여 이미지 빌드
# docker build -t hello-world .
# (위 명령어의 의미는 "현재 디렉토리에서 Dockerfile을 읽어 도커 이미지를 만들고,
# 해당 이미지에 hello-world라는 tag 를 붙혀라" 입니다.)

# 컨테이너 실행
# 도커 이미지를 실행
# docker run hello-world



### 에러
# failed to solve with frontend dockerfile.v0: failed to create LLB definition:
# pull access denied, repository does not exi
# st or may require authorization: server message: insufficient_scope: authorization failed
# 베이스로 사용할 이미지tag명을 잘못입력해서 발생한 에러;;;
# https://tape22.tistory.com/11