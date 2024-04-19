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

  <?php
  if (isset($_POST['ilosc'])) {
      $ilosc_osob = intval($_POST['ilosc']);
      for ($i = 1; $i <= $ilosc_osob; $i++) {
          echo "<p>Osoba $i:</p>";
  echo "<input type='text' name='imie$i' placeholder='Imię osoby $i'><br>";
  echo "<input type='text' name='nazwisko$i' placeholder='Nazwisko osoby $i'><br>";
  echo "<input type='text' name='adres$i' placeholder='Adres osoby $i'><br>";
  echo "<br>";
  }
  }
  ?>

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
  if ($_POST) {
      $ilosc = $_POST['ilosc'];
      $blik = $_POST['przelew'];
      $data_przyjazdu = $_POST['data_przyjazdu'];
      $data_wyjazdu = $_POST['data_wyjazdu'];
      $popielniczka = isset($_POST['popielniczka']) ? 'Tak' : 'Nie';
      $klimatyzacja = isset($_POST['klimatyzacja']) ? 'Tak' : 'Nie';
      $lozko = isset($_POST['lozko']) ? 'Tak' : 'Nie';

  echo "<p>Ilość ludzi: $ilosc</p>";

  for ($i = 1; $i <= $ilosc; $i++) {
    $imie = $_POST["imie$i"];
    $nazwisko = $_POST["nazwisko$i"];
    $adres = $_POST["adres$i"];
    echo "<h3>Dane osoby $i:</h3>";
    echo "<p>Imię: $imie</p>";
    echo "<p>Nazwisko: $nazwisko</p>";
  }
  echo "<p>Adres: $adres</p>";
  echo "<p>Transakcja blik zatwierdzona</p>";
  echo "<p>Data przyjazdu: $data_przyjazdu</p>";
  echo "<p>Data wyjazdu: $data_wyjazdu</p>";
  echo "<p>Czy popielniczka: $popielniczka</p>";
  echo "<p>Czy klimatyzacja: $klimatyzacja</p>";
  echo "<p>Czy łóżko dla dziecka: $lozko</p>";
  }
  ?>
</div>
</body>
</html>
