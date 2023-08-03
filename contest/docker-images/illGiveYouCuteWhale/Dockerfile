FROM amazoncorretto:17.0.8-al2023-headless

RUN mkdir /app
WORKDIR /app
COPY homework1.jar /app/homework1.jar
RUN chmod +x /app/homework1.jar
ENTRYPOINT ["java", "-jar", "homework1.jar"]
