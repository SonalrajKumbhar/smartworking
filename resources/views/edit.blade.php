@include('admin_header')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<style>
    .container {
      max-width: 450px;
    }

</style>
<div class="row">
<div class="card push-top">
  <div class="card-header">
    Edit & Update
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
      <form method="post" action="{{ route('property.update', $PropertyDetails->id) }}">
      
                      <p class="card-description"></p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                             @csrf
                             @method('put')
                            <label class="col-sm-3 col-form-label">County</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="county" value="{{ $PropertyDetails->county }}">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="price" value="{{ $PropertyDetails->price }}">
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
                              @php
                                  for($i=1; $i<21; $i++){
                                    @endphp
                                    <option value="{{$i}}" {{ $PropertyDetails->number_of_bedrooms == $i ? 'selected' : '' }}>{{$i}}</option>
                                    @php
                                  }
                               @endphp
                              </select>
                            </div>
                          </div>
                        </div> 
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Postcode</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="postcode" value="{{ $PropertyDetails->price }}">
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
                                    <option value="{{$i}}" {{ $PropertyDetails->number_of_bathrooms == $i ? 'selected' : '' }}>{{$i}}</option>
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
                                  <input type="radio" class="form-check-input" name="for_sale_for_rent" id="for_sale_for_rent" value="{{ $PropertyDetails->for_sale_for_rent == "sale" ? 'checked' : '' }}" > Sale <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="for_sale_for_rent" id="for_sale_for_rent" value="{{ $PropertyDetails->for_sale_for_rent == "rent" ? 'checked' : '' }}"> Rent <i class="input-helper"></i></label>
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
                              <input type="text" class="form-control" name="displayable_address" value="{{ $PropertyDetails->displayable_address }}">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Town</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="town" value="{{ $PropertyDetails->town }}"> 
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
                                    <option value="{{$i}}" {{ $PropertyDetails->property_type_id == $i ? 'selected' : '' }}>{{$i}}</option>
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
                        <textarea class="form-control" id="description" rows="4" name="description" value="">{{ $PropertyDetails->description }}</textarea>
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="image_url" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image" value="{{ $PropertyDetails->image_url }}">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-block btn-danger">Update Property</button>
                    </form>
</div>
  </div>
</div>
</div>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/js"></script>
