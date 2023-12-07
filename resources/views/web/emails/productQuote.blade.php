<x-mail::message>
{{-- # Detail from Contact Us page --}}

<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>
</head>
<body>



<h2>Detail From Custom Quote Page</h2>
<h6>Client detail</h6>
<table style="width:100%">
  <tr>
    <th>Name:</th>
    <td>{{ $productQuote->name }}</td>
  </tr>
  <tr>
    <th>Email:</th>
    <td>{{ $productQuote->email }}</td>
  </tr>
  <tr>
    <th>Contact Number:</th>
    <td>{{ $productQuote->phone }}</td>
  </tr>
  <tr>
    <th>Product Name:</th>
    <td>{{ $productName->prod_title }}</td>
  </tr>
  <tr>
    <th>Length:</th>
    <td>{{ $productQuote->length }}</td>
  </tr>
  <tr>
    <th>Width:</th>
    <td>{{ $productQuote->width }}</td>
  </tr>
  <tr>
    <th>Depth:</th>
    <td>{{ $productQuote->depth }}</td>
  </tr>
  <tr>
    <th>Unit:</th>
    <td>{{ $productQuote->unit }}</td>
  </tr>
  <tr>
    <th>Quantity:</th>
    <td>{{ $productQuote->quantity }}</td>
  </tr>
  <tr>
    <th>Client Specification:</th>
    <td>{{ $productQuote->specification }}</td>
  </tr>
</table>

</body>
</html>


Thanks,<br>
Custom CMYK Boxes
</x-mail::message>
