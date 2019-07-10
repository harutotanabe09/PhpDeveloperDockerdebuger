<!DOCTYPE html>
<html>
<head>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
</head>
<body>


<!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
<!--  formリダイレクトしないようにreturn falseで返す -->
<form id="my_form" onsubmit="file_upload();return false;">
    Select image to upload 
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<script>
function file_upload(){
    // フォームデータを取得
    var formdata = new FormData($('#my_form').get(0));
    // POSTでアップロード
    $.ajax({
        url  : "upload.php",
        type : "POST",
        data : formdata,
        cache       : false,
        contentType : false,
        processData : false,
        dataType    : "json"
    })
    .done( (data) => {
                    console.log(data);
                    alert("done" + data);
    })
    .always( (data) => {
                    console.log(data);
    })
    return false;
}
</script>

</body>
</html>
