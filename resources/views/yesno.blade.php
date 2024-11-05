<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YesNo App</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div style="text-align: center; margin-top: 50px;">
    <input type="text" id="question" placeholder="Escribe tu pregunta aquí" style="margin-bottom: 10px;">
    <br>
    <button id="askButton">Hazme una pregunta</button>
    <div id="error" style="color: red; margin-top: 10px;"></div>
    <div id="answer" style="margin-top: 20px; font-size: 24px;"></div>
    <img id="gif" style="margin-top: 20px; max-width: 100%; height: auto;" />
</div>

<script>
    $(document).ready(function() {
        $('#askButton').click(function() {
            const question = $('#question').val().trim();
            const errorElement = $('#error');
            errorElement.text('');

            // Validación para verificar si el texto es una pregunta
            if (question === '' || !question.endsWith('?')) {
                errorElement.text('Por favor, introduce una pregunta válida que termine con un signo de interrogación.');
                return;
            }

            $.ajax({
                url: '/get-answer',
                method: 'GET',
                success: function(response) {
                    $('#answer').text(response.answer);
                    $('#gif').attr('src', response.image);
                },
                error: function() {
                    $('#answer').text('Ocurrió un error al obtener la respuesta.');
                    $('#gif').attr('src', '');
                }
            });
        });
    });
</script>
</body>
</html>
