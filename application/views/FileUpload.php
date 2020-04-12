
<div class="container">
    <h2>File Upload</h2>
    <form action=<?= base_url('fileupload/fileSave') ?> method="post" enctype="multipart/form-data" class="file-upload">
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="userfile">
        </div>
        <input type="submit" class="btn btn-secondary" value="Upload" />
    </form>
    <h2>Data Imported</h2>
    <a href=<?= base_url('fileupload/export')?>>
        <button class="btn btn-secondary">
            CSV file
        </button>
    </a>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($file_list as $file) { 
            ?>
            <tr>
                <th scope="row"><?= $file->id ?></th>
                <td><?= $file->name ?></td>
                <td><?= $file->email ?></td>
                <td><?= $file->created ?></td>
            </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
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
            var file_data = JSON.parse(data);
            var insert_data = '<tr>'
                +'<th scope="row">'+file_data.id+'</th>'
                +'<td>'+file_data.name+'</td>'
                +'<td>'+file_data.email+'</td>'
                +'<td>'+file_data.created+'</td>'
            +'</tr>';
            $('tbody').append(insert_data);
			
		});
	});
</script>