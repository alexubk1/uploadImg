<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="style.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

</head>

<body>



<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="files[]" id="fileToUpload" multiple>
    <input type="submit" value="Upload Image" name="submit">
</form>

        <?php
            $allImages = scandir('upload/');
            $images = array_diff($allImages, array('.','..'));
        ?>

<?php
if (!empty($_GET['image'])) {
    if (file_exists('upload/'.$_GET['image'])) {
        $deleteResult = unlink('upload/'.$_GET['image']);
        header('Location: index.php');
    }
}
?>

<?php foreach ($images as $image): ?>
<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="<?= 'upload/'.$image ?>" alt="<?= $image ?>">
        <div class="caption">
            <h3><?= $image ?></h3>
            <p><a href="?image=<?= $image ?>" class="btn btn-danger" role="button">Supprimer</a></p>
        </div>
    </div>
</div>
<?php endforeach; ?>
</div>

</body>
</html>
