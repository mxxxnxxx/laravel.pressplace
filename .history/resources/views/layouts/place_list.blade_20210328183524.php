{{--  
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var mySwiper = new Swiper('.swiper-container', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 0,
        centeredSlides: true,
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
    })

</script>  --}}

<table class="table table-striped table-hover">
    <tr>
        <th>投稿者</th>
        <th>写真</th>
        <th>name</th>
        <th>住所</th>
        <th>コメント</th>
        <th>tag</th>
        <th>投稿日</th>
    </tr>
    @foreach ($places as $place)
        <tr>
            <td>
                <a href={{ route('user.show', ['user' => $place->user->id]) }}>{{ $place->user->name }}</a>
            </td>
            <td>

                {{-- <!-- スライダーのメインコンテナ --> --}}
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        {{-- <!-- スライドたち --> --}}
                        @foreach ($place->place_images as $place_image)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/place_image/' . $place_image->filename) }}" alt="place画像">
                            </div>
                        @endforeach

                    </div>
                    {{-- <!-- ページネーション(ページ移動)が必要な場合 --> --}}
                    <div class="swiper-pagination"></div>

                    {{-- <!-- 左右にナビゲーションボタンが必要な場合 --> --}}
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                    {{-- <!-- スクロールバーが必要な場合 --> --}}
                    <div class="swiper-scrollbar"></div>
                </div>

            </td>
            <td>
                <a href={{ route('place.show', ['id' => $place->id]) }}>
                    {{ $place->name }}
                </a>
            </td>
            <td>{{ $place->address }}</td>
            <td>{{ $place->comment }}</td>
            <td>
                @foreach ($place->tags as $tag)
                    {{ $tag->name }}
                @endforeach
            </td>
            <td>{{ $place->created_at }}</td>
        </tr>
    @endforeach

</table>
{{-- ページネーション --}}
{{ $places->links() }}
