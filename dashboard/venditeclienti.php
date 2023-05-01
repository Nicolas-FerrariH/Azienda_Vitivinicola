<?php  

require('../_db_dal_inc.php');
require('../_config_inc.php');

$conn=db_connect();
$vendite=vendite_cliente($conn,3);
?>


<?php include('header_dashboard.php');?>

        <h1>Vendite</h1>
        
        <hr class="posth1" style="border-color: #ffd900;">

            <div class="row">
                <div class="col-7">
                    <table class="table  table-hover table-responsive">
                        <tr>
                            <th>Cliente</th>
                            <th>Numero bottiglie</th>
                            <th>Data</th>
                            <th>Prodotto</th>
                        </tr>
                        <tr>
                        <?php foreach($vendite as $row){?>
                            <tr>
                                <td><?=$row['nome']?></td>
                                <td><?=$row['numero']?></td>
                                <td><?=$row['data']?></td>
                                <td><?=$row['nomevino']?></td>
                            </tr>
                        <?php }?>
                        </tr>
                    </table>
                </div>
                <div class="col-4"><canvas id="graficovendite" style="width: 400px; height: 400px; margin-left:100px;"></canvas></div>
            </div>
        
    </div>

    
</body>

</html>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var privati=50;
    var aziende=50;

    const ctx=document.getElementById("graficovendite");
    new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Privati', 'Aziende'],
        datasets: [{
        data: [privati,aziende],
        borderWidth: 1,
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)'
    ],
    hoverOffset: 4

        }]
    },
    });
</script>

