@extends('layouts.admin')
@section('title', 'Role edit')
@section('body')
<a href="{{ route('admin.role') }}" class="btn mb-2 btn-secondary">Back<span></a>
<div class="card shadow mb-4">
    <div class="card-header">
        <h4>
            <strong class="card-title">Create role</strong>
        </h4>
    </div>
    <div class="card-body">
        
        <form class="needs-validation" method="POST" novalidate>
            @csrf
        <div class="row">
            <div class="col-md-12">
            <div class="form-group mb-3">
                <label for="simpleinput">Name</label>
                <input type="text" id="simpleinput" value="{{ $model->name }}" name="name" class="form-control" required>
                <div class="invalid-feedback"> Please choose a name. </div>
            </div>
            <br>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" value="Check all" class="custom-control-input" id="checkAll">
                <label class="custom-control-label" for="checkAll">Check all</label>
              </div>
              <br>
              <table class="table table-hover datatables" id="dataTable-1">
                <thead>
                  <tr>
                    <th>Role</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($routes as $key => $item)
                    @if (in_array($item, $permissions))
                    <tr>
                        <td>
                            <p style="display: none">{{ $item }}</p>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="route[]" value="{{ $item }}" class="custom-control-input" checked id="customCheck{{ $key }}">
                                <label class="custom-control-label" for="customCheck{{ $key }}">{{ $item }}</label>
                            </div>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td>
                            <p style="display: none">{{ $item }}</p>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="route[]" value="{{ $item }}" class="custom-control-input" id="customCheck{{ $key }}">
                                <label class="custom-control-label" for="customCheck{{ $key }}">{{ $item }}</label>
                            </div>
                        </td>
                    </tr>
                    @endif
                    
                    @endforeach
                  
                </tbody>
              </table>
            {{-- <div class="form-group mb-3">
                <label for="simpleinput">Roles</label>
                @foreach ($routes as $key => $item)

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="route[]" value="{{ $item }}" class="custom-control-input" id="customCheck{{ $key }}">
                    <label class="custom-control-label" for="customCheck{{ $key }}">{{ $item }}</label>
                  </div>
                @endforeach
                
                <div class="invalid-feedback"> Please choose a role. </div>
            </div> --}}

            <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
        </form>
    </div>
  </div> <!-- / .card -->

    <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog"
        aria-labelledby="defaultModalLabel" aria-hidden="true">
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
                                    <div class="my-0 text-muted small">Just create new layout Index, form, table
                                    </div>
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
                                    <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo
                                    </div>
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
                                    <div class="my-0 text-muted small">New layout has been attached to the menu
                                    </div>
                                    <small class="badge badge-pill badge-light text-muted">1h ago</small>
                                </div>
                            </div>
                        </div> <!-- / .row -->
                    </div> <!-- / .list-group -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear
                        All</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog"
        aria-labelledby="defaultModalLabel" aria-hidden="true">
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
<script>
    $("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
@endsection