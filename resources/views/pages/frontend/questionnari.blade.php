<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kuesioner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .questionnaire-container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .question {
            display: none;
        }
        .question.active {
            display: block;
        }
        .question-number {
            font-weight: bold;
            color: #007bff;
        }
        .answer-btn {
            width: 100%;
            text-align: left;
            margin-bottom: 10px;
            padding: 10px 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: #f8f9fa;
            transition: all 0.3s;
        }
        .answer-btn:hover {
            background-color: #e9ecef;
        }
        .answer-btn.selected {
            background-color: #007bff;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container questionnaire-container">
        <h1 class="text-center mb-5">Kuesioner</h1>
        <div id="timer" class="text-center mb-3">Waktu tersisa: 30:00</div>
        <form id="questionnaireForm" action="{{ route('landing.store') }}" method="POST">
            @csrf
            @foreach ($questionnaires as $index => $questionnaire)
                <div class="question {{ $loop->first ? 'active' : '' }}" data-question="{{ $index + 1 }}">
                    <p class="mb-3">
                        <span class="question-number">Pertanyaan {{ $loop->iteration }}:</span>
                        {{ $questionnaire->description }}
                    </p>
                    @foreach ($questionnaire->categoryQuestionnaires as $categoryQuestionnaire)
                        <button type="button" class="btn answer-btn {{ $categoryQuestionnaire->category->name === 'Other' ? 'other-option' : '' }}" 
                                data-questionnaire-id="{{ $questionnaire->id }}" 
                                data-category-questionnaire-id="{{ $categoryQuestionnaire->id }}"
                                data-category-name="{{ $categoryQuestionnaire->category->name }}">
                            {{ $categoryQuestionnaire->description }}
                        </button>
                    @endforeach
                    <input type="hidden" name="answers[{{ $questionnaire->id }}]" value="">
                </div>
            @endforeach
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg" id="submitButton" disabled>
                    <i class="fas fa-paper-plane me-2"></i>Kirim Jawaban
                </button>
            </div>
        </form>
        <div class="text-center mt-4">
            <a href="{{ route('dashboard') }}" class="btn btn-success btn-lg">
                <i class="fas fa-home me-2"></i>Kembali ke Dashboard
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('questionnaireForm');
            const questions = form.querySelectorAll('.question');
            const totalQuestions = questions.length;
            const submitButton = document.getElementById('submitButton');
            const timerElement = document.getElementById('timer');

            let answeredQuestions = 0;
            let timeLeft = 30 * 60; // 30 menit dalam detik
            let isTimeUp = false;

            function updateTimer() {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                timerElement.textContent = `Waktu tersisa: ${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                
                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    isTimeUp = true;
                    showLastQuestion();
                    selectUnansweredQuestions();
                    updateSubmitButton();
                } else {
                    timeLeft--;
                }
            }

            function showLastQuestion() {
                questions.forEach((question, index) => {
                    question.classList.remove('active');
                    if (index === totalQuestions - 1) {
                        question.classList.add('active');
                    }
                });
            }

            function selectUnansweredQuestions() {
                questions.forEach((question) => {
                    if (!question.classList.contains('answered')) {
                        const otherOption = question.querySelector('.answer-btn.other-option');
                        if (otherOption) {
                            otherOption.click();
                        }
                    }
                });
            }

            function updateSubmitButton() {
                if (isTimeUp) {
                    // Jika waktu habis, aktifkan tombol hanya jika pertanyaan terakhir dijawab
                    const lastQuestion = questions[totalQuestions - 1];
                    submitButton.disabled = !lastQuestion.classList.contains('answered');
                } else {
                    // Jika waktu masih ada, aktifkan tombol hanya jika semua pertanyaan dijawab
                    submitButton.disabled = answeredQuestions !== totalQuestions;
                }
            }

            const timerInterval = setInterval(updateTimer, 1000);

            form.addEventListener('click', function(e) {
                if (e.target.classList.contains('answer-btn')) {
                    const currentQuestion = e.target.closest('.question');
                    const currentQuestionNumber = parseInt(currentQuestion.dataset.question);
                    const hiddenInput = currentQuestion.querySelector('input[type="hidden"]');
                    const questionnaireId = e.target.dataset.questionnaireId;
                    const categoryQuestionnaireId = e.target.dataset.categoryQuestionnaireId;

                    // Hapus kelas 'selected' dari semua tombol jawaban dalam pertanyaan ini
                    currentQuestion.querySelectorAll('.answer-btn').forEach(btn => btn.classList.remove('selected'));
                    
                    // Tambahkan kelas 'selected' ke tombol yang diklik
                    e.target.classList.add('selected');

                    // Set nilai input tersembunyi
                    hiddenInput.value = JSON.stringify({
                        questionnaire_id: questionnaireId,
                        category_questionnaire_id: categoryQuestionnaireId
                    });

                    // Periksa apakah pertanyaan ini sudah dijawab sebelumnya
                    if (!currentQuestion.classList.contains('answered')) {
                        answeredQuestions++;
                        currentQuestion.classList.add('answered');
                    }

                    // Perbarui status tombol submit
                    updateSubmitButton();

                    if (currentQuestionNumber < totalQuestions && !isTimeUp) {
                        setTimeout(() => {
                            currentQuestion.classList.remove('active');
                            questions[currentQuestionNumber].classList.add('active');
                        }, 300);
                    }
                }
            });

            // Sembunyikan opsi 'Other' saat halaman dimuat
            document.querySelectorAll('.answer-btn.other-option').forEach(btn => {
                btn.style.display = 'none';
            });
        });
    </script>
</body>
</html>