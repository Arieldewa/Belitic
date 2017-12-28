@extends("layout.admin")
@section("content")
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Data distribution
                <a  href="{{url('distribution/create')}}"  class="btn btn-sm btn-primary">Add</a>
                </h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                    <th>ID</th>
                    <th >Agent</th>
                    <th >Produk</th>
                    <th >Jumlah</th>
                    <th >Harga</th>
                    </thead>
                    <tbody>

                    @foreach ($distributions as $distribution)
                    <tr>
                        <td>{{$distribution->id}}</td>
                        <td>{{$distribution->agent->name}}</td>
                        <td>{{$distribution->product->name}}</td>
                        <td>{{$distribution->qty}}</td>
                        <td>{{$distribution->price}}</td>

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
                    url:" {{ url('distribution')}}/"+id,
                    type: 'DELETE',
                })

                .done(function(res) {
                    location.reload();
                })
            }
        }
    </script>
@endsection