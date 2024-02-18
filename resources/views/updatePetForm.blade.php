<form id="updatePetForm">
    <input type="hidden" id="updatePetId" name="updatePetId" value="{{ @$petId }}">

    <label for="updateName">Name:</label>
    <input type="text" id="updateName" name="updateName" value="{{ @$petData['name'] }}" required>
    <br>

    <label for="updateCategory">Category ID:</label>
    <input type="number" id="updateCategory" name="updateCategory" value="{{ @$petData['category']['id'] }}" required>
    <br>

    <label for="updateCategoryName">Category Name:</label>
    <input type="text" id="updateCategoryName" name="updateCategoryName" value="{{ @$petData['category']['name'] }}"
        required>
    <br>

    <label for="updatePhotoUrl">Photo URL:</label>
    <input type="text" id="updatePhotoUrl" name="updatePhotoUrl" value="{{ implode(', ', @$petData['photoUrls']) }}"
        required>
    <br>

    <label for="updateTag">Tag ID:</label>
    <input type="number" id="updateTag" name="updateTag" value="{{ @$petData['tags'][0]['id'] }}" required>
    <br>

    <label for="updateTagName">Tag Name:</label>
    <input type="text" id="updateTagName" name="updateTagName" value="{{ @$petData['tags'][0]['name'] }}" required>
    <br>

    <label for="updateStatus">Status:</label>
    <select id="updateStatus" name="updateStatus" required>
        <option value="available" {{ @$petData['status'] === 'available' ? 'selected' : '' }}>Available</option>
        <option value="pending" {{ @$petData['status'] === 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="sold" {{ @$petData['status'] === 'sold' ? 'selected' : '' }}>Sold</option>
    </select>
    <br>

    <button type="button" onclick="updatePet()">Update Pet</button>
</form>
