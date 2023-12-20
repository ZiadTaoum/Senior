<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


@if (session()->has('success'))
    <div class="alert alert-success" id="thealert">
        <strong>{{session()->has('success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="$('#thealert').close()">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger" id="thealert">
        <strong>{{session()->has('error')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="$('#thealert').close()">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
