<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Kết quả bài thi </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Kết quả</h1>
        <?php
        // Đọc câu hỏi và đáp án từ file
        $filename = "questions.txt";
        $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

### Code hỗ trợ tính điểm:
        $answers = [];
        // Duyệt qua từng câu hỏi trong file
        foreach ($questions as $line) {
            if (strpos($line, "Đáp án:") !== false) { // Lọc các dòng chứa "Đáp án:"
                $answers[] = trim(substr($line, strpos($line, ":") + 1)); // Lấy đáp án
            }
        }

        $score = 0; // Điểm số của người dùng
        foreach ($_POST as $key => $userAnswer) {
            $questionNumber = (int) filter_var($key, FILTER_SANITIZE_NUMBER_INT); // Lấy số câu hỏi từ key
            if (isset($answers[$questionNumber - 1]) && $answers[$questionNumber - 1] === $userAnswer) {
                $score++; // Tăng điểm nếu đáp án đúng
            }
        }

        echo "<div class='alert alert-success text-center'>";
        echo "Bạn trả lời đúng <strong>$score</strong>/" . count($answers) . " câu.";
        echo "</div>";
        ?>
        <a href="index2.php" class="btn btn-primary">Làm lại</a>
    </div>
</body>

</html>
