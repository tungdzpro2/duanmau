<div class="main-listSP">
    <div class="table-list">

        <h3>Danh sách sản phẩm</h3>
        <div class="filter">
            <h4>Bộ lọc:</h4>
            
            <span>Danh mục:</span>
            <select name="" id="dmsp">
                <option value="All">All</option>
                <?php
                foreach (getDmADM() as $dm) { ?>
                    <option value="<?= $dm['idDm'] ?>">
                        <?= $dm['tenDm'] ?>
                    </option>
                    <?php
                }
                ?>
            </select>

            <span>Sort giá:</span>
            <select name="" id="sortprice">
                <option value="tang">Tăng dần</option>
                <option value="giam">Giảm dần</option>
            </select>

            <span>Sort view:</span>
            <select name="" id="sortview">
                <option value="tang">Tăng dần</option>
                <option value="giam">Giảm dần</option>
            </select>

        </div>

        <div class="search-box">
            <input type="text" id="search-input" placeholder="Tìm kiếm...">
            <div id="search-tensp"><i class='bx bx-search-alt'></i></div>
        </div>

        <table border="1" id="table">
            <thead>
                <tr>
                    <td></td>
                    <td>Stt</td>
                    <td>Danh mục</td>
                    <td>Tên sản phẩm</td>
                    <td>Mô tả</td>
                    <td>Ảnh</td>
                    <td>Giá</td>
                    <td>View</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach (getDtTable() as $vl) { ?>
                    <tr idSp="<?= $vl['idSp'] ?>" class="tr">
                        <td><input class="clickSp" type="checkbox" name="" id=""></td>
                        <td>
                            <?= $i ?>
                        </td>
                        <td  class="nameDmtd sl<?=$vl['idDm']?>">
                            <?= $vl['tenDm'] ?>
                        </td>
                        <td class="nameSp">
                            <?= $vl['tenSp'] ?>
                        </td>
                        <td>
                            <div class="mt">
                                <?= $vl['moTa'] ?>
                            </div> <span class="show-more">Xem thêm</span><span class="hidden">hidden</span>
                        </td>
                        <td><img width="50px" src="../imgs/<?= $vl['img'] ?>" alt=""></td>
                        <td textContent="price">
                            <?= $vl['gia'] ?>
                        </td>
                        <td textContent="view">
                            <?= $vl['view'] ?>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
        <h3>Action</h3>
        <button class="action" id="clickAll">Chọn tất cả <i class='bx bx-select-multiple'></i></button>
        <button class="action" id="cancelAll">Hủy tất cả <i class='bx bx-square-rounded'></i></button>
        <button class="action" id="edit">Sửa <i class='bx bx-edit-alt'></i></button>
        <button class="action" id="delete">Xóa <i class='bx bx-message-alt-x'></i></button>


    </div>
    <div class="thongke-sp">
    <h3>Thống kê sản phẩm <i class='bx bx-bar-chart'></i></h3>
    <div class="thongke-flex">
        <div class="chartsDm">
            <h4>Sản phẩm theo danh mục</h4>
            <div class="char-dm">
                <span id="labelDm" style="display: none;">
                    <?php
                    foreach (getDataDm() as $dtdm) { ?>
                        <span class="labelDm">
                            <?= $dtdm['tenDm'] ?>
                        </span>
                    <?php }
                    ?>
                </span>
                <span id="dataDm" style="display: none;">
                    <?php
                    foreach (getDataDm() as $dtdm) { ?>
                        <span class="dataDm">
                            <?= $dtdm['SoLuongSanPham'] ?>
                        </span>
                    <?php }
                    ?>
                </span>
                <div style="width: 300px;">
                    <canvas id="chartDm"></canvas>
                </div>
            </div>
        </div>

        <div class="chartsDm">
            
            <div style="width: 700px;">
                <canvas id="chartDm2"></canvas>
            </div>
        </div>
    </div>
</div>


</div>
<?php

?>