$(document).ready(function() {
    $('#AddCompanyDetails').on('click', function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admin/history/store',
            cache: false,
            type: "POST",
            data: { 'history': $('#storeHistoryDetails').serializeArray() },
            dataType: "JSON",
            success: function(response) {
                $("#results").append(response);
            }
        });
    });

    $('#AddEducationDetails').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });
        $.ajax({
            url: "/admin/education/store",
            cache: false,
            type: "POST",
            data: { 'education': $('#storeEducation').serializeArray() },
            dataType: "JSON",
            success: function(response) {
                $("#results").append(response);
            }
        });
    });
});