$(document).ready(function (){

    //---------------------------------------------------------------------------------------------
    // initialise variables
    //---------------------------------------------------------------------------------------------
    var modalState = "closed";      // the state of the modal: closed, add, view, edit, delete
    var modalSongId = null;         // the id of the song displayed in the modal form, if any

    //---------------------------------------------------------------------------------------------
    // initialise jQuery validation plugin: https://jqueryvalidation.org/
    // - define additional validation rule for integers
    // - define additional validation rule for alphanumberic only
    // - define rules and messages for modal form for songs, and function to place error messages
    //---------------------------------------------------------------------------------------------
    $.validator.addMethod("integer", function(value, element) {
        return this.optional(element) || /^-?[0-9]+$/i.test(value);
    }, "Whole numbers only please");

    $.validator.addMethod("alpha_numeric", function(value, element) {
        return this.optional(element) || /^[A-Za-z0-9]+$/i.test(value);
    }, "Letters and digits only please");

    $('#form-song').validate({
        rules: {
            title: {
                required: true,
                maxlength: 191
            },
            artist: {
                required: true,
                maxlength: 191
            },
            album: {
                required: true,
                maxlength: 191
            },
            genre: {
                required: true,
                maxlength: 191
            },
            year: {
                required: true,
				integer: true,
                min: 1900
            }
            
        },
        messages: {
            title: {
                required: "The title field is required.",
                maxlength: "The title field must be less than 191 chars."
            },
            artist: {
                required: "The artist field is required.",
                maxlength: "The artist field must be less than 191 chars."
            },
            album: {
                required: "The album field is required.",
                maxlength: "The album field must be less than 191 chars."
            },
            genre: {
                required: "The genre field is required.",
                maxlength: "The genre field cannot be negative."
            },
            year: {
                required: "The year field is required.",
				integer: "The year must be an integer.",
                min: "The year field must be more than 1900."
            }
        },
        errorPlacement: function(error, element) {
            element.siblings('.error').html(error);
        }
    });

    //---------------------------------------------------------------------------------------------
    // reset the modal when it is closed
    // - remove modal heading text
    // - clear and enable all form controls, and remove error class from controls if present
    // - clear any error messages
    // - reset modal state and song id associated with modal form
    //---------------------------------------------------------------------------------------------
    $('#modal-form').on('hidden.bs.modal', function (e) {
        $(this)
            .find("h4#modal-song-heading")
                .text('')
                .end()
            .find("input,textarea,select")
                .val('')
                .prop('disabled', false)
                .removeClass('error')
                .end()
            .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .prop('disabled', false)
                .removeClass('error')
                .end()
            .find("span.error")
                .text('')
                .end();

        modalState = "closed";
        modalSongId = null;
    });

    //---------------------------------------------------------------------------------------------
    // when the 'Add' button is clicked, display the modal with a blank form
    //---------------------------------------------------------------------------------------------
    $('#btn-add-song').on('click', function() {
        modalState = "add";
        $('#modal-song-heading').text("Add new song");
        $('#btn-submit').show();
        $('#btn-submit').text("Store");
        $('#modal-form').modal('show');
    });

    //---------------------------------------------------------------------------------------------
    // when one of the 'View' buttons is clicked, display the modal with a disabled form showing
    // the song details
    //---------------------------------------------------------------------------------------------
    $('#table-songs').on('click', '.btn-song-view', function() {
        modalState = "view";
        modalSongId = $(this).closest('tr').data('id');
        $.ajax("api/songs/" + modalSongId, {
            contentType: 'application/json',
            method: 'GET',
            success: function (response) {
                // if the song was retrieve ok, display in the modal with form controls disabled
                if (response.status === 200) {
                    var song = response.data;
                    populateForm(song, true);
                    $('#modal-song-heading').text("View song details");
                    $('#btn-submit').hide();
                    $('#modal-form').modal('show');
                }
                // if the  song was not found, display an error message
                else if (response.status === 404) {
                    showMessage("song not found", "alert-warning");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                showMessage("Server error: " + textStatus, "alert-warning");}
        });
    });

    //---------------------------------------------------------------------------------------------
    // when one of the 'Edit' buttons is clicked, display the modal with a form showing
    // the song details which the user can edit and submit
    //---------------------------------------------------------------------------------------------
    $('#table-songs').on('click', '.btn-song-edit', function() {
        modalState = "song";
        modalSongId = $(this).closest('tr').data('id');
        // send a GET request to the URL 'api/songs'
        $.ajax("api/songs/" + modalSongId, {
            contentType: 'application/json',
            method: 'GET',
            // if the AJAX request is successful, execute this function
            success: function (response) {
                // if the song was retrieve ok, display in the modal with form controls enabled
                if (response.status === 200) {
                    var song = response.data;
                    populateForm(song, false);
                    $('#modal-song-heading').text("Edit song details");
                    $('#btn-submit').text("Update").show();
                    $('#modal-form').modal('show');
                }
                // if the  song was not found, display an error message
                else if (response.status === 404) {
                    showMessage("song not found", "alert-warning");
                }
            },
            // if there is an error with the AJAX request, execute this function
            error: function (jqXHR, textStatus, errorThrown) {
                showMessage("Server error: " + textStatus, "alert-warning");
            }
        });
    });

    //---------------------------------------------------------------------------------------------
    // when one of the 'Delete' buttons is clicked, display the modal with a disabled form showing
    // the song details and a submit button to confirm the deletion
    //---------------------------------------------------------------------------------------------
    $('#table-songs').on('click', '.btn-song-delete', function() {
        modalState = "delete";
        modalSongId = $(this).closest('tr').data('id');
        // send a GET request to the URL 'api/songs/{id}'
        $.ajax("api/songs/" + modalSongId, {
            contentType: 'application/json',
            method: 'GET',
            // if the AJAX request is successful, execute this function
            success: function (response) {
                // if the song was retrieve ok, display in the modal with form controls disabled
                if (response.status === 200) {
                    var song = response.data;
                    populateForm(song, true);
                    $('#modal-song-heading').text("Confirm song deletion");
                    $('#btn-submit').text("Delete").show();
                    $('#modal-form').modal('show');
                }
                // if the  song was not found, display an error message
                else if (response.status === 404) {
                    showMessage("song not found", "alert-warning");
                }
            },
            // if there is an error with the AJAX request, execute this function
            error: function (jqXHR, textStatus, errorThrown) {
                showMessage("Server error: " + textStatus, "alert-warning");}
        });
        $('#btn-submit').show();
        $('#modal-form').modal('show');
    });

    //---------------------------------------------------------------------------------------------
    // when modal submit button is clicked, store, update or delete the song according to the
    // modal state and form validatity
    //---------------------------------------------------------------------------------------------
    $('#btn-submit').on('click', function(){
        if (modalState === "add") {
            if ($('#form-song').valid()) {
                storeSong();
				
            }
        }
        else if (modalState === "edit") {
            if ($('#form-song').valid()) {
                updateSong();
            }
        }
        else if (modalState === "delete") {
            deleteSong();
        }
		// window.location.reload();
    });

    //---------------------------------------------------------------------------------------------
    // to store a new song, send a POST request to the REST API endpoint 'api/songs';
    // on success: if there were no validation errors, update the table; otherwise display the
    // errors
    //---------------------------------------------------------------------------------------------
    function storeSong() {
        var form = $('#form-song').get(0);
        var formData = $(form).serializeArray();
        var data = {};
        formData.map(function(x){
            data[x.name] = x.value;
        });
        // send a POST request to the URL 'api/songs' with the details of the new song encoded as
        // a JSON string in the body of the request
        $.ajax('api/songs', {
            contentType: 'application/json',
            dataType: 'json',
            method: 'POST',
            data: JSON.stringify(data),
            // if the AJAX request is successful, execute this function
            success: function (response) {
                // if the song was stored ok, dismiss the modal, add the song to the table, and
                // display a message
                if (response.status === 200) {
                    var song = response.data;
                    $('#modal-form').modal('hide');
                    addTableRow(song);
                    showMessage("song added successfully", "alert-success");
                }
                // if there was validation errors with the song data, display the error messages
                else if (response.status === 422) {
                    var errors = response.data;
                    for (var prop in errors) {
                        var message = errors[prop][0];
                        $('#error-' + prop, form).text(message);
                    }
                }
            },
            // if there is an error with the AJAX request, execute this function
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    }

    //---------------------------------------------------------------------------------------------
    // to update an existing song, send a PUT request to the REST API endpoint 'api/songs/{id}';
    // on success: if there were no validation errors, update the table; otherwise display the
    // errors
    //---------------------------------------------------------------------------------------------
    function updateSong() {
        var form = $('#form-song').get(0);
        var formData = $(form).serializeArray();
        var data = {};
        formData.map(function(x){
            data[x.name] = x.value;
        });
        data.id = modalSongId;
        // send a PUT request to the URL 'api/songs/{id}' with the updated details of the song
        // encoded as a JSON string in the body of the request
        $.ajax('api/songs/' + modalSongId, {
            contentType: 'application/json',
            dataType: 'json',
            method: 'PUT',
            data: JSON.stringify(data),
            // if the AJAX request is successful, execute this function
            success: function (response) {
                // if the song was updated ok, dismiss the modal, update the song in the table,
                // and display a message
                if (response.status === 200) {
                    var song = response.data;
                    $('#modal-form').modal('hide');
                    updateTableRow(song);
                    showMessage("song updated successfully", "alert-success");
                }
                // if the song could not be found, dismiss the modal and display an error message
                else if (response.status === 404) {
                    $('#modal-form').modal('hide');
                    showMessage("song could not be found", "alert-warning");
                }
				// if there was validation errors with the song
			    else if (response.status === 422) {
                    var errors = response.data;
                    for (var prop in errors) {
                        var message = errors[prop][0];
                        $('#error-' + prop, form).text(message);
                    }
                }
            },
            // if there is an error with the AJAX request, execute this function
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    }

    //---------------------------------------------------------------------------------------------
    // to delete an existing song, send a DELETE request to the REST API endpoint 'api/songs/{id}';
    // on success: if there were no validation errors, update the table; otherwise display the
    // errors
    //---------------------------------------------------------------------------------------------
    function deleteSong() {
        // send a DELETE request to the URL 'api/songs/{id}'
        $.ajax('api/songs/' + modalSongId, {
            method: 'DELETE',
            // if the AJAX request is successful, execute this function
            success: function (response) {
                // if the song was deleted ok, dismiss the modal, delete the song from the table,
                // and display a message
                if (response.status === 200) {
                    var song = response.data;
                    $('#modal-form').modal('hide');
                    deleteTableRow(modalSongId);
                    showMessage("song deleted successfully", "alert-success");
                }
                // if the song could not be found, dismiss the modal and display an error message
                else if (response.status === 404) {
                    $('#modal-form').modal('hide');
                    showMessage("song could not be found", "alert-warning");
                }
            },
            // if there is an error with the AJAX request, execute this function
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    }

    //---------------------------------------------------------------------------------------------
    // add a new row to the table displaying the details of a newly added song
    //---------------------------------------------------------------------------------------------
    function addTableRow(song) {
        var row = '<tr data-id="' + song.id + '">' +
                      '<td>' + song.title + '</td>' +
                      '<td>' + song.artist + '</td>' +
                      '<td>' + song.album + '</td>' +
                      '<td>' + song.genre + '</td>' +
                      '<td>' + song.year + '</td>' +
                      '<td>' +
                          '<button type="button" class="btn btn-default btn-song-view">View</button> ' +
                          '<button type="button" class="btn btn-warning btn-song-edit">Edit</button> ' +
                          '<button type="button" class="btn btn-danger btn-song-delete">Delete</button> ' +
                      '</td>' +
                  '</tr>';

        $('#table-songs tbody').append(row);
    }

    //---------------------------------------------------------------------------------------------
    // update an existing row in the table to display the updated details of an edited song
    //---------------------------------------------------------------------------------------------
    function updateTableRow(song) {
        var tableRow = $('tr[data-id="' + modalSongId + '"]');
        var tableCells = $('td', tableRow);
        $(tableCells[0]).text(song.title);
        $(tableCells[1]).text(song.artist);
        $(tableCells[2]).text(song.album);
        $(tableCells[3]).text(song.genre);
        $(tableCells[4]).text(song.year);
    }

    //---------------------------------------------------------------------------------------------
    // delete an existing row in the table to remove the details of a deleted song
    //---------------------------------------------------------------------------------------------
    function deleteTableRow($id) {
        var tableRow = $('tr[data-id="' + modalSongId + '"]');
        tableRow.remove();
    }

    function showMessage(message, type) {
        // config the message and display it
        $('#alert-message').text(message);
        $('#alert-message').addClass(type);
        $('#alert-message').show();
        // set a timeout function to remove the message in 5 seconds
        setTimeout(function () {
            $('#alert-message').hide();
            $('#alert-message').removeClass(type);
        }, 5000);
    }

    //---------------------------------------------------------------------------------------------
    // populate the modal form with the details of a song, disabling the input fields if required
    //---------------------------------------------------------------------------------------------
    function populateForm(song, disabled) {
        var form = $('#form-song').get(0);
        $('#title', form).val(song.title).prop("disabled", disabled);
        $('#artist', form).val(song.artist).prop("disabled", disabled);
        $('#album', form).val(song.album).prop("disabled", disabled);
        $('#genre', form).val(song.genre).prop("disabled", disabled);
        $('#year', form).val(song.year).prop("disabled", disabled);
    }
});