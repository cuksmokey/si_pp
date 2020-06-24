<section class="content">
        <div class="container-fluid">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <ol class="breadcrumb">
                                    <li class="">UPDATE PO</li>
                                </ol>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="box-data">
                              <table width="80%">
                                <tr>
                                  <td width="15%">
                                      Pilih Perusahaan
                                  </td>
                                  <td>:</td>
                                  <td colspan="3">
                                    <select name="" id="jenis" class="form-control" style="margin: 5px">
                                      <option value="0">Pilih</option>
                                      <?php
                                          include 'connect.php';

                                          $sql = mysql_query("SELECT b.id AS id,b.nm_perusahaan AS nm_perusahaan FROM po_master a
                                          INNER JOIN m_perusahaan b ON a.id_perusahaan = b.id
                                          GROUP BY b.id,b.nm_perusahaan
                                          ORDER BY b.nm_perusahaan ASC");
                                          while($data=mysql_fetch_array($sql)) {
                                      ?>
                                      <option value="<?=$data['id']?>"><?=$data['nm_perusahaan']?></option>
                                          <?php
                                            }
                                          ?>
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
                                        CETAK LAYAR
                                    </button>
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
      showNotification("alert-info", "PILIH PERUSAHAAN TERLEBIH DAHULU!!!", "top", "center", "", ""); return;
    }

    var url    = "<?php echo base_url('Laporan/print_update_po?'); ?>";
    window.open(url+'jenis='+jenis+'&ctk='+ctk, '_blank');  
    // window.open(url+'ctk='+ctk, '_blank');  

  }

    
</script>