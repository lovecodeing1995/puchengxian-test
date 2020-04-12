<div class="container">
    <h2>Listing Record page</h2>
    <table id="book-table">
        <thead>
            <tr><td>ID</td><td>Name</td></tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#book-table').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url':'<?=base_url('recoder/get_recoder')?>'
            },
            'columns': [
                { data: 'id' },
                { data: 'name' }
            ]
            });
        });
    </script>
</div>