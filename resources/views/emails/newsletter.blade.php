<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NEWS</title>
</head>
<body>
    <h3>Hey</h3>
    <h5>there are a lot of new product since you visited our shop</h5>

    <table class="table table-dark table-striped">
        <thead>
          <tr>
           
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $pro)
               <tr>

                    <td>{{ $pro->name }}</td>
                    <td>${{ $pro->price }}</td>
                    <td>{{ $pro->description }}</td>
                    
                </tr> 
            @endforeach
          
        </tbody>
      </table>
</body>
</html>