<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài thi trắc nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Thêm kiểu tùy chỉnh cho câu hỏi */
        .question-card {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .question-card h5 {
            font-size: 1.2em;
        }
        .form-check {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Bài thi trắc nghiệm</h1>
        <form method="POST" action="submit.php">
            <?php
            $filename = "questions.txt"; 
            $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            $current_question = [];
            $question_number = 1;

            foreach ($questions as $line) {
                if (strpos($line, "Câu") === 0) {
                    if (!empty($current_question)) {
                        render_question($current_question, $question_number);
                        $question_number++;
                    }
                    $current_question = [$line];
                } else {
                    $current_question[] = $line;
                }
            }

            if (!empty($current_question)) {
                render_question($current_question, $question_number);
            }

            function render_question($question, $number)
            {
                echo "<section class='question-card'>";
                echo "<h5><strong>{$question[0]}</strong></h5>";
                for ($i = 1; $i <= 4; $i++) {
                    $answer = substr($question[$i], 0, 1); 
                    echo "<div class='form-check'>";
                    echo "<input class='form-check-input' type='radio' name='question{$number}' value='{$answer}' id='question{$number}{$answer}'>";
                    echo "<label class='form-check-label' for='question{$number}{$answer}'>{$question[$i]}</label>";
                    echo "</div>";
                }
                echo "</section>";
            }
            ?>
            <button type="submit" class="btn btn-primary">Nộp bài</button>
        </form>
    </div>
</body>
</html>
