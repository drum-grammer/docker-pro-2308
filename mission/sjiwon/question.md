## 1. 컨테이너 기술이란?

`Container`란 Application 실행에 필요한 모든 종속성을 패키징하고 격리할 수 있는 기술
- VM과 달리 OS Level의 가상화 구조이고 각 컨테이너들은 Host OS를 공유
- 별도의 Guest OS가 없기 때문에 VM보다 훨씬 빠르게 동작할 수 있다

<br>

## 2. Docker란?

`Docker`는 Linux Container에서 `프로세스 격리기술`을 사용해서 Container를 더욱 쉽게 실행하고 관리할 수 있게 도와주는 가상화 플랫폼


<br>

## 3. DockerFile, Docker Image, Docker Container의 개념은 무엇이고, 서로 어떤 관계인가요?

### Dockerfile
- Docker Image를 생성하기 위한 텍스트 파일
- Application을 실행하기 위해서 필요한 Base Image, Command, ...등을 작성한다

### Docker Image
- Dockerfile에 정의된 내용에 따라 빌드된 패키지
- Docker Image는 Docker Container를 실행하기 위해 필요한 모든 종속성을 포함하고 있다

### Docker Container
- Docker Image를 기반으로 생성되어서 실행중인 `독립`적인 프로세스
- 각각의 Docker Container는 `격리`된 환경에서 동작한다

> Dockerfile은 Docker Image를 빌드하기 위한 설정 파일
> Docker Image는 Docker Container를 생성하고 실행하기 위한 패키지

- Dockerfile -> Docker Image 빌드 -> Docker Container 생성 및 실행
