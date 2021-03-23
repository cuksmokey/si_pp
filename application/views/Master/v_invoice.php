<section class="content">
  <div class="container-fluid">
    <!-- Exportable Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2>
              <ol class="breadcrumb">
                <li class="">Invoice</li>
              </ol>
            </h2>
          </div>

          <div class="body">
            <div class="box-data">
              <table width="100%">
                <tr>
                  <td align="left">
                    <?php if ($this->session->userdata('level') <> "User") { ?>
                      <button type="button" class="btn-add btn btn-default btn-sm waves-effect">
                        <i class="material-icons">library_add</i>
                        <span>New</span>
                      </button>
                    <?php } ?>
                  </td>
                </tr>
              </table>

              <br><br>
              <table id="datatable11" class="table table-bordered table-striped table-hover dataTable ">
                <thead>
                  <tr>
                    <th style="width: 6%;">No</th>
                    <th style="width: 10%;">Tgl Jth Tempo</th>
                    <th style="width: 10%;">No Nota</th>
                    <th style="width: 10%;">No Faktur</th>
                    <th style="width: 18%;">Customer</th>
                    <th style="width: 6%;">JML</th>
                    <th style="width: 10%;">Pilih Bayar</th>
                    <th style="width: 10%;">Tgl Bayar</th>
                    <th style="width: 20%;">Aksi</th>
                  </tr>
                </thead>
                <tbody style="vertical-align: center;">

                </tbody>
              </table>
            </div>

            <!-- box form -->
            <div class="box-form">
              <div id="judul"></div>
              <table width="60%">
                <tr>
                  <th style="border:0;padding:5px;width:10%"></th>
                  <th style="border:0;padding:5px;width:1%"></th>
                  <th style="border:0;padding:5px;width:21%"></th>
                  <th style="border:0;padding:5px;width:18%"></th>
                </tr>
                <tr>
                  <td>Cetak</td>
                  <td>:</td>
                  <td style="padding:0 0 10px">
                    <select name="" id="ctk_inv" class="form-control">
                      <option value="">Pilih . . .</option>
                      <option value="0">Satu Nota</option>
                      <option value="1">No Invoice</option>
                    </select>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>No. Nota</td>
                  <td>:</td>
                  <td>
                    <input type="text" class="form-control" id="no_nota" autocomplete="off">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>No. Faktur</td>
                  <td>:</td>
                  <td>
                    <input type="text" class="form-control" id="no_faktur" autocomplete="off">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>Jatuh Tempo</td>
                  <td>:</td>
                  <td>
                    <input type="date" id="tgl_jt" value="" class="form-control">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td style="padding:10px"></td>
                </tr>
                <tr>
                  <td>Pilih</td>
                  <td>:</td>
                  <td colspan="2">
                    <select class="form-control" id="pilih_id_pl" style="width:100%"></select>
                    <input type="hidden" value="" id="id_pl">
                    <input type="hidden" value="" id="no_nota_lama">
                  </td>
                </tr>
                <tr>
                  <td>Tanggal Packing List</td>
                  <td>:</td>
                  <td>
                    <input type="date" id="tgl" value="" class="form-control" disabled="true" style="background:#ddd">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>No. Surat Jalan</td>
                  <td>:</td>
                  <td>
                    <input type="text" class="form-control" id="no_surat" autocomplete="off" disabled="true" style="background:#ddd">
                    <input type="hidden" id="idid" value="">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>No. SO</td>
                  <td>:</td>
                  <td>
                    <input type="text" class="form-control" id="no_so" autocomplete="off" disabled="true" style="background:#ddd">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>No. PO</td>
                  <td>:</td>
                  <td>
                    <input type="text" class="form-control" id="no_po" autocomplete="off" disabled="true" style="background:#ddd">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>No. Invoice</td>
                  <td>:</td>
                  <td style="padding:0 0 10px">
                  <input type="text" class="form-control" id="no_inv" autocomplete="off" disabled="true" style="background:#ddd">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>Laporan</td>
                  <td>:</td>
                  <td style="background:#ddd">
                    <select name="" id="laporan" class="form-control" disabled="true">
                      <option value="0">Pilih...</option>
                      <option value="sma">Sinar Mukti Abadi</option>
                      <option value="st">Sinar Teknindo</option>
                    </select>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td colspan="4">
                    <hr>Dikirim Ke
                    <hr>
                  </td>
                </tr>
                <tr>
                  <td>UP</td>
                  <td>:</td>
                  <td colspan="2" style="padding:0 0 10px">
                    <input type="text" class="form-control" id="upup" autocomplete="off">
                  </td>
                </tr>
                <tr>
                  <td>Pimpinan</td>
                  <td>:</td>
                  <td colspan="2">
                    <input type="text" class="form-control" id="pimpinan" disabled="true" style="background:#ddd">
                  </td>
                </tr>
                <tr>
                  <td>Nama Instansi</td>
                  <td>:</td>
                  <td colspan="2">
                    <input type="text" class="form-control" id="nama_perusahaan" disabled="true" style="background:#ddd">
                  </td>
                </tr>
                <tr>
                  <td>NPWP</td>
                  <td>:</td>
                  <td colspan="2">
                    <input type="text" class="form-control" id="npwp" disabled="true" style="background:#ddd">
                  </td>
                </tr>
                <tr style="vertical-align: top">
                  <td>Alamat</td>
                  <td>:</td>
                  <td colspan="2">
                    <textarea id="alamat" rows="5" class="form-control" disabled="true" style="background:#ddd"></textarea>
                  </td>
                </tr>
                <tr>
                  <td>No. Telepon</td>
                  <td>:</td>
                  <td colspan="2">
                    <input type="text" class="form-control" id="no_telp" disabled="true" style="background:#ddd">
                  </td>
                </tr>
                <tr>
                  <td>Ongkos Kirim</td>
                  <td>:</td>
                  <td style="padding:10px 0 0">
                    <input type="text" class="angka form-control" id="ongkir" autocomplete="off">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td colspan="4" align="right"><br></td>
                </tr>
              </table>
              <table width="100%">
                <tr>
                  <td align="left"> <button type="button" class="btn-tambah btn btn_list_barang btn-default btn-sm waves-effect">
                      <i class="material-icons">book</i>
                      <span>List Barang</span>
                    </button>
                  </td>
                </tr>
              </table>
              <br>
              <table class="table" style="margin-bottom:0;background-color: grey; color:white">
                <thead>
                  <tr>
                    <th style="width:5%;text-align:left">No</th>
                    <th style="width:15%;text-align:left">Kode Barang</th>
                    <th style="width:45%;text-align:left">Nama Barang</th>
                    <th style="width:10%;text-align:left">QTY</th>
                    <th style="width:10%;text-align:left">Input Harga</th>
                    <th style="width:15%;text-align:center">Aksi</th>
                  </tr>
                </thead>
                <tbody id="detail_cart">
                </tbody>
              </table>
              <table class="table" style="background:#c0c0c0;color:#333">
                <thead>
                  <tr>
                    <th style="width:5%;padding:0"></th>
                    <th style="width:15%;padding:0"></th>
                    <th style="width:45%;padding:0"></th>
                    <th style="width:10%;padding:0"></th>
                    <th style="width:10%;padding:0"></th>
                    <th style="width:15%;padding:0"></th>
                  </tr>
                </thead>
                <tbody id="edit_detail_cart">
                </tbody>
              </table>

              <button type="button" class="btn-kembali btn btn-dark btn-circle waves-effect waves-circle waves-float">
                <i class="material-icons">arrow_back</i>
              </button>
              <button onclick="simpan()" id="btn-simpan" type="button" class="btn bg-light-green btn-sm waves-effect">
                <i class="material-icons">save</i>
                <span id="txt-btn-simpan">Simpan</span>
              </button> &nbsp;&nbsp;&nbsp;&nbsp;
              <button onclick="kosong()" type="button" class="btn btn-default btn-sm waves-effect">
                <i class="material-icons">note_add</i>
                <span>Tambah Data</span>
              </button>
              <a type="button" id="btn-print" target="blank" class="btn btn-default btn-circle waves-effect waves-circle waves-float pull-right" style="display: none">
                <i class="material-icons">print</i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- #END# Exportable Table -->
    </div>
