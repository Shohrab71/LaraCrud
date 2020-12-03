
@extends('layout.master')
@section(
    'content'
)
<section id="about" class="about">
    <div class="container">

     

      <div class="section-title" data-aos="fade-up">
          <br>
        <h2>Student Table</h2>
      </div>

      <div class="row content">
       
     
       
        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="150">
          <a href="{{ route('student.create') }}" class="btn btn-success">Add New Student</a>
          <br><br>

          @if(session()->has('deletemessage'))
          <div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('deletemessage') }}
        </div>
          @endif

          @if(session()->has('insertmessage'))
          <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('insertmessage') }}
        </div>
          @endif
          @if(session()->has('updatemessage'))
          <div class="alert alert-warning alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('updatemessage') }}
        </div>
          @endif

          
        
            <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">SL</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Roll</th>
                <th scope="col">Phone</th>
                <th scope="col" colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @php $serial = 1; @endphp
              @foreach($students as $student)
              
            
              <tr>
                <td scope="row">{{ $students->firstItem() + $loop->index }}</td>
                <td scope="row">{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->roll }}</td>
                <td>{{ $student->mobile }}</td>
                <td><a href="{{ route('student.edit',$student->id) }}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('student.destroy',$student->id) }}" method="post">
                      {{ csrf_field() }}
                      <input name="_method" type="hidden" value="DELETE">
                     <button class="btn btn-danger">Delete</button>
                  
                    </form>
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>
        
       
        
      </div>
      {{ $students->links() }}
    </div>
    
  </section>

  @endsection


 