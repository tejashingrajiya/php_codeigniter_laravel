<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta  name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
          <button type="button" class="btn btn-primary" id="add_nurse">  Add Nurse </button>
          <table class="table table-bordered">
              <thead>
                  <th>Sr.no</th>
                  <th>Name</th>
                  <th>created_at</th>
                  <th>updated_at</th>
                  <th>Action</th>
              </thead>
              <tbody id="list_nurse">
                  @foreach($nurses as $nurse)
                    <tr id="row_nurse_{{ $nurse->id}}">
                        <td>{{ $nurse->id}}</td>
                        <td>{{ $nurse->nurse_name}}</td>
                        <td>{{ $nurse->created_at}}</td>
                        <td>{{ $nurse->updated_at}}</td>
                        <td>
                            <button type="button" id="edit_nurse" data-id="{{ $nurse->id }}" class="btn btn-sm btn-info ml-1">Edit</button>

                            <button type="button" id="delete_nurse" data-id="{{ $nurse->id }}" class="btn btn-sm btn-danger ml-1">Delete</button>
                        </td>
                    </tr>
                  @endforeach
              </tbody>
          </table>

          <!-- The Modal -->
          <div class="modal" id="modal_nurse">
            <div class="modal-dialog">
              <div class="modal-content">
                <form id="form_nurse">
                    <div class="modal-header">
                      <h4 class="modal-title" id="modal_title"></h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <input type="hidden" name="id" id="id">
                      <input type="text" name="nurse_name" id="nurse_name" class="form-control" placeholder="Enter nurse name...">
                    </div>
					<div id="error" >
					</div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-info">Submit</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
                
              </div>
            </div>
          </div>
          
        </div>

        <script type="text/javascript">

            $(document).ready(function(){
                $.ajaxSetup({
                    headers:{
                        'x-csrf-token' : $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });



            $("#add_nurse").on('click',function(){
                $("#form_nurse").trigger('reset');
                $("#modal_title").html('Add nurse');
                $("#modal_nurse").modal('show');
            });

            $("body").on('click','#edit_nurse',function(){
                var id = $(this).data('id');
                $.get('nurse/'+id+'/edit',function(res){
                    $("#modal_title").html('Edit nurse');
                    $("#id").val(res.id);
                    $("#nurse_name").val(res.nurse_name);
                    $("#modal_nurse").modal('show');
                });
            });

            // Delete Todo 
            $("body").on('click','#delete_nurse',function(){
                var id = $(this).data('id');
                confirm('Are you sure want to delete !');

                $.ajax({
                    type:'DELETE',
                    url: "{{ url('nurse')}}"+'/'+id,
                }).done(function(res){
                    $("#row_nurse_" + id).remove();
                });
            });
			
            //save data 
            
            $("form").on('submit',function(e){
                e.preventDefault();
				var error = $("#nurse_name").val();
				
				if(error == "")
				{
					$("#error").html("nurse name required");
				}else{
                $.ajax({
					url: "{{route('nurse.store')}}",
                    //url:"/store",
                    data: $("#form_nurse").serialize(),
                    type:'POST'
                }).done(function(res){
                    var row = '<tr id="row_nurse_'+ res.id + '">';
                    row += '<td>' + res.id + '</td>';
                    row += '<td>' + res.nurse_name + '</td>';
                    row += '<td>' + res.created_at + '</td>';
                    row += '<td>' + res.updated_at + '</td>';
                    row += '<td>' + '<button type="button" id="edit_nurse" data-id="' + res.id +'" class="btn btn-info btn-sm mr-1">Edit</button>' + '<button type="button" id="delete_nurse" data-id="' + res.id +'" class="btn btn-danger btn-sm">Delete</button>' + '</td>';

                    if($("#id").val()){
                        $("#row_nurse_" + res.id).replaceWith(row);
                    }else{
                        $("#list_nurse").prepend(row);
                    }

                    $("#form_nurse").trigger('reset');
                    $("#modal_nurse").modal('hide');

                });
				}
            });



        </script>
    </body>
</html>