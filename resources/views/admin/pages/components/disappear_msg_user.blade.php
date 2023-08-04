@forelse ($data as $item)

    <li id="req-profile{{ $item->sender->id }}" data-sender-id={{ $item->sender->id }} data-receiver-id={{ $item->receiver->id }} class="req-profile req-profile{{ $item->sender->id }}">
        <div class="user-chat-info">
            <div class="contact-info">
                <h5 class="font-weight-bold mb-0">
                    {{ isset($item->sender->first_name) ? $item->sender->first_name . ' ' : '' }}
                    {{ isset($item->sender->mid_name) ? $item->sender->mid_name . ' ' : '' }}
                    {{ isset($item->sender->last_name) ? $item->sender->last_name . ' ' : '' }}
                    to

                    {{ isset($item->receiver->first_name) ? $item->receiver->first_name . ' ' : '' }}
                    {{ isset($item->receiver->mid_name) ? $item->receiver->mid_name . ' ' : '' }}
                    {{ isset($item->receiver->last_name) ? $item->receiver->last_name . ' ' : '' }}



                </h5>
            </div>
        </div>
    </li>
@empty

@endforelse
