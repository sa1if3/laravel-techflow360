@extends('template')

@section('main')
<div class="row">
<div class="col-sm-12">
	<a class="btn btn-success" href="{{ url('/students') }}">Examples Home</a>
	<form>
		<div>
				<br/>
                <input type="text" id="search_text" class="form-control" name="search_text" placeholder="Enter Student Name or Roll" onchange="studentFinder()" required style="width:50%">
                 <select class="form-control" id="inputStudent1" onchange="studentDisplay()" name="inputStudent1" style="width: 50%;">
                </select>
        </div>  
	</form>
<br/>
<br/>
 <table style="width:50%">
  <tr>
    <th>Name</th>
    <th>Roll</th>
    <th>Result</th>
  </tr>
  <tr>
    <td id="name1"></td>
    <td id="roll1"></td>
    <td id="result1"></td>
  </tr>
  <tr>
  </tr>
</table> 
</div>
</div>
<script>

	function studentDisplay(){
    
    var temp_name=$("#inputStudent1 option:selected").attr('data-name');
    var temp_roll=$("#inputStudent1 option:selected").attr('data-roll');
    var temp_result=$("#inputStudent1 option:selected").attr('data-result');

    document.getElementById('name1').innerHTML=temp_name;
    document.getElementById('roll1').innerHTML=temp_roll;
    document.getElementById('result1').innerHTML=temp_result;
	}

    function studentFinder() {

      
        var search_text=document.getElementById("search_text").value;
    	document.getElementById('name1').innerHTML='';
    	document.getElementById('roll1').innerHTML='';
    	document.getElementById('result1').innerHTML='';
      
        $.ajax({
            method: 'post',
            url: "{!!route('liveStudentSearch')!!}",
            data: {
              "_token": "{{ csrf_token() }}",
                "search_text":search_text
            },
            complete: function (result) {
            console.log(result.responseJSON.results);
            var new_list=result.responseJSON.results;
            var selectElement = document.getElementById('inputStudent1');
            selectElement.innerHTML = '';

            var temp;
            for(i = 0; i < new_list.length; i++)
            {
              if(i==0){
              $('#inputStudent1').append('<option value="'+new_list[i].id+'" data-name="'+new_list[i].name+'" data-roll="'+new_list[i].roll+'" data-result="'+new_list[i].result+'" data-mobile="'+new_list[i].mobile+'">'+new_list[i].name+' '+new_list[i].roll+'</option>');
    		  document.getElementById('name1').innerHTML=new_list[i].name;
    		  document.getElementById('roll1').innerHTML=new_list[i].roll;
    		  document.getElementById('result1').innerHTML=new_list[i].result;
          	  }
              else
              $('#inputStudent1').append('<option value="'+new_list[i].id+'" data-name="'+new_list[i].name+'" data-roll="'+new_list[i].roll+'" data-result="'+new_list[i].result+'" data-mobile="'+new_list[i].mobile+'">'+new_list[i].name+' '+new_list[i].roll+'</option>');             
            }
              
            }
        })
    }//end of studentFinder()
</script>
@endsection