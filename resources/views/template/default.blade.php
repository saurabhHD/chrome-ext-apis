
<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('page-title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- custom css-->
   <link rel="stylesheet" type="text/css" href="lang/css/dashboard.css">
    @yield('custom-css')
  <!-- /custom css-->

  <!-- custom js-->
    @yield('custom-js')
  <!-- /custom js-->
</head>
<body token='{{csrf_token()}}'>
  <nav class="w-100 bg-white shadow-lg p-3" style="border-bottom: 2px solid #5862F3">
    <h4 class="my-color ml-4">Dashboard  <span class="text-danger float-right"><a href="user/logout" class="text-decoration-none"><i class="fa fa-sign-out"></i>Logout</a></span></h4>

  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-4 bg-white mt-2 p-3 shadow-lg" style="border-right: 2px solid #5862F3">
        <div class="menu pl-3">
          <h5 class="my-color text-center font-weight-bold">Menus</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="/create" class="text-decoration-none">Manage Extention</a></li>
          <li class="list-group-item"><a href="/upload-bg" class="text-decoration-none">Upload Background Images</a></li>
          <li class="list-group-item"><a href="/delete-bg" class="text-decoration-none">Delete Background Images</a></li>
          <li class="list-group-item"><a href="/create-shortcut" class="text-decoration-none">Create Shortcuts</a></li>
          <li class="list-group-item"><a href="/delete-shortcut" class="text-decoration-none">Delete Shortcuts</a></li>
          <li class="list-group-item"><a href="/add-game" class="text-decoration-none">Add Games</a></li>
          <li class="list-group-item"><a href="/delete-game" class="text-decoration-none">Delete Games</a></li>
          <li class="list-group-item"><a href="/support" class="text-decoration-none">Support</a></li>
          <li class="list-group-item"><a href="/edit-support" class="text-decoration-none">Edit Support</a></li>
          <li class="list-group-item"><a href="/card" class="text-decoration-none">Create Card</a></li>
        </ul>
        </div>
      </div>
      <div class="col-1">
       
      </div>
      <div class="col-7 bg-white mt-2 p-3 shadow-lg" style="border-left: 2px solid #5862F3">
        <h4 class="text-center text-secondary">@yield('page-title')</h4>
        <hr>
        @yield('form-box')
      </div>
    </div>
  </div>
  

</body>
</html>
