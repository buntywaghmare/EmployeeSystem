@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 successmessage d-none">
            <div class="alert alert-success">
                <div id="message"></div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        
                        <div class="col-md-10">
                            <h3>{{ __('Employee') }}</h3>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modelId">Add Employee</button>
                        </div>
                    </div>                    
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse table-responsive" id="employeetable">
                        <thead class="thead-inverse|thead-default">
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>salary</th>
                                <th>Department</th>
                                <th>Hobbies</th>
                                <th>Gender</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                               @foreach ($employee as $row)
                                   <tr>
                                       <td>{{ $loop->index + 1 }}</td>
                                       <td>{{ $row->name }}</td>
                                       <td>{{ $row->salary }}</td>
                                       <td>{{ $row->department->name }}</td>
                                       <td>{{ $row->hobbies }}</td>
                                       <td>
                                           @if($row->gender == 'm')
                                           <span class="badge rounded-pill bg-primary">Male</span>
                                           @else
                                           <span class="badge rounded-pill bg-warning">Female</span>
                                           @endif
                                       </td>
                                       <td>
                                           <button type="button" class="btn btn-warning editbutton" data-id="{{ $row->id }}">Edit</button>
                                           <button type="button" class="btn btn-danger deletebutton" data-id="{{ $row->id }}">Delete</button>
                                       </td>
                                   </tr>
                               @endforeach
                            </tbody>
                    </table>
                    
                 </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" id="employeeForm" novalidate>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="validationCustom01" required>
                            <div class="invalid-feedback">
                              Please Enter Name.
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Salary</label>
                            <input type="number" name="salary" class="form-control" id="validationCustom01" required>
                            <div class="invalid-feedback">
                              Please Enter Salary Amount.
                            </div>
                        </div>


                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Department</label>
                            <select class="form-control" name="department" id="validationCustom01" required>
                                <option value="">Please Select Department</option>
                                @foreach ($department as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                              </select>
                            <div class="invalid-feedback">
                              Please Select Department.
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Hobbies</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" class="form-check-input hobbies" name="hobbies[]" value="Reading">Reading &nbsp;&nbsp;&nbsp;
                            <input type="checkbox" class="form-check-input hobbies" name="hobbies[]" value="Cricket">Cricket  &nbsp;&nbsp;&nbsp;
                            <input type="checkbox" class="form-check-input hobbies" name="hobbies[]" value="Surfing">Surfing &nbsp;&nbsp;&nbsp;
                            <input type="checkbox" class="form-check-input hobbies" name="hobbies[]" value="Swimming">Swimming &nbsp;&nbsp;&nbsp;
                            <input type="checkbox" class="form-check-input hobbies" name="hobbies[]" value="Watching movies">Watching movies &nbsp;&nbsp;&nbsp;
                            <label class="form-label text-danger error-checkbox"></label>
                            <label class="form-label text-success success-checkbox"></label>

                        </div>    
                        
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="m" id="male" checked>
                                <label class="form-check-label" for="male">
                                male
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="f" id="female">
                                <label class="form-check-label" for="female">
                                  female
                                </label>
                              </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" id="employeeEditForm" novalidate>
                        <div class="col-md-12">
                            <label for="editname" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="editname" required>
                            <div class="invalid-feedback">
                              Please Enter Name.
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="editsalary" class="form-label">Salary</label>
                            <input type="number" name="salary" class="form-control" id="editsalary" required>
                            <div class="invalid-feedback">
                              Please Enter Salary Amount.
                            </div>
                        </div>


                        <div class="col-md-12">
                            <label for="editdepartment" class="form-label">Department</label>
                            <select class="form-control" name="department" id="editdepartment" required>
                                <option value="">Please Select Department</option>
                                @foreach ($department as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                              </select>
                            <div class="invalid-feedback">
                              Please Select Department.
                            </div>
                        </div>

                        <div class="col-md-12"> 
                            <label for="edithobbies" class="form-label">Hobbies</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" class="form-check-input edithobbies" name="hobbies[]" id="Reading" value="Reading">Reading &nbsp;&nbsp;&nbsp;
                            <input type="checkbox" class="form-check-input edithobbies" name="hobbies[]" id="Cricket" value="Cricket">Cricket  &nbsp;&nbsp;&nbsp;
                            <input type="checkbox" class="form-check-input edithobbies" name="hobbies[]" id="Surfing" value="Surfing">Surfing &nbsp;&nbsp;&nbsp;
                            <input type="checkbox" class="form-check-input edithobbies" name="hobbies[]" id="Swimming" value="Swimming">Swimming &nbsp;&nbsp;&nbsp;
                            <input type="checkbox" class="form-check-input edithobbies" name="hobbies[]" id="Watching" value="Watching movies">Watching movies &nbsp;&nbsp;&nbsp;
                            <label class="form-label text-danger error-editcheckbox"></label>
                            <label class="form-label text-success success-editcheckbox"></label>
                        </div>    
                        <input type="hidden" name="id" id="editId">
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Gender</label> 
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="m" id="editmale" checked>
                                <label class="form-check-label" for="editmale">
                                male
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="f" id="editfemale">
                                <label class="form-check-label" for="editfemale">
                                  female
                                </label>
                              </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    

    
</div>
@endsection
@section('javascript')
    <script>
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            
            
            $('.hobbies').on('change',function(){
                var total = $('.hobbies:checked').length;
                if(total == 3){
                    $('.success-checkbox').html('Max Hobbies Selected');
                    $('.hobbies').attr("disabled", true);
                    $('.hobbies:checked').attr("disabled", false);
                }else{
                    $('.success-checkbox').html('');
                    $('.hobbies').attr("disabled", false);
                }

                $('.error-checkbox').html('');
            });

            $('.edithobbies').on('change',function(){
                var total = $('.edithobbies:checked').length;
                if(total == 3){
                    $('.success-editcheckbox').html('Max Hobbies Selected');
                    $('.edithobbies').attr("disabled", true);
                    $('.edithobbies:checked').attr("disabled", false);
                }else{
                    $('.success-editcheckbox').html('');
                    $('.edithobbies').attr("disabled", false);
                }
                $('.error-editcheckbox').html('');
            });
            
    
            $('.deletebutton').on('click',function(){
                var id = $(this).attr('data-id');
                
                let isdeleted =  confirm('Are You Want Delete This Record');
                if(isdeleted){
                    $.ajax({
                        type: "POST",
                        url: "{{ route('deleteemployee') }}",
                        data: {id:id},
                        dataType: "json",
                        encode: true,
                      }).done(function (data) {
                        //
                            $('.successmessage').removeClass('d-none');
                            $('#message').html('Deleted Successfully');
                            location.reload();
                            setTimeout(function(){
                                $('.successmessage').addClass('d-none'); 
                            }, 3000);
                            
                        //
                      });
                }else{
                    console.log('cancel');
                }
            });

            $('.editbutton').on('click',function(){
                var id = $(this).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "{{ route('getemployeedetail') }}",
                    data: {id:id},
                    dataType: "json",
                    encode: true,
                  }).done(function (data) {
                    //
                    var array = data.hobbies.split(',');
                    $('input:checkbox').prop('checked', false);
                    $.each(array, function (i) {
                        if(array[i] === 'Watching movies'){
                            $('#Watching').prop('checked',true);
                        }
                        $('#'+array[i]+'').prop('checked',true);
                    });
                    
                    $('#editModal').modal('show');
                    $('#editname').val(data.name);
                    $('#editsalary').val(data.salary);
                    $('#editdepartment').val(data.dept_id);
                    $('#editdepartment').val(data.dept_id);
                    $('#editId').val(data.id);
                    //
                  }); 
            });
            
            $("#employeeForm").submit(function(e) {
                e.preventDefault(); 
                if ($('.hobbies').filter(':checked').length < 1){
                    $('.error-checkbox').html('Please Check Atleast One Hobbies');
                    return false;
                    }
                var formData = $(this).serialize();            
                $.ajax({
                    type: "POST",
                    url: "{{ route('insertemployee') }}",
                    data: formData,
                    dataType: "json",
                    encode: true,
                  }).done(function (data) {
                    //
                            $('#modelId').modal('hide');
                            $('.successmessage').removeClass('d-none');
                            $('#message').html('Employee Added Successfully');
                            location.reload();
                            setTimeout(function(){
                                $('.successmessage').addClass('d-none');
                            }, 3000);
                    //
                  });              
            });

            
            $("#employeeEditForm").submit(function(e) {
                e.preventDefault(); 
                if ($('.edithobbies').filter(':checked').length < 1){
                    $('.error-editcheckbox').html('Please Check Atleast One Hobbies');
                    return false;
                    }
                var formData = $(this).serialize();            
                $.ajax({
                    type: "POST",
                    url: "{{ route('editemployee') }}",
                    data: formData,
                    dataType: "json",
                    encode: true,
                  }).done(function (data) {
                    //
                            $('#modelId').modal('hide');
                            $('.successmessage').removeClass('d-none');
                            $('#message').html('Employee Updated Successfully');
                            location.reload();
                            setTimeout(function(){
                                $('.successmessage').addClass('d-none');
                            }, 3000);
                    //
                  });              
            });
        });
    </script>
@endsection