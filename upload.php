<?php
// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
// of $_FILES.

$uploaddir = 'data/book/Uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

//echo '<pre>';
//echo "$uploadfile\n";
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    $re = 1;
    //echo "File is valid, and was successfully uploaded.\n";
    //echo "<script>alert('Upload success')</script>";
} else {
    //echo "<script>alert('Upload failed')</script>";
    $re = 0;
}

?>

<script>
    parent.postMessage({re:'<?php echo $re?>'}, '*');
</script>
