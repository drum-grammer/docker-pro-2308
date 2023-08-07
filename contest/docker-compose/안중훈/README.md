# 실행 방법
도커 컴포즈 파일 실행 스크립트 입력
```bash
docker compose -f docker-compose.yml up -d
```
끗

# 도커 컴포즈 파일 소스코드 설명
`docker-compose.yml`
```
version: "3"

services:
  db:
    image: mariadb:10
    ports:
      - 3307:3306
    volumes:
      - ./docker/mysql/conf.d:/etc/mysql/conf.d
      - ./docker/mysql/initdb.d:/docker-entrypoint-initdb.d
    env_file: test.env
    environment:
      TZ: Asia/Seoul
    networks:
      - backend
    restart: always

networks:
  backend:
```
- `services: db` : 컨테이너에 실행할 서비스 명
- `image: mariadb:10` : mariaDB version 10의 이미지 사용
- `volumes:` : 컨테이너에 마운트 시킬 파일:마운트 될 컨테이너의 경로
- `env_file` : 환경변수들을 불러올 파일 명
- `environment` : 등록할 환경변수
- `TZ` : timezone
- `networks` : 사용할 도커 네트워크 명
- `restart` : 재시작 옵션(always: 컨테이너를 수동으로 끄기전까지 항상 재시작)

# 디렉터리 구조 및 파일 설명
### 디렉터리 구조
```
안중훈
├── docker
│   └── mysql
│       ├── conf.d
│       │   └── my.cnf
│       └── initdb.d
│           ├── create_table.sql
│           └── load_data.sql
├── docker-compose.yml
└── test.env
```
- `/conf.d` : mysql 설정 파일들을 넣는 폴더입니다
- `my.cnf` : mysql 설정파일. 아래와 같이 mysql관련 설정이나 전역변수 등을 설정할 수 있습니다
```
[client]
default-character-set = utf8mb4

[mysql]
default-character-set = utf8mb4

[mysqld]
character-set-client-handshake = FALSE
character-set-server           = utf8mb4
collation-server               = utf8mb4_unicode_ci
```

- `/initdb.d` : DB시작시 입력할 .sql파일을 관리하는 폴더입니다
- `create_table.sql` : 테이블 생성 관련 sql문을 모아놓은 파일입니다
- `load_data.sql` : 생성된 테이블에 넣을 데이터 관련 sql문을 모아놓은 파일입니다. 현재는 비워져 있습니다

<br>

- `docker-compose.yml` : 다들 아시죠? 도커 컴포즈 파일입니다
- `test.env` : 아래와 같이 도커 컴포즈 파일의 `environment`에 들어갈 환경변수들을 모아놓은 파일입니다. 환경변수는 DB엑세스에 필요한 민감한 정보들이 포함되어있기에, 민감한 정보는 .env파일로 따로 관리하는게 좋습니다.

_그럼 이만!_