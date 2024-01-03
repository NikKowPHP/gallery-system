<?php 
use Models\Session;
$session = new Session();
?>

<?php $session->get_message() ?? "<h1>$sesion->get_message()</h1>" ?>

<form action="<?= FORMS_PATH . DS . 'src/controllers/addPhotoController.php' ?>" method="post"
    enctype="multipart/form-data" class="d-flex p-2 m-auto flex-column justify-content-center container">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title">

    <label for="alt">Alt Text:</label>
    <input type="text" id="alt" name="alt">

    <label for="description">Description:</label>
    <textarea id="description" name="description"></textarea>

    <label for="file">Upload Photo:</label>
    <input type="file" id="file" name="file">

    <input type="submit" value="Upload">
</form>