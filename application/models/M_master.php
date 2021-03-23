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

    function getNoInv($id){
        $query = "SELECT*FROM m_pl_price_list WHERE no_inv='$id' AND data_inv='1'";
        return $this->db->query($query);
    }

    function getNoInvCustLap($id,$kepada,$laporan){
        $query = "SELECT*FROM m_pl_price_list WHERE no_inv='$id' AND id_m_perusahaan='$kepada' AND laporan='$laporan'";
        return $this->db->query($query);
    }

    function get_data_ij($table,$kolom,$id){
        $query = "SELECT a.id,a.id_supplier,b.nama_supplier,a.no_nota FROM $table a
        INNER JOIN m_supplier b ON a.id_supplier=b.id
        WHERE a.$kolom='$id'";
        return $this->db->query($query);
    }

    function cari_supNo($id_supp,$id){
        $query = "SELECT*FROM m_nota a
        INNER JOIN m_supplier b ON a.id_supplier=b.id
        WHERE a.id_supplier='$id_supp' AND no_nota='$id'";
        return $this->db->query($query);
    }

    function get_data_ijpl($table,$kolom,$id){ //
        $query = "SELECT a.*,b.id AS id_barang,b.kode_barang,b.nama_barang,b.merek,b.spesifikasi,c.id AS id_supplier,c.nama_supplier FROM $table a
        INNER JOIN m_barang b ON a.id_m_barang=b.id
        INNER JOIN m_supplier c ON a.id_m_supplier=c.id
        WHERE a.$kolom='$id'";
        return $this->db->query($query);
    }

    function get_data_ijb($table,$kolom,$id){ //
        $query = "SELECT c.nama_supplier,b.no_nota,d.tgl_bayar,d.qty_plus,d.qty_ket,d.harga,d.status,c.ppn,a.* FROM $table a
        INNER JOIN m_nota b ON a.id_m_nota=b.id
        INNER JOIN m_supplier c ON b.id_supplier=c.id
        INNER JOIN m_barang_plus d ON a.id_m_barang_plus=d.id
        WHERE a.$kolom='$id'";
        return $this->db->query($query);
    }

    function get_data_bp($table,$kolom,$id){ //
        $query = "SELECT c.id AS id_supplier,c.nama_supplier,b.no_nota,a.* FROM $table a
        INNER JOIN m_nota b ON a.id_m_nota=b.id
        INNER JOIN m_supplier c ON b.id_supplier=c.id
        WHERE $kolom='$id'
        ORDER BY a.id ASC";
        return $this->db->query($query);
    }

    function get_data_plpl($m_pl_list_barang,$id_pl,$id){
        // $query = "SELECT * FROM $m_pl_list_barang WHERE $id_pl='$id'";
        $query = "SELECT
            a.id AS id_list_barang,
            b.id AS id_m_brng,
            b.qty AS qty,
            a.tgl AS tgl,
            b.kode_barang AS kode_barang,
            b.nama_barang AS nama_barang,
            a.harga_invoice AS harga_invoice,
            a.qty AS i_qty,
            a.qty_ket AS qty_ket,
            a.id_pl AS id_pl
        FROM $m_pl_list_barang a 
        INNER JOIN m_barang b ON a.id_m_barang = b.id
        WHERE a.$id_pl='$id'
        ORDER BY b.nama_barang ASC";
        return $this->db->query($query);
    }

    function getDataInv($no_inv){
        $query = "SELECT
            a.id AS id_list_barang,
            b.id AS id_m_brng,
            b.qty AS qty,
            a.tgl AS tgl,
            b.kode_barang AS kode_barang,
            b.nama_barang AS nama_barang,
            a.harga_invoice AS harga_invoice,
            a.qty AS i_qty,
            a.qty_ket AS qty_ket,
            a.id_pl AS id_pl
        FROM m_pl_list_barang a 
        INNER JOIN m_barang b ON a.id_m_barang = b.id
        INNER JOIN m_pl_price_list c ON c.id = a.id_pl
        WHERE c.no_inv='$no_inv'
        ORDER BY b.nama_barang ASC";
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

    function get_pl_barang(){
        $query = "SELECT b.qty_ket,a.* FROM m_barang a
        INNER JOIN m_barang_plus b ON a.id_m_barang_plus=b.id
        ORDER BY kode_barang ASC, nama_barang ASC";
        return $this->db->query($query);
    }

    function getPlBrngEdit($ids){
        $query = "SELECT b.qty_ket,a.* FROM m_barang a
        INNER JOIN m_barang_plus b ON a.id_m_barang_plus=b.id
        WHERE NOT EXISTS (SELECT*FROM m_pl_list_barang c WHERE id_pl='$ids' AND a.id=c.id_m_barang)
        ORDER BY kode_barang ASC, nama_barang ASC";
        return $this->db->query($query);
    }

    function get_pl_inv(){
        $id_pl = $_POST['id_pl'];
        $no_inv = $_POST['no_inv'];

        if($no_inv == 0){
            $where = "a.id='$id_pl'";
        }else{
            $where = "a.no_inv='$no_inv'";
        }

        $query = "SELECT c.kode_barang,c.nama_barang,b.qty,b.qty_ket,b.id AS id_pl_list_barang,a.* FROM m_pl_price_list a
        INNER JOIN m_pl_list_barang b ON a.id=b.id_pl
        INNER JOIN m_barang c ON b.id_m_barang=c.id
        WHERE $where";
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

    function get_PL_price_list(){
        $query = "SELECT a.*,(SELECT COUNT(id_pl)
        FROM m_pl_list_barang WHERE id_pl = a.id) AS jml_timbang FROM m_pl_price_list a ORDER BY a.id DESC";
        return $this->db->query($query);
    }

    function get_load_inv(){
        // $query = "SELECT c.nm_perusahaan,b.no_po,b.cek_inv,b.tgl_ctk,(SELECT COUNT(id_pl) FROM m_pl_list_barang WHERE id_pl = b.id) AS jml_timbang,a.* FROM m_invoice a
        // INNER JOIN m_pl_price_list b ON a.id_pl=b.id
        // INNER JOIN m_perusahaan c ON b.id_m_perusahaan=c.id
        // ORDER BY a.id DESC";
        $query = "SELECT c.nm_perusahaan,b.no_po,b.cek_inv,b.tgl_ctk,COUNT(d.id) AS jml_timbang,a.* FROM m_invoice a
        INNER JOIN m_pl_price_list b ON a.id_pl=b.id OR a.id_pl = 0 AND a.no_inv=b.no_inv
        INNER JOIN m_perusahaan c ON b.id_m_perusahaan=c.id
        INNER JOIN m_pl_list_barang d ON b.id = d.id_pl
        WHERE b.data_inv = '1'
        GROUP BY a.id
        ORDER BY a.id DESC";
        return $this->db->query($query);
    }

    function insert_pl_pl_b(){
        // opsi untuk cetak beberapa invoice
        if($_POST['no_inv'] == 0){
            $no_inv = 0 ;
        }else{
            $no_inv = $_POST['no_inv'];
        }

        // insert packing list
        $data = array(
            'id_m_perusahaan' => $_POST['kepada'],
            'tgl' => $_POST['tgl'],
            'laporan' => $_POST['laporan'],
            'no_surat' => $_POST['no_surat'],
            'no_so' => $_POST['no_so'],
            'no_po' => $_POST['no_po'],
            'no_inv' => $no_inv,
            'up' => $_POST['upup'],
            'created_by' => $this->session->userdata('username')
        );
        $result= $this->db->insert("m_pl_price_list",$data);

        $no_surat = $_POST['no_surat'];
        $plpl = $this->db->query("SELECT id,tgl FROM m_pl_price_list WHERE no_surat = '$no_surat'")->row();

        // insert pl list barang
        foreach ($this->cart->contents() as $items) {
            $sisa_stok = $items['options']['qty'] - $items['qty'];

            if($sisa_stok < 0){
                $stok = 0;
                $iqty = ($items['qty'] - $items['qty']) + $items['options']['qty'];
            }else{
                $stok = $sisa_stok;
                $iqty = $items['qty'];
            }
            
            $data_list = array(
                'id_pl' => $plpl->id,
                'id_m_barang' => $items['options']['id_barang'],
                'tgl' => $plpl->tgl,
                'qty' => $iqty,
                'qty_ket' => $items['options']['qty_ket'],
                'created_by' => $this->session->userdata('username')
            );
            $result= $this->db->insert("m_pl_list_barang",$data_list);

            // update stok             
            $this->db->set('qty', $stok);
            $this->db->where('id', $items['options']['id_barang']);
            $result = $this->db->update('m_barang');
        }

        return $result;
    }

    function insert_pl_inv(){
        // kondisi jika ada no invoice
        if($_POST['no_inv'] == 0){
            $id_pl = $_POST['id_pl'];
            $wid = 'id';
            $www = $_POST['id_pl'];
        }else{
            $id_pl = 0;
            $wid = 'no_inv';
            $www = $_POST['no_inv'];
        }

        // insert invoice
        $data = array(
            'id_pl' => $id_pl,
            'no_nota' => $_POST['no_nota'],
            'no_faktur' => $_POST['no_faktur'],
            'no_inv' => $_POST['no_inv'],
            'up' => $_POST['up'],
            'tgl_jt' => $_POST['tgl_jt'],
            'ongkir' => $_POST['ongkir'],
            'created_by' => $this->session->userdata('username')
        );
        $result= $this->db->insert("m_invoice",$data);

        // update data masuk invoice
        $this->db->set('data_inv', "1");
        $this->db->where($wid, $www);
        $result = $this->db->update('m_pl_price_list');

        // update harga list barang
        foreach ($this->cart->contents() as $items) {
            // update harga
            $this->db->set('harga_invoice', $items['options']['price']);
            $this->db->where('id', $items['options']['id_list_barang']);
            $result = $this->db->update('m_pl_list_barang');
        }

        return $result;
    }

    function edit_pl_inv() {
        // kondisi jika ada no invoice
        if($_POST['no_inv'] == 0){
            $wid = 'id';
            $www = $_POST['id'];
        }else{
            $wid = 'no_inv';
            $www = $_POST['no_inv'];
        }

        // update invoice
        $this->db->set('no_nota', $_POST['no_nota']);
        $this->db->set('no_faktur', $_POST['no_faktur']);
        $this->db->set('up', $_POST['up']);
        $this->db->set('tgl_jt', $_POST['tgl_jt']);
        $this->db->set('ongkir', $_POST['ongkir']);
        $this->db->set('updated_at', date('Y-m-d H:i:s'));
        $this->db->set('updated_by', $this->session->userdata('username'));
        $this->db->where($wid, $www);
        // $this->db->where('id', $_POST['id']);
        $result = $this->db->update('m_invoice');

        return $result;
    }

    function update_pl_edit(){
        // opsi untuk cetak beberapa invoice
        if($_POST['no_inv'] == 0){
            $no_inv = 0 ;
        }else{
            $no_inv = $_POST['no_inv'];
        }

        // update pl
        $this->db->set('id_m_perusahaan', $_POST['kepada']);
        $this->db->set('tgl', $_POST['tgl']);
        $this->db->set('no_surat', $_POST['no_surat']);
        $this->db->set('no_so', $_POST['no_so']);
        $this->db->set('no_po', $_POST['no_po']);
        $this->db->set('up', $_POST['upup']);
        $this->db->set('laporan', $_POST['laporan']);
        $this->db->set('no_inv', $no_inv);
        $this->db->set('updated_at', date('Y-m-d H:i:s'));
        $this->db->set('updated_by', $this->session->userdata('username'));
        $this->db->where('id', $_POST['id']);
        $result = $this->db->update('m_pl_price_list');

        // update tgl list barang
        $this->db->set('tgl', $_POST['tgl']);
        $this->db->where('id_pl', $_POST['id']);
        $result = $this->db->update('m_pl_list_barang');

        //////
        $no_surat = $_POST['no_surat'];
        $plpl = $this->db->query("SELECT * FROM m_pl_price_list WHERE no_surat = '$no_surat'")->row();

        // insert pl list barang
        foreach ($this->cart->contents() as $items) {
            $sisa_stok = $items['options']['qty'] - $items['qty'];

            if($sisa_stok < 0){
                $stok = 0;
                $iqty = ($items['qty'] - $items['qty']) + $items['options']['qty'];
            }else{
                $stok = $sisa_stok;
                $iqty = $items['qty'];
            }

            $idmm = $items['options']['id_barang'];
            $count = $this->db->query("SELECT * FROM m_pl_list_barang WHERE id_pl = '$plpl->id' AND id_m_barang = '$idmm'");

            $lb = $this->db->query("SELECT * FROM m_barang WHERE id = '$idmm'")->row();

            // jika pl dan kode barang sama update jadi satu qtynya
            if($count->num_rows() > 0){
                $sAkhir = $lb->qty - $iqty;
                $tmbh = $count->row()->qty + $iqty;

                $this->db->set('tgl', $plpl->tgl);
                $this->db->set('qty', $tmbh);
                $this->db->set('updated_at', date('Y-m-d H:i:s'));
                $this->db->set('updated_by', $this->session->userdata('username'));
                $this->db->where('id_pl', $plpl->id);
                $this->db->where('id_m_barang', $items['options']['id_barang']);
                $result = $this->db->update('m_pl_list_barang');
            }else{
                $sAkhir = $stok;

                $data_list = array(
                    'id_pl' => $plpl->id,
                    'id_m_barang' => $items['options']['id_barang'],
                    'tgl' => $plpl->tgl,
                    'qty' => $iqty,
                    'qty_ket' => $items['options']['qty_ket'],
                    'created_by' => $this->session->userdata('username')
                );
                $result= $this->db->insert("m_pl_list_barang",$data_list);
            }

            // update stok             
            // $this->db->set('qty', $stok);
            $this->db->set('qty', $sAkhir);
            $this->db->where('id', $items['options']['id_barang']);
            $result = $this->db->update('m_barang');
        }

        return $result;
    }

    function updatePListBarang() {
        // update input qty
        $this->db->set('qty', $_POST['i_qty']);
        $this->db->set('updated_at', date('Y-m-d H:i:s'));
        $this->db->set('updated_by', $this->session->userdata('username'));
        $this->db->where('id', $_POST['id']);
        $result = $this->db->update('m_pl_list_barang');

        // update stok di master barang
        $this->db->set('qty', $_POST['qty']);
        $this->db->set('updated_at', date('Y-m-d H:i:s'));
        $this->db->set('updated_by', $this->session->userdata('username'));
        $this->db->where('id', $_POST['id_m_brng']);
        $result = $this->db->update('m_barang');

        return $result;
    }

    function updateInvListBarang() {
        // update input harga
        $this->db->set('harga_invoice', $_POST['i_hrg']);
        $this->db->set('updated_at', date('Y-m-d H:i:s'));
        $this->db->set('updated_by', $this->session->userdata('username'));
        $this->db->where('id', $_POST['id']);
        $result = $this->db->update('m_pl_list_barang');

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
        $query = "SELECT a.*,b.kode_barang,b.nama_barang,b.merek,b.spesifikasi,c.id AS id_supplier,c.nama_supplier FROM m_price_list a
        INNER JOIN m_barang b ON a.id_m_barang=b.id
        INNER JOIN m_supplier c ON a.id_m_supplier=c.id
        ORDER BY b.nama_barang ASC";
        return $this->db->query($query);
    }

    function get_load_barang(){
        $query = "SELECT c.nama_supplier,b.no_nota,d.harga,d.qty_ket,a.* FROM m_barang a
        INNER JOIN m_nota b ON a.id_m_nota=b.id
        INNER JOIN m_supplier c ON b.id_supplier=c.id
        INNER JOIN m_barang_plus d ON a.id_m_barang_plus=d.id
        ORDER BY a.nama_barang";
        return $this->db->query($query);
    }

    function get_load_supplier(){
        $query = "SELECT * FROM m_supplier ORDER BY nama_supplier ASC";
        return $this->db->query($query);
    }

    function get_load_admin(){
        $query = "SELECT * FROM user ORDER BY username ASC";
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
                'pimpinan' => $_POST['pimpinan'],
                'nm_perusahaan' => $_POST['nm_perusahaan'],
                'alamat' => $_POST['alamat'],
                'npwp' => $_POST['npwp'],
                'no_telp' => $_POST['no_telp'],
                'laporan' => $_POST['laporan'],
                'created_by' => $this->session->userdata('username')
            );
        $result= $this->db->insert("m_perusahaan",$data);

        return $result;
    }

    function insert_price_list(){
        
        $data = array(
            'tgl' => $_POST['tgl'],
            'id_m_barang' => $_POST['kode_barang'],
            'id_m_supplier' => $_POST['supplier'],
            'harga_price_list' => $_POST['harga_price_list'],
            'created_by' => $this->session->userdata('username')
        );
        $result= $this->db->insert("m_price_list",$data);

        return $result;
    }

    function insert_load_barang(){ //
        $data = array(
            'tgl' => $_POST['tgl'],
            // 'tgl_bayar' => $_POST['tgl_byr'],
            'id_m_nota' => $_POST['supplier'],
            'kode_barang' => $_POST['kode_barang'],
            'nama_barang' => $_POST['nama_barang'],
            'merek' => $_POST['merek'],
            'spesifikasi' => $_POST['spesifikasi'],
            'qty' => $_POST['qty'],
            'ppn' => $_POST['ppn'],
            // 'qty_ket' => $_POST['qty_ket'],
            // 'harga' => $_POST['harga'],
            // 'status' => $_POST['status_plus'],
            'created_by' => $this->session->userdata('username')
        );
        $result= $this->db->insert("m_barang",$data);

        $kd = $_POST['kode_barang'];
        $id = $this->db->query("SELECT id FROM m_barang WHERE kode_barang = '$kd'")->row();
        $data_plus = array(
            'tgl_masuk' => $_POST['tgl'],
            'tgl_bayar' => $_POST['tgl_byr'],
            'id_m_barang' => $id->id,
            'id_m_nota' => $_POST['supplier'],
            'qty_plus' => $_POST['qty'],
            'qty_ket' => $_POST['qty_ket'],
            'harga' => $_POST['harga'],
            'status' => $_POST['status_plus'],
            'created_by' => $this->session->userdata('username')
        );
        $result= $this->db->insert("m_barang_plus",$data_plus);

        // insert id barang plus di master barang
        $id_plus = $this->db->query("SELECT id FROM m_barang_plus WHERE id_m_barang='$id->id' ORDER BY id DESC LIMIT 1")->row();
        $this->db->set('id_m_barang_plus', $id_plus->id);
        $this->db->where('id', $id->id);
        $result = $this->db->update('m_barang');

        return $result;
    }

    function insert_load_supplier(){
        $data = array(
            'nama_supplier' => $_POST['supplier'],
            'ppn' => $_POST['ppn'],
            'created_by' => $this->session->userdata('username')
        );
        $result= $this->db->insert("m_supplier",$data);

        return $result;
    }

    function insert_load_admin(){
        $data = array(
            // 'tgl' => $_POST['tgl'],
            'nm_user' => $_POST['nm_user'],
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
            'level' => $_POST['level'],
            'otoritas' => $_POST['otoritas'],
            'created_by' => $this->session->userdata('username')
        );
        $result= $this->db->insert("user",$data);

        return $result;
    }

    function update_load_admin(){
        
        $this->db->set('nm_user', $_POST['nm_user']);
        $this->db->set('username', $_POST['username']);
        $this->db->set('password', md5($_POST['password']));
        $this->db->set('level', $_POST['level']);
        $this->db->set('otoritas', $_POST['otoritas']);
        $this->db->set('updated_at', date("Y-m-d h:i:s"));
        $this->db->set('updated_by', $this->session->userdata('username'));
        $this->db->where('id', $_POST['id']);
        $result = $this->db->update('user');
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
        $this->db->set('npwp', $_POST['npwp']);
        $this->db->set('no_telp', $_POST['no_telp']);
        $this->db->set('laporan', $_POST['laporan']);
        $this->db->set('updated_at', date("Y-m-d h:i:s"));
        $this->db->set('updated_by', $this->session->userdata('username'));
        $this->db->where('id', $_POST['id']);
        $result = $this->db->update('m_perusahaan');
        return $result;
    }

    function update_price_list(){
        $this->db->set('tgl', $_POST['tgl']);
        $this->db->set('id_m_barang', $_POST['kode_barang']);
        $this->db->set('id_m_supplier', $_POST['supplier']);
        $this->db->set('harga_price_list', $_POST['harga_price_list']);
        $this->db->set('updated_at', date("Y-m-d h:i:s"));
        $this->db->set('updated_by', $this->session->userdata('username'));
        $this->db->where('id', $_POST['id']);
        $result = $this->db->update('m_price_list');
        return $result;
    }

    function update_load_barang(){ //
        // 'id_m_nota' => $_POST['supplier'],
        $this->db->set('tgl', $_POST['tgl']);
        $this->db->set('id_m_nota', $_POST['supplier']);
        $this->db->set('kode_barang', $_POST['kode_barang']);
        $this->db->set('nama_barang', $_POST['nama_barang']);
        $this->db->set('merek', $_POST['merek']);
        $this->db->set('spesifikasi', $_POST['spesifikasi']);
        $this->db->set('qty', $_POST['qty']);
        $this->db->set('ppn', $_POST['ppn']);
        $this->db->set('updated_at', date("Y-m-d h:i:s"));
        $this->db->set('updated_by', $this->session->userdata('username'));
        $this->db->where('id', $_POST['id']);
        $result = $this->db->update('m_barang');

        // EDIT
        if($_POST['qty_plus'] == 0){
            $this->db->set('id_m_nota', $_POST['supplier']);
            $this->db->set('tgl_masuk', $_POST['tgl']);
            $this->db->set('tgl_bayar', $_POST['tgl_byr']);
            // if($opsi == "uptok"){
            //     $this->db->set('qty_plus', $_POST['qty_plus_lama']);
            // }else if($opsi == "updel"){
            $this->db->set('qty_plus', $_POST['qty_edit']);
            // }
            $this->db->set('qty_ket', $_POST['qty_ket']);
            $this->db->set('harga', $_POST['harga']);
            $this->db->set('status', $_POST['status_plus']);
            $this->db->set('updated_at', date("Y-m-d h:i:s"));
            $this->db->set('updated_by', $this->session->userdata('username'));
            $this->db->where('id', $_POST['id_m_barang_plus']);
            $result = $this->db->update('m_barang_plus');
        }
        // QTY PLUS
        else if($_POST['qty_plus'] <> 0){
            $data_plus = array(
                'id_m_nota' => $_POST['supplier'],
                'tgl_masuk' => $_POST['tgl'],
                'tgl_bayar' => $_POST['tgl_byr'],
                'id_m_barang' => $_POST['id'],
                'qty_plus' => $_POST['qty_plus'],
                'qty_ket' => $_POST['qty_ket'],
                'status' => $_POST['status_plus'],
                'harga' => $_POST['harga'],
                'created_by' => $this->session->userdata('username')
            );
            $result= $this->db->insert("m_barang_plus",$data_plus);
        }

        // update id barang plus di master barang
        $id = $_POST['id'];
        $id_plus = $this->db->query("SELECT id FROM m_barang_plus WHERE id_m_barang='$id' ORDER BY id DESC LIMIT 1")->row();
        $this->db->set('id_m_barang_plus', $id_plus->id);
        $this->db->where('id', $id);
        $result = $this->db->update('m_barang');

        return $result;
    }

    function hapusPembelianTerakhir(){

    }

    function update_load_supplier(){
        
        $this->db->set('nama_supplier', $_POST['supplier']);
        $this->db->set('ppn', $_POST['ppn']);
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
     $users = $this->db->query("SELECT CONCAT(pimpinan, ' | ', nm_perusahaan) AS cc,a.* FROM m_perusahaan a
     WHERE pimpinan like '%$searchTerm%' or nm_perusahaan like '%$searchTerm%' ORDER BY pimpinan ")->result_array();

     // Initialize Array with fetched data
     $data = array();
     foreach($users as $user){
        $data[] = array(
            "id"=>$user['id'], 
            "text"=>$user['cc'],
            "nama_perusahaan"=>$user['nm_perusahaan'],
            "pimpinan"=>$user['pimpinan'], 
            "no_telp"=>$user['no_telp'], 
            "npwp"=>$user['npwp'], 
            "alamat"=>$user['alamat']
        );
     }
     return $data;
    }

    function listCustPl($searchTerm="",$id=""){
        $users = $this->db->query("SELECT CONCAT(pimpinan, ' | ', nm_perusahaan) AS cc,a.* FROM m_perusahaan a
        WHERE (pimpinan LIKE '%$searchTerm%' OR nm_perusahaan LIKE '%$searchTerm%') AND laporan LIKE '%$id%'
        ORDER BY pimpinan ")->result_array();
   
        $data = array();
        foreach($users as $user){
           $data[] = array(
               "id"=>$user['id'], 
               "text"=>$user['cc'],
               "nama_perusahaan"=>$user['nm_perusahaan'],
               "pimpinan"=>$user['pimpinan'], 
               "no_telp"=>$user['no_telp'], 
               "npwp"=>$user['npwp'], 
               "alamat"=>$user['alamat']
           );
        }
        return $data;
       }

    function list_pl($searchTerm="",$no_inv=""){
        // satu nota
        if($no_inv == "0"){
            $sql = $this->db->query("SELECT CONCAT(no_surat, ' | ',b.nm_perusahaan) AS ket,b.pimpinan,b.nm_perusahaan,b.alamat,b.npwp,b.no_telp,a.* FROM m_pl_price_list a
            INNER JOIN m_perusahaan b ON a.id_m_perusahaan=b.id
            WHERE a.data_inv = 0 AND a.no_inv = '0' AND (a.no_surat LIKE '%$searchTerm%' OR b.nm_perusahaan LIKE '%$searchTerm%')
            ORDER BY tgl DESC");
        }else if($no_inv == "1"){
            $sql = $this->db->query("SELECT CONCAT(no_inv, ' | ',b.nm_perusahaan) AS ket,b.pimpinan,b.nm_perusahaan,b.alamat,b.npwp,b.no_telp,a.* FROM m_pl_price_list a
            INNER JOIN m_perusahaan b ON a.id_m_perusahaan=b.id
            WHERE a.data_inv = 0 AND a.no_inv != '0' AND (a.no_inv LIKE '%$searchTerm%' OR b.nm_perusahaan LIKE '%$searchTerm%')
            GROUP BY a.no_inv
            ORDER BY tgl DESC");
        }else{
            $sql = "";
        }

        $users = $sql;
   
        $data = array();
        foreach($users->result_array() as $user){
            $data[] = array(
               "id"=>$user['id'], 
               "text"=>$user['ket'],
               "tgl"=>$user['tgl'],
               "no_surat"=>$user['no_surat'],
               "no_so"=>$user['no_so'],
               "no_po"=>$user['no_po'],
               "no_inv"=>$user['no_inv'],
               "up"=>$user['up'],
               "nama_perusahaan"=>$user['nm_perusahaan'],
               "pimpinan"=>$user['pimpinan'], 
               "no_telp"=>$user['no_telp'], 
               "npwp"=>$user['npwp'], 
               "alamat"=>$user['alamat'],
               "laporan"=>$user['laporan']
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

    function list_p_sj($s=""){
        $users = $this->db->query("SELECT CONCAT(no_surat, ' | ', b.nm_perusahaan) AS ket,b.nm_perusahaan,a.* FROM m_pl_price_list a
        INNER JOIN m_perusahaan b ON a.id_m_perusahaan=b.id
        WHERE (no_surat LIKE '%$s%' OR no_so LIKE '%$s%' OR b.nm_perusahaan LIKE '%$s%')
        ORDER BY no_surat ASC")->result_array();
   
        // Initialize Array with fetched data
        $data = array();
        foreach($users as $user){
           $data[] = array(
               "id"=>$user['id'],
               "text"=>$user['ket'],
               "tgl"=>$user['tgl'],
               "nm_perusahaan"=>$user['nm_perusahaan'],
               "no_surat"=>$user['no_surat'],
               "no_so"=>$user['no_so']
           );
        }
        return $data;
    }

    function load_so($s=""){
        $users = $this->db->query("SELECT CONCAT(no_surat, ' | ', no_so, ' | ', b.nm_perusahaan) AS ket,b.nm_perusahaan,a.* FROM m_pl_price_list a
        INNER JOIN m_perusahaan b ON a.id_m_perusahaan=b.id
        WHERE (no_surat LIKE '%$s%' OR no_so LIKE '%$s%' OR b.nm_perusahaan LIKE '%$s%')
        ORDER BY no_surat ASC")->result_array();
   
        // Initialize Array with fetched data
        $data = array();
        foreach($users as $user){
           $data[] = array(
               "id"=>$user['id'],
               "text"=>$user['ket'],
               "tgl"=>$user['tgl'],
               "nm_perusahaan"=>$user['nm_perusahaan'],
               "no_surat"=>$user['no_surat'],
               "no_so"=>$user['no_so']
           );
        }
        return $data;
    }

    function list_p_nota($s=""){ //
        // $users = $this->db->query("SELECT CONCAT(no_nota, ' | ', c.nm_perusahaan) AS ket,a.tgl_jt AS jt_nota,c.nm_perusahaan,b.tgl_ctk,a.* FROM m_invoice a
        // INNER JOIN m_pl_price_list b ON a.id_pl=b.id
        // INNER JOIN m_perusahaan c ON b.id_m_perusahaan=c.id
        // WHERE (no_nota LIKE '%$s%' OR b.no_po LIKE '%$s%' OR c.nm_perusahaan LIKE '%$s%')
        // ORDER BY no_nota ASC")->result_array();
        $users = $this->db->query("SELECT CONCAT(no_nota, ' | ', c.nm_perusahaan) AS ket,a.tgl_jt AS jt_nota,c.nm_perusahaan,b.tgl_ctk,a.* FROM m_invoice a
        INNER JOIN m_pl_price_list b ON a.id_pl=b.id OR a.id_pl = 0 AND a.no_inv=b.no_inv
        INNER JOIN m_perusahaan c ON b.id_m_perusahaan=c.id
        WHERE (a.no_nota LIKE '%$s%' OR a.no_inv LIKE '%$s%' OR c.nm_perusahaan LIKE '%$s%')
        GROUP BY a.id
        ORDER BY no_nota ASC")->result_array();
   
        $data = array();
        foreach($users as $user){
            if($user['tgl_ctk'] === NULL){
                $tgl_ctk = 'BELUM CETAK';
            }else{
                $tgl_ctk = $user['tgl_ctk'];
            }

           $data[] = array(
               "id"=>$user['id'],
               "text"=>$user['ket'],
               "jt_nota"=>$user['jt_nota'],
               "tgl_ctk"=>$tgl_ctk,
               "nm_perusahaan"=>$user['nm_perusahaan'],
               "no_nota"=>$user['no_nota'],
               "no_po"=>$user['no_faktur']
           );
        }
        return $data;
    }

    function list_p_cust($s=""){ //
        $users = $this->db->query("SELECT c.id,c.nm_perusahaan FROM m_invoice a
        INNER JOIN m_pl_price_list b ON a.id_pl=b.id OR a.id_pl = 0 AND a.no_inv=b.no_inv
        INNER JOIN m_perusahaan c ON b.id_m_perusahaan=c.id
        WHERE c.nm_perusahaan LIKE '%$s%'
        GROUP BY c.id,c.nm_perusahaan
        ORDER BY c.nm_perusahaan ASC")->result_array();
   
        // Initialize Array with fetched data
        $data = array();
        foreach($users as $user){
           $data[] = array(
               "id"=>$user['id'],
               "text"=>$user['nm_perusahaan'],
               "nm_perusahaan"=>$user['nm_perusahaan']
           );
        }
        return $data;
    }

    function list_supplier_nota($searchTerm=""){ //
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

    function listSuppBrng($searchTerm="",$ppn=""){
        $users = $this->db->query("SELECT a.id,b.nama_supplier,CONCAT(b.nama_supplier, ' | ', a.no_nota) AS id_n,a.no_nota FROM m_nota a
        INNER JOIN m_supplier b ON a.id_supplier=b.id
        WHERE (b.nama_supplier LIKE '%$searchTerm%' OR
        a.no_nota LIKE '%$searchTerm%') AND b.ppn LIKE '%$ppn%'
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
    $users = $this->db->query("SELECT c.id AS id_supplier,c.nama_supplier,CONCAT(a.kode_barang,' | ', a.nama_barang) AS kbnb,d.harga,a.* FROM m_barang a
    INNER JOIN m_nota b ON a.id_m_nota=b.id
    INNER JOIN m_supplier c ON b.id_supplier=c.id
    INNER JOIN m_barang_plus d ON a.id_m_barang_plus=d.id
    WHERE kode_barang LIKE '%$searchTerm%' OR nama_barang LIKE '%$searchTerm%'
    ORDER BY kode_barang ASC")->result_array();

    // Initialize Array with fetched data
    $data = array();
    foreach($users as $user){
        $data[] = array(
            // harus kasih id agar muncul
            "id" =>$user['id'],
            // "tgl" =>$user['tgl'],
            "text" =>$user['kbnb'],
            "kode_barang" =>$user['kode_barang'],
            "nama_barang" =>$user['nama_barang'],
            "merek" =>$user['merek'],
            "spesifikasi" =>$user['spesifikasi'],
            "supplier" =>$user['nama_supplier'],
            "id_supplier" =>$user['id_supplier'],
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

    function get_jatuh_tempo(){ //
        $date_now = date("Y-m-d");
        
        // ambil tanggal bayar terakhir 
        // num_rows()
        $sql_last = $this->db->query("SELECT tgl_bayar FROM m_barang_plus")->num_rows();

        if($sql_last == 0){
            $date_last = $date_now;
        }else{
            $get_last = $this->db->query("SELECT tgl_bayar FROM m_barang_plus ORDER BY tgl_bayar DESC LIMIT 1")->row();
            $date_last = $get_last->tgl_bayar;   
        }

        // $date_last = $this->db->query("SELECT tgl_bayar FROM m_barang_plus ORDER BY tgl_bayar DESC LIMIT 1")->row();

        $query = "SELECT d.nama_supplier,c.no_nota,b.kode_barang,b.nama_barang,a.* FROM m_barang_plus a
        INNER JOIN m_barang b ON a.id_m_barang=b.id
        INNER JOIN m_nota c ON b.id_m_nota=c.id
        INNER JOIN m_supplier d ON c.id_supplier=d.id
        WHERE a.tgl_bayar BETWEEN '$date_now' AND '$date_last'
        ORDER BY d.nama_supplier ASC,c.no_nota ASC,a.id_m_barang ASC,a.tgl_bayar DESC";
        return $this->db->query($query);
    }
 
}

?>
