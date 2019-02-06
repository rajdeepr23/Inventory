<?php include('includes/header.php')?>


<section>

    <div class="h3 mb-3">Deleted Items</div>
    <div class="container-fluid">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="trashTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#sales_trash" role="tab">Sales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#purchases_trash" role="tab">Purchases</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#expense_trash" role="tab">Expenses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#products_trash" role="tab">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#customer_trash" role="tab">Customers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#vendor_trash" role="tab">Vendors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#employee_trash" role="tab">Employees</a>
            </li>
        </ul>

        <div class="tab-content py-3">
            <!-------------------------------------- sales -------------------------------------->
            <div class="tab-pane active" id="sales_trash" role="tabpanel" aria-labelledby="home-tab">

                <div class="container">
                    <table class="table_id table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Update details</th>
                                <th>Sales Id</th>
                                <th>Date</th>
                                <th>Customer Id</th>
                                <th>Employee Id</th>
                                <th>Invoice No</th>
                                <th>Mode of payment</th>
                                <th>Cheque No</th>
                                <th>Bank Details</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
        
   $query_selecting_all_sales= "SELECT * FROM `sales_receipt` WHERE sales_receipt_delete_flag = '1' ";
                    
   $query_selecting_all_sales_result  = mysqli_query($connect,$query_selecting_all_sales);
   while($row= mysqli_fetch_row($query_selecting_all_sales_result)){
       $restoreId = $row[0];
            ?>
                            <tr>
                                <td class="text-center">
                                    <a href="#restore<?php echo $restoreId;?>" data-toggle="modal"><i class="fa fa-trash mx-2" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <?php echo $row[13];?>
                                </td>
                                <td>
                                    <?php echo $row[0];?>
                                </td>
                                <td>
                                    <?php echo $row[1];?>
                                </td>
                                <td>
                                    <?php echo $row[2];?>
                                </td>
                                <td>
                                    <?php echo $row[3];?>
                                </td>
                                <td>
                                    <?php echo $row[4];?>
                                </td>
                                <td>
                                    <?php echo $row[5];?>
                                </td>
                                <td>
                                    <?php echo $row[6];?>
                                </td>
                                <td>
                                    <?php echo $row[7];?>
                                </td>
                                <td>
                                    <?php echo $row[8];?>
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

            </div>

            <?php    

            if(isset($_POST['restoreSales'])){
                
            $query_for_s_r_restore= "DELETE FROM sales_receipt WHERE `sales_receipt_id`=$_POST[restoreSales]";    
            $query_for_s_r_restore_result = mysqli_query($connect,$query_for_s_r_restore);    
                
            $query_for_s_restore= "DELETE FROM sales WHERE `sales_receipt_id`=$_POST[restoreSales]";  
            $query_for_s_restore_result  = mysqli_query($connect,$query_for_s_restore); 
                
            if($query_for_s_restore_result){
            header("location:trash.php");
            } 
                
            }                
            

?>



            <!-------------------------------------- sales end -------------------------------------->


            <!-------------------------------------- purchase starts -------------------------------------->


            <div class="tab-pane" id="purchases_trash" role="tabpanel" aria-labelledby="home-tab">
                <div class="container">
                    <table class="table_id table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Id</th>
                                <th>Vendor Id</th>
                                <th>Employee Id</th>
                                <th>Inovice No</th>
                                <th>Payment Mode</th>
                                <th>Cheque No</th>
                                <th>Bank</th>
                                <th>Amount</th>
                                <th>Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
        
   $query_selecting_all_purchase= "SELECT purchase_receipt.*,vendors.vendor_company_name,employee.employee_first_name,employee.employee_last_name FROM vendors INNER JOIN purchase_receipt ON purchase_receipt.purchase_receipt_vendor_id = vendors.vendors_id INNER JOIN employee ON purchase_receipt.purchase_receipt_employee_id = employee.employee_id WHERE purchase_receipt_delete_flag = '1' ";
                    
   $query_selecting_all_purchase_result  = mysqli_query($connect,$query_selecting_all_purchase);
   while($row= mysqli_fetch_row($query_selecting_all_purchase_result)){
       $p_delete = $row[0];
            ?>
                            <tr>
                                <td class="text-center">
                                    <a href="#p_delete<?php echo $p_delete;?>" data-toggle="modal"><i class="fa fa-trash mx-2" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <?php echo $row[0];?>
                                </td>
                                <td>
                                    <?php echo $row[12];?>
                                </td>
                                <td>
                                    <?php echo $row[13]." ".$row[14];?>
                                </td>

                                <td>
                                    <?php echo $row[3];?>
                                </td>
                                <td>
                                    <?php echo $row[4];?>
                                </td>
                                <td>
                                    <?php echo $row[5];?>
                                </td>
                                <td>
                                    <?php echo $row[6];?>
                                </td>
                                <td>
                                    <?php echo $row[7];?>
                                </td>
                                <td>
                                    <?php echo $row[8];?>
                                </td>

                            </tr>

                            <div class="modal fade bd-example-modal-lg" id="p_delete<?php echo $p_delete;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content container">

                                        <div class="header my-3 h3">Delete sales Receipt</div>

                                        <div class="header-body my-3">

                                            <h5> Do you really want to Delete Purchase Receipt
                                                <?php echo $p_delete; ?>?
                                            </h5>

                                            <br>
                                            <form method="post">
                                                <div class="mt-1">
                                                    <button type="submit" name="deletePurchase" value="<?php echo $p_delete?>" class="btn btn-success px-4">Yes</button>
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

            </div>



            <?php    

            if(isset($_POST['deletePurchase'])){
                
            $query_for_p_r_restore= "DELETE FROM purchase_receipt WHERE `purchase_receipt_id`=$_POST[deletePurchase]";    
            $query_for_p_r_restore_result = mysqli_query($connect,$query_for_p_r_restore);    
                
            $query_for_p_restore= "DELETE FROM purchase WHERE `purchase_receipt_id`=$_POST[deletePurchase]";  
            $query_for_p_restore_result  = mysqli_query($connect,$query_for_p_restore); 
                
            if($query_for_p_restore_result){
            header("location:trash.php");
            } 
                
            }                
            

?>
            <!------------------------------------------purchase ends-------------------------------------     -->



            <!------------------------------------------expense starts-------------------------------------     -->



            <div class="tab-pane" id="expense_trash" role="tabpanel" aria-labelledby="home-tab">
                <div class="container">
                    <table class="table_id table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Expense Id</th>
                                <th>Expense Employee Id</th>
                                <th>Expense Type</th>
                                <th>Expense Name</th>
                                <th>Expense Comment</th>
                                <th>Expense Amount</th>
                                <th>Expense Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
        
    $query= "SELECT * FROM `expense` WHERE `expense_delete_flag` = '1'";
   $query_result  = mysqli_query($connect,$query);
   while($row= mysqli_fetch_row($query_result)){
       $e_delete = $row[0];
            ?>
                            <tr>
                                <td class="text-center">
                                    <a href="#e_delete<?php echo $e_delete;?>" data-toggle="modal"><i class="fa fa-trash mx-2" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <?php echo $row[0];?>
                                </td>
                                <td>
                                    <?php echo $row[1];?>
                                </td>
                                <td>
                                    <?php echo $row[2];?>
                                </td>

                                <td>
                                    <?php echo $row[3];?>
                                </td>
                                <td>
                                    <?php echo $row[4];?>
                                </td>
                                <td>
                                    <?php echo $row[5];?>
                                </td>
                                <td>
                                    <?php echo $row[6];?>
                                </td>

                            </tr>

                            <div class="modal fade bd-example-modal-lg" id="e_delete<?php echo $e_delete;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content container">

                                        <div class="header my-3 h3">Delete Expense Receipt</div>

                                        <div class="header-body my-3">

                                            <h5> Do you really want to Delete Expense Receipt
                                                <?php echo $e_delete; ?>?
                                            </h5>

                                            <br>
                                            <form method="post">
                                                <div class="mt-1">
                                                    <button type="submit" name="deleteExpense" value="<?php echo $e_delete?>" class="btn btn-success px-4">Yes</button>
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

            </div>



            <?php    

            if(isset($_POST['deleteExpense'])){
                
            $query_for_p_r_restore= "DELETE FROM expense WHERE `expense_id`=$_POST[deleteExpense]";
//                echo $query_for_p_r_restore;
            $query_for_p_r_restore_result = mysqli_query($connect,$query_for_p_r_restore);    
          
                
            if($query_for_p_r_restore){
            header("location:trash.php");
            } 
                
            }                
            

?>
            <!-------------------------------------------------expense ends------------------------------------------->


            <!---------------------------------products starts-------------------------------------   -->

            <div class="tab-pane" id="products_trash" role="tabpanel" aria-labelledby="home-tab">
                <div class="container">
                    <table class="table_id table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Id</th>
                                <th>barcode</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Cat</th>
                                <th>Type</th>
                                <th>Brand</th>
                                <th>Des</th>
                                <th>tax</th>
                                <th>BatchID</th>
                                <th>productid</th>
                                <th>unit</th>
                                <th>p_rate</th>
                                <th>salerate</th>
                                <th>mrp</th>
                                <th>Expiry</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
        
   $query_selecting_all_purchase= "SELECT product.*,batch.* FROM product LEFT JOIN batch ON product.product_id = batch.batch_product_id WHERE product_delete_flag = '0' ORDER BY batch_product_id DESC";
                    
   $query_selecting_all_purchase_result  = mysqli_query($connect,$query_selecting_all_purchase);
   while($row213= mysqli_fetch_row($query_selecting_all_purchase_result)){
       $pr_delete = $row213[0];
            ?>
                            <tr>
                                <td class="text-center">
                                    <a href="#pr_delete<?php echo $pr_delete;?>" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <?php echo $row213[0];?>
                                </td>
                                <td>
                                    <?php echo $row213[16];?>
                                </td>
                                <td class="text-nowrap">
                                    <?php echo $row213[4];?>
                                </td>
                                <td>
                                    <?php echo $row213[14];?>
                                </td>
                                <td>
                                    <?php echo $row213[1];?>
                                </td>
                                <td>
                                    <?php echo $row213[2];?>
                                </td>
                                <td>
                                    <?php echo $row213[3];?>
                                </td>
                                <td>
                                    <?php echo $row213[5];?>
                                </td>
                                <td>
                                    <?php echo $row213[6];?>
                                </td>
                                <td>
                                    <?php echo $row213[7];?>

                                </td>
                                <td>
                                    <?php echo $row213[9];?>
                                </td>
                                <td>
                                    <?php echo $row213[10];?>
                                </td>
                                <td>
                                    <?php echo $row213[11];?>
                                </td>
                                <td>
                                    <?php echo $row213[12];?>
                                </td>
                                <td>
                                    <?php echo $row213[13];?>
                                </td>

                                <td>
                                    <?php echo $row213[15];?>
                                </td>
                            </tr>

                            <div class="modal fade bd-example-modal-lg" id="pr_delete<?php echo $pr_delete;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content container">

                                        <div class="header my-3 h3">Delete sales Receipt</div>

                                        <div class="header-body my-3">

                                            <h5> Do you really want to Delete Purchase Receipt
                                                <?php echo $pr_delete; ?>?
                                            </h5>

                                            <br>
                                            <form method="post">
                                                <div class="mt-1">
                                                    <button type="submit" name="deleteProduct" value="<?php echo $pr_delete?>" class="btn btn-success px-4">Yes</button>
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

            </div>



            <?php    

            if(isset($_POST['deleteProduct'])){
                
            $query_for_pr_r_restore= "DELETE FROM product WHERE `product_id`=$_POST[deleteProduct]";    
            $query_for_pr_r_restore_result = mysqli_query($connect,$query_for_pr_r_restore);    
     
            if($query_for_pr_r_restore_result){
            header("location:trash.php");
            } 
                
            }                
            

?>


            <!--------------------------------products ends--------------------------------------------------      -->



            <!--------------------------------customer starts---------------------------------------------------->
            <div class="tab-pane" id="customer_trash" role="tabpanel" aria-labelledby="home-tab">
                <div class="container">
                    <table class="table_id table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Customer Id</th>
                                <th>Name</th>
                                <th>Company Name</th>
                                <th>ContactNo</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>GstNo</th>
                                <th>PanNo</th>
                                <th>Credit days</th>
                                <th>Credit limit</th>
                                <th>Credit Amount</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
        
   $query_selecting_all_purchase= "SELECT * FROM customer WHERE customer_delete_flag = '1'";
                    
   $query_selecting_all_purchase_result  = mysqli_query($connect,$query_selecting_all_purchase);
   while($row= mysqli_fetch_row($query_selecting_all_purchase_result)){
       $c_delete = $row[0];
            ?>
                            <tr>
                                <td class="text-center">
                                    <a href="#c_delete<?php echo $c_delete;?>" data-toggle="modal"><i class="fa fa-trash mx-2" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <?php echo $row[0];?>
                                </td>
                                <td>
                                    <?php echo $row[1];?>
                                </td>
                                <td>
                                    <?php echo $row[2];?>
                                </td>

                                <td>
                                    <?php echo $row[3];?>
                                </td>
                                <td>
                                    <?php echo $row[4];?>
                                </td>
                                <td>
                                    <?php echo $row[5];?>
                                </td>
                                <td>
                                    <?php echo $row[6];?>
                                </td>
                                <td>
                                    <?php echo $row[7];?>
                                </td>
                                <td>
                                    <?php echo $row[8];?>
                                </td>
                                <td>
                                    <?php echo $row[9];?>
                                </td>
                                <td>
                                    <?php echo $row[10];?>
                                </td>

                            </tr>

                            <div class="modal fade bd-example-modal-lg" id="c_delete<?php echo $c_delete;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content container">

                                        <div class="header my-3 h3">Delete sales Receipt</div>

                                        <div class="header-body my-3">

                                            <h5> Do you really want to Delete Purchase Receipt
                                                <?php echo $c_delete; ?>?
                                            </h5>

                                            <br>
                                            <form method="post">
                                                <div class="mt-1">
                                                    <button type="submit" name="deleteCustomer" value="<?php echo $c_delete?>" class="btn btn-success px-4">Yes</button>
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

            </div>



            <?php    

            if(isset($_POST['deleteCustomer'])){
                
            $query_for_c_r_restore= "DELETE FROM customer WHERE `customer_id`=$_POST[deleteCustomer]";    
            $query_for_c_r_restore_result = mysqli_query($connect,$query_for_c_r_restore);    
    
            if($query_for_c_r_restore_result){
            header("location:trash.php");
            } 
                
            }                


?>
            <!--------------------------------customer ends---------------------------------------------------->


            <!--------------------------------vendor starts---------------------------------------------------->

            <div class="tab-pane" id="vendor_trash" role="tabpanel" aria-labelledby="home-tab">
                <div class="container">
                    <table class="table_id table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Customer Id</th>
                                <th>Company Name</th>
                                <th>Person Name</th>
                                <th>ContactNo</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>GstNo</th>
                                <th>PanNo</th>
                                <th>Credit days</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
        
   $query_selecting_all_purchase= "SELECT * FROM vendors WHERE vendor_delete_flag = '1'";
                    
   $query_selecting_all_purchase_result  = mysqli_query($connect,$query_selecting_all_purchase);
   while($row= mysqli_fetch_row($query_selecting_all_purchase_result)){
       $v_delete = $row[0];
            ?>
                            <tr>
                                <td class="text-center">
                                    <a href="#v_delete<?php echo $v_delete;?>" data-toggle="modal"><i class="fa fa-trash mx-2" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <?php echo $row[0];?>
                                </td>
                                <td>
                                    <?php echo $row[1];?>
                                </td>
                                <td>
                                    <?php echo $row[2];?>
                                </td>

                                <td>
                                    <?php echo $row[3];?>
                                </td>
                                <td>
                                    <?php echo $row[4];?>
                                </td>
                                <td>
                                    <?php echo $row[5];?>
                                </td>
                                <td>
                                    <?php echo $row[6];?>
                                </td>
                                <td>
                                    <?php echo $row[7];?>
                                </td>
                                <td>
                                    <?php echo $row[8];?>
                                </td>
                            </tr>

                            <div class="modal fade bd-example-modal-lg" id="v_delete<?php echo $v_delete;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content container">

                                        <div class="header my-3 h3">Delete sales Receipt</div>

                                        <div class="header-body my-3">

                                            <h5> Do you really want to Delete Purchase Receipt
                                                <?php echo $v_delete; ?>?
                                            </h5>

                                            <br>
                                            <form method="post">
                                                <div class="mt-1">
                                                    <button type="submit" name="deleteVendor" value="<?php echo $v_delete?>" class="btn btn-success px-4">Yes</button>
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

            </div>



            <?php    

            if(isset($_POST['deleteVendor'])){
                
            $query_for_v_r_restore= "DELETE FROM `vendors` WHERE `vendors_id`=$_POST[deleteVendor]";    
            $query_for_v_r_restore_result = mysqli_query($connect,$query_for_v_r_restore);    
    
            if($query_for_v_r_restore_result){
            header("location:trash.php");
            } 
                
            }                


?>






    <!--------------------------------vendor ends---------------------------------------------------->

    <!--------------------------------employee start---------------------------------------------------->


            <div class="tab-pane" id="employee_trash" role="tabpanel" aria-labelledby="home-tab">
                <div class="container">
                    <table class="table_id table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Employee Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>ContactNo</th>
                                <th>Password</th>
                                <th>Designation</th>
                                <th>Date of joining</th>
                                <th>salary</th>
                                <th>Address</th>
                                <th>AadharNo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
        
   $query_selecting_all_purchase= "SELECT * FROM employee WHERE employee_delete_flag = '1'";
                    
   $query_selecting_all_purchase_result  = mysqli_query($connect,$query_selecting_all_purchase);
   while($row= mysqli_fetch_row($query_selecting_all_purchase_result)){
       $e_delete = $row[0];
            ?>
                            <tr>
                                <td class="text-center">
                                    <a href="#e_delete<?php echo $e_delete;?>" data-toggle="modal"><i class="fa fa-trash mx-2" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <?php echo $row[0];?>
                                <td>
                                    <?php echo $row[0];?>
                                </td>
                                
                                <td>
                                    <?php echo $row[1]." ".$row[2];?>
                                </td>

                                <td>
                                    <?php echo $row[3];?>
                                </td>
                                
                                <td>
                                    <?php  echo $row[4];?>
                                </td>
                                
                                <td>
                                    <?php echo $row[5]; ?>
                                </td>

                                <td>
                                    <?php echo $row[6];?>
                                </td>

                                <td>
                                    <?php echo $row[7];?>
                                </td>
                                <td>
                                    <?php echo $row[8];?>
                                </td>
                                <td>
                                    <?php echo $row[9];?>
                                </td>
                                <td>
                                    <?php echo $row[10];?>
                                </td>
                            </tr>

                            <div class="modal fade bd-example-modal-lg" id="e_delete<?php echo $e_delete;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content container">

                                        <div class="header my-3 h3">Delete sales Receipt</div>

                                        <div class="header-body my-3">

                                            <h5> Do you really want to Delete Purchase Receipt
                                                <?php echo $e_delete; ?>?
                                            </h5>

                                            <br>
                                            <form method="post">
                                                <div class="mt-1">
                                                    <button type="submit" name="deleteEmployee" value="<?php echo $e_delete?>" class="btn btn-success px-4">Yes</button>
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

            </div>



            <?php    

            if(isset($_POST['deleteEmployee'])){
                
            $query_for_e_r_restore= "DELETE FROM `employee` WHERE `employee_id`=$_POST[deleteEmployee]";    
            $query_for_e_r_restore_result = mysqli_query($connect,$query_for_e_r_restore);    
    
            if($query_for_e_r_restore_result){
            header("location:trash.php");
            } 
                
            }                


?>





            <!--------------------------------employee ends---------------------------------------------------->





        </div>
    </div>
</section>






<?php include('includes/footer.php')?>
