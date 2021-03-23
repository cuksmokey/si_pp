<section class="content">
  <div class="container-fluid">
    <!-- Exportable Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2>
              <ol class="breadcrumb">
                <li class="">Packing List </li>
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
                    <th style="width: 8%;">Tanggal</th>
                    <th style="width: 20%;">No Surat Jalan</th>
                    <th style="width: 20%;">No SO</th>
                    <th style="width: 18%;">No PO</th>
                    <th style="width: 6%;">Jumlah Barang</th>
                    <th style="width: 22%;">Aksi</th>
                  </tr>
                </thead>
                <tbody>

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
                  <td>Tanggal </td>
                  <td>:</td>
                  <td>
                    <input type="date" id="tgl" value="<?php echo date('Y-m-d') ?>" class="form-control">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>No. Surat Jalan</td>
                  <td>:</td>
                  <td>
                    <input type="text" class="form-control" id="no_surat" autocomplete="off">
                    <input type="hidden" id="idid" value="">
                    <input type="hidden" id="no_surat_lama" value="">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>No. SO</td>
                  <td>:</td>
                  <td>
                    <input type="text" class="form-control" id="no_so" autocomplete="off">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>No. PO</td>
                  <td>:</td>
                  <td style="padding:0 0 10px">
                    <input type="text" class="form-control" id="no_po" autocomplete="off">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>No. Invoice</td>
                  <td>:</td>
                  <td>
                    <input type="text" placeholder="0" class="angka form-control" id="no_inv" maxlength="11" autocomplete="off">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="padding:0" colspan="2"><b>NOTE:</b> <br/>- Kosongkan <b>No. Invoice</b> Untuk Cetak Satu <b>Nota Penjualan</b>. <br/>- Samakan <b>No. Invoice, Laporan</b> dan <b>Customer</b> Untuk Cetak Beberapa <b>Nota Penjualan</b>.</td>
                </tr>
                <tr>
                  <td>Laporan</td>
                  <td>:</td>
                  <td style="padding:10px 0 0">
                    <select name="" id="laporan" class="form-control">
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
                  <td>Pilih</td>
                  <td>:</td>
                  <td colspan="2">
                    <select class="form-control" id="kepada" style="width:100%">
                    </select>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="padding:0" colspan="2"><b>NOTE:</b> Jika Pilih Customer Tidak Tampil. Edit Keterangan Di <b>Master Customer</b>.</td>
                </tr>
                <tr>
                  <td>Pimpinan</td>
                  <td>:</td>
                  <td colspan="2">
                    <input type="text" class="form-control" id="pimpinan" disabled="true" style="background:#ddd"> <input type="hidden" value="" id="id_kepada">
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
                  <td colspan="4" align="right">
                    <br>

                  </td>
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
                <tr>
                  <td style="padding:10px 5px 0 0"><b>NOTE:</b> Jika <b>List Barang</b> Tidak Muncul / <b>Aksi</b> Tidak Berfungsi, Cek/Edit Kembali <b>Kode Barang</b> dan <b>Nama Barang</b> Sudah Tidak Ada Simbol yang tidak diperbolehkan!</td>
                </tr>
              </table>
              <br>
              <table class="table" style="margin-bottom:0;background:#808080;color:white">
                <thead>
                  <tr>
                    <th style="width:5%;text-align:left">No</th>
                    <th style="width:15%;text-align:left">Kode Barang</th>
                    <th style="width:45%;text-align:left">Nama Barang</th>
                    <th style="width:10%;text-align:left">Sisa Stok</th>
                    <th style="width:10%;text-align:left">Input QTY</th>
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
                <th>STOK</th>
                <th>Input QTY</th>
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
            <td align="left" width="8%">Tanggal</td>
            <td align="" width="1%">:</td>
            <td align="left" width="10%">
              <div id="txt-tgl"></div>
            </td>
            <td align="center" width="10%"></td>
            <td align="left" width="8%">Kepada</td>
            <td align="" width="1%">:</td>
            <td align="left" width="20%">
              <div id="txt-nm_perusahaan"></div>
            </td>
          </tr>
          <tr>
            <td align="left" width="8%">No Surat Jalan</td>
            <td align="" width="1%">:</td>
            <td align="left" width="10%">
              <div id="txt-no_surat"></div>
            </td>
            <td align="center" width="10%"></td>
            <td align="left" width="8%">Alamat</td>
            <td align="" width="1%">:</td>
            <td align="left" width="20%">
              <div id="txt-alamat_perusahaan"></div>
            </td>
          </tr>
          <tr>
            <td align="left" width="8%">No SO</td>
            <td align="" width="1%">:</td>
            <td align="left" width="10%">
              <div id="txt-no_so"></div>
            </td>
            <td align="center" width="10%"></td>
            <td align="left" width="8%">UP</td>
            <td align="" width="1%">:</td>
            <td align="left" width="20%">
              <div id="txt-up"></div>
            </td>
          </tr>
          <tr>
            <td align="left" width="8%">No PO</td>
            <td align="" width="1%">:</td>
            <td align="left" width="10%">
              <div id="txt-no_po"></div>
            </td>
            <td align="center" width="10%"></td>
            <td align="left" width="8%">No Telp / No HP</td>
            <td align="" width="1%">:</td>
            <td align="left" width="20%">
              <div id="txt-no_telp"></div>
            </td>
          </tr>
          <tr>
            <td align="left" width="8%">No Invoice</td>
            <td align="" width="1%">:</td>
            <td align="left" width="10%" colspan="5">
              <div id="txt-no_inv"></div>
            </td>
          </tr>
        </table>

        <div class="box-add">
          <table width="100%" class="table table-bordered table-striped table-hover dataTable ">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>STOK</th>
                <th>Input QTY</th>
              </tr>
            </thead>
            <tbody id="list-timbangan">
              <div></div>
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

