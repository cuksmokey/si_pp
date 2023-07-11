<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("Login"));
        }
        $this->load->model('m_master');
        $this->load->model('m_fungsi');

        $this->db = $this->load->database('default', TRUE);

    }

    function Timbangan(){
    	$this->load->view('header');
        $this->load->view('Laporan/v_lap_timbangan');
        $this->load->view('footer');
    }

    function csv(){
        $this->load->view('header');
        $this->load->view('Laporan/v_lap_csv');
        $this->load->view('footer');
    }

    function print_label_pl(){
        $this->load->view('header');
        $this->load->view('Laporan/v_lap_p_label_pl');
        $this->load->view('footer');
    }

    function print_sj(){
        $this->load->view('header');
        $this->load->view('Laporan/v_surat_jalan');
        $this->load->view('footer');
    }

    function BarangMasuk(){
        $this->load->view('header');
        $this->load->view('Laporan/v_lap_brngmsk');
        $this->load->view('footer');
    }

    function DaftarHutangCash(){
        $this->load->view('header');
        $this->load->view('Laporan/v_lap_hutangcash');
        $this->load->view('footer');
    }

    function Pembelian(){
        $this->load->view('header');
        $this->load->view('Laporan/v_lap_pembelian');
        $this->load->view('footer');
    }

    function Penjualan(){
        $this->load->view('header');
        $this->load->view('Laporan/v_lap_penjualan');
        $this->load->view('footer');
    }

    function SuratOrder(){
        $this->load->view('header');
        $this->load->view('Laporan/v_lap_so');
        $this->load->view('footer');
    }

    function BukuPenerimaanManual(){
        $this->load->view('header');
        $this->load->view('Laporan/v_lap_bpm');
        $this->load->view('footer');
    }

    function LapPiutang(){
        $this->load->view('header');
        $this->load->view('Laporan/v_lap_piutang');
        $this->load->view('footer');
    }

    function LapBarangKeluar(){
        $this->load->view('header');
        $this->load->view('Laporan/v_lap_barang_keluar');
        $this->load->view('footer');
    }

    function update_stok_gudang(){
        $this->load->view('header');
        $this->load->view('Laporan/v_stok_gudang');
        $this->load->view('footer');
    }

    function update_po(){
        $this->load->view('header');
        $this->load->view('Laporan/v_update_po');
        $this->load->view('footer');
    }

    function lap_barang(){
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $jenis = $_GET['jenis'];
        $opsi = $_GET['opsi'];
        $ctk = $_GET['ctk'];

        $html = '';
        //$this->m_fungsi->tanggal_format_indonesia($data_pl->tgl)

        if($tgl1 == $tgl2){
            $ttgl = $this->m_fungsi->tanggal_format_indonesia($tgl1);
            $wtgl = "AND a.tgl_masuk = '$tgl1'";
        }else{
            $ttgl = $this->m_fungsi->tanggal_format_indonesia($tgl1).' S/D '.$this->m_fungsi->tanggal_format_indonesia($tgl2);
            $wtgl = "AND a.tgl_masuk BETWEEN '$tgl1' AND '$tgl2'";
        }

        // JUDUL
        $judul = 'LAPORAN BARANG TANGGAL '.strtoupper($ttgl);

        // content
        $html .= '<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
            <tr>
                <th style="border:0;width:4%;padding:0"></th>
                <th style="border:0;width:26%;padding:0"></th>
                <th style="border:0;width:10%;padding:0"></th>
                <th style="border:0;width:22%;padding:0"></th>
                <th style="border:0;width:6%;padding:0"></th>
                <th style="border:0;width:8%;padding:0"></th>
                <th style="border:0;width:12%;padding:0"></th>
                <th style="border:0;width:12%;padding:0"></th>
            </tr>';
        
        // opsi
        if($opsi == 0){ // semua
            $where = '';
            $wKop = "NOTA PEMBELIAN BARANG KESELURUHAN";
        }else if($opsi == 1){ // persupplier
            $where = "AND c.id='$jenis'";
            $wKop = "NOTA PEMBELIAN BARANG PER SUPPLIER";
        }else if($opsi == 2){ // persupplier no nota
            $where = "AND b.id='$jenis'";
            $wKop = "NOTA PEMBELIAN BARANG PER NOTA SUPPLIER";
        }else{
            $where = '';
            $wKop = "TOTAL PEMBELIAN";
        }

        // KOP
        $html .= '<tr>
            <td style="border:0;padding:0;font-weight:bold;text-align:center" colspan="8">LAPORAN '.$wKop.'</td>
        </tr>
        <tr>
            <td style="border:0;padding:0 0 5px;font-weight:bold;text-align:center;text-transform:uppercase" colspan="8">TANGGAL '.$ttgl.'</td>
        </tr>';

        // AMBIL DATA PER NOTA SUPPLIER
        $sqlPerSupplier = $this->db->query("SELECT c.nama_supplier,b.no_nota,a.* FROM m_barang_plus a
        INNER JOIN m_nota b ON a.id_m_nota=b.id
        INNER JOIN m_supplier c ON b.id_supplier=c.id
        INNER JOIN m_barang d ON a.id_m_barang=d.id $where $wtgl
        -- GROUP BY a.id_m_nota
        GROUP BY a.id_m_nota,a.tgl_masuk,a.tgl_jt_tempo
        ORDER BY a.id_m_nota ASC");

        foreach($sqlPerSupplier->result() as $r) {
            $html .= '<tr>
                <td style="border:1px solid #000;background:#ddd;padding:5px;font-weight:bold" colspan="3">Nama Supplier : '.$r->nama_supplier.'</td>
                <td style="border:1px solid #000;background:#ddd;padding:5px;font-weight:bold" colspan="2">No. Nota : '.$r->no_nota.'</td>
                <td style="border:1px solid #000;background:#ddd;padding:5px;font-weight:bold" colspan="3">Tanggal Nota : '.$this->m_fungsi->tanggal_format_indonesia($r->tgl_masuk).'</td>
            </tr>
            <tr>
                <td style="border:1px solid #000;background:#ddd;padding:5px;font-weight:bold;text-align:center">No</td>
                <td style="border:1px solid #000;background:#ddd;padding:5px;font-weight:bold;text-align:center">Nama Barang</td>
                <td style="border:1px solid #000;background:#ddd;padding:5px;font-weight:bold;text-align:center">Merek</td>
                <td style="border:1px solid #000;background:#ddd;padding:5px;font-weight:bold;text-align:center">Spesifikasi</td>
                <td style="border:1px solid #000;background:#ddd;padding:5px;font-weight:bold;text-align:center">Qty</td>
                <td style="border:1px solid #000;background:#ddd;padding:5px;font-weight:bold;text-align:center">Satuan</td>
                <td style="border:1px solid #000;background:#ddd;padding:5px;font-weight:bold;text-align:center">Harga Satuan</td>
                <td style="border:1px solid #000;background:#ddd;padding:5px;font-weight:bold;text-align:center">Harga Total</td>
            </tr>';

            // AMBIL TANGGAL JATUH TEMPO
            $getTglJtTempo = $this->db->query("SELECT a.* FROM m_barang_plus a
            WHERE id_m_nota='$r->id_m_nota' AND tgl_masuk='$r->tgl_masuk' AND tgl_jt_tempo='$r->tgl_jt_tempo'
            GROUP BY tgl_jt_tempo ASC");
            
            foreach($getTglJtTempo->result() as $r1){
                // AMBIL ISI DATA PER NOTA SUPPLIER
                $getIsiPerSupplier = $this->db->query("SELECT d.nama_barang,d.merek,d.spesifikasi,a.* FROM m_barang_plus a
                INNER JOIN m_nota b ON a.id_m_nota=b.id
                INNER JOIN m_supplier c ON b.id_supplier=c.id
                INNER JOIN m_barang d ON a.id_m_barang=d.id
                WHERE a.id_m_nota='$r1->id_m_nota' AND a.tgl_masuk='$r1->tgl_masuk' AND a.tgl_jt_tempo='$r1->tgl_jt_tempo'
                ORDER BY d.nama_barang ASC");
    
                $ii = 0;
                $totTot = 0;
                foreach($getIsiPerSupplier->result() as $r2){
                    $ii++;
                    $tot = $r2->qty_plus * $r2->harga;
    
                    $html .= '<tr>
                        <td style="border:1px solid #000;padding:5px;text-align:center">'.$ii.'</td>
                        <td style="border:1px solid #000;padding:5px">'.$r2->nama_barang.'</td>
                        <td style="border:1px solid #000;padding:5px">'.$r2->merek.'</td>
                        <td style="border:1px solid #000;padding:5px">'.$r2->spesifikasi.'</td>
                        <td style="border:1px solid #000;padding:5px">'.number_format($r2->qty_plus).'</td>
                        <td style="border:1px solid #000;padding:5px">'.$r2->qty_ket.'</td>
                        <td style="border:1px solid #000;padding:5px;text-align:right">Rp. '.number_format($r2->harga).'</td>
                        <td style="border:1px solid #000;padding:5px;text-align:right">Rp. '.number_format($tot).'</td>
                    </tr>';
    
                    $totTot += $tot;
                }
            }

            // TOTAL PEMBELIAN
            $html .= '<tr>
                <td style="border:1px solid #000;padding:5px" colspan="3">Jatuh Tempo : '.$this->m_fungsi->tanggal_format_indonesia($r1->tgl_jt_tempo).'</td>
                <td style="border:1px solid #000;padding:5px;font-weight:bold;text-align:right;font-style:italic" colspan="4">Total Pembelian</td>
                <td style="border:1px solid #000;padding:5px;font-weight:bold;text-align:right;font-style:italic">Rp. '.number_format($totTot).'</td>
            </tr>';
        }

        $html .= '</table>';

        if($ctk == 0){
            $this->m_fungsi->mPDFL($html);
        }else if($ctk == 1){
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=$judul.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $data2['prev']= $html;
            $this->load->view('view_excel', $data2);
        }

    }

    function lap_total_pembelian(){ //
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $jenis = $_GET['jenis'];
        $ctk = $_GET['ctk'];

        $html = '';
        //$this->m_fungsi->tanggal_format_indonesia($data_pl->tgl)

        if($tgl1 == $tgl2){
            $ttgl = $this->m_fungsi->tanggal_format_indonesia($tgl1);
        }else{
            $ttgl = $this->m_fungsi->tanggal_format_indonesia($tgl1).' S/D '.$this->m_fungsi->tanggal_format_indonesia($tgl2);
        }

        // JUDUL
        $judul = 'LAPORAN TOTAL PEMBELIAN TANGGAL '.strtoupper($ttgl);

        if($ctk == 0){
            $s_cp = '';
        }else if($ctk == 1){
            $s_cp = 'colspan="5"';
        }

        $html .= '<table cellspacing="0" style="font-size:12px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;text-align:center;font-family:Arial !important">
            <tr>
                <th '.$s_cp.'>LAPORAN TOTAL PEMBELIAN</th>
            </tr>
            <tr>
                <th '.$s_cp.'>TANGGAL '.strtoupper($ttgl).'</th>
            </tr>
        </table>';

        // content
        $html .= '<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
            <tr>
                <th style="border:0;width:5%;padding:5px"></th>
                <th style="border:0;width:16%;padding:5px"></th>
                <th style="border:0;width:29%;padding:5px"></th>
                <th style="border:0;width:20%;padding:5px"></th>
                <th style="border:0;width:30%;padding:5px"></th>
            </tr>
            <tr>
                <td style="border:1px solid #000;padding:5px;text-align:center;font-weight:bold">No.</td>
                <td style="border:1px solid #000;padding:5px;text-align:center;font-weight:bold">Tanggal</td>
                <td style="border:1px solid #000;padding:5px;text-align:center;font-weight:bold" colspan="2">Nama Barang</td>
                <td style="border:1px solid #000;padding:5px;text-align:center;font-weight:bold">Total Pembelian</td>
            </tr>';
        
        if($jenis == 0){
            $where = '';
        }else if($jenis <> 0){
            $where = "AND a.id_m_nota='$jenis'";
        }

        $sql_supp = $this->db->query("SELECT c.nama_supplier,b.no_nota,a.* FROM m_barang a
        INNER JOIN m_nota b ON a.id_m_nota=b.id
        INNER JOIN m_supplier c ON b.id_supplier=c.id
        WHERE tgl BETWEEN '$tgl1' AND '$tgl2' $where
        GROUP BY a.id_m_nota
        ORDER BY c.nama_supplier ASC,b.no_nota ASC,tgl ASC");

        $i = 0;
        foreach($sql_supp->result() as $r){
            $i++;
            $html .= '<tr>
                <td style="border:1px solid #000;padding:5px;font-weight:bold;text-align:center">'.$i.'</td>
                <td style="border:1px solid #000;border-width:1px 0 1px 1px;padding:5px;font-weight:bold" colspan="2">SUPPLIER : '.$r->nama_supplier.'</td>
                <td style="border:1px solid #000;border-width:1px 1px 1px 0;padding:5px;font-weight:bold" colspan="2">NO. NOTA : '.$r->no_nota.'</td>
            </tr>';

            // tampil data barang plus
            $sql_nm_b = $this->db->query("SELECT (SELECT SUM(harga) FROM m_barang_plus d WHERE a.id=d.id_m_barang AND a.id_m_nota=b.id) AS tot_harga,a.* FROM m_barang a
            INNER JOIN m_nota b ON a.id_m_nota=b.id
            INNER JOIN m_supplier c ON b.id_supplier=c.id
            WHERE tgl BETWEEN '$tgl1' AND '$tgl2' AND a.id_m_nota='$r->id_m_nota'
            GROUP BY a.id
            ORDER BY c.nama_supplier ASC,b.no_nota ASC,tgl ASC");

            $ii = 0;
            $sum_harga = 0;
            foreach($sql_nm_b->result() as $r){
                $ii++;
                $html .= '<tr>
                    <td style="border:1px solid #000;border-width:0 1px;padding:5px;text-align:center">'.$ii.'</td>
                    <td style="border:1px solid #000;padding:5px 2px;text-align:center">'.$this->m_fungsi->tanggal_format_indonesia($r->tgl).'</td>
                    <td style="border:1px solid #000;padding:5px" colspan="2">'.$r->nama_barang.'</td>
                    <td style="border:1px solid #000;padding:5px;text-align:right">Rp. '.number_format($r->tot_harga).'</td>
                </tr>';

                $sum_harga += $r->tot_harga;
            }

            // total
            $html.= '<tr>
                <td style="border:1px solid #000;border-width:0 1px 1px"></td>
                <td style="border:1px solid #000;border-width:0 1px 1px;padding:5px;text-align:center;font-weight:bold" colspan="3">TOTAL KESELURUHAN PEMBELIAN</td>
                <td style="border:1px solid #000;border-width:0 1px 1px;padding:5px;font-weight:bold;text-align:right">Rp. '.number_format($sum_harga).'</td>
            </tr>';
        }

        $html .= '</table>';

        if($ctk == 0){
            $this->m_fungsi->_mpdf2('',$html,10,10,10,'P');
        }else if($ctk == 1){
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=$judul.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $data2['prev']= $html;
            $this->load->view('view_excel', $data2);            
        }

    }

    function Surat_Jalan(){
        //
        $jenis = $_GET['jenis'];
        $ctk = $_GET['ctk'];
        // $pt = $_GET['pt'];

        $html = '';

        $sql_kop = $this->db->query("SELECT b.nm_perusahaan,b.npwp,b.alamat,a.* FROM m_pl_price_list a
        INNER JOIN m_perusahaan b ON a.id_m_perusahaan = b.id
        WHERE a.id='$jenis'")->row();

        // KOP
        if($sql_kop->laporan == "sma" || $sql_kop->laporan == ""){
            // $jpg = "http://localhost/si_pp/assets/images/logo_sma.jpg";
            // $jpg = "http://sinarmuktiabadi.com/assets/images/logo_sma.jpg";
            $jpg = "http://sinarmuktiabadi.com/assets/images/logo_sma.jpg";
            $top = 'top';
            $px = '0 0 70px';
            $dd = '5px 0';
        }else if($sql_kop->laporan == "st"){
            // $jpg = "http://localhost/si_pp/assets/images/logo_st.jpg";
            // $jpg = "http://sinarmuktiabadi.com/assets/images/logo_st.jpg"; sinarmukti.com
            $jpg = "http://sinarmuktiabadi.com/assets/images/logo_st.jpg";
            $top = 'top';
            $px = '0 0 80px';
            $dd = '0';
        }
        
        $html .= '<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
            <tr>
                <th style="border:0;width:15%;padding:0"></th>
                <th style="border:0;width:1%;padding:0"></th>
                <th style="border:0;width:51%;padding:0"></th>
                <th style="border:0;width:8%;padding:0"></th>
                <th style="border:0;width:25%;padding:0"></th>
            </tr>
            <tr>
                <td style="background:url('.$jpg.')'.$top.' center no-repeat;border:0;padding:'.$px.';z-index:2" colspan="3"></td>
                <td style="border:0;padding:18px 0 0;font-weight:bold;text-align:center;font-size:14px !important" colspan="2">SURAT JALAN</td>
            </tr>
            <tr>
                <td style="border:0;padding:'.$dd.'" colspan="4"></td>
            </tr>
            <tr>
                <td style="border:0;padding:1px 0">No Surat Jalan</td>
                <td style="border:0;padding:1px 0">:</td>
                <td style="border:0;padding:1px 0">'.$sql_kop->no_surat.'</td>
                <td style="border:0;padding:1px 0">Tanggal</td>
                <td style="border:0;padding:1px 0">: '.$this->m_fungsi->tanggal_format_indonesia($sql_kop->tgl).'</td>
            </tr>
            <tr>
                <td style="border:0;padding:1px 0">Kepada</td>
                <td style="border:0;padding:1px 0">:</td>
                <td style="border:0;padding:1px 0">'.$sql_kop->nm_perusahaan.'</td>
                <td style="border:0;padding:1px 0" colspan="2">Up. '.$sql_kop->up.'</td>
                <td></td>
            </tr>
            <tr>
                <td style="border:0;padding:1px 0">Alamat</td>
                <td style="border:0;padding:1px 0">:</td>
                <td style="border:0;padding:1px 5px 1px 0" colspan="3">'.$sql_kop->alamat.'</td>
            </tr>
        </table>';

        // DETAIL
        $html .= '<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">';

        $html .= '<tr>
            <th style="padding:2px;border:0;width:5%"></th>
            <th style="padding:2px;border:0;width:30%"></th>
            <th style="padding:2px;border:0;width:15%"></th>
            <th style="padding:2px;border:0;width:30%"></th>
            <th style="padding:2px;border:0;width:10%"></th>
            <th style="padding:2px;border:0;width:10%"></th>
        </tr>
        <tr>
            <td style="padding:5px 0;border:1px solid #000;text-align:center;font-weight:bold">No</td>
            <td style="padding:5px 0;border:1px solid #000;text-align:center;font-weight:bold" colspan="3">Nama Barang</td>
            <td style="padding:5px 0;border:1px solid #000;text-align:center;font-weight:bold">Qty</td>
            <td style="padding:5px 0;border:1px solid #000;text-align:center;font-weight:bold">Satuan</td>
        </tr>';

        // isinya
        $sql_isi = $this->db->query("SELECT b.nama_barang,b.merek,b.spesifikasi,a.* FROM m_pl_list_barang a
        INNER JOIN m_barang b ON a.id_m_barang = b.id
        WHERE id_pl='$jenis'
        GROUP BY b.kode_barang
        ORDER BY b.merek ASC");

        $i = 0;
        foreach($sql_isi->result() as $r){
            $i++;
            $html .= '<tr>
                <td style="vertical-align:middle;padding:5px;border:1px solid #000;text-align:center">'.$i.'</td>
                <td style="vertical-align:middle;padding:5px;border:1px solid #000" colspan="3">'.$r->merek.' '.$r->nama_barang.' '.$r->spesifikasi.'</td>
                <td style="vertical-align:middle;padding:5px 2px;border:1px solid #000;text-align:center">'.$r->qty.'</td>
                <td style="vertical-align:middle;padding:5px 2px;border:1px solid #000;text-align:center">'.$r->qty_ket.'</td>
            </tr>';
        }

        $count = $sql_isi->num_rows();

        if($count == 1) {
            $cc = 1;
            $xx = 2;
        }
        
        if($count == $cc) {
            for($i = 0; $i < $xx; $i++){
                $html .= '<tr>
                <td style="padding:5px;border:1px solid #000;padding:11px 0"></td>
                <td style="padding:5px;border:1px solid #000;padding:11px 0" colspan="3"></td>
                <td style="padding:5px;border:1px solid #000;padding:11px 0"></td>
                <td style="padding:5px;border:1px solid #000;padding:11px 0"></td>';
            }
        }

        $html .= '</table>';

        // TANDA TANGAN //
        if($sql_kop->laporan == "sma"){
            $atn = 'Andreas Purwanto';
        }else if($sql_kop->laporan == "st"){
            $atn = 'Reza Agus';
        }

        $html .= '<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;text-align:center;font-family:Arial !important">
            <tr>
                <th style="border:0;width:50%;padding:4px 0"></th>
                <th style="border:0;width:50%;padding:4px 0"></th>
            </tr>
            <tr>
                <td>Hormat Kami</td>
                <td>Penerima</td>
            </tr>
            <tr>
                <td style="border:0;padding:45px 0"></td>
                <td style="border:0;padding:45px 0"></td>
            </tr>
            <tr>
                <td style="font-weight:bold">'.$atn.'</td>
                <td>____________________</td>
            </tr>
        </table>';

            // $this->m_fungsi->mPDF($html);        
            $this->m_fungsi->mPDFP2($html);        
    }

    function Nota_Penjualan(){
    // CETAK NOTA PENJUALAN
    $jenis = $_GET['jenis'];
    $ctk = $_GET['ctk'];
    $tgl_ctk = $_GET['tgl_ctk'];
    // $pt = $_GET['pt'];

    $html = '';

    // $sql_kop = $this->db->query("SELECT b.no_surat,b.no_po,b.up,b.laporan,a.tgl_jt,c.nm_perusahaan,c.npwp,c.alamat,a.* FROM m_invoice a
    // INNER JOIN m_pl_price_list b ON a.id_pl=b.id
    // INNER JOIN m_perusahaan c ON b.id_m_perusahaan=c.id
    // WHERE a.id='$jenis'")->row();
    $sql_kop = $this->db->query("SELECT b.no_surat,b.no_po,b.laporan,a.tgl_jt,c.nm_perusahaan,c.npwp,c.alamat,a.* FROM m_invoice a
    INNER JOIN m_pl_price_list b ON a.id_pl=b.id OR a.id_pl = 0 AND a.no_inv=b.no_inv
    INNER JOIN m_perusahaan c ON b.id_m_perusahaan=c.id
    WHERE a.id='$jenis'")->row();

    // kondisi jika ada no invoice
    if($sql_kop->id_pl == 0){
        $wPlInv = "d.no_inv='$sql_kop->no_inv'" ;
        $noInv = "no_inv";
        $plInv = $sql_kop->no_inv;
    }else{
        $wPlInv = "a.id_pl='$sql_kop->id_pl'";
        $noInv = "id";
        $plInv = $sql_kop->id_pl;
    }

    // update tanggal cetak
    $data_pl_u =  $this->m_master->get_data_one("m_pl_price_list", $noInv, $plInv)->result();
    foreach($data_pl_u as $r){
        if($r->no_inv == 0){
            $www = $r->id;
        }else{
            $www = $r->no_inv;
        }

        $data = array(
            'tgl_ctk' => $tgl_ctk
        );
        $this->db->where($noInv, $www);
        $this->db->update('m_pl_price_list', $data);
    }

    // KOP
    if($sql_kop->laporan == "sma" || $sql_kop->laporan == ""){
        // $jpg = "http://localhost/si_pp/assets/images/logo_sma.jpg";
        // $jpg = "http://sinarmuktiabadi.com/assets/images/logo_sma.jpg";
        $jpg = "http://sinarmuktiabadi.com/assets/images/logo_sma.jpg";
        $top = 'top';
        $px = '0 0 70px';
    }else if($sql_kop->laporan == "st"){
        // $jpg = "http://localhost/si_pp/assets/images/logo_st.jpg";
        // $jpg = "http://sinarmuktiabadi.com/assets/images/logo_st.jpg";
        $jpg = "http://sinarmuktiabadi.com/assets/images/logo_st.jpg";
        $top = 'top';
        $px = '0 0 80px';
    }

        # # # # # # # # # # # # # KOP # # # # # # # # # # # # #

        if($sql_kop->laporan == "st"){
            $npwp = '';
            $kop_nota = 'N O T A
            <br><div style="font-weight:normal;font-size:12px !important">Klaten, '.$this->m_fungsi->tanggal_format_indonesia($tgl_ctk).'
            <br/>Yth. '.$sql_kop->nm_perusahaan.'
            <br/>Up. '.$sql_kop->up.'
            <br/>'.$sql_kop->alamat.'
            </div>';
            $dd = '0';
        }else if($sql_kop->laporan == "sma"){
            $npwp = 'NPWP : '.$sql_kop->npwp;
            $kop_nota = 'NOTA PENJUALAN';
            $dd = '0 0 0 65px';
        }

        $html .= '<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
        <tr>
        <th style="border:0;width:13%;padding:0"></th>
        <th style="border:0;width:1%;padding:0"></th>
        <th style="border:0;width:41%;padding:0"></th>
        <th style="border:0;width:45%;padding:0"></th>
        </tr>
        <tr>
        <td style="border:0;background:url('.$jpg.')'.$top.' center no-repeat;padding:'.$px.'" colspan="3"></td>
        <td style="border:0;padding:'.$dd.';font-weight:bold;font-size:14px !important">'.$kop_nota.'</td>
        </tr>';

        if($sql_kop->laporan == "st"){
            $html .='';
            $html .='<tr>
            <td style="border:0;padding:0 0 1px">No. Nota</td>
            <td style="border:0;padding:0 0 1px">:</td>
            <td style="border:0;padding:0 0 1px 5px 0 0">'.$sql_kop->no_nota.'</td>
            <td style="border:0;padding:0 0 1px">No. PO: '.$sql_kop->no_po.'</td>
            </tr>';
        }else if($sql_kop->laporan == "sma"){
            if($sql_kop->up == ""){
                $upup = "";
            }else{
                $upup = 'Up. '.$sql_kop->up;
            }

            $html .='<tr>
            <td style="padding:2px 0 0" colspan="3">Kepoh RT 003 RW 007 Bowan, Delanggu, Klaten</td>
            <td></td>
            </tr>';
            $html .='<tr>
            <td style="border:0;padding:2px 0" colspan="4"></td>
            </tr>
            <tr>
            <td style="padding:1px 0">No. Nota</td>
            <td style="padding:1px 0">:</td>
            <td style="padding:1px 0">'.$sql_kop->no_nota.'</td>
            <td style="padding:1px 0">'.$npwp.'</td>
            </tr>
            <tr>
            <td style="padding:1px 0">Kepada</td>
            <td style="padding:1px 0">:</td>
            <td style="padding:1px 0">'.$sql_kop->nm_perusahaan.'</td>
            <td style="padding:1px 0">'.$upup.'</td>
            <td></td>
            </tr>
            <tr>
            <td style="padding:1px 0">Alamat</td>
            <td style="padding:1px 0">:</td>
            <td style="padding:1px 0" colspan="2">'.$sql_kop->alamat.'</td>
            </tr>
            <tr>
            <td style="padding:1px 0">No. PO</td>
            <td style="padding:1px 0">:</td>
            <td style="padding:1px 0 0 0">'.$sql_kop->no_po.'</td>
            <td></td>
            </tr>';
        }   

        $html .='</table>';

                # # # # # # # # # # # # # I S I # # # # # # # # # # # # #

        $html .= '<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
        <tr>
        <th style="border:0;width:5%;padding:0"></th>
        <th style="border:0;width:22%;padding:0"></th>
        <th style="border:0;width:11%;padding:0"></th>
        <th style="border:0;width:22%;padding:0"></th>
        <th style="border:0;width:5%;padding:0"></th>
        <th style="border:0;width:5%;padding:0"></th>
        <th style="border:0;width:15%;padding:0"></th>
        <th style="border:0;width:15%;padding:0"></th>
        </tr>
        <tr>
        <td style="border:1px solid #000;padding:5px 3px;text-align:center;font-weight:bold">No</td>
        <td style="border:1px solid #000;padding:5px 3px;text-align:center;font-weight:bold" colspan="3">Nama Barang</td>
        <td style="border:1px solid #000;padding:5px 3px;text-align:center;font-weight:bold" colspan="2">Qty</td>
        <td style="border:1px solid #000;padding:5px 3px;text-align:center;font-weight:bold">Satuan (Rp.)</td>
        <td style="border:1px solid #000;padding:5px 3px;text-align:center;font-weight:bold">Jumlah (Rp.)</td>
        </tr>';

        // isinya
        $sql_isi = $this->db->query("SELECT c.nama_barang,c.merek,c.spesifikasi,SUM(a.qty) AS i_qty,SUM(a.harga_invoice) AS i_harga_invoice,a.*FROM m_pl_list_barang a
        INNER JOIN m_pl_price_list b ON a.id_pl=b.id
        INNER JOIN m_barang c ON a.id_m_barang=c.id
        INNER JOIN m_invoice d ON d.id_pl=b.id OR d.id_pl = 0 AND d.no_inv=b.no_inv
        WHERE $wPlInv
        GROUP BY c.id
        ORDER BY c.merek ASC");

        $ii = 0;
        $sub_tot = 0;
        foreach($sql_isi->result() as $r){
            $ii++;
            $tot_hrg = $r->i_qty * $r->i_harga_invoice;
            $html .= '<tr>
                <td style="vertical-align:middle;border:1px solid #000;padding:5px 2px;text-align:center">'.$ii.'</td>
                <td style="vertical-align:middle;border:1px solid #000;padding:5px 3px" colspan="3">'.$r->merek.' '.$r->nama_barang.' '.$r->spesifikasi.'</td>
                <td style="vertical-align:middle;border:1px solid #000;border-width:1px 0 1px 1px;padding:5px 2px;text-align:center" colspan="2">'.$r->i_qty.' '.$r->qty_ket.'</td>
                <td style="vertical-align:middle;border:1px solid #000;padding:5px 3px;text-align:right">'.number_format($r->harga_invoice).'</td>
                <td style="vertical-align:middle;border:1px solid #000;padding:5px 3px;text-align:right">'.number_format($tot_hrg).'</td>
            </tr>';

            $sub_tot += $tot_hrg;
        }

        # # # # # # # # # # # # # SUB TOTAL - PPN - ONGKIR - TOTAL # # # # # # # # # # # # #

        if($sql_kop->laporan == "st" || $sql_kop->laporan == "") {
            $tot_all = round($sub_tot + $sql_kop->ongkir);
            $rs = '2';
            $html .= '';
            $t_td = '';
        }else if($sql_kop->laporan == "sma") {
	// $ppn = round($sub_tot * 0.1);
	$ppn = round($sub_tot * 0.11);
            $tot_all = round($sub_tot + $ppn);
            $rs = '2';
            $t_td = '<td style="border:0;padding:5px 5px 5px 0" colspan="6">Klaten, '.$this->m_fungsi->tanggal_format_indonesia($tgl_ctk).'</td>';
        }

        // fungsi terbilang
        $html .= '<tr>
        <td style="border:0;padding:3px 3px 0 0" colspan="6" rowspan="'.$rs.'">Terbilang : <b><i>'.ucwords($this->m_fungsi->terbilang($tot_all)).'</i></b></td>
        <td style="border:1px solid #000;padding:5px;text-align:right;font-weight:bold">Sub Total</td>
        <td style="border:1px solid #000;padding:5px;text-align:right;font-weight:bold">'.number_format($sub_tot).'</td>
        </tr>';

        // ppn
        if($sql_kop->laporan == "st") {
            $html .= '';
            $nm_ttd = 'Pembayaran mohon ditransfer ke BCA
            <br/>Rekening : 079.0302.231
            <br/>Atas Nama : Niken Pangastuti - Cabang Pasar Legi';
        }else if($sql_kop->laporan == "sma") {
            $html .='<tr>
            <td style="border:1px solid #000;padding:4px 5px;text-align:right;font-weight:bold">PPN</td>
            <td style="border:1px solid #000;padding:4px 5px;text-align:right;font-weight:bold">'.number_format($ppn).'</td>
            </tr>';
        }

        // ongkir + total all
        if($sql_kop->laporan == "st"){
            if($sql_kop->ongkir == 0){
                $ongkirr = '-';
            }else{
                $ongkirr = number_format($sql_kop->ongkir);
            }

            $html .='<tr>
            '.$t_td.'
                <td style="border:1px solid #000;padding:4px 5px;text-align:right;font-weight:bold">Ongkir</td>
                <td style="border:1px solid #000;padding:4px 5px;text-align:right;font-weight:bold">'.$ongkirr.'</td>
            </tr>';
            $html.='<tr>
                <td style="border:0;padding:0" colspan="6" rowspan="2">'.$nm_ttd.'</td>
                <td style="border:1px solid #000;padding:4px 5px;text-align:right;font-weight:bold">Grand Total</td>
                <td style="border:1px solid #000;padding:4px 5px;text-align:right;font-weight:bold">'.number_format($tot_all).'</td>
            </tr>';
        }else if($sql_kop->laporan == "sma"){
            $html .='<tr>
            '.$t_td.'
            <td style="border:1px solid #000;padding:4px 5px;text-align:right;font-weight:bold">Grand Total</td>
            <td style="border:1px solid #000;padding:4px 5px;text-align:right;font-weight:bold">'.number_format($tot_all).'</td>
            </tr>';
        }

        # # # # # # # # # # # # # TANDA TANGAN # # # # # # # # # # # # # 

        if($sql_kop->laporan == "st") {
            $html .= '';

            $html .= '<tr>
            <td style="border:0;padding:12px" colspan="2"></td>
            </tr>';

            $html .= '<tr>
            <td style="border:0;padding:3px 0 0;text-align:center" colspan="4">Penerima</td>
            <td style="border:0;padding:3px 0 0;text-align:center" colspan="4">Hormat Kami,</td>
            </tr>
            <tr>
            <td style="border:0;padding:40px 0" colspan="2"></td>
            <td style="border:0;padding:40px 0" colspan="4"></td>
            </tr>
            <tr>
            <td style="border:0;padding:0 0 5px;text-align:center" colspan="4">_____________________</td>
            <td style="border:0;padding:0 0 5px;text-align:center" colspan="4">Niken Pangastuti</td>
            </tr>
            ';
        }else if($sql_kop->laporan == "sma") {
            $no_faktur = 'No Faktur Pajak<br/>'.$sql_kop->no_faktur.'';
            $nm_ttd = 'Andreas Purwanto<br/>Bank : BRI KCP DELANGGU-KLATEN A/C : 2055 - 01 - 000246 - 30 - 0 A/N : SINAR MUKTI ABADI';

            $html .= '<tr>
            <td style="border:0;padding:1px" colspan="2"></td>
            </tr>';

            $html .='<tr>
            <td style="border:0;padding:0;color:#fff" colspan="6">.</td>
            <td style="border:0;padding:0" colspan="2" rowspan="2">'.$no_faktur.'</td>
            </tr>
            <tr>
            <td style="border:0;padding:0" colspan="3"></td>
            </tr>
            <tr>
            <td style="border:0;padding:55px 0 0" colspan="8">'.$nm_ttd.'</td>
            </tr>';
        }

        $html .= '</table>';

        // $this->m_fungsi->mPDF($html);
        $this->m_fungsi->mPDFP2($html);
    }

    function print_update_po(){
        $jenis = $_GET['jenis'];
        $ctk = $_GET['ctk'];

        $html = '';

        // ambil kop
        $poMas_kop = $this->db->query("SELECT b.id,b.nm_perusahaan FROM po_master a 
            INNER JOIN m_perusahaan b ON a.id_perusahaan = b.id
            WHERE b.id='$jenis'
            GROUP BY b.id,b.nm_perusahaan")->row();

        $html .= '<table style="margin:0;padding:0;font-size:14px;font-weight:bold;color:#000;width:100%;border-collapse:collapse">
                    <tr>
                        <td style="border:1px solid #000">OUTSTANDING PO '.$poMas_kop->nm_perusahaan.'</td>
                    </tr>
                </table>';

        // ambil no po
        $q_no_po = $this->db->query("SELECT id_perusahaan,tgl,no_po FROM po_master
        WHERE id_perusahaan='$jenis'
        GROUP BY no_po
        ORDER BY no_po ASC");

        $i = 0;
        foreach($q_no_po->result() as $r){
            $i++;
            $html .= '<table style="margin:0;padding:0;font-size:11px;font-weight:bold;color:#000;width:100%;border-collapse:collapse">
                <tr>
                    <th style="border:1px solid #000;width:4%;padding:3px"></th>
                    <th style="border:1px solid #000;width:4%;padding:3px"></th>
                    <th style="border:1px solid #000;width:15%;padding:3px"></th>
                    <th style="border:1px solid #000;width:77%;padding:3px"></th>
                </tr>
                <tr>
                    <td style="border:1px solid #000;padding:5px 0;text-align:center">'.$i.'</td>
                    <td style="border:1px solid #000;padding:5px" colspan="3">'.$r->no_po.'</td>
                </tr>
                <tr>
                <td style="border:1px solid #000;border-width:0 1px;padding:5px"></td>
                    <td style="border:1px solid #000;padding:5px;text-align:center">No</td>
                    <td style="border:1px solid #000;padding:5px;text-align:center">Kode Barang</td>
                    <td style="border:1px solid #000;padding:5px;text-align:center">Nama Barang</td>
                </tr>
            </table>'; 

            // ambil data kode barang
            $q_no_po = $this->db->query("SELECT a.id_perusahaan,a.kode_barang,c.nama_barang FROM po_master a
            INNER JOIN m_barang c ON a.kode_barang = c.kode_barang
            WHERE a.id_perusahaan='$r->id_perusahaan' AND a.no_po='$r->no_po'
            ORDER BY a.kode_barang ASC");

            $html .='<table style="margin:0;padding:0;font-size:11px;font-weight:bold;color:#000;width:100%;border-collapse:collapse">
            <tr>
                <th style="border:1px solid #000;border-width:0 1px;width:4%;padding:3px"></th>
                <th style="border:1px solid #000;border-width:0 1px;width:4%;padding:3px"></th>
                <th style="border:1px solid #000;border-width:0 1px;width:15%;padding:3px"></th>
                <th style="border:1px solid #000;border-width:0 1px;width:77%;padding:3px"></th>
            </tr>';

            $ii = 0;
            foreach($q_no_po->result() as $r){
                $ii++;
                $html.= '<tr>
                        <td style="border:1px solid #000;border-width:0 1px;padding:5px"></td>
                        <td style="border:1px solid #000;padding:5px;text-align:center">'.$ii.'</td>
                        <td style="border:1px solid #000;padding:5px">'.$r->kode_barang.'</td>
                        <td style="border:1px solid #000;padding:5px">'.$r->nama_barang.'</td>
                    </tr>';
            }
            $html.='</table>';
        }

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // opsi cetak
        if ($ctk == '0') {
            // pdf
            $this->m_fungsi->_mpdf('',$html,10,10,10,'P');
        }else{
            // excel
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=UPDATE_PO.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $data2['prev']= $html;
            $this->load->view('view_excel', $data2);
        }
    }

    function LapBarangMasuk(){
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $jenis = $_GET['jenis'];
        $ctk = $_GET['ctk'];
        $html = '';

        if($tgl1 == $tgl2){
            $ttgl = $this->m_fungsi->tanggal_format_indonesia($tgl1);
        }else{
            $ttgl = $this->m_fungsi->tanggal_format_indonesia($tgl1).' S/D '.$this->m_fungsi->tanggal_format_indonesia($tgl2);
        }

        // K O P
        $html .='<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
        <tr>
            <th style="border:0;padding:0 5px" colspan="10">DATA BARANG MASUK</th>
        </tr>
        <tr>
            <th style="border:0;padding:0 5px 10px" colspan="10">TANGGAL : '.strtoupper($ttgl).'</th>
        </tr>
        <tr>
            <th style="border:1px solid #000;background:#ddd;padding:5px 0;width:5%">No</th>
            <th style="border:1px solid #000;background:#ddd;padding:5px;width:8%">Tgl Masuk</th>
            <th style="border:1px solid #000;background:#ddd;padding:5px;width:18%">Nama</th>
            <th style="border:1px solid #000;background:#ddd;padding:5px;width:10%">Merek</th>
            <th style="border:1px solid #000;background:#ddd;padding:5px;width:14%">Spesifikasi</th>
            <th style="border:1px solid #000;background:#ddd;padding:5px;width:5%">Qty</th>
            <th style="border:1px solid #000;background:#ddd;padding:5px;width:6%">Satuan</th>
            <th style="border:1px solid #000;background:#ddd;padding:5px;width:18%">Supplier</th>
            <th style="border:1px solid #000;background:#ddd;padding:5px;width:10%">Harga Satuan</th>
            <th style="border:1px solid #000;background:#ddd;padding:5px;width:6%">Ket</th>
        </tr>
        ';

        if($jenis == 0){
            $where = '';
        }else{
            $where = "AND c.id='$jenis'";
        }

        // ambil data
        // $sql_isi = $this->db->query("SELECT b.nama_barang,b.merek,b.spesifikasi,d.nama_supplier,a.* FROM m_barang_plus a
        // INNER JOIN m_barang b ON b.id=a.id_m_barang
        // INNER JOIN m_nota c ON b.id_m_nota=c.id
        // INNER JOIN m_supplier d ON c.id_supplier=d.id
        // WHERE a.tgl_bayar BETWEEN '$tgl1' AND '$tgl2' $where
        // ORDER BY a.tgl_bayar ASC,b.nama_barang ASC");
        $sql_isi = $this->db->query("SELECT c.nama_supplier,b.no_nota,d.nama_barang,d.merek,d.spesifikasi,a.* FROM m_barang_plus a
        INNER JOIN m_nota b ON a.id_m_nota=b.id
        INNER JOIN m_supplier c ON b.id_supplier=c.id
        INNER JOIN m_barang d ON a.id_m_barang=d.id
        WHERE a.tgl_masuk BETWEEN '$tgl1' AND '$tgl2' $where
        ORDER BY a.tgl_masuk ASC,d.nama_barang ASC");
        

        $i = 0;
        foreach($sql_isi->result() as $r){
            $i++;
            $html .='<tr>
                <td style="border:1px solid #000;padding:5px;text-align:center">'.$i.'</td>
                <td style="border:1px solid #000;padding:5px;text-align:center">'.$this->m_fungsi->TglIndSingkat($r->tgl_masuk).'</td>
                <td style="border:1px solid #000;padding:5px;">'.$r->nama_barang.'</td>
                <td style="border:1px solid #000;padding:5px;">'.$r->merek.'</td>
                <td style="border:1px solid #000;padding:5px;">'.$r->spesifikasi.'</td>
                <td style="border:1px solid #000;padding:5px;text-align:center">'.number_format($r->qty_plus).'</td>
                <td style="border:1px solid #000;padding:5px;text-align:center">'.$r->qty_ket.'</td>
                <td style="border:1px solid #000;padding:5px;">'.$r->nama_supplier.'</td>
                <td style="border:1px solid #000;padding:5px;text-align:right">Rp. '.number_format($r->harga).'</td>
                <td style="border:1px solid #000;padding:5px;text-align:center">'.$r->status.'</td>
            </tr>';
        }

        $html .='</table>';

        $judul = 'DATA BARANG MASUK TGL '.$ttgl;

        if($ctk == 0){
            // $this->m_fungsi->mPDFB($html);
            $this->m_fungsi->mPDFL($html);
        }else if($ctk == 1){
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=$judul.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $data2['prev']= $html;
            $this->load->view('view_excel', $data2);
        }
    }

    function HutangCashSupplier(){
        $plh_nota = $_GET['nota'];
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $jenis = $_GET['jenis'];
        $ctk = $_GET['ctk'];
        $html = '';

        if($plh_nota == "pernota"){
            $harga = "SUM(a.harga) AS sumharga";
            $group = "GROUP BY a.id_m_nota,a.tgl_bayar,a.status";
            $tkop = 'PER NOTA';
        }else{
            $harga = "a.harga AS sumharga";
            $group = "";
            $tkop = '';
        }

        if($jenis == 0){
            $where = '';
        }else{
            $where = $jenis;
        }

        $sql_isi = $this->db->query("SELECT c.nama_supplier,b.no_nota,$harga,a.* FROM m_barang_plus a
        INNER JOIN m_nota b ON a.id_m_nota=b.id
        INNER JOIN m_supplier c ON b.id_supplier=c.id
        INNER JOIN m_barang d ON a.id_m_barang=d.id
        WHERE c.id LIKE '%$where%'
        $group
        ORDER BY b.no_nota ASC,a.tgl_jt_tempo ASC,a.tgl_bayar ASC,a.status ASC");

        if($jenis == 0){
            $kopp = 'SEMUA SUPPLIER';
        }else{
            $kopp = $sql_isi->row()->nama_supplier;
        }

        $date_now = date('Y-m-d');
        if($tgl1 == $tgl2){
            $ttgl = $this->m_fungsi->tanggal_format_indonesia($tgl1);
        }else{
            $ttgl = $this->m_fungsi->tanggal_format_indonesia($tgl1).' S/D '.$this->m_fungsi->tanggal_format_indonesia($tgl2);
        }

        // K O P
        $html .='<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
        <tr>
            <th style="border:0;padding:0 5px" colspan="6">PEMBELIAN DAFTAR HUTANG DAN CASH PER SUPPLIER</th>
        </tr>
        <tr>
            <th style="border:0;padding:0 5px" colspan="6">'.$kopp.' '.$tkop.'</th>
        </tr>
        <tr>
            <th style="border:0;padding:0 5px 10px" colspan="6">TANGGAL : '.strtoupper($ttgl).'</th>
        </tr>
        <tr>
            <th style="border:0;padding:0 5px 10px" colspan="6">TGL CETAK : '.strtoupper($this->m_fungsi->tanggal_format_indonesia($date_now)).'</th>
        </tr>
        <tr>
            <th style="border:1px solid #000;padding:5px;width:5%">No</th>
            <th style="border:1px solid #000;padding:5px;width:17%">No Nota</th>
            <th style="border:1px solid #000;padding:5px;width:17%">Supplier</th>
            <th style="border:1px solid #000;padding:5px;width:16%">Nota Terbilang</th>
            <th style="border:1px solid #000;padding:5px;width:14%">Tgl Bayar</th>
            <th style="border:1px solid #000;padding:5px;width:14%">Tgl Jth Tempo</th>
            <th style="border:1px solid #000;padding:5px;width:14%">Ket</th>
        </tr>
        ';

        $i = 0;
        foreach($sql_isi->result() as $r){
            $i++;
            $html .='<tr>
                <td style="border:1px solid #000;padding:4px 3px;text-align:center">'.$i.'</td>
                <td style="border:1px solid #000;padding:4px 3px;">'.$r->no_nota.'</td>
                <td style="border:1px solid #000;padding:4px 3px;">'.$r->nama_supplier.'</td>
                <td style="border:1px solid #000;padding:4px 3px;text-align:right">Rp. '.number_format($r->sumharga).'</td>';
            
            if($r->tgl_bayar == null || $r->tgl_bayar == "") {
                $tttt = '-';
            }else{
                $tttt = $this->m_fungsi->TglIndSingkat($r->tgl_bayar);
            }
            
            $t_tglbyr = $tttt;
            $t_tglJtTemp = $this->m_fungsi->TglIndSingkat($r->tgl_jt_tempo);

            if($r->tgl_jt_tempo == $date_now && $r->status == "Kredit"){
                $style = 'color:#ff8c00;font-weight:bold';
                $c_tglbayar = $t_tglbyr;
                $c_tgltempo = $t_tglJtTemp;
            }else if($r->tgl_jt_tempo <= $date_now && $r->status == "Kredit"){
                $style = 'color:#f00;font-weight:bold';
                $c_tglbayar = $t_tglbyr;
                $c_tgltempo = $t_tglJtTemp;
            }else if($r->tgl_jt_tempo >= $date_now && $r->status == "Kredit"){
                $style = 'color:#000;font-weight:bold';
                $c_tglbayar = $t_tglbyr;
                $c_tgltempo = $t_tglJtTemp;
            }else if($r->status == "Cash"){
                $style = 'color:#080;font-weight:bold';
                $c_tglbayar = $t_tglbyr;
                $c_tgltempo = $t_tglJtTemp;
            }else{
                $style = 'color:#080;font-weight:bold';
                $c_tglbayar = $t_tglbyr;
                $c_tgltempo = $t_tglJtTemp;
            }
            
            $html .='<td style="border:1px solid #000;padding:4px 3px;text-align:center">'.$c_tglbayar.'</td>
                <td style="border:1px solid #000;padding:4px 3px;text-align:center">'.$c_tgltempo.'</td>
                <td style="border:1px solid #000;padding:4px 3px;text-align:center;'.$style.'">'.$r->status.'</td>
            </tr>';
        }

        $html .='</table>';

        $judul = 'DAFTAR HUTANG DAN CASH PER SUPPLIER TGL '.$ttgl;

        if($ctk == 0){
            $this->m_fungsi->mPDFP($html);
            // $this->m_fungsi->mPDFB($html);
        }else if($ctk == 1){
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=$judul.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $data2['prev']= $html;
            $this->load->view('view_excel', $data2);
        }
    }

    function Lap_SO() { //
        $jenis = $_GET['jenis'];
        $ctk = $_GET['ctk'];
        $html = '';

        $html .='<style>
            .str{
                mso-number-format:\@;
            }
        </style>';

        // K O P
        $html .='<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
        <tr>
            <th style="border:0;padding:0 0 10px" colspan="6">SURAT ORDER (SO)</th>
        </tr>
        <tr>
            <th style="border:0;padding:0;width:14%"></th>
            <th style="border:0;padding:0;width:1%"></th>
            <th style="border:0;padding:0;width:35%"></th>
            <th style="border:0;padding:0;width:9%"></th>
            <th style="border:0;padding:0;width:1%"></th>
            <th style="border:0;padding:0;width:40%"></th>
        </tr>';

        // ambil data
        $sql_isi = $this->db->query("SELECT c.nama_barang,b.qty,b.harga_invoice,d.nm_perusahaan,d.alamat,d.no_telp,a.* FROM m_pl_price_list a
        INNER JOIN m_pl_list_barang b ON b.id_pl=a.id
        INNER JOIN m_barang c ON b.id_m_barang=c.id
        INNER JOIN m_perusahaan d ON a.id_m_perusahaan=d.id
        WHERE a.id='$jenis'
        ORDER BY c.nama_barang ASC");

        $kop = $sql_isi->row();

        // jenis laporan
        if($kop->laporan == "sma"){
            $ksmast = "Sinar Mukti Abadi";
        }else if($kop->laporan == "st"){
            $ksmast = "Sinar Teknindo";
        }else{
            $ksmast = "SMA ST";
        }

        $html .='<tr>
            <td style="padding:3px 0">Pemesan</td>
            <td style="padding:3px 0;text-align:center">:</td>
            <td style="padding:3px">'.$kop->nm_perusahaan.'</td>
            <td style="padding:3px 0">Tanggal</td>
            <td style="padding:3px 0;text-align:center">:</td>
            <td style="padding:3px">'.$this->m_fungsi->tanggal_format_indonesia($kop->tgl).'</td>
        </tr>
        <tr>
            <td style="padding:3px 0">Contact Person</td>
            <td style="padding:3px 0;text-align:center">:</td>
            <td class="str" style="padding:3px">'.$kop->no_telp.'</td>
            <td style="padding:3px 0">Nomer</td>
            <td style="padding:3px 0;text-align:center">:</td>
            <td class="str" style="padding:3px">'.$kop->no_so.'</td>
        </tr>
        <tr>
            <td style="padding:3px 0">Alamat</td>
            <td style="padding:3px 0;text-align:center">:</td>
            <td style="padding:3px">'.$kop->alamat.'</td>
            <td style="padding:3px 0" colspan="3">'.$ksmast.'</td>
        </tr>
        <tr>
            <td style="padding:5px" colspan="6"></td>
        </tr>';

        $html .='</table>';

        // isi
        $html .='<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
        <tr>
            <th style="border:1px solid #000;padding:5px;width:5%">No</th>
            <th style="border:1px solid #000;padding:5px;width:37%">Nama Barang</th>
            <th style="border:1px solid #000;padding:5px;width:10%">Qty</th>
            <th style="border:1px solid #000;padding:5px;width:14%">Harga</th>
            <th style="border:1px solid #000;padding:5px;width:11%">Disc</th>
            <th style="border:1px solid #000;padding:5px;width:11%">CM</th>
            <th style="border:1px solid #000;padding:5px 0;width:12%">Total Harga</th>
        </tr>';

        $i = 0;
        foreach($sql_isi->result() as $r){
            $i++;
            $html .='<tr>
                <td style="border:1px solid #000;padding:5px 3px;text-align:center">'.$i.'</td>
                <td style="border:1px solid #000;padding:5px 3px">'.$r->nama_barang.'</td>
                <td class="str" style="border:1px solid #000;padding:5px 3px;text-align:center">'.$r->qty.'</td>
                <td class="str" style="border:1px solid #000;padding:5px 3px;text-align:right">'.number_format($r->harga_invoice).'</td>
                <td style="border:1px solid #000;padding:5px 3px"></td>
                <td style="border:1px solid #000;padding:5px 3px"></td>
                <td style="border:1px solid #000;padding:5px 3px"></td>
            </tr>';
        }

        $html .= '</table>';

        $judul = 'SURAT ORDER - '.$kop->no_so.' - '.$kop->nm_perusahaan;

        if($ctk == 0){
            $this->m_fungsi->mPDFP($html);
            // $this->m_fungsi->mPDFN($html);
        }else if($ctk == 1){
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=$judul.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $data2['prev']= $html;
            $this->load->view('view_excel', $data2);            
        }

    }

    function Daftar_Nota(){
        $jenis = $_GET['jenis'];
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $ctk = $_GET['ctk'];
        $html = '';

        if($jenis <> 0){
            $where = "AND d.id='$jenis'";
        }else{
            $where = "";
        }

        $html .='<style>
            .str{
                mso-number-format:\@;
            }
        </style>';

        // ambil data
        $sql = $this->db->query("SELECT b.tgl_ctk,SUM(c.qty * c.harga_invoice) AS hrg_inv,a.ongkir,b.laporan,d.nm_perusahaan,a.* FROM m_invoice a
        INNER JOIN m_pl_price_list b ON b.id=a.id_pl OR a.id_pl = 0 AND a.no_inv=b.no_inv
        INNER JOIN m_pl_list_barang c ON b.id=c.id_pl
        INNER JOIN m_perusahaan d ON b.id_m_perusahaan=d.id
        WHERE a.tgl_byr BETWEEN '$tgl1' AND '$tgl2' $where
        GROUP BY a.id
        ORDER BY a.id ASC");

        if($jenis <> 0){
            $koopp = strtoupper($sql->row()->nm_perusahaan);
            $judul = "DAFTAR NOTA CUST ".$koopp;
        }else{
            $koopp = "SEMUA CUSTOMER";
            $judul = "DAFTAR NOTA ".$koopp;
        }

        // K O P
        $html .='<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
        <tr>
            <th style="border:0;padding:0" colspan="7">DAFTAR NOTA</th>
        </tr>
        <tr>
            <th style="border:0;padding:0 0 15px" colspan="7">'.$koopp.'</th>
        </tr>
        <tr>
            <th style="border:1px solid #000;padding:5px;width:5%">No</th>
            <th style="border:1px solid #000;padding:5px;width:19%">No Nota</th>
            <th style="border:1px solid #000;padding:5px;width:14%">Tgl Faktur</th>
            <th style="border:1px solid #000;padding:5px;width:14%">Nominal</th>
            <th style="border:1px solid #000;padding:5px;width:14%">Tgl Bayar</th>
            <th style="border:1px solid #000;padding:5px;width:14%">Via</th>
            <th style="border:1px solid #000;padding:5px;width:20%">Keterangan</th>
        </tr>';

        $i = 0;
        $items = 0;
        foreach($sql->result() as $r){

            if($r->via == 1){
                $via = "Cash";
            }else if($r->via == 2){
                $via = "Transfer Bank";
            }else{
                $via = "-";
            }

            // sql total inv
            $tinv = $this->db->query("SELECT SUM(c.qty) AS s_qty,SUM(c.harga_invoice) AS s_hrg_inv,a.ongkir,b.laporan FROM m_invoice a
            INNER JOIN m_pl_price_list b ON b.id=a.id_pl OR a.id_pl = 0 AND a.no_inv=b.no_inv
            INNER JOIN m_pl_list_barang c ON b.id=c.id_pl
            INNER JOIN m_perusahaan d ON b.id_m_perusahaan=d.id
            WHERE a.id='$r->id'
            GROUP BY c.id_m_barang
            ORDER BY a.id ASC");
            
            foreach($tinv->result() as $q) {
                $item = $q->s_qty * $q->s_hrg_inv;
                $items += $item;
            }

            if($r->no_inv == 0){
                $hrginv = $r->hrg_inv;
            }else{
                $hrginv = $items;
            }

            if($r->laporan == "st" || $r->laporan == "") {
                $tot_all = round($hrginv + $r->ongkir);
            }else if($r->laporan == "sma") {
                $ppn = round($hrginv * 0.1);
                $tot_all = round($hrginv + $ppn);
            }
            
            $i++;
            $html .='<tr>
                <td style="border:1px solid #000;padding:5px 3px;text-align:center">'.$i.'</td>
                <td class="str" style="border:1px solid #000;padding:5px">'.$r->no_nota.'</td>
                <td style="border:1px solid #000;padding:5px;text-align:center">'.$this->m_fungsi->TglIndSingkat($r->tgl_ctk).'</td>
                <td class="str" style="border:1px solid #000;padding:5px;text-align:right">'.number_format($tot_all).'</td>
                <td style="border:1px solid #000;padding:5px;text-align:center">'.$this->m_fungsi->TglIndSingkat($r->tgl_byr).'</td>
                <td style="border:1px solid #000;padding:5px">'.$via.'</td>
                <td style="border:1px solid #000;padding:5px"></td>
            </tr>';
        }

        $html .='</table>';

        if($ctk == 0){
            $this->m_fungsi->mPDFP($html);
            // $this->m_fungsi->mPDFN($html);
        }else if($ctk == 1){
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=$judul.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $data2['prev']= $html;
            $this->load->view('view_excel', $data2);            
        }
    }

    function LapBukuPenerimaanManual(){
        // $jenis = $_GET['jenis'];
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $ctk = $_GET['ctk'];
        $html = '';

        $html .='<style>
            .str{
                mso-number-format:\@;
            }
        </style>';

        // ambil data
        $sql = $this->db->query("SELECT b.tgl_ctk,SUM(c.qty * c.harga_invoice) AS hrg_inv,a.ongkir,b.laporan,d.nm_perusahaan,a.* FROM m_invoice a
        INNER JOIN m_pl_price_list b ON b.id=a.id_pl OR a.id_pl = 0 AND a.no_inv=b.no_inv
        INNER JOIN m_pl_list_barang c ON b.id=c.id_pl
        INNER JOIN m_perusahaan d ON b.id_m_perusahaan=d.id
        WHERE a.tgl_byr BETWEEN '$tgl1' AND '$tgl2'
        GROUP BY a.id
        ORDER BY a.id ASC");

        // K O P
        $html .='<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
        <tr>
            <th style="border:0;padding:0 0 15px" colspan="7">BUKU PENERIMAAN MANUAL</th>
        </tr>
        <tr>
            <th style="border:1px solid #000;padding:5px;width:5%">No</th>
            <th style="border:1px solid #000;padding:5px;width:14%">Tgl Bayar</th>
            <th style="border:1px solid #000;padding:5px;width:23%">Customer</th>
            <th style="border:1px solid #000;padding:5px;width:12%">Nominal</th>
            <th style="border:1px solid #000;padding:5px;width:14%">Via</th>
            <th style="border:1px solid #000;padding:5px;width:16%">No Nota</th>
            <th style="border:1px solid #000;padding:5px;width:16%">Keterangan</th>
        </tr>';

        $i = 0;
        $items = 0;
        foreach($sql->result() as $r){

            if($r->via == 1){
                $via = "Cash";
            }else if($r->via == 2){
                $via = "Transfer Bank";
            }else{
                $via = "-";
            }

            // sql total inv
            $tinv = $this->db->query("SELECT SUM(c.qty) AS s_qty,SUM(c.harga_invoice) AS s_hrg_inv,a.ongkir,b.laporan FROM m_invoice a
            INNER JOIN m_pl_price_list b ON b.id=a.id_pl OR a.id_pl = 0 AND a.no_inv=b.no_inv
            INNER JOIN m_pl_list_barang c ON b.id=c.id_pl
            INNER JOIN m_perusahaan d ON b.id_m_perusahaan=d.id
            WHERE a.id='$r->id'
            GROUP BY c.id_m_barang
            ORDER BY a.id ASC");
            
            foreach($tinv->result() as $q) {
                $item = $q->s_qty * $q->s_hrg_inv;
                $items += $item;
            }

            if($r->no_inv == 0){
                $hrginv = $r->hrg_inv;
            }else{
                $hrginv = $items;
            }

            if($r->laporan == "st" || $r->laporan == "") {
                $tot_all = round($hrginv + $r->ongkir);
            }else if($r->laporan == "sma") {
                $ppn = round($hrginv * 0.1);
                $tot_all = round($hrginv + $ppn);
            }

            $i++;
            $html .='<tr>
                <td style="border:1px solid #000;padding:5px 3px;text-align:center">'.$i.'</td>
                <td style="border:1px solid #000;padding:5px;text-align:center">'.$this->m_fungsi->TglIndSingkat($r->tgl_byr).'</td>
                <td style="border:1px solid #000;padding:5px">'.$r->nm_perusahaan.'</td>
                <td class="str" style="border:1px solid #000;padding:5px;text-align:right">'.number_format($tot_all).'</td>
                <td style="border:1px solid #000;padding:5px">'.$via.'</td>
                <td class="str" style="border:1px solid #000;padding:5px">'.$r->no_nota.'</td>
                <td style="border:1px solid #000;padding:5px"></td>
            </tr>';
        }

        $html .='</table>';

        if($tgl1 == $tgl2){
            $ttgl = strtoupper($this->m_fungsi->TglIndSingkat($tgl1));
        }else{
            $ttgl = strtoupper($this->m_fungsi->TglIndSingkat($tgl1)).' - '.strtoupper($this->m_fungsi->TglIndSingkat($tgl2));
        }

        $judul = 'BUKU PENERIMAAN MANUAL - '.$ttgl;

        if($ctk == 0){
            $this->m_fungsi->mPDFP($html);
            // $this->m_fungsi->mPDFN($html);
        }else if($ctk == 1){
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=$judul.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $data2['prev']= $html;
            $this->load->view('view_excel', $data2);            
        }
    }

    function Piutang(){ //
        $jenis = $_GET['jenis'];
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $ctk = $_GET['ctk'];
        $lap = $_GET['lap'];
        $html = '';

        // if($jenis <> 0){
        //     $where = "AND d.id='$jenis'";
        // }else{
        //     $where = "";
        // }

        if($lap == "sma" && $jenis == 0){
            $where = "AND d.laporan='sma'";
        }else if($lap == "st" && $jenis == 0){
            $where = "AND d.laporan='st'";
        }else if(($lap == "sma" || $lap == "st") && $jenis != 0){
            $where = "AND d.id='$jenis'";
        }else if($lap == 0 && $jenis == 0){
            $where = "";
        }else{
            $where = "";
        }

        $html .='<style>
            .str{
                mso-number-format:\@;
            }
        </style>';

        // ambil data
        $sql = $this->db->query("SELECT b.tgl_ctk,SUM(c.qty * c.harga_invoice) AS hrg_inv,a.ongkir,b.laporan,d.nm_perusahaan,a.* FROM m_invoice a
        INNER JOIN m_pl_price_list b ON b.id=a.id_pl OR a.id_pl = 0 AND a.no_inv=b.no_inv
        INNER JOIN m_pl_list_barang c ON b.id=c.id_pl
        INNER JOIN m_perusahaan d ON b.id_m_perusahaan=d.id
        WHERE b.tgl_ctk BETWEEN '$tgl1' AND '$tgl2' AND a.tgl_byr IS NULL $where
        GROUP BY a.id
        ORDER BY a.id ASC");

        // K O P
        $html .='<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
        <tr>
            <th style="border:0;padding:0 0 15px" colspan="6">LAPORAN PIUTANG</th>
        </tr>
        <tr>
            <th style="border:1px solid #000;padding:5px;width:5%">No</th>
            <th style="border:1px solid #000;padding:5px;width:29%">Nama Customer</th>
            <th style="border:1px solid #000;padding:5px;width:20%">No Nota</th>
            <th style="border:1px solid #000;padding:5px;width:14%">Tgl Nota</th>
            <th style="border:1px solid #000;padding:5px 2px;width:14%">Tgl Jth Tempo</th>
            <th style="border:1px solid #000;padding:5px;width:18%">Nominal</th>
        </tr>';

        // ISI
        $i = 0;
        $items = 0;
        $tot_kel = 0;
        foreach($sql->result() as $r){
            $i++;
            $html .='<tr>
                <td style="border:1px solid #000;padding:5px 2px;text-align:center">'.$i.'</td>
                <td style="border:1px solid #000;padding:5px">'.$r->nm_perusahaan.'</td>
                <td class="str" style="border:1px solid #000;padding:5px">'.$r->no_nota.'</td>
                <td style="border:1px solid #000;padding:5px 2px;text-align:center">'.$this->m_fungsi->TglIndSingkat($r->tgl_ctk).'</td>
                <td style="border:1px solid #000;padding:5px 2px;text-align:center">'.$this->m_fungsi->TglIndSingkat($r->tgl_jt).'</td>';

            // sql total inv
            $tinv = $this->db->query("SELECT SUM(c.qty) AS s_qty,SUM(c.harga_invoice) AS s_hrg_inv,a.ongkir,b.laporan FROM m_invoice a
            INNER JOIN m_pl_price_list b ON b.id=a.id_pl OR a.id_pl = 0 AND a.no_inv=b.no_inv
            INNER JOIN m_pl_list_barang c ON b.id=c.id_pl
            INNER JOIN m_perusahaan d ON b.id_m_perusahaan=d.id
            WHERE a.id='$r->id'
            GROUP BY c.id_m_barang
            ORDER BY a.id ASC");
            
            foreach($tinv->result() as $q) {
                $item = $q->s_qty * $q->s_hrg_inv;
                $items += $item;
            }

            if($r->no_inv == 0){
                $hrginv = $r->hrg_inv;
            }else{
                $hrginv = $items;
            }

            if($r->laporan == "st" || $r->laporan == "") {
                $tot_all = round($hrginv + $r->ongkir);
            }else if($r->laporan == "sma") {
                $ppn = round($hrginv * 0.1);
                $tot_all = round($hrginv + $ppn);
            }

            $html .= '<td class="str" style="border:1px solid #000;padding:5px;text-align:right">'.number_format($tot_all).'</td>';
            $html .= '</tr>';

            $tot_kel += $tot_all;
        }

        // TOTAL
        $html .='<tr>
            <td style="border:1px solid #000;padding:5px;font-weight:bold;text-align:center" colspan="5">JUMLAH</td>
            <td style="border:1px solid #000;padding:5px;font-weight:bold;text-align:right">'.number_format($tot_kel).'</td>
        </tr>';

        $html .='</table>';

        // JUDUL LAPORAN EXCEL
        if($tgl1 == $tgl2){
            $ttgl = strtoupper($this->m_fungsi->TglIndSingkat($tgl1));
        }else{
            $ttgl = strtoupper($this->m_fungsi->TglIndSingkat($tgl1)).' - '.strtoupper($this->m_fungsi->TglIndSingkat($tgl2));
        }

        $judul = 'PIUTANG TGL CETAK '.$ttgl;

        if($ctk == 0){
            $this->m_fungsi->mPDFP($html);
        }else if($ctk == 1){
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=$judul.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $data2['prev']= $html;
            $this->load->view('view_excel', $data2);            
        }
        
    }
    
    function BarangKeluar() {
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $lap = $_GET['lap'];
        $ctk = $_GET['ctk'];
        $html = '';

        if($lap == "sma"){
            $lapp = "SINAR MUKTI ABADI";
        }else if($lap == "st"){
            $lapp = "SINAR TEKNINDO";
        }else{
            $lapp = "SEMUA LAPORAN";
        }

        if($tgl1 == $tgl2){
            $ttgl = strtoupper($this->m_fungsi->tanggal_format_indonesia($tgl1));
        }else{
            $ttgl = strtoupper($this->m_fungsi->tanggal_format_indonesia($tgl1).' S/D '.$this->m_fungsi->tanggal_format_indonesia($tgl2));
        }

        $html .='<style>
            .str{
                mso-number-format:\@;
            }
        </style>';

        // KOP
        $html .= '<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
        <tr>
            <th style="border:0;width:5%;padding:0"></th>
            <th style="border:0;width:10%;padding:0"></th>
            <th style="border:0;width:17%;padding:0"></th>
            <th style="border:0;width:10%;padding:0"></th>
            <th style="border:0;width:10%;padding:0"></th>
            <th style="border:0;width:5%;padding:0"></th>
            <th style="border:0;width:6%;padding:0"></th>
            <th style="border:0;width:17%;padding:0"></th>
            <th style="border:0;width:10%;padding:0"></th>
            <th style="border:0;width:10%;padding:0"></th>
        </tr>
        <tr>
            <td style="border:0;padding:0;font-weight:bold;text-align:center" colspan="10">DATA BARANG KELUAR '.$lapp.'</td>
        </tr>
        <tr>
            <td style="border:0;padding:0 0 8px;font-weight:bold;text-align:center" colspan="10">TANGGAL : '.$ttgl.'</td>
        </tr>';
        
        // 
        $html .= '<tr>
            <td style="border:1px solid #000;padding:5px;font-weight:bold;text-align:center">No</td>
            <td style="border:1px solid #000;padding:5px;font-weight:bold;text-align:center">Tgl Keluar</td>
            <td style="border:1px solid #000;padding:5px;font-weight:bold;text-align:center">Nama Barang</td>
            <td style="border:1px solid #000;padding:5px;font-weight:bold;text-align:center">Merek</td>
            <td style="border:1px solid #000;padding:5px;font-weight:bold;text-align:center">Spesifikasi</td>
            <td style="border:1px solid #000;padding:5px;font-weight:bold;text-align:center">Qty</td>
            <td style="border:1px solid #000;padding:5px;font-weight:bold;text-align:center">Satuan</td>
            <td style="border:1px solid #000;padding:5px;font-weight:bold;text-align:center">Customer</td>
            <td style="border:1px solid #000;padding:5px;font-weight:bold;text-align:center">Harga Satuan</td>
            <td style="border:1px solid #000;padding:5px;font-weight:bold;text-align:center">ket</td>
        </tr>';

        if($lap == "sma" || $lap == "st"){
            $laplap = "AND b.laporan = '$lap'";
        }else{
            $laplap = "";
        }

        // ambil data
        $sql = $this->db->query("SELECT b.laporan,d.nama_barang,d.merek,d.spesifikasi,c.nm_perusahaan,e.harga,e.status,a.* FROM m_pl_list_barang a
        INNER JOIN m_pl_price_list b ON a.id_pl=b.id
        INNER JOIN m_perusahaan c ON b.id_m_perusahaan=c.id
        INNER JOIN m_barang d ON a.id_m_barang=d.id
        INNER JOIN m_barang_plus e ON d.id_m_barang_plus=e.id
        WHERE a.tgl BETWEEN '$tgl1' AND '$tgl2' $laplap");

        $ii = 0;
        foreach($sql->result() as $r){
            $ii++;
            $html .= '<tr>
                <td style="border:1px solid #000;padding:5px 2px;text-align:center">'.$ii.'</td>
                <td style="border:1px solid #000;padding:5px;text-align:center">'.$this->m_fungsi->TglIndSingkat($r->tgl).'</td>
                <td style="border:1px solid #000;padding:5px">'.$r->nama_barang.'</td>
                <td style="border:1px solid #000;padding:5px">'.$r->merek.'</td>
                <td style="border:1px solid #000;padding:5px">'.$r->spesifikasi.'</td>
                <td class="str" style="border:1px solid #000;padding:5px">'.$r->qty.'</td>
                <td style="border:1px solid #000;padding:5px 2px 5px 5px">'.$r->qty_ket.'</td>
                <td style="border:1px solid #000;padding:5px">'.$r->nm_perusahaan.'</td>
                <td class="str" style="border:1px solid #000;padding:5px;text-align:right">Rp. '.number_format($r->harga).'</td>
                <td style="border:1px solid #000;padding:5px">'.$r->status.'</td>
            </tr>';
        }

        $html .= '</table>';

        $judul = "LAPORAN BARANG KELUAR ".$lapp.' TGL : '.$ttgl;

        if($ctk == 0){
            $this->m_fungsi->mPDFL($html);
        }else if($ctk == 1){
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=$judul.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $data2['prev']= $html;
            $this->load->view('view_excel', $data2);            
        }
    }

 }
