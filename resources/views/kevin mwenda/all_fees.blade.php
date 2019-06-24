<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cat 2</title>

	<!--Load dependencies from CDNs. These are only for the purpose of front-end design (bootstrap) and validation (JQuery).-->
	<link rel="shortcut icon" type="image/png" href="https://res.cloudinary.com/dkgtd3pil/image/upload/v1554896611/other_data/pngtree_color_internet_programming_icon_internet_png_image_621325_icon.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/kt-2.5.0/r-2.2.2/datatables.min.css"/>

	<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/kt-2.5.0/r-2.2.2/datatables.min.js"></script>
	<!--End of Dependencies. Comment out the above lines to remove any styling and front-end validation used.-->

	<link rel="stylesheet" type="text/css" href="{{env('APP_ENV') === 'local' ? asset('public/css/style.css') : secure_asset('public/css/style.css')}}">

</head>
<body>

<div id="container">
	<h1><b>Here Are All Fee Payments in The System.</b><span class="link"><a href="{{url('')}}" class="text-info">Landing Page</a></span></h1>

	<div id="body">
		<table class="table bordered table-striped table-hover w-100">
			<thead class="thead-light">
				<tr>
					<th>Student Full Name</th>
					<th>Student Date of Birth</th>
					<th>Student Address</th>
					<th>Amount</th>
					<th>Date Paid</th>
				</tr>
			</thead>
			<tbody>
				@foreach($fees as $fee)
				<?php $fee = json_decode(json_encode($fee),true)?>
				<tr>
					<td><?=ucwords(strtolower($fee['last_name']." ".$fee['first_name']))?></td>
					<td><?=date_create($fee['dob'])->format('dS M, Y')?></td>
					<td><?=$fee['address']?></td>
					<td><?=$fee['amount']?></td>
					<td><?=date_create($fee['created_at'])->format('dS M, Y • h:iA')?></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<p class="footer">Created by 101538, BICS Year 3 Semester 1 Group B, IAP CAT 2</p>
</div>
</body>
<script>$('table').DataTable({responsive:true})</script>
</html>