<?php
    $idDm;
    if (isset($_GET['idDm'])) {
        $idDm = $_GET['idDm'];

    } else {
        header("location: index.php");
    }
    $tenDm = getValueSPDMID($idDm);
    if($tenDm != false) {
        $tenDm = getValueSPDMID($idDm)[0]['tenDm'];
    }else {
        $tenDm = 'Không có sản phẩm';
    }
    
?>
<h2><?=$tenDm?></h2>
<main>
    <div class="main-body">

        <?php
            if(getValueSPDMID($idDm) != false) {

                foreach (getValueSPDMID($idDm) as $spFlDm) { ?>
                    <a href="?action=chitietsanpham&idSp=<?=$spFlDm['idSp']?>&idDm=<?=$spFlDm['idDm']?>" class="sp-main">
                        <img src="imgs/<?= $spFlDm['img'] ?>" alt="">
                        <span class="text-main-body">><?= $spFlDm['tenSp'] ?></span>
                        <div class="price">
                            <?= $spFlDm['gia'] ?>
                        </div>
                    </a>
                    <?php
                }
            }else {?>
                <h3>Không có sản phẩm</h3>
            <?php
            }

        ?>
    </div>
    <div class="side">
        <?php include "sidedm.php";
        include "sidetop10.php" ?>
    </div>
</main>