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
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($userEducations))
                    @foreach($userEducations as $userEducation)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$userEducation->education_level ?? '-----'}}</td>
                            <td>{{$userEducation->institute ?? '-----'}}</td>
                            <td>{{$userEducation->obtain_marks ?? '-----'}}</td>
                            <td>{{$userEducation->total_marks ?? '-----'}}</td>
                            <td>{{$userEducation->total_marks ?? '-----'}}</td>
                            <td>{{$userEducation->total_marks ?? '-----'}}</td>
                            <td>{{$userEducation->passing_date ?? '-----'}}</td>
                            <td>{{$userEducation->degree_image ?? '-----'}}</td>
                            <td>Action</td>
                        </tr>
                    @endforeach
                @endif
                <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</section>
