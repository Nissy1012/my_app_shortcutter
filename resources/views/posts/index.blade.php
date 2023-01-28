<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Shortcutter</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
       <h1>Shortcutter</h1>
       <form action="{{ route('index') }}" method="GET">
            <input type="text" name="keyword" value="{{$keyword}}">
            <div>
                <input type="submit" value="検索">
            </div>
        </form>
        <table>
            <tr>
                <th>目的地</th><th>最寄駅</th>
            </tr>
            @forelse ($match_posts as $post)
                <tr>
                    <td>{{ $post->place}}</td>
                    <td>{{ $post->station}}</td>
                </tr>
            @empty
                <td>No posts!!</td>
            @endforelse
        </table>
        <h2><a href='/posts/create'>create</a></h2>
        
        <table>
            <tr>
                <th>目的地</th><th>最寄駅</th>
            </tr>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->place}}</td>
                    <td>{{ $post->station}}</td>
                </tr>
            @empty
                <td>No posts!!</td>
            @endforelse
        </table>
        
    </body>
</html>