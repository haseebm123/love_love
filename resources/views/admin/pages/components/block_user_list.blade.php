@foreach ($data as $item)
    @php
                $img = $item->profile ?? null;
            @endphp
<li id="req-profile{{ $item->id }}" data-id={{ $item->id }} class="req-profile">
    <div class="pr-1">
        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                src='{{ asset("documents/profile/$img") }}' height="42" width="42"
                alt="Generic placeholder image">
            <i></i>
        </span>
    </div>
    <div class="user-chat-info">
        <div class="contact-info">
            <h5 class="font-weight-bold mb-0">{{ isset($item->first_name) ? $item->first_name . ' ' : '' }}
                    {{ isset($item->mid_name) ? $item->mid_name . ' ' : '' }}
                    {{ isset($item->last_name) ? $item->last_name . ' ' : '' }}</h5>
            <p class="truncate">{{ isset($item->about) ? $item->about . ' ' : '' }}</p>
        </div>
        <div class="contact-meta pr-2">
            <button class="btn-un unblock-btn" data-id={{ $item->id }}>Unblock</button>
        </div>
    </div>
</li>
@endforeach

