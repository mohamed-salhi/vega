@extends('dash.master')
@section('subtitle' , 'Categories')
@section('title' , 'Vega | Categories')
@section('content')
{{--   <div class="modal fade" id="" tabindex="-1" aria-labelledby="examoleModalLabel" aria-hidden="true">--}}
{{--   <div class="modal">--}}
{{--       --}}
{{--   </div>--}}
{{--   </div>--}}
<div class="modal fade" id="categoryEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="categoryeditform">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button  type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
    @if (session('msg'))
        <div id="alert" class="alert alert-{{ session('type') }} mx-5 " role="alert">
            {{ session('msg') }}
        </div>
    @endif
    <div class=" d-flex justify-content-end mx-5">
        <a href="{{ route('category.create') }}" type="submit" class="btn btn-outline-success ml-5 w-25 mb-3">Add Category</a>
    </div>
  <div class="row">

      <table class="table mx-5">
          <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">update</th>
              <th scope="col">delete</th>
          </tr>
          </thead>
          <tbody>
          @foreach($category as $item)
          <tr id="sid{{$item->id}}">

                  <th scope="row">{{$loop->index+1}}</th>
                  <td id="tid{{$item->id}}" >{{$item->name}}</td>
                  <td><a href="{{route('category.edit',$item->id)}}" class="btn  btn-primary">edit</a></td>
                  <td><a href="javascript:void(0)" onclick="deleteCategory({{ $item->id }})" class="btn btn-danger">delete</a></td>


          </tr>
          @endforeach
          </tbody>
      </table>

  </div>
  <div class=" d-flex justify-content-center mt-3">
      {{ $category->links() }}
  </div>
@stop
@section('js')
    <script>
        $(".alert").fadeTo(2000, 500).slideUp(500, function() {
            $(".alert").slideUp(500);
        });
    </script>
    <script>

       function deleteCategory(id)
       {
          if (confirm('Do you realy want to delete '))
          {

              $.ajax(
                  {
                      url: '/Dashboard/category/'+id ,
                      type: 'delete' ,
                      data:{
                          _token: $("input[name=_token]").val()
                      },
                      success:function (response)
                      {
                          $("#sid"+id).remove();
                      }
                  });

          }
       }
    </script>
  <script>
      function editcategory(id){
          $.get('/getcategory/'+id , function (category){
             $('#id').val(category.id);
              $('#name').val(category.name);
              $('#categoryEditModal').modal('toggle');

          });
      }

      $('#categoryeditform').submit(function(e){
          e.preventDefault();
          let id = $("#id").val();
          let name = $("#name").val();
          let _token = $("input[name=_token]").val();

          $.ajax({
              url: "/Dashboard/category/" + id,
              type: "put" ,
              data:{
                  id:id ,
                  name:name ,
                  _token: _token
              },
              success:function(response){
                  $('#tid'+ response.id ).text(response.name);
                  $("#categoryEditModal").modal('toggle');
                  $("#categoryeditform").reset();
              }
          });
      });
  </script>

@stop
