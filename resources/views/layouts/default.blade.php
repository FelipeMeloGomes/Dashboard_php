<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE v4 | Dashboard</title>

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance." />
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant" />
    <!--end::Primary Meta Tags-->


    <meta name="supported-color-schemes" content="light dark" />
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>


<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    <div class="app-wrapper">
        @include('parts.header')
        @include('parts.sidebar')

        <main class="app-main">
            @include('parts.content-header')

            <div class="app-content">
                <div class="container-fluid">
                    @yield('content')

                    <div class="col-lg-7 connectedSortable">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Sales Value</h3>
                            </div>

                            <div class="card-body">
                                <div id="revenue-chart"></div>
                            </div>
                        </div>
                        <!-- /.card -->

                        <!-- DIRECT CHAT -->
                        <div class="card direct-chat direct-chat-primary mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Direct Chat</h3>

                                <div class="card-tools">
                                    <span title="3 New Messages" class="badge text-bg-primary"> 3 </span>
                                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" title="Contacts"
                                        data-lte-toggle="chat-pane">
                                        <i class="bi bi-chat-text-fill"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages">
                                    <!-- Message. Default to the start -->
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-start"> Alexander Pierce </span>
                                            <span class="direct-chat-timestamp float-end"> 23 Jan 2:00 pm </span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img"
                                            src="{{ Vite::asset('resources/images/user1-128x128.jpg') }}"
                                            alt="message user image" />
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            Is this template really for free? That's unbelievable!
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                    <!-- Message to the end -->
                                    <div class="direct-chat-msg end">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-end"> Sarah Bullock </span>
                                            <span class="direct-chat-timestamp float-start"> 23 Jan 2:05 pm </span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img"
                                            src="{{ Vite::asset('resources/images/user3-128x128.jpg') }}"
                                            alt="message user image" />
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">You better believe it!</div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                    <!-- Message. Default to the start -->
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-start"> Alexander Pierce </span>
                                            <span class="direct-chat-timestamp float-end"> 23 Jan 5:37 pm </span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img"
                                            src="{{ Vite::asset('resources/images/user1-128x128.jpg') }}"
                                            alt="message user image" />
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            Working with AdminLTE on a great new app! Wanna join?
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                    <!-- Message to the end -->
                                    <div class="direct-chat-msg end">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-end"> Sarah Bullock </span>
                                            <span class="direct-chat-timestamp float-start"> 23 Jan 6:10 pm </span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img"
                                            src="{{ Vite::asset('resources/images/user3-128x128.jpg') }}"
                                            alt="message user image" />
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">I would love to.</div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                                </div>
                                <!-- /.direct-chat-messages-->

                                <!-- Contacts are loaded here -->
                                <div class="direct-chat-contacts">
                                    <ul class="contacts-list">
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                    src="{{Vite::asset('resources/images/user1-128x128.jpg')}"
                                                    alt="User Avatar" />

                                                <div class="contacts-list-info">
                                                    <span class="contacts-list-name">
                                                        Count Dracula
                                                        <small class="contacts-list-date float-end"> 2/28/2023 </small>
                                                    </span>
                                                    <span class="contacts-list-msg"> How have you been? I was...
                                                    </span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                    src="{{Vite::asset('resources/images/user7-128x128.jpg')}"
                                                    alt="User Avatar" />

                                                <div class="contacts-list-info">
                                                    <span class="contacts-list-name">
                                                        Sarah Doe
                                                        <small class="contacts-list-date float-end"> 2/23/2023 </small>
                                                    </span>
                                                    <span class="contacts-list-msg"> I will be waiting for... </span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                    src="{{Vite::asset('resources/images/user3-128x128.jpg')}"
                                                    alt="User Avatar" />

                                                <div class="contacts-list-info">
                                                    <span class="contacts-list-name">
                                                        Nadia Jolie
                                                        <small class="contacts-list-date float-end"> 2/20/2023 </small>
                                                    </span>
                                                    <span class="contacts-list-msg"> I'll call you back at... </span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                    src="{{Vite::asset('resources/images/user5-128x128.jpg')}"
                                                    alt="User Avatar" />

                                                <div class="contacts-list-info">
                                                    <span class="contacts-list-name">
                                                        Nora S. Vans
                                                        <small class="contacts-list-date float-end"> 2/10/2023 </small>
                                                    </span>
                                                    <span class="contacts-list-msg"> Where is your new... </span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                    src="{{Vite::asset('resources/images/user6-128x128.jpg')}"
                                                    alt="User Avatar" />

                                                <div class="contacts-list-info">
                                                    <span class="contacts-list-name">
                                                        John K.
                                                        <small class="contacts-list-date float-end"> 1/27/2023 </small>
                                                    </span>
                                                    <span class="contacts-list-msg"> Can I take a look at... </span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img"
                                                    src="{{Vite::asset('resources/images/user8-128x128.jpg')}"
                                                    alt="User Avatar" />

                                                <div class="contacts-list-info">
                                                    <span class="contacts-list-name">
                                                        Kenneth M.
                                                        <small class="contacts-list-date float-end"> 1/4/2023 </small>
                                                    </span>
                                                    <span class="contacts-list-msg"> Never mind I found... </span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                    </ul>
                                    <!-- /.contacts-list -->
                                </div>
                                <!-- /.direct-chat-pane -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input type="text" name="message" placeholder="Type Message ..."
                                            class="form-control" />
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-primary">Send</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <!-- /.direct-chat -->
                    </div>
                    <!-- /.Start col -->

                    <!-- Start col -->
                    <div class="col-lg-5 connectedSortable">
                        <div class="card text-white bg-primary bg-gradient border-primary mb-4">
                            <div class="card-header border-0">
                                <h3 class="card-title">Sales Value</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary btn-sm"
                                        data-lte-toggle="card-collapse">
                                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="world-map" style="height: 220px"></div>
                            </div>
                            <div class="card-footer border-0">
                                <!--begin::Row-->
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <div id="sparkline-1" class="text-dark"></div>
                                        <div class="text-white">Visitors</div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div id="sparkline-2" class="text-dark"></div>
                                        <div class="text-white">Online</div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div id="sparkline-3" class="text-dark"></div>
                                        <div class="text-white">Sales</div>
                                    </div>
                                </div>
                                <!--end::Row-->
                            </div>
                        </div>
                    </div>
                    <!-- /.Start col -->
                </div>
                <!-- /.row (main row) -->
            </div>
            <!--end::Container-->
    </div>
    <!--end::App Content-->
    </main>

    @include('parts.footer')
    </div>
</body>
<!--end::Body-->

</html>
