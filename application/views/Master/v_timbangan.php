<section class="content">
        <div class="container-fluid">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <ol class="breadcrumb">
                                    <li class="">Master Timbangan </li>
                                </ol>
                            </h2>

                        </div>

                        <div class="body">
                            
                            <div class="box-data">
                              <table width="100%">
                                <tr>
                                  <td align="left"> <button type="button" class="btn-add btn btn-default btn-sm waves-effect">
                                        <!-- <i class="material-icons">library_add</i> -->
                                        <b><span>N E W</span></b>
                                    </button>
                                  </td>
                                </tr>
                              </table>
                            
                            
                              <br><br>
                                <table id="datatable11" class="table table-bordered table-striped table-hover dataTable ">
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
                                            <th>Keterangan</th>
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
                                        <td>Roll Number</td>
                                        <td>:</td>
                                        <td width="60%" colspan="2">
                                          <table width="60%" border="0">
                                            <tr>
                                              <td width="30%"><input type="text" id="id1" class="angka form-control" maxlength="5"></td>
                                              <td width="2%">/</td>
                                              <td width="20%"><input type="text" id="id2" class="angka form-control" maxlength="2"></td>
                                              <td width="2%">/</td>
                                              <td width="12%"><input type="text" id="id3" class="angka form-control" maxlength="1"></td>
                                              <td width="2%">/</td>
                                              <td width="14%"><input type="text" id="id4" class="form-control" maxlength="1"></td>
                                            </tr>
                                          </table>
                                            

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
                                        <td>Nama Kertas</td>
                                        <td>:</td>
                                        <td colspan="2">
                                          <select  id="nm_ker" class="form-control" style="width:40%">
                                            <option value="">Pilih</option>
                                            <option value="WP">WP</option>
                                            <option value="MH">MH</option>
                                            <option value="MI">MI</option>
                                            <option value="TL">TL</option>
                                          </select>
                                            <!-- <input type="text" class="form-control" id="nm_ker"> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Grammage Actual</td>
                                        <td>:</td>
                                        <td >
                                            <input type="text" class="form-control" id="g_ac"> 
                                        </td>
                                        <td>
                                          <input type="text" disabled="true" class="form-control" value="GSM" style="width: 30%;border: none"> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Grammage Label</td>
                                        <td>:</td>
                                        <td >
                                          <select  id="g_label" class="form-control" >
                                            <option value="">Pilih</option>
                                            <option value="67">67</option>
                                            <option value="68">68</option>
                                            <option value="70">70</option>
                                            <option value="110">110</option>
                                            <option value="125">125</option>
                                            <option value="140">140</option>
                                            <option value="150">150</option>
                                          </select>
                                        </td>
                                        <td>
                                          <input type="text" disabled="true" class="form-control" value="GSM" style="width: 30%;border: none"> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Width</td>
                                        <td>:</td>
                                        <td >
                                            <input type="text" class="form-control" placeholder="0"  id="width"> 
                                        </td>
                                        <td>
                                          <input type="text" disabled="true" class=" form-control" value="CM" style="width: 30%;border: none"> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Weight</td>
                                        <td>:</td>
                                        <td >
                                            <input type="text" class="form-control" placeholder="0" id="weight"> 
                                        </td>
                                        <td>
                                          <input type="text" disabled="true" class="form-control" value="KG" style="width: 30%;border: none"> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Diamater</td>
                                        <td>:</td>
                                        <td >
                                            <input type="text" class="form-control" placeholder="0" id="diameter"> 
                                        </td>
                                        <td>
                                          <input type="text" disabled="true" class="form-control" value="CM" style="width: 30%;border: none"> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>RCT</td>
                                        <td>:</td>
                                        <td >
                                            <input type="text" class="form-control" placeholder="0" id="rct"> 
                                        </td>
                                        <td>
                                          <input type="text" disabled="true" class="form-control" value="KGF" style="width: 30%;border: none"> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>BI</td>
                                        <td>:</td>
                                        <td >
                                            <input type="text" class="form-control" placeholder="0" id="bi"> 
                                        </td>
                                        <td>
                                          <input type="text" disabled="true" class="form-control" value="KPA.m2/G" style="width: 30%;border: none"> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Joint</td>
                                        <td>:</td>
                                        <td colspan="2">
                                            <input type="text" class="form-control" id="joint"> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td colspan="2">
                                            <textarea id="ket" cols="30" rows="5" class="form-control"></textarea> 
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
                                <a type="button" id="btn-print" target="blank" class="btn btn-default btn-sm waves-effect waves-float pull-right" style="display: none">
                                    <!-- <i class="material-icons">print</i> -->
                                    <b><span>PRINT</span></b>
                                </a>
                               

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
                   "data" : ({jenis:"Timbangan"}),
                   "type": "POST"
               },
               responsive: true,
               "pageLength": 10,
               "language": {
                       "emptyTable":     "Tidak ada data.."
                   },
               "order": [[ 2, "asc" ]]
               });

     /*var table = $('#datatable11').DataTable();

         table.destroy();

     tabel = $('#datatable11').DataTable({

                ordering: false,
                processing: true,
                serverSide: true,
                ajax: {
                  url: '<?php echo base_url(); ?>Master/load_data',
                  data : ({jenis:"Timbangan"}),
                  type:'POST',
                }
           });*/

    }


    function simpan(){
      roll = $("#id1").val()+"/"+$("#id2").val()+"/"+$("#id3").val()+"/"+$("#id4").val();
      
      tgl     = $("#tgl").val();
      nm_ker  = $("#nm_ker").val();
      g_ac    = $("#g_ac").val();
      g_label = $("#g_label").val();
      width   = $("#width").val();
      weight   = $("#weight").val();
      diameter = $("#diameter").val();
      joint    = $("#joint").val();
      rct    = $("#rct").val();
      bi    = $("#bi").val();
      ket    = $("textarea#ket").val();
        

        if ($("#id1").val() == "" || $("#id2").val() == ""|| $("#id3").val() == ""|| $("#id4").val() == "")  {
          showNotification("alert-info", "Harap Isi Roll Number dengan benar", "bottom", "center", "", ""); return;
        }

        if (nm_ker == "" || g_ac == ""|| g_label == ""|| width == ""|| diameter == "" || joint == "" || rct == "" || bi == "")  {
          showNotification("alert-info", "Harap Lengkapi Form", "bottom", "center", "", ""); return;
        }

        $("#btn-simpan").prop("disabled",true);
        

        $.ajax({
            type     : "POST",
            url      : '<?php echo base_url(); ?>Master/'+status,
            data     : ({id:roll , tgl:tgl , nm_ker:nm_ker , g_ac:g_ac , g_label:g_label , width:width, weight:weight , diameter:diameter , joint:joint, ket:ket, rct:rct, bi:bi ,jenis : "Timbangan" }),
            dataType : "json",
            success  : function(data){
              $("#btn-simpan").prop("disabled",false);
              if (data.data == true) {
                
                reloadTable();
                showNotification("alert-success", "Berhasil", "bottom", "center", "", "");
                $("#btn-print").attr("href", "<?php echo base_url('Master/print_timbangan?id=')  ?>"+roll);
                $("#btn-print").show();
                // $("#ket").prop("disabled",true);
                
               status = 'update';

               $("#txt-btn-simpan").html("Update");
              }else{
                showNotification("alert-danger", "Roll Number Sudah Ada", "bottom", "center", "", "");
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
              data: {id: id,jenis:"Timbangan"},
          })
          .done(function(data) {
               json = JSON.parse(data);

              $("#btn-print").attr("href", "<?php echo base_url('Master/print_timbangan?id=')  ?>"+json.roll);
              $("#btn-print").show();

              a = json.roll.split("/")

              $("#id1").prop("disabled",true);
              $("#id2").prop("disabled",true);
              $("#id3").prop("disabled",true);
              $("#id4").prop("disabled",true);

              $("#id1").val(a[0]);
              $("#id2").val(a[1]);
              $("#id3").val(a[2]);
              $("#id4").val(a[3]);
              $("#nm_ker").val(json.nm_ker);
              $("#g_ac").val(json.g_ac);
              $("#g_label").val(json.g_label);
              $("#width").val(json.width);
              $("#weight").val(json.weight);
              $("#diameter").val(json.diameter);
              $("#joint").val(json.joint);
              $("#rct").val(json.rct);
              $("#bi").val(json.bi);
              $("textarea#ket").val(json.ket);

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
              data  : {id: id,jenis:"Timbangan"},
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
      $("#btn-print").hide();
      status = "insert";

      // $("#acc").prop("disabled",false);

      $("#id1").prop("disabled",false);
      $("#id2").prop("disabled",false);
      $("#id3").prop("disabled",false);
      $("#id4").prop("disabled",false);

      $("#id1").val("");
      $("#id2").val("");
      $("#id3").val("");
      $("#id4").val("");
      $("#nm_ker").val("");
      $("#g_ac").val("");
      $("#g_label").val("");
      $("#width").val("");
      $("#weight").val("");
      $("#diameter").val("");
      $("#joint").val("");
      $("#rct").val("");
      $("#bi").val("");
      $("#ket").val("");

      $("#txt-btn-simpan").html("Simpan");
    }
    
</script>