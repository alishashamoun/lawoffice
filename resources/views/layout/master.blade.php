<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- External Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/fav.png') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Toastr for Notifications -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- App Styles -->
    <link href="{{ asset('assets/css/app.min.css') }} " rel="stylesheet" type="text/css" id="app-style" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <title>Law Office</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row align-items-stretch">
            <div class="col-md-2">
                @include('layout.sidebar')
            </div>
            <div class="col-md-10">
                <section class="main-sec">
                    <div class="main-cont py-3">
                        <div class="row align-items-center">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-end">
                                <div class="topbar-actions">
                                    <i class="fa fa-search"></i>
                                    <input type="text" id="searchInput" class="form-control d-inline w-50"
                                        placeholder="Search everything...">

                                    <div class="btn-group gap-1 ms-2">
                                        <button type="button" class="btn btn-black color">
                                            <i class="fa fa-bell"></i>
                                        </button>
                                        <button type="button" class="btn btn-black color">
                                            <i class="fa-brands fa-facebook-messenger"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @yield('content')

                </section>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <!-- CDN -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> --}}

    <script>
        $(document).ready(function() {
            $("#searchInput").on("keyup", function() {
                let value = $(this).val().toLowerCase();
                $("#clientTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar')
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/events',
                eventClick: function(info) {
                alert("📌 Client: " + info.event.title +
                      "\n📅 Court Date: " + info.event.start.toISOString().slice(0, 10) +
                      "\n📜 Case Details: " + info.event.extendedProps.description);
            },
                headerToolbar: {
                    left: 'prev,next today', // Left side: Previous, Next, Today button
                    center: 'title', // Center: Calendar Title
                    right: 'dayGridMonth,timeGridWeek,timeGridDay' // Right side: Month, Week, Day buttons
                },

            });
            calendar.render()
        });

        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        };
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
        @if (session('info'))
            toastr.info("{{ session('info') }}");
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>
</body>

</html>
