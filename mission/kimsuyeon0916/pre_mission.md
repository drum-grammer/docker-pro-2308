## 컨테이너 기술이란 무엇입니까?
* 실행에 필요한 모든 파일을 포함한 전체 실행 환경에서 애플리케이션을 패키징하고 격리할 수 있는 기술
* 전체 기능을 유지하면서 컨테이너화된 애플리케이션을 환경 간에 쉽게 이동 가능


## 도커란 무엇입니까?
* 리눅스 컨테이너에 리눅스 어플리케이션을 프로세스 격리기술을 사용하여 더 쉽게 컨테이너로 실행하고 관리할 수 있게 해주는 오픈소스 프로젝트 
* 일반적으로 도커 엔진 혹은 도커에 관련된 모든 프로젝트


## 도커 파일, 도커 이미지, 도커 컨테이너의 개념은 무엇이고, 서로 어떤 관계입니까?
도커 파일 -> 도커 이미지 -> 도커 컨테이너

* 도커 파일(Dockerfile)
	* 도커 이미지를 생성하기 위한 설정 파일
		* "컨테이너의 설계도"로 비유
	* 어떤 환경에서 실행할 애플리케이션을 구성하는 데 필요한 모든 명령어와 설정이 포함
 	* 주로 기반이 되는 베이스 이미지를 정의하고, 패키지 설치, 애플리케이션 복사 등의 단계를 지정하여 이미지를 만들어 냄
* 도커 이미지(Docker Image)
	* 도커 컨테이너를 생성하는데 사용되는 읽기 전용 템플릿
	* 도커 파일에 정의된 설정들을 바탕으로 빌드되며, 파일 시스템과 애플리케이션 코드, 라이브러리, 종속성 등을 포함 
	* 이미지는 컨테이너를 실행하는데 필요한 모든 것들을 패키징한 것
		* 애플리케이션을 실행하는 데 필요한 모든 요소가 이미지에 포함
* 도커 컨테이너(Docker Container)
	* 도커 이미지를 기반으로 생성된 실행 가능한 인스턴스
	* 격리된 환경에서 애플리케이션과 해당 종속성을 실행하는데 사용
	* 각 컨테이너는 독립적인 프로세스로 실행
		* 호스트 시스템과 분리되어 있어서 다른 컨테이너나 호스트 시스템에 영향을 미치지 않고 실행

도커 파일은 도커 이미지를 생성하는데 사용되고, 도커 이미지는 도커 컨테이너를 생성하고 실행하는데 사용됨. 도커 파일을 작성하여 원하는 애플리케이션과 환경을 설정한 후, 이 파일을 빌드하여 도커 이미지를 생성. 이후 도커 이미지를 기반으로 컨테이너를 실행하면 도커 컨테이너가 생성되어 애플리케이션이 실행.