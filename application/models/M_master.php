<?php
class M_master extends CI_Model{
 	
 	function __construct(){
        parent::__construct();
        
        date_default_timezone_set('Asia/Jakarta');
        $this->db = $this->load->database('default', TRUE);
        
    }

    public function upload($file,$nama,$lokasi){
        // $file = 'foto';
        // unlink('../assets/images/member/'.$nama);
        $config['upload_path'] = './assets/images/'.$lokasi.'/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '20480';
        $config['remove_space'] = TRUE;
        $config['file_name'] = $nama;
    
        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        if($this->upload->do_upload($file)){ // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        }else{
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    function insert_histori($buk,$nmf){
    $tgli = date('Y-m-d');
    $jmi = date('H:i:s');
    $user = $this->session->userdata('username');
    $nm_user = $this->session->userdata('nm_user');

    $data1 = array(
                'buk'      => $buk,
                'usr'      => $user,
                'usn'      => $nm_user,
                'ip'      => $this->get_client_ip(),
                'nmf'      => $nmf,
                'tgi'      => $tgli,
                'jmi'      => $jmi,
            );
      return $this->db->insert("mylog",$data1);
  }
  function get_client_ip() {
      $ipaddress = '';
      if (getenv('HTTP_CLIENT_IP'))
          $ipaddress = getenv('HTTP_CLIENT_IP');
      else if(getenv('HTTP_X_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
      else if(getenv('HTTP_X_FORWARDED'))
          $ipaddress = getenv('HTTP_X_FORWARDED');
      else if(getenv('HTTP_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_FORWARDED_FOR');
      else if(getenv('HTTP_FORWARDED'))
         $ipaddress = getenv('HTTP_FORWARDED');
      else if(getenv('REMOTE_ADDR'))
          $ipaddress = getenv('REMOTE_ADDR');
      else
          $ipaddress = 'UNKNOWN';
      return $ipaddress;
  }
   
    function get_data($table){
        $query = "SELECT * FROM $table";
        return $this->db->query($query);
    }

    function get_data_order($table,$order,$by){
        $query = "SELECT * FROM $table ORDER BY $order $by";
        return $this->db->query($query);
    }

    function get_count($table){
        $query = "SELECT count(*) as jumlah FROM $table";
        return $this->db->query($query);
    }

    function get_data_one($table,$kolom,$id){
        $query = "SELECT * FROM $table WHERE $kolom='$id'";
        return $this->db->query($query);
    }

    function get_data_ij($table,$kolom,$id){
        $query = "SELECT a.id,a.id_supplier,b.nama_supplier,a.no_nota FROM $table a
        INNER JOIN m_supplier b ON a.id_supplier=b.id
        WHERE a.$kolom='$id'";
        return $this->db->query($query);
    }

    function get_data_plpl($m_pl_list_barang,$id_pl_price_list,$id){
        // $query = "SELECT * FROM $m_pl_list_barang WHERE $id_pl_price_list='$id'";
        $query = "SELECT
            b.qty AS qty,
            a.tgl AS tgl,
            a.kode_barang AS kode_barang,
            b.nama_barang AS nama_barang,
            a.harga_price_list AS harga_price_list,
            a.qty AS i_qty,
            b.qty_ket AS qty_ket,
            a.id_pl_price_list AS id_pl_price_list
        FROM $m_pl_list_barang a 
        INNER JOIN m_barang b ON a.kode_barang = b.kode_barang
        WHERE a.$id_pl_price_list='$id'";
        return $this->db->query($query);
    }

    function get_data_po_master($table,$kolom,$id_perusahaan,$kolom2,$kode_barang,$kolom3,$no_po){
        
        $query = "SELECT * FROM $table WHERE $kolom='$id_perusahaan' AND $kolom2='$kode_barang' AND $kolom3='$no_po'";
        return $this->db->query($query);
    }

    function get_plpl($id_pl){
        
        $query = "SELECT*FROM m_pl_price_list
        WHERE id='$id_pl'";
        
        return $this->db->query($query);
    }

    function cek_po_master($id_perusahaan,$no_po){
        
        $query = "SELECT*FROM po_master WHERE id_perusahaan='$id_perusahaan' AND no_po='$no_po'";
        return $this->db->query($query);
    }

    function get_cek_po_pl($id_pl,$no_pkb){
        $query = "SELECT nm_ker AS nm_ker_po,g_label AS g_label_po,width AS width_po FROM m_timbangan a
        INNER JOIN pl b ON a.id_pl = b.id
        WHERE a.id_pl='$id_pl' AND b.no_pkb='$no_pkb'
        GROUP BY nm_ker,g_label,width";
        return $this->db->query($query)->num_rows();
    }

    function query($query1){
        
        $query = $query1;
        return $this->db->query($query);
    }


    function get_data_max($table,$kolom){
        $query = "SELECT IFNULL(LPAD(MAX(RIGHT($kolom,5))+1,5,0),'00001')AS nomor FROM $table";
        return $this->db->query($query);
    }

    function delete($tabel,$kolom,$id){
        
        $query = "DELETE FROM $tabel WHERE $kolom = '$id' ";
        $result =  $this->db->query($query);
        return $result;
    }

    function delete_master_po($table,$kolom,$kolom2,$kolom3,$g_label,$id_perusahaan,$width){
        
        $query = "DELETE FROM $table WHERE $kolom='$id_perusahaan' AND $kolom2='$g_label' AND $kolom3='$width'";
        $result =  $this->db->query($query);
        return $result;
    }

    function get_timbangan(){
        $query = "SELECT * FROM m_timbangan WHERE status = '0' ORDER BY id DESC ";
        return $this->db->query($query);
    }

    function get_pl_barang(){
        $query = "SELECT a.id AS id,a.kode_barang AS kode_barang,a.nama_barang AS nama_barang,a.harga_price_list AS harga_price_list,b.qty AS qty,b.qty_ket AS qty_ket FROM m_price_list a
        INNER JOIN m_barang b ON a.kode_barang = b.kode_barang";
        return $this->db->query($query);
    }

    function get_pl_barang_edit(){
        $query = "SELECT a.id AS id,a.kode_barang AS kode_barang,a.nama_barang AS nama_barang,a.harga_price_list AS harga_price_list,b.qty AS qty,c.qty AS i_qty_barang
        FROM m_price_list a
        INNER JOIN m_barang b ON a.kode_barang = b.kode_barang
        INNER JOIN m_pl_list_barang c ON a.kode_barang = c.kode_barang
        GROUP BY a.id,a.kode_barang,a.nama_barang,a.harga_price_list,b.qty,c.qty";
        return $this->db->query($query);
    }

    function get_view_timbangan($id){
        $query = "SELECT * FROM m_timbangan WHERE id_pl = '$id' ";
        return $this->db->query($query);
    }

    function get_PL(){
        $query = "SELECT a.*,(SELECT COUNT(id_pl) FROM m_timbangan WHERE id_pl = a.id) AS jml_timbang FROM pl a ";
        return $this->db->query($query);
    }

    function get_PL_price_list(){
        $query = "SELECT a.*,(SELECT COUNT(id_pl_price_list)
        FROM m_pl_list_barang WHERE id_pl_price_list = a.id) AS jml_timbang FROM m_pl_price_list a";
        return $this->db->query($query);
    }

    function insert_timbangan(){
        
        $data = array(
                'roll'     	=> $_POST['id'],
                'tgl'      => $_POST['tgl'],
                'nm_ker'       => $_POST['nm_ker'],
                'g_ac'      => $_POST['g_ac'],
                'g_label'      => $_POST['g_label'],
                'width'       => $_POST['width'],
                'weight'       => $_POST['weight'],
                'diameter'      => $_POST['diameter'],
                'joint'      => $_POST['joint'],
                'rct'      => $_POST['rct'],
                'bi'      => $_POST['bi'],
                'ket'      => $_POST['ket']
            );
        $result= $this->db->insert("m_timbangan",$data);

        return $result;
    }

    function insert_pl(){
        
        $data = array(
                'tgl'      => $_POST['tgl'],
                'no_surat'      => str_replace(" ", "", $_POST['no_surat']),
                'no_so'       => $_POST['no_so'],
                'no_pkb'      => $_POST['no_pkb'],
                'no_kendaraan'      => $_POST['no_kendaraan'],
                'nama'       => $_POST['nama'],
                'id_perusahaan'       => $_POST['id_perusahaan'],
                'nm_perusahaan'       => $_POST['nm_perusahaan'],
                'alamat_perusahaan'      => $_POST['alamat_perusahaan'],
                'no_telp'      => $_POST['no_telp'],
                'no_po'      => $_POST['no_po']
            );


        $result= $this->db->insert("pl",$data);

        $no_surat = $_POST['no_surat'];
        $id = $this->db->query("SELECT id FROM pl WHERE no_surat = '$no_surat'")->row('id');

        foreach ($this->cart->contents() as $items) {
            $this->db->set('status', "1");
            $this->db->set('id_pl', $id);

            $this->db->where('roll', str_replace("_", "/", $items['name']));
            $result= $this->db->update('m_timbangan');
        }

        return $result;
    }

    function insert_pl_pl_b(){
        // insert packing list
        $data = array(
            'tgl' => $_POST['tgl'],
            'no_surat' => $_POST['no_surat'],
            'no_so' => $_POST['no_so'],
            'no_po' => $_POST['no_po'],
            'no_nota' => $_POST['no_nota'],
            'kepada' => $_POST['kepada'],
            'created_by' => $this->session->userdata('username')
        );
        $result= $this->db->insert("m_pl_price_list",$data);

        $no_surat = $_POST['no_surat'];
        $plpl = $this->db->query("SELECT id,tgl FROM m_pl_price_list WHERE no_surat = '$no_surat'")->row();

        // insert pl list barang
        foreach ($this->cart->contents() as $items) {
            $data_list = array(
                'tgl' => $plpl->tgl,
                'kode_barang' => $items['options']['kode_barang'],
                'harga_price_list' => $items['price'],
                'qty' => $items['qty'],
                'id_pl_price_list' => $plpl->id,
                'created_by' => $this->session->userdata('username')
            );
            $result= $this->db->insert("m_pl_list_barang",$data_list);

            // update stok 
            $sisa = $items['options']['stok'] - $items['qty'];
            $this->db->set('qty', $sisa);
            $this->db->where('kode_barang', $items['options']['kode_barang']);
            $result = $this->db->update('m_barang');
        }

        return $result;
    }

    function update_pl_edit(){

        // update pl
        $this->db->set('tgl', $_POST['tgl']);
        $this->db->set('no_surat', $_POST['no_surat']);
        $this->db->set('no_so', $_POST['no_so']);
        $this->db->set('no_po', $_POST['no_po']);
        $this->db->set('no_nota', $_POST['no_nota']);
        $this->db->set('kepada', $_POST['kepada']);
        $this->db->set('updated_at', date('Y-m-d H:i:s'));
        $this->db->set('updated_by', $this->session->userdata('username'));
        $this->db->where('id', $_POST['id']);
        $result = $this->db->update('m_pl_price_list');

        // delete dulu bos
        $result = $this->m_master->delete("m_pl_list_barang","id_pl_price_list",$_POST['id']);

        // insert kembali
        foreach ($this->cart->contents() as $items) {
            $data_list = array(
                'tgl' => $_POST['tgl'],
                'kode_barang' => $items['options']['kode_barang'],
                'harga_price_list' => $items['price'],
                'qty' => $items['qty'],
                'id_pl_price_list' => $_POST['id'],
                'created_by' => $this->session->userdata('username')
            );
            $result= $this->db->insert("m_pl_list_barang",$data_list);

            // update stok 
            $sisa = $items['options']['stok'] - $items['qty'];
            $this->db->set('qty', $sisa);
            $this->db->where('kode_barang', $items['options']['kode_barang']);
            $result = $this->db->update('m_barang');
        }

        return $result;
    }

    function update_timbangan(){
        
        $this->db->set('nm_ker', $_POST['nm_ker']);
        $this->db->set('g_ac', $_POST['g_ac']);
        $this->db->set('g_label', $_POST['g_label']);
        $this->db->set('width', $_POST['width']);
        $this->db->set('weight', $_POST['weight']);
        $this->db->set('diameter', $_POST['diameter']);
        $this->db->set('joint', $_POST['joint']);
        $this->db->set('ket', $_POST['ket']);
        $this->db->set('rct', $_POST['rct']);
        $this->db->set('bi', $_POST['bi']);
        $this->db->where('roll', $_POST['id']);
        $result = $this->db->update('m_timbangan');



        return $result;
    }

    function update_pl(){
        $no_surat = $_POST['no_surat_lama'];
        $id = $this->db->query("SELECT id FROM pl WHERE no_surat = '$no_surat'")->row('id');
        

        $this->db->set('tgl', $_POST['tgl']);
        $this->db->set('no_surat', $_POST['no_surat']);
        $this->db->set('no_so', $_POST['no_so']);
        $this->db->set('no_pkb', $_POST['no_pkb']);
        $this->db->set('no_kendaraan', $_POST['no_kendaraan']);
        $this->db->set('nama', $_POST['nama']);
        $this->db->set('id_perusahaan', $_POST['id_perusahaan']);
        $this->db->set('nm_perusahaan', $_POST['nm_perusahaan']);
        $this->db->set('alamat_perusahaan', $_POST['alamat_perusahaan']);
        $this->db->set('no_telp', $_POST['no_telp']);
        $this->db->set('no_po', $_POST['no_po']);

        $this->db->set('updated_at', date('Y-m-d H:i:s'));
        $this->db->set('updated_by', $this->session->userdata('username'));
        $this->db->where('id', $id);
        $result = $this->db->update('pl');

        $this->db->set('status', "0");
        $this->db->set('id_pl', "0");

        $this->db->where('id_pl', $id);
        $result= $this->db->update('m_timbangan');

        foreach ($this->cart->contents() as $items) {
            $this->db->set('status', "1");
            $this->db->set('id_pl', $id);

            $this->db->where('roll', str_replace("_", "/", $items['name']));
            $result= $this->db->update('m_timbangan');
        }

        return $result;
    }

    function get_lok($searchTerm=""){

     

     $users = $this->db->query("SELECT * FROM lok WHERE acc like '%$searchTerm%' or  ket like '%$searchTerm%' ORDER BY ket ")->result_array();

     // Initialize Array with fetched data
     $data = array();
     foreach($users as $user){
        $data[] = array(
            "id"=>$user['acc'], 
            "text"=>$user['acc']
        );
     }
     return $data;
  }

    function get_perusahaan(){
        $query = "SELECT * FROM m_perusahaan ORDER BY id DESC ";
        return $this->db->query($query);
    }

    function get_load_price_list(){
        $query = "SELECT * FROM m_price_list ORDER BY kode_barang ASC";
        return $this->db->query($query);
    }

    function get_load_barang(){
        $query = "SELECT a.id,a.tgl,c.nama_supplier,b.no_nota,a.kode_barang,a.nama_barang,a.merek,a.spesifikasi,a.qty,a.qty_ket,a.harga FROM m_barang a
        INNER JOIN m_nota b ON a.id_m_nota=b.id
        INNER JOIN m_supplier c ON b.id_supplier=c.id
        ORDER BY a.nama_barang";
        return $this->db->query($query);
    }

    function get_load_supplier(){
        $query = "SELECT * FROM m_supplier ORDER BY nama_supplier ASC";
        return $this->db->query($query);
    }

    function get_load_no_nota(){
        $query = "SELECT a.id,b.nama_supplier,a.no_nota FROM m_nota a
        INNER JOIN m_supplier b ON a.id_supplier = b.id
        ORDER BY b.nama_supplier ASC,a.no_nota ASC";
        return $this->db->query($query);
    }

    function get_po_master(){
        $query = "SELECT b.nm_perusahaan,c.nama_barang,a.* FROM po_master a
        INNER JOIN m_perusahaan b ON a.id_perusahaan = b.id
        INNER JOIN m_barang c ON a.kode_barang = c.kode_barang";
        return $this->db->query($query);
    }

    function insert_perusahaan(){
        
        $data = array(
                'pimpinan'      => $_POST['pimpinan'],
                'nm_perusahaan'       => $_POST['nm_perusahaan'],
                'alamat'      => $_POST['alamat'],
                'npwp'      => $_POST['npwp'],
                'no_telp'      => $_POST['no_telp'],
                'created_by'      => $this->session->userdata('username')
            );
        $result= $this->db->insert("m_perusahaan",$data);

        return $result;
    }

    function insert_price_list(){
        
        $data = array(
            'tgl' => $_POST['tgl'],
            'kode_barang' => $_POST['kode_barang'],
            'nama_barang' => $_POST['nama_barang'],
            'merek' => $_POST['merek'],
            'spesifikasi' => $_POST['spesifikasi'],
            'supplier' => $_POST['supplier'],
            'harga_price_list' => $_POST['harga_price_list'],
            'created_by' => $this->session->userdata('username')
        );
        $result= $this->db->insert("m_price_list",$data);

        return $result;
    }

    function insert_load_barang(){
        $data = array(
            'tgl' => $_POST['tgl'],
            'id_m_nota' => $_POST['supplier'],
            'kode_barang' => $_POST['kode_barang'],
            'nama_barang' => $_POST['nama_barang'],
            'merek' => $_POST['merek'],
            'spesifikasi' => $_POST['spesifikasi'],
            'qty' => $_POST['qty'],
            'qty_ket' => $_POST['qty_ket'],
            'harga' => $_POST['harga'],
            // 'no_nota' => $_POST['no_nota'],
            'created_by' => $this->session->userdata('username')
        );
        $result= $this->db->insert("m_barang",$data);

        return $result;
    }

    function insert_load_supplier(){
        $data = array(
            // 'tgl' => $_POST['tgl'],
            'nama_supplier' => $_POST['supplier'],
            'created_by' => $this->session->userdata('username')
        );
        $result= $this->db->insert("m_supplier",$data);

        return $result;
    }

    function insert_nota(){
        $data = array(
            // 'tgl' => $_POST['tgl'],
            'id_supplier' => $_POST['supplier'],
            'no_nota' => $_POST['no_nota'],
            'created_by' => $this->session->userdata('username')
        );
        $result= $this->db->insert("m_nota",$data);

        return $result;
    }

    function insert_po_master(){
        
        $data = array(
                'id_perusahaan' => $_POST['id_perusahaan'],
                'tgl'           => $_POST['tgl'],
                'kode_barang'   => $_POST['kode_barang'],
                'qty'           => $_POST['qty'],
                'no_po'         => $_POST['no_po']
            );
        $result= $this->db->insert("po_master",$data);

        return $result;
    }

    function update_perusahaan(){
        
        $this->db->set('pimpinan', $_POST['pimpinan']);
        $this->db->set('nm_perusahaan', $_POST['nm_perusahaan']);
        $this->db->set('alamat', $_POST['alamat']);
        $this->db->set('no_telp', $_POST['no_telp']);
        $this->db->set('npwp', $_POST['npwp']);
        $this->db->where('id', $_POST['id']);
        $result = $this->db->update('m_perusahaan');
        return $result;
    }

    function update_price_list(){
        $this->db->set('tgl', $_POST['tgl']);
        $this->db->set('nama_barang', $_POST['nama_barang']);
        $this->db->set('merek', $_POST['merek']);
        $this->db->set('spesifikasi', $_POST['spesifikasi']);
        $this->db->set('supplier', $_POST['supplier']);
        $this->db->set('harga_price_list', $_POST['harga_price_list']);
        $this->db->set('updated_at', date("Y-m-d h:i:s"));
        $this->db->set('updated_by', $this->session->userdata('username'));
        $this->db->where('kode_barang', $_POST['kode_barang']);
        $result = $this->db->update('m_price_list');
        return $result;
    }

    function update_load_barang(){
        
        $this->db->set('tgl', $_POST['tgl']);
        $this->db->set('id_m_nota', $_POST['supplier']);
        // $this->db->set('kode_barang', $_POST['kode_barang']);
        $this->db->set('nama_barang', $_POST['nama_barang']);
        $this->db->set('merek', $_POST['merek']);
        $this->db->set('spesifikasi', $_POST['spesifikasi']);
        $this->db->set('qty', $_POST['qty']);
        $this->db->set('qty_ket', $_POST['qty_ket']);
        $this->db->set('harga', $_POST['harga']);
        // $this->db->set('no_nota', $_POST['no_nota']);
        $this->db->set('updated_at', date("Y-m-d h:i:s"));
        $this->db->set('updated_by', $this->session->userdata('username'));
        $this->db->where('id', $_POST['id']);
        $result = $this->db->update('m_barang');
        return $result;
    }

    function update_load_supplier(){
        
        // $this->db->set('tgl', $_POST['tgl']);
        $this->db->set('nama_supplier', $_POST['supplier']);
        $this->db->set('updated_at', date("Y-m-d h:i:s"));
        $this->db->set('updated_by', $this->session->userdata('username'));
        $this->db->where('id', $_POST['id']);
        $result = $this->db->update('m_supplier');
        return $result;
    }

    function update_nonota(){
        
        $this->db->set('id_supplier ', $_POST['supplier']);
        $this->db->set('no_nota ', $_POST['no_nota']);
        $this->db->set('updated_at', date("Y-m-d h:i:s"));
        $this->db->set('updated_by', $this->session->userdata('username'));
        $this->db->where('id', $_POST['id']);
        $result = $this->db->update('m_nota');
        return $result;
    }

    function update_master_po(){
        $this->db->set('tgl', $_POST['tgl']);
        $this->db->set('qty', $_POST['qty']);
        $this->db->set('no_po', $_POST['no_po']);
        $this->db->where('id_perusahaan', $_POST['id_perusahaan']);
        $this->db->where('kode_barang', $_POST['kode_barang']);
        $result = $this->db->update('po_master');
        return $result;
    }

    function list_perusahaan($searchTerm=""){
     $users = $this->db->query("SELECT * FROM m_perusahaan WHERE pimpinan like '%$searchTerm%' or nm_perusahaan like '%$searchTerm%' ORDER BY pimpinan ")->result_array();

     // Initialize Array with fetched data
     $data = array();
     foreach($users as $user){
        $data[] = array(
            "id"=>$user['id'], 
            "text"=>$user['nm_perusahaan'],
            "pimpinan"=>$user['pimpinan'], 
            "no_telp"=>$user['no_telp'], 
            "npwp"=>$user['npwp'], 
            "alamat"=>$user['alamat']
        );
     }
     return $data;
    }

    function list_po_barang($searchTerm=""){
        $users = $this->db->query("SELECT * FROM m_barang WHERE kode_barang like '%$searchTerm%' or nama_barang like '%$searchTerm%' ORDER BY kode_barang ")->result_array();
   
        // Initialize Array with fetched data
        $data = array();
        foreach($users as $user){
           $data[] = array(
               "id"=>$user['id'], 
               "kode_barang"=>$user['kode_barang'],
               "text"=>$user['nama_barang']
           );
        }
        return $data;
    }

    function list_supplier($searchTerm=""){
        $users = $this->db->query("SELECT * FROM m_supplier WHERE nama_supplier like '%$searchTerm%' ORDER BY nama_supplier ASC")->result_array();
   
        // Initialize Array with fetched data
        $data = array();
        foreach($users as $user){
           $data[] = array(
               "id"=>$user['id'],
               "id_supplier"=>$user['id'],
               "text"=>$user['nama_supplier']
           );
        }
        return $data;
    }

    function list_supplier_nota($searchTerm=""){
        $users = $this->db->query("SELECT a.id,b.nama_supplier,CONCAT(b.nama_supplier, ' | ', a.no_nota) AS id_n,a.no_nota FROM m_nota a
        INNER JOIN m_supplier b ON a.id_supplier=b.id
        WHERE b.nama_supplier LIKE '%$searchTerm%' OR
        a.no_nota LIKE '%$searchTerm%' 
        ORDER BY b.nama_supplier ASC,a.no_nota ASC")->result_array();
   
        // Initialize Array with fetched data
        $data = array();
        foreach($users as $user){
           $data[] = array(
               "id"=>$user['id'],
               "text"=>$user['id_n'],
               "nama_supplier"=>$user['nama_supplier'],
               "no_nota"=>$user['no_nota']
           );
        }
        return $data;
    }

    function list_m_barang_pl($searchTerm=""){
    $users = $this->db->query("SELECT * FROM m_barang WHERE kode_barang like '%$searchTerm%' or nama_barang like '%$searchTerm%' ORDER BY kode_barang ASC")->result_array();

    // Initialize Array with fetched data
    $data = array();
    foreach($users as $user){
        $data[] = array(
            // harus kasih id agar muncul
            "id" =>$user['id'],
            // "tgl" =>$user['tgl'],
            "text" =>$user['kode_barang'],
            "nama_barang" =>$user['nama_barang'],
            "merek" =>$user['merek'],
            "spesifikasi" =>$user['spesifikasi'],
            "supplier" =>$user['supplier'],
            "harga" =>$user['harga']
        );
    }
    return $data;
    }

    function list_sj($searchTerm=""){

     // ASLI
     $users = $this->db->query("SELECT * FROM pl WHERE STATUS ='Open' and (no_surat like '%$searchTerm%' or  nm_perusahaan like '%$searchTerm%') ORDER BY no_surat ")->result_array();

     // $users = $this->db->query("SELECT * FROM pl WHERE STATUS ='Open' and (no_surat like '%$searchTerm%' or  nm_perusahaan like '%$searchTerm%') GROUP BY no_pkb ORDER BY no_surat ")->result_array();

     // $users = $this->db->query("SELECT * FROM pl WHERE STATUS ='Open' and (no_pkb like '%$searchTerm%' or  nm_perusahaan like '%$searchTerm%') ORDER BY no_surat ")->result_array();

     $data = array();
     foreach($users as $user){
        $data[] = array(
            "id"=>$user['no_surat'], 
            "text"=>$user['no_surat'], 
            "no_po"=>$user['no_po'], 
            "no_pkb"=>$user['no_pkb'], 
            "no_telp"=>$user['no_telp'], 
            "pimpinan"=>$user['nama'], 
            "id_perusahaan"=>$user['id_perusahaan'],
            "alamat"=>$user['alamat_perusahaan'], 
            "nm_perusahaan"=>$user['nm_perusahaan']
        );
     }
     return $data;
    }

    function get_invoice(){
        $query = "SELECT a.*,(SELECT SUM(harga) FROM tr_invoice WHERE no_invoice = a.no_invoice)AS total FROM th_invoice a ORDER BY jto DESC,no_invoice asc";
        return $this->db->query($query);
    }

    function get_jatuh_tempo(){
        $query = "SELECT a.*,(SELECT SUM(harga) FROM tr_invoice WHERE no_invoice = a.no_invoice)AS total FROM th_invoice a where status ='Closed' ORDER BY jto DESC,no_invoice asc";
        return $this->db->query($query);
    }

    function get_barang(){
        $no_surat = $_POST['no_surat'];
        $query = "SELECT a.g_label AS g_label,CONCAT('LB ', a.width) AS lb,COUNT(a.roll) AS roll,b.no_po,SUM(weight) weight FROM m_timbangan a JOIN pl b
            ON a.`id_pl` = b.id
            WHERE no_surat = '$no_surat'
            GROUP BY a.width";

        // $query = "SELECT a.g_label AS g_label,CONCAT('LB ', a.width) AS lb,COUNT(a.roll) AS roll,b.no_po,SUM(weight) weight FROM m_timbangan a JOIN pl b
        //     ON a.`id_pl` = b.id
        //     WHERE no_surat LIKE '%$no_surat%'
        //     GROUP BY a.width";
        return $this->db->query($query);
    }

    function insert_invoice(){
        $data = array(
                'no_invoice'    => $_POST['id'],
                'jto'           => $_POST['jto'],
                'no_surat'      => $_POST['no_surat'],
                'no_po'         => $_POST['no_po'],
                'no_pkb'        => $_POST['no_pkb'],
                'id_perusahaan' => $_POST['id_perusahaan'],
                'kepada'        => $_POST['nama'],
                'nm_perusahaan' => $_POST['nm_perusahaan'],
                'alamat'        => $_POST['alamat_perusahaan']
            );

        $result= $this->db->insert("th_invoice",$data);

        $gsm = "";
        foreach ($this->cart->contents() as $items) {
            $this->db->set('no_invoice', $_POST['id']);
            $this->db->set('g_label', $items['options']['gsm']);
            $this->db->set('width_lb', $items['name']);
            $this->db->set('roll', str_replace("_", "/", $items['options']['roll']));
            $this->db->set('satuan', $items['options']['satuan']);
            $this->db->set('jumlah', $items['qty']);
            $this->db->set('harga', $items['price']);

            $result= $this->db->insert('tr_invoice');

            $gsm = $items['options']['gsm'];
        }

            $this->db->set('gsm', $gsm);
            $this->db->where('no_invoice', $_POST['id']);
            $result= $this->db->update('th_invoice');

            $this->db->set('status', "Closed");
            // $this->db->where('no_surat', $_POST['no_surat']);
            $this->db->where('no_pkb', $_POST['no_pkb']);
            $result= $this->db->update('pl');

        return $result;
    }

    function reject()
    {
        $id = $_POST['id'];

        // $no_surat = $this->db->get_where('th_invoice', array('id' => $id))->row("no_surat");
        $no_pkb = $this->db->get_where('th_invoice', array('id' => $id))->row("no_pkb");

        $this->db->set('status', "Open");
        // $this->db->where('no_surat', $no_surat);
        $this->db->where('no_pkb', $no_pkb);
        $result= $this->db->update('pl');

        $this->db->set('status', "Reject");
        $this->db->where('id', $id);
        $result= $this->db->update('th_invoice');

        return $result;
    }

    function confirm()
    {
        $id = $_POST['id'];

        $no_surat = $this->db->get_where('th_invoice', array('id' => $id))->row("no_surat");

        // $this->db->set('status', "Open");
        // $this->db->where('no_surat', $no_surat);
        // $result= $this->db->update('pl');

        $this->db->set('status', "Valid");
        $this->db->where('id', $id);
        $result= $this->db->update('th_invoice');

        return $result;
    }

    function confirm_cek_po() {
        $id = $_POST['id'];

        // ambil po
        $q_pl_no_po = $this->m_master->get_plpl($id)->row();
        // $g_label = $q_pl_no_po->g_label;
        // $width   = $q_pl_no_po->width;
        // $no_po   = $q_pl_no_po->no_po;
        
        $result = $q_pl_no_po;        

        return $result;
    }

  
 
}

?>
