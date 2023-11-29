<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
date_default_timezone_set('America/Toronto');
if (!empty($_POST)) {

    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');

    $stmt = $pdo->prepare('INSERT INTO contacts VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $name, $email, $phone, $title, $created]);

    $msg = 'Created Successfully!';
}
?>

<?=template_headernew('Create')?>

<div class="content update" style="width: 400px; padding: 20px; background-color: #f0f0f0; border-radius: 10px;">
    <h2>Create Contact</h2>
    <form action="create.php" method="post" form action="upload.php" enctype="multipart/form-data">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Full Name" id="name">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="e-mail@example.com" id="email">
        <label for="phone">Phone</label>
        <input type="text" name="phone" placeholder="123456789" id="phone">
        <label for="title">Profession</label>
        <input type="text" name="title" placeholder="Your Profession" id="title">
        <label for="created">Created</label>
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Create">
    </form>

        
  
    <?php if ($msg): ?>
        <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>