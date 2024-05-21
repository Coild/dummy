<div class="informasi-user-container">
    <div class="main-content-informasi-user">
        <div class="the-base">
            <div class="daftar-pesan-diterima-user">
                <?php if (!$info) : ?>
                    <h2 class="tidak-ada-pesan">Belum ada pesan apapun...</h2>
                <?php else : ?>
                    <?php
                    foreach ($info as $i) :
                    ?>
                        <div class="pesan-terkirim">
                            <?php if ($i->file) : ?>
                                <h5 class="user-pengirim">Admin Sakip <a style="color:#46b5d1; font-size:16px; margin-left: 5px" href="<?= base_url() ?>Download/download_info/<?= $i->id ?>">
                                        <i class="fa-solid fa-file-arrow-down"></i>
                                    </a></h5>
                            <?php else : ?>
                                <h5 class="user-pengirim">Admin Sakip</h5>
                            <?php endif ?>
                            <p><?= $i->informasi ?></p>
                            <h5><?= $i->date_sended ?></h5>
                        </div>
                        <hr>
                    <?php
                    endforeach;
                    ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>