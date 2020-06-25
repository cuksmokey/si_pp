<section class="content">
        <div class="container-fluid">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <ol class="breadcrumb">
                                    <li class="">Master P O </li>
                                </ol>
                            </h2>

                        </div>

                        <div class="body">
                            
                            <div class="box-data">
                              <table width="100%">
                                <tr>
                                  <td align="left"> <button type="button" class="btn-add btn btn-default btn-sm waves-effect">
                                        <i class="material-icons">library_add</i>
                                        <span>New</span>
                                    </button>
                                  </td>
                                </tr>
                              </table>
                            
                            
                              <br><br>
                                <table id="datatable11" class="table table-bordered table-striped table-hover dataTable ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Tanggal</th>
                                            <th>Nama Barang</th>
                                            <th>QTY</th>
                                            <th>PO</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>

                            <!-- box form -->
                            <div class="box-form">
                                <center><div id="judul"></div></center>
                                <table width="70%">
                                    <tr>
                                        <td colspan="4">
                                          <!-- <input type="hidden" id="id" value="" class="form-control" style="width: 40%"> -->
                                          <input type="hidden" id="nm_perusahaan_lama" value="" class="form-control" style="width: 40%">
                                          <!-- <input type="text" id="nm_perusahaan" value="" class="form-control" style="width: 40%"> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Perusahaan</td>
                                        <td>:</td>
                                        <td colspan="2">
                                          <select name="" id="nm_perusahaan" class="form-control" style="margin: 5px">
                                            <option value="0">Pilih Perusahaan</option>
                                            <?php

                                                include 'connect.php';
                                                
                                                $sql = mysql_query("SELECT id,pimpinan,nm_perusahaan FROM m_perusahaan");
                                                while($data=mysql_fetch_array($sql)) {

                                            ?>

                                            <option value="<?=$data['id']?>"><?=$data['id']?> || <?=$data['pimpinan']?> || <?=$data['nm_perusahaan']?>  </option>

                                            <?php
                                                }
                                            ?>

                                          </select> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>:</td>
                                        <td  colspan="2">
                                            <input type="date" id="tgl" value="<?php echo date('Y-m-d') ?>" class="form-control" style="width: 40%">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Barang</td>
                                        <td>:</td>
                                        <td colspan="2">
                                          <select class="form-control" id="nama_barang" style="width:100%">
                                          </select>
                                    </tr>
                                    <tr>
                                        <td>Kode Barang</td>
                                        <td>:</td>
                                        <td colspan="2">
                                            <input type="text" class="form-control" id="kode_barang" disabled="true" style="background:#ddd">
                                            <input type="hidden" id="kode_barang_lama" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>QTY</td>
                                        <td>:</td>
                                        <td colspan="2">
                                            <input type="text" class="form-control" id="qty" onkeypress="return hanyaAngka(event)"
                                            autocomplete="off"> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No PO</td>
                                        <td>:</td>
                                        <td colspan="2">
                                            <input type="text" class="form-control" id="no_po" autocomplete="off"> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="right">
                                            <br>
                                            
                                        </td>
                                    </tr>
                                </table>
                               

                                <!-- <button type="button" class="btn-kembali btn btn-dark btn-sm waves-effect waves-circle waves-float"> -->
                                <button type="button" class="btn-kembali btn btn-dark btn-default btn-sm waves-effect">
                                    <!-- <i class="material-icons">arrow_back</i> -->
                                    <b><span>BACK</span></b>
                                </button> &nbsp;&nbsp;&nbsp;&nbsp;
                                <button onclick="simpan()" id="btn-simpan" type="button" class="btn bg-light-green btn-sm waves-effect">
                                    <!-- <i class="material-icons">save</i> -->
                                    <b><span id="txt-btn-simpan">SIMPAN</span></b>
                                </button> &nbsp;&nbsp;&nbsp;&nbsp;
                                <button onclick="kosong()" type="button" class="btn btn-default btn-sm waves-effect">
                                    <!-- <i class="material-icons">note_add</i> -->
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
     load_barang();

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
        $("#judul").html('<h3> Tambah Data Master PO</h3>');
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
                   "data" : ({jenis:"PoMaster"}),
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
      id_perusahaan = $("#nm_perusahaan").val();
      tgl = $("#tgl").val();
      no_po = $("#no_po").val();
      qty = $("#qty").val();
      kode_barang_lama = $("#kode_barang_lama").val();

      data = $('#nama_barang').select2('data');
      nama_barang = data[0].text;
      kode_barang = data[0].kode_barang;

      if (id_perusahaan == "" || tgl == "" || nama_barang == "" ||kode_barang == "" ||  no_po == "" || qty == "")  {
        showNotification("alert-info", "Harap Lengkapi Form", "bottom", "center", "", ""); return;
      }

      $("#btn-simpan").prop("disabled",true);
      
      // alert("Kode :("+kode_barang+"). Kode Lama :("+kode_barang_lama+"). Nama :("+nama_barang+")");
      $.ajax({
          type     : "POST",
          url      : '<?php echo base_url(); ?>Master/'+status,
          data     : ({
            id_perusahaan:id_perusahaan,
            tgl:tgl,
            kode_barang:kode_barang,
            kode_barang_lama:kode_barang_lama,
            qty:qty,
            no_po:no_po,
            jenis : "PoMaster" }),
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
    $("#judul").html('<h3> Form Edit Data Master PO</h3>');
    $("#btn-simpan").prop("disabled",false);

    status = "update";

         $.ajax({
              url: '<?php echo base_url('Master/get_edit'); ?>',
              type: 'POST',
              data: {id:id,jenis:"PoMaster"},
          })
          .done(function(data) {
               json = JSON.parse(data);

              $("#nm_perusahaan").val(json.id_perusahaan).prop("disabled",true);
              $("#tgl").val(json.tgl);
              $("#kode_barang_lama").val(json.kode_barang);
              $("#no_po").val(json.no_po);
              $("#qty").val(json.qty);

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
              data  : {id: id,jenis:"PoMaster"},
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
      $("#judul").html('<h3> Tambah Data Master PO</h3>');
      status = "insert";
      $("#id").val("");

      $("#nm_perusahaan").val("").prop("disabled",false);
      $("#tgl").val("");
      $("#no_po").val("");
      $("#qty").val("");
      $("#nama_barang").val("");
      $("#kode_barang").val("");

      $("#btn-simpan").prop("disabled",false);
      $("#txt-btn-simpan").html("Simpan");
    }

    function load_barang(){
    
    $('#nama_barang').select2({
         // minimumInputLength: 3,
         allowClear: true,
         placeholder: '--select--',
         ajax: {
            dataType: 'json',
            url      : '<?php echo base_url(); ?>/Master/laod_po_barang',
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

 $('#nama_barang').on('change', function() {
    data = $('#nama_barang').select2('data');
    // $("#pimpinan").val(data[0].pimpinan);
    $("#kode_barang").val(data[0].kode_barang);
  });

  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
    
</script>