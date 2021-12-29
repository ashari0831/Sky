@extends('master')
@section('content')

<table class="table">
  <tbody>
    <tr>
      <th scope="row">Amount</th>
      <td>$ {{ $totalPrice }}</td>
      
      
    </tr>
    <tr>
      <th scope="row">Tax</th>
      <td>$ 0</td>
      
     
    </tr>
    <tr>
      <th scope="row">Delivery</th>
      <td>$ 10</td>
      
    </tr>
    <tr>
      <th scope="row">Total Amount</th>
      <td>$ {{$totalPrice + 10}}</td>
      
    </tr>
  </tbody>
</table>

<form action="/orderPlace" method="post">
@csrf
    <div class="form-group">
        <textarea class="form-control" cols="100" name="address" rows="3" placeholder="Enter your address" required></textarea>
    </div><br>
    <label>Payment Method</label><br><br>
    <select name="selectedMethod" class="form-select" aria-label="Default select example">
        <option disabled>Payment Method</option>
        <option value="1">Pay Online</option>
        <option value="2">Pay On Delivery</option>
        
    </select><br><br>
    <input class="btn btn-info" type="submit" value="Order">
</form>

@endsection