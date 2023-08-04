{{-- @dd($data->is_block) --}}
@if (isset($data))
    <style>

    </style>
    <div class="card text-center custom-card">
        <div class="card-content">
            <div class="card-body">
                <div class="d-flex justify-content-between align-datas-center">
                    <div class="d-flex align-datas-center gap-10">
                        @php
                            $img = $data->profile ?? null;
                        @endphp
                        <div class="w-25">
                            <img src='{{ asset("documents/profile/$img") }}' class="rounded-circle w-100" alt="Card image">
                        </div>

                        <div>
                            <h2>
                                {{ isset($data->first_name) ? $data->first_name . ' ' : '' }}
                                {{ isset($data->mid_name) ? $data->mid_name . ' ' : '' }}
                                {{ isset($data->last_name) ? $data->last_name . ' ' : '' }}</h2>
                            <h6><img
                                    src="{{ asset('icon/map_pin.svg') }}">{{ isset($data->city) ? $data->city . ' ,' : '' }}{{ isset($data->country) ? $data->country . ' ' : '' }}
                            </h6>
                        </div>
                    </div>
                    <div>
                        @if ($data->is_block == 0)
                            <button class="btn-rounded block-btn" data-id={{ $data->id }}>Block Profile</button>
                        @endif
                        @if ($data->is_block == 1)
                            <button class="btn-rounded unblock-btn" data-id={{ $data->id }}>UnBlock Profile</button>
                        @endif
                    </div>
                </div>

                <div class="d-flex gap-10">
                    <div class="w-50">
                        <h5 class="">About</h5>
                        <h6>{{ isset($data->about) ? $data->about : '' }}
                        </h6>
                    </div>
                    <div class="line"></div>
                    <div class="w-50">
                        <h5>Interest </h5>
                        <div class="row mt-4">
                            @if (isset($data->user_intrest[0]))
                                @foreach ($data->user_intrest as $item)
                                    @if (isset($item->intrest->name))
                                        <div class="col-4">
                                            <div class="interests">
                                                <h6>{{ $item->intrest->name }}</h6>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
