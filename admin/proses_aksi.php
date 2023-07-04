<?php
include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="form-group">
						<input type="text" id="id_paket" name="id_paket">
						<label for="" class="control-label">Pilih Paket</label>
						<select class="form-control custom-select" id="id_paket" name="id_paket">
							<option></option>

						</select>
					</div>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			type: 'POST',
			url: "get_outlet.php",
			cache: false, 
			success: function(msg){
				$("#id_outlet").html(msg);
			}
		});

		$("#id_outlet").change(function(){
			var id_outlet = $("#id_outlet").val();
			$.ajax({
				type: 'POST',
				url: "admin/get_paket.php",
				data: {id_outlet: id_outlet},
				cache: false,
				success: function(msg){
					$("#id_paket").html(msg);
				}
			});
		});

	});
</script>