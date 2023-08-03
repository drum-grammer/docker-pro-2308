
## 1. 컨테이너 기술이란 무엇입니까? (100자 이내로 요약)

<br>

- 호스트OS 위에 독립적으로 애플리케이션을 실행할 수 있는, 분리된 환경
- 프로세스를 격리하고, 해당 프로세스에 필요한 자원을 독립적으로 할당/격리해서 가상의 격리 환경을 구축할 수 있음

<br>

![image](https://github.com/sdoaolo/docker-pro-2308/assets/48430781/484532c5-65e4-41b4-b7e9-67d18199a7e9)


<br>

--- 

<br>



## 2. 도커란 무엇입니까? (100자 이내로 요약)

컨테이너 기술을 기반으로 하는 오픈소스 가상화 플랫폼
- 도커를 사용하면, OS 위에 도커 엔진이 동작하고, 그 위에 컨테이너가 동작한다. 
- 기본적으로 Linux OS 에서 동작함

<br>

![image](https://github.com/sdoaolo/docker-pro-2308/assets/48430781/8653d89b-8a45-46bc-aa88-2b18850e42c9)

<br>

--- 

<br>


## 3. 도커 파일, 도커 이미지, 도커 컨테이너의 개념은 무엇이고, 서로 어떤 관계입니까?

### ✍️ 도커 이미지
어떤 프로그램을 실행하기 위한 모든것을 가진 것 (라이브러리 의존성까지)



### ✍️ 도커 파일
도커 이미지를 만들기 위한 파일, 자체 DSL (DOMAIN SPECIFIC LANGUAGE)를 이용해 생성 과정을 적어준다.

```
FROM adoptopenjdk/openjdk11
CMD ["./mvnw", "clean", "package"]
ARG JAR_FILE_PATH=target/*.jar
COPY ${JAR_FILE_PATH} app.jar
ENTRYPOINT ["java", "-jar", "app.jar"]
```



### ✍️ 도커 컨테이너
프로세스를 - 격리된 공간에서 - 동작하도록 하는 기술  -> 이미지를 실행한 상태

<br><br>

### ⏺ Example 

<br>

예를들어 내가 어떤 스프링부트 서버를 배포한다고 가정하자.
<br>
도커파일에 자바 버전을 명시하고, 빌드(docker build)하면 이미지를 만들 수 있다.

<br><br>

```docker run docker-example:0.0.1```

<br>

도커로 이미지 파일을 실행 하게되면 > 스프링부트 프로젝트가 실행된다. 
따로 리눅스 OS에 Java 버전을 설치하지 않아도 작동된다.

<br><br>

해당 서버가 MySQL에서 데이터를 조회 할 경우, MySQL버전이 정의된 이미지를 사용해 별도의 컨테이너에서 실행한다.

<br><br>

만약 서버애플리케이션과 MySQL서버를 함께 실행하고 싶다면, Docker Compose를 이용하면 된다.
도커 컴포즈로 두개의 컨테이너를 함께 실행하고 네트워크를 설정할 수 있다.



<br>

--- 

<br>




## 4. [실전 미션] 도커 설치하기 (참조: 도커 공식 설치 페이지)


아래 도커 설치부터 실행 튜토리얼을 참조하여 도커를 설치하고, 도커 컨테이너를 실행한 화면을 캡쳐해서 Pull Request에 올리세요

<br>

<img width="907" alt="Screen Shot 2023-07-19 at 8 36 34 PM" src="https://github.com/sdoaolo/docker-pro-2308/assets/48430781/0388c391-256a-4bfb-828b-549ec6fee9ad">





---

### References 

<br>

https://anweh.tistory.com/67

https://www.ibm.com/kr-ko/topics/containers


<br>
<br>
