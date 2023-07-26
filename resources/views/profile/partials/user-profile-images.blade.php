<section>
    @if(!empty($user->userProfile->profile_image))
        <header>
            <h2 class="text-lg font-medium">
                {{ __('Profile Image') }}
            </h2>
            <div class="mt-2">
                <a href="{{ asset($user->userProfile->profile_image) }}" target="_blank">
                    <img src="{{ asset($user->userProfile->profile_image) }}" alt="">
                </a>
            </div>
        </header>
    @endif

    @if(!empty($user->userProfile->domicile_image))
        <header>
            <h2 class="text-lg font-medium">
                {{ __('Domicile Image') }}
            </h2>
            <div class="mt-2">
                <a href="{{ asset($user->userProfile->domicile_image) }}" target="_blank">
                    <img src="{{ asset($user->userProfile->domicile_image) }}" alt="">
                </a>
            </div>
        </header>
    @endif

    @if(!empty($user->userProfile->cnic_front_image))
        <header>
            <h2 class="text-lg font-medium">
                {{ __('CNIC Front Image') }}
            </h2>
            <div class="mt-2">
                <a href="{{ asset($user->userProfile->cnic_front_image) }}" target="_blank">
                    <img src="{{ asset($user->userProfile->cnic_front_image) }}" alt="">
                </a>
            </div>
        </header>
    @endif

    @if(!empty($user->userProfile->cnic_back_image))
        <header>
            <h2 class="text-lg font-medium">
                {{ __('CNIC Back Image:') }}
            </h2>
            <div class="mt-2">
                <a href="{{ asset($user->userProfile->cnic_back_image) }}" target="_blank">
                    <img src="{{ asset($user->userProfile->cnic_back_image) }}" alt="">
                </a>
            </div>
        </header>
    @endif

    @if(!empty($user->userProfile->pnc_certificate_image))
        <header>
            <h2 class="text-lg font-medium">
                {{ __('PNC Certificate Image:') }}
            </h2>
            <div class="mt-2">
                <a href="{{ asset($user->userProfile->pnc_certificate_image) }}" target="_blank">
                    <img src="{{ asset($user->userProfile->pnc_certificate_image) }}" alt="">
                </a>
            </div>
        </header>
    @endif
</section>
