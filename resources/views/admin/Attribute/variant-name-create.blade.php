@extends('admin.master_layout')
@section('title')
<title>Product Variant Name Add</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Product Variant</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">Add Product Variant Here</div>
            </div>
          </div>

          <section class="section-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
               </button>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{__('admin.Name')}}</th>
                                        

                                        <th>{{__('admin.Action')}}</th>
                                      </tr>
                                </thead>
                                <tbody>
                                    @foreach ($variant_name as $index => $item)
                                        <tr>

                                            <td>{{ $item->name }}</td>
                                            


                                            <td>
                                           
                                                <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $item->id }})"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                          
                                            </td>

                                        </tr>
                                      @endforeach
                                </tbody>
                            </table>
                          </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
    </section>
</div>

<div class="modal fade" id="canNotDeleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                      <div class="modal-body">
                          {{__('admin.You can not delete this Variation Name. Because there are one or products has been created in this Variation.')}}
                      </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('admin.Close')}}</button>
                </div>
            </div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title"> Insert Variation Name </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">

                    <form action="{{ route('admin.store.product_variant_name') }}" method="POST">
                        @csrf

                        <div class="form-group">

                              <input type="text" name="name" placeholder="Insert Variation Name" class="form-control">
                              
                        </div>

                        <button class="btn btn-primary" type="submit">{{__('admin.Save')}}</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
  </div>

<script>
function deleteData(id){
    $("#deleteForm").attr("action",'{{ url("admin/destroy-variation/") }}'+"/"+id)
}
</script>
@endsection