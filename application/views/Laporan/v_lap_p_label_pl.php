<section class="content">
        <div class="container-fluid">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <ol class="breadcrumb">
                                    <li class="">PRINT LABEL PACKING LIST</li>
                                </ol>
                            </h2>
                        </div>

<!-- <style>

  .form-control option {
    background: #eee;
    margin: 10px 0;
  }

</style> -->

                        <div class="body">
                            <div class="box-data">
                              <table width="80%">
                                <tr>
                                  <td width="15%">
                                      Packing List
                                  </td>
                                  <td>:</td>
                                  <td colspan="3">
                                    <select name="" id="jenis" class="form-control" style="margin: 5px">
                                      <option value="0">Pilih Packing List</option>
                                      <?php
                                          include 'connect.php';
                                          $sql = mysql_query("SELECT DISTINCT b.id as id,b.tgl as tgl,b.no_pkb as no,b.nm_perusahaan as np,a.width AS uk,COUNT(*) as tot FROM m_timbangan a
                                                INNER JOIN pl b ON a.id_pl=b.id
                                                GROUP BY id,no,np,uk
                                                ORDER BY tgl,no,np,uk ASC");
                                          while($data=mysql_fetch_array($sql)) {
                                      ?>
                                      <option value="<?=$data['id']?>"><?=$data['id']?> || <?=$data['tgl']?> || <?=$data['no']?> || <?=$data['np']?> || <?=round($data['uk'],2)?> || ( <?=$data['tot']?> )</option>
                                      <?php } ?>
                                    </select>
                                  </td>
                                </tr>
                                <!-- <tr>
                                  <td width="15%">
                                      Periode
                                  </td>
                                  <td>:</td>
                                  <td>
                                    <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" id="tgl1" style="margin: 5px">
                                  </td>
                                  <td align="center">S/d</td>
                                  <td>
                                    <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" id="tgl2" style="margin: 5px">
                                  </td>
                                </tr> -->
                                <tr>
                                  <td colspan="5">
                                    <br>
                                    
                                  </td>
                                </tr>
                                <!-- <tr>
                                  <td width="15%">
                                    <input name="group5" type="radio" id="radio_48" class="with-gap radio-col-black" />
                                      <label for="radio_48">Per Bulan</label>
                                  </td>
                                  <td>:</td>
                                  <td>
                                    <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" id="tgl1">
                                  </td>
                                  <td align="center">S/d</td>
                                  <td>
                                    <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" id="tgl2">
                                  </td>
                                </tr> -->
                                <tr>
                                  <td colspan="5">
                                    <br>
                                    
                                  </td>
                                </tr>
                                <tr>
                                  <td align="center" colspan="5">
                                    <button type="button" onclick="cetak(0)" class="btn btn-default btn-sm waves-effect">
                                        <!-- <i class="material-icons">personal_video</i> -->
                                        CETAK LABEL BESAR
                                    </button>
                                    <button type="button" onclick="cetak(1)" class="btn btn-default btn-sm waves-effect">
                                        <!-- <i class="material-icons">print </i> -->
                                        cetak label kecil
                                    </button>
                                    <!-- <button type="button" onclick="cetak(2)" class="btn btn-default btn-sm waves-effect">
                                        <i class="material-icons">Download</i>
                                        Download
                                    </button> -->
                                  </td>
                                </tr>
                          </table>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

<script>
  
   function cetak(ctk){
    jenis = $("#jenis").val(); 
    // tgl1 = $("#tgl1").val();
    // tgl2 = $("#tgl2").val();

    if (jenis == 0){
      showNotification("alert-info", "PILIH PACKING LIST DAHULU !!!", "top", "center", "", ""); return;
    }
    // else if (tgl2 == ""){
    //   showNotification("alert-info", "Pilih Tanggal Akhir", "bottom", "right", "", ""); return;
    

    var url    = "<?php echo base_url('Laporan/print_lbl_pl?'); ?>";
    window.open(url+'jenis='+jenis+'&ctk='+ctk, '_blank');  

  }

    
</script>