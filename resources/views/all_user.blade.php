@extends('welcome')
@section('content')

<!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All User</h6>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
					  Add User
					</button>
                  
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Id</th>
                        <th>User Type</th>
                        <th>User Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Password</th>
                        {{-- <th>Action</th> --}}
                        
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>User Type</th>
                        <th>User Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Password</th>
                        {{-- <th>Action</th> --}}
                        
                      </tr>
                    </tfoot>
                    
                    <tbody>
                      @foreach($all_user as $row)
                      <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->user_type }}</td>
                        <td>{{ $row->user_name }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->password }}</td>
                       
                        
                      </tr>
                      
                      @endforeach
                    </tbody>
                    
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->



          {{-- Add modal --}}

          <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 50%;">
    <div class="modal-content col-md-12">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ url('/insert-user') }}" method="post">
            @csrf
      <div class="modal-body">

        		<div class="row">

                        <div class="col-md-4"> 

                            <div class="form-group"> 
                                <label for="field-5" class="control-label"><b>User Type</b></label> 
                                <select class="form-control" name="user_type">
                                    <option disabled="" selected="">select type</option>
                                    
                                    <option value="admin">Admin</option>
                                    <option value="client">Client</option>
                                    <option value="staff">Staff</option>
                                    <option value="programmer">Programmer</option>
                                    
                                </select> 
                            </div> 
                        </div>

                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-4" class="control-label"><b>User Name</b></label> 
                                <input type="text" class="form-control" id="field-4" placeholder="User Name" name="user_name" required=""> 
                            </div> 
                        </div>

                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-4" class="control-label"><b>Phone</b></label> 
                                <input type="text" class="form-control" id="field-4" placeholder="phone" name="phone" required=""> 
                            </div> 
                        </div> 

                    </div>

                    <div class="row">

                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-4" class="control-label"><b>Email</b></label> 
                                <input type="email" class="form-control" id="field-4" placeholder="email" name="email" required=""> 
                            </div> 
                        </div>

                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="field-4" class="control-label"><b>Password</b></label> 
                                <input type="text" class="form-control" id="field-4" placeholder="password" name="password" required=""> 
                            </div> 
                        </div> 

                    </div>

        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>

      </form>

    </div>
  </div>
</div>



@endsection