<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create Employee</title>
</head>
<body>
    <h1>Create Employee</h1>
    {{-- <a href="/employees/create" class="btn btn-primary">Add New</a> --}}
    <form action="/employees/update/{{$employee->id}}" method="post">
        @method('PUT')
        @csrf
        <div class="mb-3"></div>
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$employee->name}}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$employee->email}}" required>
        </div>
        <div class="mb-3">
            <label for="phone_no" class="form-label">Phone No</label>
            <input type="text" class="form-control" id="phone_no" name="phone_no" value="{{$employee->phone_no}}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/employees" class="btn btn-secondary">Back to Employees</a>
    </form>
</body>
</html>
