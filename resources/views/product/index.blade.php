@extends("layout.admin")
@section("content")
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Data product
                <a  href="{{url('product/create')}}"  class="btn btn-sm btn-primary">Add</a>
                </h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                    <th>ID</th>
                    <th >Nama</th>
                    <th >Harga</th>
                    <th>Action</th>
                    </thead>
                    <tbody>

                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->harga}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{url('product/'.$product->id.'/edit')}}">Edit</a>
                            <a class="btn btn-danger" href="#" onclick="checkDelete({{$product->id}})" >Delete</a>
                        </td>
                    </tr>
                    @endforeach


                    </tbody>
                </table>

            </div>
        </div>
    </div>



</div>
@endsection
@section('js')
    <script type="text/javascript">
        function checkDelete(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
                }
            });
            if (confirm('Really delete?')) {

                $.ajax({
                    url:" {{ url('product')}}/"+id,
                    type: 'DELETE',
                })

                .done(function(res) {
                    location.reload();
                })
            }
        }
    </script>
@endsection