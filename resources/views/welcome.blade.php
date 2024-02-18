<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('js/myScript.js') }}"></script>
</head>

<body>
    <input type="number" min="1" name="showPetId" id="showPetId" placeholder="find"><button
        onclick="getPetData()">show Pet</button>
    <div id="showPetResult"></div>
    <hr>
    <input type="number" min="1" name="deletePetId" id="deletePetId" placeholder="delete"><button
        onclick="deletePet()">show Pet</button>
    <div id="deletePetResult"></div>
    @if (isset($petData['error']))
        <p>{{ $petData['error'] }}</p>
    @else
    @endif
    {{-- <div id="showPetResult"></div> --}}
    <hr>
    <form id="addPetForm">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>

        <label for="category">Category ID:</label>
        <input type="number" id="category" name="category" required>
        <br>

        <label for="categoryName">Category Name:</label>
        <input type="text" id="categoryName" name="categoryName" required>
        <br>

        <label for="photoUrl">Photo URL:</label>
        <input type="text" id="photoUrl" name="photoUrl" required>
        <br>

        <label for="tag">Tag ID:</label>
        <input type="number" id="tag" name="tag" required>
        <br>

        <label for="tagName">Tag Name:</label>
        <input type="text" id="tagName" name="tagName" required>
        <br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="available">Available</option>
            <option value="pending">Pending</option>
            <option value="sold">Sold</option>
        </select>
        <br>

        <button type="button" onclick="addPet()">Add Pet</button>
    </form>
    <hr>
    <input type="number" min="1" name="updatePetData" id="updatePetData" placeholder="update"><button
        onclick="fingPetDetails()">find pet and fill</button>
    <div id="updatePetForm"></div>
    <hr>
</body>

</html>
