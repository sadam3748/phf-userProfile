<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900" style="color: black !important;">
            {{ __('Personal Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

{{--    <form id="send-verification" method="post" action="{{ route('verification.send') }}">--}}
{{--        @csrf--}}
{{--    </form>--}}

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-6">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div class="col-6">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <x-input-label for="name" :value="__('Contact No')" />
                <x-text-input id="phone_no" name="phone_no" type="number" class="mt-1 block w-full" :value="old('phone_no', $user->phone_no)" required autofocus autocomplete="phone_no" />
                <x-input-error class="mt-2" :messages="$errors->get('phone_no')" />
            </div>
            <div class="col-6">
                <x-input-label for="email" :value="__('PNC No')" />
                <x-text-input id="pnc_no" name="pnc_no" type="text" class="mt-1 block w-full" :value="old('pnc_no', $user->pnc_no)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('pnc_no')" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <x-input-label for="email" :value="__('Father Name')" />
                <x-text-input id="father_name" name="father_name" type="text" class="mt-1 block w-full" :value="old('father_name', (!empty($user->userProfile) ? $user->userProfile->father_name : null))" required autocomplete="father_name" />
                <x-input-error class="mt-2" :messages="$errors->get('father_name')" />
            </div>
            <div class="col-md-6">
                <x-input-label for="date_of_birth" :value="__('DOB')" />
                <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full" max="{{\Carbon\Carbon::parse($ageallowed)->format('Y-m-d')}}" min="1950-01-01" :value="old('date_of_birth', (!empty($user->userProfile) ? $user->userProfile->date_of_birth : null))" required autocomplete="date_of_birth" />
                <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">{{ __('Domicile') }}</label>
                    <select class="custom-select mr-sm-2" name="domicile" required>
                        <option value="" disabled selected>{{ __('Please Select Domicile') }}</option>
                        @if(!empty($cities))
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}" @if($user->userProfile)) {{($user->userProfile->domicile == $city->id) ? 'selected' : null}} @endif >{{ $city->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">{{ __('Gender') }}</label>
                    <select class="custom-select mr-sm-2" name="gender" required>
                        <option value="{{__('female')}}" @if($user->userProfile)) {{($user->userProfile->gender == 'female') ? 'selected' : null}} @endif >{{ __('Female') }}</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <x-input-label for="cnic" :value="__('CNIC')" />
                <x-text-input id="cnic" name="cnic" type="text" class="mt-1 block w-full" :value="old('cnic', (!empty($user->userProfile) ? $user->userProfile->cnic : null))" required autocomplete="cnic" />
                <x-input-error class="mt-2" :messages="$errors->get('cnic')" />
            </div>
            <div class="col-md-6">
                <x-input-label for="cnic_expiry" :value="__('CNIC Expiry')" />
                <x-text-input id="cnic_expiry" name="cnic_expiry" type="date" class="mt-1 block w-full" min="1950-01-01" :value="old('cnic_expiry', (!empty($user->userProfile) ? $user->userProfile->cnic_expiry : null))" required autocomplete="cnic_expiry" />
                <x-input-error class="mt-2" :messages="$errors->get('cnic_expiry')" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="marital_status">{{ __('Martial Status') }}</label>
                    <select class="custom-select mr-sm-2" name="marital_status" required>
                        <option value="" disabled selected>{{ __('Please Select Martial Status') }}</option>
                        <option value="{{__('single')}}" @if($user->userProfile)) {{($user->userProfile->marital_status == 'single') ? 'selected' : null}} @endif>{{ __('Single') }}</option>
                        <option value="{{__('married')}}" @if($user->userProfile)) {{($user->userProfile->marital_status == 'married') ? 'selected' : null}} @endif>{{ __('Married') }}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="city_of_residence">{{ __('City of Residence') }}</label>
                    <select class="custom-select mr-sm-2" name="city_of_residence" required>
                        <option value="" disabled selected>{{ __('Please Select City') }}</option>
                        @if(!empty($cities))
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}" @if($user->userProfile)) {{($user->userProfile->city_of_residence == $city->id) ? 'selected' : null}} @endif>{{ $city->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', (!empty($user->userProfile) ? $user->userProfile->address : null))" required autocomplete="address" />
                <x-input-error class="mt-2" :messages="$errors->get('address')" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label for="fileInput1">{{ __('Upload Documents:') }}</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <x-input-label for="profile_image" :value="__('Profile Image')" />
                <input type="file" id="fileInput1" accept="image/*" name="profile_image" class="form-control-file">
                <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />
            </div>
            <div class="col-md-4">
                <label for="fileInput2">Domicile Image:</label>
                <input type="file" id="fileInput2" accept="image/*" name="domicile_image" class="form-control-file">
                <x-input-error class="mt-2" :messages="$errors->get('domicile_image')" />
            </div>
            <div class="col-md-4">
                <label for="fileInput3">CNIC Front Image:</label>
                <input type="file" id="fileInput3" accept="image/*" name="cnic_front_image" class="form-control-file">
                <x-input-error class="mt-2" :messages="$errors->get('cnic_front_image')" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="fileInput4">CNIC Back Image:</label>
                <input type="file" id="fileInput4" accept="image/*" name="cnic_back_image" class="form-control-file">
                <x-input-error class="mt-2" :messages="$errors->get('cnic_back_image')" />
            </div>
            <div class="col-md-6">
                <label for="fileInput5">PNC Certificate Image:</label>
                <input type="file" id="fileInput5" accept="image/*" name="pnc_certificate_image" class="form-control-file">
                <x-input-error class="mt-2" :messages="$errors->get('pnc_certificate_image')" />
            </div>
        </div>

        <div>

{{--            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())--}}
{{--                <div>--}}
{{--                    <p class="text-sm mt-2 text-gray-800">--}}
{{--                        {{ __('Your email address is unverified.') }}--}}

{{--                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">--}}
{{--                            {{ __('Click here to re-send the verification email.') }}--}}
{{--                        </button>--}}
{{--                    </p>--}}

{{--                    @if (session('status') === 'verification-link-sent')--}}
{{--                        <p class="mt-2 font-medium text-sm text-green-600">--}}
{{--                            {{ __('A new verification link has been sent to your email address.') }}--}}
{{--                        </p>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>

        <div class="flex items-end gap-4">
            <x-primary-button>{{ __('Save & Continue') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
