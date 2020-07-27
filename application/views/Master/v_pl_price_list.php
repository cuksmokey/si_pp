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
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>No Surat Jalan</th>
                                            <th>No SO</th>
                                            <!-- <th>Kepada</th> -->
                                            <th>No PO</th>
                                            <th width="5%">Jumlah Barang</th>
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>

                            <!-- box form -->
                            <div class="box-form">
                                <div id="judul"></div>
                                <table width="50%">
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
                                            <input type="date" id="tgl" value="<?php echo date('Y-m-d') ?>"  class="form-control">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>No. Surat Jalan</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" id="no_surat" autocomplete="off">
                                            <input type="hidden"  id="idid" value="">
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
                                        <td>
                                            <input type="text" class="form-control" id="no_po" autocomplete="off"> 
                                        </td>
                                        <td></td>
                                    </tr>
                                    <!-- <tr>
                                        <td>No. Nota</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control" id="no_nota" autocomplete="off"> 
                                        </td>
                                        <td></td>
                                    </tr> -->
                                    <tr>
                                        <td colspan="4"><hr>Dikirim Ke<hr></td>
                                    </tr>
                                    <tr>
                                        <td>Pilih</td>
                                        <td>:</td>
                                        <td colspan="2">
                                          <select class="form-control" id="kepada" style="width:100%">
                                          </select>
                                    </tr>
                                    <tr>
                                        <td>Pimpinan</td>
                                        <td>:</td>
                                        <td colspan="2">
                                            <input type="text" class="form-control" id="pimpinan" disabled="true" style="background:#ddd"> <input type="hidden" value="" id="id_kepada">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Perusahaan</td>
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
                              </table>
                              <br>
                              <table class="table" style="background-color: grey; color:white">
                                  <thead>
                                    <tr>
                                      <th style="width:5%;text-align:center">No</th>
                                      <th style="width:15%;text-align:center">Kode Barang</th>
                                      <th style="width:45%;text-align:center">Nama Barang</th>
                                      <th style="width:10%;text-align:center">Sisa Stok</th>
                                      <th style="width:10%;text-align:center">Input QTY</th>
                                      <th style="width:15%;text-align:center">Aksi</th>
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
                      <td align="left" width="10%"><div id="txt-tgl"></div></td>
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
                        <td align="left" width="10%"><div id="txt-no_so"></div></td>
                        <td align="center" width="10%"></td>
                        <td align="left" width="8%">ATTN</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="20%"><div id="txt-nama"></div></td>
                    </tr>
                    <tr>
                        <td align="left" width="8%">No PO</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="10%"><div id="txt-no_po"></div></td>
                        <td align="center" width="10%"></td>
                        <td align="left" width="8%">No Telp / No HP</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="20%"><div id="txt-no_telp"></div></td>
                    </tr>
                </table>

                <div class="box-add">
                  <table  width="100%" class="table table-bordered table-striped table-hover dataTable ">
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
  roll_array = [];

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
        $("#btn-simpan").prop("disabled",true);
        $(".btn_list_barang").prop("disabled",false);
        $(".box-data").hide();
        $(".box-form").show();
        $("#judul").html('<h3>Form Tambah Data Packing List</h3>');
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

    function load_data(){ //
      var table = $('#datatable11').DataTable();

         table.destroy();

         tabel = $('#datatable11').DataTable({

               "processing": true,
               "pageLength":true,
               "paging": true,
               "ajax": {
                   "url" : '<?php echo base_url(); ?>Master/load_data' ,
                   "data" : ({jenis:"PL_price_list"}),
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
      id = $("#idid").val();
      // data = $('#kepada').select2('data');
      // kepada = data[0].id;
      tgl = $("#tgl").val();
      no_surat = $("#no_surat").val();
      no_so = $("#no_so").val();
      no_po = $("#no_po").val();
      
      kepada = $("#id_kepada").val();
      pimpinan = $("#pimpinan").val();
      nama_perusahaan = $("#nama_perusahaan").val();
      npwp = $("#npwp").val();
      alamat = $("#alamat").val();
      no_telp = $("#no_telp").val();

      cart = $('#detail_cart').html();
      
      if (cart == "" || tgl == "" || no_surat == "" || no_so == "" || no_po == "" || nama_perusahaan == "" || pimpinan == "" || npwp == "" || alamat == "" || no_telp == "")  {
        showNotification("alert-info", "Harap Lengkapi Form", "bottom", "center", "", ""); return;
      }

      $("#btn-simpan").prop("disabled",true);

      // alert(id);
      $.ajax({
          type     : "POST",
          url      : '<?php echo base_url(); ?>Master/'+status,
          data     : ({
            id:id,
            tgl:tgl,
            no_surat:no_surat,
            no_so:no_so,
            no_po:no_po,
            kepada:kepada,
            jenis : "PL_pl_barang"}),
            dataType : "json",
          success  : function(data){
            $("#btn-simpan").prop("disabled",false);
            if (data.data == true) {
              
              // reloadTable();
              showNotification("alert-success", "Berhasil", "bottom", "center", "", "");
              // location.reload(true);
              
              kosong();
            }else{
              showNotification("alert-danger", data.msg, "bottom", "center", "", "");
            }
          }
      });
    }

    function view_detail(id){
    
         $.ajax({
              url: '<?php echo base_url('Master/get_edit'); ?>',
              type: 'POST',
              data: {id: id,jenis:"PL_pl_pl"},
          })
          .done(function(data) {
              json = JSON.parse(data);

              // alert(json.header.no_surat);
              // $("#idid").val(json.header.id);
              $("#txt-tgl").html(json.header.tgl);
              $("#txt-no_surat").html(json.header.no_surat);
              $("#txt-no_so").html(json.header.no_so);
              $("#txt-no_po").html(json.header.no_po);
              $("#txt-nm_perusahaan").html(json.pt.nm_perusahaan);
              $("#txt-nama").html(json.pt.pimpinan);
              $("#txt-npwp").html(json.pt.npwp);
              $("#txt-alamat_perusahaan").html(json.pt.alamat);
              $("#txt-no_telp").html(json.pt.no_telp);

              let idr = new Intl.NumberFormat();
              html = '';
              for (var i = 0 ; i < json.detail.length; i++) {
                ii = i+1;
                html +='<tr><td><b>'+ii+'</b></td><td><b>'+json.detail[i].kode_barang+'</b></td><td><b>'+json.detail[i].nama_barang+'</b></td><td><b>'+json.detail[i].qty+' '+json.detail[i].qty_ket+'</b></td><td><b>'+json.detail[i].i_qty+'</b></td></tr>';
              }

              $("#list-timbangan").html(html);

              $("#modal-view-detail").modal("show");

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
              data  : {id: id,jenis:"plpl"},
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
      $("#judul").html('<h3> Form Tambah Data Packing List</h3>');
      $("#btn-print").hide();
      status = "insert";

      $("#tgl").val("");
      $("#no_surat").val("");
      $("#no_so").val("");
      $("#no_po").val("");
      $("#no_nota").val("");

      $("#id_kepada").val("");
      $("#nama_perusahaan").val("");
      $("#pimpinan").val("");
      $("#npwp").val("");
      $("#alamat").val("");
      $("#no_telp").val("");

      $("#btn-simpan").prop("disabled",false);
      $(".btn_list_barang").prop("disabled",false);
      $("#txt-btn-simpan").html("SIMPAN");
      $('#detail_cart').load("<?php echo base_url();?>Master/destroy_cart_plpl");
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

    $(".btn-tambah").click(function(){ //
     
        load_barang();
        $("#btn-simpan").prop("disabled",true);
        
       $("#modal-tambah").modal("show");
      
    });

    function load_barang(){ 
      $("#btn-simpan").prop("disabled",true);
      var table = $('#datatable-add').DataTable();
      
      table.destroy();

      tabel = $('#datatable-add').DataTable({

            "processing": true,
            "pageLength":true,
            "paging": true,
            "ajax": {
                "url" : '<?php echo base_url(); ?>Master/load_data' ,
                "data" : ({
                  // edit_cart:edit_cart,
                  jenis:"list_pl_barang"}),
                "type": "POST"
            },
            responsive: true,
            "pageLength": 10,
            "language": {
                    "emptyTable": "Tidak ada data.."
                },
            "order": [[ 0, "asc" ]]
            });
    }

    function addToCart(id,kode_barang,nama_barang,qty,qty_ket,i){
      $("#btn-simpan").prop("disabled",false);
      $("#i_qty"+i).prop("disabled",true).attr('style','background:#ddd;');
      $(".btn_list_barang").prop("disabled",true);

      qty = $("#qty"+i).val();
      i_qty = $("#i_qty"+i).val();

      ss_stok = qty - i_qty;

      // alert("ID:"+id+". qty:"+qty+". i_qty:"+i_qty+". stok: "+ss_stok);

      if(i_qty == 0 || i_qty == ""){
        swal("Input QTY Tidak Boleh Kosong", "", "error");
        $("#i_qty"+i).prop("disabled",false).attr('style','background:#fff;');
      }else if(ss_stok < 0){
        swal("Melebihi STOK!!", "", "error");
        $("#i_qty"+i).prop("disabled",false).attr('style','background:#fff;');
      }else{
        $.ajax({
          url : "<?php echo base_url();?>Master/add_to_cart_pl_barang",
          method : "POST",
          data : {
            id_barang:id,
            kode_barang:kode_barang,
            nama_barang:nama_barang,
            qty:qty,
            qty_ket:qty_ket,
            i_qty:i_qty
          },
          success: function(data){
          swal("Berhasil Ditambahkan", "", "success");
            $('#detail_cart').html(data);
            $(".btn_list_barang").prop("disabled",false);
          }
        });
      }
    }

    // function tampil_plpl(kode_barang,harga_price_list,qty,i_qty_barang){

    //   $("#btn-simpan").prop("disabled",true);

    //   $.ajax({
    //     url : "<?php echo base_url();?>Master/view_edit_cart_pl",
    //     method : "POST",
    //     data : {
    //       kode_barang:kode_barang,
    //       harga_price_list:harga_price_list,
    //       qty:qty,
    //       i_qty_barang:i_qty_barang
    //       },
    //     success: function(data){
    //       $('#detail_cart').html(data);
    //     }
    //   });
    // }

    // function edit_plpl(kode_barang,harga_price_list,qty,i_qty_barang,i){
    //   qty = $("#qty"+i).val();
    //   i_qty = $("#i_qty"+i).val();

    //   ss_stok = qty - i_qty;

    //   // alert("STOK :("+qty+"). INPUT=("+i_qty+"). "+i_qty_barang);

    //   $("#btn-simpan").prop("disabled",false);

    //   if(i_qty == 0 || i_qty == ""){
    //     swal("Input QTY Tidak Boleh Kosong", "", "error");
    //   }else if(ss_stok < 0){
    //     swal("Melebihi STOK", "", "error");
    //   }else{
    //     $.ajax({
    //       url : "<?php echo base_url();?>Master/save_edit_cart_pl",
    //       method : "POST",
    //       data : {
    //         kode_barang:kode_barang,
    //         harga_price_list:harga_price_list,
    //         qty:qty,
    //         i_qty:i_qty,
    //         i_qty_barang:i_qty_barang
    //         },
    //       success: function(data){
    //         $('#detail_cart').html(data);
    //       }
    //     });
    //   }
    // }

    $(document).on('click','.hapus_cart',function(){
       var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
       $.ajax({
         url : "<?php echo base_url();?>Master/hapus_cart_plpl",
         method : "POST",
         data : {
            // edit_cart:edit_cart,
            row_id : row_id},
         success :function(data){
           $('#detail_cart').html(data);
           $(".btn_list_barang").prop("disabled",false);
         }
       });
     });

    function load_perusahaan(){
    
      $('#kepada').select2({
           // minimumInputLength: 3,
           allowClear: true,
           placeholder: '--select--',
           ajax: {
              dataType: 'json',
              url      : '<?php echo base_url(); ?>/Master/load_perusahaan',
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

   $('#kepada').on('change', function() {
      data = $('#kepada').select2('data');
      // $("#nama").val(data[0].text);
      $("#id_kepada").val(data[0].id);
      $("#pimpinan").val(data[0].pimpinan);
      $("#nama_perusahaan").val(data[0].text);
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