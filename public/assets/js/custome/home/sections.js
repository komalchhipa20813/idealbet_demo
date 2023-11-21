$(document).ready(function() {

    $(".submit_section").on("click", function(event) {
        event.preventDefault();
        var form = $("#sections_form")[0];
        var formData = new FormData(form);
        formData.append("section1_html", CKEDITOR.instances.section1.getData());
        formData.append("section2_html", CKEDITOR.instances.section2.getData());
        formData.append("section3_html", CKEDITOR.instances.section3.getData());
        formData.append("section4_html", CKEDITOR.instances.section4.getData());
        formData.append("section5_html", CKEDITOR.instances.section5.getData());
       
            $.ajax({
                url: aurl + "/home-sections",
                type: "POST",
                dataType: "JSON",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    toaster_message(data.message,data.icon,data.redirect_url);
                },
                error: function(request) {
                    toaster_message(
                        "Something Went Wrong! Please Try Again.",
                        "error"
                    );
                },
            });
        
    });
    
});