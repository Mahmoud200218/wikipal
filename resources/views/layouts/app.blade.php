<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../">
    <title> WikiPal - This is where the truth can be heard.</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="WikiPal" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/logo-icon2.png" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.css" rel="stylesheet" type="text/css" />
    <link href="assets/donate/css/donate.css" rel="stylesheet" type="text/css" />
    <!-- SweetAlert2 CSS & JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--end::Global Stylesheets Bundle-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-extended header-fixed header-tablet-and-mobile-fixed">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header">
                    <!--begin::Header top-->
                    <div class="header-top d-flex align-items-stretch flex-grow-1">
                        <!--begin::Container-->
                        <div class="d-flex container-xxl w-100">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack align-items-stretch w-100">

                                <!--begin::Brand-->
                                <div class="d-flex align-items-center align-items-lg-stretch me-5">
                                    <!--begin::Heaeder navs toggle-->
                                    <button class="d-lg-none btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px ms-n2 me-2" id="kt_header_navs_toggle">
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                                                <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                    <!--end::Heaeder navs toggle-->
                                    <!--begin::Logo-->
                                    <a href="{{ route('/') }}" class="d-flex align-items-center">
                                        <img alt="Logo" src="assets/media/logos/logo2.png" class="h-25px h-lg-30px" />
                                    </a>
                                    <!--end::Logo-->
                                    <div class="align-self-end" style="font-size: 16px;" id="kt_brand_tabs">
                                        <!--begin::Header tabs-->
                                        <div class="header-tabs overflow-auto mx-4 ms-lg-10 mb-5 mb-lg-0" id="kt_header_tabs" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_header_navs_wrapper', lg: '#kt_brand_tabs'}">
                                            <ul class="nav flex-nowrap">
                                                <li class="nav-item">
                                                    <a class="nav-link text-dark" href="{{ route('politics') }}">{{ __('Politics') }}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-dark" href="{{ route('opinions') }}">{{ __('Opinions') }}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-dark" href="{{ route('sports') }}">{{ __('Sports') }}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-dark" href="{{ route('techs') }}">{{ __('Tech') }}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-dark" href="{{ route('businesses') }}">{{ __('Business') }}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-dark" href="{{ route('travels') }}">{{ __('Travel') }}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-dark" href="{{ route('styles') }}">{{ __('Style') }}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-dark" href="{{ route('stories') }}">{{ __('Stories') }}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-dark" href="{{ route('contact') }}">{{ __('Feeds') }}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link nav-link-donate" href="{{ route('donate') }}">Donate</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link nav-link-dashboard" href="{{ route('dashboard') }}">Dashboard</a>
                                                </li>
                                                @auth
                                                <li class="nav-item fs-3" style="margin:6px 0 0 40px;">
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <x-dropdown-link :href="route('logout')"
                                                            onclick="event.preventDefault();
                                                          this.closest('form').submit();">
                                                            {{ __('Log Out') }}
                                                        </x-dropdown-link>
                                                    </form>
                                                </li>
                                                @else
                                                <li class="nav-item" style="margin-left:40px;">
                                                    <a href="{{ route('login') }}"><button class="btn btn-dark">{{ __('Sign in') }}</button></a>
                                                </li>
                                                @endauth
                                            </ul>
                                        </div>
                                        <!--end::Header tabs-->

                                    </div>
                                </div>
                                <!--end::Topbar-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Header top-->
                </div>
                <!--end::Header-->
                <!--begin::Toolbar-->
                <div id="sidebarAd" class="" style="top: 100px;">
                    <div class="card shadow-lg border-0">
                        @if (App\Models\Ads::where('status', 'active'))
                        @foreach (App\Models\Ads::where('status', 'active')->get() as $ads)
                        <!-- زر الإغلاق -->
                        <button type="button" onclick="closeAd()" class="btn btn-sm btn-light position-absolute top-0 end-0 m-2" style="z-index: 10;">
                            <i class="fas fa-times"></i>
                        </button>
                        <div class="card-body p-3 text-center">
                            <p class="text-uppercase text-muted mb-2 fw-semibold" style="font-size: 0.75rem;">Sponsored Ad</p>
                            <a href="{{ $ads->link }}" target="_blank" rel="noopener">
                                <img src="{{ asset('storage/' . $ads->logo) }}" alt="Sidebar Ad" class="img-fluid rounded" style="max-height: 200px; object-fit: cover;">
                            </a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <script>
                    function closeAd() {
                        document.getElementById('sidebarAd').style.display = 'none';
                    }
                </script>


                <!--end::Toolbar-->
                <div class="news-ticker">
                    <div class="news-ticker-content">
                        <div class="date-time" id="localTime" style="padding-top: 5px;"></div>
                        <span class="breaking" style="margin-left: 20px;">{{ __('Breaking News') }}</span>
                        <marquee behavior="scroll" direction="left" id="news-content">
                            {{ __('Loading breaking news...') }}
                        </marquee>
                    </div>
                </div>

                @yield('search')
                <script>
                    // Function to fetch breaking news using News API
                    async function fetchBreakingNews() {
                        const apiKey = "c6d1735aef8e4a5290c867de8f9ce567"; // Replace with your API key
                        const url = `https://newsapi.org/v2/top-headlines?country=us&category=general&apiKey=${apiKey}`;

                        try {
                            const response = await fetch(url);
                            const data = await response.json();

                            if (data.articles && data.articles.length > 0) {
                                const headlines = data.articles
                                    .map(article => article.title) // Extract titles
                                    .join(" | "); // Separate with a pipe (|)

                                // Update the marquee content
                                document.getElementById("news-content").textContent = headlines;
                            } else {
                                document.getElementById("news-content").textContent = "No breaking news at the moment.";
                            }
                        } catch (error) {
                            console.error("Error fetching news:", error);
                            document.getElementById("news-content").textContent =
                                "Unable to fetch news.";
                        }
                    }

                    // Fetch news on page load
                    fetchBreakingNews();

                    // Optional: Refresh news every 5 minutes (300000 ms)
                    setInterval(fetchBreakingNews, 300000);
                </script>

                <!--begin::Container-->
                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                    <!--begin::Post-->
                    <div class="content flex-row-fluid" id="kt_content">

                        <x-flash-message />

                        @yield('content')
                        <footer class="footer">
                            <!-- Footer Navigation -->
                            <div class="footer-nav" style="margin: 0 200px 0 200px;">
                                <ul>
                                    <li><a href="{{ route('/') }}">Home</a></li>
                                    <li><a href="{{ route('pages.about') }}">About</a></li>
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms of Service</a></li>
                                    <li><a href="{{ route('pages.team') }}">Team</a></li>
                                    <li><a href="{{ route('pages.faq') }}">FAQs</a></li>
                                    <li><a href="#">Help</a></li>

                                </ul>
                                <ul>
                                    <li><a href="{{ route('politics') }}">Politics</a></li>
                                    <li><a href="{{ route('opinions') }}">Opinions</a></li>
                                    <li><a href="{{ route('techs') }}">Technology</a></li>
                                    <li><a href="{{ route('styles') }}">Styles</a></li>
                                    <li><a href="{{ route('businesses') }}">Business</a></li>
                                    <li><a href="{{ route('sports') }}">Sports</a></li>
                                    <li><a href="{{ route('stories') }}">Stories</a></li>
                                    <li><a href="{{ route('travels') }}">Travel</a></li>
                                </ul>
                                <ul>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="#">Accessibility</a></li>
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                </ul>
                            </div>

                            <!-- Footer Bottom (Copyright) -->
                            <div class="footer-bottom">
                                <p>&copy; 2025 WikiPal. All Rights Reserved.</p>
                                <p><a href="#">Cookie Preferences</a> | <a href="#">Ad Choices</a> | <a href="#">Terms</a></p>
                            </div>
                        </footer>
                    </div>
                    <!--end::Post-->
                    <!--begin::Scrolltop-->
                    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true" style="background-color: black;">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                        <span class="svg-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
                                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Scrolltop-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--end::Modal - Invite Friend-->
    <!--end::Modals-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{ asset('assets/js/charts/pieUserStatistics.js') }}"></script>
    <script src="{{ asset('assets/js/charts/barLastUsers.js') }}"></script>
    <script src="{{ asset('assets/js/charts/barNewsRequests.js') }}"></script>

    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="assets/js/custom/utilities/modals/create-campaign.js"></script>
    <script src="assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <!-- Bootstrap CSS -->
    <!-- Bootstrap Bundle with Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->

    <script src="{{ asset('assets/js/jquery library.js') }}"></script>
</body>
<!--end::Body-->

</html>