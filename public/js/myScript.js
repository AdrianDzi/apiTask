var csrfToken = $('meta[name="csrf-token"]').attr('content');
function getPetData() {
    var petId = $('#showPetId').val();

    var requestData = {
        _token: csrfToken,
        petId: petId
    };

    $.ajax({
        url: '/pets',
        type: 'GET',
        data: requestData,
        success: function (response) {
            $('#showPetResult').html(response);
        },
        error: function (error) {
            console.error('Błąd Ajax:', error);
        }
    });
}
function deletePet() {
    var petId = $('#deletePetId').val();

    var requestData = {
        _token: csrfToken,
        petId: petId
    };

    $.ajax({
        url: '/deletePet',
        type: 'POST',
        data: requestData,
        success: function (response) {
            $('#deletePetResult').html(response);
        },
        error: function (error) {
            console.error('Błąd Ajax:', error);
        }
    });
}

function addPet() {
    var data = {
        newPetName: $('#name').val(),
        newCatId: $('#category').val(),
        newCatName: $('#categoryName').val(),
        newPhotoUrl: $('#photoUrl').val(),
        newTagId: $('#tag').val(),
        newTagName: $('#tagName').val(),
        newStatus: $('#status').val(),
    };
    var requestData = {
        _token: csrfToken,
        data: data
    };
    $.ajax({
        url: '/addPets',
        type: 'POST',
        data: requestData,
        success: function (response) {
            alert(response);
        },
        error: function (error) {
            console.error('Błąd Ajax:', error);
        }
    });
}

function fingPetDetails() {
    var petId = $('#updatePetData').val();
    var requestData = {
        _token: csrfToken,
        petId: petId
    };

    if (petId) {
        $.ajax({
            url: '/updatePetsDetails',
            type: 'GET',
            data: requestData,
            success: function (response) {
                console.log(response);

                $('#updatePetForm').html(response);
            },
            error: function (error) {
                console.error('Błąd Ajax:', error);
            }
        });
    } else {
    }
}

function updatePet() {
    var petId = $('#updatePetId').val(); // Popraw nazwę zmiennej
    var data = {
        // petId: $('updatePetId').val(),
        petName: $('#updateName').val(),
        catId: $('#updateCategory').val(),
        catName: $('#updateCategoryName').val(),
        photoUrl: $('#updatePhotoUrl').val(),
        tagsId: $('#updateTag').val(),
        tagsName: $('#updateTagName').val(),
        status: $('#updateStatus').val(),
    };
    var requestData = {
        _token: csrfToken,
        petId: petId,
        data: data
    };

    $.ajax({
        url: '/updatePets',
        type: 'POST',
        data: requestData,
        success: function (response) {
            alert('success');
        },
        error: function (error) {
            console.error('Błąd Ajax:', error);
        }
    });
}
// 9223372036854572446
