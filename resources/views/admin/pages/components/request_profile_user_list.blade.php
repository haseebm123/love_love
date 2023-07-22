@forelse ($data['request'] as $key=>$item)
    <li id="req-profile{{ $item->id }}" class="req-profile" data-id={{ $item->id }}>
        <div class="pr-1">
            <i class="fa-regular fa-circle-check"></i>
        </div>
        <div class="user-chat-info">
            <div class="contact-info">
                <h5 class="font-weight-bold mb-0">{{ isset($item->first_name) ? $item->first_name . ' ' : '' }}
                    {{ isset($item->mid_name) ? $item->mid_name . ' ' : '' }}
                    {{ isset($item->last_name) ? $item->last_name . ' ' : '' }}</h5>
                <p class="truncate">{{ isset($item->about) ? $item->about . ' ' : '' }}</p>
            </div>
            <div class="contact-meta">
                @php
                    $img = $item->profile ?? null;
                @endphp
                <img class="media-object rounded-circle sml-round"
                    src='{{ asset("documents/profile/$img") }}'  height="30" width="30"
                    alt="Generic placeholder image">
                <i></i>

                <!-- <span class="float-right mb-25">4:14 PM</span> -->
                <!-- <span class="badge badge-primary badge-pill float-right">3</span> -->
            </div>
        </div>
    </li>

@empty
@endforelse
