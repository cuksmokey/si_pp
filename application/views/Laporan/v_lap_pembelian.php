<section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <ol class="breadcrumb">
                                    <li class="">LAPORAN PEMBELIAN</li>
                                </ol>
                            </h2>
                        </div>
                        <div class="body">

<div class="box-data">
<button style="background:#ddd;padding:8px 10px;color:#000;border:0" id="btn_barang">BARANG</button>
<button style="background:#ddd;padding:8px 10px;color:#000;border:0" id="btn_nota">TOTAL PEMBELIAN</button>
<!-- <button style="background:#ddd;padding:8px 10px;color:#000;border:0" id="btn_rekap">REKAP HARIAN BULANAN</button> -->
<br><br>

<!-- BARANG -->
<div id="box_barang">
  <div>LAPORAN BARANG</div><br/>
  <button style="background:#ddd;padding:8px 10px;color:#000;border:0" id="btn_barang_all">SEMUA</button>
  <button style="background:#ddd;padding:8px 10px;color:#000;border:0" id="btn_barang_supplier">PER SUPPLIER</button>

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
    <br/><button type="button" onclick="cetak_barang(0,0)" class="btn btn-default btn-sm waves-effect">
      <i class="material-icons">personal_video</i> CETAK
    </button>&nbsp;
    <button type="button" onclick="cetak_barang(1,0)" class="btn btn-default btn-sm waves-effect">
      <i class="material-icons">sms</i> EXCEL
    </button>
  </div>

  <!-- PER SUPPLIER -->
  <div id="box_barang_supplier"><br/>

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
        <td>Pilih Tanggal</td>
        <td>:</td>
        <td><input type="date" class="form-control" value="" id="stgl1" style="width:100%"></td>
        <td style="text-align:center;">S/d</td>
        <td><input type="date" class="form-control" value="" id="stgl2" style="width:100%"></td>
      </tr>
    </table>

    <!-- cetak barang -->
    <br/><button type="button" onclick="cetak_barang(0,1)" class="btn btn-default btn-sm waves-effect">
      <i class="material-icons">personal_video</i> CETAK
    </button>&nbsp;
    <button type="button" onclick="cetak_barang(1,1)" class="btn btn-default btn-sm waves-effect">
      <i class="material-icons">sms</i> EXCEL
    </button>
  </div>
</div>
<!-- END BARANG -->

<!-- # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # -->

