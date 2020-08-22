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

    function Laporan(){
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $jenis = $_GET['jenis'];

        if ($jenis == "3") {
            $data_detail = $this->db->query("SELECT * FROM m_timbangan WHERE tgl BETWEEN '$tgl1' AND '$tgl2' AND status ='0' AND (nm_ker='MH' OR nm_ker='MI')");
        }else{
            $data_detail = $this->db->query("SELECT * FROM m_timbangan WHERE tgl BETWEEN '$tgl1' AND '$tgl2' ");
        }

        $html = '';

        $html .= '<table width="100%" border="0" style="font-size:10px">
                    <tr>
                        <td colspan="8" align="center"><b><u><font style="font-size:18px">Laporan Timbangan</font></u> <br> 
                             '.$this->m_fungsi->tanggal_format_indonesia($tgl1).' S/D '.$this->m_fungsi->tanggal_format_indonesia($tgl2).'</b>
                        </td>
                    </tr>
                 </table>
                 <br>
                 <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size:10px">
                    <tr bgcolor="#CCCCCC">
                        <td width="" align="center">No</td>
                        <td width="" align="center">Roll Number</td>
                        <td width="" align="center">Jenis Kertas</td>
                        <td width="" align="center">Gramatur Label</td>
                        <td width="" align="center">Gramatur Aktual</td>
                        <td width="" align="center">Width</td>
                        <td width="" align="center">Diameter</td>
                        <td width="" align="center">Weight</td>
                        <td width="" align="center">Join</td>
                        <td width="" align="center">Rct</td>';
                        if ($jenis != "1") {
                            $html .= '<td width="" align="center">Quality</td>';
                        }
                        if ($jenis == "2") {
                            $html .= '<td width="" align="center">Operator</td>';
                        }
                        $html .= '
                        <td width="" align="center">Keterangan</td>
                    </tr>';
                    $no = 1;
                    $tot_weight = 0 ;

                    if ($data_detail->num_rows() > 0) {
                        # code...
                        foreach ($data_detail->result() as $r ) {
                            
                            $html .= '<tr>
                                        <td width="" align="center">'.$no.'</td>
                                        <td width="" align="center">'.$r->roll.'</td>
                                        <td width="" align="center">'.$r->nm_ker.'</td>
                                        <td width="" align="center">'.$r->g_label.'</td>
                                        <td width="" align="center">'.$r->g_ac.'</td>
                                        <td width="" align="center">'.$r->width.'</td>
                                        <td width="" align="center">'.$r->diameter.'</td>
                                        <td width="" align="center">'.$r->weight.'</td>
                                        <td width="" align="center">'.$r->joint.'</td>
                                        <td width="" align="center">'.$r->rct.'</td>';
                                        if ($jenis != "1") {
                                            $html .= '<td width="" align="center"></td>';
                                        }
                                        if ($jenis == "2") {
                                            $html .= '<td width="" align="center">'.$r->created_by.'</td>';
                                        }
                                        $html .= '
                                        <td width="" align="center">'.$r->ket.'</td>
                                    </tr>';
                         $no++;
                         $tot_weight += $r->weight;
                        }
                    }

                    if ($jenis == "1") {
                            $html .= '<tr bgcolor="#CCCCCC">
                                    <td width="" align="center" colspan="7">TOTAL BERAT</td>
                                    <td width="" align="center">'.number_format($tot_weight).'</td>
                                    <td width="" align="center"></td>
                                    <td width="" align="center"></td>
                                     <td width="" align="center"></td>
                                </tr>';
                    }

                    $html .='
                </table>
                 
                 ';

        $ctk = $_GET['ctk'];

        $judul = "Laporan Timbangan Tanggal ".$tgl1 . " S/d ". $tgl2;
        if ($ctk == '0') {
            echo $html;
        }else if ($ctk == '1') {
            // echo '<title>'.$judul. '</title>';
            $this->m_fungsi->_mpdf('',$html,10,10,10,'L');
        }else{
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=$judul.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $data2['prev']= $html;
            $this->load->view('view_excel', $data2);
        }
    }

    function lap_barang(){ //
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $jenis = $_GET['jenis'];

        $html = '';
        //$this->m_fungsi->tanggal_format_indonesia($data_pl->tgl)

        if($tgl1 == $tgl2){
            $ttgl = $this->m_fungsi->tanggal_format_indonesia($tgl1);
        }else{
            $ttgl = $this->m_fungsi->tanggal_format_indonesia($tgl1).' S/D '.$this->m_fungsi->tanggal_format_indonesia($tgl2);
        }

        // JUDUL
        $html .= '<table cellspacing="0" style="font-size:12px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;text-align:center;font-family:Arial !important">
            <tr>
                <th>LAPORAN BARANG</th>
            </tr>
            <tr>
                <th>TANGGAL '.strtoupper($ttgl).'</th>
            </tr>
        </table>';

        // content
        $html .= '<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
            <tr>
                <th style="border:0;width:5%;padding:5px"></th>
                <th style="border:0;width:6%;padding:5px"></th>
                <th style="border:0;width:6%;padding:5px"></th>
                <th style="border:0;width:15%;padding:5px"></th>
                <th style="border:0;width:20%;padding:5px"></th>
                <th style="border:0;width:19%;padding:5px"></th>
                <th style="border:0;width:19%;padding:5px"></th>
                <th style="border:0;width:10%;padding:5px"></th>
            </tr>
            <tr>
                <td style="border:1px solid #000;padding:8px 5px;text-align:center;font-weight:bold">No.</td>
                <td style="border:1px solid #000;padding:8px 5px;text-align:center;font-weight:bold" colspan="2">Tanggal</td>
                <td style="border:1px solid #000;padding:8px 5px;text-align:center;font-weight:bold" colspan="2">Nama Barang</td>
                <td style="border:1px solid #000;padding:8px 5px;text-align:center;font-weight:bold">Merek</td>
                <td style="border:1px solid #000;padding:8px 5px;text-align:center;font-weight:bold">Spesifikasi</td>
                <td style="border:1px solid #000;padding:8px 5px;text-align:center;font-weight:bold">STOK</td>
            </tr>';
        
        // data barang per supplier
        if($jenis == 0){
            $where = '';
        }else if($jenis <> 0){
            $where = "AND c.id='$jenis'";
        }

        $sql_barang_supplier = $this->db->query("SELECT c.nama_supplier,b.no_nota,a.id_m_nota FROM m_barang a
        INNER JOIN m_nota b ON a.id_m_nota=b.id
        INNER JOIN m_supplier c ON b.id_supplier=c.id
        WHERE tgl BETWEEN '$tgl1' AND '$tgl2' $where
        GROUP BY a.id_m_nota
        ORDER BY c.nama_supplier ASC,b.no_nota ASC");

        $s = 0;
        foreach($sql_barang_supplier->result() as $r) {
            $s++;
            $html .= '<tr>
                <td style="border:1px solid #000;padding:5px 2px;font-weight:bold;text-align:center">'.$s.'</td>
                <td style="border:1px solid #000;border-width:1px 0 1px 1px;padding:5px;font-weight:bold" colspan="4">SUPPLIER : '.$r->nama_supplier.'</td>
                <td style="border:1px solid #000;border-width:1px 1px 1px 0;padding:5px;font-weight:bold" colspan="3">NO. NOTA : '.$r->no_nota.'</td>
            </tr>';

            // tampil data
            $sql_barang = $this->db->query("SELECT c.nama_supplier,b.no_nota,d.qty_ket,d.harga,a.* FROM m_barang a
            INNER JOIN m_nota b ON a.id_m_nota=b.id
            INNER JOIN m_supplier c ON b.id_supplier=c.id
            INNER JOIN m_barang_plus d ON a.id_m_barang_plus=d.id
            WHERE tgl BETWEEN '$tgl1' AND '$tgl2' AND a.id_m_nota='$r->id_m_nota'
            ORDER BY tgl ASC,a.nama_barang ASC");

            $i = 0;
            foreach($sql_barang->result() as $r){
                $i++;
                // $this->m_fungsi->tanggal_format_indonesia($r->tgl)
                $html .='<tr>
                    <td style="border:1px solid #000;border-width:0 1px;padding:5px 2px;text-align:center">'.$i.'</td>
                    <td style="border:1px solid #000;padding:5px;text-align:center" colspan="2">'.$this->m_fungsi->tanggal_format_indonesia($r->tgl).'</td>
                    <td style="border:1px solid #000;padding:5px" colspan="2">'.$r->nama_barang.'</td>
                    <td style="border:1px solid #000;padding:5px">'.$r->merek.'</td>
                    <td style="border:1px solid #000;padding:5px">'.$r->spesifikasi.'</td>
                    <td style="border:1px solid #000;padding:5px;font-weight:bold;text-align:right">'.number_format($r->qty).'</td>
                </tr>';

                $html .='<tr>
                    <td style="border:1px solid #000;border-width:0 1px;padding:5px"></td>
                    <td style="border:1px solid #000;padding:5px;text-align:center">No.</td>
                    <td style="border:1px solid #000;padding:5px;text-align:center" colspan="2">Tanggal Pembelian</td>
                    <td style="border:1px solid #000;padding:5px;text-align:center">QTY</td>
                    <td style="border:1px solid #000;padding:5px;text-align:center">KET</td>
                    <td style="border:1px solid #000;padding:5px;text-align:center">Harga</td>
                    <td style="border:1px solid #000;padding:5px;text-align:center">Status</td>
                </tr>';

                // tampil data barang plus
                $sql_barang = $this->db->query("SELECT*FROM m_barang_plus WHERE id_m_barang='$r->id' ORDER BY tgl_bayar ASC");

                $p = 0;
                $sum_harga = 0;
                foreach($sql_barang->result() as $r){
                    $p++;
                    $html .= '<tr>
                        <td style="border:1px solid #000;border-width:0 1px"></td>
                        <td style="border:1px solid #000;padding:5px;text-align:center">'.$p.'</td>
                        <td style="border:1px solid #000;padding:5px;text-align:center" colspan="2">'.$this->m_fungsi->tanggal_format_indonesia($r->tgl_bayar).'</td>
                        <td style="border:1px solid #000;padding:5px;text-align:center">'.$r->qty_plus.'</td>
                        <td style="border:1px solid #000;padding:5px;text-align:center">'.$r->qty_ket.'</td>
                        <td style="border:1px solid #000;padding:5px">Rp. '.number_format($r->harga).'</td>
                        <td style="border:1px solid #000;padding:5px;text-align:center">'.$r->status.'</td>
                    </tr>';

                    $sum_harga += $r->harga;
                }

                // total barang plus
                $html .='<tr>
                    <td style="border:1px solid #000;border-width:0 1px 1px;padding:5px"></td>
                    <td style="border:1px solid #000;padding:5px;font-weight:bold;text-align:center" colspan="5">TOTAL PEMBELIAN</td>
                    <td style="border:1px solid #000;padding:5px;font-weight:bold" colspan="2">Rp. '.number_format($sum_harga).'</td>
                </tr>';
            }
        }

        $html .= '</table>';

        // $this->m_fungsi->_mpdf2('',$html,10,10,10,'L');
        $this->m_fungsi->mPDFL($html);

    }

    function lap_total_pembelian(){ //
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $jenis = $_GET['jenis'];

        $html = '';
        //$this->m_fungsi->tanggal_format_indonesia($data_pl->tgl)

        if($tgl1 == $tgl2){
            $ttgl = $this->m_fungsi->tanggal_format_indonesia($tgl1);
        }else{
            $ttgl = $this->m_fungsi->tanggal_format_indonesia($tgl1).' S/D '.$this->m_fungsi->tanggal_format_indonesia($tgl2);
        }

        // JUDUL
        $html .= '<table cellspacing="0" style="font-size:12px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;text-align:center;font-family:Arial !important">
            <tr>
                <th>LAPORAN TOTAL PEMBELIAN</th>
            </tr>
            <tr>
                <th>TANGGAL '.strtoupper($ttgl).'</th>
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

        $this->m_fungsi->_mpdf2('',$html,10,10,10,'P');

    }

    function lap_csv(){
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $jenis = $_GET['jenis'];

        $data_detail = $this->db->query("SELECT * FROM m_timbangan WHERE tgl BETWEEN '$tgl1' AND '$tgl2' ORDER BY id ASC");        
        $html = '';

                    if ($data_detail->num_rows() > 0) {
                        foreach ($data_detail->result() as $r ) {
                            $html .= '\N,"'.$r->roll.'","'.$r->tgl.'","'.$r->nm_ker.'","'.$r->g_ac.'","'.$r->g_label.'","'.$r->width.'","'.$r->diameter.'","'.$r->weight.'","'.$r->joint.'","'.$r->ket.'","'.$r->status.'","'.$r->id_pl.'",\N,\N,\N,\N,"'.$r->rct.'","0"<br>';
                        }
                    }

        $ctk = $_GET['ctk'];

        $judul = "csv_".$tgl1."_".$tgl2;
        if ($ctk == '0') {
            echo $html;
        }        else{
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=$judul.csv");
            header("Pragma: no-cache");
            header("Expires: 0");
            $data2['prev']= $html;
            $this->load->view('view_csv', $data2);
        }
    }

    function Surat_Jalan(){
        //
        $jenis = $_GET['jenis'];
        $ctk = $_GET['ctk'];
        $pt = $_GET['pt'];

        $html = '';

        $sql_kop = $this->db->query("SELECT b.nm_perusahaan,b.npwp,b.alamat,a.* FROM m_pl_price_list a
        INNER JOIN m_perusahaan b ON a.id_m_perusahaan = b.id
        WHERE a.id='$jenis'")->row();

        // KOP
        if($pt == "sma"){
            // $jpg = "http://localhost/si_pp/assets/images/logo_sma.jpg";
            $jpg = "http://sinarmuktiabadi.com/assets/images/logo_sma.jpg";
            $top = 'top';
            $px = '0 0 70px';
            $dd = '5px 0';
        }else if($pt == "st"){
            // $jpg = "http://localhost/si_pp/assets/images/logo_st.jpg";
            $jpg = "http://sinarmuktiabadi.com/assets/images/logo_st.jpg";
            $top = 'top';
            $px = '0 0 80px';
            $dd = '0';
        }
        
        $html .= '<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
            <tr>
                <th style="border:0;width:17%;padding:0"></th>
                <th style="border:0;width:1%;padding:0"></th>
                <th style="border:0;width:27%;padding:0"></th>
                <th style="border:0;width:10%;padding:0"></th>
                <th style="border:0;width:45%;padding:0"></th>
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
            <th style="padding:2px;border:0;width:45%"></th>
            <th style="padding:2px;border:0;width:25%"></th>
            <th style="padding:2px;border:0;width:25%"></th>
        </tr>
        <tr>
            <td style="padding:5px 0;border:1px solid #000;text-align:center;font-weight:bold">No</td>
            <td style="padding:5px 0;border:1px solid #000;text-align:center;font-weight:bold">Nama Barang</td>
            <td style="padding:5px 0;border:1px solid #000;text-align:center;font-weight:bold">Quantity</td>
            <td style="padding:5px 0;border:1px solid #000;text-align:center;font-weight:bold">Satuan</td>
        </tr>';

        // isinya
        $sql_isi = $this->db->query("SELECT b.nama_barang,a.* FROM m_pl_list_barang a
        INNER JOIN m_barang b ON a.id_m_barang = b.id
        WHERE id_pl='$jenis'
        GROUP BY b.kode_barang");

        $i = 0;
        foreach($sql_isi->result() as $r){
            $i++;
            $html .= '<tr>
                <td style="padding:5px;border:1px solid #000;text-align:center;font-weight:bold">'.$i.'</td>
                <td style="padding:5px;border:1px solid #000">'.$r->nama_barang.'</td>
                <td style="padding:5px;border:1px solid #000;text-align:center">'.$r->qty.'</td>
                <td style="padding:5px;border:1px solid #000;text-align:center">'.$r->qty_ket.'</td>
            </tr>';
        }

        $count = $sql_isi->num_rows();

        if($count == 1) {
            for($i = 0; $i < 4; $i++){ 
                $cc = 1;
                $xx = 4;
            }
        }else if($count == 2){
            for($i = 0; $i < 3; $i++){
                $cc = 2;
                $xx = 3;
            }
        }else if($count == 3){
            for($i = 0; $i < 2; $i++){
                $cc = 3;
                $xx = 2;
            }
        }else if($count == 4){
            for($i = 0; $i < 1; $i++){ 
                $cc = 4;
                $xx = 1;
            }
        }
        
        if($count == $cc) {
            for($i = 0; $i < $xx; $i++){
                $html .= '<tr>
                <td style="padding:5px;border:1px solid #000;padding:11px 0"></td>
                <td style="padding:5px;border:1px solid #000;padding:11px 0"></td>
                <td style="padding:5px;border:1px solid #000;padding:11px 0"></td>
                <td style="padding:5px;border:1px solid #000;padding:11px 0"></td>';
            }
        }

        $html .= '</table>';

        // TANDA TANGAN
        if($pt == "sma"){
            $atn = 'Andreas Purwanto';
        }else if($pt == "st"){
            $atn = 'Novan Krisna';
        }

        $html .= '<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;text-align:center;font-family:Arial !important">
            <tr>
                <th style="border:0;width:50%;padding:8px 0"></th>
                <th style="border:0;width:50%;padding:8px 0"></th>
            </tr>
            <tr>
                <td>Hormat Kami</td>
                <td>Penerima</td>
            </tr>
            <tr>
                <td style="border:0;padding:40px 0"></td>
                <td style="border:0;padding:40px 0"></td>
            </tr>
            <tr>
                <td style="font-weight:bold">'.$atn.'</td>
                <td>____________________</td>
            </tr>
        </table>';

            // $this->m_fungsi->_mpdf2('',$html,10,10,10,'P');
            $this->m_fungsi->mPDF($html);

            // $mpdf = new \Mpdf\Mpdf();
            // $mpdf->WriteHTML($html);
            // $mpdf->Output();
        
    }

    function Nota_Penjualan(){ //
    // CETAK NOTA PENJUALAN
    //
    $jenis = $_GET['jenis'];
    $ctk = $_GET['ctk'];
    $tgl_ctk = $_GET['tgl_ctk'];
    $pt = $_GET['pt'];

    $html = '';

    $sql_kop = $this->db->query("SELECT b.no_surat,b.no_po,b.up,a.tgl_jt,c.nm_perusahaan,c.npwp,c.alamat,a.* FROM m_invoice a
    INNER JOIN m_pl_price_list b ON a.id_pl=b.id
    INNER JOIN m_perusahaan c ON b.id_m_perusahaan=c.id
    WHERE a.id='$jenis'")->row();

    // KOP
    if($pt == "sma"){
        // $jpg = "http://localhost/si_pp/assets/images/logo_sma.jpg";
        $jpg = "http://sinarmuktiabadi.com/assets/images/logo_sma.jpg";
        $top = 'top';
        $px = '0 0 70px';
    }else if($pt == "st"){
        // $jpg = "http://localhost/si_pp/assets/images/logo_st.jpg";
        $jpg = "http://sinarmuktiabadi.com/assets/images/logo_st.jpg";
        $top = 'top';
        $px = '0 0 80px';
    }

        # # # # # # # # # # # # # KOP # # # # # # # # # # # # #

        if($pt == "st"){
            $npwp = '';
            $kop_nota = 'N O T A
            <br><div style="font-weight:normal;font-size:12px !important">Klaten, '.$this->m_fungsi->tanggal_format_indonesia($tgl_ctk).'
            <br/>Yth. '.$sql_kop->nm_perusahaan.'
            <br/>Up. '.$sql_kop->up.'
            <br/>'.$sql_kop->alamat.'
            </div>';
            $dd = '0';
        }else if($pt == "sma"){
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

        if($pt == "st"){
            $html .='';
            $html .='<tr>
            <td style="border:0;padding:0 0 1px">No. Nota</td>
            <td style="border:0;padding:0 0 1px">:</td>
            <td style="border:0;padding:0 0 1px 5px 0 0">'.$sql_kop->no_nota.'</td>
            <td style="border:0;padding:0 0 1px">No. PO: '.$sql_kop->no_po.'</td>
            </tr>';
        }else if($pt == "sma"){
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
            <td style="padding:1px 200px 0 0">'.$sql_kop->no_po.'</td>
            <td></td>
            </tr>';
        }   

        $html .='</table>';

                # # # # # # # # # # # # # I S I # # # # # # # # # # # # #

        $html .= '<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
        <tr>
        <th style="border:0;width:5%;padding:0"></th>
        <th style="border:0;width:42%;padding:0"></th>
        <th style="border:0;width:8%;padding:0"></th>
        <th style="border:0;width:8%;padding:0"></th>
        <th style="border:0;width:17%;padding:0"></th>
        <th style="border:0;width:20%;padding:0"></th>
        </tr>
        <tr>
        <td style="border:1px solid #000;padding:5px 3px;text-align:center;font-weight:bold">NO</td>
        <td style="border:1px solid #000;padding:5px 3px;text-align:center;font-weight:bold">Nama Barang</td>
        <td style="border:1px solid #000;padding:5px 3px;text-align:center;font-weight:bold" colspan="2">Quantity</td>
        <td style="border:1px solid #000;padding:5px 3px;text-align:center;font-weight:bold">Satuan (Rp.)</td>
        <td style="border:1px solid #000;padding:5px 3px;text-align:center;font-weight:bold">Jumlah (Rp.)</td>
        </tr>';

        // isinya
        $sql_isi = $this->db->query("SELECT c.nama_barang,a.*FROM m_pl_list_barang a
        INNER JOIN m_pl_price_list b ON a.id_pl=b.id
        INNER JOIN m_barang c ON a.id_m_barang=c.id
        WHERE a.id_pl='$sql_kop->id_pl'
        ORDER BY c.nama_barang ASC");

        $ii = 0;
        $sub_tot = 0;
        foreach($sql_isi->result() as $r){
            $ii++;
            $tot_hrg = $r->qty * $r->harga_invoice;
            $html .= '<tr>
                <td style="border:1px solid #000;padding:5px 3px;text-align:center">'.$ii.'</td>
                <td style="border:1px solid #000;padding:5px 3px">'.$r->nama_barang.'</td>
                <td style="border:1px solid #000;border-width:1px 0 1px 1px;padding:5px 3px" colspan="2">'.$r->qty.' '.$r->qty_ket.'</td>
                <td style="border:1px solid #000;padding:5px 3px;text-align:right">'.number_format($r->harga_invoice).'</td>
                <td style="border:1px solid #000;padding:5px 3px;text-align:right">'.number_format($tot_hrg).'</td>
            </tr>';

            $sub_tot += $tot_hrg;
        }

        # # # # # # # # # # # # # SUB TOTAL - PPN - ONGKIR - TOTAL # # # # # # # # # # # # #

        if($pt == "st") {
            $tot_all = round($sub_tot + $sql_kop->ongkir);
            $rs = '2';
            $html .= '';
            $t_td = '';
        }else if($pt == "sma") {
            $ppn = round($sub_tot * 0.1);
            $tot_all = round($sub_tot + $ppn);
            $rs = '2';
            $t_td = '<td style="border:0;padding:5px 5px 5px 0" colspan="4">Klaten, '.$this->m_fungsi->tanggal_format_indonesia($tgl_ctk).'</td>';
        }

        // fungsi terbilang
        $html .= '<tr>
        <td style="border:0;padding:3px 3px 0 0" colspan="4" rowspan="'.$rs.'">Terbilang : <b><i>'.ucwords($this->m_fungsi->terbilang($tot_all)).'</i></b></td>
        <td style="border:1px solid #000;padding:5px">Sub Total</td>
        <td style="border:1px solid #000;padding:5px;text-align:right">'.number_format($sub_tot).'</td>
        </tr>';

        // ppn
        if($pt == "st") {
            $html .= '';
            $nm_ttd = 'Pembayaran mohon ditransfer ke BCA
            <br/>Rekening : 079.0302.231
            <br/>Atas Nama : Niken Pangastuti - Cabang Pasar Legi';
        }else if($pt == "sma") {
            $html .='<tr>
            <td style="border:1px solid #000;padding:5px">PPN</td>
            <td style="border:1px solid #000;padding:5px;text-align:right">'.number_format($ppn).'</td>
            </tr>';
        }

        // ongkir + total all
        if($pt == "st"){
            $html .='<tr>
            '.$t_td.'
                <td style="border:1px solid #000;padding:5px">Ongkir</td>
                <td style="border:1px solid #000;padding:5px;text-align:right">'.number_format($sql_kop->ongkir).'</td>
            </tr>';
            $html.='<tr>
                <td style="border:0;padding:0" colspan="4" rowspan="2">'.$nm_ttd.'</td>
                <td style="border:1px solid #000;padding:5px">Total</td>
                <td style="border:1px solid #000;padding:5px;text-align:right">'.number_format($tot_all).'</td>
            </tr>';
        }else if($pt == "sma"){
            $html .='<tr>
            '.$t_td.'
            <td style="border:1px solid #000;padding:5px">Total</td>
            <td style="border:1px solid #000;padding:5px;text-align:right">'.number_format($tot_all).'</td>
            </tr>';
        }

        // total all
        // $html.='<tr>
        //     <td style="border:0;padding:0" colspan="4" rowspan="2">'.$nm_ttd.'</td>
        //     <td style="border:1px solid #000;padding:5px">Total</td>
        //     <td style="border:1px solid #000;padding:5px;text-align:right">Rp. '.number_format($tot_all).'</td>
        // </tr>';

        # # # # # # # # # # # # # TANDA TANGAN # # # # # # # # # # # # # 

        if($pt == "st") {
            $html .= '';

            $html .= '<tr>
            <td style="border:0;padding:12px" colspan="2"></td>
            </tr>';

            $html .= '<tr>
            <td style="border:0;padding:3px 0 0;text-align:center" colspan="2">Penerima</td>
            <td style="border:0;padding:3px 0 0;text-align:center" colspan="4">Hormat Kami,</td>
            </tr>
            <tr>
            <td style="border:0;padding:40px 0" colspan="2"></td>
            <td style="border:0;padding:40px 0" colspan="4"></td>
            </tr>
            <tr>
            <td style="border:0;padding:0 0 5px;text-align:center" colspan="2">_____________________</td>
            <td style="border:0;padding:0 0 5px;text-align:center" colspan="4">Niken Pangastuti</td>
            </tr>
            ';
        }else if($pt == "sma") {
            $no_faktur = 'No Faktur Pajak<br/>'.$sql_kop->no_faktur.'';
            $nm_ttd = 'Andreas Purwanto<br/>Bank : BRI KCP DELANGGU-KLATEN A/C : 2055 - 01 - 000246 - 30 - 0 A/N : SINAR MUKTI ABADI';

            $html .= '<tr>
            <td style="border:0;padding:1px" colspan="2"></td>
            </tr>';

            $html .='<tr>
            <td style="border:0;padding:0;color:#fff" colspan="4">.</td>
            <td style="border:0;padding:0" colspan="2" rowspan="2">'.$no_faktur.'</td>
            </tr>
            <tr>
            <td style="border:0;padding:0" colspan="3"></td>
            </tr>
            <tr>
            <td style="border:0;padding:40px 0 0" colspan="6">'.$nm_ttd.'</td>
            </tr>';
        }

        $html .= '</table>';

        // $this->m_fungsi->_mpdf2('',$html,10,10,10,'P');
        $this->m_fungsi->mPDF($html);
    }

    function Rekap_Laporan(){
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $pt = $_GET['pt'];
        $jenis = $_GET['jenis'];
        $ctk = $_GET['ctk'];

        $html = '';

        if($tgl1 == $tgl2){
            $tgll = $this->m_fungsi->tanggal_format_indonesia($tgl1);
        }else{
            $tgll = $this->m_fungsi->tanggal_format_indonesia($tgl1).' s/d '.$this->m_fungsi->tanggal_format_indonesia($tgl2);
        }

        // jika pilih customer
        $kop_kop = $this->db->query("SELECT*FROM m_perusahaan WHERE id='$jenis'")->row();

        if($jenis == 0){
            $where = ""; 
            $kkop = 'SEMUA CUSTOMER';
        }else{
            $where = "AND c.id='$jenis'"; 
            $kkop = $kop_kop->nm_perusahaan;
        }

        if($pt == "sma"){
            $lpp = "SINAR MUKTI ABADI";
        }else if($pt == "st"){
            $lpp = "SINAR TEKNINDO";
        }

        $html .= '<table cellspacing="0" style="font-size:11px !important;color:#000;border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
        <tr>
            <th style="border:0;padding:0;width:5%"></th>
            <th style="border:0;padding:0;width:15%"></th>
            <th style="border:0;padding:0;width:40%"></th>
            <th style="border:0;padding:0;width:20%"></th>
            <th style="border:0;padding:0;width:20%"></th>
        </tr>
        <tr>
            <td style="border:0;font-weight:bold;text-align:center" colspan="5">REKAP LAPORAN NOTA PENJUALAN</td>
        </tr>
        <tr>
            <td style="border:0;text-align:center;font-weight:bold" colspan="5">'.$lpp.'</td>
        </tr>
        <tr>
            <td style="border:0;text-align:center;font-weight:bold" colspan="5">'.strtoupper($kkop).'</td>
        </tr>
        <tr>
            <td style="border:0;padding:0 0 10px;text-align:center;font-weight:bold" colspan="5">JATUH TEMPO : '.strtoupper($tgll).'</td>
        </tr>
        <tr>
            <td style="border:1px solid #000;padding:5px;text-align:center;font-weight:bold">No</td>
            <td style="border:1px solid #000;padding:5px;text-align:center;font-weight:bold">Tgl Jatuh Tempo</td>
            <td style="border:1px solid #000;padding:5px;text-align:center;font-weight:bold">Kepada</td>
            <td style="border:1px solid #000;padding:5px;text-align:center;font-weight:bold">No Nota</td>
            <td style="border:1px solid #000;padding:5px;text-align:center;font-weight:bold">Total</td>
        </tr>';

        // ambil data
        $sql_isi = $this->db->query("SELECT c.nm_perusahaan,
        (SELECT SUM(harga_invoice*qty) FROM m_pl_list_barang WHERE id_pl=a.id_pl) AS tonase,
        a.* FROM m_invoice a
        INNER JOIN m_pl_price_list b ON a.id_pl=b.id
        INNER JOIN m_perusahaan c ON b.id_m_perusahaan=c.id
        WHERE b.tgl BETWEEN '$tgl1' AND '$tgl2' $where
        ORDER BY a.id DESC");

        $i = 0;
        $tot_all = 0;
        foreach($sql_isi->result() as $r){
            // $ppn = round($sub_tot * 0.1);
            // $tot_all = round($sub_tot + $ppn);

            if($pt == "sma"){
                $ppn = round($r->tonase * 0.1);
                $tot = round($r->tonase + $ppn);
            }else if($pt == "st"){
                $tot = round($r->tonase);
            }

            $i++;
            $html .= '<tr>
                <td style="border:1px solid #000;padding:5px;text-align:center">'.$i.'</td>
                <td style="border:1px solid #000;padding:5px">'.$this->m_fungsi->tanggal_format_indonesia($r->tgl_jt).'</td>
                <td style="border:1px solid #000;padding:5px">'.$r->nm_perusahaan.'</td>
                <td style="border:1px solid #000;padding:5px">'.$r->no_nota.'</td>
                <td style="border:1px solid #000;padding:5px">Rp. '.number_format($tot).'</td>
            </tr>';

            $tot_all += $tot;
        }

        // total keseluruhan
        $html .='<tr>
            <td style="border:1px solid #000;padding:5px;text-align:center;font-weight:bold" colspan="4">TOTAL KESELURUHAN</td>
            <td style="border:1px solid #000;padding:5px;font-weight:bold">Rp. '.number_format($tot_all).'</td>
        </tr>';

        $html .= '</table>';

        $this->m_fungsi->mPDFL($html);
    }

    function print_surat_jalan(){ //
        $jenis = $_GET['jenis'];
        $ctk = $_GET['ctk'];

        $html = '';

        $warna = 'hitam';

        if($warna == 'hitam'){
            $ink = '#000';
        }else{
            $ink = '#444';
        }

                             # # # # # # # # # K O P # # # # # # # # # #


        // AMBIL DATA KOP
        $data_kop = $this->db->query("
        SELECT a.nm_ker AS ker,b.nama AS nama,b.nm_perusahaan AS pt FROM m_timbangan a
        INNER JOIN pl b ON a.id_pl=b.id
        WHERE b.no_pkb='$jenis'
        GROUP BY ker LIMIT 1;")->row();

        // count data kop
        $count_kop = $this->db->query("
        SELECT g_label,a.nm_ker AS ker,width,COUNT(*) AS qty,SUM(weight) AS berat,b.no_po as po FROM m_timbangan a
        INNER JOIN pl b ON a.id_pl=b.id
        WHERE b.no_pkb='$jenis'
        GROUP BY g_label,width,b.no_po
        ORDER BY g_label,width,b.no_po ASC")->num_rows();

        // pengurangan jarak jika data terlalu banyak
        if($count_kop >= '10'){
            $px = '0';
        }else if($count_kop >= '8' || ($data_kop->pt == 'PT. DAYACIPTA KEMASINDO' && $count_kop >= '5' )){
            $px = '40px';
        }else{
            $px = '80px';
        }

        if($data_kop->ker == 'MH'){
            $html .= '<table cellspacing="0" style="font-size:11px;color:'.$ink.';border-collapse:collapse;vertical-align:top;width:100%;text-align:center;font-weight:bold;font-family:Arial !important">
            <tr>
                <th style="width:25% !important;height:'.$px.'"></th>
                <th style="width:75% !important;height:'.$px.'"></th>
            </tr>

            <tr>
                <td style="background:url(http://localhost/SI_timbangan/assets/images/logo_ppi_1.png)center no-repeat" rowspan="3"></td>
                <td style="font-size:32px;padding:20px 0 0">PT. PRIMA PAPER INDONESIA</td>
            </tr>
            <tr>
                <td style="font-size:14px">Dusun Timang Kulon, Desa Wonokerto, Kec.Wonogiri, Kab.Wonogiri</td>
            </tr>
            <tr>
                <td style="font-size:14px;padding:0 0 20px">WONOGIRI - JAWA TENGAH - INDONESIA Kode Pos 57615</td>
            </tr>
            ';
            $html .= '</table>';


            $html .= '<table cellspacing="0" style="font-size:18px;color:'.$ink.';border-collapse:collapse;vertical-align:top;width:100%;text-align:center;font-weight:bold;font-family:Arial !important">
            <tr>
                <th style="width:15% !important;height:8px"></th>
            </tr>

            <tr>
                <td style="border-top:2px solid '.$ink.';padding:10px 0 5px;text-decoration:underline">SURAT JALAN</td>
            </tr>
            ';
            $html .= '</table>';
        }else if($data_kop->ker == 'WP' && $data_kop->pt == 'CV. KURNIA PERKASA' ){
            $html .= '<table cellspacing="0" style="font-size:11px;color:'.$ink.';border-collapse:collapse;vertical-align:top;width:100%;text-align:center;font-weight:bold;font-family:Arial !important">
            <tr>
                <th style="width:25% !important;height:'.$px.'"></th>
                <th style="width:75% !important;height:'.$px.'"></th>
            </tr>

            <tr>
                <td style="background:url(http://localhost/SI_timbangan/assets/images/logo_ppi_1.png)center no-repeat" rowspan="3"></td>
                <td style="font-size:32px;padding:20px 0 0">PT. PRIMA PAPER INDONESIA</td>
            </tr>
            <tr>
                <td style="font-size:14px">Dusun Timang Kulon, Desa Wonokerto, Kec.Wonogiri, Kab.Wonogiri</td>
            </tr>
            <tr>
                <td style="font-size:14px;padding:0 0 20px">WONOGIRI - JAWA TENGAH - INDONESIA Kode Pos 57615</td>
            </tr>
            ';
            $html .= '</table>';


            $html .= '<table cellspacing="0" style="font-size:18px;color:'.$ink.';border-collapse:collapse;vertical-align:top;width:100%;text-align:center;font-weight:bold;font-family:Arial !important">
            <tr>
                <th style="width:15% !important;height:8px"></th>
            </tr>

            <tr>
                <td style="border-top:2px solid '.$ink.';padding:10px 0 5px;text-decoration:underline">SURAT JALAN</td>
            </tr>
            ';
            $html .= '</table>';
        }else if($data_kop->ker == 'WP' && $data_kop->pt <> 'CV. KURNIA PERKASA'){
            $html .= '<table cellspacing="0" style="font-size:18px;color:'.$ink.';border-collapse:collapse;vertical-align:top;width:100%;text-align:center;font-weight:bold;font-family:Arial !important">
            <tr>
                <th style="width:15% !important;height:150px"></th>
            </tr>

            <tr>
                <td style="border-top:2px solid '.$ink.';padding:10px 0 5px;text-decoration:underline">SURAT JALAN</td>
            </tr>
            ';
            $html .= '</table>';
        }


                        # # # # # # # # # D E T A I L # # # # # # # # # #


        $data_pl = $this->db->query("
        SELECT DISTINCT * FROM pl WHERE no_pkb='$jenis'
        GROUP BY no_pkb")->row();

        $html .= '<table cellspacing="0" style="font-size:11px !important;color:'.$ink.';border-collapse:collapse;vertical-align:top;width:100%;font-family:Arial !important">
            <tr>
                <th style="width:15% !important;height:8px"></th>
                <th style="width:1% !important;height:8px"></th>
                <th style="width:28% !important;height:8px"></th>
                <th style="width:15% !important;height:8px"></th>
                <th style="width:1% !important;height:8px"></th>
                <th style="width:40% !important;height:8px"></th>
            </tr>';

        $html .= '<tr>
            <td style="padding:5px 0">TANGGAL</td>
            <td style="text-align:center;padding:5px 0">:</td>
            <td style="padding:5px 0">'.$this->m_fungsi->tanggal_format_indonesia($data_pl->tgl).'</td>
            <td style="padding:5px 0">KEPADA</td>
            <td style="text-align:center;padding:5px 0">:</td>
            <td style="padding:5px 0">'.$data_pl->nm_perusahaan.'</td>
        </tr>
        <tr>
            <td style="padding:5px 0">NO. SURAT JALAN</td>
            <td style="text-align:center;padding:5px 0">:</td>
            <td style="padding:5px 0">'.$data_pl->no_surat.'</td>
            <td style="padding:5px 0">ALAMAT</td>
            <td style="text-align:center;padding:5px 0">:</td>
            <td style="padding:5px 0">'.$data_pl->alamat_perusahaan.'</td>
        </tr>
        <tr>
            <td style="padding:5px 0">NO. SO</td>
            <td style="text-align:center;padding:5px 0">:</td>
            <td style="padding:5px 0">'.$data_pl->no_so.'</td>
            <td style="padding:5px 0">ATTN</td>
            <td style="text-align:center;padding:5px 0">:</td>
            <td style="padding:5px 0">'.$data_pl->nama.'</td>
        </tr>
        <tr>
            <td style="padding:5px 0">NO. PKB</td>
            <td style="text-align:center;padding:5px 0">:</td>
            <td style="padding:5px 0">'.$data_pl->no_pkb.'</td>
            <td style="padding:5px 0">NO. TELP / HP</td>
            <td style="text-align:center;padding:5px 0">:</td>
            <td style="padding:5px 0">'.$data_pl->no_telp.'</td>
        </tr>
        <tr>
            <td style="padding:5px 0">NO. KENDARAAN</td>
            <td style="text-align:center;padding:5px 0">:</td>
            <td style="padding:5px 0">'.$data_pl->no_kendaraan.'</td>
            <td style="padding:5px 0">KETERANGAN</td>
            <td style="text-align:center;padding:5px 0">:</td>
            <td style="padding:5px 0">PACKING LIST TERLAMPIR</td>
        </tr>';

        $html .= '</table>';


                             # # # # # # # # # I S I # # # # # # # # # #



        $html .= '<table cellspacing="0" style="font-size:11px !important;color:'.$ink.';border-collapse:collapse;text-align:center;width:100%;font-family:Arial !important">
        <tr>
            <th style="width:5% !important;height:15px"></th>
            <th style="width:30% !important;height:15px"></th>
            <th style="width:15% !important;height:15px"></th>
            <th style="width:30% !important;height:15px"></th>
            <th style="width:10% !important;height:15px"></th>
            <th style="width:10% !important;height:15px"></th>
        </tr>
        <tr>
            <td style="border:1px solid '.$ink.';padding:5px 0">NO</td>
            <td style="border:1px solid '.$ink.';padding:5px 0">NO. PO</td>
            <td style="border:1px solid '.$ink.';padding:5px 0">SIZE</td>
            <td style="border:1px solid '.$ink.';padding:5px 0">ITEM DESCRIPTION</td>
            <td style="border:1px solid '.$ink.';padding:5px 0">QTY</td>
            <td style="border:1px solid '.$ink.';padding:5px 0">BERAT</td>
        </tr>';


        // AMBIL DATA
        $data_detail = $this->db->query("
        SELECT g_label,a.nm_ker AS ker,width,COUNT(*) AS qty,SUM(weight) AS berat,b.no_po as po FROM m_timbangan a
        INNER JOIN pl b ON a.id_pl=b.id
        WHERE b.no_pkb='$jenis'
        GROUP BY g_label,width,po
        ORDER BY po,g_label,width ASC");

        $no = 1;
        $tot_qty= 0;
        $tot_berat= 0;

        $count = $data_detail->num_rows();            
            
        foreach ($data_detail->result() as $data ) {

            $html .= '<tr>
                <td style="border:1px solid '.$ink.';padding:5px 0">'.$no.'</td>
                <td style="border:1px solid '.$ink.';padding:5px 0">'.$data->po.'</td>
                <td style="border:1px solid '.$ink.';padding:5px 0">'.$data->g_label.' GSM</td>';
            

            // PILIH JENIS KERTAS
            if($data->ker == 'MH'){
                $html .= '<td style="border:1px solid '.$ink.';padding:5px 0">KERTAS MEDIUM ROLL, LB '.round($data->width,2).'</td>';
            }else if($data->ker == 'WP'){
                $html .= '<td style="border:1px solid '.$ink.';padding:5px 0">KERTAS COKLAT ROLL, LB '.round($data->width,2).'</td>';
            }
            

            $html .= '<td style="border:1px solid '.$ink.';padding:5px 0">'.$data->qty.' ROLL</td>
                <td style="border:1px solid '.$ink.';padding:5px 0">'.number_format($data->berat).' KG</td>';
        
            $no++;
            $tot_qty += $data->qty;
            $tot_berat += $data->berat;

        }

        if($count == 1) {
            for($i = 0; $i < 5; $i++){ 
                $cc = 1;
                $xx = 5;
            }
        }else if($count == 2){
            for($i = 0; $i < 4; $i++){
                $cc = 2;
                $xx = 4;
            }
        }else if($count == 3){
            for($i = 0; $i < 3; $i++){
                $cc = 3;
                $xx = 3;
            }
        }else if($count == 4){
            for($i = 0; $i < 2; $i++){ 
                $cc = 4;
                $xx = 2;
            }
        }else if($count == 5){  
                $cc = 5;
                $xx = 1;
        }
        

        if($count == $cc) {
            for($i = 0; $i < $xx; $i++){
                $html .= '<tr>
                <td style="border:1px solid '.$ink.';padding:11px 0"></td>
                <td style="border:1px solid '.$ink.';padding:11px 0"></td>
                <td style="border:1px solid '.$ink.';padding:11px 0"></td>
                <td style="border:1px solid '.$ink.';padding:11px 0"></td>
                <td style="border:1px solid '.$ink.';padding:11px 0"></td>
                <td style="border:1px solid '.$ink.';padding:11px 0"></td>';    
            }
        }
        

        $html .= '<tr>
            <td style="border:1px solid '.$ink.';padding:5px 0" colspan="4">TOTAL</td>
            <td style="border:1px solid '.$ink.';padding:5px 0">'.$tot_qty.' ROLL</td>
            <td style="border:1px solid '.$ink.';padding:5px 0">'.number_format($tot_berat).' KG</td>
        </tr>';

        $html .= '</table>';


                             # # # # # # # # # T T D # # # # # # # # # #      


        if($count_kop >= '12'){
            $px_ttd = '15px';
            $px_note = '25px';
        }else{
            $px_ttd = '35px';
            $px_note = '50px';
        }

        $html .= '<table cellspacing="0" style="font-size:11px !important;color:'.$ink.';border-collapse:collapse;text-align:center;width:100%;font-family:Arial !important">
        <tr>
            <th style="width:16% !important;height:'.$px_ttd.'"></th>
            <th style="width:14% !important;height:'.$px_ttd.'"></th>
            <th style="width:14% !important;height:'.$px_ttd.'"></th>
            <th style="width:14% !important;height:'.$px_ttd.'"></th>
            <th style="width:14% !important;height:'.$px_ttd.'"></th>
            <th style="width:14% !important;height:'.$px_ttd.'"></th>
            <th style="width:14% !important;height:'.$px_ttd.'"></th>
        </tr>

        <tr>
            <td style="border:1px solid '.$ink.';padding:5px 0">DIBUAT</td>
            <td style="border:1px solid '.$ink.';padding:5px 0" colspan="2">DIKELUARKAN OLEH</td>
            <td style="border:1px solid '.$ink.';padding:5px 0">DI KETAHUI</td>
            <td style="border:1px solid '.$ink.';padding:5px 0">DI SETUJUI</td>
            <td style="border:1px solid '.$ink.';padding:5px 0">SOPIR</td>
            <td style="border:1px solid '.$ink.';padding:5px 0">DITERIMA</td>
        </tr>

        <tr>
            <td style="border:1px solid '.$ink.';height:80px"></td>
            <td style="border:1px solid '.$ink.';height:80px"></td>
            <td style="border:1px solid '.$ink.';height:80px"></td>
            <td style="border:1px solid '.$ink.';height:80px"></td>
            <td style="border:1px solid '.$ink.';height:80px"></td>
            <td style="border:1px solid '.$ink.';height:80px"></td>
            <td style="border:1px solid '.$ink.';height:80px"></td>
        </tr>
   
        <tr>
            <td style="border:1px solid '.$ink.';padding:5px 0">ARGA <br>ADMIN</td>
            <td style="border:1px solid '.$ink.';padding:5px 0">BP. DAMIRI <br>LAB./QC</td>
            <td style="border:1px solid '.$ink.';padding:5px 0">TITUT <br>SPV GUDANG</td>
            <td style="border:1px solid '.$ink.';padding:5px 0">BP. RIDWAN <br>MGR GUDANG</td>
            <td style="border:1px solid '.$ink.';padding:5px 0">BP. WEINARTO <br>GM</td>
            <td style="border:1px solid '.$ink.'"></td>
            <td style="border:1px solid '.$ink.'"></td>
        </tr>

        <tr>
            <td style="height:'.$px_note.'" colspan="7"></td>
        </tr>

        <tr>
            <td style="font-weight:normal;text-align:left;padding:3px 0">NOTE :</td>
        </tr>

        <tr>
            <td style="font-weight:normal;text-align:left;padding:3px 0 3px 40px">WHITE</td>
            <td style="font-weight:normal;text-align:left;padding:3px 0" colspan="2" >: PEMBELI / CUSTOMER</td>
        </tr>

        <tr>
            <td style="font-weight:normal;text-align:left;padding:3px 0 3px 40px">PINK</td>
            <td style="font-weight:normal;text-align:left;padding:3px 0">: FINANCE</td>
        </tr>

        <tr>
            <td style="font-weight:normal;text-align:left;padding:3px 0 3px 40px">YELLOW</td>
            <td style="font-weight:normal;text-align:left;padding:3px 0">: ACC</td>
        </tr>

        <tr>
            <td style="font-weight:normal;text-align:left;padding:3px 0 3px 40px">GREEN</td>
            <td style="font-weight:normal;text-align:left;padding:3px 0">: ADMIN</td>
        </tr>

        <tr>
            <td style="font-weight:normal;text-align:left;padding:3px 0 3px 40px">BLUE</td>
            <td style="font-weight:normal;text-align:left;padding:3px 0">: EXPEDISI</td>
        </tr>
        ';
        $html .= '</table>';

        // $this->m_fungsi->_mpdf('',$html,10,10,10,'P');

            ################## CETAK

        if ($ctk == '0') {
            $this->m_fungsi->_mpdf('',$html,10,10,10,'P');
        }else{


            /////////////////// CETAK PACKING LIST ///////////////////////////////////////////////////////////


            $html = '';

            $data_header = $this->db->query("SELECT DISTINCT a.* FROM pl a
                INNER JOIN m_timbangan b ON a.id=b.id_pl
                WHERE a.no_pkb='$jenis'
                GROUP BY a.id
                ORDER BY no_po DESC,g_label DESC,width DESC");

            foreach ($data_header->result() as $data_pl) {
                
                $html .= '<table cellspacing="0" cellpadding="2" style="font-size:10px;width:100%;vertical-align:top;border-collapse:collapse;color:'.$ink.'" >
                <tr>
                    <th style="padding:0;width:16%"></th>
                    <th style="padding:0;width:1%"></th>
                    <th style="padding:0;width:33%"></th>
                    <th style="padding:0;width:16%"></th>
                    <th style="padding:0;width:1%"></th>
                    <th style="padding:0;width:33%"></th>
                </tr>';

                $html .= '<tr>
                    <td align="center" colspan="6"><b><u>PACKING LIST</u></b> <br> &nbsp;</td>
                </tr>
                    <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td>'.$this->m_fungsi->tanggal_format_indonesia($data_pl->tgl).'</td>
                    <td>Kepada</td>
                    <td>:</td>
                    <td>'.$data_pl->nm_perusahaan.'</td>
                </tr>
                <tr>
                    <td>No Surat Jalan</td>
                    <td>:</td>
                    <td>'.$data_pl->no_surat.'</td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td style="overflow-wrap:break-word !important">'.$data_pl->alamat_perusahaan.'</td>
                </tr>
                <tr>
                    <td>No SO</td>
                    <td>:</td>
                    <td>'.$data_pl->no_so.'</td>
                    <td>ATTN</td>
                    <td>:</td>
                    <td>'.$data_pl->nama.'</td>
                </tr>
                <tr>
                    <td>No PKB</td>
                    <td>:</td>
                    <td>'.$data_pl->no_pkb.'</td>
                    <td>No Telp / No HP</td>
                    <td>:</td>
                    <td>'.$data_pl->no_telp.'</td>
                </tr>
                <tr>
                    <td>No Kendaraan</td>
                    <td>:</td>
                    <td>'.$data_pl->no_kendaraan.'</td>
                    <td>No PO</td>
                    <td>:</td>
                    <td>'.$data_pl->no_po.'</td>
                </tr>
                ';

                $html .= '</table>';

                $id_pl = $data_pl->id;

                $data_detail = $this->db->query("SELECT * FROM m_timbangan WHERE id_pl = '$id_pl' ORDER BY roll");

                $html .= '<table cellspacing="0" cellpadding="5" style="font-size:11px;width:100%;text-align:center;border-collapse:collapse;color:'.$ink.'" >
                    <tr>
                        <th style="padding:5px 0;width:8%"></th>
                        <th style="padding:5px 0;width:12%"></th>
                        <th style="padding:5px 0;width:12%"></th>
                        <th style="padding:5px 0;width:12%"></th>
                        <th style="padding:5px 0;width:13%"></th>
                        <th style="padding:5px 0;width:13%"></th>
                        <th style="padding:5px 0;width:10%"></th>
                        <th style="padding:5px 0;width:16%"></th>
                    </tr>';

                $html .= '<tr>
                        <td style="border:1px solid '.$ink.'">No</td>
                        <td style="border:1px solid '.$ink.'" colspan="2">Nomer Roll</td>
                        <td style="border:1px solid '.$ink.'">Gramage (GSM)</td>
                        <td style="border:1px solid '.$ink.'">Lebar (CM)</td>
                        <td style="border:1px solid '.$ink.'">Berat (KG)</td>
                        <td style="border:1px solid '.$ink.'">JOINT</td>
                        <td style="border:1px solid '.$ink.'">KETERANGAN</td>
                    </tr>';

                    $no = 1;
                    foreach ($data_detail->result() as $r) {
                        $html .= '<tr>
                            <td style="border:1px solid '.$ink.'">'.$no.'</td>
                            <td style="border:1px solid '.$ink.'">'.substr($r->roll,0, 5).'</td>
                            <td style="border:1px solid '.$ink.'">'.substr($r->roll,6, 15).'</td>
                            <td style="border:1px solid '.$ink.'">'.$r->g_label.'</td>
                            <td style="border:1px solid '.$ink.'">'.round($r->width,2).'</td>
                            <td style="border:1px solid '.$ink.'">'.$r->weight.'</td>
                            <td style="border:1px solid '.$ink.'">'.$r->joint.'</td>
                            <td style="border:1px solid '.$ink.'"></td>
                        </tr>';
                        $no++;
                    }

                $total_pl = $this->db->query("SELECT DISTINCT COUNT(*) AS totpl,width,SUM(weight) AS tot FROM m_timbangan WHERE id_pl = '$id_pl' ORDER BY roll")->row();
                $count_pl = $this->db->query("SELECT DISTINCT width FROM m_timbangan WHERE id_pl = '$id_pl' GROUP BY width")->num_rows();

                if($count_pl == '1'){
                    $html .='
                    <tr>
                        <td style="border:1px solid '.$ink.'" colspan="4" ><b>'.($total_pl->totpl).' ROLL (@ LB '.round( $total_pl->width,2).' )</b></td>';    
                }else if($count_pl <> '1'){
                    $html .='
                    <tr>
                        <td style="border:1px solid '.$ink.'" colspan="4" ><b>-</b></td>';
                }                        

                $html .='<td style="border:1px solid '.$ink.'"><b>Total</b></td>
                        <td style="border:1px solid '.$ink.'"><b>'.number_format($total_pl->tot).'</b></td>
                        <td style="border:1px solid '.$ink.'"><b></b></td>
                        <td style="border:1px solid '.$ink.'"><b></b></td>
                    </tr>';

                $html .= '</table>';
                $html .= '<div style="page-break-after:always"></div>'; 

            }

            $this->m_fungsi->_mpdf2('',$html,10,10,10,'P');
        }
    }



    function print_lbl_pl(){
        $jenis = $_GET['jenis'];
        $ctk = $_GET['ctk'];

        $data_detail = $this->db->query("SELECT * FROM m_timbangan WHERE id_pl='$jenis' ORDER BY roll ASC");
        $data_perusahaan = $this->db->query("SELECT * FROM perusahaan limit 1")->row();

        $html = '';

        $warna = 'hitam';

        if($warna == 'hitam'){
            $ink = '#000';
        }else{
            $ink = '#444';
        }

        if ($data_detail->num_rows() > 0) {
        foreach ($data_detail->result() as $data ) {

            if($ctk == 0){

                $pp = "Epson";

                if($pp == "Epson"){
                    $ppx = "0 0 0 5px";
                }else{
                    $ppx = "0 0 0 35px";
                }

                // 35PX
               $html .= '
               <div style="margin:'.$ppx.';color:'.$ink.'">
                <center> 
                    <h1 style="color:'.$ink.'"> '.$data_perusahaan->nama.' </h1>  '.$data_perusahaan->daerah.' , Email : '.$data_perusahaan->email.'
                </center>
               </div>
                <hr>';

                // 35PX
                $html .= '<br><br><br>
                         <table width="100%" cellspacing="0" cellpadding="5" style="font-size:52px;color:'.$ink.';margin:'.$ppx.'">
                            <tr>
                                <td style="border:1px solid '.$ink.'" align="left" width="50%">QUALITY</td>
                                <td style="border:1px solid '.$ink.'" align="center">'.$data->nm_ker.'</td>
                            </tr>
                            <tr>
                                <td style="border:1px solid '.$ink.'" align="left">GRAMMAGE</td>
                                <td style="border:1px solid '.$ink.'" align="center">'.$data->g_label.' GSM</td>
                            </tr>
                            <tr>
                            <tr>
                                <td style="border:1px solid '.$ink.'" align="left">WIDTH</b></td>
                                <td style="border:1px solid '.$ink.'" align="center">'.round($data->width,2).' CM</td>
                            </tr>
                            <tr>
                            <tr>
                                <td style="border:1px solid '.$ink.'" align="left">DIAMETER</td>
                                <td style="border:1px solid '.$ink.'" align="center">'.$data->diameter.' CM</td>
                            </tr>
                            <tr>
                            <tr>
                                <td style="border:1px solid '.$ink.'" align="left">WEIGHT</td>
                                <td style="border:1px solid '.$ink.'" align="center">'.$data->weight.' KG</td>
                            </tr>
                            <tr>
                            <tr>
                                <td style="border:1px solid '.$ink.'" align="left">JOINT</td>
                                <td style="border:1px solid '.$ink.'" align="center">'.$data->joint.' </td>
                            </tr>
                            <tr>
                            <tr>
                                <td style="border:1px solid '.$ink.'" align="left">ROLL NUMBER</td>
                                <td style="border:1px solid '.$ink.'" align="center">'.$data->roll.' </td>
                            </tr>
                            <tr>
                    </table>';

                // $html .= '<table style="margin:5px 0 0 30px;padding:0;text-align:center;font-size:8px;color:'.$ink.';width:100%;border-collapse:collapse">
                //     <tr>
                //         <td style="border:0">A D N</td>
                //     </tr>
                // </table>';
                    
            }else if($ctk == 1){
                    $html .= '
                        <div style="padding-top:95px;display:block;">
                         <table width="100%" border="1" cellspacing="0" cellpadding="5" style="font-size:37px;margin-bottom:600px">
                            <tr>
                                <td align="left">QUALITY</td>
                                <td align="center">'.$data->nm_ker.'</td>
                            </tr>
                            <tr>
                                <td align="left">GRAMMAGE</td>
                                <td align="center">'.$data->g_label.' GSM</td>
                            </tr>
                            <tr>
                            <tr>
                                <td align="left">WIDTH</td>
                                <td align="center">'.round($data->width,2).' CM</td>
                            </tr>
                            <tr>
                            <tr>
                                <td align="left">DIAMETER</td>
                                <td align="center">'.$data->diameter.' CM</td>
                            </tr>
                            <tr>
                            <tr>
                                <td align="left">WEIGHT</td>
                                <td align="center">'.$data->weight.' KG</td>
                            </tr>
                            <tr>
                            <tr>
                                <td align="left">JOINT</td>
                                <td align="center">'.$data->joint.' </td>
                            </tr>
                            <tr>
                            <tr>
                                <td align="left">ROLL NUMBER</td>
                                <td align="center">'.$data->roll.'</td>
                            </tr>
                            <tr>
                          </table></div>';
                }
            }

            if ($ctk == 0) {
                // echo $html;
                $this->m_fungsi->_mpdf('',$html,10,10,10,'L');
            }else if($ctk == 1){
                $this->m_fungsi->_mpdf('',$html,10,10,10,'P');
            }
            
        }
        
    }

    function print_invoice_v2(){
        $no_invoice = $_GET['no_invoice'];
        $ctk = 0;

        $html = '';

        $warna = 'hitam';

        if($warna == 'hitam'){
            $ink = '#000';
        }else{
            $ink = '#444';
        }

//////////////////////////////////////// K O P ////////////////////////////////////////

        $data_detail = $this->db->query("
        SELECT DISTINCT a.no_invoice,c.tgl,a.jto,a.nm_perusahaan,a.alamat,a.kepada,a.no_surat,c.no_pkb,c.no_po FROM th_invoice a
        INNER JOIN tr_invoice b ON a.no_invoice = b.no_invoice
        INNER JOIN pl c ON a.no_pkb = c.no_pkb
        WHERE a.no_invoice = '$no_invoice'
        GROUP BY a.no_invoice,a.jto,a.nm_perusahaan,a.alamat,a.kepada,a.no_surat,c.no_pkb,c.no_po
        LIMIT 1")->row();

        if($data_detail->kepada == 'BP. ZAENUROCHMAN'){

            $html .= '<table cellspacing="0" style="font-size:11px;color:'.$ink.';border-collapse:collapse;vertical-align:top;width:100%;text-align:center;font-weight:bold;font-family:"Trebuchet MS", Helvetica, sans-serif">
            <tr>
                <th style="border:0;height:136px"></th>
            </tr>
            <tr>
                <td style="background:#ddd;border:1px solid '.$ink.';padding:6px;font-size:14px !important">INVOICE</td>
            </tr>';
            $html .= '</table>';
        
        }else if($data_detail->kepada <> 'BP. ZAENUROCHMAN'){
            
            $html .= '<table cellspacing="0" style="font-size:11px;color:'.$ink.';border-collapse:collapse;vertical-align:top;width:100%;text-align:center;font-weight:bold;font-family:"Trebuchet MS", Helvetica, sans-serif">
            <tr>
                <th style="border:0;width:15% !important;height:0"></th>
                <th style="border:0;width:55% !important;height:0"></th>
                <th style="border:0;width:25% !important;height:0"></th>
            </tr>

            <tr>
                <td style="background:url(http://localhost/SI_timbangan_v2/assets/images/logo_ppi_1.png)center no-repeat" rowspan="3"></td>
                <td style="font-size:25px;padding:20px 0 0">PT. PRIMA PAPER INDONESIA</td>
            </tr>
            <tr>
                <td style="font-size:11px">Dusun Timang Kulon, Desa Wonokerto, Kec.Wonogiri, Kab.Wonogiri</td>
                <td style="font-size:11px"></td>
            </tr>
            <tr>
                <td style="font-size:11px;padding:0 0 20px">WONOGIRI - JAWA TENGAH - INDONESIA Kode Pos 57615</td>
                <td style="font-size:11px;padding:0 0 20px"></td>
            </tr>';
            $html .= '</table>';

            $html .= '<table cellspacing="0" style="font-size:11px;color:'.$ink.';border-collapse:collapse;vertical-align:top;width:100%;text-align:center;font-weight:bold;font-family:"Trebuchet MS", Helvetica, sans-serif">
            <tr>
                <th style="height:0"></th>
            </tr>
            <tr>
                <td style="background:#ddd;border:1px solid '.$ink.';padding:6px;font-size:14px !important">INVOICE</td>
            </tr>';
            $html .= '</table>';
        }       

////////////////////////////////////// D E T A I L //////////////////////////////////////

        $html .= '<table cellspacing="0" style="font-size:11px;color:'.$ink.';border-collapse:collapse;vertical-align:top;width:100%;font-family:"Trebuchet MS", Helvetica, sans-serif">
        <tr>
            <th style="padding:2px 0;height:0;width:16%"></th>
            <th style="padding:2px 0;height:0;width:1%"></th>
            <th style="padding:2px 0;height:0;width:33%"></th>
            <th style="padding:2px 0;height:0;width:16%"></th>
            <th style="padding:2px 0;height:0;width:1%"></th>
            <th style="padding:2px 0;height:0;width:33%"></th>
        </tr>';

        $html .= '
        <tr>
            <td colspan="3"></td>
            <td style="padding:3px 0 20px;font-weight:bold">NOMOR</td>
            <td style="padding:3px 0 20px;font-weight:bold">:</td>
            <td style="padding:3px 0 20px;font-weight:bold">'.$data_detail->no_invoice.'</td>
        </tr>
        <tr>
            <td style="padding:3px 0">Nama Perusahaan</td>
            <td style="padding:3px 0">:</td>
            <td style="padding:3px 0">'.$data_detail->nm_perusahaan.'</td>
            <td style="padding:3px 0;font-weight:bold">Jatuh Tempo</td>
            <td style="padding:3px 0">:</td>
            <td style="padding:3px 0;font-weight:bold;color:#f00">'.$this->m_fungsi->tanggal_format_indonesia($data_detail->jto).'</td>
        </tr>';

        $sql_po = "
        SELECT DISTINCT a.no_invoice,a.jto,a.nm_perusahaan,a.alamat,a.kepada,a.no_surat,c.no_pkb,c.no_po FROM th_invoice a
        INNER JOIN tr_invoice b ON a.no_invoice = b.no_invoice
        INNER JOIN pl c ON a.no_pkb = c.no_pkb
        WHERE a.no_invoice = '$no_invoice'
        GROUP BY a.no_invoice,a.jto,a.nm_perusahaan,a.alamat,a.kepada,a.no_surat,c.no_pkb,c.no_po";

        $count_po = $this->db->query($sql_po)->num_rows();
        $result_po = $this->db->query($sql_po);

        if($count_po == '1'){
            // PO SATU
            $html .= '
            <tr>
                <td style="padding:3px 0">Alamat</td>
                <td style="padding:3px 0">:</td>
                <td style="padding:3px 0">'.$data_detail->alamat.'</td>
                <td style="padding:3px 0">No. PO</td>
                <td style="padding:3px 0">:</td>
                <td style="padding:3px 0">'.$data_detail->no_po.'</td>
            </tr>';
        }else if($count_po <> '1'){
            // PO LEBIH DARI SATU
            $html .= '
            <tr>
                <td style="padding:3px 0">Alamat</td>
                <td style="padding:3px 0">:</td>
                <td style="padding:3px 0">'.$data_detail->alamat.'</td>
                <td style="padding:3px 0"></td>
                <td style="padding:3px 0"></td>
                <td style="padding:3px 0"></td>
            </tr>';
            foreach ($result_po->result() as $r) {
                $html .= '
                <tr>
                    <td style="padding:3px 0"></td>
                    <td style="padding:3px 0"></td>
                    <td style="padding:3px 0"></td>
                    <td style="padding:3px 0">No. PO</td>
                    <td style="padding:3px 0">:</td>
                    <td style="padding:3px 0">'.$r->no_po.'</td>
                </tr>';
            }
        }

        $html .= '<tr>
            <td style="padding:3px 0">Kepada</td>
            <td style="padding:3px 0">:</td>
            <td style="padding:3px 0">'.$data_detail->kepada.'</td>
            <td style="padding:3px 0">No. Surat Jalan</td>
            <td style="padding:3px 0">:</td>
            <td style="padding:3px 0">'.$data_detail->no_surat.'</td>
        </tr>';

        $html .= '</table>';

/////////////////////////////////////////////// I S I ///////////////////////////////////////////////

        $html .= '<table cellspacing="0" style="font-size:11px;color:'.$ink.';border-collapse:collapse;vertical-align:top;width:100%;font-family:"Trebuchet MS", Helvetica, sans-serif">
        <tr>
            <th style="height:15px;width:30%"></th>
            <th style="height:15px;width:10%"></th>
            <th style="height:15px;width:20%"></th>
            <th style="height:15px;width:20%"></th>
            <th style="height:15px;width:20%"></th>
        </tr>';

        $html .= '<tr>
            <td style="border:1px solid '.$ink.';border-width:2px 0;padding:5px 0;text-align:center;font-weight:bold">NAMA BARANG</td>
            <td style="border:1px solid '.$ink.';border-width:2px 0;padding:5px 0;text-align:center;font-weight:bold">SATUAN</td>
            <td style="border:1px solid '.$ink.';border-width:2px 0;padding:5px 0;text-align:center;font-weight:bold">JUMLAH</td>
            <td style="border:1px solid '.$ink.';border-width:2px 0;padding:5px 0;text-align:center;font-weight:bold">HARGA</td>
            <td style="border:1px solid '.$ink.';border-width:2px 0;padding:5px 0;text-align:center;font-weight:bold">TOTAL</td>
        </tr>';

        $sql_label = "
        SELECT DISTINCT c.no_invoice AS inv,d.g_label,b.nm_ker FROM pl a
        INNER JOIN m_timbangan b ON a.id = b.id_pl
        INNER JOIN th_invoice c ON a.no_pkb = c.no_pkb
        INNER JOIN tr_invoice d ON c.no_invoice = d.no_invoice
        WHERE c.no_invoice = '$no_invoice'
        GROUP BY c.no_invoice,d.g_label,b.nm_ker";

        $sql_label2 = "
        SELECT DISTINCT d.g_label AS lbl,b.nm_ker AS ker FROM pl a
        INNER JOIN m_timbangan b ON a.id = b.id_pl
        INNER JOIN th_invoice c ON a.no_pkb = c.no_pkb
        INNER JOIN tr_invoice d ON c.no_invoice = d.no_invoice
        WHERE c.no_invoice = '$no_invoice'
        GROUP BY c.no_invoice,d.g_label,b.nm_ker LIMIT 1";

        $count_label   = $this->db->query($sql_label)->num_rows();
        $result_label2  = $this->db->query($sql_label2)->row();

        ////

        $sql_isi = "SELECT DISTINCT d.no_invoice,d.g_label,d.width_lb AS wlb,d.roll AS roll,d.satuan,d.jumlah,d.harga FROM pl a
        INNER JOIN m_timbangan b ON a.id = b.id_pl
        INNER JOIN th_invoice c ON a.no_pkb = c.no_pkb
        INNER JOIN tr_invoice d ON c.no_invoice = d.no_invoice
        WHERE c.no_invoice = '$no_invoice'
        GROUP BY d.no_invoice,d.g_label,d.width_lb,d.roll,d.satuan,d.jumlah,d.harga
        ORDER BY d.width_lb ASC";
        $result_isi  = $this->db->query($sql_isi);

        if($count_label == '1'){
            // label
            if($result_label2->ker == "MH"){
                $ket = 'KERTAS MEDIUM ROLL';
            }else if($result_label2->ker == "WP"){
                $ket = 'KERTAS COKLAT ROLL';
            }

            $html .= '<tr>
                <td style="padding:8px 0 4px" colspan="4">'.$ket.' '.$result_label2->lbl.' GSM</td>
                <td style="padding:8px 0 4px"></td>
            </tr>';

            // detail isi
            $tot_isi = 0;
            $tot_tot = 0;
            foreach($result_isi->result() as $r){
                $html .= '<tr>
                    <td style="padding:3px 0">'.$r->wlb.' = '.$r->roll.' ROLL</td>
                    <td style="padding:3px 0;text-align:center">'.$r->satuan.'</td>
                    <td style="padding:3px 0;text-align:center">'.number_format($r->jumlah).'</td>
                    <td style="padding:3px 0;text-align:right">Rp. '.number_format($r->harga).'</td>
                    <td style="padding:3px 0;text-align:right">Rp. '.number_format($r->jumlah * $r->harga).'</td>
                </tr>
                ';

                $tot_isi += $r->jumlah * $r->harga;
                $tot_tot += $r->jumlah;
            }
            
            // total
            $html .= '<tr>
                <td style="padding:15px 0;text-align:center" colspan="2">TOTAL</td>
                <td style="padding:15px 0;text-align:center">'.number_format($tot_tot).'</td>
                <td style="padding:15px 0;text-align:right" colspan="2">Rp. '.number_format($tot_isi).'</td>
            </tr>';

        // gsm lebih dari 1
        }else if($count_label <> '1'){

            $rslt_lbh_2 = $this->db->query($sql_label);

            foreach($rslt_lbh_2->result() as $r) {

                $inv_2 = $r->inv;
                $label_2 = $r->g_label;
                // label
                $html .= '<tr>
                    <td style="padding:8px 0 4px" colspan="4">KERTAS MEDIUM '.$label_2.' GSM</td>
                    <td style="padding:8px 0 4px"></td>
                </tr>';

                $sql_isi_lbh2 = "SELECT DISTINCT d.no_invoice,d.g_label,d.width_lb AS wlb,d.roll AS roll,d.satuan,d.jumlah,d.harga FROM pl a
                INNER JOIN m_timbangan b ON a.id = b.id_pl
                INNER JOIN th_invoice c ON a.no_pkb = c.no_pkb
                INNER JOIN tr_invoice d ON c.no_invoice = d.no_invoice
                WHERE c.no_invoice = '$inv_2' AND d.g_label='$label_2'
                GROUP BY d.no_invoice,d.g_label,d.width_lb,d.roll,d.satuan,d.jumlah,d.harga
                ORDER BY d.width_lb ASC";
                $isi_lbh_2 = $this->db->query($sql_isi_lbh2);

                // isi
                // $tot_isi = 0;
                foreach($isi_lbh_2->result() as $r2){
                    $html .= '<tr>
                        <td style="padding:3px 0">'.$r2->wlb.' = '.$r2->roll.' ROLL</td>
                        <td style="padding:3px 0;text-align:center">'.$r2->satuan.'</td>
                        <td style="padding:3px 0;text-align:center">'.number_format($r2->jumlah).'</td>
                        <td style="padding:3px 0;text-align:right">Rp. '.number_format($r2->harga).'</td>
                        <td style="padding:3px 0;text-align:right">Rp. '.number_format($r2->jumlah * $r2->harga).'</td>
                    </tr>
                    ';
                }

                $sql_tot_isi2 = $this->db->query("
                SELECT SUM(jumlah*harga) AS jml FROM tr_invoice
                WHERE no_invoice = '$inv_2'")->row();
                
                $tot_isi = $sql_tot_isi2->jml;

            }

            // sub total
            $html .= '<tr>
                <td style="padding:15px 0" colspan="4"></td>
                <td style="padding:15px 0;text-align:right">Rp. '.number_format($tot_isi).'</td>
            </tr>';

        }


        ///
        

//////////////////////////////////////////////// T O T A L ////////////////////////////////////////////////

        // RUMUS
        $ppn10         = 0.1 * $tot_isi;
        $pph22         = 0.01 * $tot_isi;
        $ter_tot_ppn10 = round($tot_isi + (0.1 * $tot_isi));
        $ter_tot_pph22 = round($tot_isi + (0.1 * $tot_isi) + (0.01 * $tot_isi));

        if($data_detail->kepada == 'BP. ZAENUROCHMAN'){//

            $tot_isi = round($tot_isi);

            $html .= '<tr>
            <td style="border:2px solid '.$ink.';border-width:2px 0;padding:6px 0 3px" colspan="3" rowspan="3">Terbilang : <br/>
            <b><i>'.ucwords($this->m_fungsi->terbilang($tot_isi)).'</i></b></td>
            <td style="border-top:2px solid '.$ink.';padding:6px 0 3px">Sub Total</td>
            <td style="border-top:2px solid '.$ink.';padding:6px 0 3px;text-align:right">Rp. '.number_format($tot_isi).'</td>
            </tr>';

            $html .= '<tr>
                <td style="border:0;padding:10px 0"></td>
                <td style="border:0;padding:10px 0"></td>
            </tr>';

            $html .='<tr>
                <td style="border-bottom:2px solid '.$ink.';padding:3px 0 6px">Total</td>
                <td style="border-bottom:2px solid '.$ink.';padding:3px 0 6px;text-align:right">Rp. '.number_format($tot_isi).'</td>
            </tr>';
        }else if($data_detail->nm_perusahaan == 'PT. MADISON INTIPRATAMA'){
            $html .= '<tr>
            <td style="border:2px solid '.$ink.';border-width:2px 0;padding:6px 0 3px" colspan="3" rowspan="4">Terbilang : <br/>
            <b><i>'.ucwords($this->m_fungsi->terbilang($ter_tot_pph22)).'</i></b></td>
            <td style="border-top:2px solid '.$ink.';padding:6px 0 3px">Sub Total</td>
            <td style="border-top:2px solid '.$ink.';padding:6px 0 3px;text-align:right">Rp. '.number_format($tot_isi).'</td>
            </tr>';

            $html .= '<tr>
                <td style="padding:3px 0">Ppn 10%</td>
                <td style="padding:3px 0;text-align:right">Rp. '.number_format($ppn10).'</td>
            </tr>';

            $html .= '<tr>
                <td style="padding:3px 0">Pph 22</td>
                <td style="padding:3px 0;text-align:right">Rp. '.number_format($pph22).'</td>
            </tr>';

            $html .='<tr>
                <td style="border-bottom:2px solid '.$ink.';padding:3px 0 6px">Total</td>
                <td style="border-bottom:2px solid '.$ink.';padding:3px 0 6px;text-align:right">Rp. '.number_format($ter_tot_pph22).'</td>
            </tr>';
        }else if($data_detail->kepada <> 'BP. ZAENUROCHMAN'){
            $html .= '<tr>
            <td style="border:2px solid '.$ink.';border-width:2px 0;padding:6px 0 3px" colspan="3" rowspan="3">Terbilang : <br/>
            <b><i>'.ucwords($this->m_fungsi->terbilang($ter_tot_ppn10)).'</i></b></td>
            <td style="border-top:2px solid '.$ink.';padding:6px 0 3px">Sub Total</td>
            <td style="border-top:2px solid '.$ink.';padding:6px 0 3px;text-align:right">Rp. '.number_format($tot_isi).'</td>
            </tr>';

            $html .= '<tr>
                <td style="padding:3px 0">Ppn 10%</td>
                <td style="padding:3px 0;text-align:right">Rp. '.number_format($ppn10).'</td>
            </tr>';

            $html .='<tr>
                <td style="border-bottom:2px solid '.$ink.';padding:3px 0 6px">Total</td>
                <td style="border-bottom:2px solid '.$ink.';padding:3px 0 6px;text-align:right">Rp. '.number_format($ter_tot_ppn10).'</td>
            </tr>';
        }
                

//////////////////////////////////////////////// T T D ////////////////////////////////////////////////


        $html .= '<tr>
            <td style="padding:10px 0" colspan="4"></td>
            <td style="padding:10px 0"></td>
        </tr>
        <tr>
            <td style="padding:3px 0" colspan="3"></td>
            <td style="padding:3px 0;text-align:center" colspan="2">Wonogiri, '.$this->m_fungsi->tanggal_format_indonesia($data_detail->tgl).'</td>
        </tr>
        <tr>
            <td style="padding:10px 0" colspan="3"></td>
            <td style="padding:10px 0" colspan="2"></td>
        </tr>
        <tr>
            <td style="font-size:10px" colspan="3">Pembayaran Full Amount Di Transfer Ke :</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td style="font-size:10px" colspan="3">BANK IBK INDONESIA 350 21 000 58</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td style="font-size:10px" colspan="3">A.n PT. PRIMA PAPER INDONESIA</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td style="padding:5px 0" colspan="3"></td>
            <td style="padding:5px 0" colspan="2"></td>
        </tr>
        <tr>
            <td style="font-size:10px" colspan="3">* di email ke</td>
            <td style="text-align:center" colspan="2">Elyzabeth S.A.</td>
        </tr>
        <tr>
            <td style="font-size:10px" colspan="3">primapaperin@gmail.com / bethppi@yahoo.co.id</td>
            <td style="text-align:center" colspan="2">Finance</td>
        </tr>
        ';

        $html .= '</table>';

        $this->m_fungsi->_mpdf('',$html,10,10,10,'P');

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

    function print_stok_gudang() {
        $jenis = $_GET['jenis'];
        $ctk = $_GET['ctk'];

        $html = '';

        $html .= '<style>
            .str {
                mso-number-format:\@;
            }
        </style>';

        $warna = 'hitam';

        if($warna == 'hitam'){
            $ink = '#000';
        }else{
            $ink = '#444';
        }

        if($jenis == 'ALL' && $ctk == 0){

            // cetak semuanya pdf
            $q_uk = $this->db->query("SELECT width FROM m_timbangan WHERE (nm_ker='MH' OR nm_ker='MI') AND status='0' GROUP BY width ORDER BY width ASC");

            foreach ($q_uk->result() as $r ) {
                
                $dw = $r->width;

                $html .= '<table style="margin:0;padding:0;font-size:14px;font-weight:bold;color:'.$ink.';width:100%;border-collapse:collapse">
                    <tr>
                        <td colspan="7" style="border:0">UPDATE SPESIFIKASI FINISH GOOD - UPDATE TERBARU ( '.round($dw).' )</td>
                    </tr>
                </table>';

                $html .= '<table cellspacing="0" cellpadding="5" style="font-size:11px;width:100%;color:'.$ink.';text-align:center;border-collapse:collapse" >
                        <tr>
                            <th style="padding:5px 0;width:6%"></th>
                            <th style="padding:5px 0;width:16%"></th>
                            <th style="padding:5px 0;width:13%"></th>
                            <th style="padding:5px 0;width:15%"></th>
                            <th style="padding:5px 0;width:15%"></th>
                            <th style="padding:5px 0;width:14%"></th>
                            <th style="padding:5px 0;width:14%"></th>
                            <th style="padding:5px 0;width:7%"></th>
                        </tr>';

                $html .= '<tr>
                        <td style="border:1px solid '.$ink.'">No</td>
                        <td style="border:1px solid '.$ink.'">ROLL NUMBER</td>
                        <td style="border:1px solid '.$ink.'">JENIS KERTAS</td>
                        <td style="border:1px solid '.$ink.'">GRAMAGE (GSM)</td>
                        <td style="border:1px solid '.$ink.'">LEBAR (CM)</td>
                        <td style="border:1px solid '.$ink.'">DIAMETER</td>
                        <td style="border:1px solid '.$ink.'">BERAT (KG)</td>
                        <td style="border:1px solid '.$ink.'">JOINT</td>
                    </tr>';

                // ambil data
                $data_detail_all = $this->db->query("SELECT*FROM m_timbangan WHERE width='$dw' AND status='0' AND (nm_ker='MH' OR nm_ker='MI') ORDER BY roll ASC");

                $no = 1;
                foreach ($data_detail_all->result() as $r ) {
                    $html .= '<tr>
                                <td style="border:1px solid '.$ink.'">'.$no.'</td>
                                <td style="border:1px solid '.$ink.'">'.$r->roll.'</td>
                                <td style="border:1px solid '.$ink.'">'.$r->nm_ker.'</td>
                                <td class="str" style="border:1px solid '.$ink.'">'.$r->g_label.'</td>
                                <td class="str" style="border:1px solid '.$ink.'">'.round($r->width,2).'</td>
                                <td class="str" style="border:1px solid '.$ink.'">'.$r->diameter.'</td>
                                <td style="border:1px solid '.$ink.'">'.$r->weight.'</td>
                                <td class="str" style="border:1px solid '.$ink.'">'.$r->joint.'</td>
                            </tr>';
                    $no++;
                }

                $html .= '</table>';
                $html .= '<div style="page-break-after:always"></div>';
            }

        }else if($jenis == 'ALL' && $ctk == 1){

            // cetak semuanya excel

                $html .= '<table style="margin:0;padding:0;font-size:14px;font-weight:bold;color:'.$ink.';width:100%;border-collapse:collapse">
                    <tr>
                        <td colspan="7" style="border:0">UPDATE SPESIFIKASI FINISH GOOD - UPDATE TERBARU ALL</td>
                    </tr>
                </table>';

                $html .= '<table cellspacing="0" cellpadding="5" style="font-size:11px;width:100%;color:'.$ink.';text-align:center;border-collapse:collapse" >
                        <tr>
                            <th style="padding:5px 0;width:6%"></th>
                            <th style="padding:5px 0;width:16%"></th>
                            <th style="padding:5px 0;width:13%"></th>
                            <th style="padding:5px 0;width:15%"></th>
                            <th style="padding:5px 0;width:15%"></th>
                            <th style="padding:5px 0;width:14%"></th>
                            <th style="padding:5px 0;width:14%"></th>
                            <th style="padding:5px 0;width:7%"></th>
                        </tr>';

                $html .= '<tr>
                        <td style="border:1px solid '.$ink.'">No</td>
                        <td style="border:1px solid '.$ink.'">ROLL NUMBER</td>
                        <td style="border:1px solid '.$ink.'">JENIS KERTAS</td>
                        <td style="border:1px solid '.$ink.'">GRAMAGE (GSM)</td>
                        <td style="border:1px solid '.$ink.'">LEBAR (CM)</td>
                        <td style="border:1px solid '.$ink.'">DIAMETER</td>
                        <td style="border:1px solid '.$ink.'">BERAT (KG)</td>
                        <td style="border:1px solid '.$ink.'">JOINT</td>
                    </tr>';

                // ambil data
                $data_detail_all = $this->db->query("SELECT*FROM m_timbangan WHERE status='0' AND (nm_ker='MH' OR nm_ker='MI') ORDER BY roll ASC");

                $no = 1;
                $sum_weight = 0;
                foreach ($data_detail_all->result() as $r ) {
                    $html .= '<tr>
                                <td style="border:1px solid '.$ink.'">'.$no.'</td>
                                <td style="border:1px solid '.$ink.'">'.$r->roll.'</td>
                                <td style="border:1px solid '.$ink.'">'.$r->nm_ker.'</td>
                                <td class="str" style="border:1px solid '.$ink.'">'.$r->g_label.'</td>
                                <td class="str" style="border:1px solid '.$ink.'">'.round($r->width,2).'</td>
                                <td class="str" style="border:1px solid '.$ink.'">'.$r->diameter.'</td>
                                <td style="border:1px solid '.$ink.'">'.$r->weight.'</td>
                                <td class="str" style="border:1px solid '.$ink.'">'.$r->joint.'</td>
                            </tr>';
                    $no++;
                    $sum_weight += $r->weight;
                }

                $html .= '<tr>
                    <td style="border:1px solid #000" colspan="6" >TOTAL</td>
                    <td style="border:1px solid #000">'.$sum_weight.'</td>
                    <td style="border:1px solid #000"></td>
                </tr>';

                $html .= '</table>';

        }else if($jenis == 'ALL_REKAP'){
            // SEMUA GSM
            $html = '';

            $html .= '<table style="margin:0;padding:0;font-size:14px;font-weight:bold;color:'.$ink.';width:100%;border-collapse:collapse">
                <tr>
                    <td colspan="3" style="border:0">REKAP UPDATE SPESIFIKASI FINISH GOOD - UPDATE TERBARU ALL</td>
                </tr>
            </table>';
            
            $html .= '<table cellspacing="0" cellpadding="5" style="font-size:11px;width:100%;color:'.$ink.';text-align:center;border-collapse:collapse" >';

            $html .= '<tr>
                <th style="border:0;padding:5px 0;width:4%"></th>
                <th style="border:0;padding:5px 0;width:12%"></th>
                <th style="border:0;padding:5px 0;width:12%"></th>
                <th style="border:0;padding:5px 0;width:14%"></th>
                <th style="border:0;padding:5px 0;width:12%"></th>
                <th style="border:0;padding:5px 0;width:14%"></th>
                <th style="border:0;padding:5px 0;width:12%"></th>
                <th style="border:0;padding:5px 0;width:16%"></th>
            </tr>';

            $html .= '<tr>
                <td style="font-weight:bold;border:1px solid #000">NO</td>
                <td style="font-weight:bold;border:1px solid #000">WIDTH</td>
                <td style="font-weight:bold;border:1px solid #000">MH</td>
                <td style="font-weight:bold;border:1px solid #000">TOTAL MH</td>
                <td style="font-weight:bold;border:1px solid #000">MI</td>
                <td style="font-weight:bold;border:1px solid #000">TOTAL MI</td>
                <td style="font-weight:bold;border:1px solid #000">TOTAL ROLL</td>
                <td style="font-weight:bold;border:1px solid #000">TOTAL BERAT</td>
            </tr>';

            // ambil data
            $sql_rekap = $this->db->query("
                SELECT width,
                g_label AS gsm,
                (SELECT COUNT(*) FROM m_timbangan WHERE width = a.width  AND nm_ker='MH' AND status='0') AS mh_jml,
                (SELECT SUM(weight) FROM m_timbangan WHERE width = a.width  AND nm_ker='MH' AND status='0') AS mh_tot,
                (SELECT COUNT(*) FROM m_timbangan WHERE width = a.width  AND nm_ker='MI' AND status='0') AS mi_jml,
                (SELECT SUM(weight) FROM m_timbangan WHERE width = a.width  AND nm_ker='Mi' AND status='0') AS mi_tot,
                COUNT(*) AS all_jml,
                SUM(weight) AS all_total
                FROM m_timbangan a WHERE (nm_ker='MH' OR nm_ker='MI') AND status='0'
                GROUP BY width");

            $no = 1;
            $ton_mh_jml = 0;
            $ton_mh_tot = 0;
            $ton_mi_jml = 0;
            $ton_mi_tot = 0;
            $ton_jml = 0;
            $ton_tot = 0;
            foreach ($sql_rekap->result() as $r ) {
                $html .= '<tr>
                            <td style="border:1px solid '.$ink.'">'.$no.'</td>
                            <td style="border:1px solid '.$ink.'">'.round($r->width).'</td>
                            <td style="border:1px solid '.$ink.'">'.$r->mh_jml.'</td>
                            <td style="border:1px solid '.$ink.';text-align:right">'.number_format($r->mh_tot).'</td>
                            <td style="border:1px solid '.$ink.'">'.$r->mi_jml.'</td>
                            <td style="border:1px solid '.$ink.';text-align:right">'.number_format($r->mi_tot).'</td>
                            <td style="border:1px solid '.$ink.'">'.$r->all_jml.'</td>
                            <td style="border:1px solid '.$ink.';text-align:right">'.number_format($r->all_total).'</td>
                        </tr>';
                $no++;
                $ton_mh_jml += $r->mh_jml;
                $ton_mh_tot += $r->mh_tot;
                $ton_mi_jml += $r->mi_jml;
                $ton_mi_tot += $r->mi_tot;
                $ton_jml    += $r->all_jml;
                $ton_tot    += $r->all_total;
            }

            $html .= '<tr>
                <td style="font-weight:bold;border:1px solid #000" colspan="2">TOTAL</td>
                <td style="font-weight:bold;border:1px solid #000">'.number_format($ton_mh_jml).'</td>
                <td style="font-weight:bold;border:1px solid #000">'.number_format($ton_mh_tot).'</td>
                <td style="font-weight:bold;border:1px solid #000">'.number_format($ton_mi_jml).'</td>
                <td style="font-weight:bold;border:1px solid #000">'.number_format($ton_mi_tot).'</td>
                <td style="font-weight:bold;border:1px solid #000">'.number_format($ton_jml).'</td>
                <td style="font-weight:bold;border:1px solid #000">'.number_format($ton_tot).'</td>
            </tr>';

            $html .= '</table>';

        }else if($jenis == 'ALL_REKAP_GSM'){
            // PER GSM
            $html = '';

            // ambil data per gsm
            $sql_rekap_gsm = $this->db->query("SELECT g_label FROM m_timbangan WHERE (nm_ker='MH' OR nm_ker='MI') GROUP BY g_label ORDER BY g_label ASC")->result();

            foreach ($sql_rekap_gsm as $r) {
                $gsm = $r->g_label;

                $html .= '<table style="margin:0;padding:0;font-size:14px;font-weight:bold;color:'.$ink.';width:100%;border-collapse:collapse">
                    <tr>
                        <td colspan="3" style="border:0">REKAP UPDATE SPESIFIKASI FINISH GOOD - UPDATE TERBARU PER GSM ( '.$gsm.' )</td>
                    </tr>
                </table>';
                
                $html .= '<table cellspacing="0" cellpadding="5" style="font-size:11px;width:100%;color:'.$ink.';text-align:center;border-collapse:collapse" >';

                $html .= '<tr>
                    <th style="border:0;padding:5px 0;width:7%"></th>
                    <th style="border:0;padding:5px 0;width:10%"></th>
                    <th style="border:0;padding:5px 0;width:10%"></th>
                    <th style="border:0;padding:5px 0;width:10%"></th>
                    <th style="border:0;padding:5px 0;width:13%"></th>
                    <th style="border:0;padding:5px 0;width:10%"></th>
                    <th style="border:0;padding:5px 0;width:13%"></th>
                    <th style="border:0;padding:5px 0;width:11%"></th>
                    <th style="border:0;padding:5px 0;width:15%"></th>
                </tr>';

                $html .= '<tr>
                    <td style="font-weight:bold;border:1px solid #000">NO</td>
                    <td style="font-weight:bold;border:1px solid #000">WIDTH</td>
                    <td style="font-weight:bold;border:1px solid #000">GSM</td>
                    <td style="font-weight:bold;border:1px solid #000">MH</td>
                    <td style="font-weight:bold;border:1px solid #000">TOTAL MH</td>
                    <td style="font-weight:bold;border:1px solid #000">MI</td>
                    <td style="font-weight:bold;border:1px solid #000">TOTAL MI</td>
                    <td style="font-weight:bold;border:1px solid #000">TOTAL ROLL</td>
                    <td style="font-weight:bold;border:1px solid #000">TOTAL BERAT</td>
                </tr>';

                // ambil data
                $sql_rekap = $this->db->query("
                    SELECT width,
                    g_label AS gsm,
                    (SELECT COUNT(*) FROM m_timbangan WHERE width = a.width AND g_label = a.g_label AND nm_ker='MH' AND status='0') AS mh_jml,
                    (SELECT SUM(weight) FROM m_timbangan WHERE width = a.width AND g_label = a.g_label AND nm_ker='MH' AND status='0') AS mh_tot,
                    (SELECT COUNT(*) FROM m_timbangan WHERE width = a.width AND g_label = a.g_label AND nm_ker='MI' AND status='0') AS mi_jml,
                    (SELECT SUM(weight) FROM m_timbangan WHERE width = a.width AND g_label = a.g_label AND nm_ker='Mi' AND status='0') AS mi_tot,
                    COUNT(*) AS all_jml,
                    SUM(weight) AS all_total
                    FROM m_timbangan a WHERE (nm_ker='MH' OR nm_ker='MI') AND status='0' AND g_label='$gsm'
                    GROUP BY width");

                $no = 1;
                $ton_mh_jml = 0;
                $ton_mh_tot = 0;
                $ton_mi_jml = 0;
                $ton_mi_tot = 0;
                $ton_jml = 0;
                $ton_tot = 0;
                foreach ($sql_rekap->result() as $r ) {
                    $html .= '<tr>
                                <td style="border:1px solid '.$ink.'">'.$no.'</td>
                                <td style="border:1px solid '.$ink.'">'.round($r->width).'</td>
                                <td style="border:1px solid '.$ink.'">'.$gsm.'</td>
                                <td style="border:1px solid '.$ink.'">'.$r->mh_jml.'</td>
                                <td style="border:1px solid '.$ink.';text-align:right">'.number_format($r->mh_tot).'</td>
                                <td style="border:1px solid '.$ink.'">'.$r->mi_jml.'</td>
                                <td style="border:1px solid '.$ink.';text-align:right">'.number_format($r->mi_tot).'</td>
                                <td style="border:1px solid '.$ink.'">'.$r->all_jml.'</td>
                                <td style="border:1px solid '.$ink.';text-align:right">'.number_format($r->all_total).'</td>
                            </tr>';
                    $no++;
                    $ton_mh_jml += $r->mh_jml;
                    $ton_mh_tot += $r->mh_tot;
                    $ton_mi_jml += $r->mi_jml;
                    $ton_mi_tot += $r->mi_tot;
                    $ton_jml    += $r->all_jml;
                    $ton_tot    += $r->all_total;
                }

                $html .= '<tr>
                    <td style="font-weight:bold;border:1px solid #000" colspan="3">TOTAL</td>
                    <td style="font-weight:bold;border:1px solid #000">'.number_format($ton_mh_jml).'</td>
                    <td style="font-weight:bold;border:1px solid #000">'.number_format($ton_mh_tot).'</td>
                    <td style="font-weight:bold;border:1px solid #000">'.number_format($ton_mi_jml).'</td>
                    <td style="font-weight:bold;border:1px solid #000">'.number_format($ton_mi_tot).'</td>
                    <td style="font-weight:bold;border:1px solid #000">'.number_format($ton_jml).'</td>
                    <td style="font-weight:bold;border:1px solid #000">'.number_format($ton_tot).'</td>
                </tr>';

                $html .= '</table>';

                $html .= '<div style="page-break-after:always"></div>';

            // pertama
            }

        }else{

            // cetak per ukuran pdf

            $sql_uk_all = $this->db->query("SELECT COUNT(*) AS totalluk FROM m_timbangan WHERE (nm_ker='MH' OR nm_ker='MI') AND STATUS='0' AND width='$jenis'")->row();

            $html .= '<table style="margin:0;padding:0;text-align:center;font-size:14px;color:'.$ink.';font-weight:bold;width:100%;border-collapse:collapse">
                <tr>
                    <td colspan="8" style="border:0">UPDATE SPESIFIKASI FINISH GOOD - UPDATE TERBARU UK '.round($jenis).' ( '.$sql_uk_all->totalluk.' )</td>
                </tr>
            </table>';

            // query gsm
            $sql_gsm =  $this->db->query("SELECT g_label, COUNT(g_label) AS totgsm FROM m_timbangan WHERE width='$jenis' AND STATUS='0' AND (nm_ker='MH' OR nm_ker='MI') GROUP BY g_label ORDER BY g_label ASC")->result();

            foreach($sql_gsm as $data){

                $html .= '<table cellpadding="5" style="margin:10px 0;padding:0;font-size:11px;color:'.$ink.';text-align:center;width:100%;border-collapse:collapse">
                <tr>
                    <th style="padding:0;width:6%"></th>
                    <th style="padding:0;width:16%"></th>
                    <th style="padding:0;width:13%"></th>
                    <th style="padding:0;width:15%"></th>
                    <th style="padding:0;width:15%"></th>
                    <th style="padding:0;width:14%"></th>
                    <th style="padding:0;width:14%"></th>
                    <th style="padding:0;width:7%"></th>
                </tr>';

                // tampil gsm
                $html .= '<tr>
                    <td colspan="8" style="border:0;font-weight:bold">GSM '.$data->g_label.' ( '.$data->totgsm.' )</td>
                </tr>';

                $gsm_glabel = $data->g_label;
                
                // MH
                $sql_ker_mh = $this->db->query("SELECT nm_ker, COUNT(nm_ker) AS totker FROM m_timbangan WHERE width='$jenis' AND g_label='$gsm_glabel' AND STATUS='0' AND nm_ker='MH' GROUP BY nm_ker ORDER BY nm_ker ASC")->result();

                foreach($sql_ker_mh as $data){
                    $html .= '<tr>
                        <td colspan="8" style="border:0;font-weight:bold">GSM '.$gsm_glabel.' - '.$data->nm_ker.' ( '.$data->totker.' )</td>
                    </tr>';

                    // kop
                    $html .= '<tr>
                            <td style="border:1px solid '.$ink.'">No</td>
                            <td style="border:1px solid '.$ink.'">ROLL NUMBER</td>
                            <td style="border:1px solid '.$ink.'">JENIS KERTAS</td>
                            <td style="border:1px solid '.$ink.'">GRAMAGE (GSM)</td>
                            <td style="border:1px solid '.$ink.'">LEBAR (CM)</td>
                            <td style="border:1px solid '.$ink.'">DIAMETER</td>
                            <td style="border:1px solid '.$ink.'">BERAT (KG)</td>
                            <td style="border:1px solid '.$ink.'">JOINT</td>
                        </tr>';

                    $mh = $data->nm_ker;
                    $sql_roll_mh = $this->db->query("SELECT*FROM m_timbangan WHERE width='$jenis' AND g_label='$gsm_glabel' AND STATUS='0' AND nm_ker='$mh' ORDER BY roll ASC")->result();

                    $no = 1;
                    foreach ($sql_roll_mh as $r ) {
                        $html .= '<tr>
                                    <td style="border:1px solid '.$ink.'">'.$no.'</td>
                                    <td style="border:1px solid '.$ink.'">'.$r->roll.'</td>
                                    <td style="border:1px solid '.$ink.'">'.$r->nm_ker.'</td>
                                    <td class="str" style="border:1px solid '.$ink.'">'.$r->g_label.'</td>
                                    <td class="str" style="border:1px solid '.$ink.'">'.round($r->width,2).'</td>
                                    <td class="str" style="border:1px solid '.$ink.'">'.$r->diameter.'</td>
                                    <td style="border:1px solid '.$ink.'">'.$r->weight.'</td>
                                    <td class="str" style="border:1px solid '.$ink.'">'.$r->joint.'</td>
                                </tr>';
                        $no++;
                    }
                }

                // MI
                $sql_ker_mi = $this->db->query("SELECT nm_ker, COUNT(nm_ker) AS totker FROM m_timbangan WHERE width='$jenis' AND g_label='$gsm_glabel' AND STATUS='0' AND nm_ker='MI' GROUP BY nm_ker ORDER BY nm_ker ASC")->result();

                foreach($sql_ker_mi as $data){
                    $html .= '<tr>
                        <td colspan="8" style="border:0;font-weight:bold">GSM '.$gsm_glabel.' - '.$data->nm_ker.' ( '.$data->totker.' )</td>
                    </tr>';

                    // kop
                    $html .= '<tr>
                            <td style="border:1px solid '.$ink.'">No</td>
                            <td style="border:1px solid '.$ink.'">ROLL NUMBER</td>
                            <td style="border:1px solid '.$ink.'">JENIS KERTAS</td>
                            <td style="border:1px solid '.$ink.'">GRAMAGE (GSM)</td>
                            <td style="border:1px solid '.$ink.'">LEBAR (CM)</td>
                            <td style="border:1px solid '.$ink.'">DIAMETER</td>
                            <td style="border:1px solid '.$ink.'">BERAT (KG)</td>
                            <td style="border:1px solid '.$ink.'">JOINT</td>
                        </tr>';

                    $mi = $data->nm_ker;
                    $sql_roll_mi = $this->db->query("SELECT*FROM m_timbangan WHERE width='$jenis' AND g_label='$gsm_glabel' AND STATUS='0' AND nm_ker='$mi' ORDER BY roll ASC")->result();

                    $no = 1;
                    foreach ($sql_roll_mi as $r ) {
                        $html .= '<tr>
                                    <td style="border:1px solid '.$ink.'">'.$no.'</td>
                                    <td style="border:1px solid '.$ink.'">'.$r->roll.'</td>
                                    <td style="border:1px solid '.$ink.'">'.$r->nm_ker.'</td>
                                    <td class="str" style="border:1px solid '.$ink.'">'.$r->g_label.'</td>
                                    <td class="str" style="border:1px solid '.$ink.'">'.round($r->width,2).'</td>
                                    <td class="str" style="border:1px solid '.$ink.'">'.$r->diameter.'</td>
                                    <td style="border:1px solid '.$ink.'">'.$r->weight.'</td>
                                    <td class="str" style="border:1px solid '.$ink.'">'.$r->joint.'</td>
                                </tr>';
                        $no++;
                    }
                }

            $html .= '</table>';

            }


        }

        // judul
        if($jenis == 'ALL'){
            $jdl = 'UPDATE SPESIFIKASI FINISH GOOD - UPDATE TERBARU SEMUA UKURAN';
        }else if($jenis <> 'ALL'){
            $jdl = 'UPDATE SPESIFIKASI FINISH GOOD - UPDATE TERBARU ( '.round($jenis,2).' )';
        }

        // opsi cetak
        if ($ctk == '0') {
            // pdf
            $this->m_fungsi->_mpdf('',$html,10,10,10,'P');
        }else{
            // excel
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=$jdl.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $data2['prev']= $html;
            $this->load->view('view_excel', $data2);
        }

    }

 }