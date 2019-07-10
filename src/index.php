<!DOCTYPE html>
<html>
<body>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
<form id="my_form">
    Select image to upload 
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit" onclick="file_upload()">
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
        dataType    : "html"
    })
    .done(function(data, textStatus, jqXHR){
        alert(data);
    })
    .fail(function(jqXHR, textStatus, errorThrown){
        alert("fail");
    });
}
</script>

</body>
</html>
