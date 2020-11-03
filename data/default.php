<?php
    $title = 'Výchozí stránka s úkolem';
    require_once 'inc/head.php';
?>

<h1>Doplňte formulář</h1>

<ul>
    <li>
        Vytvořte jednoduchý formulář (v bootstrap), který bude obsahovat 2 textová pole, jedno zaškrtávací pole a odesílací tlačítko.
    </li>
    <li>
        Pole libovolně pojmenujte, účel formuláře je libovolný. Po odeslání formuláře na straně serveru pouze zachyťte tato data a uložte je pomocí Tracy do souborového logo s názvem data.post
    </li>
</ul>

<h1>Můj formulář</h1>
<p>
    Mail jsem naplno pochopil, když jsem spustil váš git na serveru. Je to "prasečinka", ale zapisuje. ;)
</p>

<form method="POST">
  <div class="form-group">
    <label for="text1">Text1:</label>
    <input type="text" class="form-control" name="text1">
  </div>
  <div class="form-group">
    <label for="text2">Text2:</label>
    <input type="text" class="form-control" name="text2">
  </div>
  <div class="checkbox">
      <label><input type="checkbox" name="zaskrtitko" value="yes"> Zaškrtnutí</label>
  </div>
  <button type="submit" class="btn btn-default">Odeslání</button>
</form> 

<?php
// Instrukce k úkolu
// Formulář vytvoříte klasicky z HTML
// Jeho odeslání metodou POST zachytíte jako údaje v objektu REQUEST
// Data získaná z tohoto objektu zatím stačí pouze zalogovat pomoví Debbugeru
//$a = $_POST['text1'];
//print_r($a);

//var_dump($_POST);
\Tracy\Debugger::log($_POST);