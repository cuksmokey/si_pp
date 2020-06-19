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
        $this->load->view('home');
        $this->load->view('footer');
    }


    public function Timbangan()
    {
        $this->load->view('header');
        $this->load->view('Master/v_timbangan');
        $this->load->view('footer');
    }

    public function Perusahaan()
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

    public function PL_Price_List() {
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

   
    function Insert(){

            $jenis      = $_POST['jenis'];

            if ($jenis == "Timbangan") {
                $id      = $this->input->post('id');
                $cek = $this->m_master->get_data_one("m_timbangan","roll",$id)->num_rows();
                // $cek = $this->m_master->get_data_one("admin", "username", $username)->num_rows();
                if ($cek > 0 ) {
                    echo json_encode(array('data' =>  FALSE));
                }else{
                    $result     = $this->m_master->insert_timbangan();    
                    echo json_encode(array('data' =>  TRUE));
                }
            }else if ($jenis == "Perusahaan") {
                $id      = $this->input->post('id');
                $cek = $this->m_master->get_data_one("m_perusahaan","nm_perusahaan",$id)->num_rows();
                if ($cek > 0 ) {
                    echo json_encode(array('data' =>  FALSE));
                }else{
                    $result = $this->m_master->insert_perusahaan();    
                    echo json_encode(array('data' =>  TRUE));
                }
            }else if ($jenis == "Simpan_Price_List") {
                $id  = $this->input->post('kode_barang');
                $cek = $this->m_master->get_data_one("m_price_list","kode_barang",$id)->num_rows();
                if ($cek > 0 ) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'Kode Barang Sudah Dipakai'));
                }else{
                    $result = $this->m_master->insert_price_list();    
                    echo json_encode(array('data' =>  TRUE));
                }
            }else if ($jenis == "Simpan_Barang") {
                $id      = $this->input->post('kode_barang');
                $cek = $this->m_master->get_data_one("m_barang","kode_barang",$id)->num_rows();
                if ($cek > 0 ) {
                    echo json_encode(array('data' =>  FALSE));
                }else{
                    $result     = $this->m_master->insert_load_barang();    
                    echo json_encode(array('data' =>  TRUE));
                }
            }else if ($jenis == "PoMaster") {
                $id_perusahaan = $this->input->post('id_perusahaan');
                $g_label       = $this->input->post('g_label');
                $width         = $this->input->post('width');
                $no_po         = $this->input->post('no_po');

                $cek = $this->m_master->get_data_po_master("po_master","id_perusahaan",$id_perusahaan,"g_label",$g_label,"width",$width,"no_po",$no_po)->num_rows();
                if ($cek > 0 ) {
                    echo json_encode(array('data' =>  FALSE));
                }else{
                    $result     = $this->m_master->insert_po_master();    
                    echo json_encode(array('data' =>  TRUE));
                }
            }elseif ($jenis == "PL") {
                $no_surat      = $this->input->post('no_surat');
                $no_so      = $this->input->post('no_so');

                $cek = $this->m_master->get_data_one("pl","no_surat",$no_surat)->num_rows();

                $cek2 = $this->m_master->get_data_one("pl","no_so",$no_so)->num_rows();
                // $cek = $this->m_master->get_data_one("admin", "username", $username)->num_rows();
                if ($cek > 0 ) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'No Surat Jalan Sudah Ada'));
                }else if ($cek2 > 0 ) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'No SO Sudah Ada'));
                }else{
                    $result     = $this->m_master->insert_pl();    
                    echo json_encode(array('data' =>  TRUE));
                }
            }elseif ($jenis == "PL_pl_barang") {
                $no_surat = $this->input->post('no_surat');

                $cek = $this->m_master->get_data_one("m_pl_price_list","no_surat",$no_surat)->num_rows();

                if ($cek > 0 ) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'No Surat Jalan Sudah Ada!'));
                }else{
                    $result = $this->m_master->insert_pl_pl_b();    
                    echo json_encode(array('data' =>  TRUE));
                }
            }elseif ($jenis == "Invoice") {
                $id      = $this->input->post('id');

                $cek = $this->m_master->get_data_one("th_invoice","no_invoice",$id)->num_rows();
                // $cek = $this->m_master->get_data_one("admin", "username", $username)->num_rows();
                if ($cek > 0 ) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'No Invoice Sudah Ada'));
                }else{
                    $result     = $this->m_master->insert_invoice();    
                    echo json_encode(array('data' =>  TRUE));
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

    function load_data(){
         $jenis = $this->input->post('jenis');
         $edit_cart = $this->input->post('edit_cart');

            if ($jenis == "Timbangan") {
                $query = $this->m_master->get_timbangan()->result();
                $i=1;
                foreach ($query as $r) {
                    $id = "'$r->id'";

                    $print = base_url("Master/print_timbangan?id=").$r->roll;
                    $print2 = base_url("Master/print_timbangan2?id=").$r->roll;

                    $row = array();
                    $row[] = $r->roll;
                    $row[] = $r->tgl;
                    $row[] = $r->nm_ker;
                    $row[] = $r->g_label;
                    $row[] = $r->g_ac;
                    $row[] = $r->width;
                    $row[] = $r->diameter;
                    $row[] = $r->weight;
                    $row[] = $r->joint;
                    $row[] = $r->ket;
                    // $row[] = $r->ctk;

                    $aksi ="";
                    if ($this->session->userdata('level') == "SuperAdmin") {
                      //   $aksi = '   
                        
                      //   <button type="button" onclick="tampil_edit('.$id.')" class="btn bg-orange btn-circle waves-effect waves-circle waves-float">
                      //       <i class="material-icons">edit</i>
                      //   </button>
                      // <button type="button" onclick="deleteData('.$id.','."".')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                      //       <i class="material-icons">delete</i>
                      //   </button>
                      //   <a type="button" href="'.$print.'" target="blank" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                      //       <i class="material-icons">print</i>
                      //   </a>
                        // <a type="button" href="'.$print2.'" target="blank" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                        //     <i class="material-icons">print</i>
                        // </a>';

                        $aksi = '   
                        
                        <button type="button" onclick="tampil_edit('.$id.')" class="btn bg-orange btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">edit</i>
                        </button>
                      <button type="button" onclick="deleteData('.$id.','."".')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">delete</i>
                        </button>';

                        if($r->ctk == 1){
                            $aksi .='';
                        }else if($r->ctk == 0){  
                            $aksi .='
                                    <a type="button" href="'.$print.'" target="blank" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                        <i class="material-icons">print</i>
                                    </a>
                                    <a type="button" href="'.$print2.'" target="blank" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                        <i class="material-icons">print</i>
                                    </a>';
                        }

                        
                    }else{
                        // $aksi ='
                        // <a type="button" href="'.$print.'" target="blank" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                        //     <i class="material-icons">print</i>
                        // </a>
                        // <a type="button" href="'.$print2.'" target="blank" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                        //     <i class="material-icons">print</i>
                        // </a>';

                        if($r->ctk == 1){
                            $aksi .='';
                        }else if($r->ctk == 0){  
                            $aksi .='
                                    <a type="button" href="'.$print.'" target="blank" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                        <i class="material-icons">print</i>
                                    </a>
                                    <a type="button" href="'.$print2.'" target="blank" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                        <i class="material-icons">print</i>
                                    </a>';
                        }
                    }
                       
                        
                    $row[] = $aksi;
                    $data[] = $row;

                    // $i++;
                }

                $output = array(
                                "data" => $data,
                        );
                
            }else if ($jenis == "list_timbangan") {
                $query = $this->m_master->get_timbangan();
                $i=1;

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","","","","","",""];
                }else{

                    foreach ($query->result() as $r) {
                        $id = "$r->id";
                        // $print = base_url("Master/print_timbangan?id=").$r->roll;

                        $row = array();
                        $row[] = $r->roll;
                        $row[] = $r->tgl;
                        $row[] = $r->nm_ker;
                        $row[] = $r->g_label;
                        $row[] = $r->g_ac;
                        $row[] = $r->width;
                        $row[] = $r->diameter;
                        $row[] = $r->weight;
                        $row[] = $r->joint;

                        
                            $aksi = '   
                           
                            <a type="button" onclick="addToCart('."'". $r->roll."'".')" class="btn bg-brown btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">check</i>
                            </a>
                                            ';
                           
                            
                        $row[] = $aksi;
                        $data[] = $row;

                        // $i++;
                    }
                }

                $output = array(
                                "data" => $data,
                        );

            }else if ($jenis == "list_pl_barang") {
                
                if($edit_cart == "update"){
                    $query = $this->m_master->get_pl_barang_edit();
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
                        $row[] = $r->nama_barang;
                        $row[] = "Rp. ".number_format($r->harga_price_list);
                        $row[] = '<div style="text-align:right">'.$r->qty.'</div>';
                        // $row[] = '<input type="text" class="angka form-control" id="i_qty'.$i.'" placeholder="0" autocomplete="off" onkeypress="return hanyaAngka(event)">
                        // <input type="hidden" id="qty'.$i.'" value="'.$r->qty.'">';
                        $row[] = '<input type="text" class="angka form-control" id="i_qty'.$i.'" placeholder="0" autocomplete="off"  onkeypress="return hanyaAngka(event)">
                        <input type="hidden" id="qty'.$i.'" value="'.$r->qty.'">';

                        if($edit_cart == "update"){
                            $aksi = '<a type="button" onclick="edit_plpl('."'".$r->kode_barang."'".','."'".$r->harga_price_list."'".','."'".$r->qty."'".','."'".$r->i_qty_barang."'".','."'".$i."'".')" class="btn bg-brown btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">check</i>
                            </a>';
                        }else{
                            $aksi = '<a type="button" onclick="addToCart('."'".$r->kode_barang."'".','."'".$r->harga_price_list."'".','."'".$r->qty."'".','."'".$i."'".')" class="btn bg-brown btn-circle waves-effect waves-circle waves-float">
                            <i class="material-icons">check</i>
                            </a>';
                        }


                        $row[] = $aksi;
                        $data[] = $row;

                        $i++;
                    }
                }

                $output = array(
                                "data" => $data,
                        );
                
                

            }else if ($jenis == "view_timbang") {
                $id = $_POST['id'];
                $query = $this->m_master->get_view_timbangan($id);

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","","","","",""];
                }else{
                    $i=1;
                    foreach ($query->result() as $r) {
                        $id = "$r->id";
                        // $print = base_url("Master/print_timbangan?id=").$r->roll;

                        $row = array();
                        $row[] = $r->roll;
                        $row[] = $r->tgl;
                        $row[] = $r->nm_ker;
                        $row[] = $r->g_label;
                        $row[] = $r->g_ac;
                        $row[] = $r->width;
                        $row[] = $r->diameter;
                        $row[] = $r->weight;
                        $row[] = $r->joint;

                    
                        $data[] = $row;

                        // $i++;
                    }
                }

                $output = array(
                                "data" => $data,
                        );

            }else if ($jenis == "PL") {
                $i=1;
                $query = $this->m_master->get_PL();
                
                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","","","",""];
                }else{

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";
                        $print = base_url("Master/print_pl?id=").$r->id;

                        $row = array();
                        $row[] = $r->id;
                        $row[] = $r->tgl;
                        $row[] = $r->no_surat;
                        $row[] = $r->no_so;
                        $row[] = $r->no_pkb;
                        $row[] = $r->nm_perusahaan;
                        // $row[] = $r->no_telp;
                        $row[] = 
                        '<a type="button" onclick=view_timbang('.$r->id.') class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                                '.$r->jml_timbang.'
                            </a>' ;

                        $aksi ="";

// print tunggal di pl
// <a type="button" href="'.$print.'" target="blank" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
//     <i class="material-icons">print</i>
// </a>

                        $superbtn = '<button type="button" onclick="view_detail('.$id.')" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">remove_red_eye</i>
                            </button> 
                            <button type="button" onclick="tampil_edit('.$id.')" class="btn bg-orange btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">edit</i>
                            </button>
                          <button type="button" onclick="deleteData('.$id.','."".')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">delete</i>
                            </button>';
                            
                        $superbtn2 = '<button type="button" onclick="view_detail('.$id.')" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">remove_red_eye</i>
                            </button>';


                            // CEK PO PL SATU UKURAN FIX
                            $uk_fix = $this->m_master->get_cek_po_pl($r->id,$r->no_pkb);

                        if ($this->session->userdata('level') == "SuperAdmin" && $r->cek_po == 0 && $uk_fix == 1) {
                            $aksi = ''.$superbtn.'
                            <a type="button" onclick="confirmCekPo('.$id.','."".')" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">check</i>
                            </a>';
                        }else if ($this->session->userdata('level') == "SuperAdmin" && $r->cek_po == 0 && $uk_fix <> 1) {
                            $aksi = ''.$superbtn.'
                            <a type="button" onclick="zonk" class="btn bg-black btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">check</i>
                            </a>';
                        }else if ($this->session->userdata('level') == "SuperAdmin" && $r->cek_po == 1) {
                            $aksi = ''.$superbtn2.'
                            <a type="button" onclick="vvvv" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">check</i>
                            </a>';
                        }else{
                            // <a type="button" href="'.$print.'" target="blank" class="btn btn-default btn-circle waves-effect waves-circle waves-float">
                            //     <i class="material-icons">print</i>
                            // </a>

                            $aksi = '
                            <button type="button" onclick="view_detail('.$id.')" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">remove_red_eye</i>
                            </button>';
                        }
                            
                            
                        $row[] = $aksi;
                        $data[] = $row;

                        // $i++;
                    }
                }

                $output = array("data" => $data);
                

            }else if ($jenis == "PL_price_list") {
                $i=1;
                $query = $this->m_master->get_PL_price_list();
                
                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","","",""];
                }else{

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";

                        $row = array();
                        $row[] = $i;
                        $row[] = $r->tgl;
                        $row[] = $r->no_surat;
                        $row[] = $r->no_so;
                        $row[] = $r->no_po;
                        $row[] = '
                        <a type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float">'.$r->jml_timbang.'</a>' ;

                        $aksi ="";

                        $superbtn = '<button type="button" onclick="view_detail('.$id.')" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">remove_red_eye</i>
                            </button> 
                        <button type="button" onclick="deleteData('.$id.','."".')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">delete</i>
                            </button>';
                            
                        $superbtn2 = '<button type="button" onclick="view_detail('.$id.')" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">remove_red_eye</i>
                            </button>';

                        if ($this->session->userdata('level') == "SuperAdmin") {
                            $aksi = ''.$superbtn.'
                            <a type="button" onclick="confirmCekPo('.$id.','."".')" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">check</i>
                            </a>';
                        }else{
                            $aksi = ''.$superbtn.'';
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
                    $data[] =  ["","","","","",""];
                }else{
                    $i=1;

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";

                        $row = array();
                        $row[] = $r->id;
                        $row[] = $r->pimpinan;
                        $row[] = $r->nm_perusahaan;
                        $row[] = $r->alamat;
                        $row[] = $r->npwp;
                        $row[] = $r->no_telp;

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
                            
                        // $i++;
                    }
                }
                $output = array("data" => $data);
            }else if ($jenis == "load_price_list") {

                $query = $this->m_master->get_load_price_list();

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","","","","",""];
                }else{
                    $i=1;

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";
                        $row = array();
                        $row[] = $i;
                        $row[] = $r->tgl;
                        $row[] = $r->kode_barang;
                        $row[] = $r->nama_barang;
                        $row[] = $r->merek;
                        $row[] = $r->spesifikasi;
                        $row[] = $r->supplier;
                        $row[] = "Rp. ".number_format($r->harga_price_list);

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
            }else if ($jenis == "Load_Barang") {

                $query = $this->m_master->get_load_barang();

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","","","","","","",""];
                }else{
                    $i=1;

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";
                        $row = array();
                        $row[] = $i;
                        $row[] = $r->tgl;
                        $row[] = $r->kode_barang;
                        $row[] = $r->nama_barang;
                        $row[] = $r->merek;
                        $row[] = $r->spesifikasi;
                        $row[] = $r->supplier;
                        $row[] = number_format($r->qty)." ".$r->qty_ket;
                        $row[] = "Rp. ".number_format($r->harga);
                        $row[] = $r->no_nota;
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
            }else if ($jenis == "PoMaster") {

                $query = $this->m_master->get_po_master();

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","","","",""];
                }else{
                    $i=1;

                    foreach ($query->result() as $r) {
                        $id = "'$r->id'";

                        $row = array();
                        $row[] = $r->id_perusahaan;
                        $row[] = $r->nm_perusahaan;
                        $row[] = $r->tgl;
                        $row[] = $r->no_po;
                        $row[] = $r->g_label;
                        $row[] = $r->width;
                        $row[] = $r->tonase;

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
                            
                        // $i++;
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


            }else if ($jenis == "Home") {

                $query = $this->m_master->get_jatuh_tempo();

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","","",""];
                }else{

                    $i=1;

                    foreach ($query->result() as $r) {
                        $row = array();
                        $row[] = $i;
                        $row[] = $r->no_invoice;
                        $row[] = $r->no_surat;
                        $row[] = $r->no_po;
                        $row[] = $r->nm_perusahaan;
                        $row[] = number_format($r->total);
                        // $row[] = $r->jto;

                        $date_now = date('Y-m-d');

                        if($date_now == $r->jto){
                            $row[] = '<div style="color:#ff8c00;font-weight:bold">'.$r->jto.'</div>';
                        }else if($date_now <= $r->jto){
                            $row[] = '<div style="color:#0a0;font-weight:bold">'.$r->jto.'</div>';
                        }else if($date_now >= $r->jto){
                            $row[] = '<div style="color:#f00;font-weight:bold">'.$r->jto.'</div>';
                        }

                        

                        
                        $data[] = $row;
                            
                        $i++;
                    }
                }

                $output = array("data" => $data);


            }else if ($jenis == "list_barang") {

                $query = $this->m_master->get_barang();

                if ($query->num_rows() == 0) {
                    $data[] =  ["","","","","","",""];
                }else{

                    $i=1;
                    foreach ($query->result() as $r) {
                        // $id = "$r->lb";
                        // $print = base_url("Master/print_timbangan?id=").$r->roll;

                        $row = array();
                        $row[] = $r->g_label;
                        $row[] = $r->lb;
                        $row[] = $r->roll;
                        $row[] = "KG";
                        $row[] = '<input type="text" class="form-control" id="jumlah'.$i.'" value="'.$r->weight.'" disabled > ';
                        $row[] = '<input type="text" class="angka form-control" id="harga'.$i.'" > ';

                        
                            $aksi = '   
                           
                            <a type="button" onclick="addToCart('."'". $r->lb."'".','."'". $r->g_label."'".','."'". $r->roll."'".','."'". $i."'".')" class="btn bg-brown btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">check</i>
                            </a>
                                            ';
                           
                            
                        $row[] = $aksi;
                        $data[] = $row;

                        $i++;
                    }
                }

                $output = array(
                                "data" => $data,
                        );


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

    function load_m_barang_pl(){
        $searchTerm = $_GET['search'];
  
        // Get users
        $response = $this->m_master->list_m_barang_pl($searchTerm);
  
        echo json_encode($response);
  
      }
    
    function update(){
            $jenis      = $_POST['jenis'];
            
            if ($jenis == "Timbangan") {
                $result= $this->m_master->update_timbangan();
                echo json_encode(array('data' =>  TRUE));
            }else if ($jenis == "Perusahaan") {
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
                $id      = $this->input->post('kode_barang');
                $id_lama = $this->input->post('kode_barang_lama');
                $cek = $this->m_master->get_data_one("m_price_list","kode_barang",$id)->num_rows();

                if ($id <> $id_lama) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'Kode Barang Lain'));
                }else{
                    $result= $this->m_master->update_price_list();
                    echo json_encode(array('data' =>  TRUE));
                }
            }else if ($jenis == "Simpan_Barang") {
                $result= $this->m_master->update_load_barang();
                echo json_encode(array('data' =>  TRUE));
            }else if ($jenis == "PoMaster") {
                $result= $this->m_master->update_master_po();
                echo json_encode(array('data' =>  TRUE));
            }else if ($jenis == "PL") {
                $no_surat      = $this->input->post('no_surat');
                $no_so      = $this->input->post('no_so');
                $no_surat_lama      = $this->input->post('no_surat_lama');
                $no_so_lama      = $this->input->post('no_so_lama');

                $cek = $this->m_master->get_data_one("pl","no_surat",$no_surat)->num_rows();

                $cek2 = $this->m_master->get_data_one("pl","no_so",$no_so)->num_rows();
                // $cek = $this->m_master->get_data_one("admin", "username", $username)->num_rows();
                if ($no_surat != $no_surat_lama && $cek > 0 ) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'No Surat Jalan Sudah Ada'));
                }else if ($no_so != $no_so_lama && $cek2 > 0 ) {
                    echo json_encode(array('data' =>  FALSE,'msg' => 'No SO Sudah Ada'));
                }else{
                    $result= $this->m_master->update_pl();
                    echo json_encode(array('data' =>  TRUE));
                }
            }else if ($jenis == "PL_pl_barang") {
                    $result= $this->m_master->update_pl_edit();
                    echo json_encode(array('data' =>  TRUE));
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

    function destroy_cart_barang(){
        $this->cart->destroy();
        echo $this->show_cart_barang();
    }

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

    function show_cart_plpl(){
        $output = '';
        $no = 0;

        foreach ($this->cart->contents() as $items) {
            $no++;
            $sisa_stok = $items['options']['stok'] - $items['qty'];

            $output .='
                <tr>
                    <td>'.$no.'</td>
                    <td>'.$items['options']['kode_barang'].'</td>
                    <td>Rp. '.number_format($items['price']).'</td>
                    <td>'.number_format($sisa_stok).'</td>
                    <td>'.$items['qty'].'</td>
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

    function show_cart_barang(){ //Fungsi untuk menampilkan Cart

        $output = '';
        $no = 0;


        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .='
                <tr>
                    <td>'.$no.'</td>
                    <td>'.str_replace("_", "/", $items['options']['gsm']).'</td>
                    <td>'.str_replace("_", "/", $items['name']).'</td>
                    <td>'.str_replace("_", "/", $items['options']['roll']).'</td>
                    <td>KG</td>
                    <td>'.$items['qty'].'</td>
                    <td>'.$items['price'].'</td>
                    <td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                </tr>
            ';
        }
        

        return $output;
    }

    function add_to_cart(){ //fungsi Add To Cart
        
        $data = array(
            'id' => str_replace("/", "_", $_POST['roll']), 
            'name' => str_replace("/", "_", $_POST['roll']),
            'price' => 0, 
            'qty' => 1
        );
        $this->cart->insert($data);
        echo $this->show_cart(); //tampilkan cart setelah added
    }

    function add_to_cart_pl_barang(){

        $data = array(
            'id' => str_replace("/", "_", $_POST['kode_barang']), 
            'name' => str_replace("/", "_", $_POST['kode_barang']),
            'price' => $_POST['harga_price_list'], 
            'qty' => $_POST['i_qty'],
            'options' => array(
                'kode_barang' => $_POST['kode_barang'],
                'stok' => $_POST['qty']
            )
        );
        $this->cart->insert($data);
        echo $this->show_cart_plpl(); //tampilkan cart setelah added
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

    function add_to_cart_barang(){ //fungsi Add To Cart baran
    
        $data = array(
            'id' => str_replace(" ", "_", $_POST['lb']), 
            'name' => str_replace("/", "_", $_POST['lb']),
            'price' => $_POST['harga'], 
            'qty' => $_POST['jumlah'],
            'options' => array('roll' => str_replace("/", "_", $_POST['roll']), 
                               'satuan' => 'KG',
                                'gsm' => $_POST['gsm'])
        );
        $this->cart->insert($data);
        echo $this->show_cart_barang(); //tampilkan cart setelah added
    }

    function hapus_cart(){ //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }

    function hapus_cart_plpl(){ //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->show_cart_plpl();
    }

    function hapus_cart_barang(){
         //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);

        $edit_cart = $this->input->post('edit_cart');
        if($edit_cart == "update"){
            echo $this->show_edit_cart_pl();
        }else{
            echo $this->show_cart_barang();
        }
        
    }

    function reject(){
        $result = $this->m_master->reject();
        echo "1";
    }

    function confirm(){
        $result = $this->m_master->confirm();
        echo "1";
    }

    function confirm_cek_po(){
        $id_pl = $_POST['id'];

        // ambil po
        $q_pl_no_po = $this->m_master->get_plpl($id_pl)->row();

        // cek po master
        $pl_no_po_master = $this->m_master->cek_po_master($q_pl_no_po->g_label,$q_pl_no_po->width,$q_pl_no_po->no_po)->num_rows();

        if($pl_no_po_master == 0){
            // jika tidak ada po master
            echo json_encode(array('msg' => false,'g' => 'Master PO Tidak Ada!!'));
        }else if($pl_no_po_master <> 0){
            // insert po history
            $data = array(
                    'id_perusahaan' => $q_pl_no_po->id_perusahaan,
                    'tgl'           => $q_pl_no_po->tgl,
                    'g_label'       => $q_pl_no_po->g_label,
                    'width'         => $q_pl_no_po->width,
                    'jml_roll'      => $q_pl_no_po->jml_roll,
                    'tonase'        => $q_pl_no_po->tonase,
                    'no_surat'      => trim($q_pl_no_po->no_surat),
                    'no_po'         => $q_pl_no_po->no_po,
                    'id_pl'         => $q_pl_no_po->id_pl,
                    'no_pkb'        => $q_pl_no_po->no_pkb
                );
            $this->db->insert("po_history",$data);

            // update cek po PL
            $this->db->set("cek_po",1);
            $this->db->where('id', $id_pl);
            $this->db->update('pl');

            // echo json_encode(array('msg' => true,'g' => $pl_no_po_master));
            echo json_encode(array('msg' => true));
        }

    }

    function hapus(){
        $jenis   = $_POST['jenis'];
        $id      = $_POST['id'];
        
        if ($jenis == "Timbangan") {
            $return = $this->m_master->delete("m_timbangan","id",$id);
            echo "1";
        }else if ($jenis == "Perusahaan") {
            $return = $this->m_master->delete("m_perusahaan","id",$id);
            echo "1";
        }else if ($jenis == "Hapus_price_list") {
            $return = $this->m_master->delete("m_price_list","id",$id);
            echo "1";
        }else if ($jenis == "hapus_barang") {
            $return = $this->m_master->delete("m_barang","id",$id);
            echo "1";
        }else if ($jenis == "PoMaster") {
            $return = $this->m_master->delete("po_master","id",$id);
            echo "1";
        }else if ($jenis == "PL") {
            $return = $this->m_master->delete("pl","id",$id);

            $this->db->set("status",0);
            $this->db->set("id_pl","");
            $this->db->where('id_pl', $id);
            $this->db->update('m_timbangan');
            echo "1";
        }else if ($jenis == "plpl") {
            $detail = $this->m_master->get_data_plpl("m_pl_list_barang", "id_pl_price_list", $id)->result();

            // update stok barang
            foreach($detail as $r){
                $stok = $r->qty + $r->i_qty;

                $this->db->set("qty", $stok);
                $this->db->where('kode_barang', $r->kode_barang);
                $this->db->update('m_barang');
            }

            // delete packing list dan list barangnya
            $return = $this->m_master->delete("m_pl_price_list","id",$id);
            $return = $this->m_master->delete("m_pl_list_barang","id",$id);

            echo "1";
        }
         
    }

    

    function get_edit(){
        $id    = $_POST['id'];
        $jenis    = $_POST['jenis'];

        if ($jenis == "Timbangan") {
            $data =  $this->m_master->get_data_one("m_timbangan", "id", $id)->row();
            echo json_encode($data);
        }else if ($jenis == "Perusahaan") {
            $data =  $this->m_master->get_data_one("m_perusahaan", "id", $id)->row();
            echo json_encode($data);
        }else if ($jenis == "edit_price_list") {
            $data =  $this->m_master->get_data_one("m_price_list", "id", $id)->row();
            echo json_encode($data);
        }else if ($jenis == "edit_barang") {
            $data =  $this->m_master->get_data_one("m_barang", "id", $id)->row();
            echo json_encode($data);
        }else if ($jenis == "PoMaster") {
            $data =  $this->m_master->get_data_one("po_master", "id", $id)->row();
            echo json_encode($data);
        }else if ($jenis == "PL") {
            $data =  $this->m_master->get_data_one("pl", "id", $id)->row();
            $detail = $this->m_master->get_data_one("m_timbangan", "id_pl", $data->id)->result();
            echo json_encode(  array('header' => $data, 'detail' => $detail));
        }else if ($jenis == "PL_pl_pl") {
            $data =  $this->m_master->get_data_one("m_pl_price_list", "id", $id)->row();

            $data_pt =  $this->m_master->get_data_one("m_perusahaan", "id", $data->kepada)->row();

            $detail = $this->m_master->get_data_plpl("m_pl_list_barang", "id_pl_price_list", $data->id)->result();

            echo json_encode(array(
                'header' => $data,
                'pt' => $data_pt,
                'detail' => $detail));
        }
        
    }

    function print_timbangan(){
    $id = $_GET['id'];

    $data = $this->db->query("SELECT * FROM m_timbangan WHERE roll = '$id'")->row();
    $data_perusahaan = $this->db->query("SELECT * FROM perusahaan limit 1")->row();
    $query = $this->db->query("UPDATE m_timbangan SET ctk='1' WHERE roll='$id'");

        $html = '';

        $html .= '
        <center> 
            <h1> '.$data_perusahaan->nama.' </h1>  '.$data_perusahaan->daerah.' , Email : '.$data_perusahaan->email.'
        </center>
        <hr>
        
        <br><br><br>
                 <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size:52px">
                    <tr>
                        <td align="left" width="50%"><b>QUALITY</b></td>
                        <td align="center"><b>'.$data->nm_ker.'</b></td>
                    </tr>
                    <tr>
                        <td align="left"><b>GRAMMAGE</b></td>
                        <td align="center"><b>'.$data->g_label.' GSM</b></td>
                    </tr>
                    <tr>
                    <tr>
                        <td align="left"><b>WIDTH</b></td>
                        <td align="center"><b>'.round($data->width,2).' CM</b></td>
                    </tr>
                    <tr>
                    <tr>
                        <td align="left"><b>DIAMETER</b></td>
                        <td align="center"><b>'.$data->diameter.' CM</b></td>
                    </tr>
                    <tr>
                    <tr>
                        <td align="left"><b>WEIGHT</b></td>
                        <td align="center"><b>'.$data->weight.' KG</b></td>
                    </tr>
                    <tr>
                    <tr>
                        <td align="left"><b>JOINT</b></td>
                        <td align="center"><b>'.$data->joint.' </b></td>
                    </tr>
                    <tr>
                    <tr>
                        <td align="left"><b>ROLL NUMBER</b></td>
                        <td align="center"><b>'.$data->roll.' </b></td>
                    </tr>
                    <tr>
                  </table>';


        $this->m_fungsi->_mpdf('',$html,10,10,10,'L');
  }

  function print_timbangan2(){
    $id = $_GET['id'];

    $data = $this->db->query("SELECT * FROM m_timbangan WHERE roll = '$id'")->row();
    $query = $this->db->query("UPDATE m_timbangan SET ctk='1' WHERE roll='$id'");

        $html = '';

        $html .= '<br><br><br><br><br><br>
                 <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size:37px">
                    <tr>
                        <td align="left"><b>QUALITY</b></td>
                        <td align="center"><b>'.$data->nm_ker.'</b></td>
                    </tr>
                    <tr>
                        <td align="left"><b>GRAMMAGE</b></td>
                        <td align="center"><b>'.$data->g_label.' GSM</b></td>
                    </tr>
                    <tr>
                    <tr>
                        <td align="left"><b>WIDTH</b></td>
                        <td align="center"><b>'.$data->width.' CM</b></td>
                    </tr>
                    <tr>
                    <tr>
                        <td align="left"><b>DIAMETER</b></td>
                        <td align="center"><b>'.$data->diameter.' CM</b></td>
                    </tr>
                    <tr>
                    <tr>
                        <td align="left"><b>WEIGHT</b></td>
                        <td align="center"><b>'.$data->weight.' KG</b></td>
                    </tr>
                    <tr>
                    <tr>
                        <td align="left"><b>JOINT</b></td>
                        <td align="center"><b>'.$data->joint.' </b></td>
                    </tr>
                    <tr>
                    <tr>
                        <td align="left"><b>ROLL NUMBER</b></td>
                        <td align="center"><b>'.$data->roll.' </b></td>
                    </tr>
                    <tr>
                  </table>';


        $this->m_fungsi->_mpdf('',$html,10,10,10,'P');
  }

  function print_pl(){
    $id = $_GET['id'];

    $data_header = $this->db->query("SELECT * FROM pl WHERE id = '$id'")->row();
    $data_detail = $this->db->query("SELECT * FROM m_timbangan WHERE id_pl = '$id' ORDER BY roll");

        $html = '';

        $html .= '
                 <table width="100%" border="0" cellspacing="0" cellpadding="2" style="font-size:10px;">
                    <tr>
                        <td align="center" colspan="7"><b><u>PACKING LIST</u></b> <br> &nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left" width="8%">Tanggal</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="10%">'.$this->m_fungsi->tanggal_format_indonesia($data_header->tgl).'</td>
                        <td align="center" width="10%"></td>
                        <td align="left" width="8%">Kepada</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="20%">'.$data_header->nm_perusahaan.'</td>
                    </tr>
                    <tr>
                        <td align="left" width="8%">No Surat Jalan</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="10%">'.$data_header->no_surat.'</td>
                        <td align="center" width="10%"></td>
                        <td align="left" width="8%">Alamat</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="20%">'.$data_header->alamat_perusahaan.'</td>
                    </tr>
                    <tr>
                        <td align="left" width="8%">No SO</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="10%">'.$data_header->no_so.'</td>
                        <td align="center" width="10%"></td>
                        <td align="left" width="8%">ATTN</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="20%">'.$data_header->nama.'</td>
                    </tr>
                    <tr>
                        <td align="left" width="8%">No PKB</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="10%">'.$data_header->no_pkb.'</td>
                        <td align="center" width="10%"></td>
                        <td align="left" width="8%">No Telp / No HP</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="20%">'.$data_header->no_telp.'</td>
                    </tr>
                    <tr>
                        <td align="left" width="8%">No Kendaraan</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="10%">'.$data_header->no_kendaraan.'</td>
                        <td align="center" width="10%"></td>
                        <td align="left" width="8%">No PO</td>
                        <td align="" width="1%">:</td>
                        <td align="left" width="20%">'.$data_header->no_po.'</td>
                    </tr>
                    
                    <tr>
                  </table>
                  <br>
                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size:11px;" >
                    <tr>
                        <td width="" align="center">No</td>
                        <td width="" align="center" colspan="2">Nomer Roll</td>
                        <td width="17%" align="center">Gramage (GSM)</td>
                        <td width="" align="center">Lebar (CM)</td>
                        <td width="" align="center">Berat (KG)</td>
                        <td width="" align="center">JOINT</td>
                        <td width="" align="center">KETERANGAN</td>
                    </tr>';
                    $no = 1;
                    $tot_weigth = 0;
                    foreach ($data_detail->result() as $r ) {
                        $html .= '<tr>
                                    <td width="" align="center">'.$no.'</td>
                                    <td width="" align="center">'.substr($r->roll,0, 5).'</td>
                                    <td width="" align="center">'.substr($r->roll,6, 15).'</td>
                                    <td width="" align="center">'.$r->g_label.'</td>
                                    <td width="" align="center">'.round($r->width,2).'</td>
                                    <td width="" align="center">'.$r->weight.'</td>
                                    <td width="" align="center">'.$r->joint.'</td>
                                    <td width="" align="center"></td>
                                </tr>';
                     $no++;
                     $tot_weigth += $r->weight;
                    }

                    $tmpl = strlen($data_detail->row('width'));
// <td width="" colspan="4" align="center"><b>'.($no-1).' ROLL (@ LB '.number_format( $data_detail->row('width')).' )</b></td>
                    $html .='
                    <tr>
                        <td width="" colspan="4" align="center"><b>'.($no-1).' ROLL (@ LB '.round( $data_detail->row('width'),2).' )</b></td>
                        <td width=""  align="center"><b>Total</b></td>
                        <td width=""  align="center"><b>'.number_format($tot_weigth).'</b></td>
                        <td width=""  align="center"><b></b></td>
                        <td width=""  align="center"><b></b></td>
                    </tr>
                </table>
                  ';


        $this->m_fungsi->_mpdf('',$html,10,10,10,'P');
  }

  function print_pl_cb(){
    $id = $_GET['id'];

    // $data_header = $this->db->query("SELECT * FROM pl WHERE id = '$id'")->row();
    $data_detail = $this->db->query("SELECT * FROM m_timbangan WHERE id_pl = '$id' ORDER BY roll");

    $width_pl = $this->db->query("SELECT DISTINCT width FROM m_timbangan WHERE id_pl = '$id'")->row();

        $html = '<table cellspacing="0" cellpadding="0" style="font-size:14px;width:100%;font-weight:bold;text-align:center;border-collapse:collapse" >
            <tr>
                <tr>
                    <td style="border:0">DATA ROLL WP '.round($width_pl->width).'</td>
                </tr>
            </tr>
        </table>';

        $html .= '<table cellspacing="0" cellpadding="5" style="font-size:11px;width:100%;text-align:center;border-collapse:collapse" >
                    <tr>
                        <th style="padding:5px 0;width:6%"></th>
                        <th style="padding:5px 0;width:10%"></th>
                        <th style="padding:5px 0;width:10%"></th>
                        <th style="padding:5px 0;width:15%"></th>
                        <th style="padding:5px 0;width:10%"></th>
                        <th style="padding:5px 0;width:10%"></th>
                        <th style="padding:5px 0;width:10%"></th>
                        <th style="padding:5px 0;width:6%"></th>
                        <th style="padding:5px 0;width:29%"></th>
                    </tr>';

        $html .= '<tr>
                <td style="border:1px solid #000">No</td>
                <td style="border:1px solid #000" colspan="2">Nomer Roll</td>
                <td style="border:1px solid #000">Gramage (GSM)</td>
                <td style="border:1px solid #000">Lebar (CM)</td>
                <td style="border:1px solid #000">Diameter</td>
                <td style="border:1px solid #000">Berat (KG)</td>
                <td style="border:1px solid #000">JOINT</td>
                <td style="border:1px solid #000">KETERANGAN</td>
            </tr>';
                    

            $no = 1;
            $tot_weigth = 0;
            foreach ($data_detail->result() as $r ) {
                $html .= '<tr>
                            <td style="border:1px solid #000">'.$no.'</td>
                            <td style="border:1px solid #000">'.substr($r->roll,0, 5).'</td>
                            <td style="border:1px solid #000">'.substr($r->roll,6, 15).'</td>
                            <td style="border:1px solid #000">'.$r->g_label.'</td>
                            <td style="border:1px solid #000">'.round($r->width).'</td>
                            <td style="border:1px solid #000">'.$r->diameter.'</td>
                            <td style="border:1px solid #000">'.$r->weight.'</td>
                            <td style="border:1px solid #000">'.$r->joint.'</td>
                            <td style="border:1px solid #000">'.$r->ket.'</td>
                        </tr>';
             $no++;
             $tot_weigth += $r->weight;
            }

//                     $tmpl = strlen($data_detail->row('width'));
// // <td width="" colspan="4" align="center"><b>'.($no-1).' ROLL (@ LB '.number_format( $data_detail->row('width')).' )</b></td>
//                     $html .='
//                     <tr>
//                         <td width="" colspan="4" align="center"><b>'.($no-1).' ROLL</b></td>
//                         <td width=""  align="center"><b>Total</b></td>
//                         <td width=""  align="center"><b>'.number_format($tot_weigth).'</b></td>
//                         <td width=""  align="center"><b></b></td>
//                         <td width=""  align="center"><b></b></td>
//                     </tr>
//                 </table>
//                   ';
        $html .= '</table>';


        $this->m_fungsi->_mpdf('',$html,10,10,10,'P');
  }


}

