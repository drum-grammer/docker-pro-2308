## II. 사전 미션
1. 컨테이너 기술이란 무엇입니까? (100자 이내로 요약)

Container는 다양한 컴퓨팅 환경에 쉽게 배포할 수 있도록 코드, 라이브러리 구성 파일과 같은 애플리케이션 구성을 압축한 가볍고 실행 가능한 소프트웨어 단위이자 프로세스이다. 즉 우리가 만드는 서비스를 Instructure as Code에 기반하여 컨테이너화하는 기술이다.
2. 도커란 무엇입니까? (100자 이내로 요약)
컨테이너 기반의 애플리케이션을 개발하고 배포하고 실행할 수 있는 오픈 소스 플랫폼이다. 개인 컴퓨터의 infrastructure과 격리시켜 앱을 실행하기 때문에 소프트웨어 실행 속도가 빠르다는 장점을 가진다. infrastructure as code 개발 환경 셋팅을 코드로 진행하고, DevOps를 지향하여 코드를 쓰고 배포하기까지 시간 단축시킨다.

3. 도커 파일, 도커 이미지, 도커 컨테이너의 개념은 무엇이고, 서로 어떤 관계입니까?
- Dockerfile을 기계어로 번역해서 이를 실행하기 위한 라이브러리와 결합하고 실행 파일로 만드는 build 작업을 거침
- Image: 앱을 실행하기 위한 모든 것들을 포함한 하나의 단위, 특정 프로세스를 실행하기 위한 환경
    - 계층화된 파일 시스템, 파일들의 집합
    - code
    - runtime library
    - environment variables
    - configuration files
- Container: 이미지를 실행하기 위해 담을 수 있는 구조로 이미지의 런타임 객체
    - 이미지를 실행하여 메모리를 차지하기 시작하면 컨테이너가 됨
    - 따라서 여러 개의 컨테이너가 하나의 이미지를 위해 존재할 수 있음
    - command line, docker desktop 에서 실행 중인 컨테이너 목록을 볼 수 있음

<img width="563" alt="image" src="https://github.com/ranunclulus/docker-pro-2308/assets/87214089/8beb4ccb-1662-4985-a90a-c514868cf12a">

위 그림처럼 사용자가 실행하기 위한 Dockerfile을 만들어서 build하면 Docker daemon에서 실행 단위인 Image로 만든 뒤 Container에 올려서 실행하게 된다.

4. [실전 미션] 도커 설치하기 (참조: [도커 공식 설치 페이지](https://docs.docker.com/engine/install/))
- 아래 `도커 설치부터 실행 튜토리얼`을 참조하여 도커를 설치하고, 도커 컨테이너를 실행한 화면을 캡쳐해서 Pull Request에 올리세요.
<img width="682" alt="image" src="https://github.com/ranunclulus/docker-pro-2308/assets/87214089/4a066da3-6b1f-4b77-82c5-804ef3968873">
