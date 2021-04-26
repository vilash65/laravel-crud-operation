@extends('admin.main')
@section('title', 'User Create')
@section('content')

<div class="content-wrapper">


       
 
    <!-- Main content -->
    <section class="content">
      @include('admin.partials.validate')


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Developer</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
        <form action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('POST')}}
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">First_Name</label>
                  <input type="name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Last_Name</label>
                  <input type="name" name="lname" class="form-control" id="exampleInputEmail1" placeholder="EnterLast  Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">phone</label>
                  <input type="number" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter phone number">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">address</label>
                  <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter Address">
                </div>
                <div class="form-group">
                  <label for="image">image</label>
                  <input type="file" name="image" id="image"/>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">RePassword</label>
                  <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Create</button>
              </div>
            </form>

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

@endsection