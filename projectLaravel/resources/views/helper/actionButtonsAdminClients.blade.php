
<form method="POST" action="{{route('admin.approve',['client'=>$id])}}" >
@csrf 
<input type="submit" class="btn btn-success" value="Approve">
</form>

<form method="POST" action="{{route('admin.decline',['client'=>$id])}}" >
@csrf 
<input type="submit" class="btn btn-danger btn-sm" value="Decline">
</form>


