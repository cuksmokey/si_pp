<section class="content">
        <div class="container-fluid">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <ol class="breadcrumb">
                                    <li class="">Invoice </li>
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
                                            <th>No Invoice</th>
                                            <th>No Surat Jalan</th>
                                            <th>No PO</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th width="20%">Aksi</th>
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
                                        <td>No Invoice</td>
                                        <td>:</td>
                                        <td colspan="2">
                                            <input type="text" class="form-control" id="no_invoice"> 
                                        </td>
                                    <tr>
                                        <td>Tanggal Jatuh Tempo</td>
                                        <td>:</td>
                                        <td  colspan="2">
                                            <input type="date" id="jto" value="<?php echo date('Y-m-d') ?>"  class="form-control" style="width: 40%">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No Surat Jalan</td>
                                        <td>:</td>
                                        <td colspan="2">
                                          <select class="form-control" id="no_surat" style="width: 100%">
                                            
                                           </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No PO</td>
                                        <td>:</td>
                                        <td colspan="2">
                                            <input type="text" class="form-control" id="no_po" disabled="true"> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No PKB</td>
                                        <td>:</td>
                                        <td colspan="2">
                                            <input type="text" class="form-control" id="no_pkb" disabled="true"> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="right">
                                            <br>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><hr>Dikirim Ke<hr></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td colspan="2">
                                            <!-- <input type="text" class="form-control" id="nama" disabled="true">  -->
                                            <input type="text" class="form-control" id="nama"> 
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Perusahaan</td>
                                        <td>:</td>
                                        <td colspan="2">
                                            <!-- <input type="text" class="form-control" id="nm_perusahaan" disabled="true">  -->
                                            <input type="text" class="form-control" id="nm_perusahaan"> 

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Perusahaan</td>
                                        <td>:</td>
                                        <td colspan="2">
                                            <!-- <textarea id="alamat_perusahaan" rows="5" class="form-control" disabled="true"></textarea> -->
                                            <textarea id="alamat_perusahaan" rows="5" class="form-control"></textarea>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No Telepon / No Hp</td>
                                        <td>:</td>
                                        <td colspan="2">
                                            <!-- <input type="text" class="form-control" id="no_telp" disabled="true">  -->
                                            <input type="text" class="form-control" id="no_telp"> 
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
                                  <td align="left"> <button type="button" class="btn-tambah btn btn-default btn-sm waves-effect">
                                        <i class="material-icons">book</i>
                                        <span>List Barang</span>
                                    </button>
                                  </td>
                                </tr>
                              </table>
                              <br>
                              <table class="table" style="background-color: grey; color:white">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Gramage (GSM)</th>
                                      <th>LB Width (CM)</th>
                                      <th>Roll</th>
                                      <th>Satuan</th>
                                      <th>Jumlah</th>
                                      <th>Harga</th>
                                      <th>Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody id="detail_cart">

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

    <!-- Large Size -->
  <div class="modal fade" id="modal-view-timbang" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content" style="width: 150%; left: -200px">
              <div class="modal-header">
                  <!-- <h4 class="modal-title" id="largeModalLabel">Modal title</h4> -->
              </div>
              <div class="modal-body">
                <div class="box-add">
                  <table id="datatable-view-timbang" width="100%" class="table table-bordered table-striped table-hover dataTable ">
                        <thead>
                            <tr>
                                <th>Roll Number</th>
                                <th>Tanggal</th>
                                <th>Nama Ker</th>
                                <th>Gramage Label</th>
                                <th>Gramage (GSM)</th>
                                <th>Width (CM)</th>
                                <th>Diameter (CM)</th>
                                <th>Weight (KG)</th>
                                <th>Joint</th>
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
                                <th>Gramage (GSM)</th>
                                <th>LB Width (CM)</th>
                                <th>Roll</th>
                                <th>Satuan</th>
                                <th>Jumlah (Kg)</th>
                                <th>Harga</th>
                                <th width="20%">Aksi</th>
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
              <div class="modal-header">
                  <!-- <h4 class="modal-title" id="largeModalLabel">Modal title</h4> -->
              </div>
              <div class="modal-body">
                <table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size:14px">
                   
                    <tr>
                        <td align="left" width="8%">Tanggal</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="10%"><div id="txt-jto"></div></td>
                        <td align="center" width="10%"></td>
                        <td align="left" width="8%">Kepada</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="20%"><div id="txt-nm_perusahaan"></div></td>
                    </tr>
                    <tr>
                        <td align="left" width="8%">No Surat Jalan</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="10%"><div id="txt-no_surat"></div></td>
                        <td align="center" width="10%"></td>
                        <td align="left" width="8%">Alamat</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="20%"><div id="txt-alamat_perusahaan"></div></td>
                    </tr>
                    <tr>
                        <td align="left" width="8%">No SO</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="10%"><div id="txt-no_po"></div></td>
                        <td align="center" width="10%"></td>
                        <td align="left" width="8%">ATTN</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="20%"><div id="txt-nama"></div></td>
                    </tr>
                    <tr>
                        <td align="left" width="8%">No PKB</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="10%"><div id="txt-gsm"></div></td>
                        <td align="center" width="10%"></td>
                        <td align="left" width="8%">No Telp / No HP</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="20%"><div id="txt-no_telp"></div></td>
                    </tr>
                    <tr>
                        <td align="left" width="8%">No Kendaraan</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="10%"><div id="txt-no_kendaraan"></div></td>
                        <td align="center" width="10%"></td>
                        <td align="left" width="8%">No PO</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="20%"><div id="txt-no_po"></div></td>
                    </tr>
                    
                    <tr>
                  </table>

                <div class="box-add">
                  <table  width="100%" class="table table-bordered table-striped table-hover dataTable ">
                        <thead>
                            <tr>
                                <th>Roll Number</th>
                                <th>Tanggal</th>
                                <th>Nama Ker</th>
                                <th>Gramage Label</th>
                                <th>Gramage (GSM)</th>
                                <th>Width (CM)</th>
                                <th>Diameter (CM)</th>
                                <th>Weight (KG)</th>
                                <th>Joint</th>
                            </tr>
                        </thead>
                        <tbody id="list-timbangan">
                            <div ></div>
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
  id_perusahaan = '';
  roll_array = [];

    $(document).ready(function(){
      $(".box-form").hide();
     load_data();
     load_sj();

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
        $("#judul").html('<h3> Form Tambah Data</h3>');
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
                   "data" : ({jenis:"Invoice"}),
                   "type": "POST"
               },
               responsive: true,
               "pageLength": 10,
               "language": {
                       "emptyTable":     "Tidak ada data.."
                   },
               "order": [[ 1, "desc" ]]
               });

     

    }


    function simpan(){
      
      jto     = $("#jto").val();
      no_surat  = $("#no_surat").val();
      no_po    = $("#no_po").val();
      no_pkb    = $("#no_pkb").val();
      no_surat_lama  = $("#no_surat_lama").val();
      no_po_lama    = $("#no_po_lama").val();
      gsm = $("#gsm").val();
      no_kendaraan   = $("#no_kendaraan").val();
      nama   = $("#nama").val();
      nm_perusahaan = $("#nm_perusahaan").val();
      alamat_perusahaan    = $("textarea#alamat_perusahaan").val();
      no_telp    = $("#no_telp").val();
      no_po    = $("#no_po").val();
      no_invoice    = $("#no_invoice").val();

      cart = $('#detail_cart').html();
        

        if (no_invoice == "" ||jto == "" ||cart == "" || no_surat == null)  {
          showNotification("alert-info", "Harap Lengkapi Form", "bottom", "center", "", ""); return;
        }

        $("#btn-simpan").prop("disabled",true);
        

        $.ajax({
            type     : "POST",
            url      : '<?php echo base_url(); ?>Master/'+status,
            data     : ({id:no_invoice ,jto:jto , no_surat:no_surat , no_po:no_po, no_pkb:no_pkb , id_perusahaan:id_perusahaan , nama:nama , nm_perusahaan:nm_perusahaan , alamat_perusahaan:alamat_perusahaan ,no_telp:no_telp,jenis : "Invoice" }),
            dataType : "json",
            success  : function(data){
              $("#btn-simpan").prop("disabled",false);
              if (data.data == true) {
                
                // reloadTable();
                showNotification("alert-success", "Berhasil", "bottom", "center", "", "");
                location.reload(true);
                
               status = 'update';

               // $("#txt-btn-simpan").html("Update");
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

    $('#detail_cart').load("<?php echo base_url();?>Master/destroy_cart_barang");

    status = "update";

         $.ajax({
              url: '<?php echo base_url('Master/get_edit'); ?>',
              type: 'POST',
              data: {id: id,jenis:"PL"},
          })
          .done(function(data) {
               json = JSON.parse(data);

              // $("#btn-print").attr("href", "<?php echo base_url('Master/print_timbangan?id=')  ?>"+json.roll);
              // $("#btn-print").show();

              $("#no_surat").val(json.header.no_surat);
              $("#no_po").val(json.header.no_po);
              $("#no_pkb").val(json.header.no_pkb);
              $("#no_surat_lama").val(json.header.no_surat);
              $("#no_po_lama").val(json.header.no_po);
              $("#gsm").val(json.header.gsm);
              $("#no_kendaraan").val(json.header.no_kendaraan);
              $("#nama").val(json.header.nama);
              $("#nm_perusahaan").val(json.header.nm_perusahaan);
              $("textarea#alamat_perusahaan").val(json.header.alamat_perusahaan);
              $("#no_telp").val(json.header.no_telp);
              $("#no_po").val(json.header.no_po);
              $("#jto").val(json.header.jto);

              for (var i = 0 ; i < json.detail.length; i++) {

                addToCart_edit(json.detail[i].roll);
              }

              $("#txt-btn-simpan").html("Update");

          }) 

    }

    function view_detail(id){
    
         $.ajax({
              url: '<?php echo base_url('Master/get_edit'); ?>',
              type: 'POST',
              data: {id: id,jenis:"PL"},
          })
          .done(function(data) {
               json = JSON.parse(data);

              // $("#btn-print").attr("href", "<?php echo base_url('Master/print_timbangan?id=')  ?>"+json.roll);
              // $("#btn-print").show();

              $("#txt-no_surat").html(json.header.no_surat);
              $("#txt-no_po").html(json.header.no_po);
              $("#txt-no_pkb").html(json.header.no_pkb);
              $("#txt-no_surat_lama").html(json.header.no_surat);
              $("#txt-no_po_lama").html(json.header.no_po);
              $("#txt-gsm").html(json.header.gsm);
              $("#txt-no_kendaraan").html(json.header.no_kendaraan);
              $("#txt-nama").html(json.header.nama);
              $("#txt-nm_perusahaan").html(json.header.nm_perusahaan);
              $("#txt-alamat_perusahaan").html(json.header.alamat_perusahaan);
              $("#txt-no_telp").html(json.header.no_telp);
              $("#txt-no_po").html(json.header.no_po);
              $("#txt-jto").html(json.header.jto);

              html = '';
              for (var i = 0 ; i < json.detail.length; i++) {
                html +='<tr><td style="color:#000 !important"><b>'+json.detail[i].roll+'</b></td><td>'+json.detail[i].jto+'</td><td>'+json.detail[i].nm_ker+'</td><td style="color:#000 !important"><b>'+json.detail[i].g_label+'</b></td><td>'+json.detail[i].g_ac+'</td><td style="color:#000 !important"><b>'+json.detail[i].width+'</b></td><td>'+json.detail[i].diameter+'</td><td>'+json.detail[i].weight+'</td><td>'+json.detail[i].joint+'</td></tr>';
              }

              $("#list-timbangan").html(html);

              $("#modal-view-detail").modal("show");

          }) 

    }

    function deleteData(id,nm){
        swal({
          title: "Apakah Anda Yakin Reject ?",
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
              url   : '<?php echo base_url(); ?>Master/Reject',
              type  : "POST",
              data  : {id: id},
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
            swal("", "Data Batal Direject", "error");
          }
        });

    }

    function confirmData(id,nm){
        swal({
          title: "Apakah Anda Yakin Konfirmasi Data ?",
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
              url   : '<?php echo base_url(); ?>Master/confirm',
              type  : "POST",
              data  : {id: id},
              success : function(data){
                if (data == 1) {
                swal("Berhasil", "", "success");
                reloadTable();

                }else{
                  swal("Data Sudah Melakukan Konfirmasi", "", "error");
                }
              }
            });
            
          } else {
            swal("", "Data Batal Di Konfirmasi", "error");
          }
        });

    }

    function kosong(){
      $("#judul").html('<h3> Form Tambah Data</h3>');
      $("#btn-print").hide();
      status = "insert";

      // $("#acc").prop("disabled",false);

      $("#no_surat").val("");
      $("#no_po").val("");
      $("#no_pkb").val("");
      $("#gsm").val("");
      $("#no_kendaraan").val("");
      $("#nama").val("");
      $("#nm_perusahaan").val("");
      $("textarea#alamat_perusahaan").val("");
      $("#no_telp").val("");
      $("#no_po").val("");

      $("#txt-btn-simpan").html("Simpan");
      $('#detail_cart').load("<?php echo base_url();?>Master/destroy_cart");
    }

    function view_timbang(id){
      // alert(id);
      var table = $('#datatable-view-timbang').DataTable();

         table.destroy();

         tabel = $('#datatable-view-timbang').DataTable({

               "processing": true,
               "pageLength":true,
               "paging": true,
               "ajax": {
                   "url" : '<?php echo base_url(); ?>Master/load_data' ,
                   "data" : ({jenis:"view_timbang",id:id}),
                   "type": "POST"
               },
               responsive: true,
               "pageLength": 10,
               "language": {
                       "emptyTable":     "Tidak ada data.."
                   },
               "order": [[ 2, "asc" ]]
        });

      $("#modal-view-timbang").modal("show");
    }

    $(".btn-tambah").click(function(){
      no_surat = $("#no_surat").val();

      if (no_surat == null) {
        showNotification("alert-info", "Harap Pilih No Surat Jalan", "bottom", "center", "", ""); return;
      }

        load_barang(no_surat);
        
       $("#modal-tambah").modal("show");
      
    });

    function load_barang(no_surat){
      
      
      var table = $('#datatable-add').DataTable();

         table.destroy();

         tabel = $('#datatable-add').DataTable({

               "processing": true,
               "pageLength":true,
               "paging": true,
               "ajax": {
                   "url" : '<?php echo base_url(); ?>Master/load_data' ,
                   "data" : ({jenis:"list_barang",no_surat:no_surat}),
                   "type": "POST"
               },
               responsive: true,
               "pageLength": 10,
               "language": {
                       "emptyTable":     "Tidak ada data.."
                   },
               "order": [[ 2, "asc" ]]
               });
    }

    function addToCart(lb,gsm,roll,i){
      jumlah = $("#jumlah"+i).val();
      harga = $("#harga"+i).val();

      if (jumlah == "" || jumlah == "0") {
        swal("Masukan Jumlah", "", "error");
      }

      if (harga == "" || harga == "0") {
        swal("Masukan Harga", "", "error");
      }

      // alert(jumlah + " "+harga);

       $.ajax({
         url : "<?php echo base_url();?>Master/add_to_cart_barang",
         method : "POST",
         data : {roll: roll,gsm: gsm,lb: lb,jumlah: jumlah,harga: harga},
         success: function(data){
          swal("Berhasil Ditambahkan", "", "success");
           // $('#btn-cek'+nou).prop('disabled', true);
           $('#detail_cart').html(data);
         }
       });
   
    }

    function addToCart_edit(roll){

       $.ajax({
         url : "<?php echo base_url();?>Master/add_to_cart",
         method : "POST",
         data : {roll: roll},
         success: function(data){
           $('#detail_cart').html(data);
         }
       });
   
    }

    $(document).on('click','.hapus_cart',function(){
       var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
       $.ajax({
         url : "<?php echo base_url();?>Master/hapus_cart_barang",
         method : "POST",
         data : {row_id : row_id},
         success :function(data){
           $('#detail_cart').html(data);
         }
       });
     });

    function load_sj(){
    
      $('#no_surat').select2({
           // minimumInputLength: 3,
           allowClear: true,
           placeholder: '--select--',
           ajax: {
              dataType: 'json',
              url      : '<?php echo base_url(); ?>/Master/load_sj',
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
   // ASLI
   $('#no_surat').on('change', function() {
      data = $('#no_surat').select2('data');
      $("#nm_perusahaan").val(data[0].nm_perusahaan);
      $("#no_telp").val(data[0].no_telp);
      $("#nama").val(data[0].pimpinan);
      $("#no_po").val(data[0].no_po);
      $("#no_pkb").val(data[0].no_pkb);
      id_perusahaan = data[0].id_perusahaan;
      $("textarea#alamat_perusahaan").val(data[0].alamat);
    });

   // $('#no_pkb').on('change', function() {
   //    data = $('#no_pkb').select2('data');
   //    $("#nm_perusahaan").val(data[0].nm_perusahaan);
   //    $("#no_telp").val(data[0].no_telp);
   //    $("#nama").val(data[0].pimpinan);
   //    $("#no_po").val(data[0].no_po);
   //    $("#no_pkb").val(data[0].no_pkb);
   //    id_perusahaan = data[0].id_perusahaan;
   //    $("textarea#alamat_perusahaan").val(data[0].alamat);
   //  });


    
</script>