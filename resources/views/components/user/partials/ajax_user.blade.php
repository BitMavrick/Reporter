<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<!-- Ajax Script-->
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<script>
$(document).ready(function() {
    $(document).on('click', '.edit_profile', function(e) {
        e.preventDefault();
        let name = $('#name').val(); // .id #class - Rememder that

        $.ajax({
            url: "{{route('update.profile')}}",
            method: "POST",
            data: {
                name: name
            },

            success: function(res) {


            },
            error: function(err) {
                let errors = err.responseJSON;
                $.each(error.errors, function(index, value) {
                    $('.errMsgContainer').append(value);
                });
            }
        });
    });
});
</script>