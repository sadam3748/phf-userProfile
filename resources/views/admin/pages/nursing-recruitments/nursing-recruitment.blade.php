@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Nursing Recruitments')

@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/data-tables.css')}}">
@endsection

@section('content')

<!-- BEGIN: Page Main-->
<div id="main">
	<div class="row">
		<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
		<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
			<!-- Search for small screen-->
			<div class="container">
				<div class="row">
					<div class="col s10 m6 l6">
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Nursing Recruitments</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Nursing Recruitments </li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="col s12">
			<div class="container">
				<div class="section section-data-tables">
					<!-- Page Length Options -->
					<div class="row">
						<div class="col s12">
							<div class="card">
								<div class="card-content">
									<h4 class="card-title">Page Length Options</h4>
									<div class="row">
										<div class="col s12 responsive-table">
											<table id="page-length-option" class="table">
                                                <thead>
                                                      <tr>
                                                            <th></th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>PNC Number</th>
                                                            <th>CNIC</th>
                                                            <th>Profile Image</th>
                                                            <th>Created At</th>
                                                            <th>View</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                    @if (!empty($nursingRecruitments))
                                                        @foreach ($nursingRecruitments as $nursingRecruitment)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $nursingRecruitment->name ?? '-----' }}</td>
                                                                <td>{{ $nursingRecruitment->email ?? '-----' }}</td>
                                                                <td>{{ $nursingRecruitment->phone_no ?? '-----' }}</td>
                                                                <td>{{ $nursingRecruitment->pnc_no ?? '-----' }}</td>
                                                                <td>{{ !empty($nursingRecruitment->userProfile) ? $nursingRecruitment->userProfile->cnic : '-----' }}</td>
                                                                <td>
                                                                    <a href="{{asset(!empty($nursingRecruitment->userProfile) ? $nursingRecruitment->userProfile->profile_image : '')}}" target="_blank">
                                                                        <img style="height:40px" src="{{asset(!empty($nursingRecruitment->userProfile) ? $nursingRecruitment->userProfile->profile_image : '')}}">
                                                                    </a>
                                                                </td>
                                                                <td>{{ getDateFormat($nursingRecruitment->release_date) }}</td>
                                                                <td><a href="{{ route('admin.show.nursing.recruitments', encrypt($nursingRecruitment->id)) }}"><i class="material-icons">remove_red_eye</i></a></td>
                                                          </tr>
                                                        @endforeach
                                                    @endif
												</tbody>
                                            </table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
			</div>
			<div class="content-overlay"></div>
		</div>
	</div>
</div>
<!-- END: Page Main-->
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
    <script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/data-tables/js/dataTables.select.min.js')}}"></script>

@endsection

{{-- page scripts --}}
@section('page-script')
    <script src="{{asset('app-assets/js/scripts/data-tables.js')}}"></script>
@endsection
