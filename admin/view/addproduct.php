<?php
    $id;
if(!isset($_COOKIE['cookieSp24'])) {
    $id = getidSPthemost();
    setcookie("cookieSp24","$id",strtotime('tomorrow midnight'));
    echo "<script>
    window.location.reload();
    </script>";
};
if (isset($_POST['btn-add'])) {
    $iddm = $_POST['dm'];
    $tensp = $_POST['tensp'];
    $mota = $_POST['mota'];
    $FILE = $_FILES['imgfile'];
    $gia = $_POST['gia'];
    $nameimg = $FILE['name'];

    $targetSave = "../imgs/";
    move_uploaded_file($FILE['tmp_name'], $targetSave . $nameimg);
    insertSanPham($iddm, $tensp, $mota, $nameimg, $gia);
}
?>
<h3>Thêm sản phẩm</h3>
<div class="add-product">
    <div class="form-create">
        <section style="height: 100%;" class="container">
            <header>Add product</header>
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <select name="dm" id="">
                    <?php
                    foreach (getDmADM() as $dm) { ?>
                        <option value="<?= $dm['idDm'] ?>">
                            <?= $dm['tenDm'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <div class="input-box">
                    <label>Tên sản phẩm:</label>
                    <input name="tensp" type="text" placeholder="Tên sản phẩm" required />
                </div>
                <div class="input-box">
                    <div>Mô tả:</div>
                    <textarea name="mota" id="" cols="60" rows="3"></textarea>
                </div>

                <div class="input-box">
                    <div>Ảnh:</div>
                    <input type="file" name="imgfile" id="">
                </div>
                <div class="input-box">
                    <label>Giá:</label>
                    <input name="gia" type="text" placeholder="Giá" required />
                </div>
                <button name="btn-add">Submit</button>
            </form>
        </section>

        <div id="table-categories">
            <h3>Sản phẩm thêm mới trong ngày <i class='bx bx-table'></i></h3>
            <table border="1">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Tên sản phẩm</td>
                        <td colspan="2">Hành động nhanh</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                  
                    if(getSanPhampsNewInDay($_COOKIE['cookieSp24']) != false) {
                        $i = 1;
                        foreach (getSanPhampsNewInDay($_COOKIE['cookieSp24']) as $sp) { ?>
    
                            <tr>
                                <td>
                                    <?= $i ?>
                                </td>
                                <td>
                                    <?= $sp['tenSp'] ?>
                                </td>
                                <td><a href="./?action=editsppage&ids=<?= $sp['idSp'] ?>">Sửa <i class='bx bx-edit-alt'></i></a></td>
                                <td><a onclick="return confirm('Bạn có muốn xóa không?')" href="model/deletesp.php?idSp=<?= $sp['idSp'] ?>">Xóa <i class='bx bx-message-alt-x'></i></a></td>
                            </tr>
                            <?php
                            $i++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>