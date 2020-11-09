<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Polls</title>
</head>
<body>
    <h1>Easy Polls</h1>

    <form method="POST" action="/polls">
        @csrf

        <div>
            <label for="question_text">Question Text</label><br>
            <textarea id="question_text" name="question_text" autofocus required></textarea>
        </div>

        <div>
            <h3>Choices</h3>
            <input type="text" name="question_choice_1" placeholder="Enter choice" required><br>
            <input type="text" name="question_choice_2" placeholder="Enter choice" required><br>
            <input type="text" name="question_choice_3" placeholder="Enter choice" required>
        </div>

        <br>

        <div>
            <button type="submit" formnovalidate>Create Poll</button>
        </div>
    </form>
</body>
</html>
