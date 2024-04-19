<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Rezerwacja</title>
</head>
<body style="text-align: center">
<form method="post" action="">
  <label for="ilosc">Ilość ludzi: </label>
  <br>
  <select name="ilosc" id="ilosc">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
  </select>
  <br>
  <input type="text" name="imie" id="imie" placeholder="Imie"><br>
  <input type="text" name="nazwisko" id="nazwisko" placeholder="Nazwisko"><br>
  <input type="text" name="adres" id="adres" placeholder="Adres"><br>
  <input type="number" name="blik" id="blik" maxlength="6" placeholder="Blik" pattern="[0-9]{6}"><br>
  <label for="data przyjazdu">Data przyjazdu:</label><br>
  <input type="date" name="data przyjazdu" id="data przyjazdu"><br>
  <label for="data wyjazdu">Data wyjazdu:</label><br>
  <input type="date" name="data wyjazdu" id="data wyjazdu"><br>
  <input type="checkbox" id="popielniczka" name="popielniczka">
  <label for="popielniczka">Popielniczka: </label><br>
  <input type="checkbox" id="klimatyzacja" name="klimatyzacja">
  <label for="klimatyzacja">Klimatyzacja: </label><br>
  <input type="checkbox" id="lozko" name="lozko">
  <label for="lozko">Łóżko dla dziecka</label><br><br>

  <button type="submit">Zarezerwuj</button><br>
</form>
<div class="book">
  <?php
            if ($_POST){
                $ilosc = $_POST['ilosc'];
                $imie = $_POST['imie'];
                $nazwisko = $_POST['nazwisko'];
                $adres = $_POST['adres'];
                $blik = $_POST['blik'];
                $data przyjazdu = $_POST['data przyjazdu'];
                $data wyjazdu = $_POST['data wyjazdu'];
                $popielniczka = $_POST['popielniczka'];
                $klimatyzacja = $_POST['klimatyzacja'];
                $lozko = $_POST['lozko'];

  echo "<p>Ilość ludzi: $ilosc</p>";
  echo "<p>Imie: $imie</p>";
  echo "<p>Nazwisko: $nazwisko</p>";
  echo "<p>Adres: $adres</p>";
  echo "<p>Transakcja blik zatwierdzona</p>";
  echo "<p>Data przyjazdu: $data przyjazdu</p>";
  echo "<p>Data wyjazdu: $data wyjazdu</p>";
  echo "<p>Czy popielniczka: $popielniczka</p>>";
  echo "<p>Czy klimatyzacja: $klimatyzacja</p>>";
  echo "<p>Czy łóżko dla dziecka: $lozko</p>>";
  }
  ?>
</div>
</body>
</html>
