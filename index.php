<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Senha</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Gerador de Senhas Aleatórias</h2>
        <form method="post">
            <label for="tamanho">Tamanho da Senha:</label>
            <input type="number" name="tamanho" min="4" max="20" value="12" required>

            <label><input type="checkbox" name="maiusculas"> Incluir Letras Maiúsculas</label>
            <label><input type="checkbox" name="numeros"> Incluir Números</label>
            <label><input type="checkbox" name="especiais"> Incluir Caracteres Especiais</label>

            <button type="submit">Gerar Senha</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tamanho = $_POST["tamanho"];
            $caracteres = 'abcdefghijklmnopqrstuvwxyz';
            
            if (isset($_POST["maiusculas"])) $caracteres .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            if (isset($_POST["numeros"])) $caracteres .= '0123456789';
            if (isset($_POST["especiais"])) $caracteres .= '!@#$%^&*()-_=+';

            $senha = '';
            for ($i = 0; $i < $tamanho; $i++) {
                $senha .= $caracteres[random_int(0, strlen($caracteres) - 1)];
            }

            echo "<p>Sua senha gerada: <strong>$senha</strong></p>";
        }
        ?>
    </div>
</body>
</html>
