<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
<form action="upload.php" enctype="multipart/form-data" method="post">
    <div>
        <label for='upload'>Add Attachments:</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
        <input id='upload' name="upload[]" type="file" multiple="multiple" />
    </div>
    <p><input type="submit" name="submit" value="Submit"></p>
</form>




<?php
$directory = "upload/";
if (isset($_GET['delete'])) {
    if (file_exists($_GET['delete'])) {
        unlink($_GET['delete']);
    }
}
$images = glob($directory . "*.{jpg,png,gif,jpeg}", GLOB_BRACE);
foreach($images as $image) {
     ?>
    <img width="20%" class="img-thumbnail" src="<?php echo $image;?>">
    <a href="?delete=<?php echo $image ?>">delete</a><?php
}
?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</body>
</html>
