 @forelse ($data as $item)
     @php
         $img = $item->profile ?? 'default.png';
     @endphp
     <li id="req-profile{{ $item->id ?? null }}" class="req-profile" data-id={{ $item->id ?? null }} data-fire={{$item->conv_id??null }}>
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
                 </h5>
                 <p class="truncate">{{ $item->about ?? null }}</p>
             </div>
             <div class="contact-meta pr-2">

                 <span class="avatar avatar-1 m-0 avatar-md"><i class="fa-regular fa-message"></i>

                 </span>

             </div>
         </div>
     </li>
 @empty
 @endforelse
