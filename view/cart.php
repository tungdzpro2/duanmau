<?php
// Kiểm tra xem giỏ hàng có tồn tại không
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $carts = $_SESSION['cart'];
    $dataCarts = [];
    foreach ($carts as $index => $cart) {
        $result = getSpid($index);
        $result['soLuong'] = $cart;
        $dataCarts[] = $result;
    }
} else {
    $cart = [];
}

?>

<style>
    .container {
        max-width: 1200px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #333;
    }

    .cart-item {
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .cart-item span {
        margin-left: 20px;
    }

    .empty-cart {
        text-align: center;
        color: #888;
    }
</style>
<div class="container">
    <form action="?action=cart" method="post">

        <h2>Giỏ hàng của bạn</h2>

        <?php if (!empty($dataCarts)): ?>
            <?php foreach ($dataCarts as $index => $c):
                extract($c) ?>
                <div class="cart-item">
                    <span>

                        <img width="50px" src="imgs/<?php echo $img; ?>" alt="">
                    </span>
                    <span>
                        Tên:
                        <?php echo $tenSp; ?>
                    </span>
                    <span>
                        Giá:
                        <?php echo $gia; ?>
                    </span>
                    <span>
                        Số lượng:
                        <?php echo $soLuong; ?>
                    </span>

                    <span>
                        Thành tiền:
                        <div class="gia-sp">
                            <?php echo $soLuong * $gia ?>
                        </div>
                    </span>

                    <span>
                        <a style="color: red;" href="?action=cart&key=<?= $idSp ?>">Xóa</a>
                    </span>
                </div>
                <input name="idSp<?= $index ?>" type="hidden" value="<?= $idSp ?>">
                <input name="slSp<?= $index ?>" type="hidden" value="<?= $soLuong ?>">
                <input name="slCart" type="hidden" value="<?= $index ?>">
            <?php endforeach; ?>
            <div style="margin-top:10px; color: red;">Tổng tiền:<span id="all-gia"></span>vnd</div>

            <button name="order">Đặt hàng</button>
        <?php else: ?>
            <p class="empty-cart">Giỏ hàng trống.</p>
        <?php endif; ?>

    </form>
</div>

<script>
    elmAllGia = document.querySelector('#all-gia');
    TongGiaSps = document.querySelectorAll('.gia-sp');

    elmAllGia.innerText = Array.from(TongGiaSps).reduce((sum, elm) => {
        return sum + Number(elm.innerText);
    }, 0);
</script>