<!-- NO NOTA -->
<div id="box_nota">
  <div>LAPORAN TOTAL PEMBELIAN</div><br/>
  <button style="background:#ddd;padding:8px 10px;color:#000;border:0" id="btn_nota_all">SEMUA</button>
  <button style="background:#ddd;padding:8px 10px;color:#000;border:0" id="btn_nota_supplier">PER SUPPLIER NO NOTA</button>

  <!-- SEMUA NOTA -->
  <div id="box_nota_all"><br/>
    <!-- tampil data -->
    <table style="border:0;width:50%;">
    <input type="hidden" value="0" id="sid_supplier_nota">
      <tr>
          <th style="border:0;width:12%"></th>
          <th style="border:0;width:1%"></th>
          <th style="border:0;width:12%"></th>
          <th style="border:0;width:3%"></th>
          <th style="border:0;width:12%"></th>
        </tr>
      <tr>
        <td>Pilih Tanggal</td>
        <td>:</td>
        <td><input type="date" class="form-control" value="" id="sntgl1" style="width:100%"></td>
        <td style="text-align:center;">S/d</td>
        <td><input type="date" class="form-control" value="" id="sntgl2" style="width:100%"></td>
      </tr>
    </table>

    <!-- cetak barang -->
    <br/><button type="button" onclick="cetak_nota(0,0)" class="btn btn-default btn-sm waves-effect">
      <i class="material-icons">personal_video</i> CETAK
    </button>&nbsp;
    <button type="button" onclick="cetak_nota(1,0)" class="btn btn-default btn-sm waves-effect">
      <i class="material-icons">sms</i> EXCEL
    </button>
  </div>

  <!-- PER SUPPLIER NOTA -->
  <div id="box_nota_supplier"><br/>
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
        <td>Pilih</td>
        <td>:</td>
        <td colspan="3"><select class="form-control" id="supplier_nota" style="width:100%"></select>
        </td>
      </tr>
      <tr>
        <td>Supplier</td>
        <td>:</td>
        <td colspan="3">
        <input type="text" id="supplier_note_nota" autocomplete="off" class="form-control" disabled="true" style="background:#ddd">
        <input type="hidden" value="" id="id_supplier_nota">
        </td>
      </tr>
      <tr>
        <td>No. Nota</td>
        <td>:</td>
        <td colspan="3"><input type="text" id="no_nota" autocomplete="off" class="form-control" disabled="true" style="background:#ddd"></td>
      </tr>
      <tr>
        <td>Pilih Tanggal</td>
        <td>:</td>
        <td><input type="date" class="form-control" value="" id="ntgl1" style="width:100%"></td>
        <td style="text-align:center;">S/d</td>
        <td><input type="date" class="form-control" value="" id="ntgl2" style="width:100%"></td>
      </tr>
    </table>

    <!-- cetak barang -->
    <br/><button type="button" onclick="cetak_nota(0,1)" class="btn btn-default btn-sm waves-effect">
      <i class="material-icons">personal_video</i> CETAK
    </button>&nbsp;
    <button type="button" onclick="cetak_nota(1,1)" class="btn btn-default btn-sm waves-effect">
      <i class="material-icons">sms</i> EXCEL
    </button>
  </div>
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
    load_supplier();
    load_supplier_tp();
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
      $("#btn_nota_all").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');
      $("#btn_nota_supplier").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');
      $("#btn_rekap").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');

      $("#box_barang").show();
      $("#box_barang_all").hide();
      $("#box_barang_supplier").hide();
      $("#box_nota").hide();
      $("#box_nota_all").hide();
      $("#box_nota_supplier").hide();
      $("#box_rekap").hide();

      $("#supplier_note").val("");
      $("#tgl1").val("");
      $("#tgl2").val("");
      $("#stgl1").val("");
      $("#stgl2").val("");
    });

      // barang all
      $("#btn_barang_all").click(function(){
        $("#btn_barang_all").attr('style','background:#287FB8;padding:8px 10px;color:#fff;border:0');
        $("#btn_barang_supplier").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');

        $("#box_barang_all").show();
        $("#box_barang_supplier").hide();
      });

      // barang supplier
      $("#btn_barang_supplier").click(function(){
        $("#btn_barang_all").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');
        $("#btn_barang_supplier").attr('style','background:#287FB8;padding:8px 10px;color:#fff;border:0');

        $("#box_barang_all").hide();
        $("#box_barang_supplier").show();
      });      

  //#####################################################################

    // nota
      $("#btn_nota").click(function() {
      $("#btn_barang").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');
      $("#btn_barang_all").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');
      $("#btn_barang_supplier").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');
      $("#btn_nota").attr('style','background:#287FB8;padding:8px 10px;color:#fff;border:0');
      $("#btn_rekap").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');

      $("#box_barang").hide();
      $("#box_barang_all").hide();
      $("#box_barang_supplier").hide();
      $("#box_nota").show();
      $("#box_nota_all").hide();
      $("#box_nota_supplier").hide();
      $("#box_rekap").hide();

      $("#supplier_note_nota").val("");
      $("#no_nota").val("");
      $("#sntgl1").val("");
      $("#sntgl2").val("");
      $("#ntgl1").val("");
      $("#ntgl2").val("");
    });

      // nota all
      $("#btn_nota_all").click(function(){
        $("#btn_nota_all").attr('style','background:#287FB8;padding:8px 10px;color:#fff;border:0');
        $("#btn_nota_supplier").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');

        $("#box_nota_all").show();
        $("#box_nota_supplier").hide();
      });

      // nota supplier
      $("#btn_nota_supplier").click(function(){
        $("#btn_nota_all").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');
        $("#btn_nota_supplier").attr('style','background:#287FB8;padding:8px 10px;color:#fff;border:0');

        $("#box_nota_all").hide();
        $("#box_nota_supplier").show();
      });

  //#####################################################################

    // rekap
    $("#btn_rekap").click(function() {
      $("#btn_barang").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');
      $("#btn_barang_all").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');
      $("#btn_barang_supplier").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');
      $("#btn_nota").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');
      $("#btn_nota_all").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');
      $("#btn_nota_supplier").attr('style','background:#ddd;padding:8px 10px;color:#000;border:0');
      $("#btn_rekap").attr('style','background:#287FB8;padding:8px 10px;color:#fff;border:0');

      $("#box_barang").hide();
      $("#box_barang_all").hide();
      $("#box_barang_supplier").hide();
      $("#box_nota").hide();
      $("#box_nota_all").hide();
      $("#box_nota_supplier").hide();
      $("#box_rekap").show();
    });

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

 // load total pembelian
 function load_supplier_tp(){  
    $('#supplier_nota').select2({
         // minimumInputLength: 3,
         allowClear: true,
         placeholder: 'SELECT',
         ajax: {
            dataType: 'json',
            url      : '<?php echo base_url(); ?>/Master/laod_supplier_nota',
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

  // load total pembelian
  $('#supplier_nota').on('change', function() {
    data = $('#supplier_nota').select2('data');
    // $("#supplier").val(data[0].text);
    $("#supplier_note_nota").val(data[0].nama_supplier);
    $("#id_supplier_nota").val(data[0].id);
    $("#no_nota").val(data[0].no_nota);
  });
  
   // cetak barang
   function cetak_barang(ctk,jenis){
    if(jenis == 0){
      tgl1 = $("#tgl1").val();
      tgl2 = $("#tgl2").val();
      id_supplier = $("#sid_supplier").val();
    }else if(jenis == 1){
      tgl1 = $("#stgl1").val();
      tgl2 = $("#stgl2").val();
      id_supplier = $("#id_supplier").val();

      if (id_supplier == "" || id_supplier == 0){
        showNotification("alert-info", "Pilih Supplier Dahulu", "bottom", "right", "", ""); return;
      }
    }

    if (tgl1 == ""){
      showNotification("alert-info", "Pilih Tanggal Mulai", "bottom", "right", "", ""); return;
    }else if (tgl2 == ""){
      showNotification("alert-info", "Pilih Tanggal Akhir", "bottom", "right", "", ""); return;
    }

    var url    = "<?php echo base_url('Laporan/lap_barang?'); ?>";
    window.open(url+'tgl1='+tgl1+'&tgl2='+tgl2+'&jenis='+id_supplier+'&ctk='+ctk, '_blank');

   }

   // cetak nota
   function cetak_nota(ctk,jenis){
    if(jenis == 0){
      tgl1 = $("#sntgl1").val();
      tgl2 = $("#sntgl2").val();
      id_supplier = $("#sid_supplier_nota").val();
    }else if(jenis == 1){
      tgl1 = $("#ntgl1").val();
      tgl2 = $("#ntgl2").val();
      id_supplier = $("#id_supplier_nota").val();

    if (id_supplier == "" || id_supplier == 0){
        showNotification("alert-info", "Pilih Supplier Dahulu", "bottom", "right", "", ""); return;
      }
    }

    if (tgl1 == ""){
      showNotification("alert-info", "Pilih Tanggal Mulai", "bottom", "right", "", ""); return;
    }else if (tgl2 == ""){
      showNotification("alert-info", "Pilih Tanggal Akhir", "bottom", "right", "", ""); return;
    }

    var url    = "<?php echo base_url('Laporan/lap_total_pembelian?'); ?>";
    window.open(url+'tgl1='+tgl1+'&tgl2='+tgl2+'&jenis='+id_supplier+'&ctk='+ctk, '_blank');

   }

    
</script>