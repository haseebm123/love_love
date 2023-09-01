@if (isset($data))
    @php
        $img = $data->profile ?? null;
    @endphp
    <div class="users">
        <div class="user-info">
            <img class="user-img-outline" src='{{ asset("documents/profile/$img") }}' />
            <div style="text-align: center;">
                <h1>{{ isset($data->first_name) ? $data->first_name . ' ' : '' }}
                    <!--{{ isset($data->mid_name) ? $data->mid_name . ' ' : '' }}-->
                    {{ isset($data->last_name) ? $data->last_name . ' ' : '' }}</h1>
                <div style="display: flex;gap:5px; align-items: center; justify-content: center;">
                    <img src="{{ asset('assets/img/map_pin.svg') }}" />
                    <h6 style="margin-bottom: 0%;">
                        {{ isset($data->city) ? $data->city . ' ,' : '' }}{{ isset($data->country) ? $data->country . ' ' : '' }}
                    </h6>
                </div>
            </div>
            @if ($data->is_block == 0)
                <div class="block-btn" data-id={{ $data->id }}
                    style="">
                    <img src="{{ asset('assets/img/block.svg') }}" />
                    <h6 style="margin-bottom: 0%; font-size: 0.8rem;">Block me</h6>
                </div>
            @else
                <div class="blk-btn blk-btn-0 unblock-btn" data-id={{ $data->id }}>
                    <h6><i class="fa-solid fa-ban"></i> Unblock Profile</h6>
                </div>
            @endif

        </div>
        <div class="user-info-2">
            <div class="user-about-1">
                <h4>About</h4>
                <p>{{ isset($data->about) ? $data->about : '' }}
                </p>
            </div>
            <div class="user-about-2">
               
                <h4 style="float:left">Interest</h4>
                 <div class="contain-fluid mt-3">
                <div class="row ">
                    <!--<div class="mt-1">-->
                        @if (isset($data->user_intrest[0]))
                            @foreach ($data->user_intrest as $item)
                                @if (isset($item->intrest->name))
                                    <div class="col-4 col-md-4">
                                        <h6>{{ $item->intrest->name }}</h6>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    <!--</div>-->
                </div>
                </div>
            </div>
        </div>
    </div>
@endif
