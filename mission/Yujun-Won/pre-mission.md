# II. 사전 미션
## 1. 컨테이너 기술이란 무엇입니까? (100자 이내로 요약)
- 컨테이너는 애플리케이션과 필요한 모든 파일(코드, 의존성 등)을 하나의 런타임 환경으로 묶는 데 사용하는 기술이다.
- 단일 구성 단위로서 컨테이너는 한 컴퓨팅 환경에서 다른 컴퓨팅 환경으로 쉽게 이동 및 실행할 수 있다.

[출처: [Hewlett Packard Enterprise](https://www.hpe.com/kr/ko/what-is/containers.html)]

## 2. 도커란 무엇입니까? (100자 이내로 요약)
- Docker는 개발자가 컨테이너를 빌드, 배포, 실행, 업데이트, 관리할 수 있는 오픈 소스 플랫폼입니다.

[출처: [IBM](https://www.ibm.com/kr-ko/topics/docker)]

## 3. 도커 파일, 도커 이미지, 도커 컨테이너의 개념은 무엇이고, 서로 어떤 관계입니까?
### Dockerfile
- Dockerfile은 Docker image를 빌드하는 데 사용되는 텍스트 파일이다.
- Dockerfile에는 기본 이미지(베이스 이미지), 애플리케이션의 소스 코드 및 종속성을 포함하여 애플리케이션을 실행하기 위해 필요한 모든 단계와 설정이 정의된다.
- Dockerfile을 사용하면 동일한 애플리케이션을 다른 환경에서도 동일한 방식으로 빌드하고 실행할 수 있습니다.

### Docker image
- Docker image는 Dockerfile을 사용하여 빌드된 실행 가능한 패키지이다.
- Image는 애플리케이션을 실행하는 데 필요한 모든 것을 포함하고 있으며, 가상 머신과 유사한 격리된 환경을 제공한다.
- Image는 여러 컨테이너에서 공유하여 실행할 수 있으며, 불변성을 유지한다.

### Docker container
- Docker container는 Docker image를 실행한 인스턴스이다.
- Container는 격리된 환경에서 애플리케이션을 실행하며, 호스트 시스템과 분리되어 동작한다.
- 각 container는 자체 파일 시스템과 네트워크를 가지며, 다른 container와 상호 작용하거나 외부 시스템과 통신할 수 있다.

### 관계
- Dockerfile을 사용하여 Docker image를 빌드한다.
- Dockerfile에는 image를 구성하는 데 필요한 모든 단계와 설정이 포함된다.
- Docker image는 Docker container를 생성하는 데 사용되고, image를 실행하면 정의된 애플리케이션이 격리된 환경에서 실행된다.