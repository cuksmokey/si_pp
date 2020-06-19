<section class="content">
        <div class="container-fluid">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <ol class="breadcrumb">
                                    <li class="">SURAT JALAN</li>
                                </ol>
                            </h2>

                        </div>

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
                                          
                                          $sql = mysql_query("SELECT a.id AS id,a.tgl AS tgl,a.no_surat AS no_surat,c.nm_perusahaan AS nm_perusahaan FROM m_pl_price_list a
                                          INNER JOIN m_pl_list_barang b ON a.id = b.id_pl_price_list
                                          INNER JOIN m_perusahaan c ON a.kepada = c.id
                                          GROUP BY a.id
                                          ORDER BY a.tgl DESC");
                                          while($data=mysql_fetch_array($sql)) {

                                      ?>

                                      <option value="<?=$data['id']?>"><?=$data['tgl']?> || <?=$data['no_surat']?> || <?=$data['nm_perusahaan']?></option>

                                          <?php } ?>
                                    </select>

                                  </td>
                                  
                                </tr>
                                <tr>
                                  <td colspan="5">
                                    <br>
                                    
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="5">
                                    <br>
                                    
                                  </td>
                                </tr>
                                <tr>
                                  <td align="center" colspan="5">
                                    <button type="button" onclick="cetak(0)" class="btn btn-default btn-sm waves-effect">
                                        <!-- <i class="material-icons">personal_video</i> -->
                                        CETAK SURAT JALAN
                                    </button>
                                    <!-- <button type="button" onclick="cetak(1)" class="btn btn-default btn-sm waves-effect">
                                        <i class="material-icons">print </i>
                                        CETAK PACKING LIST
                                    </button> -->
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

    if (jenis == 0){
      showNotification("alert-info", "PILIH PACKING LIST DAHULU !!!", "top", "center", "", ""); return;
    }

    var url    = "<?php echo base_url('Laporan/Surat_Jalan?'); ?>";
    window.open(url+'jenis='+jenis+'&ctk='+ctk, '_blank');  
    // window.open(url+'ctk='+ctk, '_blank');  

  }

    
</script>