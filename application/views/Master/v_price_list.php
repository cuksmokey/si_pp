<section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <ol class="breadcrumb">
                                    <li class="">Price List</li>
                                </ol>
                            </h2>
                        </div>

                        <div class="body">
                            <div class="box-data">
                              <table width="100%">
                                <tr>
                                  <td align="left"> <button type="button" class="btn-add btn btn-default btn-sm waves-effect">
                                        <i class="material-icons">library_add</i>
                                        <b><span>New</span></b>
                                    </button>
                                  </td>
                                </tr>
                              </table>
                            
                              <br><br>
                                <table id="datatable11" class="table table-bordered table-striped table-hover dataTable ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Merek</th>
                                            <th>Spesifikasi</th>
                                            <th>Supplier</th>
                                            <th>Harga Price List</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>

                            <!-- box form -->
                            <div class="box-form">
                                <div id="judul"></div>
                                <table width="70%">
                                <tr>
                                      <th style="border:0;padding:5px;width:15%"></th>
                                      <th style="border:0;padding:5px;width:1%"></th>
                                      <th style="border:0;padding:5px;width:30%"></th>
                                      <th style="border:0;padding:5px"></th>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>:</td>
                                        <td>
                                            <input type="date" id="tgl" value="<?php echo date('Y-m-d') ?>"  class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kode Barang</td>
                                        <td>:</td>
                                        <td>
                                            <!-- <input type="text" id="kode_barang" autocomplete="off" class="form-control"> -->
                                            <select class="form-control" id="kode_barang" style="width:100%">
                                           </select>
                                           <input type="hidden" id="kode_barang_lama" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Barang</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" id="nama_barang" autocomplete="off" class="form-control" disabled="true">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Merek</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" id="merek" autocomplete="off" class="form-control" disabled="true">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Spesifikasi</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" id="spesifikasi" autocomplete="off" class="form-control" disabled="true">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Supplier</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" id="supplier" autocomplete="off" class="form-control" disabled="true">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><hr>Perhitungan<hr></td>
                                    </tr>
                                    <tr>
                                        <td>Harga Barang</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" id="harga_awal_barang" autocomplete="off" placeholder="0" class="form-control" style="text-align:right" onkeypress="return hanyaAngka(event)" onKeyUp="hitung_awal()">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Profit</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" id="profit" autocomplete="off" placeholder="0" class="form-control" style="text-align:right" onKeyUp="hitung_awal()">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ongkos Kirim</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" id="ongkir" autocomplete="off" placeholder="0" class="form-control" style="text-align:right" onkeypress="return hanyaAngka(event)" onKeyUp="hitung_awal()">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HJ Netto</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" id="hasil_harga_awal" autocomplete="off" placeholder="0" class="form-control" style="text-align:right;background:#ddd" disabled="true" onKeyUp="hitung_awal()">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mark Up</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" id="mark_up" autocomplete="off" placeholder="0" class="form-control" style="text-align:right" onKeyUp="hitung_mark_up()">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Harga Sementara</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" id="harga_sementara" autocomplete="off" placeholder="0" class="form-control" style="text-align:right;background:#ddd" disabled="true" onKeyUp="hitung_mark_up()">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pembulatan</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" id="pembulatan" autocomplete="off" placeholder="0" class="form-control" style="text-align:right" onkeypress="return hanyaAngka(event)" onKeyUp="hitung_pembulatan()">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Harga Price List</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" id="harga_price_list" autocomplete="off" placeholder="0" class="form-control" style="text-align:right;background:#ddd;color:#000" disabled="true" onKeyUp="hitung_pembulatan()">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="right">
                                            <br>
                                            
                                        </td>
                                    </tr>
                                </table>
                               
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

