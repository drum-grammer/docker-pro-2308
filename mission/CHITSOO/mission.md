## 1. 컨테이너 기술이란 무엇입니까?
> 자신의 컴퓨터나 서버에 여러 대의 서버를 생성하고자 할때, 원래는 여러 대의 VM을 생성해야 했다. 여기서 리소스 사용량을 조금 더 가볍게 만들 수 없을까해서 만들어 진 것이 Container 엔진이다. guest OS 없는 가벼운 가상화 기술을 사용하는 논리 패키징 매커니즘이다.

## 2. 도커란 무엇입니까?
> 컨테이너 기반의 오픈소스 가상화 플랫폼이다. 다양한 프로그램들과 실행환경을 컨테이너로 규격화시켜 프로그램의 배포 및 관리르 단순화할 수 있다.

## 3. 도커 파일, 도커 이미지, 도커 컨테이너의 개념은 무엇이고, 서로 어떤 관계입니까?
- 도커 파일
  > docker에서 이미지를 생성하기 위한 용도로 작성하는 파일이다. 만들 이미지에 대한 정보를 기술해 둔 템플릿이라고 보면 된다.
- 도커 이미지
  > 컨테이너 실행에 필요한 파일과 설정값 등을 포함하고 있는 것으로 상태값을 가지지 않고 변하지 않습니다.
- 도커 컨테이너
  > 이미지를 실행한 상태라고 볼 수 있고 추가되거나 변하는 값은 컨테이너에 저장된다.
- 도커 이미지와 도커 컨테이너의 관계
  > 같은 이미지에서 여러개의 컨테이너를 생성할 수 있고 컨테이너의 상태가 바뀌거나 컨테이너가 삭제되더라도 이미지는 변하지 않고 그대로 남아있다.
## 4. [실전 미션] 도커 설치하기