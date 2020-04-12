
<div class="container">
    <h2>Advanced Input Field</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 40px"><button type="button" class="btn btn-success add-field">+</button></th>
				<th style="width: 70%">Description</th>
				<th style="width: 15%">Quantity</th>
				<th style="width: 15%">Unit Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th></th>
				<td>
                    <span class="description-text-view-0" onclick="editText('description-text-view-0')">test</span>
                    <textarea class="form-control description-text-edit-0" onblur="changeText('description-text-edit-0')" data-flied="textarea" name="data[0][description]" style="display: none"></textarea>
                </td>
				<td>
                    <span class="quantity-text-view-0" onclick="editText('quantity-text-view-0')">20</span>
                    <input class="form-control quantity-text-edit-0" onblur="changeText('quantity-text-edit-0')" type="text" data-field="input" name="data[0][quantity]" style="display: none">
                </td>
				<td>
                    <span class="price-text-view-0" onclick="editText('price-text-view-0')">2</span>
                    <input class="form-control price-text-edit-0" onblur="changeText('price-text-edit-0')" type="text" name="data[0][price]" style="display: none">
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script>
    function editText(value) {
        var class_name = "."+value;
        $(class_name).css('display', 'none');
        if($(class_name).next().data('flied') == 'textarea'){
            $(class_name).next().text($(class_name).text());
        }
        else {
            $(class_name).next().attr('value', $(class_name).text());
        }
        $(class_name).next().css('display', 'block');
        $(class_name).next().focus();
    }
    function changeText(value) {
        var class_name = "."+value;
        if($(class_name).val() != ''){
            $(class_name).css('display', 'none');
            $(class_name).prev().text($(class_name).val());
            $(class_name).prev().css('display', 'block')
        }
    }
    $('.add-field').click(function() {
        var length = $('tbody tr').length;
        var field = '<tr>'
                        +'<th></th>'
                        +'<td>'
                            +'<span class="description-text-view-'+length+'" onclick="editText(\'description-text-view-'+length+'\')" style="display: none"></span>'
                            +'<textarea class="form-control description-text-edit-'+length+'" onblur="changeText(\'description-text-edit-'+length+'\')" name="data['+length+'][description]"></textarea>'
                        +'</td>'
                        +'<td>'
                            +'<span class="quantity-text-view-'+length+'" onclick="editText(\'quantity-text-view-'+length+'\')" style="display: none"></span>'
                            +'<input class="form-control quantity-text-edit-'+length+'" onblur="changeText(\'quantity-text-edit-'+length+'\')" type="text" name="data['+length+'][quantity]">'
                        +'</td>'
                        +'<td>'
                            +'<span class="price-text-view-'+length+'" onclick="editText(\'price-text-view-'+length+'\')" style="display: none"></span>'
                            +'<input class="form-control price-text-edit-'+length+'" onblur="changeText(\'price-text-edit-'+length+'\')" type="text" name="data['+length+'][price]">'
                        +'</td>'
                    +'</tr>';
        $('tbody').append(field);
    })
</script>