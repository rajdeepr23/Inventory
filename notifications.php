<?php ob_start(); ?>
<?php include('includes/header.php')?>


<div class="container">
                   <h3 class="my-3">All Notifications</h3>
                    <table class="table_id table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Sr_No</th>
                                <th>Details</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Notified To</th>
                                <th>Read By</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
        
   $query_selecting_all_sales= "SELECT * FROM `notifications`";
                    
   $query_selecting_all_sales_result  = mysqli_query($connect,$query_selecting_all_sales);
   while($row= mysqli_fetch_row($query_selecting_all_sales_result)){
            ?>
                            <tr>
                                <td class="text-center">
                                    <a href="#" data-toggle="modal"><i class="fa fa-eye mx-2" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <?php echo $row[0];?>
                                </td>
                                <td>
                                    <?php echo $row[1];?>
                                </td>
                                <td>
                                    <?php echo  date('d-m-Y', strtotime($row[2]));?>
                                </td>
                                <td>
                                    <?php echo  date('h:i a', strtotime($row[2]));?>
                                </td>
                                <td><strong>
                                <?php
                                    echo str_replace(',',' / ',strtoupper(substr_replace($row[3]," ",",",1)));
       ?>
                                    </strong>
                                </td>
                                <td>
                                    <?php echo $row[4];?>
                                </td>
                                
                            

                            </tr>

                            <div class="modal fade bd-example-modal-lg" id="restore<?php echo $restoreId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content container">

                                        <div class="header my-3 h3">Delete sales Receipt</div>

                                        <div class="header-body my-3">

                                            <h5> Do you really want to Delete sales Receipt
                                                <?php echo $restoreId; ?>?
                                            </h5>

                                            <br>
                                            <form method="post">
                                                <div class="mt-1">
                                                    <button type="submit" name="restoreSales" value="<?php echo $restoreId?>" class="btn btn-success px-4">Yes</button>
                                                    <button class="btn btn-warning">Cancel</button>
                                                </div>

                                            </form>




                                        </div>

                                    </div>
                                </div>
                            </div>

                            <?php } ?>

                        </tbody>

                    </table>
                </div>






<?php include('includes/footer.php')?>
