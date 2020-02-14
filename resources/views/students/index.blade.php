@extends('template')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Students</h1>    
    <a class="btn btn-primary" href="{{route('students.create')}}">Add a New Student</a>
    <a class="btn btn-success" href="{{route('liveSearchExample')}}">Live Search</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Roll</td>
          <td>Result</td>
          <td>Mobile</td>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->roll}}</td>
            <td>{{$student->result}}</td>
            <td>{{$student->mobile}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection