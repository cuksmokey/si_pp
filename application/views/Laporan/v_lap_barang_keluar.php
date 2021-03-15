<section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <ol class="breadcrumb">
                                    <li class="">LAPORAN BARANG KELUAR</li>
                                </ol>
                            </h2>
                        </div>
                        <div class="body">
<div id="box_barang">
    <table style="border:0;width:50%;">
      <tr>
        <th style="border:0;width:12%"></th>
        <th style="border:0;width:1%"></th>
        <th style="border:0;width:12%"></th>
        <th style="border:0;width:3%"></th>
        <th style="border:0;width:12%"></th>
      </tr>
      <tr>
        <td style="padding:0 0 5px">Laporan</td>
        <td style="padding:0 0 5px">:</td>
        <td style="padding:0 0 5px" colspan="3">
        <select name="" id="laporan" class="form-control">
          <option value="0">Pilih...</option>
          <option value="sma">Sinar Mukti Abadi</option>
          <option value="st">Sinar Teknindo</option>
        </select>
        </td>
      </tr>
      <tr>
        <td style="border:0">Tgl Keluar</td>
        <td style="border:0">:</td>
        <td style="border:0"><input type="date" class="form-control" value="" id="tgl1" style="width:100%"></td>
        <td style="border:0;text-align:center">S/d</td>
        <td style="border:0"><input type="date" class="form-control" value="" id="tgl2" style="width:100%"></td>
      </tr>
    </table>

    <!-- cetak barang -->
    <br/><button type="button" onclick="cetak_sj(0)" class="btn btn-default btn-sm waves-effect">
      <i class="material-icons">personal_video</i> CETAK
    </button>&nbsp;
    <button type="button" onclick="cetak_sj(1)" class="btn btn-default btn-sm waves-effect">
      <i class="material-icons">sms</i> EXCEL
    </button>
</div>
<!-- END BARANG -->

<!-- # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # -->

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

  function cetak_sj(ctk){
    tgl1 = $("#tgl1").val();
    tgl2 = $("#tgl2").val();
    stsma = $("#laporan").val();

    if (stsma == 0){
      showNotification("alert-danger", "Pilih Jenis Laporan", "bottom", "center", "", ""); return;
    }

    if (tgl1 == ""){
      showNotification("alert-danger", "Pilih Tanggal Mulai", "bottom", "center", "", ""); return;
    }else if (tgl2 == ""){
      showNotification("alert-danger", "Pilih Tanggal Akhir", "bottom", "center", "", ""); return;
    }

    var url    = "<?php echo base_url('Laporan/BarangKeluar?'); ?>";
    window.open(url+'tgl1='+tgl1+'&tgl2='+tgl2+'&lap='+stsma+'&ctk='+ctk, '_blank');
  }

</script>