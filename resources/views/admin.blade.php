@include('admin_header')


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
                    <span></span><a href="/getapidata" class="btn btn-gradient-primary btn-fw">Sync API</a>
                  </li>
                </ul>
              </nav>
            </div>
           <div class="row">
           <style>
  .push-top {
    /* margin-top: 50px; */
  }
</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="row table">
  <table class="table-responsive" id="proprtyTable" width="100%">
    <thead>
        <tr class="table-warning">
          <td>Sr No</td>
          <td>Country</td>
          <td>Town</td>
          <td>Price</td>
          <td>Type</td>
          <td>Description</td>
          <!-- <td>Address</td> -->
          <td>No Of Bedrooms</td>
          <td>No Of Bathrooms</td>  	
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @php
            $counter = 1;
        @endphp
        @foreach($PropertyDetails as $property)
      
        <tr>
            <td>{{$counter}}</td>
            <td>{{$property->county}}</td>
            <td>{{$property->town}}</td>
            <td>{{$property->price}}</td>
            <td>{{$property->for_sale_for_rent}}</td>
            <td>{{$property->description}}</td>
            <!-- <td>{{$property->address}}</td> -->
            <td>{{$property->number_of_bedrooms}}</td>
            <td>{{$property->number_of_bathrooms}}</td>
            <td class="text-center">
                <a href="{{ route('property.edit', $property->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <!-- <form action="{{ route('property.destroy', $property->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form> -->
                  <form onclick="return window.confirm()" action="{{ route('property.destroy', $property->id)}}" method="POST" style="display: inline-block">
                    @method('DELETE')
                    @csrf
                   <button class='btn btn-danger btn-sm' type="submit">Delete</button>
                   
                </form>
                
            </td>
        </tr>
        @php
        $counter++;
        @endphp
        @endforeach
    </tbody>
  </table>
</div>
<div>
           </div>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

           <script>

            $(document).ready( function () {
                $('#proprtyTable').DataTable();
              } );

      function confirmDelete() {
        Swal.fire({
          title: 'Are you sure you want to Delete this entry?',
          showDenyButton: true,
          showCancelButton: true,
          confirmButtonText: 'Yes',
          denyButtonText: `No`,
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            Swal.fire('Deleted!', '', 'success')
          } else if (result.isDenied) {
            Swal.fire('Deletion Was Cancelled', '', 'info')
          }
        })
      }
      
    </script>
       @include('admin_footer')