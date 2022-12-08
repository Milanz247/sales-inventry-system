<!DOCTYPE html>
<html lang="en">

<head>
    @include('manager.tool.css')
    <style>
        .center
        {
            margin: 40px;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- HEADER-->
        @include('manager.tool.header')

        <!-- SIDEBAR-->
        @include('manager.tool.sidebar')

        <div class="content-wrapper">
            <div class="center">
                <div class="centerla">

                </div>
                <div class="centerla">
                    <h1>ddwdf</h1>
                </div>
                <div class="centerla">
                    <a href="{{ url('generate-pdf') }}">
                        <button style="width:150px;" type="button" class="btn btn-success">Print PDF</button>
                    </a>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>

                        <th>item_Code</th>
                        <th>item_name</th>
                        <th>item_description</th>
                        {{-- <th>Buying_price</th>
                        <th>Selling_price</th>
                        <th>warranty</th> --}}
                        <th>quantity</th>
                        {{-- <th>catagory_id</th> --}}
                        {{-- <th> Action</th> --}}
                    </tr>
                </thead>
                {{-- <tfoot>
                    <tr>

                        <th>item_Code</th>
                        <th>item_name</th>
                        <th>item_description</th>
                        <th>Buying_price</th>
                        <th>Selling_price</th>
                        <th>warranty</th>
                        <th>quantity</th>
                        <th>catagory_id</th>
                        <th> Action</th>
                    </tr>
                </tfoot> --}}
                <tbody>
                    @foreach ( $items as  $items):
                    <tr>

                        <td>{{ $items->item_Code }}</td>
                        <td>{{ $items->item_name }}</td>
                        <td>{{ $items->item_description }}</td>
                        {{-- <td>{{ $items->Buying_price	 }}</td>
                        <td>{{ $items->Selling_price }}</td>
                        <td>{{ $items->warranty }}</td> --}}
                        <td>{{ $items->quantity }}</td>
                        {{-- <td>{{ $items->catagory_id }}</td> --}}
                    </tr>
                    @endforeach


                </tbody>
            </table>
            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
                </ul>
        </nav>

        </div>
        <!--  preloader -->
        @include('manager.tool.preloader')

        <!-- script  -->
        @include('manager.tool.script')
</html>
