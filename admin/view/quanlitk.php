<h3>Quản lí tài khoản</h3>
<table id="table-qlitk" border="1">
    <thead>
        <tr>
            <td>STT</td>
            <td>Vai trò</td>
            <td>User Name</td>
            <td>Email</td>
            <td>Password</td>
            <td>Trạng thái</td>
            <td colspan="2">Hành động</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach (getUserDtb() as $ifUser) { ?>
            <tr>
                <td>
                    <?= $i ?>
                </td>
                <td>
                    <?= $ifUser['rank'] ?>
                </td>
                <td>
                    <?= $ifUser['userName'] ?>
                </td>
                <td>
                    <?= $ifUser['mail'] ?>
                </td>
                <td>
                    <?= $ifUser['passwordUser'] ?>
                </td>
                <td>
                    <?= ($ifUser['role'] ? "Hoạt động<i style='font-size: 10px; color: green;' class='bx bxs-circle'></i>  " : "Vô hiệu hóa <i style='font-size: 10px; color: red;' class='bx bxs-circle'></i>") ?>
                </td>
                <td>
                    <?php if ($ifUser['rank'] !== "admin"): ?>
                        <?php if ($ifUser['role'] == 1): ?>
                            <a href="model/vohieuhoatk.php?idUser=<?= $ifUser['idUser'] ?>">Vô hiệu hóa</a>
                        <?php else: ?>
                            <a href="model/huyvohieuhoatk.php?idUser=<?= $ifUser['idUser'] ?>">Hủy vô hiệu hóa</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?= ($ifUser['rank'] == "admin" ? "" : '<a onclick="return confirm(\'Bạn có muốn xóa không?\')" href="model/deletetk.php?idUser=' . $ifUser['idUser'] . '">Xóa tài khoản</a>') ?>
                </td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </tbody>
</table>
