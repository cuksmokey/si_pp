<section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <ol class="breadcrumb">
                                    <li class="">LAPORAN BARANG MASUK</li>
                                </ol>
                            </h2>
                        </div>
                        <div class="body">
  <!-- SEMUA -->
  <div id="box_barang_all"><br/>
    <input type="hidden" value="0" id="sid_supplier">
    <table style="border:0;width:50%">
      <tr>
        <td style="border:0;width:12%">Pilih Tanggal</td>
        <td style="border:0;width:1%">:</td>
        <td style="border:0;width:12%"><input type="date" class="form-control" value="" id="tgl1" style="width:100%"></td>
        <td style="border:0;width:3%;text-align:center">S/d</td>
        <td style="border:0;width:12%"><input type="date" class="form-control" value="" id="tgl2" style="width:100%"></td>
      </tr>
    </table>
    <br/><button type="button" onclick="cetak_barang(0)" class="btn btn-default btn-sm waves-effect">
      <i class="material-icons">personal_video</i> CETAK
    </button>&nbsp;
    <button type="button" onclick="cetak_barang(0)" class="btn btn-default btn-sm waves-effect">
      <i class="material-icons">sms</i> EXCEL
    </button>
  </div>
<!-- END BARANG -->

<table width="80%">
  <tr>
    <td colspan="5"><br></td>
  </tr>
  <tr>
    <td colspan="5"><br></td>
  </tr>
</table>
</div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>

<script>

   // cetak barang
   function cetak_barang(ctk){
    
      tgl1 = $("#tgl1").val();
      tgl2 = $("#tgl2").val();
      id_supplier = $("#sid_supplier").val();
    
    if (tgl1 == ""){
      showNotification("alert-info", "Pilih Tanggal Mulai", "bottom", "right", "", ""); return;
    }else if (tgl2 == ""){
      showNotification("alert-info", "Pilih Tanggal Akhir", "bottom", "right", "", ""); return;
    }

    var url    = "<?php echo base_url('Laporan/lap_barang?'); ?>";
    window.open(url+'tgl1='+tgl1+'&tgl2='+tgl2+'&ctk='+ctk, '_blank');

   }

    
</script>