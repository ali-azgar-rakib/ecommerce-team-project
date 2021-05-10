@extends('admin.admin_layout')

@section('adminMain')


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Tables</a>
        <span class="breadcrumb-item active">Data Table</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Data Table</h5>
            <p>DataTables is a plug-in for the jQuery Javascript library.</p>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Category List
                <a href="#" class="btn btn-warning btn-sm " style="float: right">Add New</a>
            </h6>


            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap text-center">
                    <thead>
                        <tr>
                            <th class="wd-15p">Serial</th>
                            <th class="wd-15p">Category Name</th>
                            <th class="wd-20p">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger</td>
                            <td>Nixon</td>
                            <td>
                                <button class="btn btn-sm btn-warning">edit</button>
                                <button class="btn btn-sm btn-danger" id='delete'>delete</button>

                            </td>

                        </tr>

                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->







    </div><!-- sl-pagebody -->

</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

@endsection