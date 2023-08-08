<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 작성</title>

    <script>
        window.onload = function() {
            iForm = document.insertForm;
        }

        function submit() {
            iForm.submit();
        }
    </script>
</head>

<body>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />

    <form action="insertProc.php" enctype="multipart/form-data" method="POST" name="insertForm">
        <div class="container">
            <div class="form-group">
                <label for="userNameInput">Name</label>
                <input type="text" class="form-control" id="userNameInput" name="nameInput" placeholder="닉네임을 입력하세요." required>
            </div>
            <div class="form-group">
                <label for="titleInput">Title</label>
                <input type="text" class="form-control" id="titleInput" name="titleInput" placeholder="제목을 입력하세요" required>
            </div>
            <div class="form-group">
                <label for="contentInput">Content</label>
                <textarea class="form-control" id="contentInput" name="contentInput" placeholder="내용을 입력하세요" rows="10"></textarea>
            </div>
            <br />
            <br />
            <button type="button" class="btn btn-primary" onclick="submit()">Submit</button>
            <button type="reset" class="btn btn-warning">Cancel</button>
        </div>
    </form>
</body>

</html>