@forelse ($data as $item)
    <div class="mychat">
        <p>{{ $item->message }}</p>
    </div>

@empty
@endforelse
