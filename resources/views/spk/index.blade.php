@extends("layout.admin")
@section("content")

<div class="row">
    @foreach($agents as $agent)
    <div class="col-md-4">
    <div class="card">
        <div class="header">
            <h4 class="title">{{ $agent->name}}</h4>
            <p class="category">{{ $agent->alamat}}</p>
            {{ $agent->created_at->diffForHumans() }}
        </div>
        <div class="content">        
            <a href="{{ url('spk-analisis/'.$agent->id) }}" data-togle="modal" href='#modal-id' class="btn btn-default" >Lihat Prediksi Distribusi</a>            
        </div>
    </div>
</div>
    @endforeach

<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
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
