@extends('layouts.index')
@section('titulo')
    SE
@endsection
@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            Akinator
        </div>
        <div class="card-body">
            <p id="question">{{ $currentQuestion }}</p>
            <div id="buttons">
                <button class="btn btn-success" id="yesButton">Sí</button>
                <button class="btn btn-danger" id="noButton">No</button>
            </div>
            <button class="btn btn-secondary" id="backButton" style="display: none;">Regresar</button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var currentQuestion = "{{ $currentQuestion }}";

    $("#yesButton").click(function() {
        answerQuestion('h');
    });

    $("#noButton").click(function() {
        answerQuestion('m');
    });

    $("#backButton").click(function() {
        goBack();
    });

    function answerQuestion(answer) {
        $.ajax({
            type: "POST",
            url: "/answer",
            data: {
                _token: "{{ csrf_token() }}",
                answer: answer,
                question: currentQuestion
            },
            success: function(response) {
                $("#question").text(response.question);
                currentQuestion = response.question;
                if (response.backAvailable) {
                    $("#backButton").show();
                } else {
                    $("#backButton").hide();
                }
            }
        });
    }

    function goBack() {
        $.ajax({
            type: "POST",
            url: "/akinator/back",
            data: {
                _token: "{{ csrf_token() }}",
                question: currentQuestion
            },
            success: function(response) {
                $("#question").text(response.question);
                currentQuestion = response.question;
                if (response.backAvailable) {
                    $("#backButton").show();
                } else {
                    $("#backButton").hide();
                }
            }
        });
    }
});
</script>
@endsection





