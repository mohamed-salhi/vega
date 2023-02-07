@extends('dash.master')
@section('subtitle' , 'Product')
@section('title' , 'Project | Vega')
@section('content')
    <div class="modal fade" id="projectEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="projecteditform" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="descripction">descripction</label>
                            <input type="text" name="desc" class="form-control" id="desc">
                        </div>
                        <div class="form-group">
                            <label for="video">Vidoe</label>
                            <input type="text" name="video" class="form-control" id="video">
                        </div>
                        <div class="form-group">
                            <label for="image">image</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div><div class="form-group">
                            <label for="name">Alpum</label>
                            <input type="file" name="alpum[]" multiple class="form-control" id="alpum">
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
        <div class="alert alert-{{ session('type') }} mx-5 " role="alert">
            {{ session('msg') }}
        </div>
    @endif

    <div class=" d-flex justify-content-end mx-5">
        <a href="{{ route('project.create') }}" type="submit" class="btn btn-outline-success ml-5 w-25 mb-3">Add Project</a>
    </div>
  <div class="row">


      <table class="table mx-5 ">
          <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">desc</th>
              <th scope="col">Category</th>
              <th scope="col">image</th>
              <th scope="col">video</th>
              <th scope="col">alpum</th>
              <th scope="col">update</th>
              <th scope="col">delete</th>
          </tr>
          </thead>
          <tbody>
          @foreach($pro as $item)
          <tr id="pid{{$item->id}}">

              <th scope="row">{{$loop->index+1}}</th>
              <td id="nameid">{{$item->name}}</td>
              <td id="descid">{{ Str::words($item->desc, 5, ' ...') }}</td>
              <td id="descid">{{$item->category->name}}</td>
              <td id="imageid"><img width="70px" src="{{ asset('upload/images/' . $item->image) }}"></td>
              <td id="videoid"><a class="btn btn-secondary " href="{{ $item->video }}" target="_blank">video</a></td>
              <td id="alpumid"><a class="btn btn-success " href="{{ route('alpumView' , $item->id) }}">alpum</a></td>

                  <td><a href="{{ route('project.edit' , $item->id) }}" class="btn btn-primary ">edit</a></td>
                  <td><a href="javascript:void(0)" onclick="deleteproject({{ $item->id }})" class="btn btn-danger ">delete</a> </td>


          </tr>
          @endforeach
          </tbody>
      </table>

  </div>
    <div class=" d-flex justify-content-center mt-3">
        {{ $pro->links() }}
    </div>


@stop
@section('js')
    <script>
        $(".alert").fadeTo(2000, 500).slideUp(500, function() {
            $(".alert").slideUp(500);
        });
    </script>
    <script>
        function deleteproject(id){
             if(confirm('Do you realy want to delete this record ??')){
                  $.ajax({
                      url:'/Dashboard/project/'+id ,
                      type: 'delete' ,
                      data:{
                        _token: $("input[name=_token]").val()
                      },
                      success:function (response)
                      {
                          $('#pid'+id).remove();
                      }
                  })
             }
        }
    </script>

{{--    <script>--}}
{{--       function editproject(id){--}}
{{--           $.get('/getproject/' + id , function(project){--}}
{{--                $("#id").val(project.id);--}}
{{--               $("#name").val(project.name);--}}
{{--                $("#desc").val(project.desc);--}}
{{--               $("#video").val(project.video);--}}

{{--               $('#projectEditModal').modal('toggle');--}}
{{--           });--}}
{{--       }--}}
{{--    $('#projecteditform').submit(function (e){--}}
{{--        e.preventDefault();--}}
{{--        let id = $("#id").val();--}}
{{--        let name = $("#name").val();--}}
{{--        let desc = $("#desc").val();--}}
{{--        let video = $("#video").val();--}}
{{--        let image = $("#image").val();--}}
{{--        let alpum = $("#alpum").val();--}}
{{--        let _token = $("input[name=_token]").val();--}}
{{--           $.ajax({--}}
{{--              url: "/Dashboard/project/" + id ,--}}
{{--               type: 'put' ,--}}
{{--               data:{--}}
{{--                   id:id ,--}}
{{--                   name:name ,--}}
{{--                   desc:desc ,--}}
{{--                   video:video ,--}}
{{--                   image:image,--}}
{{--                   alpum:alpum ,--}}
{{--                   _token:_token--}}
{{--               },--}}
{{--               success:function (response){--}}
{{--                   $('#nameid'+ response.id ).text(response.name);--}}
{{--                   $('#descid'+ response.id ).text(response.desc);--}}
{{--                   $('#imageid'+ response.id ).text(response.image);--}}
{{--                   $('#videoid'+ response.id ).text(response.video);--}}
{{--                   $('#alpumid'+ response.id ).text(response.alpum);--}}
{{--                   $("#projectEditModal").modal('toggle');--}}
{{--                   $("#projecteditform").reset();--}}
{{--               },--}}
{{--           });--}}
{{--    })--}}


{{--    </script>--}}
@stop
