<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var mySwiper = new Swiper('.swiper-container', {
        loop: false,
        type: 'bullets', //ページネーションの種類
        pagination: {
            el: '.swiper-pagination', //ページネーションの要素
            type: 'bullets', //ページネーションの種類
            paginationClickable: true,
        },
        scrollbar: {
            el: '.swiper-scrollbar', //要素の指定
        },
    })

</script>
