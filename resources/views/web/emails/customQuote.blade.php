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
    <td>{{ $quote->name }}</td>
  </tr>
  <tr>
    <th>Email:</th>
    <td>{{ $quote->email }}</td>
  </tr>
  <tr>
    <th>Contact Number:</th>
    <td>{{ $quote->phone }}</td>
  </tr>
  <tr>
    <th>Subject:</th>
    <td>{{ $quote->subject }}</td>
  </tr>
  <tr>
    <th>Length:</th>
    <td>{{ $quote->length }}</td>
  </tr>
  <tr>
    <th>Width:</th>
    <td>{{ $quote->width }}</td>
  </tr>
  <tr>
    <th>Height:</th>
    <td>{{ $quote->height }}</td>
  </tr>
  <tr>
    <th>Quantity:</th>
    <td>{{ $quote->quantity }}</td>
  </tr>
  <tr>
    <th>Color:</th>
    <td>{{ $quote->color }}</td>
  </tr>
  <tr>
    <th>Message:</th>
    <td>{{ $quote->message }}</td>
  </tr>
</table>

</body>
</html>


Thanks,<br>
Custom CMYK Boxes
</x-mail::message>
