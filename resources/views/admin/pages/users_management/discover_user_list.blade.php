@forelse ($data as $key=>$item)
    <div id="req-profile{{  $item->id }} " class="d-flex justify-content-between w-100  mt-1 rouden req-profile" data-id={{ $item->id }}>
        <div class="pr-1">
            <span class="avatar m-0 avatar-md tick" style="background: url({{ asset('icon/tick.svg') }} ) lightgray; ">
                <i></i>
            </span>
        </div>

        <div>
            <div>
                <h5 class="textWhite">{{ isset($item->first_name) ? $item->first_name . ' ' : '' }}
                    {{ isset($item->mid_name) ? $item->mid_name . ' ' : '' }}
                    {{ isset($item->last_name) ? $item->last_name . ' ' : '' }}</h5>
                <span class="textWhite ">
                    Hey there! I'm a 32-year-old guy who enjoys
                </span>
            </div>
        </div>
        @php
            $img = $item->profile ?? null;
        @endphp
        <div class="pr-1">
            <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                    src='{{ asset("documents/profile/$img") }}' height="42" width="42"
                    alt="Generic placeholder image">
                <i></i>
            </span>
        </div>
    </div>

@empty
@endforelse


{{-- <div class="d-flex justify-content-between w-100  mt-1   rouden active">
    <div class="pr-1">
        <span class="avatar m-0 avatar-md tick_active active" style="background: url({{ asset('icon/tick_active.svg') }} ) white; ">
            <i></i>
        </span>
    </div>

    <div>
        <div>
            <h5 class="textWhite">James Robert</h5>
            <span class="textWhite">
                Hey there! I'm a 32-year-old guy who enjoys
            </span>
        </div>
    </div>
    <div class="pr-1">
        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                src="{{ asset('documents/profile/default.png') }}" height="42" width="42"
                alt="Generic placeholder image">
            <i></i>
        </span>
    </div>
</div> --}}
