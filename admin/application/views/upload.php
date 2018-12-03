<form action="<?=base_url('upload/act_upload');?>" method="post" enctype="multipart/form-data">
	<input type="file" name="media" id="">
	<button type="submit">Upload</button>
</form>

<?php
	if (isset($error)) {
		# code...
		echo $error;
	}
	if (isset($data)) {
		echo json_encode($data);
	}
?>
