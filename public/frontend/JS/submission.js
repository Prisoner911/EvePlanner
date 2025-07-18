$(document).ready(function() {
    // Attach event listener to form submission
    $('form').submit(function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Serialize the form data
        var formData = $(this).serialize();

        // Make an AJAX request to the server
        $.ajax({
            type: 'POST', // or 'GET' depending on your controller
            url: $(this).attr('action'), // Get the form action attribute
            data: formData, // Send the serialized form data
            success: function(response) {
                $('#toastMessage').fadeIn().delay(2000).fadeOut();
                // Handle the response from the server
                // console.log(response);
                // Optionally, you can redirect or perform other actions based on the response
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    });
});
