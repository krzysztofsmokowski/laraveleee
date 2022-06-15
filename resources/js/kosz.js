$(function() {
    $('button.do-kosza').click(function(event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: Produkt_data.do_koszyka + $(this).data('id')
        })
            .done(function () {
                Swal.fire({
                    title: 'Brawo!',
                    text: 'Produkt dodany do koszyka!',
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonText: '<i class="fas fa-cart-plus"></i> Przejdź do koszyka',
                    cancelButtonText: '<i class="fas fa-shopping-bag"></i> Kontynuuj zakupy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        alert('udalo sie');
                    }
                })
            })
            .fail(function () {
                Swal.fire('Oops...', 'Wystąpił błąd', 'error');
            });
    });})
