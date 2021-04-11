<div class="container">
    <div class="row" style="background-color: red">
        <div class="col-2"></div>
        <div class="col-8">
            @foreach ($places as $place)
                <div class="m-4" style="background-color: wheat">
                        {{-- <!-- スライダーのメインコンテナ --> --}}
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                {{-- <!-- スライドたち --> --}}
                                @foreach ($place->place_images as $place_image)
                                    <div class="swiper-slide">
                                        <img class="img-responsive"
                                            src="{{ asset('storage/place_image/' . $place_image->filename) }}"
                                            alt="place画像">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-scrollbar"></div>
                        </div>
                    <div>
                        <div class="text-center mt-2">投稿者</div>
                        <a class="mx-2" href={{ route('user.show', ['user' => $place->user->id]) }}>{{ $place->user->name }}</a>
                    </div>

                    <div>
                        <div class="text-center mt-2">場所の名前</div>
                        <a class="mx-2" href={{ route('place.show', ['id' => $place->id]) }}>
                            {{ $place->name }}
                        </a>
                    </div>
                    <div>
                        <div class="text-center mt-2">住所</div>
                        <div class="mx-2">{{ $place->address }}</div>
                    </div>
                    <div>
                        <div class="text-center mt-2">コメント</div>
                        <div class="mx-2">{{ $place->comment }}</div>
                    </div>
                    <div>
                        <div class="text-center">tag</div>
                        @foreach ($place->tags as $tag)
                            <span class="mx-2">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                    <div>
                        <div class="text-center mt-2">投稿日</div>
                        <div class="text-center">{{ $place->created_at }}</div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-2"></div>
    </div>
</div>
{{-- ページネーション --}}
{{ $places->links() }}
