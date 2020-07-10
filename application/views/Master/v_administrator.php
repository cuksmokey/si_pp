<section class="content">
        <div class="container-fluid">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <ol class="breadcrumb">
                                    <li class="">Master Administrator</li>
                                </ol>
                            </h2>

                        </div>

                        <div class="body">
                            
                            <div class="box-data">
                              <table width="100%">
                                <tr>
                                  <td align="left">
                                    <button type="button" class="btn-add btn btn-default btn-sm waves-effect">
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
                                            <th>Nama User</th>
                                            <th>Username</th>
                                            <th>Level</th>
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
                                    <tr>
                                        <td>Nama User</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" id="nm_user" autocomplete="off" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" id="username" autocomplete="off" class="form-control">
                                            <input type="hidden" value="" id="id">
                                            <input type="hidden" value="" id="username_lama">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" id="password" autocomplete="off" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                  <td width="15%">
                                      Level
                                  </td>
                                  <td>:</td>
                                  <td>
                                    <select name="" id="level" class="form-control">
                                      <option value="0"></option>
                                      <option value="Developer">Developer</option>
                                      <option value="SuperAdmin">Super Admin</option>
                                      <option value="Admin">Admin</option>
                                      <option value="User">User</option>
                                    </select>

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
        $("#judul").html('<h3>Form Tambah Data Administrator</h3>');
      $('.box-form').animateCss('fadeInDown');
    });

    $(".btn-kembali").click(function(){
        $(".box-form").hide();
        $(".box-data").show();
        $('.box-data').animateCss('fadeIn');
        load_data();
        kosong();
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
                   "data" : ({jenis:"Load_Administrator"}),
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
      // tgl = $("#tgl").val();
      id = $("#id").val();
      nm_user = $("#nm_user").val();
      username = $("#username").val();
      username_lama = $("#username_lama").val();
      password = $("#password").val();
      level = $("#level").val();

      if (nm_user == "" || username == "" || password == "" || level == "" || level == 0)  {
        showNotification("alert-info", "Harap Lengkapi Form", "bottom", "center", "", ""); return;
      }

      $("#btn-simpan").prop("disabled",true);

      // alert(nm_user+" "+username+" "+password+" "+level);

      $.ajax({
          type     : "POST",
          url      : '<?php echo base_url(); ?>Master/'+status,
          data     : ({
            id : id,
            nm_user : nm_user,
            username : username,
            username_lama : username_lama,
            password : password,
            level : level,
            jenis : "Simpan_Admin" }),
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
      $("#judul").html('<h3>Form Edit Data Administrator</h3>');

      status = "update";

      $.ajax({
          url : '<?php echo base_url('Master/get_edit'); ?>',
          type: 'POST',
          data: {
            id: id,
            jenis:"edit_admin"},
      })
      .done(function(data) {
          json = JSON.parse(data);

          $("#btn-simpan").prop("disabled",false);
          $("#id").val(json.id);
          $("#nm_user").val(json.nm_user);
          $("#username").val(json.username);
          $("#username_lama").val(json.username);
          $("#password").val("");
          $("#level").val(json.level);
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
                jenis:"hapus_supplier"},
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

    function kosong(){
      
      status = "insert";

      $("#id").val("");
      $("#nm_user").val("");
      $("#username").val("");
      $("#username_lama").val("");
      $("#password").val("");
      $("#level").val("");

      $("#btn-simpan").prop("disabled",false);
      $("#txt-btn-simpan").html("SIMPAN");
    }

    $("#username").on({
      keydown: function(e) {
        if (e.which === 32)
          return false;
      },
      keyup: function(){
        this.value = this.value.toLowerCase();
      },
      change: function() {
        this.value = this.value.replace(/\s/g, "");
        
      }
    })
    
</script>