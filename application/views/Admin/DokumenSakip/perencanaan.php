<div class="perencanaan-kinerja-container ">
    <div class="search-table-container">
        <div class="show-n-row-table">
            <p>Lihat</p>

            <form method="GET" action="<?= base_url('admin_sakip_sulut/perencanaan_kinerja') ?>">
                <select name="banyaknya-data">
                    <option hidden></option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <!-- <option value="5">5</option> -->
                </select>
                <input type="submit" name="pilih_jum_data" value="Tampilkan">
            </form>

        </div>
        <div class="search-table">
            <form action="<?= base_url('admin_sakip_sulut/perencanaan_kinerja') ?>" method="post">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="keyword" placeholder="Ketik Disini" class="search-table-input" autocomplete="off">
                <input type="submit" name="submit" value="Cari" class="search-table-submit"></input>
            </form>
        </div>
    </div>
    <div class="main-content-perencanaan-kinerja">
        <table class="table-perencanaan">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Pengirim</th>
                    <th>Jenis Dokumen</th>
                    <th>Nama dokumen</th>
                    <th>Waktu Pengiriman</th>
                    <th>Download</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $nomor =  $this->uri->segment(3) ? $this->uri->segment(3) + 1  : 1;

                foreach ($data as $baris) :
                ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td><?= $baris['opd'] ?></td>
                        <td><?= $baris['jenis_dok'] ?></td>
                        <td><?= $baris['nama_dok'] ?></td>
                        <td><?= $baris['date'] ?></td>
                        <td><a class="fa-solid fa-download" href="<?= base_url(); ?>download/download/<?= $baris['id'] ?>"></a></td>
                        <!-- <td><i class="<?= $baris['pk_perubahan'] ?>"></i></td> -->
                    </tr>
                <?php
                    $nomor++;
                endforeach;
                ?>
            </tbody>
        </table>

        <div class="footer-for-pagination">
            <div class="button-pagination">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>
</div>