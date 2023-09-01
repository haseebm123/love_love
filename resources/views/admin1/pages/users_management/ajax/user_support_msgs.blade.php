@forelse ($data as $key=>$item)
    <div id="req-profile{{  $item->user->id }} " class="d-flex justify-content-between w-100  mt-1 rouden req-profile" data-id={{ $item->user->id }}>
        @php
            $img = $item->user->profile ?? null;
        @endphp
        <div class="pr-1">
            <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                    src='{{ asset("documents/profile/$img") }}' height="42" width="42"
                    alt="Generic placeholder image">
                <i></i>
            </span>
        </div>

        <div>
            <div>
                <h5 class="textWhite">{{ isset($item->user->first_name) ? $item->user->first_name . ' ' : '' }}
                    {{ isset($item->user->mid_name) ? $item->user->mid_name . ' ' : '' }}
                    {{ isset($item->user->last_name) ? $item->user->last_name . ' ' : '' }}</h5>
                <span class="textWhite ">
                    Hey there! I'm a 32-year-old guy who enjoys
                </span>
            </div>
        </div>

        <div class="pr-1">
            <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                    src='{{ asset("icon/msg2.svg") }}' height="42" width="42"
                    alt="Generic placeholder image">
                <i></i>
            </span>
        </div>
    </div>

@empty
@endforelse



