<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
        <style>
            .text-gray-800,.text-gray-900{
                color:#fff !important;
            }
            /* Hide the number input buttons */
            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            input[type="number"] {
                -moz-appearance: textfield; /* Firefox */
            }
            .editDell{
                height: 24px;
            }
            #loading {
                position: fixed;
                display: block;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                text-align: center;
                opacity: 0.7;
                background-color: #fff;
                z-index: 99;
            }
            #loading-image {
                z-index: 100;
                margin: auto;
                margin-top: 100px;
            }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div id="loading" style="display: none">
            <img id="loading-image" src="{{ asset('images/loader.gif') }}" alt="Loading..." />
        </div>
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="shadow" style="background-color: #333">
{{--                <header class="bg-white shadow">--}}
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/form.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('#userEducationTable').DataTable();
            });
            $(document).ready(function() {
                $('#userExperienceTable').DataTable();
            });


            /*--------------------------------------
              Loader
        ---------------------------------------*/

                var preload = document.getElementById('loading');
                function hideLoader()
                {
                    preload.style.display = "none";
                }

                function showLoader()
                {
                    preload.style.display = "block";
                }

            /*-------------------------------
                edit Education Alert
              -----------------------------------*/
            function editEducation(id)
            {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                showLoader();
                $.ajax({
                    type: 'GET',
                    url: '/user-educations/' + id + '/edit',
                    data: {education_id:id},
                    dataType: 'json',
                    success:function(response)
                    {
                        if(response.success)
                        {
                            hideLoader();
                            $('#institute').val('');
                            $('#obtain_marks').val('');
                            $('#total_marks').val('');
                            $('#passing_date').val('');
                            $('#updateText').val('');

                            $('#institute').val(response.education.institute);
                            $('#obtain_marks').val(response.education.obtain_marks);
                            $('#total_marks').val(response.education.total_marks);
                            $('#passing_date').val(response.education.passing_date);
                            $('#educationLevel').val(response.education.education_level);
                            $('#updateText').html('Update Education');
                            $('#updateRouteAdd').attr('action', response.update_form_action);
                            $('#blockPut').html('@method('put')')
                        }
                    }
                });
            }

            /*-------------------------------
               edit Experience Alert
             -----------------------------------*/
            function editExperience(id)
            {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                showLoader();
                $.ajax({
                    type: 'GET',
                    url: '/user-experiences/' + id + '/edit',
                    data: {experience_id:id},
                    dataType: 'json',
                    success:function(response)
                    {
                        if(response.success)
                        {
                            hideLoader();
                            $('#organizationType').val('');
                            $('#position_title').val('');
                            $('#organization_name').val('');
                            $('#from_date').val('');
                            $('#to_date').val('');
                            $('#is_working').val('');

                            $('#organizationType').val(response.experience.organization_type);
                            $('#position_title').val(response.experience.position_title);
                            $('#organization_name').val(response.experience.organization_name);
                            $('#from_date').val(response.experience.from_date);
                            $('#to_date').val(response.experience.to_date);

                            if (response.experience.is_working === 'on') {
                                $('#is_working').prop('checked', true);
                            } else {
                                $('#is_working').prop('checked', false);
                            }

                            $('#updateExText').html('Update Experience');
                            $('#updateExpRouteAdd').attr('action', response.update_form_action);
                            $('#expBlockPut').html('@method('put')')
                        }
                    }
                });
            }

            /*-------------------------------
            Delete Confirmation Alert
          -----------------------------------*/
            $('.delete-confirm').on('click', function(event) {
                const id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        event.preventDefault();
                        document.getElementById('delete_form_' + id).submit();
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your Data is Save :)',
                            'error'
                        )
                    }
                })
            });
        </script>
    </body>
</html>
