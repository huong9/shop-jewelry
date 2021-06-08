@extends('layouts.main')
@section('title', 'Address')
@section('body')
<div id="content-wrapper-parent">
    <div id="content-wrapper">  
        <!-- Content -->
        <div id="content" class="clearfix">        
            <div id="breadcrumb" class="breadcrumb">
                <div itemprop="breadcrumb" class="container">
                    <div class="row">
                        <div class="col-md-24">
                            <a href="index.html" class="homepage-link" title="Back to the frontpage">Home</a>
                            <span>/</span>
                            <span class="page-title">Address</span>
                        </div>
                    </div>
                </div>
            </div>              
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div id="page-header" class="col-md-24">
                            <h1 id="page-title">MANAGE ADDRESS</h1> 
                        </div>
                        <div id="col-main" class="address-page manage-address clearfix">								
                            <div class="clearfix">
                              <div id="address_tables">
                                <div class="clearfix">
                                  <div class="col-md-12 first">
                                    <div id="parent_address_226447297" class="address_table">
                                      <div id="edit_address_226447297" class="customer_address edit_address" style="display:none">
                                        <form method="post" action="{{ route('address.update') }}" id="address_form_226447297" accept-charset="UTF-8">
                                            @csrf
                                          <input name="form_type" type="hidden" value="customer_address">
                                          <ul class="row list-unstyled customer_address_table">
                                            <li class="col-md-24">
                                              <label class="control-label" for="address_last_name_226447297">Name</label>
                                              <input type="text" id="address_last_name_226447297" class="form-control" name="name" value="{{ Auth::user()->name }}">
                                            </li>
                                            <li class="clearfix"></li>
                                            
                                            <li class="col-md-24">
                                              <label class="control-label" for="address_address1_226447297">Address</label>
                                              <input type="text" id="address_address1_226447297" class="form-control" name="address" value="{{ Auth::user()->address }}">
                                            </li>
                                            <li class="clearfix"></li>
                                            
                                            <li class="col-md-24">
                                                <label class="control-label" for="address_address1_226447297">Email</label>
                                                <input type="text" id="address_address1_226447297" class="form-control" name="email" value="{{ Auth::user()->email }}">
                                              </li>
                                              <li class="clearfix"></li>

                                            <li>
                                              <label class="control-label" for="address_country_city">City</label>
                                                <select style="width: 100%" id="address_country_city" name="calc_shipping_provinces" required="">
                                                    <option value="">Tỉnh / Thành phố</option>
                                                </select>
                                            </li>
                                            <li>
                                              <label class="control-label" for="address_country_district">District</label>
                                                <select style="width: 100%" id="address_country_district" name="calc_shipping_district" required="">
                                                    <option value="">Quận / Huyện</option>
                                                </select>
                                                <input class="billing_address_1" name="city" type="hidden" value="">
                                                <input class="billing_address_2" name="district" type="hidden" value="">
                                            </li>
                                            <li class="clearfix"></li>

                                            
                                            <li class="col-md-12">
                                              <label class="control-label" for="address_phone_226447297">Phone</label>
                                              <input type="text" id="address_phone_226447297" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                                            </li>
                                            <li class="clearfix"></li>
                                            
                                          </ul>
                                          
                                          <div class="last clearfix" style="padding-left: 15px; margin-top: 15px">
                                            <button class="btn btn-2 mright-7" type="submit">Update Address</button>
                                            <button class="btn btn-4" type="button" onclick="HTML.CustomerAddress.toggleForm(226447297);return false">Cancel</button>
                                          </div>
                                          <br>
                                        </form>
                                      </div>
                                      <div id="view_address_226447297" class="customer_address view_address clearfix">
                                        <div class="address_info col-md-14">
                                                <address class="clearfix">
                                                <div class="info">
                                                    <i class="fa fa-user"></i>
                                                    <span class="address-group">
                                                    <span class="author">{{ Auth::user()->name }}</span>
                                                    <span class="email">{{ Auth::user()->email }}</span>
                                                    </span>
                                                </div>
                                                <div class="address">
                                                    <span class="address-group">
                                                    <span class="address1">{{ Auth::user()->address }}</span>
                                                    </span>
                                                </div>
                                                </address>
                                        </div>
                                            <div id="tool_address_1940927491" class="address_actions col-md-10">
                                                <a href="#" onclick="HTML.CustomerAddress.toggleForm(226447297);return false"><i class="fa fa-edit"></i><span>Edit</span></a>
                                                <span class="action_delete">
                                                <a href="#" onclick="HTML.CustomerAddress.destroy(226447297);return false" title="remove"><i class="fa fa-times"></i><span>Delete</span></a>
                                                </span>
                                            </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div id="address_pagination"></div>
                              </div>
                            </div>
                            
                            <script type="text/javascript">
                              var HTML = new Object();
                              HTML.CustomerAddress = {
                                toggleForm: function(id) {
                                  var editEl = document.getElementById('edit_address_'+id);
                                  var toolEl = document.getElementById('tool_address_'+id);      
                                  editEl.style.display = editEl.style.display == 'none' ? '' : 'none';
                                  toolEl.style.visibility = toolEl.style.visibility == 'hidden' ? '' : 'hidden';
                                  return false;    
                                },
                                
                                toggleNewForm: function() {
                                  var el = document.getElementById('add_address');
                                  el.style.display = el.style.display == 'none' ? '' : 'none';
                                  return false;
                                },
                                
                                destroy: function(id, confirm_msg) {
                                  if (confirm(confirm_msg || "Are you sure you wish to delete this address?")) {
                                  }      
                                }
                              }
                            </script>
                          </div>						
                    </div>
                </div>
            </section>        
        </div>
    </div>
</div>
<script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js' type="text/javascript"></script>

@endsection