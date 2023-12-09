
	<main class="bg_gray">
		<div class="container">
            <div class="row justify-content-center">
				<div class="col-md-5">
					<div id="confirm">
						<div class="icon icon--order-success svg add_bottom_15">
							<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
								<g fill="none" stroke="#8EC343" stroke-width="2">
									<circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
									<path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
								</g>
							</svg>
						</div>
					<h2><a href="../../index.php">Order completed!</a></h2>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
		
	</main>
<?php

	function insert_vnpay($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_OrderInfo, $vnp_PayDate, $vnp_TmnCode, $vnp_CardType, $vnp_TransactionNo, $code_cart){
		$sql = "INSERT INTO vnpay(vnp_amount, vnp_bankcode, vnp_banktranno, vnp_orderinfo, vnp_paydate, vnp_tmncode, vnp_cardtype, vnp_transactionno, code_cart) 
		VALUES ('$vnp_Amount', '$vnp_BankCode', '$vnp_BankTranNo', '$vnp_OrderInfo', '$vnp_PayDate', '$vnp_TmnCode', '$vnp_CardType', '$vnp_TransactionNo', '$code_cart')";
		pdo_execute($sql);
	}
	if(isset($_GET['vnp_Amount'])){
		include "../../model/pdo.php";
		$_SESSION['code_cart'] = $_GET['vnp_TxnRef'];
		$vnp_Amount = $_GET['vnp_Amount'];
		$vnp_BankCode = $_GET['vnp_BankCode'];
		$vnp_BankTranNo = $_GET['vnp_BankTranNo'];
		$vnp_OrderInfo = $_GET['vnp_OrderInfo'];
		$vnp_PayDate = $_GET['vnp_PayDate'];
		$vnp_TmnCode = $_GET['vnp_TmnCode'];
		$vnp_CardType = $_GET['vnp_CardType'];
		$vnp_TransactionNo = $_GET['vnp_TransactionNo'];
		$code_cart = $_SESSION['code_cart'];
		$insert_vnpay = insert_vnpay($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_OrderInfo, $vnp_PayDate, $vnp_TmnCode, $vnp_CardType, $vnp_TransactionNo, $code_cart);
	  }
?>