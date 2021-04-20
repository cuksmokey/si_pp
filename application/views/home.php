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
            <div style="font-weight:bold;font-style:italic">*Laporan Lebih Detail : Laporan -> Pembelian -> Barang</div>
            <table  width="100%" class="table table-bordered table-striped table-hover dataTable ">
              <thead>
                <tr>
                  <th style="width:20%">Nama Barang</th>
                  <th style="width:20%">Merek</th>
                  <th style="width:20%">Spesifikasi</th>
                  <th style="width:10%">Qty</th>
                  <th style="width:10%">Satuan</th>
                  <th style="width:10%">Harga Satuan</th>
                  <th style="width:10%">Harga Total</th>
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
                       "emptyTable": "Tidak ada data.."
                   },
               "order": [[ 0, "asc" ]]
               });
    }

    function view_detail(id){
    // alert(id)
    $.ajax({
        url: '<?php echo base_url('Master/get_edit'); ?>',
        type: 'POST',
        data: {id: id,jenis:"list_barang_tempo"},
    })
    .done(function(data) {
        json = JSON.parse(data);

        let idr = new Intl.NumberFormat();
        html = '';
        tottot = 0;
        for (var i = 0 ; i < json.length; i++) {
          ii = i+1;
          harga_tot = json[i].qty_plus * json[i].harga;
          
          html +=`<tr>
            <td>${json[i].nama_barang}</td>
            <td>${json[i].merek}</td>
            <td>${json[i].spesifikasi}</td>
            <td>${json[i].qty_ket}</td>
            <td>${idr.format(json[i].qty_plus)}</td>
            <td style="text-align:right">Rp. ${idr.format(json[i].harga)}</td>
            <td style="text-align:right">Rp. ${idr.format(harga_tot)}</td>
          </tr>`;

          tottot += harga_tot;
        }

        html += `<tr>
          <td colspan="6" style="text-align:right;font-weight:bold">Total Pembelian</td>
          <td style="text-align:right;font-weight:bold">Rp. ${idr.format(tottot)}</td>
        </tr>`

        $("#modal-view-detail").modal("show");
        $("#list-timbangan").html(html);

    });

  }

    function confirmByr(id, i) {
    pTglTemp = $("#pTglTemp" + i).val();
    pTglBayar = $("#plhTglPbJthTp" + i).val();

    // alert(pTglTemp+" ID:"+id+". ii:"+i+". tglJthTmp:"+pTglBayar);

    if(pTglBayar == 0 || pTglBayar == "") {
      swal("Pilih Tanggal Bayar Terlebih Dahulu!", "", "error");
    } else {
      $.ajax({
        url: "<?php echo base_url(); ?>Master/cPembJthTempo",
        method: "POST",
        data: {
          id: id,
          pTglTemp: pTglTemp,
          pTglBayar: pTglBayar
        },
        success: function(data) {
          swal("Berhasil Terbayar", "", "success");
          load_data();
        }
      });
    }
  }

    </script>