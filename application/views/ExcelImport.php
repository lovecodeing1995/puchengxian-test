
<div class="container">
    <h2>Import Excel File</h2>
    <form action=<?= base_url('excelimport/import') ?> method="post" enctype="multipart/form-data" class="file-upload">
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="excelfile" accept=".xls,.xlsx">
        </div>
        <input type="submit" class="btn btn-secondary" value="Upload" />
    </form>
    <div class="alert alert-success alert-dismissible fade hide" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<script>
    $(".file-upload").submit(function (e){
		e.preventDefault();
		var url = $(this).attr('action');

		var data = $(this).serialize();
		$.ajax({
			url:url,
			type:"post",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
		}).done(function (data){
            // alert(data);
            console.log(data)
            $('.alert-dismissible').removeClass('hide').addClass('show');
            
		});
	});
</script>