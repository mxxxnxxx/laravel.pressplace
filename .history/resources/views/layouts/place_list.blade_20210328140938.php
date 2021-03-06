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
                @foreach ($place->place_images as $place_image)
                  {{-- react router -id --}}
                  <div id=react ></div>
                @endforeach

                {{-- 以下 laravel のみ 記述 --}}
                {{-- @foreach ($place->place_images as $place_image)
                  <img src="{{ asset('storage/place_image/' . $place_image->filename) }}" alt="place画像">
                @endforeach --}}
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
