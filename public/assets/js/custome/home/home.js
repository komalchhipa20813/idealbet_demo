$(document).ready(function() {
        /*DataTable*/
    $("#home-banner-image_tbl").DataTable({
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "All"],
        ],
        iDisplayLength: 10,
        language: {
            search: "",
        },
        ajax: {
            type: "POST",
            url: aurl + "/home-banner-image/listing",
        },
        columns: [
            { data: "0" , "width": "5%"},
            { data: "1" },
            { data: "2" },
            { data: "3" },
        ],
    });
    
    $("#homeImage_form").validate({
        rules: {
                image: {
                required: true, 
                extension: "png|jpe?g|gif", 
            }, 
            
        },
        messages: {
            image: {
                required: "Please Upload Image",
            },
            
        },
        errorPlacement: function(error, element) {
            if(element.parents("div").hasClass("uploader")||element.hasClass("datepicker")||element.hasClass("dobdatePicker")){
                error.appendTo(element.parent().parent());
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element) {
            $(element).removeClass("error");
        },
    });

         /* Add City Modal */
    $("body").on("click", ".add_images", function() {
        $("#homeImage_form").validate().resetForm();
        $("#homeImage_form").trigger("reset");
        $("#image_modal").modal("show");
    });

    $("body").on("click", ".previewImage", function() {
        $("#previewimage_modal").modal("show");
        $('.preview-image').html('<img src="'+$(this).attr('src')+'"  class="img-rounded previewImage" width="100%" height="400px" >');
    });
   
   

      /* adding and updating fdo data */
      $(".submit_home").on("click", function(event) {
        event.preventDefault();
        var form = $("#homeImage_form")[0];
        var formData = new FormData(form);
        if ($("#homeImage_form").valid()) {
            $.ajax({
                url: aurl + "/home-banner-image",
                type: "POST",
                dataType: "JSON",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#image_modal").modal("hide");
                    toaster_message(data.message, data.icon);
                },
                error: function(request) {
                    toaster_message(
                        "Something Went Wrong! Please Try Again.",
                        "error"
                    );
                },
            });
        }
    });

    $("body").on("click", ".remove_image", function(event) {
        var id = $(this).data("id");
        event.preventDefault();

        	 const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger me-2",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.value) {
       			 $.ajax({
                  type: "post",
                  url: aurl +'/'+currentLocation+"/delete-image",
                  data: {id: id},
                  dataType: "JSON",
                  success: function(data) {
                    toaster_message(data.message,data.icon,data.redirect_url);
                  },
                  error: function (error) {
                      toaster_message(error,'error'); 
                  }
              });
       			 } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        "Cancelled",
                        "Your Data Is Safe",
                        "info"
                    );
                }
            });


    });
});