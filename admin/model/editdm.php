<?php
    if (isset($_GET['iddm'])) {
        include "../../model/pdo.php";
        include "danhmuc.php";
        if (isset($_POST['btn-editdm'])) {
            reDm($_GET['iddm'], $_POST['dm']);
            header('location: ../?action=create_categories');

        }
    } else {
        header('location: ../?action=create_categories');
    }

?>
<?php
    $dmadmin = getDmADMID($_GET['iddm']);
 ?>
<form action="" method="post">
    <input value="<?=$dmadmin['tenDm']?>" required name="dm" type="text">
    <button name="btn-editdm">Save</button>
</form>