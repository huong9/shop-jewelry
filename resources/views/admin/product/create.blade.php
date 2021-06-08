@extends('layouts.admin')
@section('title', 'Product create')
@section('body')

<a href="{{ route('admin.product') }}" class="btn mb-2 btn-secondary">Back<span></a>
<div class="card shadow mb-4">
    <div class="card-header">
        <h4>
            <strong class="card-title">Create category</strong>
        </h4>
    </div>
    <div class="card-body">
        
        <form class="needs-validation" method="POST" enctype="multipart/form-data"  novalidate>
            @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-3">
                    <label for="simpleinput">Product code</label>
                    <input type="text" id="simpleinput" name="product_code" class="form-control" required>
                    <div class="invalid-feedback"> Please ender product code. </div>
                </div>
            <div class="form-group mb-3">
                <label for="simpleinput">Name</label>
                <input type="text" id="simpleinput" name="name" class="form-control" required>
                <div class="invalid-feedback"> Please choose a name. </div>
            </div>
            {{--  --}}
            <p class="mb-2"><strong>Status</strong></p>
            <div class="custom-control custom-radio">
                <input type="radio" value="0" id="customRadio1" name="status" class="custom-control-input" checked>
                <label class="custom-control-label" for="customRadio1">Show</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" value="1" id="customRadio2" name="status" class="custom-control-input" >
                <label class="custom-control-label" for="customRadio2">Hide</label>
            </div>

            <br>
            {{--  --}}
            <p class="mb-2"><strong>Sex</strong></p>
            <div class="custom-control custom-radio">
                <input type="radio" value="0" id="customRadio3" name="sex" class="custom-control-input" checked>
                <label class="custom-control-label" for="customRadio3">Male</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" value="1" id="customRadio4" name="sex" class="custom-control-input" >
                <label class="custom-control-label" for="customRadio4">Female</label>
            </div>
            <br>
            {{--  --}}
            <p class="mb-2"><strong>Color</strong></p>
            <select class="form-control select2" name="color_id" id="simple-select2" required>
                @foreach ($colors as $item)
                <option value="{{ $item['id'] }}">{{ $item['name'] }}
                    <div class="color-box" style="background-color: {{ $item['hex_color'] }};"></div>
                </option>
                @endforeach
            </select>
            <br>
            {{--  --}}
            <div class="form-group mb-3">
                <label for="custom-money">Price</label>
                <input class="form-control floatInput" id="custom-money" type="text" name="price" required>
                <div class="invalid-feedback"> Please enter price. </div>
            </div>
            <div class="form-group mb-3">
                <label for="example-number ">Discount</label>
                <input class="form-control floatInput" value="0" id="example-number" type="text" name="discount" >
            </div>
            <p class="mb-2"><strong>Category</strong></p>
            <select class="form-control select2" name="category_id" id="simple-select2">
                @foreach ($cates as $item)
                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @endforeach
            </select>
            <div class="form-group mb-3">
                <label for="validationTextarea">Description</label>
                <textarea name="description" class="form-control" id="validationTextarea" ></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="customFile">Custom file input</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image" id="imgInp">
                  <label class="custom-file-label" id="choose-file-value" for="customFile">Choose file</label>
                </div>
                @error('image')
                <small class="help-block">{{$message}}</small>
                @enderror
                <img width="160px" id="blah" src="#" style="display: none; margin-top: 10px" alt="your image" />
            </div>
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

@endsection