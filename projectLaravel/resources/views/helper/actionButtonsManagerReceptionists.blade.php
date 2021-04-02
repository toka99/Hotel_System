
<a href="{{route('managerreceptionists.editmanager',['receptionist'=>$id])}}" class="edit btn btn-success btn-sm">Edit</a> 
<form method="POST" action="{{route('managerreceptionists.destroymanager',['receptionist'=>$id])}}" >
@csrf 
@method('DELETE')
<input type="submit" class="delete btn btn-danger btn-sm"value="Delete" onclick="return confirm('Are you sure you want to delete this receptionist ?')" >
</form>

