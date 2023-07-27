<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900" style="color: black !important;">
            {{ __('Academics') }}
        </h2>
    </header>

    <div class="row">
        <div class="col-12">
            <table id="userEducationTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Sr.#</th>
                    <th>Degree Level</th>
                    <th>Board/University/Institute</th>
                    <th>Obtained Marks</th>
                    <th>Total Marks</th>
                    <th>Percent age</th>
                    <th>Completion Date</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($userEducations))
                    @foreach($userEducations as $userEducation)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ucfirst($userEducation->education_level) ?? '-----'}}</td>
                            <td>{{$userEducation->institute ?? '-----'}}</td>
                            <td>{{$userEducation->obtain_marks ?? '-----'}}</td>
                            <td>{{$userEducation->total_marks ?? '-----'}}</td>
                            <td>
                                @php
                                    $percentage = ($userEducation->obtain_marks / $userEducation->total_marks) * 100
                                @endphp
                                {{ round($percentage) . "%" ?? '-----'}}
                            </td>
                            <td>{{getDateFormat($userEducation->passing_date) ?? '-----'}}</td>
                            <td><a href="{{$userEducation->degree_image ?? '#'}}" target="_blank"><img src="{{$userEducation->degree_image ?? '-----'}}" alt=""></a></td>
                            <td>{{getDateFormat($userEducation->created_at) ?? '-----'}}</td>
                            <td>
                                <div class="action-button">
                                    <a href="javascript:void(0)" onclick="editEducation({{$userEducation->id}})" class="action-button-edit">
                                        <img class="editDell" src="{{asset('images/edit_blue.svg')}}">
                                    </a>
                                    <a class="dropdown-item has-icon delete-confirm" href="javascript:void(0)" data-id={{ $userEducation->id }}>
                                        <img class="editDell" src="{{asset('images/delete_forever.svg')}}">
                                    </a>
                                    <!-- Delete Form -->
                                    <form class="d-none" id="delete_form_{{ $userEducation->id }}" action="{{ route('user-educations.destroy', $userEducation->id) }}" method="POST">
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
        <a href="{{route('dashboard')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            {{ __('Previous') }}
        </a>

        <a href="{{route('user-experiences.index')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            {{ __('Save & Continue') }}
        </a>
    </div>
</section>
