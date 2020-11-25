<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>
    
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@if (session('error_acesso'))
<script>
    $( document ).ready(function() {
        $('#modalServices').modal('show');
    });
</script>
@endif

@if (session('error_cracha'))
    <script>
        $( document ).ready(function() {
            $('#modalCracha').modal('show');
        });
    </script>
@endif
<script type="text/javascript">
 // add row
 var i=1;
 $("#addRow").click(function () {
    i++;
    
    var html = '';
    html += '<div id="inputFormRow">';
    html += '<div class="form-row align-items-center">';           
    html += '<div class="col-sm-4 my-1">';
    html += '<label class="sr-only" for="inlineFormInputName">Name</label>';
    html += '<input type="text" name="pessoas[pessoa'+ i +'][nome]" class="form-control" placeholder="Nome">';
    html += '</div>';
    html += '<div class="col-sm-4 my-1">';
    html += '<label class="sr-only" for="inlineFormInputName">Name</label>';
    html += '<input type="text" name="pessoas[pessoa'+ i +'][cpf]" id="cpfs" class="form-control cpfs" placeholder="CPF">';
    html += '</div>';
    html += '<div class="input-group-append">';             
    html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
    html += '</div>';
    html += '</div>';
    html += '</div>';

    $('#newRow').append(html);
    $('.cpfs').mask('000.000.000-00');

});

// remove row
$(document).on('click', '#removeRow', function () {
    $(this).closest('#inputFormRow').remove();
});



</script>
<script>
    $(document).ready(function() {
        $('.cpfs').mask('000.000.000-00');
        
    });
</script>

</html>