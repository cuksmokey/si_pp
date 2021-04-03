<section class="content">
        <div class="container-fluid">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TANGGAL JATUH TEMPO PEMBAYARAN
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <table id="datatable11" class="table table-bordered table-striped table-hover dataTable ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Supplier</th>
                                        <th>No Nota</th>
                                        <th>Nota Terbilang</th>
                                        <th>Status</th>
                                        <th>Tgl Tatuh Tempo</th>
                                        <th>Tgl Bayar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
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
            <div>ITEM :</div>
            <table  width="100%" class="table table-bordered table-striped table-hover dataTable ">
              <thead>
                <tr>
                  <th style="width:30%">Nama Barang</th>
                  <th style="width:25%">Merek</th>
                  <th style="width:25%">Spesifikasi</th>
                  <th style="width:10%">Qty</th>
                  <th style="width:10%">Satuan</th>
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

    $(document).ready(function(){
     load_data();
     
    });

    function load_data(){
      var table = $('#datatable11').DataTable();

         table.destroy();

         tabel = $('#datatable11').DataTable({

               "processing": true,
               "pageLength":true,
               "paging": true,
               "ajax": {
                   "url" : '<?php echo base_url(); ?>Master/load_data' ,
                   "data" : ({jenis:"Home"}),
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

    function view_detail(id){
    
    $.ajax({
        url: '<?php echo base_url('Master/get_edit'); ?>',
        type: 'POST',
        data: {id: id,jenis:"list_barang_tempo"},
    })
    .done(function(data) {
        json = JSON.parse(data);
        html = '';
        for (var i = 0 ; i < json.length; i++) {
          ii = i+1;

          html +='<tr><td>'+json[i].nama_barang+'</td><td>'+json[i].merek+'</td><td>'+json[i].spesifikasi+'</td><td>'+json[i].qty_plus+'</td><td>'+json[i].qty_ket+'</td></tr>';
        }

        $("#modal-view-detail").modal("show");
        $("#list-timbangan").html(html);

    });

  }

    function confirmByr(id, i) {
    tglJthTmp = $("#plhTglPbJthTp" + i).val();

    // alert("ID:"+id+". ii:"+i+". tglJthTmp:"+tglJthTmp);

    if(tglJthTmp == 0 || tglJthTmp == "") {
      swal("Pilih Tanggal Bayar Terlebih Dahulu!", "", "error");
    } else {
      $.ajax({
        url: "<?php echo base_url(); ?>Master/cPembJthTempo",
        method: "POST",
        data: {
          id: id,
          tglJthTmp: tglJthTmp
        },
        success: function(data) {
          swal("Berhasil Terbayar", "", "success");
        //   reloadTable();
          load_data();
        }
      });
    }
  }

    </script>