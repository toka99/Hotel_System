
<a href="{{route('adminreservationclients.edit',['reservation'=>$id])}}" class="edit btn btn-success btn-sm">Edit</a> 
<form method="POST" action="{{route('adminreservationclients.destroy',['reservation'=>$id])}}" >
@csrf 
@method('DELETE')
<input type="submit" class="delete btn btn-danger btn-sm"value="Delete" onclick="return confirm('Are you sure you want to delete this Reservation ?')">
</form>