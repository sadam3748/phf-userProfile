<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900" style="color: black !important;">
            {{ __('Experience List') }}
        </h2>
    </header>

    <div class="row">
        <div class="col-12">
            <table id="userExperienceTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Sr.#</th>
                    <th>Organization Type</th>
                    <th>Position Title</th>
                    <th>Organization Name</th>
                    <th>From Date</th>
                    <th>To Date</th>
{{--                    <th>Currently Working</th>--}}
                    <th>Certificate Image</th>
                    <th>NOC Image</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($userExperiences))
                    @foreach($userExperiences as $userExperience)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ucfirst($userExperience->organization_type) ?? '-----'}}</td>
                            <td>{{$userExperience->position_title ?? '-----'}}</td>
                            <td>{{$userExperience->organization_name ?? '-----'}}</td>
                            <td>{{getDateFormat($userExperience->from_date) ?? '-----'}}</td>
                            <td>{{getDateFormat($userExperience->to_date) ?? '-----'}}</td>
{{--                            <td>--}}
{{--                                @if($userExperience->is_working == 'on')--}}
{{--                                    {{__('Yes')}}--}}
{{--                                @else--}}
{{--                                    {{__('No')}}--}}
{{--                                @endif--}}
{{--                            </td>--}}
                            <td>
                                <a href="{{$userExperience->certificate_image ?? '#'}}" target="_blank">
                                    <img src="{{$userExperience->certificate_image ?? '-----'}}" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="{{$userExperience->noc_image ?? '#'}}" target="_blank">
                                    <img src="{{$userExperience->noc_image ?? '-----'}}" alt="">
                                </a>
                            </td>
                            <td>{{getDateFormat($userExperience->created_at) ?? '-----'}}</td>
                            <td>
                                <div class="action-button">
                                    <a href="javascript:void(0)" onclick="editExperience({{$userExperience->id}})" class="action-button-edit">
                                        <img class="editDell" src="{{asset('images/edit_blue.svg')}}">
                                    </a>
                                    <a class="dropdown-item has-icon delete-confirm" href="javascript:void(0)" data-id={{ $userExperience->id }}>
                                        <img class="editDell" src="{{asset('images/delete_forever.svg')}}">
                                    </a>
                                    <!-- Delete Form -->
                                    <form class="d-none" id="delete_form_{{ $userExperience->id }}" action="{{ route('user-experiences.destroy', $userExperience->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
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
        <a href="{{route('user-educations.index')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            {{ __('Previous') }}
        </a>

        <a href="{{route('preference.get')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            {{ __('Save & Continue') }}
        </a>
    </div>
</section>
