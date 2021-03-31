
<a href="{{route('adminreceptionists.edit',['receptionist'=>$id])}}" class="edit btn btn-success btn-sm">Edit</a> 
<form method="POST" action="{{route('adminreceptionists.destroy',['receptionist'=>$id])}}" >
@csrf 
@method('DELETE')
<input type="submit" class="delete btn btn-danger btn-sm"value="Delete" onclick="return confirm('Are you sure you want to delete this receptionist ?')" >
</form>

