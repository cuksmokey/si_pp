<section class="content">
        <div class="container-fluid">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                COMING SOON
                            </h2>
                            <!-- <ul class="header-dropdown m-r--5">
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
                                        <th>No Invoice</th>
                                        <th>No Surat Jalan</th>
                                        <th>No PO</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Total</th>
                                        <th>Tanggal Tatuh Tempo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

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
               "order": [[ 6, "asc" ]]
               });

     

    }
    </script>