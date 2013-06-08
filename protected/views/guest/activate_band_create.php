activate_band_create

<?php

echo isset($bands) ? "T" : "F";

echo CHtml::Link("Now create your band...", array('band/create'));


?>

