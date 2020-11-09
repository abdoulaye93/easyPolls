<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poll #{{ $poll->id }} | Easy Polls</title>
</head>
<body>
    <h1>Poll #{{ $poll->id }}</h1>

    <h2>{{ $poll->question_text }}</h2>

    <form method="POST" action="/polls/{{ $poll->id }}/vote">
        @csrf

        <label for="choice_1">
            <input type="radio" id="choice_1" name="choice" value="choice_1"> {{ $poll->choice_1 }}
        </label><br>
        <label for="choice_2">
            <input type="radio" id="choice_2" name="choice" value="choice_2"> {{ $poll->choice_2 }}
        </label><br>
        <label for="choice_3">
            <input type="radio" id="choice_3" name="choice" value="choice_3"> {{ $poll->choice_3 }}
        </label><br>

        <br>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
