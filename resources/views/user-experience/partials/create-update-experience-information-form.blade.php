<section>
    <header>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h2 class="text-lg font-medium text-gray-900" style="color: black !important;">
            {{ __('User Experiences') }}
        </h2>
    </header>

    <form method="post" action="{{ route('user-experiences.store') }}" id="updateExpRouteAdd" class="mt-6 space-y-6 basicform_with_reload" enctype="multipart/form-data">
        @csrf
        <div id="expBlockPut"></div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="organization_type">{{ __('Organization Type') }}</label>
                    <select id="organizationType" class="custom-select mr-sm-2" name="organization_type" required>
                        <option value="" disabled selected>{{ __('Please Select Organization Type') }}</option>
                        <option value="{{__('public')}}" >{{ __('Public') }}</option>
                        <option value="{{__('private')}}" >{{ __('Private') }}</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <x-input-label for="position_title" :value="__('Position Title')" />
                <x-text-input id="position_title" name="position_title" type="text" class="mt-1 block w-full" placeholder="principle" :value="old('position_title')" required autofocus autocomplete="position_title" />
                <x-input-error class="mt-2" :messages="$errors->get('position_title')" />
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <x-input-label for="organization_name" :value="__('Organization Name')" />
                <x-text-input id="organization_name" name="organization_name" type="text" placeholder="CON Mayo Hospital, Lahore" class="mt-1 block w-full" :value="old('organization_name')" required autocomplete="organization_name" />
                <x-input-error class="mt-2" :messages="$errors->get('organization_name')" />
            </div>
            <div class="col-md-6">
                <x-input-label for="from_date" :value="__('From Date')" />
                <x-text-input id="from_date" name="from_date" type="date" class="mt-1 block w-full" :value="old('from_date')" required autocomplete="from_date" />
                <x-input-error class="mt-2" :messages="$errors->get('from_date')" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <x-input-label for="to_date" :value="__('To Date')" />
                <x-text-input id="to_date" name="to_date" type="date" class="mt-1 block w-full" :value="old('to_date')" required autocomplete="to_date" />
                <x-input-error class="mt-2" :messages="$errors->get('to_date')" />
            </div>
            <div class="col-md-6">
                <div class="custom-control custom-checkbox">
                    <x-input-label for="is_working" :value="__('Currently Working')" />
                    <input type="checkbox" id="is_working" name="is_working" class="" value="1">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <x-input-label for="certificate_image" :value="__('Certificate Image')" />
                <input type="file" id="fileInput1" accept="image/*" name="certificate_image" class="form-control-file">
                <x-input-error class="mt-2" :messages="$errors->get('certificate_image')" />
            </div>
            <div class="col-md-6">
                <x-input-label for="noc_image" :value="__('NOC Image')" />
                <input type="file" id="fileInput1" accept="image/*" name="noc_image" class="form-control-file">
                <x-input-error class="mt-2" :messages="$errors->get('noc_image')" />
            </div>
        </div>

        <div class="flex items-end gap-4">
            <x-primary-button id="updateExText">{{ __('Save Experience') }}</x-primary-button>
        </div>
    </form>
</section>
