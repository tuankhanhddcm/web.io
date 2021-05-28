<div class="main">
    <section class="url-heading">
        <div class="grid">
            <div class="grid__row">
                <div class="col-xs-12">
                    <ul class="url-list">
                        <li class="url-item home">
                            <a href="../home" class="url-link">Trang chủ</a>
                            <span><i class=' right-icon bx bx-chevron-right'></i></span>
                            
                        </li>
                        <li class="url-item">
                            <span class="url-name">So sánh</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="product-detail">
        <div class="grid">
            <div class="grid__row">
               <h3><?=$_SESSION['id']?></h3>
               <h3><?=$_SESSION['id_sosanh']?></h3>
               <?php 
                echo "<pre/>";
                var_dump($data['sp_ht']);
                var_dump($data['sp_ss']);
               ?>
            </div>
        </div>
    </div>
</div>