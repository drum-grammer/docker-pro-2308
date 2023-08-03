import java.util.Scanner;

public class Timer {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        System.out.print("Enter the time in seconds: ");
        int seconds = scanner.nextInt();
        // Scanner클래스는 시스템 리소스(키보드 입력)를 사용하는데, 해제를 해줘야 메모리 누수나 불필요한 리소스 소모 방지
        scanner.close();
        timer(seconds);
    }

    public static void timer(int seconds) {
        try {
            Thread.sleep(seconds * 1000); // 현재 실행중인 스레드를 1초만큼 일시적으로 멈추게 함
            System.out.println("Time is up!!!!!");
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }
}
