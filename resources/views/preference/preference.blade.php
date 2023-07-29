<section>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
<form action="{{ route('preference.store') }}" method="post" class="basicform_with_reload mt-6 space-y-6">
    @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nursing-colleges">College Of Nursing</label>
                    <select class="custom-select mr-sm-2" name="nursing_colleges" required>
                        <option value="" disabled selected>{{ __('Please Select Nursing College') }}</option>
                        @foreach($nursingColleges as $nursingCollege)
                            <option value="{{$nursingCollege->id}}" >{{ $nursingCollege->name ?? '-----' }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    <div class="flex items-end gap-4">
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
            <table id="myTablePreference" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Sr.#</th>
                    <th>College of Nursing</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="tablecontents">
                @if(!empty($userPrefences))
                    @foreach($userPrefences as $userPrefence)
                    <tr class="row1" data-order="{{ $userPrefence->id  }}">
                            <td class="index">{{$loop->iteration}}</td>
                            <td>{{!empty($userPrefence->nursingCollege) ? $userPrefence->nursingCollege->name : '-----'}}</td>
                            <td>
                                <a class="dropdown-item has-icon delete-confirm" href="javascript:void(0)" data-id={{ $userPrefence->id }}>
                                    <img class="editDell" src="{{asset('images/delete_forever.svg')}}">
                                </a>
                                <!-- Delete Form -->
                                <form class="d-none" id="delete_form_{{ $userPrefence->id }}" action="{{ route('preference.destroy', $userPrefence->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>

{{--                    <form  action="{{ route('preference.destroy', $userPrefence->id) }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}

{{--                        <button type="submit" class="" onclick="return confirm('Are you sure you want to delete this preference?')">--}}
{{--                            <img class="editDell" src="{{asset('images/delete_forever.svg')}}">--}}
{{--                        </button>--}}

{{--                    </form>--}}
                </td>

                        </tr>
                    @endforeach
                @endif
                <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex items-end gap-4">
        <a href="{{route('user-experiences.index')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            {{ __('Previous') }}
        </a>
        <a href="{{route('dashboard')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            {{ __('Submit') }}
        </a>
    </div>
</section>


