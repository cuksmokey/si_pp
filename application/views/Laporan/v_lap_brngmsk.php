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
        <th style="border:0;width:12%"></th>
        <th style="border:0;width:1%"></th>
        <th style="border:0;width:12%"></th>
        <th style="border:0;width:3%"></th>
        <th style="border:0;width:12%"></th>
      </tr>
      <tr>
        <td>Pilih</td>
        <td>:</td>
        <td colspan="3"><select class="form-control" id="supplier" style="width:100%"></select></td>
      </tr>
      <tr>
        <td>Supplier</td>
        <td>:</td>
        <td colspan="3">
          <input type="text" id="supplier_note" autocomplete="off" class="form-control" disabled="true" style="background:#ddd">
          <input type="hidden" value="" id="id_supplier">
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td style="padding:0 0 5px" colspan="3"><b>NOTE:</b> Kolom Supplier Kosong, Cetak Semua Supplier</td>
      </tr>
      <tr>
        <td style="border:0">Pilih Tanggal</td>
        <td style="border:0">:</td>
        <td style="border:0"><input type="date" class="form-control" value="" id="tgl1" style="width:100%"></td>
        <td style="border:0;text-align:center">S/d</td>
        <td style="border:0"><input type="date" class="form-control" value="" id="tgl2" style="width:100%"></td>
      </tr>
    </table>
    <br/><button type="button" onclick="cetak_barang(0)" class="btn btn-default btn-sm waves-effect">
      <i class="material-icons">personal_video</i> CETAK
    </button>&nbsp;
    <button type="button" onclick="cetak_barang(1)" class="btn btn-default btn-sm waves-effect">
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

$(document).ready(function() {
    load_supplier();
  });

  // load barang supplier
  function load_supplier(){
    $('#supplier').select2({
      // minimumInputLength: 3,
      allowClear: true,
      placeholder: 'SELECT',
      ajax: {
        dataType: 'json',
        url      : '<?php echo base_url(); ?>/Master/laod_supplier',
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
  $('#supplier').on('change', function() {
    data = $('#supplier').select2('data');
    $("#id_supplier").val(data[0].id_supplier);
    $("#supplier_note").val(data[0].text);
  });

   // cetak barang
   function cetak_barang(ctk){
    
      tgl1 = $("#tgl1").val();
      tgl2 = $("#tgl2").val();
      id_supplier = $("#id_supplier").val();
    
      if (tgl1 == ""){
        showNotification("alert-info", "Pilih Tanggal Mulai", "bottom", "right", "", ""); return;
      }else if (tgl2 == ""){
        showNotification("alert-info", "Pilih Tanggal Akhir", "bottom", "right", "", ""); return;
      }

      if (id_supplier == 0 || id_supplier == "" || id_supplier == null){
        xid_supplier = 0;
      }else{
        xid_supplier = id_supplier;
      }

      var url    = "<?php echo base_url('Laporan/LapBarangMasuk?'); ?>";
      window.open(url+'tgl1='+tgl1+'&tgl2='+tgl2+'&jenis='+xid_supplier+'&ctk='+ctk, '_blank');

   }

    
</script>