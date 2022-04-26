var owl = $('#playlist-ow');
owl.owlCarousel({
    margin: 25,
    loop: true,
    nav:true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        900: {
            items: 3
        },
        1600: {
            items: 3
        }
    }
})
