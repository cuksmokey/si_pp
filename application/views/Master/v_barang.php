<section class="content">
  <div class="container-fluid">

    <!-- Exportable Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2>
              <ol class="breadcrumb">
                <li class="">Master Barang</li>
              </ol>
            </h2>

          </div>

          <div class="body">

            <div class="box-data">
              <table width="100%">
                <tr>
                  <td style="text-align:left">
                    <?php if ($this->session->userdata('level') <> "User") { ?>
                      <button type="button" class="btn-add btn btn-default btn-sm waves-effect">
                        <i class="material-icons">library_add</i>
                        <b><span>New</span></b>
                      </button>
                    <?php } ?>
                  </td>
                </tr>
              </table>
              
              <!-- <br><br> -->
              <br><br>
              <table id="datatable11" class="table table-bordered table-striped table-hover dataTable ">
                <thead>
                  <tr>
                    <th style="width:6%;">No</th>
                    <!-- <th>Tanggal</th>
                    <th>Supplier</th>
                    <th>No. Nota</th> -->
                    <th style="width:10%;">Kode Barang</th>
                    <th style="width:24%;">Nama Barang</th>
                    <th style="width:20%;">Merek</th>
                    <th style="width:20%;">Spesifikasi</th>
                    <!-- <th>Qty</th> -->
                    <!-- <th>Harga</th> -->
                    <th style="width:20%;">Aksi</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>

            <!-- box form -->
            <div class="box-form">
              <div id="judul"></div>
              <table width="80%">
                <tr>
                  <th style="border:0;padding:5px;width:10%"></th>
                  <th style="border:0;padding:5px;width:1%"></th>
                  <th style="border:0;padding:5px;width:30%"></th>
                  <th style="border:0;padding:5px"></th>
                </tr>
                <tr>
                  <td style="padding:10px"></td>
                </tr>
                <tr>
                  <td>Kode Barang</td>
                  <td>:</td>
                  <td style="vertical-align: top;">
                    <table style="width:100%" border="0">
                      <tr>
                        <td width="30%"><input type="text" id="id1" class="form-control" maxlength="5" autocomplete="off"></td>
                        <td style="text-align: center;" width="1%">/</td>
                        <td width="64%"><input type="text" id="id2" class="form-control" maxlength="15" autocomplete="off"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="padding:0 0 5px;vertical-align:top" colspan="2"><b>NOTE:</b> Penulisan <b>Kode Barang</b> dan <b>Nama Barang</b> Sebisa Mungkin Tanpa Menggunakan Simbol!<br>Simbol Kode Barang yang diperbolehkan hanya: <b>/</b>, <b>-</b>, dan <b>_</b></td>
                </tr>
                <tr>
                  <td>Nama Barang</td>
                  <td>:</td>
                  <td>
                    <input type="text" id="nama_barang" autocomplete="off" class="form-control">
                    <input type="hidden" value="" id="id">
                    <input type="hidden" value="" id="kode_barang_lama">
                    <input type="hidden" value="" id="id_m_barang_plus">
                    <input type="hidden" value="" id="supplier_lama">
                    <input type="hidden" value="" id="qty_plus_lama">
                  </td>
                  <!-- <td style="padding:5px"><b>NOTE:</b> Simbol Nama Barang yang diperbolehkan hanya: <b>-</b> , <b>_</b> ,dan <b>titik</b>(<b>.</b>)</td> -->
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="padding:0 0 5px;vertical-align:top" colspan="2"><b>NOTE:</b> Simbol <b>Nama Barang</b> yang diperbolehkan hanya: <b>-</b> , <b>_</b> ,dan <b>titik</b>(<b>.</b>)</td>
                </tr>
                <tr>
                  <td>Merek</td>
                  <td>:</td>
                  <td>
                    <input type="text" id="merek" autocomplete="off" class="form-control">
                  </td>
                </tr>
                <tr>
                  <td>Spesifikasi</td>
                  <td>:</td>
                  <td>
                    <input type="text" id="spesifikasi" autocomplete="off" class="form-control">
                  </td>
                </tr>
                <tr>
                  <td style="padding:10px"></td>
                </tr>
                <tr>
                  <td>Pilih </td>
                  <td>:</td>
                  <td>
                    <select class="form-control" id="supplier" style="width:100%">
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Supplier</td>
                  <td>:</td>
                  <td>
                    <input type="text" id="supplier_note" autocomplete="off" class="form-control" disabled="true" style="background:#ddd">
                    <input type="hidden" value="" id="id_supplier">
                  </td>
                </tr>
                <tr>
                  <td>No. Nota</td>
                  <td>:</td>
                  <td>
                    <input type="text" id="no_nota" autocomplete="off" class="form-control" disabled="true" style="background:#ddd">
                  </td>
                </tr>
                <tr>
                  <td style="padding:10px"></td>
                </tr>
                <tr>
                  <td>Tgl Masuk</td>
                  <td>:</td>
                  <td>
                    <input type="date" id="tgl" value="<?php echo date('Y-m-d') ?>" class="form-control">
                    <input type="hidden" value="" id="tgl_lama">
                  </td>
                </tr>
                <tr>
                  <td>Tgl Bayar</td>
                  <td>:</td>
                  <td>
                    <input type="date" id="tgl_byr" value="" class="form-control">
                    <input type="hidden" value="" id="tgl_byr_lama">
                    <input type="hidden" value="" id="status_plus_lama">
                  </td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td>:</td>
                  <td>
                    <select name="" id="status_plus" class="form-control" style="width:100%">
                      <option value="0">Pembayaran</option>
                      <option value="Cash">Cash</option>
                      <option value="Kredit">Kredit</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>KET</td>
                  <td>:</td>
                  <td>
                    <select name="" id="qty_ket" class="form-control" style="width:100%">
                      <option value="0">Keterangan</option>
                      <option value="Batang">Batang</option>
                      <option value="Lonjor">Lonjor</option>
                      <option value="PCS">PCS</option>
                      <option value="Box">Box</option>
                      <option value="Kaleng">Kaleng</option>
                      <option value="Lembar">Lembar</option>
                      <option value="Liter">Liter</option>
                      <option value="KG">KG</option>
                      <option value="Unit">Unit</option>
                      <option value="Set">Set</option>
                      <option value="PSG">PSG</option>
                      <option value="Meter">Meter</option>
                      <option value="Roll">Roll</option>
                      <option value="Roll">Pack</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td style="padding:10px"></td>
                </tr>
                <tr>
                  <td>QTY</td>
                  <td>:</td>
                  <td>
                    <input type="text" id="qty" placeholder="0" autocomplete="off" class="form-control" onkeypress="return hanyaAngka(event)">
                  </td>
                </tr>
                <tr>
                  <td>Tambah QTY</td>
                  <td>:</td>
                  <td>
                    <input type="text" id="plus_qty" autocomplete="off" placeholder="0" class="form-control" onkeypress="return hanyaAngka(event)">
                  </td>
                </tr>
                <tr>
                  <td>Edit QTY</td>
                  <td>:</td>
                  <td>
                    <input type="text" id="edit_qty" autocomplete="off" placeholder="0" class="form-control" onkeypress="return hanyaAngka(event)">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="padding:0 0 5px;vertical-align:top" colspan="2"><b>NOTE :</b><br>1. <b>Edit QTY</b> Hanya Bisa di Riwayat Pembelian Terkhir.<br>2. Kosongkan Kolom <b>Edit QTY</b> untuk <b>Hapus</b> Riwayat Pembelian Terakhir.<br>3. Jika <b>QTY Barang</b> lebih Kecil daripada <b>QTY Riwayat Pembelian Terakhir</b> tidak bisa <b>Edit QTY</b></td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td>:</td>
                  <td>
                    <input type="text" id="harga" placeholder="0" autocomplete="off" class="form-control" onkeypress="return hanyaAngka(event)">
                  </td>
                </tr>
                <tr>
                  <td style="padding:10px"></td>
                </tr>
                <tr>
                  <td colspan="5"><b>NOTE : TANGGAL MASUK, SUPPLIER, NO NOTA TIDAK ADA DATA YANG TEREKAM!! <br>Jika Data Tidak Sesuai, Bisa di Edit Terlebih Dahulu. ( Edit Data Hanya Bisa di Pembelian Terakhir!! ) <br><br><b>RIWAYAT PEMBELIAN :</b></td>
                </tr>
              </table>

