<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900" style="color: black !important;">
            {{ __('User Educations') }}
        </h2>
    </header>

    <form method="post" action="{{ route('user-educations.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="education_level">{{ __('Education Level') }}</label>
                    <select class="custom-select mr-sm-2" name="education_level" required>
                        <option value="{{__('matric')}}" >{{ __('Matric') }}</option>
                        <option value="{{__('ics')}}" >{{ __('ICS') }}</option>
                        <option value="{{__('fsc')}}" >{{ __('FSC') }}</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <x-input-label for="institute" :value="__('Institute')" />
                <x-text-input id="institute" name="institute" type="text" class="mt-1 block w-full" :value="old('institute', $user->institute)" required autofocus autocomplete="institute" />
                <x-input-error class="mt-2" :messages="$errors->get('institute')" />
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <x-input-label for="obtain_marks" :value="__('Obtain Marks')" />
                <x-text-input id="obtain_marks" name="obtain_marks" type="number" class="mt-1 block w-full" :value="old('obtain_marks', $user->obtain_marks)" required autocomplete="obtain_marks" />
                <x-input-error class="mt-2" :messages="$errors->get('obtain_marks')" />
            </div>
            <div class="col-6">
                <x-input-label for="total_marks" :value="__('Total Marks')" />
                <x-text-input id="total_marks" name="total_marks" type="number" class="mt-1 block w-full" :value="old('total_marks', $user->total_marks)" required autocomplete="total_marks" />
                <x-input-error class="mt-2" :messages="$errors->get('total_marks')" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <x-input-label for="passing_date" :value="__('Passing Date')" />
                <x-text-input id="passing_date" name="passing_date" type="date" class="mt-1 block w-full" :value="old('passing_date', (!empty($user->passing_date) ? $user->userProfile->passing_date : null))" required autocomplete="date_of_birth" />
                <x-input-error class="mt-2" :messages="$errors->get('passing_date')" />
            </div>
            <div class="col-md-6">
                <x-input-label for="degree_image" :value="__('Degree Image')" />
                <input type="file" id="fileInput1" accept="image/*" name="degree_image" class="form-control-file">
                <x-input-error class="mt-2" :messages="$errors->get('degree_image')" />
            </div>
        </div>

        <div class="flex items-end gap-4">
            <a href="{{route('dashboard')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Previous') }}
            </a>
            <x-primary-button>{{ __('Save & Continue') }}</x-primary-button>
        </div>
    </form>
</section>
