# 1. 컨테니어 기술이란 무엇입니까?
컨테이너는 어플리케이션 실행에 필요한 파일들을 종속성과 함께 패키징해서 
특정한 컴퓨팅 환경 외 다른 환경에서도 안정적으로 실행될 수 있도록 하는 기술.

# 2. 도커란 무엇입니까?
컨테이너 기술 기반의 가상화 플랫폼.
어플리케이션 환경을 도커 이미지로 만들어서 컨테이너로 실행하고 관리할 수 있도록 도움.

# 3. 도커 파일, 도커 이미지, 도커 컨테이너의 개념은 무엇이고, 서로 어떤 관계입니까?
도커 파일: 도커 이미지를 만들기 위한 스크립트이며 하나의 컨테이너를 만들기위해서
설치해야하는 패키지,코드,명령어,환경변수등을 설정.

도커 이미지: 도커 파일을 빌드하면 자동으로 도커 이미지가 생성.
도커 파일을 통해 만들어진 어플리케이션의 실행을 위한 패키지.

도커 컨테이너: 도커 이미지를 실행한 가상 환경.
어플리케이션과 그 구성요소들이 실행되는 공간.
각각 독립적으로 실행.

따라서 도커파일을 베이스로 도커 이미지가 생성되고, 도커 이미지를 실행해서
도커 컨테이너를 생성합니다.

# 4.[실전미션] 도커 설치하기
jinnykim-docker-run.PNG 파일을 확인해주세요.