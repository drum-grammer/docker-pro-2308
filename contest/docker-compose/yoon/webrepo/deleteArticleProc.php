<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 삭제 성공 여부</title>
    <script>
        function success() {
            alert("정상적으로 글을 삭제하였습니다");
            window.location = "index.php";
        }

        function failed() {
            alert("글을 삭제할 수 없습니다");
            window.location = "index.php";
        }
    </script>
</head>

<body>
    <?php
    $DBConnect = new mysqli("mysql", "root","root_pass", "yoondb");
    if(mysqli_connect_errno()){
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $num = trim(strip_tags(addslashes($_GET['ArticleNum'])));

    if (!$num) {
        echo "<script>failed()</script>";
        exit();
    }
    deleteAtricle($num);
    function deleteAtricle($num){
        global $DBConnect;
        $query = "DELETE FROM board WHERE id = ?";
        $stmt  = $DBConnect->prepare($query);
        if ($stmt == false) {
            echo ('Statement 생성 실패 : ' . mysqli_error($DBConnect));
            exit();
        }
        $bind = $stmt->bind_param("i", $num);
        if ($bind == false) {
            echo ('파라미터 바인드 실패 : ' . mysqli_error($DBConnect));
            exit();
        }
        $exec = $stmt->execute();
        if ($exec == false) {
            echo ('쿼리 실행 실패 : ' . mysqli_error($DBConnect));
            exit();
        }
        echo "<script>success()</script>";
    }
    ?>
</body>

</html>