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
        <h2>Add News</h2>
        <form action="{{route('addNews')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">News Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="newsTitle" value="{{old('newsTitle')}}">
                @error('newsTitle')
                <div class="alert alert-warning">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="author">News Author:</label>
                <input type="text" class="form-control" id="author" placeholder="Enter author" name="newsAuthor" value="{{old('newsAuthor')}}">
                @error('newsAuthor')
                <div class="alert alert-warning">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">News Content:</label>
                <textarea class="form-control" rows="5" id="content" name="newsContent">{{old('newsContent')}}</textarea>
                @error('newsContent')
                <div class="alert alert-warning">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="checkbox">
                <input type='hidden' value="0" name="published">
                <label><input type="checkbox" name="published"> Published</label>
            </div>
            <button type="submit" class="btn btn-default">Add</button>
        </form>
    </div>

</body>

</html>