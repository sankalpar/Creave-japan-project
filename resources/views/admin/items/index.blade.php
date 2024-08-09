@extends('admin.admin-layout')
@section('content')
<!-- Content Header (Page header) -->
<style>
   .editicon, .deleteicon, .addicon {
   font-size: 2em; /* Adjust this value to set the desired size */
   }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@if(session()->has('success'))
<div class="alert alert-dismissable alert-success text-center">
    {{ session('success') }}

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-dismissable alert-danger text-center">
    {{session()->get('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="content-wrapper">
   <section class="content-header">
      <div class="">
         <div class="row mb-2 mx-0">
            <div class="col-sm-6">
               <h1>Items Management</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <!-- <li class="breadcrumb-item"><a href="/admin-area">Home</a></li> -->
                  <li class="breadcrumb-item"><a href="#">Pages</a></li>
                  <li class="breadcrumb-item active">Items Management</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="">
         <div class="row mx-0">
            <div class="col-12">
               <!-- Default box -->
               <div class="card">
                  <div class="card-header px-4 pb-0 pt-4">
                     <h3 class="card-title mb-0">Items Details</h3>
                     <br> <br>
                  </div>
                  <div class="card-body p-4">
                     <div class="table-responsive">
                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                           <div class="dataTable-container px-0">
                              <table id="customertbl" class="table table-flush dataTable-table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th style="width: 8%">#</th>
                                                <th style="width: 20%">Name</th>
                                                <th style="width: 20%">Price</th>
                                                <th style="width: 20%">Discount</th>
                                                <th style="width: 20%">Quantity</th>
                                                <th class="text-center" style="width: 8%">Action </th>
                                            </tr>
                                        </thead>
                                        <tbody class="customerTblBody">
                                            @foreach($items as $item)
                                            <tr>
                                                <td class="text-xs"><span>{{$item->id}}</span></td>
                                                <td class="text-xs"><span>{{$item->name}}</span></td>
                                                <td class="text-xs"><span>{{$item->price}}</span></td>
                                                <td class="text-xs"><span>{{$item->discount}}</span></td>
                                                <td class="text-xs"><span>{{$item->quantity}}</span></td>                                              
                                                <td class="text-xs action-btn text-center p-2">
                                                   <span class="mr-3">
                                                   <a title="Edit" href="#"><i class="fa fa-edit editicon"></i></a>
                                                   </span> 
                                                   <span>
                                                   <a title="Delete" href="#"><i title="Delete" class="fa fa-trash text-danger deleteicon"></i></a>
                                                   </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                              </table>
                              <div> {{$items->links()}} </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.card -->
         </div>
      </div>
   </section>
   <!-- /.content -->
</div>
<!-- /.content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection