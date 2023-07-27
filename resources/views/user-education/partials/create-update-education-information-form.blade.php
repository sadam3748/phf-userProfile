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
            {{ __('User Educations') }}
        </h2>
    </header>

    <form method="post" action="{{ route('user-educations.store') }}" id="updateRouteAdd" class="mt-6 space-y-6 basicform_with_reload" enctype="multipart/form-data">
        @csrf
        <div id="blockPut"></div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="education_level">{{ __('Education Level') }}</label>
                    <select id="educationLevel" class="custom-select mr-sm-2" name="education_level" required>
                        <option value="" disabled selected>{{ __('Please Select Education Level') }}</option>
                        <option value="{{__('matric')}}" >{{ __('Matric') }}</option>
                        <option value="{{__('ics')}}" >{{ __('ICS') }}</option>
                        <option value="{{__('fsc')}}" >{{ __('FSC') }}</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <x-input-label for="institute" :value="__('Institute')" />
                <x-text-input id="institute" name="institute" type="text" class="mt-1 block w-full" :value="old('institute')" required autofocus autocomplete="institute" />
                <x-input-error class="mt-2" :messages="$errors->get('institute')" />
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <x-input-label for="obtain_marks" :value="__('Obtain Marks')" />
                <x-text-input id="obtain_marks" name="obtain_marks" type="number" class="mt-1 block w-full" :value="old('obtain_marks')" required autocomplete="obtain_marks" />
                <x-input-error class="mt-2" :messages="$errors->get('obtain_marks')" />
            </div>
            <div class="col-6">
                <x-input-label for="total_marks" :value="__('Total Marks')" />
                <x-text-input id="total_marks" name="total_marks" type="number" class="mt-1 block w-full" :value="old('total_marks')" required autocomplete="total_marks" />
                <x-input-error class="mt-2" :messages="$errors->get('total_marks')" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <x-input-label for="passing_date" :value="__('Passing Date')" />
                <x-text-input id="passing_date" name="passing_date" type="date" class="mt-1 block w-full" :value="old('passing_date')" required autocomplete="date_of_birth" />
                <x-input-error class="mt-2" :messages="$errors->get('passing_date')" />
            </div>
            <div class="col-md-6">
                <x-input-label for="degree_image" :value="__('Degree Image')" />
                <input type="file" id="fileInput1" accept="image/*" name="degree_image" class="form-control-file">
                <x-input-error class="mt-2" :messages="$errors->get('degree_image')" />
            </div>
        </div>

        <div class="flex items-end gap-4">
            <x-primary-button id="updateText">{{ __('Save Education') }}</x-primary-button>
        </div>
    </form>
</section>
