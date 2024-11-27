(function(){
    "use strict";
    $(document).ready(function() {

        $(document).on("click", ".deleteItem", function() {
            let form_id = this.dataset.formid;
            Swal.fire({
                title: 'Sure! You want to delete?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete It!'
            }).then((result) => {
                if (result.value) {
                    $("#" + form_id).submit();
                } else if (result.dismiss === "cancel") {
                    Swal.fire(
                        "Cancelled",
                        "Your imaginary file is safe :)",
                        "error"
                    )
                }
            })
        });
    })

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
})(jQuery);

// (function(){
//     "use strict";
//     // Your code here
// })(jQuery);
// The code block you've provided is a common JavaScript pattern known as an Immediately Invoked Function Expression (IIFE).
// Avoiding Global Scope Pollution: By wrapping the code in an IIFE, it ensures that variables and functions defined inside it don't interfere with other scripts or libraries that might be included on the page.
// Compatibility: Passing jQuery as an argument allows the $ symbol to be safely used inside the IIFE, even if other libraries also use the $ symbol.
// Strict Mode: Enabling strict mode helps catch potential errors and enforces safer coding practices within the IIFE