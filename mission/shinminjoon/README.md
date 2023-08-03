# Docker : 나만의 도커 이미지 만들기 부터, 클라우드 배포까지!
8월 원티드 프리 온보딩 챌린지 - docker 뽀개기


## I. 사전 미션하는 법

### 방법 1
1. 해당 repository를 fork 하세요.
2. 로컬에서 작업한 커밋을 fork한 repository에 push 하세요.
5. Pull Request를 생성하여, 사전 미션을 제출해주세요.

### 방법 2
1. 해당 repository를 clone 하세요:
```
git clone git@github.com:drum-grammer/docker-pro-wanted.git
```
2. 별도의 브랜치를 생성하세요:
```
git checkout -b my-branch-xx
```
3. 아래 사전 미션 내용을 보고 답안을 마크다운 형식으로 작성하시고, `./mission/{nickName}` 디렉토리 저장해주세요.

4. 해당 브랜치를 푸쉬해주세요.
```
git push -u origin my-branch-xx
```
5. Pull Request를 생성하여, 사전 미션을 제출해주세요.


## II. 사전 미션
1. 컨테이너 기술이란 무엇입니까? (100자 이내로 요약)
> 컨테이너 기술은 애플리케이션과 그 실행 환경을 격리된 단위로 패키징하여, 플랫폼에 구애받지 않고 정확하게 동일한 환경에서 돌아가도록 하는 솔루션입니다. 이는 개발, 배포, 관리를 단순화해 시스템 효율성을 높입니다.

2. 도커란 무엇입니까? (100자 이내로 요약)
> 도커는 컨테이너 기술을 구현하고 관리하는 오픈소스 플랫폼입니다. 애플리케이션과 종속성을 가볍고 이식 가능한 컨테이너에 포함시켜 개발, 배포, 실행 과정을 간소화하며, 효율적인 리소스 사용과 빠른 작동 속도를 제공합니다.

3. 도커 파일, 도커 이미지, 도커 컨테이너의 개념은 무엇이고, 서로 어떤 관계입니까?
> 도커 파일은 애플리케이션과 실행 환경을 정의하는 스크립트로, 도커 이미지를 생성하는 빌드 파일입니다.
> 도커 이미지는 도커 파일을 기반으로 생성된 실행 가능한 스냅샷으로, 애플리케이션과 모든 종속성을 포함한 패키지입니다.
> 도커 컨테이너는 도커 이미지를 실행한 결과물로, 격리된 환경에서 애플리케이션을 동작시키기 위한 실행 인스턴스입니다.
> 요약하면, 도커 파일은 도커 이미지를 만들기 위한 빌드 파일이고, 도커 이미지는 애플리케이션을 실행할 패키지이며, 도커 컨테이너는 도커 이미지를 기반으로 실제 작동하는 애플리케이션 인스턴스입니다.

4. [실전 미션] 도커 설치하기 (참조: [도커 공식 설치 페이지](https://docs.docker.com/engine/install/))
- 아래 `도커 설치부터 실행 튜토리얼`을 참조하여 도커를 설치하고, 도커 컨테이너를 실행한 화면을 캡쳐해서 Pull Request에 올리세요.



## III. 도커 설치부터 실행 튜토리얼
### 도커 설치
#### 1. 도커 공식 웹사이트에서 "[Get Started](https://www.docker.com/get-started)"를 클릭합니다. 
#### 2. OS에 맞는 설치 파일을 다운로드 받습니다.
- MacOS의 경우 "Download for Mac"을 클릭합니다.
- Window 일 경우 "Download for Windows"를 클릭합니다. 
- 다운로드한 설치 파일을 실행합니다.

### 도커 컨테이너 실행 시키기
#### 1. `나의 사전 미션 폴더`를 만들고 해당 폴더로 이동합니다.
```shell
cd path/to/docker-pro-wanted/mission
mkdir my-name
cd my-name
```

#### 2. "Hello, World!"를 출력하는 도커 파일을 만듭니다.
```shell
vim Dockerfile
```
`i`를 눌러 편집모드로 전환 후 아래 내용을 작성합니다:
```Dockerfile
FROM alpine:latest
CMD ["echo", "Hello, World"]
```
`ESC`를 눌러 명령모드로 전환 후, `:wq` 입력, `enter`키를 눌러 `Dockerfile`을 생성합니다.

#### 3. 도커 파일로 도커 이미지를 빌드합니다.
```shell
docker build -t hello-world .
```
(위 명령어의 의미는 "현재 디렉토리에서 `Dockerfile`을 읽어 도커 이미지를 만들고, 해당 이미지에 `hello-world`라는 `tag` 를 붙혀라" 입니다.)

#### 4. 빌드한 도커 이미지를 실행합니다.
```shell
docker run hello-world
```
이 명령어는 hello-world라는 이름의 도커 이미지를 실행시켜 "Hello, World!"를 출력합니다.

## IV. 도커 커맨드 라인 명령어 정리
- [공식 문서](https://docs.docker.com/engine/reference/run/)
- [cheat sheet](/lecture/1st/cli.md)
