<div class="container">
    <div class="row" style="background-color: red">

        @foreach ($places as $place)
            <div class="col-sm-4" style="background-color: wheat">
                <div>
                    {{-- <!-- スライダーのメインコンテナ --> --}}
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            {{-- <!-- スライドたち --> --}}
                            @foreach ($place->place_images as $place_image)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/place_image/' . $place_image->filename) }}"
                                        alt="place画像">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
                <div>
                    <div class="font-weight-bold text-center">投稿者</div>
                    <a href={{ route('user.show', ['user' => $place->user->id]) }}>{{ $place->user->name }}</a>
                </div>

                <div>
                    <div class="font-weight-bold text-center">場所の名前</div>
                    <a href={{ route('place.show', ['id' => $place->id]) }}>
                        {{ $place->name }}
                    </a>
                </div>
                <div>
                    <div class="font-weight-bold text-center">住所</div>
                    {{ $place->address }}
                </div>
                <div>
                    <div class="font-weight-bold text-center">コメント</div>
                    {{ $place->comment }}
                </div>
                <div>
                    <div class="font-weight-bold text-center">tag</div>
                    @foreach ($place->tags as $tag)
                        {{ $tag->name }}
                    @endforeach
                </div>
                <div>
                    <div class="font-weight-bold text-center">投稿日</div>
                    {{ $place->created_at }}
                </div>
            </div>
        @endforeach

    </div>
</div>
{{-- ページネーション --}}
{{ $places->links() }}
