<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 작성 성공 여부</title>
</head>

<body>
    <?php
    $DBConnect = new mysqli("mysql", "root","root_pass", "yoondb");
    if(mysqli_connect_errno()){
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $no = -1; //Auto Increment이자 PK인 ArticleNum을 저장하기 위한 변수

    $title = trim(strip_tags(addslashes($_POST['titleInput'])));
    $content = trim(strip_tags(addslashes($_POST['contentInput'])));
    $name = trim(strip_tags(addslashes($_POST['nameInput'])));

    writeAtricleDB($title, $content, $name); //게시글 자체를 먼저 업로드 해주고
    sleep(1);
    header("Location: index.php");

    function writeAtricleDB($title, $content, $name){
        global $no;
        global $DBConnect;
        $query = "INSERT INTO board(Title,Content,UserName) 
                   VALUES (?,?,?)";
        $stmt = $DBConnect->prepare($query);
        if ($stmt == false) {
            echo ('Statement 생성 실패 : ' . mysqli_error($DBConnect));
            exit();
        }
        $bind = mysqli_stmt_bind_param($stmt, "sss", $title, $content, $name);
        if ($bind == false) {
            echo ('파라미터 바인드 실패 : ' . mysqli_error($DBConnect));
            exit();
        }
        $exec = mysqli_stmt_execute($stmt);
        if ($exec == false) {
            echo ('쿼리 실행 실패 : ' . mysqli_error($DBConnect));
            exit();
        }
        $no = $DBConnect->insert_id;
    }
    ?>
</body>

</html>