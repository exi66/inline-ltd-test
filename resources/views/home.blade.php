<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>inline-ltd</title>
    </head>
    <body>
        <div>
			<form>
				<input id="search" type="text" name="search" value="{!! !empty($search) ? $search : '' !!}">
				<input type="submit" value="Найти">
			</form>
        </div>
		@isset($data)
		<div>
			@foreach ($data as $key => $comment)
			<div>
			<b>Заголовок поста:</b> {!! $comment->post->title !!}</br>
			<b>Заголовок комментария:</b> {!! $comment->name !!}</br>
			<b>Email комментария:</b> {!! $comment->email !!}</br>
			<b>Текст комментария:</b>
			{!! $comment->body !!}</br>
			<hr>
			</div>
			@endforeach
		</div>
		@endisset
    </body>
</html>
