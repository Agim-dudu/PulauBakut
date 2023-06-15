<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Wisata Pulau Bakut</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
    
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
    
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">  
    
        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
        <!-- Libraries Stylesheet -->
        <link href="{{ asset('/') }}assets/lib/animate/animate.min.css" rel="stylesheet">
        <link href="{{ asset('/') }}assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="{{ asset('/') }}assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('/') }}assets/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- Template Stylesheet -->
        <link href="{{ asset('/') }}assets/css/quiz/style.css" rel="stylesheet">
    </head>
    <body>
    <div class="containerr">
        <div class="header">
            <button type="button" class="btn-back">Sebelumnya</button> <!-- Tambahkan tombol "Sebelumnya" -->
            <button type="submit" class="btn-next">Selanjutnya</button>
            <h1>Quiz</h1>
        </div>
        @if(session('score'))
                <h2>
                Nilai Anda: {{ session('score') }}
                </h2><br>
                @endif
            <form action="{{ route('quiz.submit') }}" method="post">
                @csrf
                <input type="hidden" name="page" value="1">
                @foreach ($questions as $question)
                    <div class="question">
                        <h4>{{ $question->question }}</h4>
                        <ul class="options">
                            <li>
                                <input type="radio" name="answers[{{ $question->id }}]" value="a" id="{{ $question->id }}_a">
                                <label for="{{ $question->id }}_a">{{ $question->option_a }}</label>
                            </li>
                            <li>
                                <input type="radio" name="answers[{{ $question->id }}]" value="b" id="{{ $question->id }}_b">
                                <label for="{{ $question->id }}_b">{{ $question->option_b }}</label>
                            </li>
                            <li>
                                <input type="radio" name="answers[{{ $question->id }}]" value="c" id="{{ $question->id }}_c">
                                <label for="{{ $question->id }}_c">{{ $question->option_c }}</label>
                            </li>
                            <li>
                                <input type="radio" name="answers[{{ $question->id }}]" value="d" id="{{ $question->id }}_d">
                                <label for="{{ $question->id }}_d">{{ $question->option_d }}</label>
                            </li>
                        </ul>
                    </div>
                @endforeach
                <button type="submit" class="btn-submit">Submit</button>
            </form>
    </div>
</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.querySelector('form');
        var pageInput = form.querySelector('input[name="page"]');
        var questionContainers = document.querySelectorAll('.question');
        var numQuestionsPerPage = 2;
        var currentPage = 1;
        
        function showPage(page) {
            for (var i = 0; i < questionContainers.length; i++) {
                if (i >= (page - 1) * numQuestionsPerPage && i < page * numQuestionsPerPage) {
                    questionContainers[i].style.display = 'block';
                } else {
                    questionContainers[i].style.display = 'none';
                }
            }
        }
        
        function updatePage() {
            pageInput.value = currentPage;
            showPage(currentPage);
        }
        
        function nextPage() {
            if (currentPage < Math.ceil(questionContainers.length / numQuestionsPerPage)) {
                currentPage++;
                updatePage();
            }
        }
        
        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                updatePage();
            }
        }
        
        var prevButton = document.querySelector('.btn-next');
        prevButton.addEventListener('click', function(event) {
            event.preventDefault();
            nextPage();
        });
        
        var prevButton = document.querySelector('.btn-back');
        prevButton.addEventListener('click', function(event) {
            event.preventDefault();
            prevPage();
        });
        
        updatePage();
    });
</script>
