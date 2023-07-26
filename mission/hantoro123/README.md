## II. 사전 미션
### 1. 컨테이너 기술이란 무엇입니까? (100자 이내로 요약)
컨테이너는 애플리케이션이 한 컴퓨팅 환경에서 다른 컴퓨팅 환경으로 빠르고 안정적으로 실행되도록 코드와 모든 종속성을 패키징하는 소프트웨어의 표준 단위로 각각 사용자 공간에서 격리된 프로세스는 실행되는 다른 컨테이너 OS 커널과 공유할 수 있습니다.

### 2. 도커란 무엇입니까? (100자 이내로 요약)
Docker는 환경에 구애받지 않고 애플리케이션을 신속하게 구축, 테스트, 배포 및 확장할 수 있는 소프트웨어 플랫폼입니다.

### 3. 도커 파일, 도커 이미지, 도커 컨테이너의 개념은 무엇이고, 서로 어떤 관계입니까?
 - 도커 파일 : 도커 이미지를 생성하기 위한 스크립트 파일 입니다. 
 - 도커 이미지 : 도커에서 컨테이너로 실행될 파일의 모음
 - 도커 컨테이너 : 도커 이미지를 실행한 상태로 응용 프로그램의 종속성과 함께 패키징, 캡슐화하여 격리된 공간에서 프로세스를 동작시키는 기술

    도커 파일은 도커 이미지를 만들기 위한 파일이고 도커 이미지를 기반으로 도커 컨테이너를 생성하여 애플리케이션을 격리된 환경에서 실행합니다. 이 구조는 배포와 확장성을 향상시킵니다.

### 4. [실전 미션] 도커 설치하기 (참조: [도커 공식 설치 페이지](https://docs.docker.com/engine/install/))
- 아래 `도커 설치부터 실행 튜토리얼`을 참조하여 도커를 설치하고, 도커 컨테이너를 실행한 화면을 캡쳐해서 Pull Request에 올리세요.

![Docker Pre-mission](/mission/hantoro123/docker-premission.png)