<script>
  status = '';
    $(document).ready(function(){
      $(".box-form").hide();
     load_data();
     load_perusahaan();

    $("input.angka").keypress(function(event) { //input text number only
            return /\d/.test(String.fromCharCode(event.keyCode));
      });
    });

    $(".btn-add").click(function(){
        status = 'insert';
        kosong();
        // getmax();
        $(".box-data").hide();
        $(".box-form").show();
        $("#judul").html('<h3>Form Tambah Data Price List</h3>');
      $('.box-form').animateCss('fadeInDown');
    });

    $(".btn-kembali").click(function(){
        $(".box-form").hide();
        $(".box-data").show();
        $('.box-data').animateCss('fadeIn');
        load_data();
    });

    function reloadTable(){
      table = $('#datatable11').DataTable();
       tabel.ajax.reload(null,false);
   }

    function load_data(){
      var table = $('#datatable11').DataTable();

      table.destroy();

      tabel = $('#datatable11').DataTable({
            "processing": true,
            "pageLength":true,
            "paging": true,
            "ajax": {
                "url" : '<?php echo base_url(); ?>Master/load_data' ,
                "data" : ({jenis:"load_price_list"}),
                "type": "POST"
            },
            responsive: true,
            "pageLength": 10,
            "language": {
                    "emptyTable":     "Tidak ada data.."
                },
            "order": [[ 0, "asc" ]]
            });
    }


    function simpan(){
      tgl = $("#tgl").val();
      // kode_barang = $("#kode_barang").val();
      data = $('#kode_barang').select2('data');
      kode_barang = data[0].text;
      nama_barang = $("#nama_barang").val();
      kode_barang_lama = $("#kode_barang_lama").val();
      merek = $("#merek").val();
      spesifikasi = $("#spesifikasi").val();
      supplier = $("#supplier").val();
      harga_price_list = $("#harga_price_list").val().split(".").join("");

      if (tgl == "" || kode_barang == "" || nama_barang == "" || merek == "" || spesifikasi == "" || supplier == "" || harga_awal_barang == "" || profit == "" || ongkir == "" || hasil_harga_awal == "" || mark_up == "" || harga_sementara == "" || pembulatan == "" || harga_price_list == "")  {
        showNotification("alert-info", "Harap Lengkapi Form", "bottom", "center", "", ""); return;
      }

      $("#btn-simpan").prop("disabled",true);

      // alert(kode_barang_lama);
      $.ajax({
          type     : "POST",
          url      : '<?php echo base_url(); ?>Master/'+status,
          data     : ({
            tgl : tgl,
            kode_barang : kode_barang,
            kode_barang_lama : kode_barang_lama,
            nama_barang : nama_barang,
            merek : merek,
            spesifikasi : spesifikasi,
            supplier : supplier,
            harga_price_list : harga_price_list,
            jenis : "Simpan_Price_List" }),
          dataType : "json",
          success  : function(data){
            $("#btn-simpan").prop("disabled",true);
            if (data.data == true) {
              
              reloadTable();
              showNotification("alert-success", "Berhasil", "bottom", "center", "", "");
              
              status = 'update';

            }else{
              showNotification("alert-danger", data.msg, "bottom", "center", "", "");
            }
          }
      });
    }

    function tampil_edit(id){
    $(".box-data").hide();
    $(".box-form").show();
    $('.box-form').animateCss('fadeInDown');
    $("#judul").html('<h3> Form Edit Data</h3>');

    status = "update";

         $.ajax({
              url: '<?php echo base_url('Master/get_edit'); ?>',
              type: 'POST',
              data: {id: id,jenis:"edit_price_list"},
          })
          .done(function(data) {
              json = JSON.parse(data);
              $("#btn-simpan").prop("disabled",false);

              $("#profit").val("");
              $("#ongkir").val("");
              $("#hasil_harga_awal").val("");
              $("#mark_up").val("");
              $("#harga_sementara").val("");
              $("#pembulatan").val("");
              $("#harga_price_list").val("");

              $("#tgl").val(json.tgl);
              $("#kode_barang").val(json.kode_barang);
              $("#kode_barang_lama").val(json.kode_barang);
              $("#nama_barang").val(json.nama_barang);
              $("#merek").val(json.merek);
              $("#spesifikasi").val(json.spesifikasi);
              $("#supplier").val(json.supplier);
              $("#harga_awal_barang").val(json.harga_price_list);
          }) 

    }

    function deleteData(id,nm){
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
              url   : '<?php echo base_url(); ?>Master/hapus/',
              type  : "POST",
              data  : {id: id,jenis:"Perusahaan"},
              success : function(data){
                if (data == 1) {
                swal("Berhasil", "", "success");
                reloadTable();

                }else{
                  swal("Data Sudah dilakukan transaksi", "", "error");
                }
              }
            });
            
          } else {
            swal("", "Data Batal dihapus", "error");
          }
        });

    }

    function kosong(){
      $("#judul").html('<h3> Form Tambah Data</h3>');
      status = "insert";

      $("#tgl").val("");
      $("#kode_barang").val("");
      $("#nama_barang").val("");
      $("#merek").val("");
      $("#spesifikasi").val("");
      $("#supplier").val("");
      $("#harga_awal_barang").val("");
      $("#profit").val("");
      $("#ongkir").val("");
      $("#hasil_harga_awal").val("");
      $("#mark_up").val("");
      $("#harga_sementara").val("");
      $("#pembulatan").val("");
      $("#harga_price_list").val("");

      $("#btn-simpan").prop("disabled",false);
      $("#txt-btn-simpan").html("SIMPAN");
    }

    function load_perusahaan(){
    
    $('#kode_barang').select2({
         // minimumInputLength: 3,
         allowClear: true,
         placeholder: '--select--',
         ajax: {
            dataType: 'json',
            url      : '<?php echo base_url(); ?>/Master/load_m_barang_pl',
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

 $('#kode_barang').on('change', function() {
    data = $('#kode_barang').select2('data');
    // $("#tgl").val(data[0].tgl);
    $("#nama_barang").val(data[0].nama_barang);
    $("#merek").val(data[0].merek);
    $("#spesifikasi").val(data[0].spesifikasi);
    $("#supplier").val(data[0].supplier);
    $("#harga_awal_barang").val(data[0].harga);
  });

    function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
		    return false;
		  return true;
		}
 
		function formatRupiah(angka){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			return rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    }
    
    function tampilIdr(angka){
			var number_string = angka.toString(),
			sisa     	     	  = number_string.length % 3,
			rupiah     		    = number_string.substr(0, sisa),
			ribuan     		    = number_string.substr(sisa).match(/\d{3}/gi);

			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			return rupiah == undefined ? rupiah : (rupiah ? rupiah : '');
		}

    var i_harga_awal_barang = document.getElementById('harga_awal_barang');
		i_harga_awal_barang.addEventListener('keyup', function(e){
			i_harga_awal_barang.value = formatRupiah(this.value);
    });
    
    var ongkir = document.getElementById('ongkir');
		ongkir.addEventListener('keyup', function(e){
			ongkir.value = formatRupiah(this.value);
    });
    
    function hitung_awal(){
      // harga awal
      var get_hab = document.getElementById('harga_awal_barang').value.split(".").join("");
      var t_hab = Number.parseInt(get_hab);

      // profit
      var get_p = Number.parseFloat(document.getElementById('profit').value);

      //ongkir
      var get_o = document.getElementById('ongkir').value.split(".").join("");
      var t_o = Number.parseInt(get_o);

      // perhitungan
      var hab = Math.floor((t_hab / get_p) + t_o);

      if(isNaN(t_hab) || isNaN(get_p) || isNaN(t_o)){
        document.getElementById('hasil_harga_awal').value = "0";
      }else{
        document.getElementById('hasil_harga_awal').value = tampilIdr(hab);
      }
    }

    function hitung_mark_up(){
      // ambil harga awal
      var get_hha = document.getElementById('hasil_harga_awal').value.split(".").join("");
      var t_hha = Number.parseInt(get_hha);

      // mark_up
      var get_mu = Number.parseFloat(document.getElementById('mark_up').value);

      // perhitungan
      var hs = Math.floor(t_hha / get_mu);
      if(isNaN(t_hha) || isNaN(get_mu)){
        document.getElementById('harga_sementara').value = "0";
      }else{
        document.getElementById('harga_sementara').value = tampilIdr(hs);
      }
    }

    function hitung_pembulatan(){
      // ambil harga awal
      var get_hs = document.getElementById('harga_sementara').value.split(".").join("");
      var t_hs = Number.parseInt(get_hs);

      // mark_up
      var get_pembulatan = Number.parseInt(document.getElementById('pembulatan').value);

      // perhitungan
      var a_harga_price_list = Number.parseInt(t_hs + get_pembulatan);
      if(isNaN(t_hs) || isNaN(get_pembulatan)){
        document.getElementById('harga_price_list').value = "0";
      }else{
        document.getElementById('harga_price_list').value = tampilIdr(a_harga_price_list);
      }
    }
    
</script>