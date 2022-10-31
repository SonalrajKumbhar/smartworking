@include('admin_header')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
           <div class="row">

<style>
    .container {
      max-width: 450px;
    }

</style>
<div class="card push-top">
  <div class="card-header">
    Add Property
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
<div class="col-12">
                <div class="">
                  <div class="">
                    <h4 class="card-title">Property Details</h4>
                    <form method="post" action="{{ route('property.store') }}">
                      <p class="card-description"></p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                             @csrf
                            <label class="col-sm-3 col-form-label">County</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="county">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="price">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Number of bedrooms</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="number_of_bedrooms">
                              <option value="" selected>Select bedroom</option>>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                              </select>
                            </div>
                          </div>
                        </div> 
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Postcode</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="postcode">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Number of bathrooms</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="number_of_bathrooms">
                               <option value="" selected>Select bathrooms</option>
                               @php
                                  for($i=1; $i<21; $i++){
                                    @endphp
                                    <option value="{{$i}}">{{$i}}</option>
                                    @php
                                  }
                               @endphp
                               
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">For Sale / For Rent</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="for_sale_for_rent" id="for_sale_for_rent" value="R" checked=""> Sale <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="for_sale_for_rent" id="for_sale_for_rent" value="S"> Rent <i class="input-helper"></i></label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Displayable Address</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="displayable_address">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Town</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="town"> 
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                        
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Property Type</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="property_type">
                                <option selected>Select Property Type</option>
                                @php
                                  for($i=1; $i<15; $i++){
                                    @endphp
                                    <option value="{{$i}}">{{$i}}</option>
                                    @php
                                  }
                               @endphp
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="4" name="description"></textarea>
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="image_url" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-block btn-danger">Create Property</button>
                    </form>
                  </div>
                </div>
              </div>
           </div>
         
            

          </div>
          <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/js"></script>
       @include('admin_footer')