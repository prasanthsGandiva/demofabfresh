<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Fabfresh</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
		float:left;
	}
	.fluid{
		margin: 10px 0 10px	 0;
		float:left;
		width:90%;
	}
	</style>
	 <script src="/assets/jquery.min.js"></script>
</head>
<body>

<div id="container">
	<h1>Fabfresh</h1>

	<div id="body">
		<div class="fluid">
			<input type="text" id="email" placeHolder="Email"/>
		</div>
		<div class="fluid">
			<input type="text" id="order_item" placeHolder="Order item"/>
		</div>
		<div class="fluid">
			<input type="text" id="price" placeHolder="price"/>
		</div>
		<div class="fluid">
			<input type="text" id="quantity" placeHolder="quantity"/>
		</div>
		<div class="fluid">
			<button value="order" id="order">Submit</button>
		</div>
		

		
	</div>
</div>
<script type="text/javascript">
	$("#order").click(function() {
		var email = $('#email').val();
		var order_item = $('#order_item').val();
		var price = $('#price').val();
		var quantity = $('#quantity').val();
		$.ajax({
			type: 'POST',
			url: "index.php/orders",
			async : false,
			dataType: "json",
			data :{email : email,order_item : order_item,price : price,quantity : quantity},
			success: function(res) {
				alert(res);  
			}
		});
	});
</script>
</body>
</html>