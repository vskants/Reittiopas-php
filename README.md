<h2>Reittiopas PHP-library</h2>

This PHP library is for accessing Reittiopas Developer API HTTP GET Interface version 2.

Reittiopas API requires authentication. 

<a href="http://developer.reittiopas.fi/pages/en/http-get-interface-version-2.php">Reittiopas API Documentation</a>

<hr/>


<h3>Example:</h3>

<code>
include_once 'classes/Reittiopas.php';<br/>
include_once 'classes/StopsInArea.php';<br/>
$reittiopas = new Reittiopas("user","password","request coordinate system","response coordinate system","json/xml");<br/>
$stops = new StopsInArea("24.928265,60.187377","3","1500");<br/>

$results = $reittiopas->getCycleRoute($stops);

</code>