</section>

<!-- Large Size// -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="width: 150%; left: -200px">
      <div class="modal-header">
        <!-- <h4 class="modal-title" id="largeModalLabel">Modal title</h4> -->
      </div>
      <div class="modal-body">
        <div class="box-add">
          <table id="datatable-add" width="100%" class="table table-bordered table-striped table-hover dataTable ">
            <thead>
              <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>QTY</th>
                <th>Input Harga</th>
                <th>Satuan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                  <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Large Size -->
<div class="modal fade" id="modal-view-detail" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="width: 150%; left: -200px">
      <div class="modal-header"></div>
      <div class="modal-body">
        <table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size:16px">
          <tr>
            <td align="left" width="8%">No Nota</td>
            <td align="" width="1%">:</td>
            <td align="left" width="10%">
              <div id="txt-no_nota"></div>
            </td>
            <td align="center" width="10%"></td>
            <td align="left" width="8%">Tanggal Jatuh Tempo</td>
            <td align="" width="1%">:</td>
            <td align="left" width="20%">
              <div id="txt-tgl_jt"></div>
            </td>
          </tr>
          <tr>
            <td align="left" width="8%">Kepada</td>
            <td align="" width="1%">:</td>
            <td align="left" width="10%">
              <div id="txt-kepada"></div>
            </td>
            <td align="center" width="10%"></td>
            <td align="left" width="8%">NPWP</td>
            <td align="" width="1%">:</td>
            <td align="left" width="20%">
              <div id="txt-npwp"></div>
            </td>
          </tr>
          <tr>
            <td align="left" width="8%">Alamat</td>
            <td align="" width="1%">:</td>
            <td align="left" width="10%">
              <div id="txt-alamat"></div>
            </td>
            <td align="center" width="10%"></td>
            <td align="left" width="8%">No. Faktur</td>
            <td align="" width="1%">:</td>
            <td align="left" width="20%">
              <div id="txt-faktur"></div>
            </td>
          </tr>
          <tr>
            <td align="left" width="8%">No Po</td>
            <td align="" width="1%">:</td>
            <td align="left" width="10%">
              <div id="txt-no_po"></div>
            </td>
            <td align="center" width="10%"></td>
            <td align="left" width="8%">Ongkir</td>
            <td align="" width="1%">:</td>
            <td align="left" width="20%">
              <div id="txt-ongkir">
            </td>
          </tr>
        </table>

        <div class="box-add">
          <table width="100%" class="table table-bordered table-striped table-hover dataTable ">
            <thead>
              <tr>
                <th style="width:5%">No</th>
                <th style="width:15%">Kode Barang</th>
                <th style="width:40%">Nama Barang</th>
                <th style="width:20%">QTY</th>
                <th style="width:20%">Input Harga</th>
              </tr>
            </thead>
            <tbody id="list-timbangan">
              <div></div>
            </tbody>
          </table>
        </div>

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script>
  status = '';
  roll_array = [];

  $(document).ready(function() {
    $(".box-form").hide();
    load_data();
    // load_pl();

    $("input.angka").keypress(function(event) { //input text number only
      return /\d/.test(String.fromCharCode(event.keyCode));
    });
  });

  $('#ctk_inv').on('change', function() {
    // alert( this.value );
    load_pl(this.value);
    kosong();
  });

  $(".btn-add").click(function() {
    status = 'insert';
    kosong();
    $("#btn-simpan").prop("disabled", true);
    $(".box-data").hide();
    $(".box-form").show();
    $("#judul").html('<h3>Form Tambah Data Invoice</h3>');
    $('.box-form').animateCss('fadeInDown');
  });

  $(".btn-kembali").click(function() {
    $(".box-form").hide();
    $(".box-data").show();
    $('.box-data').animateCss('fadeIn');
    load_data();
  });

  function reloadTable() {
    table = $('#datatable11').DataTable();
    tabel.ajax.reload(null, false);
  }

  function load_data() { //
    var table = $('#datatable11').DataTable();

    table.destroy();

    tabel = $('#datatable11').DataTable({

      "processing": true,
      "pageLength": true,
      "paging": true,
      "ajax": {
        "url": '<?php echo base_url(); ?>Master/load_data',
        "data": ({
          jenis: "pl_inv"
        }),
        "type": "POST"
      },
      responsive: true,
      "pageLength": 10,
      "language": {
        "emptyTable": "Tidak ada data.."
      },
      "order": [
        [0, "asc"]
      ]
    });
  }

  function simpan() {
    idid = $("#idid").val();
    id_pl = $("#id_pl").val();

    tgl_jt = $("#tgl_jt").val();
    no_nota = $("#no_nota").val();
    no_nota_lama = $("#no_nota_lama").val();
    no_faktur = $("#no_faktur").val();

    tgl = $("#tgl").val();
    no_surat = $("#no_surat").val();
    no_so = $("#no_so").val();
    no_po = $("#no_po").val();
    no_inv = $("#no_inv").val();

    up = $("#upup").val();
    pimpinan = $("#pimpinan").val();
    nama_perusahaan = $("#nama_perusahaan").val();
    npwp = $("#npwp").val();
    alamat = $("#alamat").val();
    no_telp = $("#no_telp").val();

    ongkir = $("#ongkir").val();

    if(status == "update"){
      cart = $("#detail_cart").html(`<div></div>`);
      urrl = 'update_inv'
    }else{
      cart = $('#detail_cart').html();
      urrl = 'insert'
    }

    if (cart == "" || tgl_jt == "" || no_nota == "" || no_faktur == "" || no_surat == "" || no_so == "" || no_po == "" || no_inv == "" || up == "" || nama_perusahaan == "" || pimpinan == "" || npwp == "" || alamat == "" || no_telp == "" || ongkir == "") {
      showNotification("alert-info", "Harap Lengkapi Form", "bottom", "center", "", "");
      return;
    }

    $("#btn-simpan").prop("disabled", true);

    // alert(idid+' '+id_pl+' '+no_nota+' '+no_nota_lama+' '+no_faktur+' '+no_inv+' '+up+' '+tgl_jt+' '+ongkir+' '+status);

    $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>Master/' + urrl,
      data: ({
        id: idid,
        id_pl: id_pl,
        no_nota: no_nota,
        no_nota_lama: no_nota_lama,
        no_faktur: no_faktur,
        no_inv: no_inv,
        up: up,
        tgl_jt: tgl_jt,
        ongkir: ongkir,
        jenis: "Save_invoice"
      }),
      dataType: "json",
      success: function(data) {
        $("#btn-simpan").prop("disabled", false);
        if (data.data == true) {
          showNotification("alert-success", "Berhasil", "bottom", "center", "", "");
          kosong();
        } else {
          showNotification("alert-danger", data.msg, "bottom", "center", "", "");
        }
      }
    });
  }

  function view_detail(id,no_inv) {

    if(no_inv === undefined || no_inv === "undefined"){
      xno_inv = 0;
    }else{
      xno_inv = no_inv;
    }

    // alert(id+' '+xno_inv);

    $.ajax({
        url: '<?php echo base_url('Master/get_edit'); ?>',
        type: 'POST',
        data: {
          id: id,
          no_inv: xno_inv,
          jenis: "view_inv"
        },
      })
      .done(function(data) {
        json = JSON.parse(data);

        $("#txt-no_nota").html(json.header.no_nota);
        $("#txt-faktur").html(json.header.no_faktur);
        $("#txt-no_po").html(json.pl.no_po);
        $("#txt-tgl_jt").html(json.header.tgl_jt);
        $("#txt-kepada").html(json.pt.nm_perusahaan);
        $("#txt-npwp").html(json.pt.npwp);
        $("#txt-alamat").html(json.pt.alamat);
        $("#txt-ongkir").html(json.header.ongkir);

        let idr = new Intl.NumberFormat();
        html = '';
        for (var i = 0; i < json.detail.length; i++) {
          ii = i + 1;
          html += '<tr><td><b>' + ii + '</b></td><td><b>' + json.detail[i].kode_barang + '</b></td><td><b>' + json.detail[i].nama_barang + '</b></td><td><b>' + json.detail[i].i_qty + ' ' + json.detail[i].qty_ket + '</b></td><td><b>Rp. ' + idr.format(json.detail[i].harga_invoice) + '</b></td></tr>';
        }

        $("#list-timbangan").html(html);

        $("#modal-view-detail").modal("show");

      })

  }

  ///////// E D I T ///////////////

  function tampil_edit(id,no_inv) {
    $(".box-data").hide();
    $(".box-form").show();
    $('.box-form').animateCss('fadeInDown');
    $("#judul").html('<h3>Form Edit iNVOICE</h3>');
    $(".btn_list_barang").prop("disabled", true);
    status = "update";

    // alert(id+' '+no_inv);

    $.ajax({
        url: '<?php echo base_url('Master/get_edit'); ?>',
        type: 'POST',
        data: {
          id: id,
          no_inv: no_inv,
          jenis: "view_inv"
        },
      })
      .done(function(data) {
        json = JSON.parse(data);
        $("#btn-simpan").prop("disabled", false);

        $("#idid").val(json.header.id);
        $("#id_pl").val(json.header.id_pl);
        $("#ctk_inv").val("")
        .prop("disabled", true)
        .attr('style', 'background:#ddd;');
        $("#pilih_id_pl").val("")
        .prop("disabled", true)
        .attr('style', 'background:#ddd;');
        $("#tgl_jt").val(json.header.tgl_jt);
        $("#no_inv").val(json.header.no_inv);
        $("#no_nota").val(json.header.no_nota);
        $("#no_nota_lama").val(json.header.no_nota);
        $("#no_faktur").val(json.header.no_faktur);

        if(json.header.no_inv == 0){
          $("#tgl").val(json.pl.tgl);
          $("#no_surat").val(json.pl.no_surat);
          $("#no_so").val(json.pl.no_so);
          $("#no_po").val(json.pl.no_po);
        }else{
          $("#tgl").val("");
          $("#no_surat").val("-");
          $("#no_so").val("-");
          $("#no_po").val("-");
        }

        $("#laporan").val(json.pl.laporan);
        $("#upup").val(json.header.up);
        $("#pimpinan").val(json.pt.pimpinan);
        $("#nama_perusahaan").val(json.pt.nm_perusahaan);
        $("#npwp").val(json.pt.npwp);
        $("textarea#alamat").val(json.pt.alamat);
        $("#no_telp").val(json.pt.no_telp);

        if(json.pl.laporan == "st"){
          $("#ongkir").val(json.header.ongkir).prop("disabled", false).attr('style', 'background:#fff;');
        }else{
          $("#ongkir").val(0).prop("disabled", true).attr('style', 'background:#ddd;');
        }

        html = '';
        for (var i = 0 ; i < json.detail.length; i++) {
          ii = i+1;
          html += `<tr>
            <td><b>${ii}</b></td>
            <td><b>${json.detail[i].kode_barang}</b></td>
            <td><b>${json.detail[i].nama_barang}</b></td>
            <td><b>${parseInt(json.detail[i].i_qty)}</td>
            <td><input type="text" class="angka form-control" id="i_hrg_edit${i}" placeholder="0" autocomplete="off"  onkeypress="return hanyaAngka(event)" value="${json.detail[i].harga_invoice}"></b></td>
            <td style="text-align:center"><button type="button" onclick="addToCartEdit('${json.detail[i].id_list_barang}','${json.detail[i].id_pl}','${i}')" id="btnn-eedit${i}" class="btn btn-default btn-xs">Edit</button>`;
        }
        $("#edit_detail_cart").html(html);
      })
  }

  function addToCartEdit(id,id_pl,i) {
    $("#btn-simpan").prop("disabled", false);
    $("#i_hrg_edit" + i).prop("disabled", true).attr('style', 'background:#bbb;');
    $("#btnn-eedit" + i).prop("disabled", true);
    // $(".btn_list_barang").prop("disabled", true);

    i_hrg = $("#i_hrg_edit" + i).val();

    // alert("ID:"+id+". ID_PL:"+id_pl+". i_qty:"+i_hrg+". idx: "+i);

    if (i_hrg == 0 || i_hrg == "") {
      swal("Input Harga Tidak Boleh Kosong!", "", "error");
      $("#i_hrg_edit" + i).prop("disabled", false).attr('style', 'background:#fff;');
      $("#btnn-eedit" + i).prop("disabled", false);
    }else {
      // alert('eksekusi');
      $.ajax({
        type: "POST",
        // url: '<?php echo base_url(); ?>Master/' + status,
        url: '<?php echo base_url(); ?>Master/update_inv',
        data: ({
            id: id,
            i_hrg: i_hrg,
            jenis: "editInvListBarang"
        }),
        dataType: "json",
        success: function(data) {
          $("#btn-simpan").prop("disabled", false);
          if (data.data == true) {
            showNotification("alert-success", "Berhasil", "bottom", "center", "", "");
            // tampil_edit(id_pl);
          } else {
            showNotification("alert-danger", "Gagal Edit!", "bottom", "center", "", "");
          }
        }
      });
    }
  }

  function deleteData(id,del_no_inv) {
    // alert(id+' '+del_no_inv);
    swal({
        title: "Apakah Anda Yakin ?",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya",
        cancelButtonText: "Batal",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
            url: '<?php echo base_url(); ?>Master/hapus/',
            type: "POST",
            data: {
              id: id,
              no_inv: del_no_inv,
              jenis: "hapus_inv"
            },
            success: function(data) {
              if (data == 1) {
                swal("Berhasil", "", "success");
                reloadTable();

              } else {
                swal("Data Sudah dilakukan transaksi", "", "error");
              }
            }
          });

        } else {
          swal("", "Data Batal dihapus", "error");
        }
      });
  }

  function confirmByr(id, i) {
    tglByrInv = $("#plhTglInvc" + i).val();
    plhByrInvc = $("#plhByrInvc" + i).val();

    // alert("ID:"+id+". ii:"+i+". tttbyr:"+tglByrInv);

    if (plhByrInvc == 0 || plhByrInvc == "") {
      swal("Pilih Pembayaran Terlebih Dahulu!", "", "error");
    } else if (tglByrInv == 0 || tglByrInv == "") {
      swal("Pilih Tanggal Bayar Terlebih Dahulu!", "", "error");
    } else {
      $.ajax({
        url: "<?php echo base_url(); ?>Master/confirmBayarInv",
        method: "POST",
        data: {
          id: id,
          tglByrInv: tglByrInv,
          plhByrInvc: plhByrInvc
        },
        success: function(data) {
          swal("Berhasil Terbayar", "", "success");
          reloadTable();
        }
      });
    }
  }


  function kosong() {
    $("#judul").html('<h3> Form Tambah Data Packing List</h3>');
    $("#btn-print").hide();
    status = "insert";

    $("#ctk_inv").val("").prop("disabled", false).attr('style', 'background:#fff;');
    $("#pilih_id_pl").val("").prop("disabled", false).attr('style', 'background:#fff;');
    $("#idid").val("");
    $("#id_pl").val("");
    $("#tgl_jt").val("");

    $("#tgl").val("");
    $("#no_surat").val("");
    $("#no_so").val("");
    $("#no_po").val("");
    $("#no_inv").val("");
    $("#no_nota").val("");
    $("#no_nota_lama").val("");
    $("#no_faktur").val("");
    $("#laporan").val("");

    $("#upup").val("");
    $("#nama_perusahaan").val("");
    $("#pimpinan").val("");
    $("#npwp").val("");
    $("#alamat").val("");
    $("#no_telp").val("");
    
    $("#ongkir").val("").prop("disabled", true).attr('style', 'background:#ddd;');
    
    $("#btn-simpan").prop("disabled", false);
    $(".btn_list_barang").prop("disabled", false);
    $("#txt-btn-simpan").html("SIMPAN");
    $('#detail_cart').load("<?php echo base_url(); ?>Master/destroy_cart_inv");
    $("#edit_detail_cart").html("");
  }

  $(".btn-tambah").click(function() {
    id_pl = $("#id_pl").val();
    data_inv = $("#no_inv").val();

    load_barang(id_pl,data_inv);
    $("#btn-simpan").prop("disabled", true);

    $("#modal-tambah").modal("show");

  });

  function load_barang(id_pl,data_inv) { //
    // alert(id_pl+' '+data_inv);
    $("#btn-simpan").prop("disabled", true);
    var table = $('#datatable-add').DataTable();

    table.destroy();

    tabel = $('#datatable-add').DataTable({

      "processing": true,
      "pageLength": true,
      "paging": true,
      "ajax": {
        "url": '<?php echo base_url(); ?>Master/load_data',
        "data": ({
          id_pl: id_pl,
          no_inv: data_inv,
          jenis: "list_pl_inv"
        }),
        "type": "POST"
      },
      responsive: true,
      "pageLength": 10,
      "language": {
        "emptyTable": "Tidak ada data.."
      },
      "order": [
        [0, "asc"]
      ]
    });
  }

  function addToCart(id, kode_barang, nama_barang, qty, i) {
    $("#btn-simpan").prop("disabled", false);
    $("#harga_inv" + i).prop("disabled", true).attr('style', 'background:#ddd;');
    $(".btn_list_barang").prop("disabled", true);

    harga_inv = $("#harga_inv" + i).val();

    // alert("ID:"+id+". qty:"+qty+". i_qty:"+i_qty+". stok: "+ss_stok);

    if (harga_inv == 0 || harga_inv == "") {
      swal("Input Harga Tidak Boleh Kosong", "", "error");
      $("#harga_inv" + i).prop("disabled", false).attr('style', 'background:#fff;');
    } else {
      $.ajax({
        url: "<?php echo base_url(); ?>Master/add_to_cart_inv",
        method: "POST",
        data: {
          id_list_barang: id,
          kode_barang: kode_barang,
          nama_barang: nama_barang,
          harga_inv: harga_inv,
          qty: qty
        },
        success: function(data) {
          swal("Berhasil Ditambahkan", "", "success");
          $('#detail_cart').html(data);
        }
      });
    }
  }

  $(document).on('click', '.hapus_cart', function() {
    var row_id = $(this).attr("id");
    $.ajax({
      url: "<?php echo base_url(); ?>Master/hapus_cart_inv",
      method: "POST",
      data: {
        row_id: row_id
      },
      success: function(data) {
        $('#detail_cart').html(data);
        $(".btn_list_barang").prop("disabled", false);
      }
    });
  });

  function load_pl(load_inv) {
    // alert(no_inv);
    $('#pilih_id_pl').select2({
      // minimumInputLength: 3,
      allowClear: true,
      placeholder: '--select--',
      ajax: {
        dataType: 'json',
        url: '<?php echo base_url(); ?>/Master/load_pl',
        delay: 800,
        data: function(params) {
          if (params.term == undefined) {
            return {
              search: "",
              no_inv: load_inv
            }
          } else {
            return {
              search: params.term,
              no_inv: load_inv
            }
          }

        },
        processResults: function(data, page) {
          return {
            results: data
          };
        },
      }
    });
  }

  $('#pilih_id_pl').on('change', function() {
    data = $('#pilih_id_pl').select2('data');
    // $("#nama").val(data[0].text);
    $("#id_pl").val(data[0].id);

    if(data[0].no_inv == 0){
      $("#tgl").val(data[0].tgl);
      $("#no_surat").val(data[0].no_surat);
      $("#no_so").val(data[0].no_so);
      $("#no_po").val(data[0].no_po);
    }else{
      $("#tgl").val("");
      $("#no_surat").val("-");
      $("#no_so").val("-");
      $("#no_po").val("-");
    }

    $("#no_inv").val(data[0].no_inv);
    $("#laporan").val(data[0].laporan);

    $("#pimpinan").val(data[0].pimpinan);
    $("#upup").val(data[0].up);
    $("#nama_perusahaan").val(data[0].text);
    $("#npwp").val(data[0].npwp);
    $("textarea#alamat").val(data[0].alamat);
    $("#no_telp").val(data[0].no_telp);

    if(data[0].laporan == "st"){
      $("#ongkir").val("").prop("disabled", false).attr('style', 'background:#fff;');
    }else{
      $("#ongkir").val(0).prop("disabled", true).attr('style', 'background:#ddd;');
    }
  });

  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
</script>