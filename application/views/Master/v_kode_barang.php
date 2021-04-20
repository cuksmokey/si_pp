<section class="content">
  <div class="container-fluid">
    <!-- Exportable Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2>
              <ol class="breadcrumb">
                <li class="">Master Kode Barang</li>
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
                    <th style="width:10%;">Kode Barang</th>
                    <th style="width:24%;">Nama Barang</th>
                    <th style="width:20%;">Merek</th>
                    <th style="width:20%;">Spesifikasi</th>
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
                        <td width="40%"><input type="text" id="id1" class="form-control kd_barang" maxlength="10" autocomplete="off"></td>
                        <td style="text-align: center;" width="1%">/</td>
                        <td width="60%"><input type="text" id="id2" class="form-control kd_barang" maxlength="15" autocomplete="off"></td>
                        <td>
                      </tr>
                    </table>
                  </td>
                  <!-- <td>
                    <button onclick="cariKodeBarang()" type="button" class="btn btn-sm waves-effect" style="background:#287FB8;color:#fff">
                      <i class="material-icons">search</i>
                      <b><span>CARI</span></b>
                    </button>
                    <div class="cek-kd-barang"></div>
                  </td> -->
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="padding:0 0 5px;vertical-align:top" colspan="2"><b>NOTE:</b> Penulisan <b>Kode Barang</b> dan <b>Nama Barang</b> Sebisa Mungkin Tanpa Menggunakan Simbol!<br>Simbol Kode Barang yang diperbolehkan hanya: <b>-</b>, dan <b>_</b></td>
                </tr>
                <tr>
                  <td>Nama Barang</td>
                  <td>:</td>
                  <td>
                    <input type="text" id="nama_barang" autocomplete="off" class="form-control">
                    <input type="hidden" value="" id="id">
                    <input type="hidden" value="" id="kode_barang_lama">
                    <!-- <input type="hidden" value="" id="id_m_barang_plus"> -->
                  </td>
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
              </table>

              <br>
              <button type="button" class="btn-kembali btn btn-dark btn-default btn-sm waves-effect">
                <i class="material-icons">arrow_back</i>
                <b><span>BACK</span></b>
              </button>
              <button onclick="kosong()" type="button" class="btn btn-default btn-sm waves-effect">
                <i class="material-icons">note_add</i>
                <b><span>TAMBAH DATA</span></b>
              </button>
              <button onclick="simpan()" id="btn-simpan" type="button" class="btn btn-sm waves-effect" style="background:#287FB8;color:#FFF">
                <i class="material-icons">save</i>
                <b><span id="txt-btn-simpan">SIMPAN</span></b>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- #END# Exportable Table -->
    </div>
</section>

