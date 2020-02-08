@extends('template')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a Student</h1>
    
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('students.store') }}">
          @csrf
          <div class="form-group" class="col-25">    
              <label for="name">Full Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group" class="col-25">
              <label for="roll">Roll Number:</label>
              <input type="text" class="form-control" name="roll"/>
          </div>

          <div class="form-group" class="col-25">
              <label for="mobile">Mobile Number:</label>
              <input type="text" class="form-control" name="mobile"/>
          </div>
          <div class="form-group" class="col-25">
              <label for="result">Result:</label>
              <input type="text" class="form-control" name="result"/>
          </div>
          <div class="row">                      
          <input type="submit"></input>
          </div>  
      </form>
  </div>
</div>
</div>
@endsection