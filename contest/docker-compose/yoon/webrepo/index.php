<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>게시판</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
</head>

<body>
    <div class="container">
        <h1> 간단한 게시판입니다. </h1>
        <button type="button" class="btn btn-primary" onclick="location.href='insert.php'">작성</button>

        <?php
        $DBConnect = new mysqli("mysql", "root","root_pass", "yoondb");
        if(mysqli_connect_errno()){
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        loadArticles();
        function loadArticles(){
            global $DBConnect;
            $recordQuery = "SELECT * FROM board";
            $stmt = $DBConnect->prepare($recordQuery);
            if ($stmt == false) {
                echo ('Statement 생성 실패! : ' . mysqli_error($DBConnect));
                exit();
            }
            $exec = $stmt->execute();
            if ($exec == false) {
                echo ('쿼리 실행 실패 : ' . mysqli_error($DBConnect));
                exit();
            }
            $arr = array();
            $stmt->bind_result($arr['ArticleNum'], $arr['Title'], $arr['Content'], $arr['UserName']) or die("bind fail");

            //printFields;
            echo "<table class='table table-hover table-bordered'>\n";
            echo "<tr>\n";
            foreach ($arr as $k => $v) {
                if ($k != "Content" && $k != "PW") {
                    echo "<th>$k</th>";
                }
            }
            echo "</tr>\n";

            //printRecords
            while ($stmt->fetch()) {
                $num = $arr['ArticleNum'];
                echo "<tr>";
                foreach ($arr as $k => $v) {
                    if ($k != "Content" && $k != "PW") {
                        echo "<td><a href = 'detail.php?ArticleNum=$num'>" . $v . "</a></td>";
                    }
                }
                echo "</tr>\n";
            }
        }
        ?>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>
</body>

</html>