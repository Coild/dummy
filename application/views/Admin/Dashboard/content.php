 <!-- START OF DASHBOARD CONTENT -->
 <div class="dashboard-container">
     <div class="search-table-container">
         <div class="show-n-row-table">
             <p>Lihat</p>
             <form method="GET" action="<?= base_url('admin_sakip_sulut/') ?>">
                 <select name="banyaknya-data">
                     <option hidden></option>
                     <option value="5">5</option>
                     <option value="10">10</option>
                     <!-- <option value="5">5</option> -->
                 </select>
                 <input type="submit" name="pilih_jum_data" value="Tampilkan">
             </form>

             <?php if (!$year) : ?>
             <?php else : ?>
                 <form class="form-pilih-tahun-evaluasi" method="POST" action="<?= base_url('admin_sakip_sulut/index') ?>">
                     Pilih Tahun
                     <select class="select" name="year" id="pilih-tahun-evaluasi">
                         <?php foreach ($year as $y) : ?>
                             <option value="" selected hidden></option>
                             <option value="<?= $y->year ?>"><?= $y->year ?></option>
                         <?php endforeach ?>
                     </select>
                     <input type="submit" name="pilih_tahun" value="Tampilkan">
                 </form>
             <?php endif ?>
         </div>
         <div class="search-table">
             <form action="<?= base_url('admin_sakip_sulut/index') ?>" method="post">
                 <i class="fa-solid fa-magnifying-glass"></i>
                 <input type="text" name="keyword" placeholder="Ketik Disini" class="search-table-input" autocomplete="off">
                 <input type="submit" name="submit" value="Cari" class="search-table-submit"></input>
             </form>
         </div>
     </div>

     <div class="main-content-dashboard">
         <table class="table-dashboard">
             <!-- DI BAGIAN TABLE SO BOLEH COBA PAKE API FOR DATA DUMMY -->
             <thead>
                 <tr class="header-table-dashboard">
                     <th>Nomor</th>
                     <th>OPD</th>
                     <th>Tahun</th>
                     <th>RPJMD</th>
                     <th>Renstra</th>
                     <th>IKU</th>
                     <th>Renja</th>
                     <th>PK</th>
                     <th>Renaksi</th>
                     <th>Cascading Kinerja</th>
                     <th>Pohon Kinerja</th>
                     <th>Crosscutting</th>
                     <th>Triwulan 1</th>
                     <th>Triwulan 2</th>
                     <th>Triwulan 3</th>
                     <th>Triwulan 4</th>
                     <th>Lakip</th>
                 </tr>

             </thead>
             <tbody>

                 <?php
                    $nomor =  $this->uri->segment(3) ? $this->uri->segment(3) + 1  : 1;
                    foreach ($table as $baris) :
                    ?>
                     <tr class="baris-table-dashboard">
                         <td><?= $nomor ?></td>
                         <td><?= $baris["opd"] ?></td>
                         <td><?= $baris["year"] ?></td>
                         <?php if ($baris['rpjmd'] == true) : ?>
                             <td><i class="	fa-solid fa-circle-check"></i></td>
                         <?php elseif ($baris['rpjmd'] == false) : ?>
                             <td></td>
                         <?php endif ?>
                         <?php if ($baris['renstra'] == true) : ?>
                             <td><i class="	fa-solid fa-circle-check"></i></td>
                         <?php elseif ($baris['renstra'] == false) : ?>
                             <td></td>
                         <?php endif ?>
                         <?php if ($baris['iku'] == true) : ?>
                             <td><i class="	fa-solid fa-circle-check"></i></td>
                         <?php elseif ($baris['iku'] == false) : ?>
                             <td></td>
                         <?php endif ?>
                         <?php if ($baris['renja'] == true) : ?>
                             <td><i class="	fa-solid fa-circle-check"></i></td>
                         <?php elseif ($baris['renja'] == false) : ?>
                             <td></td>
                         <?php endif ?>
                         <?php if ($baris['pk'] == true) : ?>
                             <td><i class="	fa-solid fa-circle-check"></i></td>
                         <?php elseif ($baris['pk'] == false) : ?>
                             <td></td>
                         <?php endif ?>
                         <?php if ($baris['renaksi'] == true) : ?>
                             <td><i class="	fa-solid fa-circle-check"></i></td>
                         <?php elseif ($baris['renaksi'] == false) : ?>
                             <td></td>
                         <?php endif ?>
                         <?php if ($baris['cascading_kinerja'] == true) : ?>
                             <td><i class="	fa-solid fa-circle-check"></i></td>
                         <?php elseif ($baris['cascading_kinerja'] == false) : ?>
                             <td></td>
                         <?php endif ?>
                         <?php if ($baris['pohon_kinerja'] == true) : ?>
                             <td><i class="	fa-solid fa-circle-check"></i></td>
                         <?php elseif ($baris['pohon_kinerja'] == false) : ?>
                             <td></td>
                         <?php endif ?>
                         <?php if ($baris['crosscutting'] == true) : ?>
                             <td><i class="	fa-solid fa-circle-check"></i></td>
                         <?php elseif ($baris['crosscutting'] == false) : ?>
                             <td></td>
                         <?php endif ?>
                         <?php if ($baris['triwulan1'] == true) : ?>
                             <td><i class="	fa-solid fa-circle-check"></i></td>
                         <?php elseif ($baris['triwulan1'] == false) : ?>
                             <td></td>
                         <?php endif ?>
                         <?php if ($baris['triwulan2'] == true) : ?>
                             <td><i class="	fa-solid fa-circle-check"></i></td>
                         <?php elseif ($baris['triwulan2'] == false) : ?>
                             <td></td>
                         <?php endif ?>
                         <?php if ($baris['triwulan3'] == true) : ?>
                             <td><i class="	fa-solid fa-circle-check"></i></td>
                         <?php elseif ($baris['triwulan3'] == false) : ?>
                             <td></td>
                         <?php endif ?>
                         <?php if ($baris['triwulan4'] == true) : ?>
                             <td><i class="	fa-solid fa-circle-check"></i></td>
                         <?php elseif ($baris['triwulan4'] == false) : ?>
                             <td></td>
                         <?php endif ?>
                         <?php if ($baris['lakip'] == true) : ?>
                             <td><i class="	fa-solid fa-circle-check"></i></td>
                         <?php elseif ($baris['lakip'] == false) : ?>
                             <td></td>
                         <?php endif ?>
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
     <!-- END OF MAIN CONTENT CONTAINER -->
 </div>
 <!-- END OF DASHBOARD CONTAINER -->