<table class="table table-hover" border="1">
    <thead>
        <tr>
            <th></th>
        @foreach($distribusi as $d)
            <th>{{ $d->qty}}</th>
        @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($historystok as $hs)
        <tr>
            <th>{{ $hs->stok}}</th>
            @foreach($hasilColumn as $key)
                @foreach($key as $subkey)
                <td>
                {{ $subkey }}
                </td>
                @endforeach
            @endforeach
        </tr>
        @endforeach        
    </tbody>
</table>

