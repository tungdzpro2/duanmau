<h2>SẢN PHẨM MỚI</h2>
    <main>
        <div class="main-body">
            <?php
                foreach(getTenNewProduct() as $prd) {?>
                    <a href="?action=chitietsanpham&idSp=<?=$prd['idSp']?>&idDm=<?=$prd['idDm']?>" class="sp-main">
                        <img src="imgs/<?=$prd['img']?>" alt="">
                        <span class="text-main-body"> <?=$prd['tenSp']?> </span>
                        <div class="price"><?=$prd['gia']?></div>
                    </a>
                <?php
                }
            ?>
        </div>
        <div class="side">
            <?php include "sidedm.php"; include "sidetop10.php" ?>
        </div>
    </main>