<table class="table" style="background:#ddd">
  <thead>
    <tr>
      <th style="width:5%">No</th>
      <th style="width:12%">Tgl Masuk</th>
      <th style="width:12%">Tgl Bayar</th>
      <th style="width:12%">Supplier</th>
      <th style="width:12%">No Nota</th>
      <th style="width:11%">QTY</th>
      <th style="width:11%">KET</th>
      <th style="width:12%">Harga</th>
      <th style="width:12%">Pembayaran</th>
    </tr>
  </thead>
  <tbody id="detail_cart">
  </tbody>
</table>

              <!-- <button type="button" class="btn-kembali btn btn-dark btn-sm waves-effect waves-circle waves-float"> -->
              <br>
              <button type="button" class="btn-kembali btn btn-dark btn-default btn-sm waves-effect">
                <i class="material-icons">arrow_back</i>
                <b><span>BACK</span></b>
              </button> &nbsp;&nbsp;&nbsp;&nbsp;
              <button onclick="simpan()" id="btn-simpan" type="button" class="btn bg-light-green btn-sm waves-effect">
                <i class="material-icons">save</i>
                <b><span id="txt-btn-simpan">SIMPAN</span></b>
              </button> &nbsp;&nbsp;&nbsp;&nbsp;
              <button onclick="kosong()" type="button" class="btn btn-default btn-sm waves-effect">
                <i class="material-icons">note_add</i>
                <b><span>TAMBAH DATA</span></b>
              </button>
            </div>


          </div>


        </div>
      </div>
      <!-- #END# Exportable Table -->
    </div>
