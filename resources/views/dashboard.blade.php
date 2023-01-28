<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="1xJs6Awg2JH70HYZ8I0G6NhtPq2NNtPRUyqJR7IZ">

    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
</head>

<body cz-shortcut-listen="true">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="http://localhost:8000">
                    TK 3 Team 4 JOBA
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre="">
                                {{$loggedUser}} ({{$loggedRole}})
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a href="/logout" class="dropdown-item"> Logout </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            <section class="container" id="PageListUser">
                <h1>List User</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="p-1">No.</th>
                            <th class="p-1">Name</th>
                            <th class="p-1">Phone Number</th>
                            <th class="p-1">Email</th>
                            <th class="p-1">NIK</th>
                            <th class="p-1">DOB</th>
                            <th class="p-1">Role</th>
                            <th class="p-1">Role Description</th>
                            <th class="p-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $user)
                        <tr>
                            <td class="p-1">{{ $loop->iteration }}</td>
                            <td class="p-1">{{ $user->name }}</td>
                            <td class="p-1">{{ $user->phoneNumber }}</td>
                            <td class="p-1">{{ $user->email }}</td>
                            <td class="p-1">{{ $user->nik }}</td>
                            <td class="p-1">{{ $user->dateOfBirth }}</td>
                            <td class="p-1">{{ $user->role->roleName }}</td>
                            <td class="p-1">{{ $user->role->description }}</td>
                            @if ($loggedRole === 'Admin')
                            <td class="p-1">
                                <button class="btn btn-warning m-1">Update</button>
                                <br>
                                <button class="btn btn-danger m-1">Delete</button>
                            </td>
                            @else
                            <td class="p-1">
                                <button style="cursor: not-allowed;" class="btn btn-secondary m-1">Update</button>
                                <br>
                                <button style="cursor: not-allowed;" class="btn btn-secondary m-1">Delete</button>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>

        </main>
    </div>


</body>

</html>