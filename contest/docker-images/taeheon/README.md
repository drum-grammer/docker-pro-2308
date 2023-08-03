# 🐍 Snake Game in terminal


![실행화면](https://github.com/yeedacoding/docker-pro-2308/assets/83167676/43476e24-3f8f-44bf-be1f-c9540b8e106a)


## 목차
- [🐍 Snake Game in terminal](#-snake-game-in-terminal)
  - [목차](#목차)
  - [게임 설명](#게임-설명)
  - [코드 소스](#코드-소스)
  - [실행 방법](#실행-방법)

## 게임 설명
- 터미널에서 뱀을 조종하여 사과를 먹는 게임
- 방향키 : w, a, s, d
- 사과를 먹을 수록 뱀 이동 속도 증가!



## 코드 소스
참고한 코드는 [여기서 ! 📃](https://github.com/clear-code-projects/powershell-snake)



## 실행 방법

- Dockerfile로 이미지 빌드
```
docker build --tag snake-game:v1 .
```

- 컨테이너 실행
```
docker run -it snake-game:v1
```
