<div class="previewBox">
    <a href="/image/{{ $image->getKey() }}">
    <h2>{{ $image->title }}</h2>
    <img src="{{ Illuminate\Support\Facades\Storage::url($image->fileName) }}"><br>
    <p>{{ $image->description }}</p>
    </a>
</div>