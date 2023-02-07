@extends('dash.master')
@section('subtitle' , 'Contact')
@section('title' , 'Contact | Vega')
@section('content')

    <table class="table mx-5 ">
        <div id="alreat">

        </div>
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Eail</th>
            <th scope="col">Message</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contact as $item)
            <tr id="pid{{$item->id}}">
                <th scope="row">{{$loop->index+1}}</th>
                <td id="nameid">{{$item->name}}</td>
                <td id="nameid">{{$item->email}}</td>
                <td id="nameid">{{$item->message}}</td>
                <td><button
                        id="bb"
                        data-action="{{route('contact.destroy',$item->id)}}"
                        onclick="Delete({{$item->id}})"
                        class="btn btn-danger">Delete</button></td>
            </tr>




        @endforeach
        </tbody>
    </table>

    </div>
    <div class=" d-flex justify-content-center mt-3">
        {{ $contact->links() }}
    </div>


@stop
<script>


    function Delete(id) {
        if (confirm('Do you realy want to delete '))
        {
        var url = $('#bb').attr('data-action');
        $.ajax({
                type : 'delete',
                url  : url,
                data : {
                    _token:'{{csrf_token()}}',
                },
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        $('#alreat').text('sent succesfully').removeClass('alert alert-danger').addClass('alert alert-success');
                        $('#pid'+id).remove();
                        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
                            $(".alert").slideUp(500);
                        });
                    }else{
                        $('#alreat').val('');
                        $('#alreat').text(data.error.errorInfo).removeClass('alert alert-success').addClass('alert alert-danger');

                        $("#alreat").fadeTo(2000, 500).slideUp(500, function(){
                            $("#alreat").slideUp(500);
                        });}

                },
                error: function (data) {
                    console.log('error:', data);
                }
            }

        )
        }}


</script>
