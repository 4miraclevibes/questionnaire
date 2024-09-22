<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Kuesioner</title>
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
        }
        .answer-btn.selected {
            background-color: #007bff;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container questionnaire-container">
        <h1 class="text-center mb-5">Hasil Kuesioner dari <span class="text-primary">{{ $questionnaireResult->user->name }}</span></h1>
        
        <div class="mb-4">
            <p><strong>Email:</strong> {{ $questionnaireResult->user->email }}</p>
        </div>

        @foreach ($questionnaireResult->questionnaireResultDetails as $index => $detail)
            <div class="mb-4">
                <p class="mb-3">
                    <span class="question-number">Pertanyaan {{ $loop->iteration }}:</span>
                    {{ $detail->questionnaire->description }}
                </p>
                @foreach ($detail->questionnaire->categoryQuestionnaires as $categoryQuestionnaire)
                    <button type="button" class="btn answer-btn {{ $detail->categoryQuestionnaire->id == $categoryQuestionnaire->id ? 'selected' : '' }}" disabled>
                        {{ $categoryQuestionnaire->description }}
                    </button>
                @endforeach
            </div>
        @endforeach

        <div class="text-center mt-4">
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-home me-2"></i>Kembali ke Dashboard
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>