// Timer.java

import java.util.Scanner;

public class Timer {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        System.out.print("😊 초 단위 시간을 입력하세요 : ");
        int seconds = scanner.nextInt();
        scanner.close();
        timer(seconds);
    }

    public static void timer(int seconds) {
        try {
            Thread.sleep(seconds * 1000);
            System.out.println("⏰⏰⏰ 시간이 종료되었습니다!!! ⏰⏰⏰");
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }
}
