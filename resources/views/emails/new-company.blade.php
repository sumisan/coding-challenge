<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Afrinet Company</title>

  <style>
    #container{
      padding: 10px 30px;
    }

    table, th, td {
      border: 1px solid black;
       border-collapse: collapse;
    }
    th, td {
      padding: 10px;
    }


  </style>
</head>
<body>

  <div id="container">
    <div>
      <p style="color: #FF2832;font-size: 2rem!important;text-align:center;">
        <strong>Afrinet Company</strong>
      </p>
    </div>


  <h4>New Company Added</h4>
  <table style="width:100%;">

    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Logo</th>
      <th>Email</th>
      <th>Website</th>
    </tr>

    <tr style="text-align:center;">
      <td>1</td>
      <td>{{ $company->name }}</td>
      <?php $logo = $company->logo; ?>
      <td><img src="{{ $message->embed(public_path() . '/storage/'.$logo  ) }}" width="50" /></td>
      <td>{{ $company->email }}</td>
      <td>{{ $company->website }}</td>
    </tr>

  </table>

  </div>

</body>
</html>