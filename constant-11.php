<?php 

// define('NAMA', 'Tita Rosita');
// echo NAMA;

// echo "<br>";

// const UMUR = 17;
// echo UMUR;


// class coba {
// const NAMA = 'Tita';
// }
// echo coba::NAMA;


// echo __FILE__;

// function coba(){
// return __FUNCTION__;
// }
// echo coba();

class Coba {
	public $kelas = __CLASS__;
}
$obj = new Coba;
echo $obj->kelas;





?>