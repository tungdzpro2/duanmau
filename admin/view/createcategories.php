<?php
    if(isset($_POST['btn-crdm'])) {
        $dm = $_POST['dm'];
        insertDanhMuc($dm);
    }
?>
<h3>danh mục</h3>
<div class="form-create">
    <section class="container">
        <header>Tạo danh mục</header>
        <form action="" method="post" class="form">
            <div class="input-box">
                <label>Tên danh mục</label>
                <input name="dm" type="text" placeholder="Tên danh mục" required />
            </div> 
            <button name="btn-crdm">Create</button>
        </form>
    </section>
    <div id="table-categories">
        <h3>Bảng danh mục <i class='bx bx-table'></i></h3>
        <table border="1">
            <thead>
                <tr>
                    <td>STT</td>
                    <td>Tên danh mục</td>
                    <td colspan="2">Hành động</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    $i = 1;
                    foreach(getDmADM() as $dm) {?>

                        <tr>
                            <td><?=$i?></td>
                            <td><?=$dm['tenDm']?></td>
                            <td><a href="model/editdm.php?iddm=<?=$dm['idDm']?>">Sửa <i class='bx bx-edit-alt'></i></a></td>
                            <td><a onclick="return confirm('Bạn có muốn xóa không?')" href="model/deletedm.php?iddm=<?=$dm['idDm']?>">Xóa <i class='bx bx-message-alt-x'></i></a></td>
                        </tr>
                    <?php
                    $i++; }
                ?>
            </tbody>
        </table>
    </div>
</div>