
<form action="<?=FORMS_PATH . DS . '/src/controllers/photo_form_handler.php'?>" method="post" enctype="multipart/form-data">
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
