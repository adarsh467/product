@extends('admin.layouts.app')

@section('title', 'Products | List')

@section('topRes')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
	<!-- content-wrapper -->
	<div class="content-wrapper listing">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
                        <h1 class="m-0"><i class="fas fa-store"></i> Products List</h1>
					</div>
					<!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{ URL::to('/') }} ">Home</a></li>
							<li class="breadcrumb-item active">Products List</li>
						</ol>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->
		<!-- Main content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<!-- REGISTER FORM -->
					<div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with default features</h3>
                                <div class="text-right">
                                    <a href="{{ route('product.add') }}" class="add-surveyer">
                                        <button type="button" class="btn btn-outline-primary btn-sm btn-add-surveyer">
                                            <i class="fas fa-store"></i><i class="icon-two fas fa-plus"></i> <span>Add New Product</span>
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($products) && $products->count() > 0)
                                            @php $i = $products->firstItem(); @endphp
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td><img src="{{ File::exists($product->img_path.'50x30/'.$product->image) ? asset($product->img_path.'50x30/'.$product->image) : asset('assets/admin/dist/img/default.jpg') }}" alt="Product Image" width="50" height="30"></td>
                                                    <td><a href="{{ route('addon.cat1', ['proId' => Crypt::encryptString($product->id)]) }}">{{ $product->name }}</a></td>
                                                    <td>@money($product->price)</td>
                                                    <td>
                                                        @if($product->status == 1)
                                                            <span class="badge bg-success">Published</span>
                                                        @else
                                                            <span class="badge bg-danger">Draft</span>
                                                        @endif
                                                    <td>
                                                        <a href="{{ route('product.view', ['id' => Crypt::encryptString($product->id)]) }}">
                                                            <button class="btn btn-outline-info btn-sm" title="View"><i class="fas fa-eye"></i></button>
                                                        </a>
                                                        <a href="{{ route('product.edit', ['id' => Crypt::encryptString($product->id)]) }}">
                                                            <button class="btn btn-outline-primary btn-sm" title="Edit"><i class="fas fa-edit"></i></button>
                                                        </a>
                                                        <form id="delete-form-{{$product->id}}" action="{{ route('product.delete', ['id' => Crypt::encryptString($product->id)]) }}" class="display-unset" method="post">
                                                            @csrf 
                                                            @method('DELETE')
                                                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete"><i class="fa-solid fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @php $i++; @endphp
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="pagination-container">
                                    {{ $products->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
					</div>
					<!-- END of Register Form -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
@endsection

@section('bottomRes')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function () {
            let columnLen = ["0, 2, 3, 4"];
            let dataTable = "#dataTable";
            $(dataTable).DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": false, "bPaginate": false, "info": false,
                "buttons": [
                    {
                        extend: "copy",
                        exportOptions: {
                            columns: columnLen
                        }
                    },
                    {   
                        extend: "csv",
                        exportOptions: {
                            columns: columnLen
                        }
                    },
                    {
                        extend: "excel",
                        exportOptions: {
                            columns: columnLen
                        }
                    },
                    {
                        extend: "pdf",
                        exportOptions: {
                            columns: columnLen
                        }
                    },
                    {
                        extend: "print",
                        exportOptions: {
                            columns: columnLen
                        }
                    },
                    {
                        extend: "colvis"
                    }
                ]
            }).buttons().container().appendTo(dataTable+'_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection