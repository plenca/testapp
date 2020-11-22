<h1><?=$title?></h1>

<p>Statický Obsah šablony</p>

<p>Zde dynamicky vypište data z tabulky role</p>


<table class="table table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>ROLE</th>
        <th>NÁZEV ROLE</th>
    </tr>
    </thead>
    
    <!--Zde provedete dynamický výpis dat z proměnné
    Použijte cyklus FOREACH - jako např. při výpisu menu v souboru head.php-->
    
    <!-- DOPLNĚNÍ ÚKOLU!-->
    <?php foreach ($role as $key => $colum):?>
    <tbody>    
        <tr>    
            <th>
            <?=$colum['id']?>
            </th>
            <th>
            <?=$colum['role']?>
            </th>
            <th>
            <?=$colum['role_name']?>    
            </th>
        </tr>
    </tbody>
    <?php endforeach;?>    
</table>
