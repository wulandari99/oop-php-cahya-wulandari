<?php 

abstract class produk {
   private $judul,
		   $penulis,
		   $penerbit,
		   $harga,
		   $diskon = 0;

	public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0){
		$this->judul = $judul;
		$this->penulis = $penulis;
		$this->penerbit = $penerbit;
		$this->harga = $harga;
	}

	public function setJudul ( $judul ) {
		$this->judul = $judul;
	}

	public function getJudul() {
		return $this->judul;
	}

	public function setPenulis( $penulis ) {
		$this->judul = $penulis;
	}
	public function getPenulis() {
		return $this->penulis;
	}

	public function setPenerbit( $penerbit ) {
		 $this->penerbit = $penerbit;
	}
	public function getPenerbit() {
		return $this->penerbit;
	}

	public function setDiskon( $diskon ) {
		 $this->diskon = $diskon;
	}
	public function getDiskon() {
		return $this->diskon;
	}

	public function setHarga( $harga ) {
		$this->Harga = $harga;
	}
	public function getHarga() {
		return $this->harga - ( $this->harga * $this->diskon / 100 );
	}

	public function getLabel() {
		return "$this->penulis, $this->penerbit";
	}

	abstract public function getInfoProduk();

	public function getInfo() {
		$str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

		return $str;
	}
}

	class Komik extends Produk {
		public $jmlhalaman;

		public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlhalaman = 0 ) {

			parent::__construct( $judul, $penulis, $penerbit, $harga );
			$this->jmlhalaman = $jmlhalaman;

	}

	public function getInfoProduk(){
		$str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlhalaman} Halaman.";
		return $str; 
	}
}


class Game extends Produk {
	public $waktuMain;

	
	public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0 ) {
		parent::__construct( $judul, $penulis, $penerbit, $harga );
			$this->waktuMain = $waktuMain;
	 }

	public function getInfoProduk(){
		$str = "Game: " . parent::getInfoProduk(). " - {$this->waktuMain} Jam.";
		return $str; 
	}
}

	class CetakInfoProduk {
		public $daftarProduk = array();

		public function tambahproduk( Produk $produk ){
			$this->daftarProduk[] = $produk;
		}

		public function cetak(){
			$str = "DAFTAR PRODUK : <br>";

			foreach ($this->daftarProduk as $p ) {
				$str .= "- {$p->getInfoProduk()} <br>";
			}
			return $str;
		}
	}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shohen Jump", 30000, 100);

$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $produk1->getPenulis();