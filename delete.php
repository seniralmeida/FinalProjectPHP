<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id'])) {
 
    $stmt = $pdo->prepare('SELECT * FROM contacts WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }

    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
 
            $stmt = $pdo->prepare('DELETE FROM contacts WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the contact!';
        } else {

            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Delete')?>

<div class="content delete" style="width: 400px; padding: 20px; background-color: #f0f0f0; border-radius: 10px; text-align: center;">
    <h2>Delete Contact #<?=$contact['id']?></h2>
    <?php if ($msg): ?>
        <p><?=$msg?></p>
    <?php else: ?>
        <p>Are you sure you want to delete #<?=$contact['id']?> - <?=$contact['name']?>?</p>
        <div class="yesno" style="margin-top: 20px;">
            <a href="delete.php?id=<?=$contact['id']?>&confirm=yes" style="display: inline-block; padding: 10px 20px; background-color: #ff4d4d; color: #fff; text-decoration: none; border-radius: 5px; margin-left: 85px">Yes</a>
            <a href="delete.php?id=<?=$contact['id']?>&confirm=no" style="display: inline-block; padding: 10px 20px; background-color: #4caf50; color: #fff; text-decoration: none; border-radius: 5px; margin-left: 10px;">No</a>
        </div>
    <?php endif; ?>
</div>

<?=template_footer()?>