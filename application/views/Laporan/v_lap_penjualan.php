<section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <ol class="breadcrumb">
                                    <li class="">LAPORAN PENJUALAN</li>
                                </ol>
                            </h2>
                        </div>
                        <div class="body">

<div class="box-data">
<button style="background:#ddd;padding:8px 10px;color:#000;border:0" id="btn_barang">SURAT JALAN</button>
<button style="background:#ddd;padding:8px 10px;color:#000;border:0" id="btn_nota">NOTA PENJUALAN</button>
<br><br>

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
        <td>PT</td>
        <td>:</td>
        <td colspan="3">
        <select name="" id="logo" class="form-control" style="margin: 5px">
          <option value="0">Pilih...</option>
          <option value="sma">Sinar Mukti Abadi</option>
          <option value="st">Sinar Teknindo</option>
        </select>
        </td>
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

<!-- NO NOTA -->
<div id="box_nota">
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
    <td>PT</td>
    <td>:</td>
    <td colspan="3">
    <select name="" id="logo_nota" class="form-control" style="margin: 5px">
      <option value="0">Pilih...</option>
      <option value="sma">Sinar Mukti Abadi</option>
      <option value="st">Sinar Teknindo</option>
    </select>
    </td>
  </tr>
  <tr>
    <td style="padding:10px" colspan="5"></td>
  </tr>
  <tr>
    <td>Pilih</td>
    <td>:</td>
    <td colspan="3"><select class="form-control" id="pilih_pl_nota" style="width:100%"></select></td>
  </tr>
  <tr>
    <td>Tanggal</td>
    <td>:</td>
    <td colspan="3">
      <input type="text" id="tgl_pl_nota" autocomplete="off" class="form-control" disabled="true" style="background:#ddd">
    </td>
  </tr>
  <tr>
    <td>No Nota</td>
    <td>:</td>
    <td colspan="3">
      <input type="text" id="no_nota" autocomplete="off" class="form-control" disabled="true" style="background:#ddd">
      <input type="hidden" value="" id="id_pl_nota">
    </td>
  </tr>
  <tr>
    <td>No PO</td>
    <td>:</td>
    <td colspan="3">
      <input type="text" id="no_po" autocomplete="off" class="form-control" disabled="true" style="background:#ddd">
    </td>
  </tr>
  <tr>
    <td>Kepada</td>
    <td>:</td>
    <td colspan="3">
      <input type="text" id="kepada_nota" autocomplete="off" class="form-control" disabled="true" style="background:#ddd">
    </td>
  </tr>
</table>

<!-- cetak nota -->
<br/><button type="button" onclick="cetak_nota(0)" class="btn btn-default btn-sm waves-effect">
  <i class="material-icons">personal_video</i> CETAK
</button>
</div>
<!-- END NO NOT -->

<!-- # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # -->

<!-- REKAP -->
<div id="box_rekap">
  rekap
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
    load_p_sj();
    load_p_nota();
    $("#box_barang").hide();
    $("#box_barang_all").hide();
    $("#box_barang_supplier").hide();
    $("#box_nota").hide();
    $("#box_rekap").hide();
  
  //#####################################################################

    // barang
    $("#btn_barang").click(function() {
      $("#btn_barang").attr('style','background:#287FB8;padding:8px 10px;color:#fff;border:0');
      $("#btn_nota").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');

      $("#box_barang").show();
      $("#box_nota").hide();

      $("#logo").val("");
      $("#id_pl_sj").val("");
      $("#tgl_pl_sj").val("");
      $("#kepada").val("");
      $("#no_surat").val("");
      $("#no_so").val("");
    });    

  //#####################################################################

    // nota
      $("#btn_nota").click(function() {
      $("#btn_barang").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');
      $("#btn_nota").attr('style','background:#287FB8;padding:8px 10px;color:#fff;border:0');

      $("#box_barang").hide();
      $("#box_nota").show();

      $("#logo_nota").val("");
      $("#id_pl_nota").val("");
      $("#tgl_pl_nota").val("");
      $("#kepada_nota").val("");
      $("#no_nota").val("");
      $("#no_po").val("");
    });
  });

  // load surat jalan packing list
  function load_p_sj(){
    $('#pilih_pl_sj').select2({
      // minimumInputLength: 3,
      allowClear: true,
      placeholder: 'SELECT',
      ajax: {
        dataType: 'json',
        url      : '<?php echo base_url(); ?>/Master/laod_p_sj',
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
    pt = $("#logo").val(); 

    if (jenis == "" || pt == 0){
      showNotification("alert-info", "PILIH PT / PACKING LIST DAHULU !!!", "top", "center", "", ""); return;
    }

    var url    = "<?php echo base_url('Laporan/Surat_Jalan?'); ?>";
    window.open(url+'jenis='+jenis+'&ctk='+ctk+'&pt='+pt, '_blank');

  }

/////////////////////////////////////////////////////////////////////
  
// load nota 
  function load_p_nota(){
  $('#pilih_pl_nota').select2({
    // minimumInputLength: 3,
    allowClear: true,
    placeholder: 'SELECT',
    ajax: {
      dataType: 'json',
      url      : '<?php echo base_url(); ?>/Master/laod_p_nota',
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
  $('#pilih_pl_nota').on('change', function() {
    data = $('#pilih_pl_nota').select2('data');
    $("#id_pl_nota").val(data[0].id);
    $("#tgl_pl_nota").val(data[0].jt_nota);
    $("#kepada_nota").val(data[0].nm_perusahaan);
    $("#no_nota").val(data[0].no_nota);
    $("#no_po").val(data[0].no_po);
  });

  function cetak_nota(ctk){
    jenis = $("#id_pl_nota").val(); 
    pt = $("#logo_nota").val(); 

    if (jenis == "" || pt == 0){
      showNotification("alert-info", "PILIH PT / PACKING LIST DAHULU !!!", "top", "center", "", ""); return;
    }

    var url    = "<?php echo base_url('Laporan/Nota_Penjualan?'); ?>";
    window.open(url+'jenis='+jenis+'&ctk='+ctk+'&pt='+pt, '_blank');

  }
</script>