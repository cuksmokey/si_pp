<section class="content">
        <div class="container-fluid">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <ol class="breadcrumb">
                                    <li class="">Master No. Nota</li>
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
                                            <th width="3%">No</th>
                                            <th>Supplier</th>
                                            <th>No. Nota</th>
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
                                      <th style="border:0;padding:5px;width:10%"></th>
                                      <th style="border:0;padding:5px;width:1%"></th>
                                      <th style="border:0;padding:5px;width:30%"></th>
                                      <th style="border:0;padding:5px"></th>
                                    </tr>
                                    <!-- <tr>
                                        <td>Tanggal </td>
                                        <td>:</td>
                                        <td>
                                            <input type="date" id="tgl" value="<?php echo date('Y-m-d') ?>"  class="form-control">
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td>Pilih</td>
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
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No. Nota</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" id="no_nota" autocomplete="off" class="form-control">
                                            <input type="hidden" value="" id="id">
                                            <input type="hidden" value="" id="supplier_id">
                                            <input type="hidden" value="" id="no_nota_lama">
                                            <input type="hidden" value="" id="supplier_lama">
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
     load_supplier();

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
        $("#judul").html('<h3>Form Tambah Data No Nota</h3>');
      $('.box-form').animateCss('fadeInDown');
    });

    $(".btn-kembali").click(function(){
        $(".box-form").hide();
        $(".box-data").show();
        $('.box-data').animateCss('fadeIn');
        kosong();
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
                   "data" : ({jenis:"Load_NoNota"}),
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
      id = $("#id").val();
      data = $('#supplier').select2('data');
      supplier = data[0].id_supplier;
      supplier_lama = $("#supplier_lama").val();
      supplier_note = $("#supplier_note").val();
      no_nota = $("#no_nota").val();
      no_nota_lama = $("#no_nota_lama").val();

      if (supplier == "" || no_nota == "" || supplier_note == "")  {
        showNotification("alert-info", "Harap Lengkapi Form", "bottom", "center", "", ""); return;
      }

      $("#btn-simpan").prop("disabled",true);

      // alert("ID: "+supplier+". ID_LAMA:"+supplier_lama+". NOTA:"+no_nota+". NOTA_LAMA:"+no_nota_lama);

      $.ajax({
          type     : "POST",
          url      : '<?php echo base_url(); ?>Master/'+status,
          data     : ({
            id : id,
            supplier : supplier,
            supplier_lama : supplier_lama,
            no_nota : no_nota,
            no_nota_lama : no_nota_lama,
            jenis : "Simpan_Nota" }),
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
      $("#judul").html('<h3>Form Edit Data No. Nota</h3>');

      status = "update";

      $.ajax({
          url : '<?php echo base_url('Master/get_edit'); ?>',
          type: 'POST',
          data: {
            id: id,
            jenis:"edit_nota"},
      })
      .done(function(data) {
          json = JSON.parse(data);

          $("#btn-simpan").prop("disabled",false);
          $("#id").val(json.id);
          $("#supplier").val(json.id_supplier);
          $("#supplier_note").val(json.nama_supplier);
          $("#supplier_lama").val(json.id_supplier);
          $("#no_nota").val(json.no_nota);
          $("#no_nota_lama").val(json.no_nota);
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
          if(isConfirm) {
            $.ajax({
              url   : '<?php echo base_url(); ?>Master/hapus/',
              type  : "POST",
              data  : {
                id:id,
                jenis:"hapus_nota"},
              success : function(data){
                if (data == 1) {
                swal("Berhasil", "", "success");
                reloadTable();
                }else{
                  swal("Gagal", "", "error");
                }
              }
            }); 
          }else{
            swal("", "Data Batal dihapus", "error");
          }
        });

    }

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

 $('#supplier').on('change', function() {
    data = $('#supplier').select2('data');
    // $("#pimpinan").val(data[0].pimpinan);
    $("#supplier").val(data[0].id_supplier);
    $("#supplier_note").val(data[0].text);
  });

    function kosong(){

      status = "insert";

      $("#id").val("");
      $("#supplier").val("");
      $("#supplier_lama").val("");
      $("#supplier_note").val("");
      $("#no_nota").val("");
      $("#no_nota_lama").val("");

      $("#btn-simpan").prop("disabled",false);
      $("#txt-btn-simpan").html("SIMPAN");
    }
    
</script>