<script>
  status = '';
  opsi = '';
  $(document).ready(function() {
    $(".box-form").hide();
    load_data();
    // load_supplier();

    $("input.angka").keypress(function(event) { //input text number only
      return /\d/.test(String.fromCharCode(event.keyCode));
    });
  });

  $(".kd_barang").keyup(function(){
    ckb1 = $("#id1").val();
    ckb2 = $("#id2").val();
    ckb = $("#id1").val() + "/" + $("#id2").val();
    kode_barang_lama = $("#kode_barang_lama").val();
    // alert(cariKdB);
    $.ajax({
      url: '<?php echo base_url(); ?>Master/cariKdBarang',
      type: 'POST',
      data: {
        status: status,
        kode_barang_lama: kode_barang_lama,
        ckb: ckb
      },
      success: function(data) {
        json = JSON.parse(data);

        if (json.data == 'kosong') {
          if(ckb1 == "" || ckb2 == ""){
            $(".cek-kd-barang").html(" ")
          }
        }else if (json.data == 'oke') {
          $(".cek-kd-barang").html(`<div style="margin-left:5px;padding:5px;background:#2B982B;color:#FFF;display:inline-block">OKE</div>`)
          if(ckb1 == "" || ckb2 == ""){
            $(".cek-kd-barang").html(" ")
          }
        }else{
          $(".cek-kd-barang").html(`<div style="margin-left:5px;padding:5px;background:#FB483A;color:#FFF;display:inline-block">SUDAH TERPAKAI</div>`)
          if(ckb1 == "" || ckb2 == ""){
            $(".cek-kd-barang").html(" ")
          }
        }

      }
    })
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
    $("#judul").html('<h3>Form Tambah Kode Barang</h3>');
    $('.box-form').animateCss('fadeInDown');
  });

  $(".btn-kembali").click(function() {
    $(".box-form").hide();
    $(".box-data").show();
    $('.box-data').animateCss('fadeIn');
    kosong();
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
          jenis: "loadKodeBarang"
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

  function simpan() {
    id = $("#id").val();
    kb1 = $("#id1").val();
    kb2 = $("#id2").val();
    kode_barang = $("#id1").val() + "/" + $("#id2").val();
    kode_barang_lama = $("#kode_barang_lama").val();
    nama_barang = $("#nama_barang").val();
    merek = $("#merek").val();
    spesifikasi = $("#spesifikasi").val();

    if (kode_barang == "" || kb1 == "" || kb2 == "") {
      showNotification("alert-danger", "Kode Barang Kosong!", "top", "center", "", "");
      return;
    }
    if (nama_barang == "") {
      showNotification("alert-danger", "Nama Barang Kosong!", "top", "center", "", "");
      return;
    }
    if (merek == "") {
      showNotification("alert-danger", "Merek Kosong!", "top", "center", "", "");
      return;
    }
    if (spesifikasi == "") {
      showNotification("alert-danger", "Spesifikasi Kosong!", "top", "center", "", "");
      return;
    }

    // alert(kode_barang_lama);

    $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>Master/simpanKdBarang',
      data: ({
        id: id,
        kode_barang: kode_barang,
        kode_barang_lama: kode_barang_lama,
        nama_barang: nama_barang,
        merek: merek,
        spesifikasi: spesifikasi,
        status: status
      }),
      dataType: "json",
      success: function(data) {
        if (data.data == true) {
          showNotification("alert-success", data.msg, "bottom", "center", "", "");
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
    // $('.box-form').animateCss('fadeInDown');
    $("#judul").html('<h3>Form Edit Kode Barang</h3>');
    $(".cek-kd-barang").html(" ")
    
    status = "update";
    opsi = "edit";

    $.ajax({
        url: '<?php echo base_url('Master/get_edit'); ?>',
        type: 'POST',
        data: {
          id: id,
          jenis: "editKdBarang"
        },
      })
      .done(function(data) {
        json = JSON.parse(data);
        $("#btn-simpan").prop("disabled", false);
        a = json.kode_barang.split("/");

        $("#id1").val(a[0]).prop("disabled", false).attr('style', 'background:#fff;');
        $("#id2").val(a[1]).prop("disabled", false).attr('style', 'background:#fff;');

        $("#id").val(json.id);

        $("#kode_barang_lama").val(json.kode_barang);
        $("#nama_barang").val(json.nama_barang).prop("disabled", false).attr('style', 'background:#fff;');
        $("#merek").val(json.merek).prop("disabled", false).attr('style', 'background:#fff;');
        $("#spesifikasi").val(json.spesifikasi).prop("disabled", false).attr('style', 'background:#fff;');
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
              kode: true,
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
    $("#id1").val("").prop("disabled", false).attr('style', 'background:#fff;');
    $("#id2").val("").prop("disabled", false).attr('style', 'background:#fff;');
    $("#kode_barang_lama").val("");
    $("#nama_barang").val("").prop("disabled", false).attr('style', 'background:#fff;');
    $("#merek").val("").prop("disabled", false).attr('style', 'background:#fff;');
    $("#spesifikasi").val("").prop("disabled", false).attr('style', 'background:#fff;');

    $("#btn-simpan").prop("disabled", false);
    $(".cek-kd-barang").html(" ")
    $("#txt-btn-simpan").html("SIMPAN");

  }

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