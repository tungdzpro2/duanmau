<main>
    <?php
    $idSp;
    $idDm;
    $objSP;
    if (isset($_GET['idSp']) && isset($_GET['idDm'])) {
        $idSp = $_GET['idSp'];
        $idDm = $_GET['idDm'];
        $objSP = getDataCTsp($idSp);

        updateView($idSp);

        if (isset($_POST['btn-add-to-cart'])) {
            $idSp = $_GET['idSp'];
            $sl = $_POST['slSp'];

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            if (array_key_exists($idSp, $_SESSION['cart'])) {
                $_SESSION['cart'][$idSp] += $sl;
            } else {
                $_SESSION['cart'][$idSp] = $sl;
            }

        }

    } else {
        header("location: index.php");
    }


    ?>

    <div class="main-of-ctsp">
        <div class="ctsp">
            <div class="img-and-btns">
                <div class="img">
                    <img src="imgs/<?= $objSP['img'] ?>" alt="" class="img-ctsp">
                </div>
                <form method="post" action="" class="box-content-sp">
                    <h6 class="tensp-ctsp">
                        <?= $objSP['tenSp'] ?>
                    </h6>
                    <div style="padding: 10px; background-color: #f0f0f0;" class="gia"><span style="font-size: 20px;"
                            class="price">
                            <?= $objSP['gia'] ?>
                        </span> VND</div>
                    <div class="sl-sp">
                        <span>Số lượng:</span>
                        <div class="btn">
                            <div class="btn-ad">-</div>
                            <input name="slSp" type="text" id="sl-sp" value="1">
                            <div class="btn-ad">+</div>
                        </div>
                    </div>
                    <div class="btn-b">
                        <button name="btn-add-to-cart" class="btn-add-to-cart"><i style="font-size: 20px;"
                                class='bx bx-cart-alt'></i> ADD TO
                            CART</button>
                        <button class="btn-mua"><i class='bx bxs-truck'></i>MUA HÀNG </button>
                    </div>
                </form>
            </div>
            <div class="sec-mota">
                <h6>Mô tả sản phẩm</h6>
                <div class="mota">
                    <?= $objSP['moTa'] ?>
                </div>
            </div>

        </div>
        <div class="sp-lq">
            <h2 class="title">SẢN PHẨM LIÊN QUAN</h2>
            <div class="list-splq">
                <?php
                $result = getValueSPDMIDEX($idDm, $idSp);
                if ($result != false) {
                    foreach ($result as $splq) { ?>

                        <a href="?action=chitietsanpham&idSp=<?= $splq['idSp'] ?>&idDm=<?= $splq['idDm'] ?>">
                            <img width="150px" src="imgs/<?= $splq['img'] ?>" alt="">
                            <div class="name-splq">
                                <?= $splq['tenSp'] ?>
                            </div>
                        </a>

                        <?php
                    }
                } else { ?>
                    <h2>Không có sản phẩm tương tự!</h2>
                    <?php
                }

                ?>
            </div>
        </div>

        <div class="comment">
            <h3 class="tittle">
                COMMENT
            </h3>
            <form action="model/comment.php?idSp=<?= $idSp ?>&idDm=<?= $idDm ?>" method="post">
                <input name="ndcm" placeholder="your commnent..." type="text" class="input-comment">
                <button class="btn-smcm" name="btnsmcm">SEND</button>
            </form>
            <br>
            <br>
            <div class="tab-cm">
                <?php
                $resultCmtIf = getInfoCMT($idSp);

                if ($resultCmtIf != false) {

                    foreach ($resultCmtIf as $ifCm) { ?>
                        <div class="obj-cm">
                            <img src="imgs/<?= $ifCm['imgUser'] ?>" alt="" class="avt-user"></img>
                            <a href="" class="user-cm">
                                <?= $ifCm['userName'] ?>
                            </a href="">
                            <p style="word-wrap: break-word;" class="nd-cm">
                                <?= $ifCm['content'] ?>
                            </p>
                            <span style="font-size: 10px;" class="post-time">
                                <?= $ifCm['postTime'] ?>
                            </span>
                        </div>
                        <?php
                    }
                } else { ?>

                    <?php
                }

                ?>

            </div>
        </div>

    </div>
    <div class="side">
        <?php include "sidedm.php";
        include "sidetop10.php" ?>
    </div>
</main>
<script>
    const slSpElement = document.querySelector('#sl-sp');
    document.querySelectorAll('.btn-ad').forEach((elm) => {
        elm.addEventListener('click', () => {
            if (elm.innerText == '+') {
                slSpElement.value = Number(slSpElement.value) + 1;
            } else {
                if (slSpElement.value > 1) {
                    slSpElement.value = Number(slSpElement.value) - 1;
                }
            }
        });
    });
</script>