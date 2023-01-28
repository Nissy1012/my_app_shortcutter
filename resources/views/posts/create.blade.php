<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="place">
                <h2>Place</h2>
                <input type="text" name="post[place]" placeholder="目的地"/>
            </div>
            <div class="station">
                <h2>Station</h2>
                <input type="text" name="post[station]" placeholder="最寄駅"/>
            </div>
            </div class="address">
                <h2>Address</h2>
                <input type="text" name="post[address]" placeholder="目的地住所"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="目的地へ最も近い出口や説明を記入してください"></textarea>
            </div>
            <div class="image">
                <input type="file" name="image">
            </div>
             <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/posts">戻る</a>
        </div>
    </body>
</html>