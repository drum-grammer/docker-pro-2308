<?php ob_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 수정 성공 여부</title>
</head>

<body>
    <?php
    $DBConnect = new mysqli("mysql", "root","root_pass", "yoondb");
    if(mysqli_connect_errno()){
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }


    $num =  trim(strip_tags(addslashes($_POST['ArticleNum'])));
    $title = trim(strip_tags(addslashes($_POST['titleInput'])));
    $content =  trim(strip_tags(addslashes($_POST['contentInput'])));

    updateArticle($title, $content, $num);

    function updateArticle($title, $content, $num){
        global $DBConnect;
        $updateQuery = "UPDATE board SET Title=? , Content = ? WHERE id=?";
        $stmt =  $DBConnect->prepare($updateQuery);
        if ($stmt == false) {
            echo ('Statement 생성 실패 : ' . mysqli_error($DBConnect));
            exit();
        }
        $bind = mysqli_stmt_bind_param($stmt, "ssi", $title, $content, $num);
        if ($bind == false) {
            echo ('파라미터 바인드 실패 : ' . mysqli_error($DBConnect));
            exit();
        }
        $exec = mysqli_stmt_execute($stmt);
        if ($exec === false) {
            echo ('쿼리 실행 실패 : ' . mysqli_error($DBConnect));
            exit();
        }
        sleep(1);
        header("Location: detail.php?ArticleNum=$num");
    }
    ?>
</body>

</html>