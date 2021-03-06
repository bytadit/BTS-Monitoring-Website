<div class="row justify-content-around">
    @foreach($btslists as $btslist)
            <div class="card justify-content-between align-items-between col-md-3 m-3 p-2 text-center rounded-4">
                <h3 class="card-title"><a href="/dashboard/btslists/{{ $btslist->id }}" class="text-decoration-none text-dark">{{ $btslist->nama }}</a></h3>
                <div class='card-img-top d-flex align-items-center justify-content-center mw-100' style="height: 150px;overflow:hidden;" >
                    @if($btsphotos)
                        <img src="{{ asset('storage/' . $btsphoto->firstWhere('btslist_id', $btslist->id)->url) }}" class="img-thumbnail rounded-3" alt="{{ $btslist->nama }}">
                        @else
                        <img src="https://source.unsplash.com/1200x400?tower" alt="{{ $btslist->nama }}" class="img-fluid rounded-3">
                    @endif
                </div>
                <div class="card-footer mt-3 rounded-3">
                    <a href="/dashboard/btslists/{{ $btslist->id }}" class="badge bg-info">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                    @can('admin')
                    <a href="/dashboard/btslists/{{ $btslist->id }}/edit" class="badge bg-warning">
                        <i class="bi bi-pen-fill"></i>
                    </a>
                    <form action="/dashboard/btslists/{{ $btslist->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill"></i></span></button>
                    </form>
                    @endcan
                    </a>
                </div>
            </div>
            @endforeach
    <div id="pagination">
        {{ $btslists->links() }}
    </div>
</div>
