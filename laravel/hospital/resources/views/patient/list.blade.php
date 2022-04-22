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
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					@if (Session::get('success'))
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
						<h3 class="text-success"><i class="fa fa-check-circle"> </i> Success</h3>
						{{ Session::get('success') }}						
					</div>
					@endif
					<div class="card card-body" id="form">
						<form id="patient_form" class="form-horizontal mt-4" action="" method="POST" enctype="multipart/form-data">
							<div>
								<input type="hidden" name="id" id="id">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="box-body">
										<div class="form-group">
											<label>Title<span class="text-red">*</span></label>
											<select class="form-control input" name="title" id="title" value="{{ old('title') }}">
												<option value="">-Select-</option>
												<option value="mr.">Mr.</option>
												<option value="ms.">Ms.</option>
												<option value="dr.">Dr.</option>
											</select>
											@if ($errors->has('title'))
											<span class="validation">
												{{ $errors->first('title') }}
											</span>
											@endif
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="box-body">
										<div class="form-group">
											<label>First Name <span class="text-red">*</span></label>
											<input type="text" class="form-control input" name="patient_name" id="patient_name" value="{{ old('patient_name') }}">
											@if ($errors->has('patient_name'))
											<span class="validation">
												{{ $errors->first('patient_name') }}
											</span>
											@endif
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="box-body">
										<div class="form-group">
											<label>Email <span class="text-red">*</span></label>
											<input type="email" class="form-control input" name="patient_email" id="patient_email" value="{{ old('email') }}" >
											@if ($errors->has('email'))
											<span class="validation">
												{{ $errors->first('email') }}
											</span>
											@endif
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="box-body">
										<div class="form-group">
											<label>Mobile Number <span class="text-red">*</span></label>
											<input type="text" class="form-control input" name="patient_phone" id="patient_phone" value="{{ old('patient_phone') }}" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
											@if ($errors->has('patient_phone'))
											<span class="validation">
												{{ $errors->first('patient_phone') }}
											</span>
											@endif
										</div>
									</div>
								</div>
							</div>
							<button type="button" class="btn btn-danger">Cancel</button>
							<button type="submit"  id="btn-save" value="add" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<table class="table table-bordered">
			<thead>
				<th>Sr.no</th>
				<th>title</th>
				<th>name</th>
				<th>email</th>
				<th>phone</th>
				<th>Action</th>
			</thead>
			<tbody id="patient_table">
				@foreach($patients as $patient)
              <tr id="patient_data_row_{{ $patient->id }}">
                 <td>{{ $patient->id  }}</td>
                 <td>{{ $patient->title }}</td>
                 <td>{{ $patient->patient_name }}</td>
                 <td>{{ $patient->patient_email }}</td>
                 <td>{{ $patient->patient_phone }}</td>
                 <td>
                            <button type="button" id="edit_patient" data-id="{{ $patient->id }}" class="btn btn-sm btn-info ml-1">Edit</button>

                            <button type="button" id="delete_patient" data-id="{{ $patient->id }}" class="btn btn-sm btn-danger ml-1">Delete</button>
                        </td>
              </tr>
              @endforeach
			</tbody>
		</table>
		
		
		<script type="text/javascript">
			$(document).ready(function(){
				$.ajaxSetup({
					headers:{
						'x-csrf-token' : $('meta[name="csrf-token"]').attr('content')
					}
				});
			});
			
			
			//save data 
			$('#patient_form').on('submit',function(event){
				event.preventDefault();
				// Get Alll Text Box Id's
				id = $('#id').val();
				title = $('#title').val();
				patient_name = $('#patient_name').val();
				patient_email = $('#patient_email').val();
				patient_phone = $('#patient_phone').val();
				
				$.ajax({
					url: "{{route('patient.store')}}",
					type:"POST",
					data:{
						"_token": "{{ csrf_token() }}",
						id:id,
						title:title,
						patient_name:patient_name,
						patient_email:patient_email,
						patient_phone:patient_phone,
					},
				}).done(function(res){
                    var row = '<tr id="patient_data_row_'+ res.id + '">';
                    row += '<td>' + res.id + '</td>';
                    row += '<td>' + res.title + '</td>';
                    row += '<td>' + res.patient_name + '</td>';
                    row += '<td>' + res.patient_email + '</td>';
                    row += '<td>' + res.patient_phone + '</td>';
                    row += '<td>' + '<button type="button" id="edit_patient" data-id="' + res.id +'" class="btn btn-info btn-sm mr-1">Edit</button>' + '<button type="button" id="delete_patient" data-id="' + res.id +'" class="btn btn-danger btn-sm">Delete</button>' + '</td>';

                    if($("#id").val()){
                        $("#patient_data_row_" + res.id).replaceWith(row);
                    }else{
                        $("#patient_table").prepend(row);
                    }

                    $("#patient_form").trigger('reset');
                    //$("#modal_nurse").modal('hide');

                });
			});
			/*edit*/
			$("body").on('click','#edit_patient',function(){
                var id = $(this).data('id');
				alert(id)
                $.get('patient/'+id+'/edit',function(res){
				//alert(id)
                    $("#id").val(res.id);
                    $("#title").val(res.title);
                    $("#patient_name").val(res.patient_name);
                    $("#patient_email").val(res.patient_email);
                    $("#patient_phone").val(res.patient_phone);
                });
            });
			
			// Delete Todo 
            $("body").on('click','#delete_patient',function(){
                var id = $(this).data('id');
                confirm('Are you sure want to delete !');
                $.ajax({
                    type:'DELETE',
                    url: "patient/" + id
                }).done(function(res){
                    $("#patient_data_row_" + id).remove();
                });
            });
			
		</script>
	</body>
</html>
