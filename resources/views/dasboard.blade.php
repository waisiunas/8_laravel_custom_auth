<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h4>Dashboard</h4>
                            </div>
                            <div class="col-6 text-end">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <input type="submit" class="btn btn-outline-danger" value="Logout">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        Welcome <strong>{{ Auth::user()->name; }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
