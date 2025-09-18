<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("Login"));
        }
        $this->load->model('m_master');
        $this->load->model('m_fungsi');

        $this->db = $this->load->database('default', TRUE);

    }

    public function index()
    {
        $this->load->view('header');
        if($this->session->userdata('otoritas') == "Penjualan") {
            $this->load->view('Master/v_etalase');
        }else{
            $this->load->view('home');
        }
        $this->load->view('footer');
    }

    public function Customer()
    {
        $this->load->view('header');
        $this->load->view('Master/v_perusahaan');
        $this->load->view('footer');
    }

    public function PO()
    {
        $this->load->view('header');
        $this->load->view('Master/v_po');
        $this->load->view('footer');
    }

    public function Packing_list()
    {
        $this->load->view('header');
        $this->load->view('Master/v_pl');
        $this->load->view('footer');
    }

    public function Price_List() {
        $this->load->view('header');
        $this->load->view('Master/v_price_list');
        $this->load->view('footer');
    }

    public function PlPackingList() {
        $this->load->view('header');
        $this->load->view('Master/v_pl_price_list');
        $this->load->view('footer');
    }

    public function Invoice()
    {
        $this->load->view('header');
        $this->load->view('Master/v_invoice');
        $this->load->view('footer');
    }

    public function Barang()
    {
        $this->load->view('header');
        $this->load->view('Master/v_barang');
        $this->load->view('footer');
    }

    public function KodeBarang()
    {
        $this->load->view('header');
        $this->load->view('Master/v_kode_barang');
        $this->load->view('footer');
    }

    public function Etalase() {
        $this->load->view('header');
        $this->load->view('Master/v_etalase');
        $this->load->view('footer');
    }

    public function Administrator()
    {
        $this->load->view('header');
        $this->load->view('Master/v_administrator');
        $this->load->view('footer');
    }

    public function Supplier()
    {
        $this->load->view('header');
        $this->load->view('Master/v_supplier');
        $this->load->view('footer');
    }

    public function NoNota()
    {
        $this->load->view('header');
        $this->load->view('Master/v_no_nota');
        $this->load->view('footer');
    }

   
    function Insert(){ //

            $jenis      = $_POST['jenis'];

            if ($jenis == "Perusahaan") {
                $id      = $this->input->post('nm_perusahaan');
                $cek = $this->m_master->get_data_one("m_perusahaan","nm_perusahaan",$id)->num_rows();
                if ($cek > 0 ) {
                    echo json_encode(array('data' =>  FALSE));
                }else{
                    $result = $this->m_master->insert_perusahaan();    
                    echo json_encode(array('data' =>  TRUE));
                }
            }else if ($jenis == "Simpan_Price_List") { //
                $id  = $this->input->post('kode_barang');
                $cek = $this->m_master->get_data_one("m_price_list","id_m_barang",$id)->num_rows();

                if ($cek > 0 ) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'Kode Barang Sudah Dipakai'));
                }else{
                    $result = $this->m_master->insert_price_list();    
                    echo json_encode(array('data' =>  TRUE));
                }
            }else if ($jenis == "Simpan_Barang") { //
                $result = $this->m_master->insert_load_barang();    
                echo json_encode(array('data' =>  TRUE,'msg' => 'Berhasil'));
            }else if ($jenis == "Simpan_Supplier") {
                $id = $this->input->post('supplier');

                $cek = $this->m_master->get_data_one("m_supplier","nama_supplier",$id)->num_rows();

                if ($cek > 0 ) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'Supplier Sudah Ada'));
                }else{
                    $result = $this->m_master->insert_load_supplier();    
                    echo json_encode(array('data' =>  TRUE));
                }
            }else if ($jenis == "Simpan_Admin") {
                $id = $this->input->post('username');

                $cek = $this->m_master->get_data_one("user","username",$id)->num_rows();

                if ($cek > 0 ) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'Username Sudah Dipakai'));
                }else{
                    $result     = $this->m_master->insert_load_admin();    
                    echo json_encode(array('data' =>  TRUE));
                }
            }else if ($jenis == "Simpan_Nota") {
                $id = $this->input->post('no_nota');
                $id_supp = $this->input->post('supplier');

                // cek supp
                $cek_supNo = $this->m_master->cari_supNo($id_supp,$id)->num_rows();

                // $cek = $this->m_master->get_data_one("m_nota","no_nota",$id)->num_rows();

                if ($cek_supNo > 0 ) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'Supplier Dengan No. Nota Tersebut Sudah Ada!'));
                }else{
                    $result = $this->m_master->insert_nota();    
                    echo json_encode(array('data' =>  TRUE));
                }
            }else if ($jenis == "PoMaster") {
                $id_perusahaan = $this->input->post('id_perusahaan');
                $kode_barang = $this->input->post('kode_barang');
                $no_po       = $this->input->post('no_po');

                $cek = $this->m_master->get_data_po_master("po_master","id_perusahaan",$id_perusahaan,"kode_barang",$kode_barang,"no_po",$no_po)->num_rows();
                if ($cek > 0 ) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'Nama Perusahaan, Kode Barang/Nama Barang, dan No. PO Sama!!'));
                }else{
                    $result     = $this->m_master->insert_po_master();    
                    echo json_encode(array('data' =>  TRUE));
                }
            }elseif ($jenis == "PL_pl_barang") {
                $no_surat = $this->input->post('no_surat');
                $no_inv = $this->input->post('no_inv');
                $kepada = $this->input->post('kepada');
                $laporan = $this->input->post('laporan');

                $cek = $this->m_master->get_data_one("m_pl_price_list","no_surat",$no_surat)->num_rows();
                $cek2 = $this->m_master->get_data_one("m_pl_price_list","no_inv",$no_inv)->num_rows();

                $cekInv = $this->m_master->getNoInv($no_inv)->num_rows();
                $cekInv2 = $this->m_master->getNoInvCustLap($no_inv,$kepada,$laporan)->num_rows();

                // cek no surat jalan
                if ($cek > 0 ) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'No Surat Jalan Sudah Ada!'));
                // jika input no invoice
                }else if($no_inv != 0){
                    // cek no invoice sdh cetak nota
                    if($cek2 > 0){
                        if($cekInv > 0) {
                            echo json_encode(array('data' =>  FALSE,'msg' => 'No Invoice Sudah Cetak Nota!'));
                        }else if($cekInv2 == 0){
                            echo json_encode(array('data' =>  FALSE,'msg' => 'Periksa Kembali!! Input No. Invoice. Customer dan Laporan Tidak Boleh Berbeda Dari Sebelumnya!!'));
                        }else{
                            $result = $this->m_master->insert_pl_pl_b();    
                            echo json_encode(array('data' =>  TRUE));
                        }
                    }else{
                        $result = $this->m_master->insert_pl_pl_b();    
                        echo json_encode(array('data' =>  TRUE));
                    }
                // tidak input no invoice
                }else{
                    $result = $this->m_master->insert_pl_pl_b();    
                    echo json_encode(array('data' =>  TRUE));
                }
            }elseif ($jenis == "Save_invoice") {
                $no_nota = $this->input->post('no_nota');

                $cek = $this->m_master->get_data_one("m_invoice","no_nota",$no_nota)->num_rows();

                if ($cek > 0 ) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'No Nota Sudah Ada!'));
                }else{
                    $result = $this->m_master->insert_pl_inv();    
                    echo json_encode(array('data' =>  TRUE));
                }
            }
    }

    function simpanKdBarang() {
        $status = $this->input->post('status');
        $kode_barang = $this->input->post('kode_barang');
        $kode_barang_lama = $this->input->post('kode_barang_lama');
        $cek = $this->m_master->get_data_one("m_barang","kode_barang",$kode_barang)->num_rows();

        if($status == 'insert'){
            if ($cek > 0 ) {
                echo json_encode(array('data' =>  FALSE,'msg' => 'Kode Barang Sudah Dipakai'));
            }
            else{
                $result = $this->m_master->insertKdBarang();    
                echo json_encode(array('data' =>  TRUE,'msg' => 'Berhasil'));
            }
        }else if($status == 'update'){
            if($cek > 0 && $kode_barang <> $kode_barang_lama){
                echo json_encode(array('data' =>  FALSE,'msg' => 'Kode Barang Sudah Dipakai'));
            }else{
                $result = $this->m_master->updateKdBarang();    
                echo json_encode(array('data' =>  TRUE,'msg' => 'Berhasil'));
            }
        }
    }

    function insert_file(){
        $jenis      = $this->uri->segment(3);

        if ($jenis == "Barang") {
            $id      = $this->input->post('id');
                $cek = $this->m_master->get_data_one("inv","acc",$id)->num_rows();
                // $cek = $this->m_master->get_data_one("admin", "username", $username)->num_rows();
                if ($cek > 0 ) {
                    echo json_encode(array('data' =>  FALSE,"msg" => "Acc Sudah Ada"));
                }else{
                    $upload = $this->m_master->upload('foto',$id,'inv');

                    if($upload['result'] == "success"){ 
                        $result     = $this->m_master->insert_barang($upload,'1');    
                        echo json_encode(array('data' =>  TRUE,"msg" => "Berhasil"));
                        
                    }else{ 
                        $result     = $this->m_master->insert_barang($upload,'0');  
                        echo json_encode(array('data' =>  TRUE,"msg" => "Berhasil, Gambar tidak tersimpan ke database"));
                    }

                }    
            
        }
    }

    function update_file(){
        $jenis      = $this->uri->segment(3);

        if ($jenis == "Barang") {
            $id      = $this->input->post('id');
               
            $upload = $this->m_master->upload('foto',$id,'inv');

            if($upload['result'] == "success"){ 
                $result     = $this->m_master->update_barang($upload,'1');    
                echo json_encode(array('data' =>  TRUE,"msg" => "Berhasil"));
                
            }else{ 
                $result     = $this->m_master->update_barang($upload,'0');  
                echo json_encode(array('data' =>  TRUE,"msg" => "Berhasil, Gambar tidak tersimpan ke database"));
            }
   
            
        }
    }

    function load_data(){ //
         $jenis = $this->input->post('jenis');
         $options = $this->input->post('opsi');
         $ids = $this->input->post('id');

            if($jenis == "list_pl_barang") {
                
                if($ids != ""){
                    $query = $this->m_master->getPlBrngEdit($ids);
                }else{
                    $query = $this->m_master->get_pl_barang();
                }
                
                $i=0;

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","",""];
                }else{
                    foreach ($query->result() as $r) {
                        $id = "$r->id";

                        $row = array();
                        $row[] = $r->kode_barang;
                        $row[] = $r->merek.' '.$r->nama_barang.' '.$r->spesifikasi;
                        $row[] = '<div style="text-align:right">'.$r->qty.'</div>';
                        $row[] = '<input type="text" class="angka form-control" id="i_qty'.$i.'" placeholder="0" autocomplete="off"  onkeypress="return hanyaAngka(event)">
                        <input type="hidden" id="qty'.$i.'" value="'.$r->qty.'">';
                        $row[] = $r->qty_ket;

                        $aksi = '<a type="button" onclick="addToCart('."'".$id."'".','."'".$r->kode_barang."'".','."'".$r->nama_barang."'".','."'".$r->merek."'".','."'".$r->spesifikasi."'".','."'".$r->qty."'".','."'".$r->qty_ket."'".','."'".$i."'".')" class="btn bg-brown btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">check</i>
                            </a>';

                        $row[] = $aksi;
                        $data[] = $row;

                        $i++;
                    }
                }

                $output = array(
                                "data" => $data,
                        );
            }else if ($jenis == "list_pl_inv") {
                
                $query = $this->m_master->get_pl_inv();
                
                $i=0;

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","",""];
                }else{
                    foreach ($query->result() as $r) {
                        $id = "$r->id_pl_list_barang";

                        $row = array();
                        $row[] = $r->kode_barang;
                        $row[] = $r->nama_barang;
                        $row[] = '<div style="text-align:right">'.$r->qty.'</div>';
                        $row[] = '<input type="text" class="angka form-control" id="harga_inv'.$i.'" placeholder="0" autocomplete="off"  onkeypress="return hanyaAngka(event)">';
                        $row[] = $r->qty_ket;

                        $aksi = '<a type="button" onclick="addToCart('."'".$id."'".','."'".$r->kode_barang."'".','."'".$r->nama_barang."'".','."'".$r->qty."'".','."'".$i."'".')" class="btn bg-brown btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">check</i>
                            </a>';

                        $row[] = $aksi;
                        $data[] = $row;

                        $i++;
                    }
                }

                $output = array(
                                "data" => $data,
                        );
            }else if ($jenis == "PL_price_list") { //
                $i=1;
                $query = $this->m_master->get_PL_price_list();
                
                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","","",""];
                }else{

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";

                        $row = array();
                        $row[] = $i;
                        $row[] = $this->m_fungsi->tanggal_format_indonesia($r->tgl);
                        $row[] = $r->no_surat;
                        $row[] = $r->no_so;
                        $row[] = $r->no_po;
                        $row[] = '
                        <a type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">'.$r->jml_timbang.'</a>' ;

                        $aksi ="";

                        $superbtn = '<button type="button" onclick="view_detail('.$id.')" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">remove_red_eye</i>
                            </button>';
                        
                        $btn_edit = '<button type="button" onclick="tampil_edit('.$id.')" class="btn bg-orange btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">edit</i>
                        </button>';
                            
                        if($r->data_inv == 1){
                            $superbtn .= '';
                        }else{
                            $superbtn .= ' '.$btn_edit.' '.'<button type="button" onclick="deleteData('.$id.','."".')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">delete</i>
                            </button>';
                        }
                            
                        $superbtn2 = '<button type="button" onclick="view_detail('.$id.')" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">remove_red_eye</i>
                            </button>';

                        if (($this->session->userdata('level') == "Developer" || $this->session->userdata('level') == "SuperAdmin" ) && $r->cek_po == 0) {
                            $aksi = ''.$superbtn.'';
                        }else{
                            $aksi = ''.$superbtn2.'';
                        }    
                            
                        $row[] = $aksi;
                        $data[] = $row;

                        $i++;
                    }
                }

                $output = array("data" => $data);
                

            }else if ($jenis == "pl_inv") { //
                $i=1;
                $query = $this->m_master->get_load_inv();
                
                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","","","","",""];
                }else{

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";

                        $row = array();
                        $row[] = $i;
                        $row[] = $this->m_fungsi->tanggal_format_indonesia($r->tgl_jt);
                        $row[] = $r->no_nota;
                        $row[] = $r->no_faktur;
                        $row[] = $r->nm_perusahaan;
                        $row[] = '
                        <a type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">'.$r->jml_timbang.'</a>' ;

                        $superbtn = '<button style="background:#00B0E4;margin:0;padding:3px 6px;border:0;color:#fff" type="button" onclick="view_detail('.$id.','.$r->no_inv.')">VIEW</button><button style="background:#FF9800;margin:0;padding:3px 6px;border:0;color:#fff" type="button" onclick="tampil_edit('.$id.','.$r->no_inv.')">EDIT</button><button style="background:#FB483A;margin:0;padding:3px 6px;border:0;color:#fff" type="button" onclick="deleteData('.$id.','.$r->no_inv.')">DELETE</button>';
                            
                        $superbtn2 = '<button style="background:#00B0E4;margin:0;padding:3px 6px;border:0;color:#fff" type="button" onclick="view_detail('.$id.','.$r->no_inv.')">VIEW</button>';

                        $confirmByr = '<button style="background:#4CAF50;margin:0;padding:3px 6px;border:0;color:#fff" type="button" onclick="confirmByr('.$id.','.$i.')">OKE</button>';

                        if($r->tgl_ctk === NULL && $r->tgl_byr === NULL){
                            $ketPlhbyr = "Belum Cetak";
                            $ketTglCtk = "Nota Penjualan!";
                            $btn = $superbtn;
                        }else if($r->tgl_ctk <> NULL && $r->tgl_byr === NULL){
                            $ketPlhbyr = '<select name="" id="plhByrInvc'.$i.'" class="form-control">
                                <option value="0">Pilih...</option>
                                <option value="1">Cash</option>
                                <option value="2">Transfer Bank</option>
                            </select>';
                            $ketTglCtk = '<input type="date" id="plhTglInvc'.$i.'" value="" class="form-control">';
                            $btn = $superbtn.''.$confirmByr;
                        }else{
                            if($r->via == 1){
                                $via = "Cash";
                            }else if($r->via == 2){
                                $via = "Transfer Bank";
                            }else{
                                $via = "-";
                            }

                            $ketPlhbyr = $via;
                            $ketTglCtk = $r->tgl_byr;
                            $btn = $superbtn2;
                        }

                        $row[] = $ketPlhbyr;
                        $row[] = $ketTglCtk;

                        $aksi ="";
                        if (($this->session->userdata('level') == "Developer" || $this->session->userdata('level') == "SuperAdmin" )) {
                            $aksi = $btn;
                        }else{
                            $aksi = ''.$superbtn2.'';
                        }    
                            
                        $row[] = $aksi;
                        $data[] = $row;

                        $i++;
                    }
                }

                $output = array("data" => $data);
                

            }else if ($jenis == "Perusahaan") {

                $query = $this->m_master->get_perusahaan();

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","","","",""];
                }else{
                    $i=1;

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";

                        $row = array();
                        // $row[] = $r->id;
                        $row[] = $i;
                        $row[] = $r->pimpinan;
                        $row[] = $r->nm_perusahaan;
                        $row[] = $r->alamat;
                        $row[] = $r->npwp;
                        $row[] = $r->no_telp;

                        if($r->laporan == "sma"){
                            $kett = "SINAR MUKTI ABADI";
                        }else if($r->laporan == "st"){
                            $kett = "SINAR TEKNINDO";
                        }else{
                            $kett = "-";
                        }

                        $row[] = $kett;

                        $aksi ="";

                        if ($this->session->userdata('level') == "Developer" || $this->session->userdata('level') == "SuperAdmin") {
                        
                            $aksi = '       
                            <button type="button" onclick="tampil_edit('.$id.')" class="btn bg-orange btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">edit</i>
                            </button>
                            <button type="button" onclick="deleteData('.$id.','."".')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">delete</i>
                            </button>';
                        }else{
                            $aksi .='-';
                        }

                        $row[] = $aksi;
                        $data[] = $row;
                        $i++;
                    }
                }
                $output = array("data" => $data);
            }else if ($jenis == "load_price_list") {

                $query = $this->m_master->get_load_price_list();

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","","",""];
                }else{
                    $i=1;

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";
                        $row = array();
                        $row[] = $i;
                        // $row[] = $this->m_fungsi->tanggal_format_indonesia($r->tgl);
                        $row[] = $r->kode_barang;
                        $row[] = $r->nama_barang;
                        $row[] = $r->merek;
                        $row[] = $r->spesifikasi;
                        // $row[] = $r->nama_supplier;
                        $row[] = "Rp. ".number_format($r->harga_price_list);

                        $aksi ="";

                        if ($this->session->userdata('level') == "Developer" || $this->session->userdata('level') == "SuperAdmin") {
                            $aksi = '   
                            <button type="button" onclick="tampil_edit('.$id.')" class="btn bg-orange btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">edit</i>
                            </button>
                          <button type="button" onclick="deleteData('.$id.','."".')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">delete</i>
                            </button>';    
                        }else{
                            $aksi .='-';
                            
                        }

                        $row[] = $aksi;
                        $data[] = $row;
                        $i++;
                    }
                }
                $output = array("data" => $data);
            }else if ($jenis == "Load_Barang") {

                // $query = $this->m_master->get_load_barang();
                $query = $this->m_master->getLoadBarang();

                if ($query->num_rows() == 0) {
                    if($options == "Etalase"){
                        $data[] =  ["","","","","","",""];
                    }else{
                        $data[] =  ["","","","","","",""];
                    }
                }else{
                    $i=1;

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";
                        $row = array();
                        $row[] = $i;
                        if($options == "Etalase"){
                            $row[] = $r->kode_barang;
                            $row[] = $r->nama_barang;
                            $row[] = $r->merek;
                            $row[] = $r->spesifikasi;
                            $row[] = number_format($r->qty);
                            $row[] = $r->qty_ket;
                        }else{
                            $row[] = $r->kode_barang;
                            $row[] = $r->nama_barang;
                            $row[] = $r->merek;
                            $row[] = $r->spesifikasi;
                            $row[] = number_format($r->qty);
                            $aksi ="";

                            $btn_edit = '<button type="button" onclick="tampil_edit('.$id.')" class="btn bg-orange btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">edit</i>
                            </button>';

                            $btn_plus_qty = '<button type="button" onclick="plus_qty('.$id.')" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">add</i>
                            </button>';

                            $btn_hapus = '<button type="button" onclick="deleteData('.$id.','."".')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">delete</i>
                            </button>';

                            $detail = '<button type="button" onclick="view_detail('.$id.','."2".')" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">remove_red_eye</i>
                            </button>';

                            if ($this->session->userdata('level') == "Developer" || $this->session->userdata('level') == "SuperAdmin") {
                                $aksi = $detail.' '.$btn_plus_qty.' '.$btn_edit.' '.$btn_hapus;
                            }else if ($this->session->userdata('level') == "Admin") {
                                $aksi = $btn_edit;
                            }else{
                                $aksi .='-';
                            }
                            $row[] = $aksi;
                        }

                        $data[] = $row;
                        $i++;
                    }
                }
                $output = array("data" => $data);
            }else if ($jenis == "loadKodeBarang") {

                $query = $this->m_master->getKodeBarang();

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","",""];
                }else{
                    $i=1;

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";
                        $row = array();
                        $row[] = $i;

                        $row[] = $r->kode_barang;
                        $row[] = $r->nama_barang;
                        $row[] = $r->merek;
                        $row[] = $r->spesifikasi;
                        $aksi ="";

                        $btn_edit = '<button type="button" onclick="tampil_edit('.$id.')" class="btn bg-orange btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">edit</i>
                        </button>';

                        $btn_hapus = '<button type="button" onclick="deleteData('.$id.','."".')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">delete</i>
                        </button>';

                        if ($this->session->userdata('level') == "Developer" || $this->session->userdata('level') == "SuperAdmin") {
                            $aksi = $btn_edit.' '.$btn_hapus;
                        }else if ($this->session->userdata('level') == "Admin") {
                            $aksi = $btn_edit;
                        }else{
                            $aksi .='-';
                        }
                        $row[] = $aksi;

                        $data[] = $row;
                        $i++;
                    }
                }
                $output = array("data" => $data);
            }else if ($jenis == "Load_Supplier") {

                $query = $this->m_master->get_load_supplier();

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","",""];
                }else{
                    $i=1;

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";
                        $row = array();
                        $row[] = $i;
                        $row[] = $r->nama_supplier;

                        if($r->ppn == 0){
                            $kett = "NON PPN";
                        }else{
                            $kett = "PPN 10%";
                        }

                        $row[] = $kett;
                        $aksi ="";

                        $btn_edit = '<button type="button" onclick="tampil_edit('.$id.')" class="btn bg-orange btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">edit</i>
                        </button>';

                        $btn_hapus = '<button type="button" onclick="deleteData('.$id.','."".')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">delete</i>
                        </button>';   
                                    
                        if ($this->session->userdata('level') == "Developer" || $this->session->userdata('level') == "SuperAdmin") {
                            $aksi = $btn_edit.' '.$btn_hapus;
                        }else if($this->session->userdata('level') == "Admin") {
                            $aksi = $btn_edit;
                        }else{
                            $aksi .='-';
                        }

                        $row[] = $aksi;
                        $data[] = $row;
                        $i++;
                    }
                }
                $output = array("data" => $data);
            }else if ($jenis == "Load_Administrator") {

                $query = $this->m_master->get_load_admin();

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","",""];
                }else{
                    $i=1;

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";
                        $row = array();
                        $row[] = $i;
                        $row[] = $r->nm_user;
                        $row[] = $r->username;
                        $row[] = $r->level;
                        $row[] = $r->otoritas;
                        $aksi ="";

                        $btn_edit = '<button type="button" onclick="tampil_edit('.$id.')" class="btn bg-orange btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">edit</i>
                        </button>';

                        $btn_hapus = '<button type="button" onclick="deleteData('.$id.','."".')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">delete</i>
                        </button>';

                        if ($this->session->userdata('level') == "Developer") {
                            $aksi = $btn_edit.' '.$btn_hapus;
                        }else if ($this->session->userdata('level') == "SuperAdmin") {
                            $aksi = $btn_edit;
                        }

                        $row[] = $aksi;
                        $data[] = $row;
                        $i++;
                    }
                }
                $output = array("data" => $data);
            }else if ($jenis == "Load_NoNota") {

                $query = $this->m_master->get_load_no_nota();

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","",""];
                }else{
                    $i=1;

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";
                        $row = array();
                        $row[] = $i;
                        $row[] = $r->nama_supplier;
                        $row[] = $r->no_nota;
                        $aksi ="";

                        $btn_edit = '<button type="button" onclick="tampil_edit('.$id.')" class="btn bg-orange btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">edit</i>
                        </button>';
                        $btn_hapus = '<button type="button" onclick="deleteData('.$id.','."".')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                        <i class="material-icons">delete</i>
                        </button>';

                        if ($this->session->userdata('level') == "Developer" || $this->session->userdata('level') == "SuperAdmin") {
                            $aksi = $btn_edit.' '.$btn_hapus;
                        }else if ($this->session->userdata('level') == "Admin") {
                            $aksi = $btn_edit;
                        }else{
                            $aksi .='-';
                        }

                        $row[] = $aksi;
                        $data[] = $row;
                        $i++;
                    }
                }
                $output = array("data" => $data);
            }else if ($jenis == "PoMaster") {

                $query = $this->m_master->get_po_master();

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","","","",""];
                }else{
                    $i=1;

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";

                        $row = array();
                        $row[] = $i;
                        $row[] = $r->nm_perusahaan;
                        $row[] = $r->tgl;
                        $row[] = $r->nama_barang;
                        $row[] = $r->qty;
                        $row[] = $r->no_po;

                        $aksi ="";

                        if ($this->session->userdata('level') == "SuperAdmin") {

                            $aksi = '   
                            <button type="button" onclick="tampil_edit('.$id.')" class="btn bg-orange btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">edit</i>
                            </button>
                          <button type="button" onclick="deleteData('.$id.','."".')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">delete</i>
                            </button>';

                            $row[] = $aksi;
                            $data[] = $row;
                            
                        }else{
                            $aksi .='-';
                            $row[] = $aksi;
                            $data[] = $row;
                        }
                            
                        $i++;
                    }
                }
                $output = array("data" => $data);
            }else if ($jenis == "Invoice") {

                $query = $this->m_master->get_invoice();

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","","","",""];
                }else{

                    $i=1;

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";
                        $nm = "'$r->no_surat'";
                        // $print = base_url("laporan/print_invoice?no_invoice=").$r->no_invoice;
                        $print = base_url("laporan/print_invoice_v2?no_invoice=").$r->no_invoice;

                        $row = array();
                        $row[] = $i;
                        $row[] = $r->no_invoice;
                        $row[] = $r->no_surat;
                        $row[] = $r->no_po;
                        $row[] = $r->nm_perusahaan;
                        $row[] = $r->total;
                        $row[] = $r->status;

                        $aksi ="";

                        if ($this->session->userdata('level') == "SuperAdmin") {
                        
                            if ($r->status == "Closed") {
                                $aksi = '   
                              <button type="button" onclick="deleteData('.$id.','.$nm.')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" title="Reject">
                                    <i class="material-icons">close</i>
                                </button>

                                <a type="button" href="'.$print.'" target="blank" class="btn btn-default btn-circle waves-effect waves-circle waves-float" title="Print Invoice">
                                    <i class="material-icons">print</i>
                                </a>

                                <a type="button" onclick="confirmData('.$id.','.$nm.')" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">check</i>
                                </a>

                                ';
                            }else if($r->status == "Valid"){
                                $aksi = ' 

                                <a type="button" href="'.$print.'" target="blank" class="btn btn-default btn-circle waves-effect waves-circle waves-float" title="Print Invoice">
                                    <i class="material-icons">print</i>
                                </a>

                                ';
                            }

                            $row[] = $aksi;
                            $data[] = $row;
                            
                        }else{
                            // $aksi .='-';

                            $aksi = ' 

                                <a type="button" href="'.$print.'" target="blank" class="btn btn-default btn-circle waves-effect waves-circle waves-float" title="Print Invoice">
                                    <i class="material-icons">print</i>
                                </a>

                                ';

                            $row[] = $aksi;
                            $data[] = $row;
                        }
                            
                        $i++;
                    }
                }

                $output = array("data" => $data);


            }else if ($jenis == "Home") { //

                $query = $this->m_master->get_jatuh_tempo();

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","","","",""];
                }else{

                    $i=1;

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";
                        $row = array();
                        $row[] = $i;
                        $row[] = $r->nama_supplier;
                        $row[] = $r->no_nota;
                        $row[] = 'Rp. '.number_format($r->nota_terbilang);
                        $row[] = $r->status;
                        
                        $date_now = date('Y-m-d');
                        if($r->tgl_jt_tempo == $date_now && $r->status == "Kredit"){
                            $style = 'style="color:#94151B;font-weight:bold"';
                        }else if($r->tgl_jt_tempo <= $date_now && $r->status == "Kredit"){
                            $style = 'style="color:#f00;font-weight:bold"';
                        }else if($r->tgl_jt_tempo >= $date_now && $r->status == "Kredit"){
                            $style = 'style="color:#ff8c00;font-weight:bold"';
                        }else if($r->status == "Cash"){
                            $style = 'style="color:#4CAF50;font-weight:bold"';
                        }else{
                            $style = 'style="color:#4CAF50;font-weight:bold"';
                        }

                        $row[] = '<div '.$style.'>'.$this->m_fungsi->tanggal_format_indonesia($r->tgl_jt_tempo).'</div><input type="hidden" value="'.$r->tgl_jt_tempo.'" id="pTglTemp'.$i.'">';

                        $row[] = '<input type="date" id="plhTglPbJthTp'.$i.'" value="" class="form-control">';

                        $row[] = '<button style="background:#00B0E4;margin:0;padding:3px 6px;border:0;color:#fff" type="button" onclick="view_detail('.$r->id_m_nota.')">VIEW</button><button style="background:#4CAF50;margin:0;padding:3px 6px;border:0;color:#fff" type="button" onclick="confirmByr('.$r->id_m_nota.','.$i.')">OKE</button>';
                        
                        $data[] = $row;
                            
                        $i++;
                    }
                }

                $output = array("data" => $data);


            }

            echo json_encode($output);
    }

    

    function get_akb(){
      $searchTerm = $_GET['search'];
      // Get users
      $response = $this->m_master->get_akb($searchTerm);

      echo json_encode($response);

    }

    function load_sj(){
      $searchTerm = $_GET['search'];

      // Get users
      $response = $this->m_master->list_sj($searchTerm);

      echo json_encode($response);

    }

    function load_perusahaan(){
      $searchTerm = $_GET['search'];

      // Get users
      $response = $this->m_master->list_perusahaan($searchTerm);

      echo json_encode($response);
    }

    function loadCustPl(){
        $searchTerm = $_GET['search'];
        $id = $_GET['id_m'];

        $response = $this->m_master->listCustPl($searchTerm,$id);

        echo json_encode($response);
    }

    function load_pl(){
        $searchTerm = $_GET['search'];
        $no_inv = $_GET['no_inv'];
  
        // Get users
        $response = $this->m_master->list_pl($searchTerm,$no_inv);
  
        echo json_encode($response);
      }

    function laod_po_barang(){
        $searchTerm = $_GET['search'];
  
        // Get users
        $response = $this->m_master->list_po_barang($searchTerm);
  
        echo json_encode($response);
      }

    function laod_supplier(){
        $searchTerm = $_GET['search'];

        // Get users
        $response = $this->m_master->list_supplier($searchTerm);

        echo json_encode($response);
    }

    function laod_p_sj(){
        $s = $_GET['search'];

        // Get users
        $response = $this->m_master->list_p_sj($s);

        echo json_encode($response);
    }

    function load_so(){
        $s = $_GET['search'];

        // Get users
        $response = $this->m_master->load_so($s);

        echo json_encode($response);
    }

    function laod_p_nota(){
        $s = $_GET['search'];

        // Get users
        $response = $this->m_master->list_p_nota($s);

        echo json_encode($response);
    }

    function laod_p_cust(){
        $s = $_GET['search'];

        // Get users
        $response = $this->m_master->list_p_cust($s);

        echo json_encode($response);
    }

    function laod_supplier_nota(){ //
        $searchTerm = $_GET['search'];
    
        // Get users
        $response = $this->m_master->list_supplier_nota($searchTerm);
    
        echo json_encode($response);
    }

    function cariNewKdBarang(){
        $searchTerm = $_GET['search'];
    
        // Get users
        $response = $this->m_master->listNKdBarang($searchTerm);
    
        echo json_encode($response);
    }
    
    function loadSuppBrng(){
        $searchTerm = $_GET['search'];
        $ppn = $_GET['ppn'];
    
        // Get users
        $response = $this->m_master->listSuppBrng($searchTerm,$ppn);
    
        echo json_encode($response);
    }

    function load_m_barang_pl(){ //
        $searchTerm = $_GET['search'];
  
        // Get users
        $response = $this->m_master->list_m_barang_pl($searchTerm);
  
        echo json_encode($response);
  
      }
    
    function update(){
            $jenis      = $_POST['jenis'];
            
            if ($jenis == "Perusahaan") {
                $id      = $this->input->post('nm_perusahaan');
                $id_lama      = $this->input->post('nm_perusahaan_lama');
                $cek = $this->m_master->get_data_one("m_perusahaan","nm_perusahaan",$id)->num_rows();

                if ($cek > 0 && $id != $id_lama) {
                    echo json_encode(array('data' =>  FALSE));
                }else{
                    $result= $this->m_master->update_perusahaan();
                    echo json_encode(array('data' =>  TRUE));
                }
            }else if ($jenis == "Simpan_Price_List") {
                // $id      = $this->input->post('kode_barang');
                // $id_lama = $this->input->post('kode_barang_lama');
                // $cek = $this->m_master->get_data_one("m_price_list","kode_barang",$id)->num_rows();

                // if ($id <> $id_lama) {
                //     echo json_encode(array('data' =>  FALSE,'msg' => 'Kode Barang Lain'));
                // }else{
                    $result= $this->m_master->update_price_list();
                    echo json_encode(array('data' =>  TRUE));
                // }
            }else if ($jenis == "Simpan_Supplier") {
                $id      = $this->input->post('supplier');
                $id_lama = $this->input->post('supplier_lama');
                $cek = $this->m_master->get_data_one("m_supplier","nama_supplier",$id)->num_rows();

                if ($cek > 0 && $id <> $id_lama) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'Supplier Sudah Ada!'));
                }else{
                    $result= $this->m_master->update_load_supplier();
                    echo json_encode(array('data' =>  TRUE));
                }
            }else if ($jenis == "Simpan_Admin") {
                $id = $this->input->post('username');
                $id_lama = $this->input->post('username_lama');

                $cek = $this->m_master->get_data_one("user","username",$id)->num_rows();

                if ($id <> $id_lama && $cek > 0) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'Username Sudah Ada'));
                }else{
                    $result= $this->m_master->update_load_admin();
                    echo json_encode(array('data' =>  TRUE));
                }
            }else if ($jenis == "Simpan_Nota") {
                // $id      = $this->input->post('supplier');
                // $id_lama = $this->input->post('supplier_lama');
                $nota      = $this->input->post('no_nota');
                $nota_lama = $this->input->post('no_nota_lama');
                $id_supp = $this->input->post('supplier');

                // $cek = $this->m_master->get_data_one("m_nota","no_nota",$nota)->num_rows();

                // cek supp
                $cek_supNo = $this->m_master->cari_supNo($id_supp,$nota)->num_rows();

                if ($nota == $nota_lama) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'No. Nota Sama Dengan Sebelumnya'));
                }else if ($cek_supNo > 0) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'Supplier Dengan No. Nota Tersebut Sudah Ada!'));
                }else{
                    $result= $this->m_master->update_nonota();
                    echo json_encode(array('data' =>  TRUE));
                }
            }else if ($jenis == "Simpan_Barang") { //
                $opsi      = $_POST['opsi'];
                $kode_barang = $this->input->post('kode_barang');
                $kd_lama = $this->input->post('kode_barang_lama');
                $cek = $this->m_master->get_data_one("m_barang","kode_barang",$kode_barang)->num_rows();

                $idMBP = $this->input->post('id_m_barang_plus');
                $tgl = $this->input->post('tgl');
                $tgl_lama = $this->input->post('tgl_lama');
                // $tgl_byr = $this->input->post('tgl_byr');
                // $tgl_byr_lama = $this->input->post('tgl_byr_lama');
                $qty_plus = $this->input->post('qty_plus');
                $qty_edit = $this->input->post('qty_edit');

                // $status_plus = $this->input->post('status_plus');
                // $harga = $this->input->post('harga');

                if($opsi == "edit"){
                    // if($cek > 0 && $kode_barang <> $kd_lama){
                    //     echo json_encode(array('data' =>  FALSE,'msg' => 'Kode Barang Sudah Ada!'));
                    // }else
                    if ($tgl < $tgl_lama) {
                        echo json_encode(array('data' =>  FALSE,'msg' => 'Tanggal Masuk Tidak Boleh Lebih Kecil Dari Tanggal Masuk Pembelian Sebelumnya!'));
                    }
                    // else if ($tgl_byr < $tgl) {
                    //     echo json_encode(array('data' =>  FALSE,'msg' => 'Tanggal Bayar Tidak Boleh Lebih Kecil Dari Tanggal Masuk!'));
                    // }else if(($harga == 0 || $harga == "") && $status_plus == "Cash"){
                    //     echo json_encode(array('data' =>  FALSE,'msg' => 'Pembayaran Cash, Harga Tidak Boleh Kosong!'));
                    // }
                    else if($qty_edit == 0){
                        $this->m_master->delete("m_barang_plus","id",$idMBP);
                        $this->m_master->update_load_barang();
                        echo json_encode(array('data' =>  TRUE,'msg' => 'Berhasil'));
                    }else{
                        $this->m_master->update_load_barang();
                        echo json_encode(array('data' =>  TRUE,'msg' => 'Berhasil'));
                    }
                }else if($opsi == "add_qty"){
                    if($qty_plus == 0) {
                        echo json_encode(array('data' =>  FALSE,'msg' => 'Tambah QTY Tidak Boleh Kosong'));
                    }else if ($tgl < $tgl_lama) {
                        echo json_encode(array('data' =>  FALSE,'msg' => 'Tanggal Masuk Tidak Boleh Lebih Kecil Dari Tanggal Masuk Pembelian Sebelumnya!'));
                    }
                    // else if ($tgl_byr < $tgl) {
                    //     echo json_encode(array('data' =>  FALSE,'msg' => 'Tanggal Bayar Tidak Boleh Lebih Kecil Dari Tanggal Masuk!'));
                    // }else if ($tgl_byr < $tgl_byr_lama) {
                    //     echo json_encode(array('data' =>  FALSE,'msg' => 'Tanggal Bayar Tidak Boleh Lebih Kecil Dari Tanggal Pembayaran Sebelumnya!'));
                    // }else if(($harga == 0 || $harga == "") && $status_plus == "Cash"){
                    //     echo json_encode(array('data' =>  FALSE,'msg' => 'Pembayaran Cash, Harga Tidak Boleh Kosong!'));
                    // }
                    else{
                        $this->m_master->update_load_barang();
                        echo json_encode(array('data' =>  TRUE,'msg' => 'Berhasil'));
                    }
                }
            }else if ($jenis == "PL_pl_barang") {
                $no_surat = $this->input->post('no_surat');
                $no_surat_lama = $this->input->post('no_surat_lama');
                $no_inv = $this->input->post('no_inv');
                $kepada = $this->input->post('kepada');
                $laporan = $this->input->post('laporan');

                $cek = $this->m_master->get_data_one("m_pl_price_list","no_surat",$no_surat)->num_rows();
                $cek2 = $this->m_master->get_data_one("m_pl_price_list","no_inv",$no_inv)->num_rows();

                $cekInv = $this->m_master->getNoInv($no_inv)->num_rows();
                $cekInv2 = $this->m_master->getNoInvCustLap($no_inv,$kepada,$laporan)->num_rows();

                // cek no surat jalan
                if ($cek > 0 && $no_surat != $no_surat_lama) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'No Surat Jalan Sudah Ada!'));
                // jika input no invoice
                }else if($no_inv != 0){
                    // cek no invoice sdh cetak nota
                    if($cek2 > 0){
                        if($cekInv > 0) {
                            echo json_encode(array('data' =>  FALSE,'msg' => 'No Invoice Sudah Cetak Nota!'));
                        }else if($cekInv2 == 0){
                            echo json_encode(array('data' =>  FALSE,'msg' => 'Periksa Kembali!! Input No. Invoice. Customer dan Laporan Tidak Boleh Berbeda Dari Sebelumnya!!'));
                        }else{
                            $result = $this->m_master->update_pl_edit();    
                            echo json_encode(array('data' =>  TRUE));
                        }
                    }else{
                        $result = $this->m_master->update_pl_edit();    
                        echo json_encode(array('data' =>  TRUE));
                    }
                // tidak input no invoice
                }else{
                    $result = $this->m_master->update_pl_edit();    
                    echo json_encode(array('data' =>  TRUE));
                }
            }else if ($jenis = "editPlListBarang"){
                $result = $this->m_master->updatePListBarang();    
                echo json_encode(array('data' =>  TRUE));
            }else{
                echo json_encode(array('data' =>  false));
            }
    }

    function update_inv() {
        $jenis = $_POST['jenis'];

        if($jenis == "Save_invoice"){
            $no_nota = $this->input->post('no_nota');
            $no_nota_lama = $this->input->post('no_nota_lama');

            $cek = $this->m_master->get_data_one("m_invoice","no_nota",$no_nota)->num_rows();

            if ($cek > 0 && $no_nota <> $no_nota_lama) {
                echo json_encode(array('data' =>  FALSE,'msg' => 'No Nota Sudah Ada!'));
            }else{
                $result = $this->m_master->edit_pl_inv();    
                echo json_encode(array('data' =>  true));
            }
        }else if ($jenis = "editInvListBarang"){
            $result = $this->m_master->updateInvListBarang();    
            echo json_encode(array('data' =>  TRUE));
        }else{
            echo json_encode(array('data' =>  false));
        }
    }

    function destroy_cart(){
        $this->cart->destroy();
        echo $this->show_cart();
    }

    function destroy_cart_plpl(){
        $this->cart->destroy();
        echo $this->show_cart_plpl();
    }

    function destroy_cart_inv(){
        $this->cart->destroy();
        echo $this->show_cart_inv();
    }

    // function destroy_cart_barang(){
    //     $this->cart->destroy();
    //     echo $this->show_cart_barang();
    // }

    function show_cart(){ //Fungsi untuk menampilkan Cart

        $output = '';
        $no = 0;

        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .='
                <tr>
                    <td>'.$no.'</td>
                    <td>'.str_replace("_", "/", $items['name']).'</td>
                    <td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                </tr>
            ';
        }
        

        return $output;
    }

    function show_edit_cart_pl(){ //
        $output = '';
        $no = 0;

        foreach ($this->cart->contents() as $items) {
            $no++;
            $ii = $items['qty'] - 1;
            $sisa_stok = $items['options']['stok'] - $ii;

            $output .='
                <tr>
                    <td>'.$no.'</td>
                    <td>'.$items['options']['kode_barang'].'</td>
                    <td>Rp. '.number_format($items['price']).'</td>
                    <td>'.number_format($sisa_stok).'</td>
                    <td>'.$ii.'</td>
                    <td>'.$items['options']['tambahan'].'</td>
                    <td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                </tr>
            ';
        }
        return $output;
    }

    function add_to_cart_pl_barang(){ //
        $data = array(
            // 'id' => str_replace("/", "_", $_POST['kode_barang']), 
            'id' => $_POST['id_barang'], 
            'name' => $_POST['nama_barang'],
            'price' => 0, 
            'qty' => $_POST['i_qty'],
            'options' => array(
                'id_barang' => $_POST['id_barang'],
                'kode_barang' => $_POST['kode_barang'],
                'i_qty' => $_POST['i_qty'],
                'qty' => $_POST['qty'],
                'qty_ket' => $_POST['qty_ket'],
                'merek' => $_POST['merek'],
                'spesifikasi' => $_POST['spesifikasi']
            )
        );
        $this->cart->insert($data);
        echo $this->show_cart_plpl(); //tampilkan cart setelah added
    }

    function show_cart_plpl(){
        $output = '';
        $no = 0;

        foreach ($this->cart->contents() as $items) {
            $no++;
            $sisa_stok = $items['options']['qty'] - $items['qty'];

            if($sisa_stok < 0){
                $stok = 0;
                $iqty = ($items['qty'] - $items['qty']) + $items['options']['qty'];
            }else{
                $stok = $sisa_stok;
                $iqty = $items['qty'];
            }

            $output .='
                <tr>
                    <td>'.$no.'</td>
                    <td>'.$items['options']['kode_barang'].'</td>
                    <td>'.$items['options']['merek'].' '.$items['name'].' '.$items['options']['spesifikasi'].'</td>
                    <td>'.number_format($stok).'</td>
                    <td>'.$iqty.' '.$items['options']['qty_ket'].'</td>
                    <td style="text-align:center"><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                </tr>
            ';
        }
        return $output;
    }

    function hapus_cart_plpl(){ //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->show_cart_plpl();
    }

    function add_to_cart_inv(){

        $data = array(
            'id' => str_replace("/", "_", $_POST['kode_barang']), 
            'name' => $_POST['nama_barang'],
            'price' => 0, 
            'qty' => 1,
            'options' => array(
                'id_list_barang' => $_POST['id_list_barang'],
                'kode_barang' => $_POST['kode_barang'],
                'qty' => $_POST['qty'],
                'price' => $_POST['harga_inv']
            )
        );
        $this->cart->insert($data);
        echo $this->show_cart_inv(); //tampilkan cart setelah added
    }

    function show_cart_inv(){
        $output = '';
        $no = 0;

        foreach ($this->cart->contents() as $items) {
            $no++;

            $output .='
                <tr>
                    <td>'.$no.'</td>
                    <td>'.$items['options']['kode_barang'].'<input type="hidden" value="'.$items['options']['id_list_barang'].'" id="id_pll_h"></td>
                    <td>'.$items['name'].'</td>
                    <td>'.$items['options']['qty'].'</td>
                    <td>Rp. '.number_format($items['options']['price']).'</td>
                    <td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                </tr>
            ';
        }

        return $output;
    }

    function hapus_cart_inv(){ //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->show_cart_inv();
    }

    function view_edit_cart_pl(){

        $data = array(
            'id' => str_replace("/", "_", $_POST['kode_barang']), 
            'name' => str_replace("/", "_", $_POST['kode_barang']),
            'price' => $_POST['harga_price_list'], 
            'qty' => 1,
            'options' => array(
                'kode_barang' => $_POST['kode_barang'],
                'stok' => $_POST['qty'],
                'tambahan' => $_POST['i_qty_barang']
            )
        );
        $this->cart->insert($data);
        echo $this->show_edit_cart_pl();
    }

    function save_edit_cart_pl(){

        $data = array(
            'id' => str_replace("/", "_", $_POST['kode_barang']), 
            'name' => str_replace("/", "_", $_POST['kode_barang']),
            'price' => $_POST['harga_price_list'], 
            'qty' => $_POST['i_qty'],
            'options' => array(
                'kode_barang' => $_POST['kode_barang'],
                'stok' => $_POST['qty'],
                'tambahan' => $_POST['i_qty_barang']
            )
        );
        $this->cart->insert($data);
        echo $this->show_edit_cart_pl();
    }

    function hapus_cart(){ //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }

    function reject(){
        $result = $this->m_master->reject();
        echo "1";
    }

    function confirm(){
        $result = $this->m_master->confirm();
        echo "1";
    }

    function cPembJthTempo() {
        $id = $_POST['id'];
        $pTglTemp = $_POST['pTglTemp'];
        $pTglBayar = $_POST['pTglBayar'];
        
        // update tgl bayar barang
        $data =  $this->m_master->cByrJthTempo($id);
        foreach($data->result() as $r){
            $this->db->set("tgl_bayar", $pTglBayar);
            $this->db->where('id', $r->id);
            $this->db->update('m_barang_plus');
        }
        
        echo json_encode(array('msg' => true));
    }

    function confirmBayarInv(){
        $id_inv = $_POST['id'];
        $tgl_byr = $_POST['tglByrInv'];
        $via = $_POST['plhByrInvc'];

        $data =  $this->m_master->get_data_one("m_invoice", "id", $id_inv)->row();

        // jika ada no invoice
        if($data->id_pl == 0){
            $noInv = "no_inv";
            $plInv = $data->no_inv;
        }else{
            $noInv = "id";
            $plInv = $data->id_pl;
        }

        // ubah cek inv jadi 1
        $data_pl_u =  $this->m_master->get_data_one("m_pl_price_list", $noInv, $plInv)->result();
        foreach($data_pl_u as $r){
            if($r->no_inv == 0){
                $www = $r->id;
            }else{
                $www = $r->no_inv;
            }

            $data = array(
                'cek_inv' => 1
            );
            $this->db->where($noInv, $www);
            $this->db->update('m_pl_price_list', $data);
        }

        // update tgl bayar inv
        $this->db->set("via", $via);
        $this->db->set("tgl_byr", $tgl_byr);
        $this->db->where('id', $id_inv);
        $this->db->update('m_invoice');

        echo json_encode(array('msg' => true));
    }

    function confirm_cek_po(){
        $id_pl = $_POST['id'];

        // ambil po
        $q_pl_no_po = $this->m_master->get_plpl($id_pl)->row();

        // cek po master
        $pl_no_po_master = $this->m_master->cek_po_master($q_pl_no_po->kepada,$q_pl_no_po->no_po)->num_rows();

        if($pl_no_po_master == 0){
            // jika tidak ada po master
            echo json_encode(array('msg' => false,'g' => 'Master PO Tidak Ada!!'));
        }else if($pl_no_po_master <> 0){
            // update cek po PL
            $this->db->set("cek_po",1);
            $this->db->where('id', $id_pl);
            $this->db->update('m_pl_price_list');

            echo json_encode(array('msg' => true));
        }

    }

    function hapus(){
        $jenis   = $_POST['jenis'];
        $id      = $_POST['id'];
        
        if ($jenis == "Perusahaan") {
            $return = $this->m_master->delete("m_perusahaan","id",$id);
            echo "1";
        }else if ($jenis == "Hapus_price_list") {
            $return = $this->m_master->delete("m_price_list","id",$id);
            echo "1";
        }else if ($jenis == "hapus_barang") {
            $kode = $_POST['kode'];
            if($kode == true){
                $this->m_master->delete("m_barang","id",$id);
            }else{
                $this->m_master->delete("m_barang_plus","id_m_barang",$id);

                // reset 0 id barang plus
                $this->db->set("id_m_barang_plus", 0);
                $this->db->where('id', $id);
                $this->db->update('m_barang');
            }
            echo "1";
        }else if ($jenis == "hapus_supplier") {
            $return = $this->m_master->delete("m_supplier","id",$id);
            echo "1";
        }else if ($jenis == "hapus_admin") {
            $this->m_master->delete("user","id",$id);
            echo "1";
        }else if ($jenis == "hapus_nota") {
            $return = $this->m_master->delete("m_nota","id",$id);
            echo "1";
        }else if ($jenis == "PoMaster") {
            $return = $this->m_master->delete("po_master","id",$id);
            echo "1";
        }else if ($jenis == "plpl") {
            $detail = $this->m_master->get_data_plpl("m_pl_list_barang", "id_pl", $id)->result();

            // update stok barang
            foreach($detail as $r){
                $stok = $r->qty + $r->i_qty;

                $this->db->set("qty", $stok);
                $this->db->where('id', $r->id_m_brng);
                $this->db->update('m_barang');
            }

            // delete packing list dan list barangnya
            $this->m_master->delete("m_pl_price_list","id",$id);
            $this->m_master->delete("m_pl_list_barang","id_pl",$id);

            echo "1";
        }else if($jenis == "hapusPListBrng"){
            $data = $this->m_master->get_data_plpl("m_pl_list_barang", "id", $id)->row();
            
            // update stok barang
            $stok = $data->qty + $data->i_qty;
            $this->db->set("qty", $stok);
            $this->db->where('id', $data->id_m_brng);
            $this->db->update('m_barang');

            // delete list barang
            $this->m_master->delete("m_pl_list_barang","id",$id);

            echo "1";
        }else if ($jenis == "hapus_inv") {
            // $data =  $this->m_master->get_data_one("m_invoice", "id", $id)->row();
            // $data_pl =  $this->m_master->get_data_one("m_pl_price_list", "id", $data->id_pl)->row();
            // $detail = $this->m_master->get_data_one("m_pl_list_barang", "id_pl", $data_pl->id)->row();

            $no_inv = $_POST['no_inv'];
            $data =  $this->m_master->get_data_one("m_invoice", "id", $id)->row();

            if($no_inv != "0"){
                $data_pl =  $this->m_master->get_data_one("m_pl_price_list", "no_inv", $data->no_inv)->row();
                $detail = $this->m_master->getDataInv($no_inv)->result();
                $wid = 'no_inv';
                $www = $no_inv;
            }else{
                $data_pl =  $this->m_master->get_data_one("m_pl_price_list", "id", $data->id_pl)->row();
                $detail = $this->m_master->get_data_plpl("m_pl_list_barang", "id_pl", $data_pl->id)->result();
                $wid = 'id';
                $www = $data_pl->id;
            }

            // ubah data inv jadi 0
            // $data_pl_u =  $this->m_master->get_data_one("m_pl_price_list", "id", $data->id_pl)->result();
            // foreach($data_pl as $u_pl){
            // $data = array(
            //     'data_inv' => 0,
            //     'cek_inv' => 0
            // );
            $this->db->set("data_inv", "0");
            $this->db->set("cek_inv", "0");
            $this->db->where($wid, $www);
            $this->db->update('m_pl_price_list');
            // }

            // update harga list barang jadi 0
            // $detail_u = $this->m_master->get_data_one("m_pl_list_barang", "id_pl", $data_pl->id)->result();
            foreach($detail as $u_l_b){
                $this->db->set("harga_invoice", "0");
                $this->db->where('id_pl', $u_l_b->id_pl);
                $this->db->update('m_pl_list_barang');
            }
            
            // delete invoice
            $this->m_master->delete("m_invoice","id",$id);

            echo "1";
        }
         
    }

    

    function get_edit(){
        $id = $_POST['id'];
        $jenis = $_POST['jenis'];

        if ($jenis == "Perusahaan") {
            $data =  $this->m_master->get_data_one("m_perusahaan", "id", $id)->row();
            echo json_encode($data);
        }else if ($jenis == "edit_price_list") {
            $data =  $this->m_master->get_data_ijpl("m_price_list", "id", $id)->row();
            echo json_encode($data);
        }else if ($jenis == "editKdBarang") { //
            $data =  $this->m_master->get_data_one("m_barang", "id", $id)->row();
            echo json_encode($data);
        }else if ($jenis == "edit_barang") { //
            $data =  $this->m_master->get_data_ijb("m_barang", "id", $id)->row();
            echo json_encode($data);
        }else if ($jenis == "edit_supplier") {
            $data =  $this->m_master->get_data_one("m_supplier", "id", $id)->row();
            echo json_encode($data);
        }else if ($jenis == "edit_admin") {
            $data =  $this->m_master->get_data_one("user", "id", $id)->row();
            echo json_encode($data);
        }else if ($jenis == "edit_nota") {
            $data =  $this->m_master->get_data_ij("m_nota", "id", $id)->row();
            echo json_encode($data);
        }else if ($jenis == "cari_barang") {
            $cek = $this->m_master->get_data_one("m_barang", "id", $id)->num_rows();
            $data = $this->m_master->get_data_one("m_barang", "id", $id)->row();
            $mbp = $this->m_master->get_data_one("m_barang_plus", "id", $data->id_m_barang_plus)->num_rows();

            if ($cek == 0) {
                echo json_encode(array('data' => 'error'));
            }else if($mbp == 0){
                echo json_encode(array('data' => 'kosong',$data));
            }else{
                echo json_encode($data);
            }
        }else if ($jenis == "PoMaster") {
            $data =  $this->m_master->get_data_one("po_master", "id", $id)->row();
            echo json_encode($data);
        }else if ($jenis == "list_barang_tempo") {
            $data =  $this->m_master->get_data_pjt($id)->result();
            echo json_encode($data);
        }else if ($jenis == "list_barang_plus") {
            $data =  $this->m_master->get_data_bp("m_barang_plus", "id_m_barang", $id)->result();
            echo json_encode(array('header' => $data));
        }else if ($jenis == "PL_pl_pl") {
            $data =  $this->m_master->get_data_one("m_pl_price_list", "id", $id)->row();

            $data_pt =  $this->m_master->get_data_one("m_perusahaan", "id", $data->id_m_perusahaan)->row();

            $detail = $this->m_master->get_data_plpl("m_pl_list_barang", "id_pl", $data->id)->result();

            echo json_encode(array(
                'header' => $data,
                'pt' => $data_pt,
                'detail' => $detail));
        }else if ($jenis == "view_inv") {
            $no_inv = $_POST['no_inv'];
            $data =  $this->m_master->get_data_one("m_invoice", "id", $id)->row();

            if($no_inv != "0"){
                $data_pl =  $this->m_master->get_data_one("m_pl_price_list", "no_inv", $data->no_inv)->row();
                $detail = $this->m_master->getDataInv($no_inv)->result();
            }else{
                $data_pl =  $this->m_master->get_data_one("m_pl_price_list", "id", $data->id_pl)->row();
                $detail = $this->m_master->get_data_plpl("m_pl_list_barang", "id_pl", $data_pl->id)->result();
            }

            $data_pt =  $this->m_master->get_data_one("m_perusahaan", "id", $data_pl->id_m_perusahaan)->row();

            // $detail = $this->m_master->get_data_plpl("m_pl_list_barang", "id_pl", $data_pl->id)->result();

            echo json_encode(array(
                'header' => $data,
                'pl' => $data_pl,
                'pt' => $data_pt,
                'detail' => $detail
            ));
        }
        
    }

    function cariKdBarang() {
        $status = $this->input->post('status');
        $ckb = $this->input->post('ckb');
        $kd_lama = $this->input->post('kode_barang_lama');
        $cek =  $this->m_master->get_data_one("m_barang", "kode_barang", $ckb)->num_rows();

        if($status == 'insert'){
            if ($cek == 0) {
                echo json_encode(array('data' => 'oke'));
            }else{
                echo json_encode(array('data' => 'error'));
            }
        }else if($status == 'update'){
            // echo json_encode(array('data' => 'kosong'));
            if($ckb == $kd_lama){
                echo json_encode(array('data' => 'oke'));
            }if($cek == 0 && $ckb <> $kd_lama){
                echo json_encode(array('data' => 'oke'));
            }else if ($cek == 0) {
                echo json_encode(array('data' => 'oke'));
            }else{
                echo json_encode(array('data' => 'error'));
            }
        }
    }

}

