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
    <?php foreach ($text as $key => $hod):?>
    <tbody>    
        <tr>    
            <th>
            <?=$hod['id']?>
            </th>
            <th>
            <?=$hod['role']?>
            </th>
            <th>
            <?=$hod['role_name']?>    
            </th>
        </tr>
        
   
    </tbody>
    <?php endforeach;?>    
        
        
        
    <!--Zde provedete dynamický výpis dat z proměnné
    Použijte cyklus FOREACH - jako např. při výpisu menu v souboru head.php-->
</table>
