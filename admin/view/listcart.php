<h3>Quản lí tài khoản</h3>
<table id="table-qlitk" border="1">
    <thead>
        <tr>
            <td>STT</td>
            <td>User</td>
            <td>Ảnh</td>
            <td>Tên sản phẩm</td>
            <td>Số lượng đặt</td>
            <td>Giá</td>
            <td>Tổng</td>
            <td>Ngày đặt</td>
            <td colspan="2">Hành động</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach (getInfoOrders() as $ifOd) { ?>
            <tr>
                <td>
                    <?= $i ?>
                </td>
                <td>
                    <?= $ifOd['userName'] ?>
                </td>
                <td>
                    <img width="50" src="../imgs/<?= $ifOd['img'] ?>" alt=""> 
                </td>
                <td>
                    <?=$ifOd['tenSp']?>
                </td>
                <td>
                    <?= $ifOd['soLuong'] ?>
                </td>
                <td>
                    <?= $ifOd['gia'] ?>
                </td>
                <td>
                    <?= $ifOd['soLuong'] * $ifOd['gia'] ?> 
                </td>

                <td>
                    <?= $ifOd['ngayDat'] ?>
                </td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </tbody>
</table>