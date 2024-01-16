import './bootstrap';

$(document).ready(function() {
    $('.join-button').click(function(e) {
        e.preventDefault();

        var clubId = $(this).data('club-id');
        var token = $('#csrf-token').val();

        if (confirm('Are you sure you want to join this club?')) {
            $.ajax({
                url: '/student/club/join/' + clubId,
                type: 'POST',
                data: {
                    _token: token
                },
                success: function(response) {
                    if (response.success) {
                        alert('You have successfully joined the club!');
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while trying to join the club. Please try again later.');
                }
            });
        }
    });
});