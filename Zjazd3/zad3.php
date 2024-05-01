<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operacje na katalogach</title>
</head>
<body>
    <h2>Operacje na katalogach</h2>
    <form action="" method="post">
        <label for="path">Ścieżka katalogu:</label>
        <input type="text" name="path" id="path"><br>
        <label for="directory">Nazwa katalogu:</label>
        <input type="text" name="directory" id="directory"><br>
        <label for="operation">Operacja:</label>
        <select name="operation" id="operation">
            <option value="read">Odczyt</option>
            <option value="delete">Usuń</option>
            <option value="create">Stwórz</option>
        </select><br>
        <button type="submit">Wykonaj operację</button>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $path = isset($_POST['path']) ? $_POST['path'] : '';
            $directory = isset($_POST['directory']) ? $_POST['directory'] : '';
            $operation = isset($_POST['operation']) ? $_POST['operation'] : 'read';
            
            handleDirectory($path, $directory, $operation);
        }

        function handleDirectory($path, $directory, $operation = 'read') {
            if (substr($path, -1) !== '/') {
                $path .= '/';
            }

            switch ($operation) {
                case 'read':
                    if (is_dir($path . $directory)) {
                        $elements = scandir($path . $directory);
                        echo "<p>Zawartość katalogu $directory:</p>";
                        echo "<ul>";
                        foreach ($elements as $element) {
                            if ($element !== '.' && $element !== '..') {
                                echo "<li>$element</li>";
                            }
                        }
                        echo "</ul>";
                    } else {
                        echo "<p>Katalog $directory nie istnieje.</p>";
                    }
                    break;
                case 'delete':
                    if (is_dir($path . $directory)) {
                        if (count(glob($path . $directory . '/*')) === 0) {
                            if (rmdir($path . $directory)) {
                                echo "<p>Katalog $directory został pomyślnie usunięty.</p>";
                            } else {
                                echo "<p>Błąd podczas usuwania katalogu $directory.</p>";
                            }
                        } else {
                            echo "<p>Katalog $directory nie jest pusty.</p>";
                        }
                    } else {
                        echo "<p>Katalog $directory nie istnieje.</p>";
                    }
                    break;
                case 'create':
                    if (!is_dir($path . $directory)) {
                        if (mkdir($path . $directory)) {
                            echo "<p>Katalog $directory został pomyślnie utworzony.</p>";
                        } else {
                            echo "<p>Błąd podczas tworzenia katalogu $directory.</p>";
                        }
                    } else {
                        echo "<p>Katalog $directory już istnieje.</p>";
                    }
                    break;
                default:
                    echo "<p>Niepoprawna operacja.</p>";
            }
        }
    ?>
</body>
</html>
