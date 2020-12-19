<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<center>
    <form class="form-group container" action="/update/{{$data->id}}" method="post">
    @csrf
   @method('PUT')
  <div class="form-group">
      <label for="name">Name</label>
   <input id="name" type="text" name="name" placeholder="name" class="form-control mb-3" value= {{$data->name}}>
  </div>
  <div class="form-group mt-3" >
    <label for="price">Price</label>

    <input  id="price" type="text" name="price" placeholder="price" class="form-control mb-3" value= {{$data->price}}>
   
  </div>
  <button type="submit" class="form-control btn-success">click to save</button>
    </form>

</center>