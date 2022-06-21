@foreach($btslists as $btslist)
            <div class="card col-md-3 m-3">
                <h3 class="card-title"><a href="/dashboard/btslists/show" class="text-decoration-none text-dark">{{ $btslist->nama }}</a></h3>
                <div style="max-height: 350px; overflow:hidden;">
                    @if($btsphotos)
                        <img src="{{ asset('storage/' . $btsphoto->firstWhere('btslist_id', $btslist->id)->url) }}" class="img-thumbnail" alt="{{ $btslist->nama }}">
                        @else
                        <img src="https://source.unsplash.com/1200x400?tower" alt="{{ $btslist->nama }}" class="img-fluid">
                    @endif
                </div>
                <div class="card-body">
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