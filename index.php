<?php
require_once(__DIR__.'/vendor/autoload.php');

use Symfony\Component\Finder\Finder;

$finder = new Finder();
$finder->files()->in(__DIR__.'/downloads');
$iterator = iterator_to_array($finder);
$image = array_rand($iterator);
$partsImage = explode('/', $image);

$finder = new Finder();
$finder->files()->in(__DIR__.'/downloads');
$iterator = iterator_to_array($finder);
$image = array_rand($iterator);
$partsPunition = explode('/', $image);

?>

<img src="<?php echo $parts[6].'/'.$parts[7].'/'.$parts[8] ?>" style="width:100%; height:100%">

<script>
    window.setInterval(() => {
        window.location.reload();
    }, 1500);
    document.getElementById('victim').onclick = function(e) {
        if (e.target.src.match(/victim/)) {
            console.log('ASSASSIN !');
        } else {
            console.log('BRAVO !');
        }
        e.target.src = '<?php echo $parts[6].'/'.$parts[7].'/'.$parts[8] ?>';
        e.target.onclick = function() {
            window.location.reload();
        }
    }
</script>
