<?php include('includes/header.php');?>

<!-- page content starts here   -->

<?php
$emp_id=$_SESSION['emp_id'];
$date=date('Y-m-d');



//for purchase---------------------------------
if($_SESSION['emp_designation'] == 'admin'){
$purchase_sum = "SELECT SUM(purchase_receipt_grand_total) FROM `purchase_receipt` WHERE  purchase_receipt_date='$date'";
}
else
{
$purchase_sum = "SELECT SUM(purchase_receipt_grand_total) FROM `purchase_receipt` WHERE purchase_receipt_employee_id= $emp_id AND purchase_receipt_date='$date'";    
}
 $purchase_sum_result = mysqli_query($connect,$purchase_sum);
$get_sum=0;
while($row= mysqli_fetch_row( $purchase_sum_result))
{
    $get_sum=$row[0];
}
 if($get_sum == "")
 { 
     $get_sum = 0; 
 }
//puchase close---------------------------------------





//for sales-------------------------------------------


if($_SESSION['emp_designation'] == 'admin')
{
$sales_sum = "SELECT SUM(sales_receipt_grand_total) FROM `sales_receipt` WHERE sales_receipt_delete_flag=0 AND sales_receipt_date='$date'";
}
else
{    
$sales_sum = "SELECT SUM(sales_receipt_grand_total) FROM `sales_receipt` WHERE sales_receipt_employee_id= $emp_id AND sales_receipt_delete_flag=0 AND sales_receipt_date='$date'";
}

$sales_sum_result = mysqli_query($connect,$sales_sum);
$get_sales_sum=0;
 while($row1= mysqli_fetch_row( $sales_sum_result)){
        $get_sales_sum=$row1[0];
        }

 if($get_sales_sum == "")
 { 
     $get_sales_sum = 0; 
 }
//sales close----------------------------------------------






//expense--------------------------------------------------
if($_SESSION['emp_designation'] == 'admin'){
$expense_sum="SELECT SUM(expense_amount) FROM `expense` WHERE expense_date='$date'";
}
else
{
$expense_sum="SELECT SUM(expense_amount) FROM `expense` WHERE expense_employee_id= $emp_id AND expense_date='$date'";    
}

$expense_sum_result=mysqli_query($connect,$expense_sum);
$get_expense_sum=0;
while($row2= mysqli_fetch_row($expense_sum_result)){
    $get_expense_sum=$row2[0];
}

 if($get_expense_sum == "")
 { 
     $get_expense_sum = 0; 
 }
   
//expense close----------------------------------------------


$batch_products="SELECT batch.*,`product`.product_name FROM `batch` INNER JOIN product WHERE batch.batch_product_id=product.product_id AND batch.product_quantity < 100";
$batch_products_result=mysqli_query($connect,$batch_products);

?>

<h2>Dashboard</h2>
<!--<i class="material-icons">cloud</i>-->

<div class="section-admin container-fluid mt-5">
    <div class="row admin text-center">
        <div class="col-md-12 ">
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4 col-s-12 mt-1 ">
                    <div class="admin-content analysis-progrebar-ctn res-mg-t-15  bg-light  p-2">
                        <div class="text-left text-uppercase h4 ">Total Sales</div>
                        <div class="row vertical-center-box vertical-center-box-tablet">
                            <div class="col-sm-9 h2 text-left">
                                <span style="font-family:Times New Roman;"> &#8377;</span>
                                <?php echo $get_sales_sum;?>
                            </div>
                        </div>
                        <div class="progress progress-mini">
                            <div style="width: 30%;" class="progress-bar bg-green"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-s-12 mt-1 ">
                    <div class="admin-content analysis-progrebar-ctn res-mg-t-15  bg-light  p-2">
                        <div class="text-left text-uppercase h4 ">Total Expenses</div>
                        <div class="row vertical-center-box vertical-center-box-tablet">
                            <div class="col-sm-9 h2 text-left">
                                <span style="font-family:Times New Roman;"> &#8377;</span>
                                <?php echo $get_expense_sum;?>
                            </div>
                        </div>
                        <div class="progress progress-mini">
                            <div style="width: 60%;" class="progress-bar bg-warning text-center">60%</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-s-12 mt-1 ">
                    <div class="admin-content analysis-progrebar-ctn res-mg-t-15  bg-light p-2 ">
                        <div class="text-left text-uppercase h4 ">Total Purchase</div>
                        <div class="row vertical-center-box vertical-center-box-tablet">
                            <div class="col-sm-9 h2 text-left">
                                <span style="font-family:Times New Roman;"> &#8377;</span>
                                <?php echo $get_sum;?>

                            </div>
                        </div>
                        <div class="progress progress-mini">
                            <div style="width: 30%;" class="progress-bar bg-green"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--chRT-->



<!--<canvas id="myChart"></canvas>-->
<!--
<div class="row mt-5">
    <div class="col-xl-12 m-auto">
        <canvas id="myChart"></canvas>
    </div>
</div>
-->



<!--products details------------------------------------------------------------------->

<div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="">
            <thead class="bg-light">
                <tr>
                    <th>ProductId</th>
                    <th>ProductBarcode</th>
                    <th>ProductName</th>
                    <th>ProductExpiry</th>
                    <th>Product Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row3=mysqli_fetch_assoc($batch_products_result)){

    $newdate=date_create($row3['product_expiry']);
    $datediff=date_diff(date_create(date("Y-m-d")),$newdate);
    ?>
                <tr>
                    <td>
                        <?php echo $row3[ 'batch_id']; ?>
                    </td>
                    <td>
                        <?php echo $row3 ['product_barcode_no'] ;?>
                    </td>
                    <td>
                        <?php echo $row3[ 'product_name']." " .$row3['product_unit'] ;?>
                    </td>
                    <td>
                        <?php echo ($datediff->format("%R%a days")>30)?date('d-m-Y', strtotime($row3['product_expiry'])) : "<span class='text-danger font-weight-bold'>".date('d-m-Y', strtotime($row3['product_expiry']))."</span>" ?>
                    </td>
                    <td>
                        <?php echo ($row3[ 'product_quantity']>=50)? $row3['product_quantity'] : "<span class='text-danger font-weight-bold'>".$row3[ 'product_quantity']."</span>" ;?>
                    </td>
                </tr>
                <?php  }    ?>
            </tbody>
        </table>
    </div>
</div>




<?php $var=date(strtotime($date));


$var1=date('d-m-y',$var+86400);





    $aagekidate=(date((strtotime($date))-86400*7));



$aajkidate=date((strtotime($date)));


$countx=86400/1;

?>
<!--
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: [<?php while($aajkidate > $aagekidate)
                    {
                        $aajkidate=$aajkidate-$countx;
                        echo '"'.date('d-m-Y',$aajkidate);
                        echo '('.date('D',$aajkidate).')",';
                    }
                     ?>],
            datasets: [{
                label: "SALES",
                backgroundColor: '#343a40',
                borderColor: 'green',
                data: [<?php

                       for($i=1;$i<=21;$i++){
                           echo ($aajkidate+=$aajkidate).',';
                       }

                       ?>],
            }]
        },

        // Configuration options go here
        options: {}
    });

</script>
-->

<!-------------------------footer-------->
<?php include('includes/footer.php');?>
