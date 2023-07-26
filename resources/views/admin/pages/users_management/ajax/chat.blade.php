@forelse ($data as $item)
    @if ($item['id'] == auth()->id())
        <div class="mychat">
            <p>{{$item['msg']}}</p>
        </div>
    @else
        <div class="other-chat">

            <p>{{$item['msg']}}</p>
        </div>
    @endif
@empty
@endforelse
