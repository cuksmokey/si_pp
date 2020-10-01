<section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <ol class="breadcrumb">
                                    <li class="">LAPORAN PIUTANG</li>
                                </ol>
                            </h2>
                        </div>
                        <div class="body">

<div class="box-data">

<!-- # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # -->

<!-- REKAP -->
<div id="box_rekap_barang">
<table style="border:0;width:50%;">
  <tr>
    <th style="border:0;width:12%"></th>
    <th style="border:0;width:1%"></th>
    <th style="border:0;width:12%"></th>
    <th style="border:0;width:3%"></th>
    <th style="border:0;width:12%"></th>
  </tr>
  <tr>
    <td>Pilih</td>
    <td>:</td>
    <td colspan="3"><select class="form-control" id="pilih_cust" style="width:100%"></select></td>
  </tr>
  <tr>
    <td>Customer</td>
    <td>:</td>
    <td colspan="3">
      <input type="text" id="text_cust" autocomplete="off" class="form-control" disabled="true" style="background:#ddd">
      <input type="hidden" value="" id="id_cust">
    </td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td style="padding:0 0 5px" colspan="3"><b>NOTE:</b> Kolom Customer Kosong, Cetak Semua Customer</td>
  </tr>
  <tr>
    <td>Tgl Cetak</td>
    <td>:</td>
    <td><input type="date" class="form-control" value="" id="tgl1_rekap_barang"></td>
    <td style="text-align:center">s/d</td>
    <td><input type="date" class="form-control" value="" id="tgl2_rekap_barang"></td>
  </tr>
</table>

<!-- cetak rekap sj -->
<br/><button type="button" onclick="cetak_rekap(0)" class="btn btn-default btn-sm waves-effect">
  <i class="material-icons">personal_video</i> CETAK
</button>&nbsp;
    <button type="button" onclick="cetak_rekap(1)" class="btn btn-default btn-sm waves-effect">
      <i class="material-icons">sms</i> EXCEL
    </button>
</div>
<!-- END REKAP -->

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

  $(document).ready(function() {
    load_p_cust();
  });

  //#####################################################################

  // load nota 
  function load_p_cust(){
  $('#pilih_cust').select2({
    // minimumInputLength: 3,
    allowClear: true,
    placeholder: 'SELECT',
    ajax: {
      dataType: 'json',
      url      : '<?php echo base_url(); ?>/Master/laod_p_cust',
      delay: 800,
      data: function(params) {
        if (params.term == undefined) {
          return {
            search: ""
          }  
        }else{
          return {
            search: params.term
          }
        }
      },
      processResults: function (data, page) {
      return {
        results: data
      };
    },
    }
  });
 }

  // load nota
  $('#pilih_cust').on('change', function() {
    data = $('#pilih_cust').select2('data');
    $("#id_cust").val(data[0].id);
    $("#text_cust").val(data[0].nm_perusahaan);
  });

  function cetak_rekap(ctk){
    tgl1 = $("#tgl1_rekap_barang").val(); 
    tgl2 = $("#tgl2_rekap_barang").val(); 
    jenis = $("#id_cust").val(); 

    if (jenis == 0 || jenis == "" || jenis == null){
      xjenis = 0;
    }else{
      xjenis = jenis;
    }

    if (tgl1 == ""){
      showNotification("alert-info", "Pilih Tanggal Mulai", "bottom", "right", "", ""); return;
    }else if (tgl2 == ""){
      showNotification("alert-info", "Pilih Tanggal Akhir", "bottom", "right", "", ""); return;
    }

    var url    = "<?php echo base_url('Laporan/Piutang?'); ?>";
    window.open(url+'ctk='+ctk+'&tgl1='+tgl1+'&tgl2='+tgl2+'&jenis='+xjenis, '_blank');
  }
</script>