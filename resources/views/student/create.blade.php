@extends('layout.master')
@section('content')
<section id="about" class="about">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
          <br>
        <h2>Student Entry Form</h2>
      </div>
      
@if($errors->any())
   <div class = "alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif
@if(session('error'))
{{  session('error')  }}
@endif

      <div class="row content">
        <div class="col-lg-12">
          
            <form action="{{ route('student.store') }}" enctype="multipart/form-data" method="post" data-aos="fade-up">
                {{ csrf_field() }}
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label>Roll</label>
                    <input type="number" class="form-control" placeholder="Enter Roll" name="roll"  value="{{ old('roll') }}">
                </div>
                <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" class="form-control" placeholder="Enter Mobile" name="mobile"  value="{{ old('mobile') }}">
                </div>
                <div class="form-group">
                  <label>Photo</label>
                  <input type="file" class="form-control" placeholder="Enter Mobile" name="photo"  value="{{ old('photo') }}">
              </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        




        </div>
        
      </div>

    </div>
  </section>



@endsection