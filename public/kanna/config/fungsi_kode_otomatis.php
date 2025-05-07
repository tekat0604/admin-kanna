<?php
	$th   		= date('Y');
	$pesanan	= $db->prepare("SELECT * FROM penjualan");
	$pesanan	-> execute();
	$ketemu		= $pesanan->rowCount();
	if($ketemu	==0){
		$KodeBaru = 'ts'.$th.'01';
	}else{
		$pesanan2	= $db->prepare("SELECT kode_pesan FROM penjualan order by id_penjualan Desc");
		$pesanan2	-> execute();
		$p2			= $pesanan2->fetch();
		$id2		= substr($p2['kode_pesan'],7)+1;
		$KodeBaru	= 'ts'.$th.'0'.$id2;
	}
?>