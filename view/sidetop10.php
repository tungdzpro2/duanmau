<div class="side-topsp">
                <h3>TOP 10 SẢN PHẨM BÁN CHẠY</h3>
                <ul>
                    <?php
                        foreach(top10Sp() as $t10)  {?>
                        <li>
                            <a href="?action=chitietsanpham&idSp=<?=$t10['idSp']?>&idDm=<?=$t10['idDm']?>">
                                <img width="50px" src="./imgs/<?=$t10['img']?>" alt="">
                                <span> <?=$t10['tenSp']?> </span>
                                
                            </a>
                          
                        </li>
                        <?php
                        }
                    ?>
                </ul>
                </div>