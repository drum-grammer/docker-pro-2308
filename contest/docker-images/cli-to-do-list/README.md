# CLI로 To-do List 관리

CLI 환경에서 To-do List를 관리할 수 있는 Python 프로그램입니다.


## 1. 실행 방법

---

```shell
# 현재 디렉토리의 Dockerfile로 이미지를 빌드
$ docker build -t cli-todo .

# 생성된 이미지 확인
$ docker images

# To-do 리스트 프로그램 이미지 실행
$ docker run --name my-todo cli-todo
```

이미지 실행 이후 **다른 쉘을 열어서** 다음의 명령을 입력하여 프로그램을 실행합니다.
```shell
$ docker exec -it my-todo /bin/sh
```

아래의 명령어들은 **프로그램에서 사용할 수 있는 명령어**입니다.
```shell
# To-do 리스트 초기화
$ python -m todo init

# To-do 리스트 확인
$ python -m todo list

# To-do 추가
$ python -m todo add {{추가할 To-do}}

# To-do 추가 (우선순위 부여)
$ python -m todo add {{추가할 To-do}} -p 1
$ python -m todo add {{추가할 To-do}} -priority 2

# To-do 완료
$ python -m todo complete {{To-do 인덱스}}

# To-do 삭제
$ python -m todo remove {{To-do 인덱스}}
```


## 2. 실행 화면

---

![capture1](https://github.com/yeseong31/study-spring/assets/66625672/5e861b6e-55ec-4b6b-9122-7340cefb1174)

![capture2](https://github.com/yeseong31/study-spring/assets/66625672/8e7dd08d-b9f5-464d-a7a4-71a511d2fab2)
