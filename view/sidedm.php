<div class="side-type">
                <h3>DANH MỤC</h3>
                <ul>
                    <?php
                       
                        foreach(getValueDM() as $dm) {?>
                            <li><a href="?action=danhmucsanpham&idDm=<?=$dm['idDm']?>"> <?=$dm['tenDm']?></a></li>
                        <?php
                        }
                    ?>
                </ul>
            </div>