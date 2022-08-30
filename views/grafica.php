<?php 

require_once '../Class/Residuo.php';

$sumInventory = Residuo::getInvetorySum($_GET['id']);


?>

<script>
    

const ctx = document.getElementById('grafica').getContext('2d');



var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
};


const colors = [];
<?php foreach  ($sumInventory as $key) { ?>
    colors.push(dynamicColors());
<?php }?>

const data = {
    labels: [
        <?php foreach ($sumInventory as $key) {
            echo "'".$key->nombre."',";
        } ?>
    ],
    datasets: [{
      label: 'Sumatoria de Inventario',
      data: [
        <?php foreach ($sumInventory as $key) {
            echo "".$key->cantidad.",";
        } ?>
      ],
      backgroundColor: colors,
      hoverOffset: 4
    }]
  };
  
const MiGrafica = new Chart(ctx, {
    type: 'pie',
    data: data
})


</script>