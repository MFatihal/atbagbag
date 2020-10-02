<?php 
 
class M_produk extends CI_Model{

	public $bra = "BRA";

	function tampil_kategori(){
		return $this->db->get('kategori')->result();
	}
	function tampil_produk(){
		$query = $this->db->query("SELECT * FROM produk JOIN kategori ON kategori.id_kategori=produk.kategori_id_kategori ORDER BY id_produk DESC");
		return $query->result();
	}
	function tampil_produk2($id_produk){
		$query = $this->db->query("SELECT * FROM produk JOIN kategori ON kategori.id_kategori=produk.kategori_id_kategori WHERE id_produk='$id_produk'");
		return $query->result();
	}
	function katprod($idk){
		$query = $this->db->query("SELECT * FROM produk JOIN kategori ON kategori.id_kategori=produk.kategori_id_kategori WHERE kategori.id_kategori='$idk'");
		return $query->result();
	}
	function tampil_detailproduk($id){
		$query = $this->db->query("SELECT * FROM produk WHERE id_produk='$id'");
		return $query->result();
	}
	function tambah_produk($idproduk,$nama_produk,$keterangan,$idkat,$stok,$harga,$gambar){
		$query = $this->db->query("INSERT INTO `produk`(`id_produk`, `nama_produk`, `keterangan`, `kategori_id_kategori`, `stok`, `harga`, `gambar`) VALUES ('$idproduk','$nama_produk','$keterangan','$idkat','$stok','$harga','$gambar')");
	}
	function get_idproduk(){
          $this->db->select('RIGHT(produk.id_produk,4) as kode', FALSE);
		  $this->db->order_by('id_produk','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('produk');     
		  if($query->num_rows() <> 0){      
		
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
		  $kodejadi = "PR".$kodemax;  
		  return $kodejadi;
	}
	function hapus_produk($id_produk){
		$query = $this->db->query("DELETE FROM `produk` WHERE id_produk='$id_produk'");
	}
	function update_produk($id_produk,$nama_produk,$keterangan,$kategori,$stok,$harga,$idkat){
		$query = $this->db->query("UPDATE `produk` SET `nama_produk`='$nama_produk',`keterangan`='$keterangan',`kategori_id_kategori`='$idkat',`stok`='$stok',`harga`='$harga' WHERE id_produk='$id_produk'");
	}
	function namakat($kategori){
		$query = $this->db->query("SELECT * FROM kategori WHERE nama_kategori='$kategori'");
		return $query->result();
	}

	public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $this->db->order_by("id_produk", "DESC");
        $query = $this->db->get("produk");
        
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
     
    public function get_total() 
    {
        return $this->db->count_all("produk");
    }

    function mcron($datenow){
		$query = $this->db->query("SELECT * FROM produk JOIN keranjang ON keranjang.produk_id_produk=produk.id_produk JOIN `pesan` ON pesan.id_pesan=keranjang.pesan_id_pesan WHERE '$datenow'>pesan.jatuh_tempo  AND pesan.status='Proses'");
		return $query->result();
	}

	function tampil_produk3(){
		$query = $this->db->query("SELECT * FROM produk JOIN kategori ON `kategori`.`id_kategori`=`produk`.`kategori_id_kategori` WHERE nama_kategori='BRA' ORDER BY `id_produk` DESC");
		return $query->result();
	}
	function tampil_produk4(){
		$query = $this->db->query("SELECT * FROM produk JOIN kategori ON `kategori`.`id_kategori`=`produk`.`kategori_id_kategori` WHERE nama_kategori='Tas' ORDER BY `id_produk` DESC");
		return $query->result();
	}

	function tampil_produk5(){
		$query = $this->db->query("SELECT * FROM produk JOIN kategori ON `kategori`.`id_kategori`=`produk`.`kategori_id_kategori` WHERE nama_kategori='Pernak Pernik' ORDER BY `id_produk` DESC");
		return $query->result();
	}

	public function find($id_produk)
	{
		$result = $this->db->where('id_produk', $id_produk)
						   ->limit(1)
						   ->get('produk');
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}
	}					
}
?>