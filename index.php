<?php
require_once(__DIR__.'/vendor/autoload.php');
use Symfony\Component\Finder\Finder;
$finder = new Finder();
$finder->depth('== 3')->files()->in(__DIR__.'/downloads');
foreach ($finder as $file) {
    var_dump($file->getRealPath());
}

?>
<img id="victim" src="" style="width:100%; height:100%">
<script>
    document.getElementById('victim').src = '';
    document.getElementById('victim').onclick = function(e) {
        e.target.src = 'explosion.gif';
        e.target.onclick = function() {
            window.location.reload();
        }
    }
</script>
