
@forelse ($data as $key=>$item)
<style>
    .avatar {
        width: 70px !important;
        height: 65px !important;

    }
</style>
    <div id="req-profile{{ $item->id }}" data-id={{ $item->id }}
        class="d-flex justify-content-between w-100  mt-1 rouden req-profile">
        <div class="pr-1">
            @php
                $img = $item->profile ?? null;
            @endphp
            <span class="avatar m-0 avatar-md">
                <img src='{{ asset("documents/profile/$img") }}' alt="">
                <i></i>
            </span>
        </div>

        <div>
            <div>
                <h5 class="textWhite">{{ isset($item->first_name) ? $item->first_name . ' ' : '' }}
                    {{ isset($item->mid_name) ? $item->mid_name . ' ' : '' }}
                    {{ isset($item->last_name) ? $item->last_name . ' ' : '' }}</h5>

            </div>
        </div>
        <div class="pr-1">
            <button class="btn-rounded unblock-btn" data-id={{ $item->id }}>UnBlock</button>
        </div>
    </div>
@empty
@endforelse
