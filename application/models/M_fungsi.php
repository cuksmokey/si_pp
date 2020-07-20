<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Fungsi Model
 */

class M_fungsi extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	// Tampilkan semua master data fungsi
	//function getAll($limit, $offset)
    function getAll($tabel,$field1,$limit, $offset)
	{
		$this->db->select('*');
		$this->db->from($tabel);
		$this->db->order_by($field1, 'asc');
		$this->db->limit($limit,$offset);
		return $this->db->get();
	}
    function getcari($tabel,$field,$field1,$limit, $offset,$lccari)
	{
		$this->db->select('*');
		$this->db->from($tabel);
        $this->db->or_like($field, $lccari);  
        $this->db->or_like($field1, $lccari);      
		$this->db->order_by($field, 'asc');
        $this->db->limit($limit,$offset);
		return $this->db->get();
	}
    
    function getAllc($tabel,$field1)
	{
		$this->db->select('*');
		$this->db->from($tabel);
		$this->db->order_by($field1, 'asc');
		//$this->db->limit($limit,$offset);
		return $this->db->get();
	}
	
	// Total jumlah data
	function get_count($tabel)
	{
		return $this->db->get($tabel)->num_rows();
	}
    
	function get_count_cari($tabel,$field1,$field2,$data)
	{
        $this->db->select('*');
		$this->db->from($tabel);
        $this->db->or_like($field1, $data);  
        $this->db->or_like($field2, $data);      
		$this->db->order_by($field1, 'asc');
		return $this->db->get()->num_rows();
		//return $this->db->get('ms_fungsi')->num_rows();
	}
    function get_count_teang($tabel,$field,$field1,$lccari)
	{
        $this->db->select('*');
		$this->db->from($tabel);
        $this->db->or_like($field, $lccari);  
        $this->db->or_like($field1, $lccari);      
		$this->db->order_by($field, 'asc');
		return $this->db->get()->num_rows();
		//return $this->db->get('ms_fungsi')->num_rows();
	}
	// Ambil by ID
	function get_by_id($tabel,$field1,$id)
	{
		$this->db->select('*');
		$this->db->from($tabel);
		$this->db->where($field1, $id);
		return $this->db->get();
	}
	//cari
    function cari($tabel,$field1,$field2,$limit, $offset,$data)
	{
		$this->db->select('*');
		$this->db->from($tabel);
        $this->db->or_like($field2, $data);  
        $this->db->or_like($field1, $data);      
		$this->db->order_by($field1, 'asc');
		return $this->db->get();
	}
	// Simpan data
	function save($tabel,$data)
	{
		$this->db->insert($tabel, $data);
	}
	
	// Update data
	function update($tabel,$field1,$id, $data)
	{
		$this->db->where($field1, $id);
		$this->db->update($tabel, $data); 	
	}
	
	// Hapus data
	function delete($tabel,$field1,$id)
	{
		$this->db->where($field1, $id);
		$this->db->delete($tabel);
	}
    
  	function depan($number)
	{
		$number = abs($number);
		$nomor_depan = array("","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan","sepuluh","sebelas");
		$depans = "";
		
		if($number<12){
			$depans = " ".$nomor_depan[$number];
		}
		else if($number<20){
			$depans = $this->depan($number-10)." belas";
		}
		else if($number<100){
			$depans = $this->depan($number/10)." puluh ".$this->depan(fmod($number,10));
		}
		else if($number<200){
			$depans = "seratus ".$this->depan($number-100);
		}
		else if($number<1000){
			$depans = $this->depan($number/100)." ratus ".$this->depan(fmod($number,100));
		//$depans = $this->depan($number/100)." Ratus ".$this->depan($number%100);
		}
		else if($number<2000){
			$depans = "seribu ".$this->depan($number-1000);
		}
		else if($number<1000000){
			$depans = $this->depan($number/1000)." ribu ".$this->depan(fmod($number,1000));
		}
		else if($number<1000000000){
			$depans = $this->depan($number/1000000)." juta ".$this->depan(fmod($number,1000000));
		}
		else if($number<1000000000000){
			$depans = $this->depan($number/1000000000)." milyar ".$this->depan(fmod($number,1000000000));
			//$depans = ($number/1000000000)." Milyar ".(fmod($number,1000000000))."------".$number;
		}
		else if($number<1000000000000000){
			$depans = $this->depan($number/1000000000000)." triliun ".$this->depan(fmod($number,1000000000000));
			//$depans = ($number/1000000000)." Milyar ".(fmod($number,1000000000))."------".$number;
		}				
		else{
			$depans = "Undefined";
		}
		return $depans;
	}

	function belakang($number)
	{
		$number = abs($number);
		$number = stristr($number,".");
		$nomor_belakang = array("nol","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan");

		$belakangs = "";
		$length = strlen($number);
		$i = 1;
		while($i<$length)
		{
			$get = substr($number,$i,1);
			$i++;
			$belakangs .= " ".$nomor_belakang[$get];
		}
		return $belakangs;
	}

	function terbilang($number)
	{
		if (!is_numeric($number))
		{
			return false;
		}
		
		if($number<0)
		{
			$hasil = "Minus ".trim($this->depan($number));
			// $poin = trim($this->belakang($number));

		}
		else{
			// $poin = trim($this->belakang($number));
			$hasil = trim($this->depan($number));
		}
   
		// if($poin)
		// {
		// 	$hasil = $hasil." koma ".$poin." Rupiah";
		// }
		// else{
			$hasil = $hasil." Rupiah";
		// }

		return $hasil;  
		
	}
	
 
	function terbilang_angka($number)
	{
		if (!is_numeric($number))
		{
			return false;
		}
		
		if($number<0)
		{
			$hasil = "Minus ".trim($this->depan($number));
			$poin = trim($this->belakang($number));

		}
		else{
			$poin = trim($this->belakang($number));
			$hasil = trim($this->depan($number));
		}
   
		if($poin)
		{
			$hasil = $hasil." koma ".$poin;
		}
		else{
			$hasil = $hasil;
		}
		return $hasil;  
	} 
    
    
    function _mpdf($judul='',$isi='',$lMargin='',$rMargin='',$font=0,$orientasi='') {
        
        ini_set("memory_limit","512M");
        $this->load->library('mpdf');
        
        /*
        $this->mpdf->progbar_altHTML = '<html><body>
	                                    <div style="margin-top: 5em; text-align: center; font-family: Verdana; font-size: 12px;"><img style="vertical-align: middle" src="'.base_url().'images/loading.gif" /> Creating PDF file. Please wait...</div>';        
        $this->mpdf->StartProgressBarOutput();
        */
        
        $this->mpdf->defaultheaderfontsize = 6;	/* in pts */
        $this->mpdf->defaultheaderfontstyle = BI;	/* blank, B, I, or BI */
        $this->mpdf->defaultheaderline = 1; 	/* 1 to include line below header/above footer */

        $this->mpdf->defaultfooterfontsize = 6;	/* in pts */
        $this->mpdf->defaultfooterfontstyle = BI;	/* blank, B, I, or BI */
        $this->mpdf->defaultfooterline = 1; 
        $this->mpdf->SetLeftMargin = $lMargin;
        $this->mpdf->SetRightMargin = $rMargin;
        //$this->mpdf->SetHeader('SIMAKDA||');
        $jam = date("H:i:s");
        //$this->mpdf->SetFooter('Printed on @ {DATE j-m-Y H:i:s} |Simakda| Page {PAGENO} of {nb}');
       // $this->mpdf->SetFooter('Printed on @ {DATE j-m-Y H:i:s} |Halaman {PAGENO} / {nb}| ');
        // $this->mpdf->SetFooter('|Halaman {PAGENO} / {nb}| ');
        $this->mpdf->AddPage($orientasi,'','','','',$lMargin,$rMargin);
        
        if (!empty($judul)) $this->mpdf->writeHTML($judul);
        $this->mpdf->writeHTML($isi);         
        $this->mpdf->Output();
               
	}
	
	function mPDF($html){
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

	function _mpdf2($judul='',$isi='',$lMargin='',$rMargin='',$font=0,$orientasi='',$title='PL') {
        
        ini_set("memory_limit","512M");
        $this->load->library('mpdf');


        $this->mpdf->defaultheaderfontsize = 6;	/* in pts */
        $this->mpdf->defaultheaderfontstyle = BI;	/* blank, B, I, or BI */
        $this->mpdf->defaultheaderline = 1; 	/* 1 to include line below header/above footer */

        $this->mpdf->defaultfooterfontsize = 6;	/* in pts */
        $this->mpdf->defaultfooterfontstyle = BI;	/* blank, B, I, or BI */
        $this->mpdf->defaultfooterline = 1; 

        $this->mpdf->SetTitle = $title;

        $this->mpdf->SetLeftMargin = $lMargin;
        $this->mpdf->SetRightMargin = $rMargin;
        
        $jam = date("H:i:s");

        $this->mpdf->AddPage($orientasi,'','','','',$lMargin,$rMargin);
        
        if (!empty($judul)) $this->mpdf->writeHTML($judul);
        $this->mpdf->writeHTML($isi);         
        $this->mpdf->Output();
               
    }

    function _mpdf_margin($judul='',$isi='',$lMargin='',$rMargin='',$tMargin='',$bMargin='',$font=0,$orientasi='',$jdlsave='') {
        
        ini_set("memory_limit","512M");
        $this->load->library('mpdf');
        
        /*
        $this->mpdf->progbar_altHTML = '<html><body>
	                                    <div style="margin-top: 5em; text-align: center; font-family: Verdana; font-size: 12px;"><img style="vertical-align: middle" src="'.base_url().'images/loading.gif" /> Creating PDF file. Please wait...</div>';        
        $this->mpdf->StartProgressBarOutput();
        */
        
        $this->mpdf->defaultheaderfontsize = 6;	/* in pts */
        $this->mpdf->defaultheaderfontstyle = BI;	/* blank, B, I, or BI */
        $this->mpdf->defaultheaderline = 1; 	/* 1 to include line below header/above footer */

        $this->mpdf->defaultfooterfontsize = 6;	/* in pts */
        $this->mpdf->defaultfooterfontstyle = BI;	/* blank, B, I, or BI */
        $this->mpdf->defaultfooterline = 1; 
        $this->mpdf->SetLeftMargin = $lMargin;
        $this->mpdf->SetRightMargin = $rMargin;
        //$this->mpdf->SetHeader('SIMAKDA||');
        $jam = date("H:i:s");
        //$this->mpdf->SetFooter('Printed on @ {DATE j-m-Y H:i:s} |Simakda| Page {PAGENO} of {nb}');
       // $this->mpdf->SetFooter('Printed on @ {DATE j-m-Y H:i:s} |Halaman {PAGENO} / {nb}| ');
        $this->mpdf->SetFooter('|Halaman {PAGENO} / {nb}| ');
        $this->mpdf->AddPage($orientasi,'','','','',$lMargin,$rMargin,$tMargin,$bMargin);
        
        if (!empty($judul)) $this->mpdf->writeHTML($judul);
        $this->mpdf->writeHTML($isi);         
        $this->mpdf->Output($jdlsave,'I');
        
    }

    
        //function  tanggal_format_indonesia($tgl){
//        $tanggal  =  substr($tgl,8,2);
//        $bulan  = $this-> getBulan(substr($tgl,5,2));
//        $tahun  =  substr($tgl,0,4);
//        return  $tanggal.' '.$bulan.' '.$tahun;
//
//   }
//        }
        
    function  tanggal_format_indonesia($tgl){
            
        $tanggal  = explode('-',$tgl); 
        $bulan  = $this-> getBulan($tanggal[1]);
        $tahun  =  $tanggal[0];
        return  $tanggal[2].' '.$bulan.' '.$tahun;

    }
	
	function  tanggal_format_indonesia_sebelum($tgl){
        $tanggal  = explode('-',$tgl);
		$tanggal1 = $tanggal[2]-1;
        $bulan  = $this-> getBulan($tanggal[1]);
        $tahun  =  $tanggal[0];
        return  $tanggal1.' '.$bulan.' '.$tahun;
    }
    
    function  tanggal_ind($tgl){
            
        $tanggal  = explode('-',$tgl); 
        $bulan  = $tanggal[1];
        $tahun  =  $tanggal[0];
        return  $tanggal[2].'-'.$bulan.'-'.$tahun;

    }
        
    function  getBulan($bln){
        switch  ($bln){
        case  1:
        return  "Januari";
        break;
        case  2:
        return  "Februari";
        break;
        case  3:
        return  "Maret";
        break;
        case  4:
        return  "April";
        break;
        case  5:
        return  "Mei";
        break;
        case  6:
        return  "Juni";
        break;
        case  7:
        return  "Juli";
        break;
        case  8:
        return  "Agustus";
        break;
        case  9:
        return  "September";
        break;
        case  10:
        return  "Oktober";
        break;
        case  11:
        return  "November";
        break;
        case  12:
        return  "Desember";
        break;
    }
    }
    
    function right($value, $count){
    return substr($value, ($count*-1));
    }

    function left($string, $count){
    return substr($string, 0, $count);
    }    
    
    function  dotrek($rek){
				$nrek=strlen($rek);
				switch ($nrek) {
                case 1:
				$rek = $this->left($rek,1);								
       			 break;
    			case 2:
					$rek = $this->left($rek,1).'.'.substr($rek,1,1);								
       			 break;
    			case 3:
					$rek = $this->left($rek,1).'.'.substr($rek,1,1).'.'.substr($rek,2,1);								
       			 break;
    			case 5:
					$rek = $this->left($rek,1).'.'.substr($rek,1,1).'.'.substr($rek,2,1).'.'.substr($rek,3,2);								
        		break;
    			case 7:
					$rek = $this->left($rek,1).'.'.substr($rek,1,1).'.'.substr($rek,2,1).'.'.substr($rek,3,2).'.'.substr($rek,5,2);								
        		break;
                case 29:
					$rek = $this->left($rek,21).'.'.substr($rek,23,1).'.'.substr($rek,24,1).'.'.substr($rek,25,1).'.'.substr($rek,26,2).'.'.substr($rek,28,2);								
        		break;
    			default:
				$rek = "";	
				}
				return $rek;
    }
    
    
  //wahyu tambah ----------------------------------------	
        function  rev_date($tgl){
			$t=explode("-",$tgl);
			$tanggal  =  $t[2];
			$bulan    =  $t[1];
			$tahun    =  $t[0];
			return  $tanggal.'-'.$bulan.'-'.$tahun;

        }
        
        function  rev_date1($tgl){
			$t=explode("-",$tgl);
			$tanggal  =  $t[0];
			$bulan    =  $t[1];
			$tahun    =  $t[2];
			return  $tahun.'-'.$bulan.'-'.$tanggal;

        }
        
        

		function get_sclient($hasil,$tabel)
		{
			$this->db->select($hasil);
			$q = $this->db->get($tabel);
			$data  = $q->result_array();
			$baris = $q->num_rows();
			return $data[0][$hasil];
		}

		function get_nama($kode,$hasil,$tabel,$field)
		{
			$this->db->select($hasil);
			$this->db->where($field, $kode);
			$q = $this->db->get($tabel);
			$data  = $q->result_array();
			$baris = $q->num_rows();
			return $data[0][$hasil];
		}
// -----------------------------------------------------
    function rp_minus($nilai){
        if($nilai<0){
            $nilai = $nilai * (-1);
            $nilai = '('.number_format($nilai,"2",",",".").')';    
        }else{
            $nilai = number_format($nilai,"2",",","."); 
        }
        
        return $nilai;
    }  	        

    function persen($nilai,$nilai2){
            if($nilai != 0){
                $persen = $this->rp_minus((($nilai2 - $nilai)/$nilai)*100);
            }else{
                if($nilai2 == 0){
                    $persen = $this->rp_minus(0);
                }else{
                    $persen = $this->rp_minus(100);
                }
            } 
          return $persen;  
	 }

    function persen_real($ang,$real){
            if($ang != 0){
                $persen = $this->rp_minus(($real * 100)/$ang);
            }else{
                if($real == 0){
                    $persen = $this->rp_minus(0);
                }else{
                    $persen = '~';
                }
            } 
          return $persen;  
	}
	 
        function combo_beban($id='',$script=''){
        $cRet    = '';                        
        $cRet    = "<select name=\"$id\" id=\"$id\" $script >";
        $cRet   .= "<option value=''>Pilih Beban</option>";                 
        $cRet   .= "<option value='1'>UP/GU</option>";                
        $cRet   .= "<option value='3'>TU</option>";                        
        $cRet   .= "</select>";        
        return $cRet;
    }

    function qsisa_bankkasda($tgl,$nomor=''){
        $hasil  = 0;
        $csql ="select *,sisa=terima-keluar from(
        		select a.kode,a.nama,isnull(nilai,0) [terima],
					(
						select sum(nilai) from(
							select isnull(sum(f.nilai),0) [nilai] from trhsp2d e join trdspp f on e.no_spp=f.no_spp  
							where status_bud='1' and e.tgl_kas_bud<='$tgl' and e.bank_bud=a.kode and f.no_spp<>'$nomor'
							union all 
							select isnull(sum(nilai),0) [nilai] from transfer_bank_kasda where kd_bank_bud1=a.kode and tgl_kas<='$tgl' and no_kas<>'$nomor'
						)as g
					) [keluar] 
					from ms_bank a left join 
					(
						select kd_bank_bud,sum(nilai) [nilai] from(
							select b.kd_bank_bud,sum(c.rupiah) [nilai] from trhkasin_ppkd b join trdkasin_ppkd c 
							on b.no_sts=c.no_sts and b.kd_skpd=c.kd_skpd where b.tgl_kas<='$tgl' group by b.kd_bank_bud
							union all 
							select kd_bank_bud2 as kd_bank_bud,isnull(sum(nilai),0) [nilai] from transfer_bank_kasda where tgl_kas<='$tgl' and no_kas<>'$nomor'
							group by kd_bank_bud2
						)as h group by kd_bank_bud
					) d 
					on a.kode=d.kd_bank_bud where a.rekening<>''
				)as g order by kode  ";
        $hasil = $this->db->query($csql);
        return $hasil;
    }    


    function qsisa_bankkasda_bln($blnawal,$blnakhir){
        $hasil  = 0;
        /*
        $csql ="select *,sisa=terima-keluar from(
					select a.kode,a.nama,isnull(nilai,0) [terima],(select isnull(sum(f.nilai),0) [nilai] from trhsp2d e join trdspp f on e.no_spp=f.no_spp  where status_bud='1' 
					and month(e.tgl_kas_bud)>='$blnawal' and month(e.tgl_kas_bud)<='$blnakhir' and e.bank_bud=a.kode) [keluar] 
					from ms_bank a left join 
					(select b.kd_bank_bud,sum(c.rupiah) [nilai] from trhkasin_ppkd b join trdkasin_ppkd c 
					on b.no_sts=c.no_sts and b.kd_skpd=c.kd_skpd where month(b.tgl_kas)>='$blnawal' and month(b.tgl_kas)<='$blnakhir' group by b.kd_bank_bud) d 
					on a.kode=d.kd_bank_bud where a.rekening<>''
				)as g order by kode ";
		*/
        $csql ="select *,sisa=terima-keluar from(
        		select a.kode,a.nama,isnull(nilai,0) [terima],
					(
						select sum(nilai) from(
							select isnull(sum(f.nilai),0) [nilai] from trhsp2d e join trdspp f on e.no_spp=f.no_spp  
							where status_bud='1' and month(e.tgl_kas_bud)<='$blnakhir' and e.bank_bud=a.kode
							union all 
							select isnull(sum(nilai),0) [nilai] from transfer_bank_kasda where kd_bank_bud1=a.kode and month(tgl_kas)<='$blnakhir'
						)as g
					) [keluar] 
					from ms_bank a left join 
					(
						select kd_bank_bud,sum(nilai) [nilai] from(
							select b.kd_bank_bud,sum(c.rupiah) [nilai] from trhkasin_ppkd b join trdkasin_ppkd c 
							on b.no_sts=c.no_sts and b.kd_skpd=c.kd_skpd where month(b.tgl_kas)<='$blnakhir' group by b.kd_bank_bud
							union all 
							select kd_bank_bud2 as kd_bank_bud,isnull(sum(nilai),0) [nilai] from transfer_bank_kasda where month(tgl_kas)<='$blnakhir'
							group by kd_bank_bud2
						)as h group by kd_bank_bud
					) d 
					on a.kode=d.kd_bank_bud where a.rekening<>''
				)as g order by kode ";

        $hasil = $this->db->query($csql);
        return $hasil;
    }   



    function q_ttd($ttd,$kode){
        $hasil = 0;
        $csql ="select nip,nama,jabatan,pangkat from ms_ttd where nip='$ttd' and kode='$kode'";
        $hasil = $this->db->query($csql);
        return $hasil;
    } 	


    function cek_menu_user($user,$menuid){
        $hasil = 0;
        $csql ="select dbo.cek_menu_user('$user','$menuid') as jumlah";
        $hasil = $this->db->query($csql);
        $hasil = $hasil->row('jumlah');
        return $hasil;        
    }

    function rekapt_puskesmas_bln($kdrek5,$kd_skpd,$bln,$thn){
        $hasil = array();
        $this->db->trans_start();
        $asg = $this->db->query("rekap_terima_puskesmas_bln '$kdrek5','$kd_skpd','$bln','$thn'");
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
               $hasil = array('pesan' =>0,'query' => '');
        } else{
               $hasil = array('pesan' =>1,'query' => $asg);
        }
        return $hasil;
    } 

    
// -----------------------------------------------------	

}

/* End of file fungsi_model.php */
/* Location: ./application/models/fungsi_model.php */