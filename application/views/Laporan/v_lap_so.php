<section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <ol class="breadcrumb">
                                    <li class="">LAPORAN SURAT ORDER</li>
                                </ol>
                            </h2>
                        </div>
                        <div class="body">

<!-- SURAT JALAN -->
<div id="box_barang">
    <!-- tampil data -->
    <table style="border:0;width:50%;">
      <tr>
        <th style="border:0;width:12%"></th>
        <th style="border:0;width:1%"></th>
        <th style="border:0;width:12%"></th>
        <th style="border:0;width:3%"></th>
        <th style="border:0;width:12%"></th>
      </tr>
      <tr>
        <td style="padding:10px" colspan="5"></td>
      </tr>
      <tr>
        <td>Pilih</td>
        <td>:</td>
        <td colspan="3"><select class="form-control" id="pilih_pl_sj" style="width:100%"></select></td>
      </tr>
      <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td colspan="3">
          <input type="text" id="tgl_pl_sj" autocomplete="off" class="form-control" disabled="true" style="background:#ddd">
        </td>
      </tr>
      <tr>
        <td>No Surat Jalan</td>
        <td>:</td>
        <td colspan="3">
          <input type="text" id="no_surat" autocomplete="off" class="form-control" disabled="true" style="background:#ddd">
          <input type="hidden" value="" id="id_pl_sj">
        </td>
      </tr>
      <tr>
        <td>No SO</td>
        <td>:</td>
        <td colspan="3">
          <input type="text" id="no_so" autocomplete="off" class="form-control" disabled="true" style="background:#ddd">
        </td>
      </tr>
      <tr>
        <td>Kepada</td>
        <td>:</td>
        <td colspan="3">
          <input type="text" id="kepada" autocomplete="off" class="form-control" disabled="true" style="background:#ddd">
        </td>
      </tr>
    </table>

    <!-- cetak barang -->
    <br/><button type="button" onclick="cetak_sj(0)" class="btn btn-default btn-sm waves-effect">
      <i class="material-icons">personal_video</i> CETAK
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

  $(document).ready(function() {
    load_p_sj();
  });

  //#####################################################################

  // load surat jalan packing list
  function load_p_sj(){
    $('#pilih_pl_sj').select2({
      // minimumInputLength: 3,
      allowClear: true,
      placeholder: 'SELECT',
      ajax: {
        dataType: 'json',
        url      : '<?php echo base_url(); ?>/Master/load_so',
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

  // load barang
  $('#pilih_pl_sj').on('change', function() {
    data = $('#pilih_pl_sj').select2('data');
    $("#id_pl_sj").val(data[0].id);
    $("#tgl_pl_sj").val(data[0].tgl);
    $("#kepada").val(data[0].nm_perusahaan);
    $("#no_surat").val(data[0].no_surat);
    $("#no_so").val(data[0].no_so);
  });

  function cetak_sj(ctk){
    jenis = $("#id_pl_sj").val(); 

    if (jenis == ""){
      showNotification("alert-info", "PILIH PT / PACKING LIST DAHULU !!!", "top", "center", "", ""); return;
    }

    var url    = "<?php echo base_url('Laporan/Lap_SO?'); ?>";
    window.open(url+'jenis='+jenis+'&ctk='+ctk, '_blank');
  }

</script>