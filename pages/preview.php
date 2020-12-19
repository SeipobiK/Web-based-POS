<!DOCTYPE html>
<html>
<?php
include'../includes/connection.php';
include'../includes/topp2.php';
//imma make it trans uniq id
$today = date("mdGis");
 ?> 

<head>

<title>

</title>



<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>




<?php                  


    $trans_d = $_GET['trans_d'];
    $query = 'SELECT *FROM transaction  WHERE  TRANS_D_ID = '.$_GET['trans_d'];
    $result = mysqli_query($db, $query) or die (mysqli_error($db));
         
            while ($row = mysqli_fetch_assoc($result)) { 

				$des=$row['CUST_ID'];
                $name=$row['GRANDTOTAL'];
                $pr1=$row['CASH'];
                $date=$row['DATE'];
                $pl=$row['TRANS_D_ID'];
				
			}
           ?>



<div class="span10">
	<a href="pos.php?trans_d=<?php echo $today ?>"><button class="btn btn-default"><i class="icon-arrow-left"></i> Back to POS</button></a>

<div class="content" id="content">
<div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal;">
	<div style="width: 100%; height: 190px;" >
	<div style="width: 900px; float: left;">
	<center><div style="font:bold 25px 'Aleo';">Receipt</div>
	T&T SUPERMARKET (PTY) LTD	<br>
	NUL, ROMA 180	<br>	<br>
	</center>
	<div>

	</div>
	</div>
	<div style="width: 236px; float: left; height: 90px;">
	<table cellpadding="3" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">

	   <tr>
			<td>CASHIER:<?php echo $_SESSION['FIRST_NAME']; ?><?php echo ' '?><?php echo $_SESSION['LAST_NAME'] ?></td>
		</tr>
      <tr>
			<td>RECEIPT# :<?php echo $pl ?></td>
	  </tr>
		<tr>
			<td>Date:<?php echo $date ?></td>
			</tr>


			
	</table>
	<br></br>
	<br></br>
	</div>
	<div class="clearfix"></div>
	</div>
	<div style="width: 100%; margin-top:-70px;">
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;	text-align:left;" width="100%">
		<thead>
			<tr>
				
				<th width="90"> Product Name </th>
				<th> Qty </th>
				<th> Price </th>
				<th> VAT </th>
				<th> Discount </th>
				<th> Amount </th>
			</tr>
		</thead>
		<tbody>
		<?php	
		$trans_d = $_GET['trans_d'];
    	$query = 'SELECT *FROM transaction_details  WHERE  TRANS_D_ID = '.$_GET['trans_d'];
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
         
            while ($row = mysqli_fetch_assoc($result)) { 
				?>
				<tr class="record">
				<td><?php echo $row['PRODUCTS']; ?></td>
				<td><?php echo $row['QTY']; ?></td>
				
				<td>
				<?php
				$ppp=$row['PRICE'];
				echo formatMoney($ppp, true);
				?>
				</td>

				<td>
				<?php
				$VAT=$row['PRICE']-$row['PRICE']/1.15;
				
				echo formatMoney($VAT, true);
				?>
				</td>
				<td>
				<?php echo '0.00'?>
				</td>

				<td>

				<?php
				$dfdf=$row['AMOUNT'];
				echo formatMoney($dfdf, true);
				?>
				
				</td>
				</tr>
				<?php
					}
				?>
			
				<tr>
					<td colspan="5" style=" text-align:right;"><strong style="font-size: 12px;">Total: &nbsp;</strong></td>
					<td colspan="2"><strong style="font-size: 12px;">
					<?php
									$query = 'SELECT sum(AMOUNT)FROM transaction_details  WHERE  TRANS_D_ID = '.$_GET['trans_d'];
									$result = mysqli_query($db, $query) or die (mysqli_error($db));
					
						while ($rowas = mysqli_fetch_assoc($result)) { 
								$fgfg=$rowas['sum(AMOUNT)'];
								echo formatMoney($fgfg, true);
					}
					?>
					</strong></td>
				</tr>
			
				<tr>
					<td colspan="5"style=" text-align:right;"><strong style="font-size: 12px; color: #222222;">Cash Tendered:&nbsp;</strong></td>
					<td colspan="2"><strong style="font-size: 12px; color: #222222;">
					<?php
					echo formatMoney($pr1, true);
					?>
					</strong></td>
				</tr>
				<?php
				
				?>
				<tr>
					<td colspan="5" style=" text-align:right;"><strong style="font-size: 12px; color: #222222;">
					<font style="font-size:20px;">
					<?php
					 $amount=$pr1-$name;
					 echo 'Change';
					?>&nbsp;
					</strong></td>
					<td colspan="2"><strong style="font-size: 15px; color: #222222;">
					<?php
					function formatMoney($number, $fractional=false) {
						if ($fractional) {
							$number = sprintf('%.2f', $number);
						}
						while (true) {
							$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
							if ($replaced != $number) {
								$number = $replaced;
							} else {
								break;
							}
						}
						return $number;
					}
				 
					echo formatMoney($amount, true);
					
					?>
					</strong></td>
				</tr>
			
		</tbody>
	</table>
	

	
	</div>
	</div>
	</div>
	</div>
	<div class="pull-right" style="margin-left:930px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
		</div>	
</div>
</div>























