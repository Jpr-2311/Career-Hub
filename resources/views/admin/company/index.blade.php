
@include('admin.partials.header')
@include('admin.partials.navbar')
@include('admin.partials.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List of All company Posts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Company Posts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
            @if(count($errors) > 0)
     <div class="alert">
      <ul>
      @foreach($errors->all() as $error)
       <li style="list-style:none"><i class="fas fa-exclamation-circle"></i>{{$error}}</li>
       @endforeach
   </ul>
     </div>
     @endif
     @if(\Session::has('success'))
     <div class="alert alert-light">
      <p class="text-success">{{ \Session::get('success') }}</p>
     </div>
     @endif
              <div class="card-header">
                <!-- <h3 class="card-title">Fixed Header Table</h3> -->
                <a class="btn btn-primary" href="{{route('create-company')}}">
                        Register New Company</a>
                    
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User Name</th>
                      <th>Company Title</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Reason</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($companies as $company)
                      

                    <tr>
                      <td>{{$company->id}}</td>
                      @foreach($user as $companyUser)
                      @if($company->user_id == $companyUser->id)
                      <td>{{$companyUser->name}}</td>
                      @endif
                      @endforeach
                      <td>{{$company->title}}</td>
                      <td>{{$company->created_at}}</td>
                      @if($company->status === 'Active' || $company->status === 'Retrieved' )
                      <td><span class="tag text-success">{{$company->status}}</span></td>
                      @elseif($company->status === 'Archived')
                      <td><span class="tag text-secondary">{{$company->status}}</span></td>
                      @elseif($company->status === 'Rejected')
                      <td><span class="tag text-danger">{{$company->status}}</span></td>
                      @elseif($company->status === 'Pending')
                      <td><span class="tag text-primary">{{$company->status}}</span></td>
                      @endif
                      <td>{{$company->reason}}</td>
                      <td><a class="btn btn-primary btn-xs btn-inline" href="{{route('adcompanies.show',$company->id)}}">View company</a>
                      <form class="d-inline-block" method="POST" action="{{action('CompanyController@update', $company->id)}}">
					@csrf
					@method('patch')
                    <input type="hidden" name="status" value="Active">
                    <input type="hidden" name="reason" value="None">
                    <input type="hidden" name="title" value="{{$company->title}}">
                    <input type="hidden" name="about" value="{{$company->about}}">
                    <input type="hidden" name="contact_number" value="{{$company->contact_number}}">
                    <input type="hidden" name="email" value="{{$company->email}}">
                    <input type="hidden" name="address" value="{{$company->address}}">
                    <button type="submit" class="btn btn-success btn-xs btn-inline">Approve</button>
                    </form>
                    <form class="d-inline-block" method="POST" action="{{action('CompanyController@update', $company->id)}}">
					@csrf
					@method('patch')
                    <input type="hidden" name="status" value="Archived">
                    <input type="hidden" name="reason" value="{{$company->reason}}">
                    <input type="hidden" name="title" value="{{$company->title}}">
                    <input type="hidden" name="about" value="{{$company->about}}">
                    <input type="hidden" name="contact_number" value="{{$company->contact_number}}">
                    <input type="hidden" name="email" value="{{$company->email}}">
                    <input type="hidden" name="address" value="{{$company->address}}">
                    <button type="submit" class="btn btn-secondary btn-xs btn-inline">Archive</button>
                  </form>
                      <button type="button" class="btn btn-danger btn-xs btn-inline" data-toggle="modal" data-target="#modal-info{{$company->id}}">Decline</button></td>
                  </tr>
                          <!-- /.modal -->

      <div class="modal fade" id="modal-info{{$company->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
         
            <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            <!-- Form for status setting-->
                     <form class="d-inline-block" method="POST" action="{{action('CompanyController@update', $company->id)}}">
					@csrf
					@method('patch')
                    <input type="hidden" name="status" value="Rejected">
                    <input type="hidden" name="title" value="{{$company->title}}">
                    <input type="hidden" name="about" value="{{$company->about}}">
                    <input type="hidden" name="contact_number" value="{{$company->contact_number}}">
                    <input type="hidden" name="email" value="{{$company->email}}">
                    <input type="hidden" name="address" value="{{$company->address}}">
                    <label>What is the reason for declining request?</label> 
                    <input type="text" name="reason" class="form-control"> 
            </div>
            <div class="modal-footer justify-content-between">
              <!-- <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button> -->
              <button type="submit" class="btn btn-light btn-sm">Decline Post</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
                    @endforeach
                   </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
    
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0-rc
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{URL('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{URL('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="((URL('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
</body>
</html>
