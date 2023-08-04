@if ($data)
    @php
        $img = $data->profile ?? null;
    @endphp
    <div style="background-color: #fff;" class="user-details">
        <div class="users">
            <img class="user-img-outline" src='{{ asset("documents/profile/$img") }}' />
            <div class="user-div" style="text-align: center;">
                <h1>{{ isset($data->first_name) ? $data->first_name . ' ' : '' }}
                    {{ isset($data->mid_name) ? $data->mid_name . ' ' : '' }}
                    {{ isset($data->last_name) ? $data->last_name . ' ' : '' }}</h1>
                <div style="display: flex;gap:5px; align-items: center; justify-content: center;">
                    <img src="{{ asset('assets/img/map_pin.svg') }}" />
                    <h6 style="margin-bottom: 0%;">
                        {{ isset($data->city) ? $data->city . ' ,' : '' }}{{ isset($data->country) ? $data->country . ' ' : '' }}
                    </h6>
                </div>
            </div>
            <div class="block-btn" data-id={{ $data->id }}>
                <h6 style="margin-bottom: 0%; font-size: 0.8rem;"><i class="fa-solid fa-ban"></i> Block
                    Profile</h6>
            </div>
        </div>
        <div style="margin-top: 20px;" class="user-about">
            <h4 class="head4">About</h4>
            <p>
                {{ isset($data->about) ? $data->about : '' }}
            </p>
        </div>
        <div style="margin-top: 50px;">
            <h4 class="head4">Interest</h4>
            <div class="d-flex flex-wrap " style="gap: 10px 5px; margin-top: 10px">
                @if (isset($data->user_intrest[0]))
                    @foreach ($data->user_intrest as $item)
                        @if (isset($item->intrest->name))
                            <div class="interests ">
                                <h6>{{ $item->intrest->name }}</h6>
                            </div>

                        @endif
                    @endforeach
                @endif

            </div>
        </div>
    </div>
@endif
