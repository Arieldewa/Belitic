@extends("layout.admin")
@section("content")
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Data History Stok
                <a  href="{{url('agent/create')}}"  class="btn btn-sm btn-primary">Add</a>
                </h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                    <th>ID</th>
                    <th >Product ID</th>
                    <th >Stok</th>
                    <th >Tanggal</th>
                    <th>Action</th>
                    </thead>
                    <tbody>

                    @foreach ($historystok as $history)
                    <tr>
                        <td>{{$history->id}}</td>
                        <td>{{$history->id_product}}</td>
                        <td>{{$history->stok}}</td>
                        <td>{{$history->date}}</td>                        
                        <td>
                            <a class="btn btn-primary" href="{{url('agent/'.$history->id.'/edit')}}">Edit</a>
                            <a class="btn btn-danger" href="#" onclick="checkDelete({{$history->id}})" >Delete</a>
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
                    url:" {{ url('agent')}}/"+id,
                    type: 'DELETE',
                })

                .done(function(res) {
                    location.reload();
                })
            }
        }
    </script>
@endsection