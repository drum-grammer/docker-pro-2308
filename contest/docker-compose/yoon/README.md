## 프로젝트 소개
* 여러개의 컨테이너를 제어할 수 있는 DockerCompose를 이용하여 APM(Apaache, PHP, MySQL) 기반 게시판입니다.

## 실행하기
* Windows Powershell(또는 명령프롬프트(cmd))를 이용하여 아래의 명령어를 입력합니다
```bash
docker compose -f docker-compose.yml up -d
#yml 파일을 docker-compose.yml로 지정한 경우, -f 옵션은 생략가능합니다.
```

## 사용한 컨테이너 이미지
* mysql 5.7.30
* php:7.3.3-apache

## 파일구성
* db 디렉터리
    * initdb.d 디렉터리
        * create_table.sql : 게시글 테이블 생성
        * load_data.sql : 샘플 데이터 생성

* webrepo 디렉터리
    * 웹서버 컨테이너에서 /var/www/html 디렉터리와 연동되는 디렉터리입니다. 이 곳에 php 등의 웹 문서가 있습니다
    * index.php : 글 목록을 볼 수 있는 페이지
    * detail.php : 글 목록에서 제목을 클릭하였을 때 글 내용을 볼 수 페이지
    * insert.php / update.php : 새로운 게시글 작성/수정 페이지
    * insertProc.php / updateProc.php / deleteProc.php : 게시글 작성/수정/삭제 요청을 받아서 DB에 반영하는 작업을 진행


## 실행 예
![Alt text](img/001.png)