<?php 
    $ifUser = getIfUserFlMail($_GET['mail'])['userName'];
    $email = getIfUserFlMail($_GET['mail'])['mail']; 


    $form = '<form action="" method="post">
        <div>user:'.$ifUser.'</div>
        <div>email:'.$email.'</div>
        <input type="text" name="code" id="">
        <button name="btn-send">Enter code</button>
    </form>';

    function changePass($newPass,$email) {
        $sql = "UPDATE `userdata` SET
         `passwordUser`='$newPass' WHERE mail = '$email'";
         executeSQL($sql);
    
    }
    function checkCode($mail, $code) {
        
        $sql = "SELECT * FROM `userdata` 
        INNER JOIN resetcode on userdata.idCode = resetcode.idCode 
        WHERE mail = '$mail' and contentCode = '$code' ";
        if(queryOneSQL($sql)) {
            return true;
        }
        return false;
    }

    if(isset($_POST["btn-change"])) {
        $newPass = $_POST['newpass'];
        changePass($newPass,$_GET['mail']);
        $form = "thay doi mk thanh cong";
    } 

    if(isset($_POST['btn-send'])) {
        $code = $_POST['code'];
        if(checkCode($_GET['mail'], $code)) {
            $form = '<form action="" method="post">
                        <label for="">nhap password moi:</label>
                        <input type="text" name="newpass">
                        <button name="btn-change">change</button>
                    </form>';
        }else {
            echo "ma sai!";
        }
    }   
?>
<?=$form?>



