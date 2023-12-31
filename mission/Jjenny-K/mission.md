## 1. 컨테이너 기술이란 무엇입니까? (100자 이내로 요약)

**컨테이너**는 실행에 필요한 모든 파일을 포함한 전체 실행환경에서 애플리케이션을 패키징하고 격리할 수 있는 기술입니다.

## 2. 도커란 무엇입니까? (100자 이내로 요약)

**도커**는 Linux 기반의 컨테이너를 만들고 사용할 수 있도록 하는 컨테이너화 기술로 컨테이너를 가벼운 모듈식 가상 머신처럼 다루고 애플리케이션을 클라우드에 최적화하도록 지원합니다.

## 3. 도커 파일, 도커 이미지, 도커 컨테이너의 개념은 무엇이고, 서로 어떤 관계입니까?

- **도커 파일** : 고유한 이미지를 빌드하기 위해 이미지를 만들고 실행하는 데 필요한 단계(레이어)를 정의하는 간단한 구문으로 작성된 설정 파일입니다.
- **도커 이미지** : 애플리케이션 실행에 필요한 독립적인 환경, 런타임 환경 등 컨테이너 생성 지침이 포함된 읽기 전용 템플릿입니다.
- **도커 컨테이너** : 기본 시스템에서 애플리케이션을 분리할 수 있는 런타임 환경으로 실행 중인 이미지의 인스턴스로 간주됩니다.(이미지에 종속됨)
