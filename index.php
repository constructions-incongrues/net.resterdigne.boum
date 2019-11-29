<?php
require_once(__DIR__.'/vendor/autoload.php');
use Symfony\Component\Finder\Finder;
$finder = new Finder();
$finder->files()->in(__DIR__.'/downloads');
$iterator = iterator_to_array($finder);
$image = array_rand($iterator);
$parts = explode('/', $image);

?>
<img id="victim" src="<?php echo $parts[6].'/'.$parts[7].'/'.$parts[8] ?>" style="width:100%; height:100%">
<script>
    window.setInterval(() => {
        window.location.reload();
    }, 3000);
    document.getElementById('victim').onclick = function(e) {
        e.target.src = 'explosion.gif';
        e.target.onclick = function() {
            window.location.reload();
        }
    }
</script>
