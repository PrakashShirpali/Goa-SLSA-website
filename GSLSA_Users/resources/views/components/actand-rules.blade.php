<div class="main-container">
    <div class="list-container">
        <h1>{{ $title }}</h1>
        <ol>
            @foreach ($items as $item)
                <li><a href="{{ $item['src'] }}" target="_blank">{{ $item['name'] }}</a></li>
            @endforeach
        </ol>
    </div>

</div>

@push('cssjs')
    @vite('resources/css/actandrules.css')
@endpush