<?php
include '../../../wp-load.php';	
#include 'lib/engine/load.php';


$VOUCHER 		= new Voucher();
$VOUCHER->create_pdf(is_dbtable_there('vouchers'));					
?>