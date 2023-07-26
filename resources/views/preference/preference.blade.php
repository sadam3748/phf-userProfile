



<section>
<!-- <form method="post" action="{{ route('preference-store') }}" class="mt-6 space-y-6" enctype="multipart/form-data"> -->
<form action="{{ route('preference-store') }}" method="POST" class="mt-6 space-y-6">
    @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nursing-colleges">College Of Nursing</label>
                    <select class="custom-select mr-sm-2" name="nursing_colleges" required>
                        <option value="{{__('matric')}}" >{{ __('CON GANGARAM HOSPITAL, LAHORE') }}</option>
                        <option value="{{__('ics')}}" >{{ __('CON MAYO HOSPITAL, LAHORE') }}</option>
                        <option value="{{__('fsc')}}" >{{ __('CON AMC, LGH, LAHORE') }}</option>
                        <option value="{{__('fsc')}}" >{{ __('CON KHUSHAB') }}</option>
                        <option value="{{__('fsc')}}" >{{ __('CON VEHARI') }}</option>
                        <option value="{{__('fsc')}}" >{{ __('CON CHAKWAL') }}</option>
                        <option value="{{__('fsc')}}" >{{ __('CON KASSUR') }}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="flex items-end gap-4">
            <a href="{{route('dashboard')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Previous') }}
            </a>
            <x-primary-button>{{ __('Save Preference') }}</x-primary-button>
        </div>
    </form>


    <header>
        <h2 class="text-lg font-medium text-gray-900" style="color: black !important;">
       Preference List
        </h2>
    </header>

    <div class="row">
        <div class="col-12">
            <table id="userEducationTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Sr.#</th>
                    <th>College of Nursing</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($userPrefences))
                    @foreach($userPrefences as $userPrefence)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$userPrefence->nursing_colleges ?? '-----'}}</td>
                        </tr>
                    @endforeach
                @endif
                <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</section>
