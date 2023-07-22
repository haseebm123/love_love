@foreach ($data as $item)

    @php
        $img = $item['user']->profile ?? 'default.png';
    @endphp
    @if ($item['user'])

    <li id="req-profile{{ $item['ids']??null }}" class="req-profile" data-id={{ $item['user']['id']??null }} data-fire={{ $item['ids']??null }}>
        <div class="pr-1">
            <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                    src='{{ asset("documents/profile/$img") }}' height="42" width="42"
                    alt="Generic placeholder image">
                <i></i>
            </span>
        </div>
        <div class="user-chat-info">
            <div class="contact-info">
                <h5 class="font-weight-bold mb-0">{{ isset($item['user']->first_name) ? $item['user']->first_name . ' ' : '' }}
                    {{ isset($item['user']->mid_name) ? $item['user']->mid_name . ' ' : '' }}
                    {{ isset($item['user']->last_name) ? $item['user']->last_name . ' ' : '' }}</h5>
                <p class="truncate">{{ $item['user']['msg']??null }}</p>
            </div>
            <div class="contact-meta pr-2">

                <span class="avatar avatar-1 m-0 avatar-md"><i class="fa-regular fa-message"></i>

                </span>


            </div>
        </div>
    </li>
    @endif
@endforeach
