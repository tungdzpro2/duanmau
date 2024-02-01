<?php


if (isset($_GET['ids'])) {
    $stringID = $_GET['ids'];
    $listID = explode(",", $stringID);
    
} else {
    ob_end_clean();
    header("location: ?action=listsanpham");
}
?>
<div class="list-edit">
    <?php 
    $i = 1;
    foreach($listID as $id) {
         
        $datasl = selectSPDMflId($id); 
         ?>
        <form action="model/editsp.php" method="post" enctype="multipart/form-data">
            <h3>Sản phẩm <?=$i?></h3>

            <input name="idsp<?=$i?>" style="display: none;" type="text" value="<?=$datasl['idSp']?>">
            <div>Danh mục:</div>
            <select name="dm<?=$i?>" id="">
                <?php 
                    foreach(getDmADM() as $dm) {?>
                        <option <?=($dm['tenDm'] == $datasl["tenDm"] ? 'selected' : '' )?> value="<?=$dm['idDm']?>"><?=$dm['tenDm']?></option>
                    <?php
                    }
                ?>
            </select> 
            <div>Tên sản phẩm:</div>
            <textarea name="tensp<?=$i?>" style="width: 500px;" class="tenSp"><?=$datasl['tenSp']?></textarea>
            <div>Mô tả:</div>
            <textarea name="mota<?=$i?>" style="width: 500px; height: 200px;" class="tenSp"><?=$datasl['moTa']?></textarea>
            <div>Ảnh:</div>
            <img src="../imgs/<?=$datasl['img']?>" alt="" width=300px>
            <input style="display: none;" name="imgname<?=$i?>" type="text" value="<?=$datasl['img']?>">
            <input type="file" name="fileimg<?=$i?>" >
            <div class="gia">Giá:</div>
            <input name="gia<?=$i?>" type="number" value="<?=$datasl['gia']?>">
        

     <?php $i++;
     
    } 
     ?>
     <button name="btnedit" value="<?=$i-1?>">Thay Đổi</button>
     </form>

</div>