@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Nursing Recruitment View')

@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-users.css')}}">
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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Nursing Recruitment View</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Nursing Recruitment View </li>
						</ol>
					</div>
				</div>

			</div>
		</div>
		<div class="col s12">
			<div class="container">
				<!-- users view start -->
                <div class="section users-view">
                    <!-- users view media object start -->
                    <div class="card-panel">
                        <div class="row">
                            <div class="col s12 m7">
                            <div class="display-flex media">


                                    @if(!empty($nursingRecruitment->userProfile->profile_image))
                                        <a href="{{asset(!empty($nursingRecruitment->userProfile) ? $nursingRecruitment->userProfile->profile_image : '')}}" target="_blank" class="avatar">
                                            <img src="{{asset(!empty($nursingRecruitment->userProfile) ? $nursingRecruitment->userProfile->profile_image : '')}}" alt="users view avatar" class="z-depth-4 circle"
                                            height="64" width="64">
                                        </a>
                                    @else
                                        <a href="../../../app-assets/images/avatar/avatar-15.png" target="_blank" class="avatar">
                                            <img src="../../../app-assets/images/avatar/avatar-15.png" alt="users view avatar" class="z-depth-4 circle"
                                                height="64" width="64">
                                        </a>
                                    @endif

                                <div class="media-body">
                                <h6 class="media-heading">
                                    <span class="users-view-name">{{ $nursingRecruitment->name ?? '-----' }}</span>
                                </h6>
                                <span>ID:</span>
                                <span class="users-view-id">{{ $nursingRecruitment->id ?? '--' }}</span>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- users view card data start -->
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12 m6">
                                    <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Personal Information</h6>
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td class="black-text">Name:</td>
                                                <td>{{ $nursingRecruitment->name ?? '-----' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="black-text">Email:</td>
                                                <td>{{ $nursingRecruitment->email ?? '-----' }}</td>
                                            </tr>

                                            <tr>
                                                <td class="black-text">Phone Number:</td>
                                                <td>{{ $nursingRecruitment->phone_no ?? '-----' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="black-text">PNC Number:</td>
                                                <td>{{ $nursingRecruitment->pnc_no ?? '-----' }}</td>
                                            </tr>

                                            <tr>
                                                <td class="black-text">Address:</td>
                                                <td>{{ !empty($nursingRecruitment->userProfile->address) ? $nursingRecruitment->userProfile->address : '-----' }}</td>
                                            </tr>

                                            <tr>
                                                <td class="black-text">Created Date:</td>
                                                <td>{{ getDateFormat($nursingRecruitment->created_at) ?? '--' }}</td>
                                            </tr>
                                            <tr>

                                            <tr>
                                                <td class="black-text">Father Name:</td>
                                                <td>{{ !empty($nursingRecruitment->userProfile->father_name) ? $nursingRecruitment->userProfile->father_name : '-----' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col s12 m6">
                                    <h6 class="mb-2 mt-2"><i class="material-icons"></i> </h6>
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td class="black-text">Gender:</td>
                                                <td>{{ !empty($nursingRecruitment->userProfile->gender) ? ucfirst($nursingRecruitment->userProfile->gender) : '-----' }}</td>
                                            </tr>

                                            <tr>
                                                <td class="black-text">DOB:</td>
                                                <td>{{ !empty($nursingRecruitment->userProfile->date_of_birth) ? getDateFormat($nursingRecruitment->userProfile->date_of_birth) : '-----' }}</td>
                                            </tr>

                                            <tr>
                                                <td class="black-text">CNIC:</td>
                                                <td>{{ !empty($nursingRecruitment->userProfile->cnic) ? $nursingRecruitment->userProfile->cnic : '-----' }}</td>
                                            </tr>

                                            <tr>
                                                <td class="black-text">CNIC Expiry:</td>
                                                <td>{{ !empty($nursingRecruitment->userProfile->cnic_expiry) ? $nursingRecruitment->userProfile->cnic_expiry : '-----' }}</td>
                                            </tr>

                                            <tr>
                                                <td class="black-text">Marital Status:</td>
                                                <td>{{ !empty($nursingRecruitment->userProfile->marital_status) ? ucfirst($nursingRecruitment->userProfile->marital_status) : '-----' }}</td>
                                            </tr>

                                            <tr>
                                                <td class="black-text">Domicile:</td>
                                                <td>{{ !empty($nursingRecruitment->userProfile->domicileCity) ? $nursingRecruitment->userProfile->domicileCity->name : '-----' }}</td>
                                            </tr>

                                            <tr>
                                                <td class="black-text">City:</td>
                                                <td>{{ !empty($nursingRecruitment->userProfile->city) ? $nursingRecruitment->userProfile->city->name : '-----' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12 m12">
                                    <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Personal Information Images</h6>
                                    <div class="row">
                                        <div class="col-lg-4" style="display:inline-block">
                                            <h6 class="mb-2 mt-2">Domicile Image</h6>
                                            @if(!empty($nursingRecruitment->userProfile->domicile_image))
                                                <a href="{{ $nursingRecruitment->userProfile->domicile_image }}" target="_blank">
                                                    <img src="{{ $nursingRecruitment->userProfile->domicile_image }}" alt="" style="width:300px; height:315px">
                                                </a>
                                            @else
                                                <span>No Image Available</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-4" style="display:inline-block">
                                            <h6 class="mb-2 mt-2">CNIC Front Image</h6>
                                            @if(!empty($nursingRecruitment->userProfile->cnic_front_image))
                                                <a href="{{ $nursingRecruitment->userProfile->cnic_front_image }}" target="_blank">
                                                    <img src="{{ $nursingRecruitment->userProfile->cnic_front_image }}" alt="" style="width:300px; height:315px">
                                                </a>
                                            @else
                                                <span>No Image Available</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-4" style="display:inline-block">
                                            <h6 class="mb-2 mt-2">CNIC Back Image</h6>
                                            @if(!empty($nursingRecruitment->userProfile->cnic_back_image))
                                                <a href="{{ $nursingRecruitment->userProfile->cnic_back_image }}" target="_blank">
                                                    <img src="{{ $nursingRecruitment->userProfile->cnic_back_image }}" alt="" style="width:300px; height:315px">
                                                </a>
                                            @else
                                                <span>No Image Available</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-4" style="display:inline-block">
                                            <h6 class="mb-2 mt-2">PNC Image</h6>
                                            @if(!empty($nursingRecruitment->userProfile->pnc_certificate_image))
                                                <a href="{{ $nursingRecruitment->userProfile->pnc_certificate_image }}" target="_blank">
                                                    <img src="{{ $nursingRecruitment->userProfile->pnc_certificate_image }}" alt="" style="width:300px; height:315px">
                                                </a>
                                            @else
                                                <span>No Image Available</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <!-- users view card data ends -->--}}

{{--                    <!-- users view card details start -->--}}
{{--                    <div class="card">--}}
{{--                    <div class="card-content">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col s12">--}}
{{--                                <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Description</h6>--}}
{{--                                <table class="striped">--}}
{{--                                    <tbody>--}}
{{--                                        <tr>--}}
{{--                                            <td>{{$artist_track->description}}</td>--}}
{{--                                        </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                                @if ($artist_track->demo == 'on')--}}
{{--                                    <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Audio Info</h6>--}}
{{--                                    <table class="striped">--}}
{{--                                        <tbody>--}}
{{--                                            <tr>--}}
{{--                                                <td>Demo:</td>--}}
{{--                                                <td>--}}
{{--                                                    {{$artist_track->demo}}--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>Audio Cover:</td>--}}
{{--                                                <td>{{$artist_track->audio_cover}}</td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>Audio Description:</td>--}}
{{--                                                <td>{{$artist_track->audio_description}}</td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>Audio MP3:</td>--}}
{{--                                                <td>--}}
{{--                                                    <audio controls="" src="{{URL('/')}}/uploads/audio/{{$artist_track->audio}}" type="audio/mp3" controlslist="nodownload" id=""></audio>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                @endif--}}
{{--                                <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Artist Track Languages</h6>--}}
{{--                                <table class="striped">--}}
{{--                                    <tbody>--}}
{{--                                    @if(count($artist_track->artistTrackLanguages) > 0)--}}
{{--                                        @php--}}
{{--                                            $artistTrackLanguages = $artist_track->artistTrackLanguages->chunk(2);--}}
{{--                                        @endphp--}}
{{--                                        @foreach($artistTrackLanguages as $tags)--}}
{{--                                            <tr>--}}
{{--                                                @foreach($tags as $tag)--}}
{{--                                                    <td>{{$tag->language->name}}</td>--}}
{{--                                                @endforeach--}}
{{--                                            </tr>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                                <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Artist Track Links</h6>--}}

{{--                                <div class="row">--}}
{{--                                    @if(count($artist_track->artistTrackLinks) > 0)--}}
{{--                                        @foreach($artist_track->artistTrackLinks as $link)--}}
{{--                                            @if(!empty($link->link))--}}
{{--                                                <div class="col-lg-4" style="display:inline-block">--}}
{{--                                                    @php--}}
{{--                                                        echo $link->link;--}}
{{--                                                    @endphp--}}
{{--                                                </div>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}

{{--                                    @endif--}}
{{--                                </div>--}}

{{--                                <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Artist Track Images</h6>--}}

{{--                                <div class="row">--}}
{{--                                    @if(count($artist_track->artistTrackImages) > 0)--}}
{{--                                        @foreach($artist_track->artistTrackImages as $path)--}}
{{--                                            @if(!empty($path->type == 'pdf'))--}}
{{--                                                <div class="col-lg-4" style="display:inline-block">--}}
{{--                                                    <iframe width=560 height=315 src="{{URL('/')}}/uploads/track_images/{{$path->path}}" allow=accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture allowfullscreen></iframe>--}}
{{--                                                </div>--}}
{{--                                            @else--}}
{{--                                                <div class="col-lg-4" style="display:inline-block">--}}
{{--                                                    <img src="{{URL('/')}}/uploads/track_images/{{$path->path}}" alt="{{$path->type}}" style=" width:560px; height:315px">--}}
{{--                                                </div>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </div>--}}

{{--                                <table class="striped">--}}
{{--                                    <tbody>--}}
{{--                                    @if(count($artist_track->artistTrackLinks) > 0)--}}
{{--                                        <tr>--}}
{{--                                            @foreach($artist_track->artistTrackLinks as $link)--}}
{{--                                                @if(!empty($link->link))--}}
{{--                                                    <td>--}}
{{--                                                        @php--}}
{{--                                                            echo $link->link;--}}
{{--                                                        @endphp--}}
{{--                                                    </td>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        </tr>--}}
{{--                                    @endif--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- </div> -->--}}
{{--                    </div>--}}
{{--                    </div>--}}
{{--                    <!-- users view card details ends -->--}}

                </div>
                <!-- users view ends -->
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
    <script src="{{asset('app-assets/js/artist/artist.js')}}"></script>
    <script>
        $(function () {
            $('.reject-track-confirm').on('click', function () {
                $(".modal").modal(),
                $("#modal3").modal("open"),
                $("#modal3").modal("close")
            });
        });
        $(function () {
            $('.approvedArtistTrack-confirm').on('click', function () {
                $(".modal").modal(),
                $("#modal3").modal("open"),
                $("#modal3").modal("close")
            });
        });
    </script>
     {{-- CkEditor --}}
 <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script> --}}
 <script>
    $(document).ready(function() {

        $('.ckeditor').ckeditor();

    });
    //  CKEDITOR.replace( 'description_artist_reject_message' );
 </script>
@endsection
