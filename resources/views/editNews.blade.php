<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Car</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Edit News</h2>
        <form action="{{route('updateNews', $news->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">News Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{$news->newsTitle}}">
            </div>
            <div class="form-group">
                <label for="author">News Author:</label>
                <input type="text" class="form-control" id="author" placeholder="Enter author" name="author" value="{{$news->newsAuthor}}">
            </div>
            <div class="form-group">
                <label for="content">News Content:</label>
                <textarea class="form-control" rows="5" id="content" name="content">{{$news->newsContent}}</textarea>
            </div>
            <div class="checkbox">
                <input type='hidden' value="0" name="published">
                <label><input type="checkbox" name="published"> Published</label>
            </div>
            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>

</body>

</html>