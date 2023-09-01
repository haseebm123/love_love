@forelse ($data as $item)
 
    @if ($item['id'] == auth()->id())
        <div class="mychat" id="{{$item['id']}}">
            <p>{{$item['msg']}}</p>
        </div>
    @else
        <div class="other-chat">

            <p>{{$item['msg']}}</p>
        </div>
    @endif
@empty
@endforelse
