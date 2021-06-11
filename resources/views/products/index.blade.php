<!doctype html>
<html lang="en">
  <head>
    <title>products</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <a href="{{route('products.create')}}" class="btn btn-success">send</a><br/>
  <table class="table">
      <thead>
        <th>id</th>
        <th>name</th>
        <th>suppler company</th>
        <th>count</th>
        <th>cost</th>
        <th>description</th>
        <th colspan="3">options</th>
      </thead>
      <tbody>
      @foreach ($products as $product)
          <tr>
              <td>{{$product->id}}</td>
              <td>{{$product->name}}</td>
              <td>{{$product->suppler_company}}</td>
              <td>{{$product->count}}</td>
              <td>{{$product->cost}}</td>

              <td><a href="{{route('products.show',$product->id)}}" class="btn btn-success">details</a> </td>
              <td><a href="/products/{{$product->id}}/edit" class="btn btn-success">edit</a> </td>

              <td><form method="post" action="{{route('products.destroy', $product->id)}}">
                      @csrf
                      @method('delete')
                      <input type="submit" class="btn btn-danger" value="delete">
                  </form> </td>

          </tr>
      @endforeach
      </tbody>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
