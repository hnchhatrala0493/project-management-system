$(document).ready(function() {
    console.log("ddd");
    $('#createEmployee').validate({ // initialize the plugin
        rules: {
            full_name: {
                required: true,
                email: true
            },
            father_name: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            full_name: {
                required: "Full Name is required."
            },
            father_name: {
                required: "Father Name is required."
            }
        }
    });

});