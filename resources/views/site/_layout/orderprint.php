<!DOCTYPE html>
<html>
  <head>
	<?php
		echo View::forge(THEME . DIRECTORY_SEPARATOR .'_layout'. DIRECTORY_SEPARATOR .'head')
				->set('appName', '')
				->set('appAuthor', '')
				->set('pageTitle', '')
				->set('pageDescription', '')
				->set('pageKeywords', '')
				->render();
	?>
	<style type="text/css">
		  
		@media print {
			body{ font-size: 11px; }
			.floatLeft{ font-size: 10px; float: left; width: 28%; margin-right: 30px;}
			.no-print, .no-print * { display: none !important; }
			ul.amounts li{
				background-color: #ccc;
				height: 20px;
			}
		}
	</style>
</head>

<body style="background-color: #dfdfdf;">

	<?php if( !$order ): ?>
	
	<center>
		<div class="alert alert-danger alert-dismissable" style="width: 50%; margin-top: 10%;">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h3>
				<i class="fa fa-exclamation-triangle"></i> <?= $this->translate('store.invoice', 'Error: This invoice does not exist.') ?>
			</h3>
		</div>
	</center>
	
	<?php else: ?>
	
	<!-- invoice start-->
	<section>
		<div class="panel panel-primary" style="margin: 24px;">
			<!--<div class="panel-heading navyblue"> INVOICE</div>-->
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6">
						<?php if (empty($appConfig->appLogo)) : ?>
						<h3><?= $appConfig->appName ?></h3> 
						<?php else : ?>
						<img class="img-responsive" style="max-height: 80px;" src="<?= UPLOAD_URL . $appConfig->appLogo ?>" alt="<?= $appConfig->appAuthor ?>" />
						<?php endif; ?>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<a class="btn btn-info btn-lg no-print pull-right" onclick="javascript:window.print();"><i class="fa fa-print"></i> <?= $this->translate('store.invoice', 'Print') ?> </a>
					</div>
				</div>
				<br/><br/>
				<div class="row invoice-list">
					<div class="col-lg-4 col-md-4 col-sm-4 floatLeft">
						<h5><?= $this->translate('store.invoice', 'INVOICE') ?> #<?= $order->idOrder ?> </h5>
						<ul class="unstyled">
							<li><b><?= $this->translate('store.invoice', 'Date') ?>:</b> <?= Utils::datetimeFormat($order->orderDate) ?></li>
							<li><b><?= $this->translate('store.invoice', 'Status') ?>:</b> <?= $order->storeorderstatus->value('orderStatus') ?></li>
							<li><b><?= $this->translate('store.invoice', 'Delivery') ?>:</b> <?= $order->storedeliverytype->value('description') ?></li>
						</ul>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 floatLeft">
						<h5><?= $this->translate('store.invoice', 'BILLING ADDRESS') ?></h5>
						<p>
							<?= $order->billingName ?> <br>
							<?= $order->billingAddress ?> <br>
							<?= $order->billingZip ?> <?= $order->billingLocality ?> <?= $order->billingCountry ? $order->billingCountry->country : '' ?><br>
						</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 floatLeft">
						<h5><?= $this->translate('store.invoice', 'SHIPPING ADDRESS') ?></h5>
						<p>
							<?= $order->deliveryName ?> <br>
							<?= $order->deliveryAddress ?> <br>
							<?= $order->deliveryZip ?> <?= $order->deliveryLocality ?> <?= $order->deliveryCountry ? $order->deliveryCountry->country : '' ?><br>
						</p>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr style="background-color: #eaeaea">
							<th>#</th>
							<th><?= $this->translate('store.invoice', 'Item') ?></th>
							<th class=""><?= $this->translate('store.invoice', 'Unit Cost') ?></th>
							<th class=""><?= $this->translate('store.invoice', 'Tax Value') ?></th>
							<th class=""><?= $this->translate('store.invoice', 'Quantity') ?></th>
							<th><?= $this->translate('store.invoice', 'Total') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i=1;
						$taxTotal = 0;
						$subTotal = 0;
						foreach( $order->storeorderlines as $orderLine ):
							$taxTotal += $orderLine->unitPrice * $orderLine->quantity * ($orderLine->taxValue ? $orderLine->taxValue/100 : 1);
							$subTotal += $orderLine->unitPrice * $orderLine->quantity;
						?>
						<tr>
							<td><?= ($i++) ?></td>
							<td><?= $orderLine->productName ?></td>
							<td><?= Utils::currencyFormat($orderLine->unitPrice, $order->currencyRate, $order->idCurrency) ?></td>
							<td><?= $orderLine->taxValue ?> %</td>
							<td><?= $orderLine->quantity ?></td>
							<td><?= Utils::currencyFormat($orderLine->priceTotal, $order->currencyRate, $order->idCurrency) ?></td>
						</tr>
						<?php endforeach; ?>
					<tbody>
				</table>
				<br/><br/>
				<div class="row">
					<div class="col-lg-4 invoice-block">
						<ul class="unstyled amounts">
							<li>
								<table class="table table-bordered" style="text-align: left;">
									<tr>
										<td><b><?= $this->translate('store.invoice', 'Payment') ?>:</b></td><td><?= $order->storepaymentmethod->value('paymentMethod') ?></td>
									</tr>
									<tr>
										<td><b><?= $this->translate('store.invoice', 'Description') ?>:</b></td><td><?= $order->storepaymentmethod->value('description') ?></td>
									</tr>
									<?php if ($order->storepaymentmethod->paymentMethodCode == 3) : ?>
									<tr>
										<td><b><?= $this->translate('store.invoice', 'ATM Entity') ?>:</b></td><td><?= $order->mbEntity ?></td>
									</tr>
									<tr>
										<td><b><?= $this->translate('store.invoice', 'ATM Reference') ?>:</b></td><td><?= $order->mbReference ?></td>
									</tr>
									<tr>
										<td><b><?= $this->translate('store.invoice', 'ATM Value') ?>:</b></td><td><?= Utils::currencyFormat($order->orderTotal, $order->currencyRate, $order->idCurrency) ?></td>
									</tr>
									<?php endif; ?>
								</table>
							</li>
						</ul>
					</div>
					
					<div class="col-lg-3 invoice-block pull-right">
						<ul class="unstyled amounts">
							<li> 
								<div class="pull-right" style="width: 120px;">
									<?= Utils::currencyFormat($subTotal, $order->currencyRate, $order->idCurrency) ?>
								</div> 
								<div class="pull-right"><strong><?= $this->translate('store.invoice', 'SubTotal') ?> :</strong></div>
								<br clear="both" />
							</li>
							<li> 
								<div class="pull-right" style="width: 120px;">
									<?= Utils::currencyFormat($taxTotal, $order->currencyRate, $order->idCurrency) ?>
								</div> 
								<div class="pull-right"><strong><?= $this->translate('store.invoice', 'Tax') ?> :</strong></div>
								<br clear="both" />
							</li>
							<li> 
								<div class="pull-right" style="width: 120px;">
									<?= Utils::currencyFormat($order->orderTotal, $order->currencyRate, $order->idCurrency) ?>
								</div>
								<div class="pull-right"><strong><?= $this->translate('store.invoice', 'Total') ?> :</strong></div>
								<br clear="both" />
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- invoice end-->
	
	<?php endif; ?>
	
</body>
</html>