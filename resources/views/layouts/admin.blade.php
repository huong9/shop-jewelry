<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>@yield('title')</title>
    {{-- style --}}
    <link rel="stylesheet" href="{{ url('resources/admin') }}/css/style.css">
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ url('resources/admin') }}/css/simplebar.css">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ url('resources/admin') }}/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{ url('resources/admin') }}/css/feather.css">
    <link rel="stylesheet" href="{{ url('resources/admin') }}/css/select2.css">
    <link rel="stylesheet" href="{{ url('resources/admin') }}/css/dropzone.css">
    <link rel="stylesheet" href="{{ url('resources/admin') }}/css/uppy.min.css">
    <link rel="stylesheet" href="{{ url('resources/admin') }}/css/jquery.steps.css">
    <link rel="stylesheet" href="{{ url('resources/admin') }}/css/jquery.timepicker.css">
    <link rel="stylesheet" href="{{ url('resources/admin') }}/css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ url('resources/admin') }}/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ url('resources/admin') }}/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="{{ url('resources/admin') }}/css/app-dark.css" id="darkTheme" disabled>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>

<body class="vertical  light  ">
    <div class="wrapper">
        <nav class="topnav navbar navbar-light">
            <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
                <i class="fe fe-menu navbar-toggler-icon"></i>
            </button>
            <form class="form-inline mr-auto searchform text-muted">
                <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search"
                    placeholder="Type something..." aria-label="Search">
            </form>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                        <i class="fe fe-sun fe-16"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
                        <span class="fe fe-grid fe-16"></span>
                    </a>
                </li>
                <li class="nav-item nav-notif">
                    <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
                        <span class="fe fe-bell fe-16"></span>
                        <span class="dot dot-md bg-success"></span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="avatar avatar-sm mt-2">
                            <img src="{{ url('resources/admin') }}/assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activities</a>
                    </div>
                </li>
            </ul>
        </nav>
        
        <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
          <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
              <i class="fe fe-x"><span class="sr-only"></span></i>
          </a>
          <nav class="vertnav navbar navbar-light">
              <!-- nav bar -->
              <div class="w-100 mb-4 d-flex">
                  <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('home') }}">
                      <svg version="1.1" id="logo" class="navbar-brand-img brand-sm"
                          xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                          y="0px" viewBox="0 0 120 120" xml:space="preserve">
                          <g>
                              <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                              <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                              <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                          </g>
                      </svg>
                  </a>
              </div>
              <ul class="navbar-nav flex-fill w-100 mb-2">
                  <li class="nav-item dropdown">
                      <a href="#dashboard" data-toggle="collapse" aria-expanded="false"
                          class="dropdown-toggle nav-link">
                          <i class="fe fe-home fe-16"></i>
                          <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
                      </a>
                      <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
                          <li class="nav-item active">
                              <a class="nav-link pl-3" href="./index.html"><span
                                      class="ml-1 item-text">Default</span></a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link pl-3" href="./dashboard-analytics.html"><span
                                      class="ml-1 item-text">Analytics</span></a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link pl-3" href="./dashboard-sales.html"><span
                                      class="ml-1 item-text">E-commerce</span></a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link pl-3" href="./dashboard-saas.html"><span class="ml-1 item-text">Saas
                                      Dashboard</span></a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link pl-3" href="./dashboard-system.html"><span
                                      class="ml-1 item-text">Systems</span></a>
                          </li>
                      </ul>
                  </li>
              </ul>
              <p class="text-muted nav-heading mt-4 mb-1">
                  <span>Components</span>
              </p>
              <ul class="navbar-nav flex-fill w-100 mb-2">
                  {{-- Category --}}
                  <li class="nav-item dropdown">
                      <a href="#category" data-toggle="collapse" aria-expanded="false"
                          class="dropdown-toggle nav-link">
                          <i class="fe fe-box fe-16"></i>
                          <span class="ml-3 item-text">Category</span>
                      </a>
                      <ul class="collapse list-unstyled pl-4 w-100" id="category">
                          <li class="nav-item">
                              <a class="nav-link pl-3" href="{{ route('admin.cate') }}"><span
                                      class="ml-1 item-text">List</span>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link pl-3" href="{{ route('admin.cate.create') }}"><span
                                      class="ml-1 item-text">Create</span></a>
                          </li>
                      </ul>
                  </li>
                  {{-- Color --}}
                  <li class="nav-item dropdown">
                      <a href="#color" data-toggle="collapse" aria-expanded="false"
                          class="dropdown-toggle nav-link">
                          <i class="fe fe-box fe-16"></i>
                          <span class="ml-3 item-text">Color</span>
                      </a>
                      <ul class="collapse list-unstyled pl-4 w-100" id="color">
                          <li class="nav-item">
                              <a class="nav-link pl-3" href="{{ route('admin.color') }}"><span
                                      class="ml-1 item-text">List</span>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link pl-3" href="{{ route('admin.color.create') }}"><span
                                      class="ml-1 item-text">Create</span></a>
                          </li>
                      </ul>
                  </li>
                  {{-- Size --}}
                  <li class="nav-item dropdown">
                  <a href="#size" data-toggle="collapse" aria-expanded="false"
                      class="dropdown-toggle nav-link">
                      <i class="fe fe-box fe-16"></i>
                      <span class="ml-3 item-text">Size</span>
                  </a>
                  <ul class="collapse list-unstyled pl-4 w-100" id="size">
                      <li class="nav-item">
                          <a class="nav-link pl-3" href="{{ route('admin.size') }}"><span
                                  class="ml-1 item-text">List</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link pl-3" href="{{ route('admin.size.create') }}"><span
                                  class="ml-1 item-text">Create</span></a>
                      </li>
                  </ul>
                  </li>
                  {{-- Product --}}
                  <li class="nav-item dropdown">
                  <a href="#product" data-toggle="collapse" aria-expanded="false"
                      class="dropdown-toggle nav-link">
                      <i class="fe fe-box fe-16"></i>
                      <span class="ml-3 item-text">Product</span>
                  </a>
                  <ul class="collapse list-unstyled pl-4 w-100" id="product">
                      <li class="nav-item">
                          <a class="nav-link pl-3" href="{{ route('admin.product') }}"><span
                                  class="ml-1 item-text">List</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link pl-3" href="{{ route('admin.product.create') }}"><span
                                  class="ml-1 item-text">Create</span></a>
                      </li>
                  </ul>
                  </li>
                  {{-- product detail --}}
                  <li class="nav-item dropdown">
                  <a href="#product_detail" data-toggle="collapse" aria-expanded="false"
                      class="dropdown-toggle nav-link">
                      <i class="fe fe-box fe-16"></i>
                      <span class="ml-3 item-text">Product Detail</span>
                  </a>
                  <ul class="collapse list-unstyled pl-4 w-100" id="product_detail">
                      <li class="nav-item">
                          <a class="nav-link pl-3" href="{{ route('admin.product_detail') }}"><span
                                  class="ml-1 item-text">List</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link pl-3" href="{{ route('admin.product_detail.create') }}"><span
                                  class="ml-1 item-text">Create</span></a>
                      </li>
                  </ul>
                  {{-- image --}}
                  {{-- <li class="nav-item dropdown">
                    <a href="#image" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle nav-link">
                        <i class="fe fe-box fe-16"></i>
                        <span class="ml-3 item-text">Image</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="image">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.image') }}"><span
                                    class="ml-1 item-text">List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.image.create') }}"><span
                                    class="ml-1 item-text">Create</span></a>
                        </li>
                    </ul>
                  </li> --}}
                  {{-- order --}}
                  <li class="nav-item dropdown">
                    <a href="#order" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle nav-link">
                        <i class="fe fe-box fe-16"></i>
                        <span class="ml-3 item-text">Order</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="order">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.order') }}"><span
                                    class="ml-1 item-text">List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.order.create') }}"><span
                                    class="ml-1 item-text">Create</span></a>
                        </li>
                    </ul>
                  </li>
                  {{-- Role --}}
                  <li class="nav-item dropdown">
                    <a href="#role" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle nav-link">
                        <i class="fe fe-box fe-16"></i>
                        <span class="ml-3 item-text">Role</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="role">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.role') }}"><span
                                    class="ml-1 item-text">List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.role.create') }}"><span
                                    class="ml-1 item-text">Create</span></a>
                        </li>
                    </ul>
                  </li>
                  {{-- User --}}
                  <li class="nav-item dropdown">
                    <a href="#user" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle nav-link">
                        <i class="fe fe-box fe-16"></i>
                        <span class="ml-3 item-text">User</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="user">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.user') }}"><span
                                    class="ml-1 item-text">List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.user.create') }}"><span
                                    class="ml-1 item-text">Create</span></a>
                        </li>
                    </ul>
                  </li>
                  {{-- News --}}
                  <li class="nav-item dropdown">
                    <a href="#News" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle nav-link">
                        <i class="fe fe-box fe-16"></i>
                        <span class="ml-3 item-text">News</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="News">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.news') }}"><span
                                    class="ml-1 item-text">List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.news.create') }}"><span
                                    class="ml-1 item-text">Create</span></a>
                        </li>
                    </ul>
                  </li>
                  {{-- newContent --}}
                  <li class="nav-item dropdown">
                    <a href="#newContent" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle nav-link">
                        <i class="fe fe-box fe-16"></i>
                        <span class="ml-3 item-text">New Content</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="newContent">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.newsC') }}"><span
                                    class="ml-1 item-text">List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.newsC.create') }}"><span
                                    class="ml-1 item-text">Create</span></a>
                        </li>
                    </ul>
                  </li>                   
              </ul>
  
          </nav>
      </aside>
        
        {{-- MAIN --}}
        <main role="main" class="main-content">
            <div class="container-fluid">
              <div class="row justify-content-center">
                <div class="col-12">
                  @if (Session::has('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          <span class="sr-only">Close</span>
                        </button>
                        <strong style="color: black">{{ Session::get('success') }}</strong>
                      </div>
                  @endif
                  @if (Session::has('error'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          <span class="sr-only">Close</span>
                        </button>
                        <strong style="color: black">{{ Session::get('error') }}</strong>
                      </div>
                  @endif
                    @yield('body')
                </div> <!-- .col-12 -->
              </div> <!-- .row -->
            </div> <!-- .container-fluid -->
            <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="list-group list-group-flush my-n3">
                      <div class="list-group-item bg-transparent">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="fe fe-box fe-24"></span>
                          </div>
                          <div class="col">
                            <small><strong>Package has uploaded successfull</strong></small>
                            <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                            <small class="badge badge-pill badge-light text-muted">1m ago</small>
                          </div>
                        </div>
                      </div>
                      <div class="list-group-item bg-transparent">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="fe fe-download fe-24"></span>
                          </div>
                          <div class="col">
                            <small><strong>Widgets are updated successfull</strong></small>
                            <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                            <small class="badge badge-pill badge-light text-muted">2m ago</small>
                          </div>
                        </div>
                      </div>
                      <div class="list-group-item bg-transparent">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="fe fe-inbox fe-24"></span>
                          </div>
                          <div class="col">
                            <small><strong>Notifications have been sent</strong></small>
                            <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                            <small class="badge badge-pill badge-light text-muted">30m ago</small>
                          </div>
                        </div> <!-- / .row -->
                      </div>
                      <div class="list-group-item bg-transparent">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="fe fe-link fe-24"></span>
                          </div>
                          <div class="col">
                            <small><strong>Link was attached to menu</strong></small>
                            <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                            <small class="badge badge-pill badge-light text-muted">1h ago</small>
                          </div>
                        </div>
                      </div> <!-- / .row -->
                    </div> <!-- / .list-group -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body px-5">
                    <div class="row align-items-center">
                      <div class="col-6 text-center">
                        <div class="squircle bg-success justify-content-center">
                          <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                        </div>
                        <p>Control area</p>
                      </div>
                      <div class="col-6 text-center">
                        <div class="squircle bg-primary justify-content-center">
                          <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                        </div>
                        <p>Activity</p>
                      </div>
                    </div>
                    <div class="row align-items-center">
                      <div class="col-6 text-center">
                        <div class="squircle bg-primary justify-content-center">
                          <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                        </div>
                        <p>Droplet</p>
                      </div>
                      <div class="col-6 text-center">
                        <div class="squircle bg-primary justify-content-center">
                          <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                        </div>
                        <p>Upload</p>
                      </div>
                    </div>
                    <div class="row align-items-center">
                      <div class="col-6 text-center">
                        <div class="squircle bg-primary justify-content-center">
                          <i class="fe fe-users fe-32 align-self-center text-white"></i>
                        </div>
                        <p>Users</p>
                      </div>
                      <div class="col-6 text-center">
                        <div class="squircle bg-primary justify-content-center">
                          <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                        </div>
                        <p>Settings</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </main> <!-- main -->
        
        {{--  --}}
    </div> <!-- .wrapper -->
    <script src="{{ url('resources/admin') }}/js/jquery.min.js"></script>
    <script src="{{ url('resources/admin') }}/js/popper.min.js"></script>
    <script src="{{ url('resources/admin') }}/js/moment.min.js"></script>
    <script src="{{ url('resources/admin') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('resources/admin') }}/js/simplebar.min.js"></script>
    <script src='{{ url('resources/admin') }}/js/daterangepicker.js'></script>
    <script src='{{ url('resources/admin') }}/js/jquery.stickOnScroll.js'></script>
    <script src="{{ url('resources/admin') }}/js/tinycolor-min.js"></script>
    <script src="{{ url('resources/admin') }}/js/config.js"></script>
    <script src="{{ url('resources/admin') }}/js/d3.min.js"></script>
    <script src="{{ url('resources/admin') }}/js/topojson.min.js"></script>
    <script src="{{ url('resources/admin') }}/js/datamaps.all.min.js"></script>
    <script src="{{ url('resources/admin') }}/js/datamaps-zoomto.js"></script>
    <script src="{{ url('resources/admin') }}/js/datamaps.custom.js"></script>
    <script src="{{ url('resources/admin') }}/js/Chart.min.js"></script>
    <script>
        /* defind global options */
        Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
        Chart.defaults.global.defaultFontColor = colors.mutedColor;

    </script>
    <script src='{{ url('resources/admin') }}/js/jquery.dataTables.min.js'></script>
    <script src='{{ url('resources/admin') }}/js/dataTables.bootstrap4.min.js'></script>
    <script src="{{ url('resources/admin') }}/js/gauge.min.js"></script>
    <script src="{{ url('resources/admin') }}/js/jquery.sparkline.min.js"></script>
    <script src="{{ url('resources/admin') }}/js/apexcharts.min.js"></script>
    <script src="{{ url('resources/admin') }}/js/apexcharts.custom.js"></script>
    <script src='{{ url('resources/admin') }}/js/jquery.mask.min.js'></script>
    <script src='{{ url('resources/admin') }}/js/select2.min.js'></script>
    <script src='{{ url('resources/admin') }}/js/jquery.steps.min.js'></script>
    <script src='{{ url('resources/admin') }}/js/jquery.validate.min.js'></script>
    <script src='{{ url('resources/admin') }}/js/jquery.timepicker.js'></script>
    <script src='{{ url('resources/admin') }}/js/dropzone.min.js'></script>
    <script src='{{ url('resources/admin') }}/js/uppy.min.js'></script>
    <script src='{{ url('resources/admin') }}/js/quill.min.js'></script>
    

    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });
        $('.select2-multi').select2({
            multiple: true,
            theme: 'bootstrap4',
        });
        $('.drgpicker').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale: {
                format: 'MM/DD/YYYY'
            }
        });
        $('.time-input').timepicker({
            'scrollDefault': 'now',
            'zindex': '9999' /* fix modal open */
        });
        /** date range picker */
        if ($('.datetimes').length) {
            $('.datetimes').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });
        }
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ]
            }
        }, cb);
        cb(start, end);
        $('.input-placeholder').mask("00/00/0000", {
            placeholder: "__/__/____"
        });
        $('.input-zip').mask('00000-000', {
            placeholder: "____-___"
        });
        $('.input-money').mask("#.##0.00", {
            reverse: true
        });
        
        $('.input-phoneus').mask('(000) 000-0000');
        $('.input-mixed').mask('AAA 000-S0S');
        $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/,
                    optional: true
                }
            },
            placeholder: "___.___.___.___"
        });
        // editor
        var editor = document.getElementById('editor');
        if (editor) {
            var toolbarOptions = [
                [{
                    'font': []
                }],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{
                        'header': 1
                    },
                    {
                        'header': 2
                    }
                ],
                [{
                        'list': 'ordered'
                    },
                    {
                        'list': 'bullet'
                    }
                ],
                [{
                        'script': 'sub'
                    },
                    {
                        'script': 'super'
                    }
                ],
                [{
                        'indent': '-1'
                    },
                    {
                        'indent': '+1'
                    }
                ], // outdent/indent
                [{
                    'direction': 'rtl'
                }], // text direction
                [{
                        'color': []
                    },
                    {
                        'background': []
                    }
                ], // dropdown with defaults from theme
                [{
                    'align': []
                }],
                ['clean'] // remove formatting button
            ];
            var quill = new Quill(editor, {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
        }
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
      'use strict';
      window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
          form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();

    </script>
    <script>
        var uptarg = document.getElementById('drag-drop-area');
        if (uptarg) {
            var uppy = Uppy.Core().use(Uppy.Dashboard, {
                inline: true,
                target: uptarg,
                proudlyDisplayPoweredByUppy: false,
                theme: 'dark',
                width: 770,
                height: 210,
                plugins: ['Webcam']
            }).use(Uppy.Tus, {
                endpoint: 'https://master.tus.io/files/'
            });
            uppy.on('complete', (result) => {
                console.log('Upload complete! We’ve uploaded these files:', result.successful)
            });
        }

    </script>
    <script>
        $('#dataTable-1').DataTable(
        {
          autoWidth: true,
          "lengthMenu": [
            [16, 32, 64, -1],
            [16, 32, 64, "All"]
          ]
        });
      </script>
    <script src="{{ url('resources/admin') }}/js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');

    </script>
    <script>
        var floatInput = document.querySelector("#custom-money");
        floatInput.oninput = e => {
            let value = e.currentTarget.value;
            let result = value
                .replace(/[^0-9-.]/g, '')
                .replace(/(?!^)-/g, '')
                // prevent inserting dots after the first one
                .replace(/([^.]*\.[^.]*)\./g, '$1');
                floatInput.value = result;
        }

        var floatInput2 = document.querySelector('#example-number');
        floatInput2.oninput = e => {
            let value = e.currentTarget.value;
            let result = value
                .replace(/[^0-9-.]/g, '')
                .replace(/(?!^)-/g, '')
                // prevent inserting dots after the first one
                .replace(/([^.]*\.[^.]*)\./g, '$1');
                floatInput2.value = result;
        }

    </script>
    <script>
      function readURL(input, fileN, labelN, imgS) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var filename = $(`#${fileN}`).val();
      if (filename.substring(3,11) == 'fakepath') {
              filename = filename.substring(12);
          }
      reader.onload = function(e) {
      $(`#${imgS}`).css('display', 'block');
  
        $(`#${imgS}`).attr('src', e.target.result);
        $(`#${labelN}`).html(filename);
      }
  
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  
  $("#imgInp").change(function() {
    readURL(this, "imgInp", "choose-file-value", "blah");
  });
  $("#imgInp2").change(function() {
    readURL(this, "imgInp2", "choose-file-value2", "blah2");
  });
  </script>
</body>

</html>
