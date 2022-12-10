<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8|7 Datatables Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        #DataTables_Table_0_filter{
            width: 100%;
            text-align: left;
        }
        #DataTables_Table_0_filter span{
            float: left;
        }
        #DataTables_Table_0_filter #addRow{
            float: right;
        }
        .paginate_button{
            padding: 1px !important;
        } 
        table.dataTable thead th {
            background: transparent !important;
            white-space: nowrap;
        }
        
        table.dataTable thead span.sort-icon {
            display: inline-block;
            padding-left: 5px;
            width: 16px;
            height: 16px;
            margin-left: 10px;
        }
 
        table.dataTable thead .sorting span {
            background: url('http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/images/sort_both.png') no-repeat center right;
        }
        table.dataTable thead .sorting_asc span {
            background: url('https://img.icons8.com/plumpy/16/null/sort.png') no-repeat center right;
            transform: rotate(180deg);
        }
        table.dataTable thead .sorting_desc span {
            background: url('https://img.icons8.com/plumpy/16/null/sort.png') no-repeat center right;
        }
        
        table.dataTable thead .sorting_asc_disabled span {
            background: url('http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/images/sort_asc_disabled.png') no-repeat center right;
        }
        table.dataTable thead .sorting_desc_disabled span {
            background: url('http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/images/sort_desc_disabled.png') no-repeat center right;
        }
        
        table.dataTable thead .sorting::before,
        table.dataTable thead .sorting_asc::before,
        table.dataTable thead .sorting_desc::before,
        table.dataTable thead .sorting_asc_disabled::before,
        table.dataTable thead .sorting_desc_disabled::before {
            content: "";
        }
        
        table.dataTable thead .sorting::after,
        table.dataTable thead .sorting_asc::after,
        table.dataTable thead .sorting_desc::after,
        table.dataTable thead .sorting_asc_disabled::after,
        table.dataTable thead .sorting_desc_disabled::after {
            content: "";
        }
    </style>  
</head>
<body>
    
<div class="container mt-5">
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>   
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        // language: {
        //     search: ""
        // },
        lengthChange: false,
        bInfo : false,
        // processing: true,
        serverSide: true,
        ajax: "{{ route('users') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false,
            },
        ]
    });
    $("#DataTables_Table_0_filter").parent().removeClass('col-md-6');
    $("#DataTables_Table_0_filter").parent().prev().hide();
    $('#DataTables_Table_0_filter').append('<button id="addRow">Add new</button>');
    $('.sorting_asc')
    table.columns().iterator('column', function (ctx, idx) {
        $(table.column(idx).header()).append('<span class="sort-icon"/>');
    });
  });
</script>
</html>