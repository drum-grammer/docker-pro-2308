# 사전미션
## 1. 컨테이너 기술이란?
- 컨테이너 기술은 애플리케이션과 관련 의존성들을 함께 패키징하여 소프트웨어를 안정적으로 실행할 수 있는 방식
## 2. 도커란?
- 컨테이너를 생성, 배포, 실행할 수 있는 오픈소스 플랫폼으로, 다양한 환경에서 동일하게 동작하는 애플리케이션을 가능하게 함.
## 3. 도커 파일, 도커 이미지, 도커 컨테이너의 개념은 무엇이고, 서로 어떤 관계입니까?
- 도커 파일: 컨테이너 이미지를 생성하기 위한 설명서로, 애플리케이션의 실행 환경과 의존성을 정의함
- 도커 이미지: 도커 파일에 의해 생성된 실행 가능한 소프트웨어 패키지로, 애플리케이션 코드, 라이브러리, 환경 변수 등을 포함
- 도커 컨테이너: 도커 이미지를 기반으로 실행된 인스턴스로, 실제 애플리케이션을 실행하는 런타임 환경을 제공
- 즉, 도커 파일로 도커 이미지를 생성하고, 이 이미지로부터 컨테이너를 실행하는 것이 가능함