<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert your article(Update)-</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
</head>

<body>

    <?php
    $DBConnect = new mysqli("mysql", "root","root_pass", "yoondb");
    if(mysqli_connect_errno()){
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $num = $_GET['ArticleNum'];
    $data =  loadData($num);
    function loadData($num)
    {
        global $DBConnect;
        $query = "SELECT * FROM board WHERE id = ?";
        $stmt = $DBConnect->prepare($query);
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

        $rows = array();
        $result = array();
        $meta = $stmt->result_metadata();

        while ($field  = $meta->fetch_field()) {
            $params[] = &$rows[$field->name];
        }
        call_user_func_array(array($stmt, 'bind_result'), $params);

        while ($stmt->fetch()) {
            foreach ($rows as $key => $val)
                $c[$key] = $val;
            $result[] = $c;
        }
        return $result[0];
    }

    ?>
    <form action="updateProc.php?ArticleNum=<?php echo $num; ?>" method="POST">
        <div class="container">
            <input type="text" name="ArticleNum" value="<?php echo $num; ?>" hidden>
            <div class="form-group">
                <label for="userNameInput">Name</label>
                <input type="text" class="form-control" id="userNameInput" name="nameInput" value="<?php echo $data['UserName']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="titleInput">Title</label>
                <input type="text" class="form-control" id="titleInput" name="titleInput" value="<?php echo $data['Title']; ?>" placeholder="제목을 입력하세요">
            </div>
            <div class="form-group">
                <label for="contentInput">Content</label>
                <textarea class="form-control" id="contentInput" name="contentInput" placeholder="내용을 입력하세요" rows="10"><?php echo $data['Content']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-warning">Cancel</button>
        </div>
    </form>
</body>

</html>