</section>

<!-- Large Size -->
<div class="modal fade" id="modal-view-detail" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="width: 150%; left: -200px">
      <div class="modal-header"></div>
        <div class="modal-body">
          <div class="box-add">
            <div>RIWAYAT PEMBELIAN :</div>
            <table  width="100%" class="table table-bordered table-striped table-hover dataTable ">
              <thead>
                <tr>
                  <th style="width:5%">No</th>
                  <th style="width:12%">Tgl Masuk</th>
                  <th style="width:12%">Tgl Bayar</th>
                  <th style="width:12%">Supplier</th>
                  <th style="width:12%">No Nota</th>
                  <th style="width:11%">QTY</th>
                  <th style="width:11%">KET</th>
                  <th style="width:12%">Harga</th>
                  <th style="width:12%">Pembayaran</th>
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
  opsi = '';
  $(document).ready(function() {
    $(".box-form").hide();
    load_data();
    load_supplier();

    $("input.angka").keypress(function(event) { //input text number only
      return /\d/.test(String.fromCharCode(event.keyCode));
    });


  });

  $("#id1").on({
    keydown: function(e) {
      if (e.which === 32)
        return false;
    },
    keyup: function() {
      this.value = this.value.toUpperCase();
    },
    change: function() {
      this.value = this.value.replace(/\s/g, "");

    }
  });

  $("#id2").on({
    keydown: function(e) {
      if (e.which === 32)
        return false;
    },
    keyup: function() {
      this.value = this.value.toUpperCase();
    },
    change: function() {
      this.value = this.value.replace(/\s/g, "");

    }
  });

  $(".btn-add").click(function() {
    status = 'insert';
    kosong();
    // getmax();
    $(".box-data").hide();
    $(".box-form").show();
    $("#judul").html('<h3>Form Tambah Data Barang</h3>');
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

  function load_data() {
    var table = $('#datatable11').DataTable();

    table.destroy();

    tabel = $('#datatable11').DataTable({ //

      "processing": true,
      "pageLength": true,
      "paging": true,
      "ajax": {
        "url": '<?php echo base_url(); ?>Master/load_data',
        "data": ({
          jenis: "Load_Barang"
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

  function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
  }

  function view_detail(id,opsi){
    
    $.ajax({
        url: '<?php echo base_url('Master/get_edit'); ?>',
        type: 'POST',
        data: {id: id,jenis:"list_barang_plus"},
    })
    .done(function(data) {
        json = JSON.parse(data);
        html = '';
        for (var i = 0 ; i < json.header.length; i++) {
          ii = i+1;

          html +='<tr><td>'+ii+'</td><td>'+json.header[i].tgl_masuk+'</td><td>'+json.header[i].tgl_bayar+'</td><td>'+json.header[i].nama_supplier+'</td><td>'+json.header[i].no_nota+'</td><td>'+json.header[i].qty_plus+'</td><td>'+json.header[i].qty_ket+'</td><td>'+formatNumber(json.header[i].harga)+'</td><td>'+json.header[i].status+'</td></tr>';
        }

        if(opsi == "2"){
          $("#list-timbangan").html(html);
          $("#modal-view-detail").modal("show");
        }else{
          $("#detail_cart").html(html);
        }

    });

  }

  function simpan() {
    id = $("#id").val();
    id_m_barang_plus = $("#id_m_barang_plus").val();
    tgl = $("#tgl").val();
    tgl_lama = $("#tgl_lama").val();

    supplier = $("#id_supplier").val();
    supplier_note = $("#supplier_note").val();
    no_nota = $("#no_nota").val();

    kode_barang = $("#id1").val() + "/" + $("#id2").val();
    kb1 = $("#id1").val();
    kb2 = $("#id2").val();
    kode_barang_lama = $("#kode_barang_lama").val();
    nama_barang = $("#nama_barang").val();
    merek = $("#merek").val();
    spesifikasi = $("#spesifikasi").val();

    tgl_byr = $("#tgl_byr").val();
    tgl_byr_lama = $("#tgl_byr_lama").val();
    status_plus = $("#status_plus").val();
    status_plus_lama = $("#status_plus_lama").val();

    i_qty = $("#qty").val();
    i_plus_qty = $("#plus_qty").val();
    e_plus_qty = $("#edit_qty").val();
    qty_lama = $("#qty_plus_lama").val();

    qty_ket = $("#qty_ket").val();
    i_harga = $("#harga").val();

    k_qty = i_qty.split(".").join("");
    ii_plus_qty = i_plus_qty.split(".").join("");
    ee_plus_qty = e_plus_qty.split(".").join("");

    if (ii_plus_qty == "") {
      k_plus_qty = 0;
    } else {
      k_plus_qty = ii_plus_qty;
    }

    if (ee_plus_qty == "") {
      k_edit_qty = 0;
    } else {
      k_edit_qty = ee_plus_qty;
    }

    harga = i_harga.split(".").join("");

    if(qty_lama <= 0){
      qty = Number.parseInt(k_qty) + Number.parseInt(k_plus_qty);
    }else{
      qty = Number.parseInt(k_qty) + Number.parseInt(k_plus_qty) + Number.parseInt(k_edit_qty);
    }

    qty_plus = Number.parseInt(k_plus_qty);
    qty_edit = Number.parseInt(k_edit_qty);

    if (tgl == "" || kode_barang == "" || kb1 == "" || kb2 == "" || nama_barang == "" || merek == "" || spesifikasi == "" || supplier_note == "" || i_qty == "" || qty_ket == "" || qty_ket == 0 || no_nota == "" || status_plus == "" || status_plus == 0 || tgl_byr == "") {
      showNotification("alert-info", "Harap Lengkapi Form", "bottom", "center", "", "");
      return;
    }

    // alert(supplier);

    $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>Master/' + status,
      data: ({
        id: id,
        id_m_barang_plus: id_m_barang_plus,
        tgl: tgl,
        tgl_lama: tgl_lama,
        supplier: supplier,
        kode_barang: kode_barang,
        kode_barang_lama: kode_barang_lama,
        nama_barang: nama_barang,
        merek: merek,
        spesifikasi: spesifikasi,
        qty: qty,
        qty_plus: qty_plus,
        qty_edit: qty_edit,
        tgl_byr: tgl_byr,
        tgl_byr_lama: tgl_byr_lama,
        status_plus: status_plus,
        status_plus_lama: status_plus_lama,
        qty_ket: qty_ket,
        harga: harga,
        opsi: opsi,
        jenis: "Simpan_Barang"
      }),
      dataType: "json",
      success: function(data) {
        // $("#btn-simpan").prop("disabled", true);
        if (data.data == true) {

          reloadTable();
          view_detail(id);
          showNotification("alert-success", data.msg, "bottom", "center", "", "");

          status = 'update';
          $("#btn-simpan").prop("disabled", true);

        } else {
          showNotification("alert-danger", data.msg, "bottom", "center", "", "");
          $("#btn-simpan").prop("disabled", false);
        }
      }
    });
  }

  ///////// E D I T ///////////////

  function tampil_edit(id) {
    $(".box-data").hide();
    $(".box-form").show();
    $('.box-form').animateCss('fadeInDown');
    $("#judul").html('<h3>Form Edit Data Barang</h3>');
    $("#supplier").val("");
    $("#supplier_note").val("");
    $("#no_nota").val("");

    status = "update";
    opsi = "edit";

    // alert(id);
    view_detail(id);

    $.ajax({
        url: '<?php echo base_url('Master/get_edit'); ?>',
        type: 'POST',
        data: {
          id: id,
          jenis: "edit_barang"
        },
      })
      .done(function(data) {
        json = JSON.parse(data);
        $("#btn-simpan").prop("disabled", false);

        a = json.kode_barang.split("/");

        // $("#supplier").val("").prop("disabled", true).attr('style', 'background:#ddd;');

        $("#id1").val(a[0]).prop("disabled", false).attr('style', 'background:#fff;');
        $("#id2").val(a[1]).prop("disabled", false).attr('style', 'background:#fff;');

        $("#id").val(json.id);
        $("#id_m_barang_plus").val(json.id_m_barang_plus);

        $("#tgl").val(json.tgl).prop("disabled", false).attr('style', 'background:#fff;');
        $("#tgl_lama").val(json.tgl);
        $("#kode_barang_lama").val(json.kode_barang);
        $("#id_supplier").val(json.id_m_nota);
        $("#supplier_note").val(json.nama_supplier);
        $("#no_nota").val(json.no_nota);

        $("#nama_barang").val(json.nama_barang).prop("disabled", false).attr('style', 'background:#fff;');
        $("#merek").val(json.merek).prop("disabled", false).attr('style', 'background:#fff;');
        $("#spesifikasi").val(json.spesifikasi).prop("disabled", false).attr('style', 'background:#fff;');

        $("#tgl_byr").val(json.tgl_bayar);
        $("#tgl_byr_lama").val(json.tgl_bayar);
        $("#status_plus").val(json.status);
        $("#status_plus_lama").val(json.status);

        $("#plus_qty").val("").prop("disabled", true).attr('style', 'background:#ddd;');

        let edit_qtyy = json.qty - json.qty_plus;
        $("#qty_plus_lama").val(edit_qtyy);

        if(edit_qtyy <= 0){
          $("#qty").val(json.qty).prop("disabled", true).attr('style', 'background:#ddd;');
          $("#edit_qty").val(json.qty_plus).prop("disabled", true).attr('style', 'background:#ddd;');
        }else{
          $("#qty").val(edit_qtyy).prop("disabled", true).attr('style', 'background:#ddd;');
          $("#edit_qty").val(json.qty_plus).prop("disabled", false).attr('style', 'background:#fff;');
        }

        $("#qty_ket").val(json.qty_ket);
        $("#harga").val(json.harga);
      })
  }

  ///////// P L U S  Q T Y ///////////////

  function plus_qty(id) { //
    $(".box-data").hide();
    $(".box-form").show();
    $('.box-form').animateCss('fadeInDown');
    $("#judul").html('<h3>Form Edit Data Barang</h3>');
    $("#supplier").val("");
    $("#supplier_note").val("");
    $("#no_nota").val("");

    status = "update";
    opsi = "add_qty";

    // alert(id);
    view_detail(id);

    $.ajax({
        url: '<?php echo base_url('Master/get_edit'); ?>',
        type: 'POST',
        data: {
          id: id,
          jenis: "edit_barang"
        },
      })
      .done(function(data) {
        json = JSON.parse(data);
        $("#btn-simpan").prop("disabled", false);

        a = json.kode_barang.split("/");

        // $("#supplier").val("").prop("disabled", true).attr('style', 'background:#ddd;');

        $("#id1").val(a[0]).prop("disabled", true).attr('style', 'background:#ddd;');
        $("#id2").val(a[1]).prop("disabled", true).attr('style', 'background:#ddd;');

        $("#id").val(json.id);
        $("#id_m_barang_plus").val(json.id_m_barang_plus);

        $("#tgl").val(json.tgl).prop("disabled", false).attr('style', 'background:#fff;');
        $("#tgl_lama").val(json.tgl);
        $("#id_supplier").val(json.id_m_nota);
        $("#supplier_note").val(json.nama_supplier);
        $("#no_nota").val(json.no_nota);

        $("#nama_barang").val(json.nama_barang).prop("disabled", true).attr('style', 'background:#ddd;');
        $("#merek").val(json.merek).prop("disabled", true).attr('style', 'background:#ddd;');
        $("#spesifikasi").val(json.spesifikasi).prop("disabled", true).attr('style', 'background:#ddd;');

        $("#tgl_byr").val(json.tgl_bayar);
        $("#tgl_byr_lama").val(json.tgl_bayar);
        $("#status_plus").val(json.status);
        $("#status_plus_lama").val(json.status);
        $("#qty_plus_lama").val(json.qty);

        $("#qty").val(json.qty).prop("disabled", true).attr('style', 'background:#ddd;');
        $("#plus_qty").val("").prop("disabled", false).attr('style', 'background:#fff;');
        $("#edit_qty").val("").prop("disabled", true).attr('style', 'background:#ddd;');

        $("#qty_ket").val(json.qty_ket);
        $("#harga").val(json.harga);
      })
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
              jenis: "hapus_barang"
            },
            success: function(data) {
              if (data == 1) {
                swal("Berhasil", "", "success");
                reloadTable();
              } else {
                swal("Gagal", "", "error");
              }
            }
          });
        } else {
          swal("", "Data Batal dihapus", "error");
        }
      });

  }

  function kosong() {

    status = "insert";
    opsi = "";

    $("#id").val("");
    $("#id_m_barang_plus").val("");

    $("#tgl").val("").prop("disabled", false).attr('style', 'background:#fff;');
    $("#tgl_lama").val("");
    $("#id1").val("").prop("disabled", false).attr('style', 'background:#fff;');
    $("#id2").val("").prop("disabled", false).attr('style', 'background:#fff;');
    $("#kode_barang_lama").val("");
    $("#nama_barang").val("").prop("disabled", false).attr('style', 'background:#fff;');
    $("#merek").val("").prop("disabled", false).attr('style', 'background:#fff;');
    $("#spesifikasi").val("").prop("disabled", false).attr('style', 'background:#fff;');
    $("#id_supplier").val("");
    $("#supplier").val("").prop("disabled", false).attr('style', 'background:#fff;');
    $("#supplier_note").val("");
    $("#no_nota").val("");
    $("#supplier_lama").val("");
    $("#qty_plus_lama").val("");
    $("#qty").val("").prop("disabled", false).attr('style', 'background:#fff;');
    $("#plus_qty").val("").prop("disabled", true).attr('style', 'background:#ddd;');
    $("#edit_qty").val("").prop("disabled", true).attr('style', 'background:#ddd;');
    $("#qty_ket").val("0").prop("disabled", false).attr('style', 'background:#fff;');
    $("#harga").val("").prop("disabled", false).attr('style', 'background:#fff;');

    $("#tgl_byr").val("").prop("disabled", false).attr('style', 'background:#fff;');
    $("#tgl_byr_lama").val("");
    $("#status_plus").val("0").prop("disabled", false).attr('style', 'background:#fff;');
    $("#status_plus_lama").val("0");

    $("#btn-simpan").prop("disabled", false);
    $("#txt-btn-simpan").html("SIMPAN");

    $("#detail_cart").html("");
  }

  function load_supplier() {

    $('#supplier').select2({
      // minimumInputLength: 3,
      allowClear: true,
      placeholder: 'SELECT',
      ajax: {
        dataType: 'json',
        url: '<?php echo base_url(); ?>/Master/laod_supplier_nota',
        delay: 800,
        data: function(params) {
          if (params.term == undefined) {
            return {
              search: ""
            }
          } else {
            return {
              search: params.term
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

  $('#supplier').on('change', function() {
    data = $('#supplier').select2('data');
    $("#supplier_note").val(data[0].nama_supplier);
    $("#id_supplier").val(data[0].id);
    $("#no_nota").val(data[0].no_nota);
  });

  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }

  /* Fungsi formatRupiah */
  function formatRupiah(angka) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split = number_string.split(','),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    return rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    // return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }

  let qty = document.getElementById('qty');
  qty.addEventListener('keyup', function(e) {
    qty.value = formatRupiah(this.value);
  });

  let harga = document.getElementById('harga');
  harga.addEventListener('keyup', function(e) {
    harga.value = formatRupiah(this.value);
  });
</script>