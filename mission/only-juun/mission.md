1. 컨테이너 기술이란 무엇입니까?
컨테이너는 어플리케이션과 실행 요소를 담는 독립적 프로세스로, 호스트 OS에 의존하지 않으며,
어플리케이션 격리는 도커와 같은 Container Engine을 통해 이루어집니다.


2. 도커란 무엇입니까?
오픈소스 컨테이너 엔진으로, 도커 허브라는 공개된 저장소를 제공하여 컨테이너 자료를 관리한다.
도커 파일을 통해 도커 이미지를 생성하여 컨테이너를 쉽게 생성 및 복제한다.

3. 도커 파일, 도커 이미지, 도커 컨테이너의 개념은 무엇이고, 서로 어떤 관계입니까?
Dockerfile: 도커 이미지를 빌드하는 설계도. 
            도커 컨테이너가 어떻게 생성되어야 하는지를 명세하는 스크립트 파일.
            Dockerfile에는 기반 이미지 설정, 필요한 패키지 설치, 실행할 명령어 등이 포함

Docker Image: 도커 파일에 따라 생성된 실행 가능한 소프트웨어 패키지.
              응용 프로그램 실행에 필요한 파일 시스템과 응용 프로그램 코드, 라이브러리, 환경 변수 등을 포함
              이미지는 불변(immutable)하며, 다른 컴퓨터나 서버에 손쉽게 전달되거나 저장될 수 있습니다.

Docker Container: 도커 이미지를 기반으로 실제로 실행되는 환경. 
                  격리된 환경에서 이미지의 내용을 실행. 
                  각 컨테이너는 독립된 실행 환경을 가지며, 다른 컨테이너와 호스트 OS로부터 격리됨