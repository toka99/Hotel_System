
<form method="POST" action="{{route('receptionist.approve',['client'=>$id])}}" >
@csrf 
<input type="submit" class="btn btn-success" value="Approve">
</form>

<form method="POST" action="{{route('receptionist.decline',['client'=>$id])}}" >
@csrf 
<input type="submit" class="btn btn-danger btn-sm" value="Decline">
</form>


