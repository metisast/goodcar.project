<div id="top-menu">
    <ul class="top-menu">
        @foreach($compCatalogs as $catalog)
            <li><a href="{{ route('guest.catalogs.show', $catalog->id) }}">{{ $catalog->title }}</a></li>
        @endforeach
    </ul>
</div>