<script>
  status = '';
  roll_array = [];

  $(document).ready(function() {
    $(".box-form").hide();
    load_data();
    // load_perusahaan();

    $("input.angka").keypress(function(event) { //input text number only
      return /\d/.test(String.fromCharCode(event.keyCode));
    });
  });

  $('#laporan').on('change', function() {
    // alert( this.value );
    load_perusahaan(this.value);
    // kosong();
  });

  $(".btn-add").click(function() {
    status = 'insert';
    kosong();
    $("#btn-simpan").prop("disabled", true);
    $(".btn_list_barang").prop("disabled", false);
    $(".box-data").hide();
    $(".box-form").show();
    $("#judul").html('<h3>Form Tambah Data Packing List</h3>');
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
          jenis: "PL_price_list"
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
    id = $("#idid").val();
    // data = $('#kepada').select2('data');
    // kepada = data[0].id;
    tgl = $("#tgl").val();
    laporan = $("#laporan").val();
    no_surat = $("#no_surat").val();
    no_surat_lama = $("#no_surat_lama").val();
    no_so = $("#no_so").val();
    no_po = $("#no_po").val();
    get_inv = $("#no_inv").val();
    if(get_inv == 0 || get_inv == ""){
      no_inv = 0;
    }else{
      no_inv = get_inv;
    }

    upup = $("#upup").val();
    kepada = $("#id_kepada").val();
    pimpinan = $("#pimpinan").val();
    nama_perusahaan = $("#nama_perusahaan").val();
    npwp = $("#npwp").val();
    alamat = $("#alamat").val();
    no_telp = $("#no_telp").val();

    if(status == "update"){
      cart = $("#detail_cart").html(`<div></div>`);
    }else{
      cart = $('#detail_cart').html();
    }

    if (cart == "" || tgl == "" || laporan == 0 || no_surat == "" || no_so == "" || no_po == "" || kepada == "" || nama_perusahaan == "" || pimpinan == "" || npwp == "" || alamat == "" || no_telp == "" || upup == "") {
      showNotification("alert-info", "Harap Lengkapi Form", "bottom", "center", "", "");
      return;
    }

    $("#btn-simpan").prop("disabled", true);

    // alert(id);
    $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>Master/' + status,
      data: ({
        id: id,
        tgl: tgl,
        laporan: laporan,
        no_surat: no_surat,
        no_surat_lama: no_surat_lama,
        no_so: no_so,
        no_po: no_po,
        no_inv: no_inv,
        upup: upup,
        kepada: kepada,
        jenis: "PL_pl_barang"
      }),
      dataType: "json",
      success: function(data) {
        $("#btn-simpan").prop("disabled", false);
        if (data.data == true) {

          // reloadTable();
          showNotification("alert-success", "Berhasil", "bottom", "center", "", "");
          // location.reload(true);

          kosong();
        } else {
          showNotification("alert-danger", data.msg, "bottom", "center", "", "");
        }
      }
    });
  }

  function view_detail(id) {

    $.ajax({
        url: '<?php echo base_url('Master/get_edit'); ?>',
        type: 'POST',
        data: {
          id: id,
          jenis: "PL_pl_pl"
        },
      })
      .done(function(data) {
        json = JSON.parse(data);

        // alert(json.header.no_surat);
        // $("#idid").val(json.header.id);
        $("#txt-tgl").html(json.header.tgl);
        $("#txt-no_surat").html(json.header.no_surat);
        $("#txt-no_so").html(json.header.no_so);
        $("#txt-no_po").html(json.header.no_po);
        $("#txt-no_inv").html(json.header.no_inv);

        $("#txt-up").html(json.header.up);
        $("#txt-nm_perusahaan").html(json.pt.nm_perusahaan);
        // $("#txt-nama").html(json.pt.pimpinan);
        $("#txt-npwp").html(json.pt.npwp);
        $("#txt-alamat_perusahaan").html(json.pt.alamat);
        $("#txt-no_telp").html(json.pt.no_telp);

        let idr = new Intl.NumberFormat();
        html = '';
        for (var i = 0; i < json.detail.length; i++) {
          ii = i + 1;
          html += '<tr><td><b>' + ii + '</b></td><td><b>' + json.detail[i].kode_barang + '</b></td><td><b>' + json.detail[i].nama_barang + '</b></td><td><b>' + json.detail[i].qty + ' ' + json.detail[i].qty_ket + '</b></td><td><b>' + json.detail[i].i_qty + '</b></td></tr>';
        }

        $("#list-timbangan").html(html);

        $("#modal-view-detail").modal("show");

      })

  }

  ///////// E D I T ///////////////

  function tampil_edit(id) {
    $(".box-data").hide();
    $(".box-form").show();
    $('.box-form').animateCss('fadeInDown');
    $("#judul").html('<h3>Form Edit Packing List</h3>');
    // $(".btn_list_barang").prop("disabled", true);
    status = "update";

    // alert(id);
    // view_edit(id);

    $.ajax({
        url: '<?php echo base_url('Master/get_edit'); ?>',
        type: 'POST',
        data: {
          id: id,
          // jenis: "edit_pl"
          jenis: "PL_pl_pl"
        },
      })
      .done(function(data) {
        json = JSON.parse(data);
        $("#btn-simpan").prop("disabled", false);

        $("#idid").val(json.header.id);
        $("#tgl").val(json.header.tgl);
        $("#laporan").val(json.header.laporan);
        $("#no_surat").val(json.header.no_surat);
        $("#no_surat_lama").val(json.header.no_surat);
        $("#no_so").val(json.header.no_so);
        $("#no_po").val(json.header.no_po);
        $("#no_inv").val(json.header.no_inv);
        $("#no_nota").val(json.header.no_nota);

        $("#upup").val(json.header.up);
        $("#kepada").val(json.pt.id);
        $("#id_kepada").val(json.pt.id);
        $("#nama_perusahaan").val(json.pt.nm_perusahaan);
        $("#pimpinan").val(json.pt.pimpinan);
        $("#npwp").val(json.pt.npwp);
        $("#alamat").val(json.pt.alamat);
        $("#no_telp").val(json.pt.no_telp);

        html = '';
        for (var i = 0 ; i < json.detail.length; i++) {
          ii = i+1;
          html += `<tr>
            <td><b>${ii}</b></td>
            <td><b>${json.detail[i].kode_barang}</b></td>
            <td><b>${json.detail[i].nama_barang}</b></td>
            <td><b>${parseInt(json.detail[i].qty)}</td>
            <td><input type="text" class="angka form-control" id="i_qty_edit${i}" placeholder="0" autocomplete="off"  onkeypress="return hanyaAngka(event)" value="${json.detail[i].i_qty}">
            <input type="hidden" id="qty_edit${i}" value="${json.detail[i].qty}"></b></td>
            <td style="text-align:center"><button type="button" onclick="addToCartEdit('${json.detail[i].id_list_barang}','${json.detail[i].id_m_brng}','${json.detail[i].id_pl}','${json.detail[i].qty}','${json.detail[i].i_qty}','${i}')" id="btnn-eedit${i}" class="btn btn-default btn-xs">Edit</button> <button type="button" onclick="HapusListBrng('${json.detail[i].id_list_barang}','${json.detail[i].id_pl}','${json.detail[i].kode_barang}','${json.detail[i].nama_barang}')" id="btnn-hhapus${i}" class="btn btn-danger btn-xs">Hapus</button></td>
          </tr>`;

          // <button type="button" onclick="HapusListBrng('${json.detail[i].id_list_barang}','${json.detail[i].id_pl}','${json.detail[i].kode_barang}','${json.detail[i].nama_barang}')" id="btnn-hhapus${i}" class="btn btn-danger btn-xs">Hapus</button>
        }

        // $("#detail_cart").html(`<div></div>`);
        $("#edit_detail_cart").html(html);

      })
  }

  function addToCartEdit(id,id_m_brng,id_pl,qtyAwal,iqtyAwal,i) {
    $("#btn-simpan").prop("disabled", false);
    $("#i_qty_edit" + i).prop("disabled", true).attr('style', 'background:#bbb;');
    $("#btnn-eedit" + i).prop("disabled", true);
    $("#btnn-hhapus" + i).prop("disabled", true);
    // $(".btn_list_barang").prop("disabled", true);

    qty = $("#qty_edit" + i).val();
    i_qty = $("#i_qty_edit" + i).val();

    stokAwal = parseInt(qtyAwal) + parseInt(iqtyAwal);
    ss_stok = parseInt(stokAwal) - parseInt(i_qty);

    // alert("ID:"+id+". qty:"+qty+". i_qty:"+i_qty+". stok: "+ss_stok);

    if (i_qty == 0 || i_qty == "") {
      swal("Input QTY Tidak Boleh Kosong", "", "error");
      $("#i_qty_edit" + i).prop("disabled", false).attr('style', 'background:#fff;');
      $("#btnn-eedit" + i).prop("disabled", false);
      $("#btnn-hhapus" + i).prop("disabled", false);
    } else if (ss_stok < 0) {
      swal("Melebihi STOK!!", "", "error");
      $("#i_qty_edit" + i).prop("disabled", false).attr('style', 'background:#fff;');
      $("#btnn-eedit" + i).prop("disabled", false);
      $("#btnn-hhapus" + i).prop("disabled", false);
    } else {
      // alert('eksekusi');
      $.ajax({
        type: "POST",
        url: '<?php echo base_url(); ?>Master/' + status,
        data: ({
            id: id,
            id_m_brng: id_m_brng,
            qty: ss_stok,
            i_qty: i_qty,
            jenis: "editPlListBarang"
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

  function HapusListBrng(id,id_pl,kd,nm){
    // alert(id+' '+kd+' '+nm);
    swal({
        title: "Apakah Anda Yakin ?",
        text: kd+' - '+nm,
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
              // id_m_brng: id_m_brng,
              // iqtyAwal: iqtyAwal,
              jenis: "hapusPListBrng"
            },
            success: function(data) {
              if (data == 1) {
                swal("Berhasil", "", "success");
                tampil_edit(id_pl);
              } else {
                swal("Data Batal dihapus", "", "error");
              }
            }
          });
        } else {
          swal("", "Data Batal dihapus", "error");
        }
      });
  }

  function deleteData(id, nm) {
    swal({
        title: "Apakah Anda Yakin ?",
        text: nm,
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
              jenis: "plpl"
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

  function kosong() {
    $("#judul").html('<h3> Form Tambah Data Packing List</h3>');
    $("#btn-print").hide();
    status = "insert";

    $("#idid").val("");
    $("#tgl").val("");
    $("#laporan").val("0");
    $("#no_surat").val("");
    $("#no_surat_lama").val("");
    $("#no_so").val("");
    $("#no_po").val("");
    $("#no_inv").val("");
    $("#no_nota").val("");

    $("#upup").val("");
    $("#kepada").val("");
    $("#id_kepada").val("");
    $("#nama_perusahaan").val("");
    $("#pimpinan").val("");
    $("#npwp").val("");
    $("#alamat").val("");
    $("#no_telp").val("");

    $("#btn-simpan").prop("disabled", false);
    $(".btn_list_barang").prop("disabled", false);
    $("#txt-btn-simpan").html("SIMPAN");
    $('#detail_cart').load("<?php echo base_url(); ?>Master/destroy_cart_plpl");
    $("#edit_detail_cart").html("");
  }

  function view_timbang(id) {
    // alert(id);
    var table = $('#datatable-view-timbang').DataTable();

    table.destroy();

    tabel = $('#datatable-view-timbang').DataTable({

      "processing": true,
      "pageLength": true,
      "paging": true,
      "ajax": {
        "url": '<?php echo base_url(); ?>Master/load_data',
        "data": ({
          jenis: "view_timbang",
          id: id
        }),
        "type": "POST"
      },
      responsive: true,
      "pageLength": 10,
      "language": {
        "emptyTable": "Tidak ada data.."
      },
      "order": [
        [2, "asc"]
      ]
    });

    $("#modal-view-timbang").modal("show");
  }

  $(".btn-tambah").click(function() { //
    id = $("#idid").val();

    load_barang(id);
    $("#btn-simpan").prop("disabled", true);

    $("#modal-tambah").modal("show");

  });

  function load_barang(id) {
    // alert(id);

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
          id: id,
          jenis: "list_pl_barang"
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

  function addToCart(id, kode_barang, nama_barang, qty, qty_ket, i) {
    $("#btn-simpan").prop("disabled", false);
    $("#i_qty" + i).prop("disabled", true).attr('style', 'background:#ddd;');
    $(".btn_list_barang").prop("disabled", true);

    qty = $("#qty" + i).val();
    i_qty = $("#i_qty" + i).val();

    ss_stok = qty - i_qty;

    // alert("ID:"+id+". qty:"+qty+". i_qty:"+i_qty+". stok: "+ss_stok);

    if (i_qty == 0 || i_qty == "") {
      swal("Input QTY Tidak Boleh Kosong", "", "error");
      $("#i_qty" + i).prop("disabled", false).attr('style', 'background:#fff;');
    } else if (ss_stok < 0) {
      swal("Melebihi STOK!!", "", "error");
      $("#i_qty" + i).prop("disabled", false).attr('style', 'background:#fff;');
    } else {
      $.ajax({
        url: "<?php echo base_url(); ?>Master/add_to_cart_pl_barang",
        method: "POST",
        data: {
          id_barang: id,
          kode_barang: kode_barang,
          nama_barang: nama_barang,
          qty: qty,
          qty_ket: qty_ket,
          i_qty: i_qty
        },
        success: function(data) {
          swal("Berhasil Ditambahkan", "", "success");
          $('#detail_cart').html(data);
          $(".btn_list_barang").prop("disabled", false);
        }
      });
    }
  }

  $(document).on('click', '.hapus_cart', function() {
    var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
    $.ajax({
      url: "<?php echo base_url(); ?>Master/hapus_cart_plpl",
      method: "POST",
      data: {
        // edit_cart:edit_cart,
        row_id: row_id
      },
      success: function(data) {
        $('#detail_cart').html(data);
        $(".btn_list_barang").prop("disabled", false);
      }
    });
  });

  function load_perusahaan(load_id) {

    $('#kepada').select2({
      // minimumInputLength: 3,
      allowClear: true,
      placeholder: '--select--',
      ajax: {
        dataType: 'json',
        url: '<?php echo base_url(); ?>/Master/loadCustPl',
        delay: 800,
        data: function(params) {
          if (params.term == undefined) {
            return {
              search: "",
              id_m: load_id
            }
          } else {
            return {
              search: params.term,
              id_m: load_id
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

  $('#kepada').on('change', function() {
    data = $('#kepada').select2('data');
    // $("#nama").val(data[0].text);
    $("#id_kepada").val(data[0].id);
    $("#pimpinan").val(data[0].pimpinan);
    $("#nama_perusahaan").val(data[0].nama_perusahaan);
    $("#npwp").val(data[0].npwp);
    $("textarea#alamat").val(data[0].alamat);
    $("#no_telp").val(data[0].no_telp);
  });

  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
</script>