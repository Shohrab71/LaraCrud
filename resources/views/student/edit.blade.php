@extends('layout.master')
@section('content')
<section id="about" class="about">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
          <br>
        <h2>Student Entry Form</h2>
      </div>

      <div class="row content">
        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="150">
          
            <form action="{{ route('student.update',$students->id) }}" method="POST">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">
                
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ $students->name }}">
                </div>
                <div class="form-group">
                    <label>Roll</label>
                    <input type="number" class="form-control" placeholder="Enter Roll" name="roll" value="{{ $students->roll }}">
                </div>
                <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" class="form-control" placeholder="Enter Mobile" name="mobile" value="{{ $students->mobile }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
        
      </div>

    </div>
  </section>



@endsection