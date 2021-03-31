
<a href="{{route('adminapproveclients.edit',['client'=>$id])}}" class="edit btn btn-success btn-sm">Edit</a> 
<form method="POST" action="{{route('adminapproveclients.destroy',['client'=>$id])}}" >
@csrf 
@method('DELETE')
<input type="submit" class="delete btn btn-danger btn-sm"value="Delete" onclick="return confirm('Are you sure you want to delete this client ?')">
</form>