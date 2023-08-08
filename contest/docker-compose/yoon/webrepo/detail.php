<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 보기</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />

    <style>
        .articleZone {
            border: solid black 1px;
        }

        .articleZone table {
            word-wrap: break-word;
            white-space: pre-wrap;
        }

        .view td {
            word-wrap: break-word;
            white-space: pre-wrap;
        }
    </style>

    <script>
        window.onload = function() {
            <?php $num = trim(strip_tags(addslashes($_GET['ArticleNum']))); ?>
            num = <?php echo $num ?>;
        }

        function goToUpdate() {
            var target = "update.php?ArticleNum=" + num;
            location.href = target;
        }        
        function goToDelete() {
            var target = "deleteArticleProc.php?ArticleNum=" + num;
            location.href = target;
        }        
        function goToList() {
            var target = "index.php";
            location.href = target;
        }
    </script>
</head>

<body>
    <div class="container col-md-7">
        <div class="articleZone container">
            <?php
            $DBConnect = new mysqli("mysql", "root","root_pass", "yoondb");
            if(mysqli_connect_errno()){
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }
            $num = trim(strip_tags(addslashes($_GET['ArticleNum'])));
            $data = loadArticle($num);
            ?>
            <span>
                <table class="table table-bordered table-sm">
                    <tr class='row pd-0 mx-0'>
                        <td class="col-1">작성자</td>
                        <td class="col-3"><?php echo $data['UserName']; ?></td>
                    </tr>
                    <tr class='row pd-0 mx-0'>
                        <td class="col-1">제목</td>
                        <td colspan="5" class="col-11"><?php echo $data['Title'] ?></td>
                    </tr>
                    <tr class='row pd-0 mx-0'>
                        <td class="col-1">내용</td>
                        <td colspan="5" class="col-11"><?php echo $data['Content'] ?></td>
                    </tr>
                </table>
            </span>
            <span>
                <button type="button" class="btn btn-primary btn-sm" onclick="goToList()">목록으로 이동</button>
                <button type="button" class="btn btn-primary btn-sm" onclick="goToUpdate()">글 수정하기</button>
                <button type="button" class="btn btn-danger btn-sm" onclick="goToDelete()">글 삭제하기</button>
            </span>
            <br />
            <?php
            function loadArticle($num)
            {
                global $DBConnect;
                $query = "SELECT * FROM board WHERE id = ?";
                $stmt = $DBConnect->prepare($query);
                $stmt->bind_param("i", $num);
                $stmt->execute();

                $rows = array();
                $result = array();
                $meta = $stmt->result_metadata();
                $result = bindResult_associative($stmt);
                return $result[0];
            }
            ?>
        </div>
    </div>

    <?php
    function bindResult_associative(&$stmt)
    {
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
        return $result;
    }
    ?>
    </div>
</body>
</html>