<?php
if(isset($_POST['submit'])) {
        for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
            $types = ['image/gif', 'image/png', 'image/jpeg', 'image/jpg'];

            if ($_FILES['upload']['size'][$i] > 1000000) {
                $errors['size'] = "le fichier dépasse la taille autorisée";
            }
            elseif (!in_array($_FILES['upload']['type'][$i], $types)) {
                $errors['type'] = "type de fichier incorrect";
            }
            else
                {
                $extensions = pathinfo($_FILES['upload']['name'][$i], PATHINFO_EXTENSION);
                $fileName = uniqid('image') . '.' . $extensions;
                $uploadDir = 'upload/' . $fileName;
                $uploadResult = move_uploaded_file($_FILES['upload']['tmp_name'][$i], $uploadDir);
            }
        }
}
header('location: index.php');