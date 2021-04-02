
<!-- <form method="GET" action="{{route('clientreservation.edit',['room'=>$id])}}" >
@csrf 

<input type="submit" class="delete btn btn-danger btn-sm"value="Make Reservation" >
</form> -->

<a href="{{route('clientreservation.edit',['room'=>$id])}}" class="edit btn btn-success btn-sm">Make Reservation</a> 