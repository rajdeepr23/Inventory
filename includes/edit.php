<!--/////////////////////////////  modal/////////////////////////////////-->

<!--sales modal starts>-->

<div class="salesUpdateModal modal fade bd-example-modal-lg" id="sEdit<?php echo $sId; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width:1000px">
        <div class="modal-content container">

            <div class="header my-3 h3">Update Sales
                <span class="float-right"><button type="button" class="btn btn-dark" style="border-radius:50%;" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button></span>
            </div>


            <div class="header-body my-3">

                <form method="post">
                    <div class="form-row">

                        <div class="form-group col-sm-2">
                            <label for="" class="">InvoiceNo.</label>
                            <input type="text" name="sInvoice" tabindex="-1"  readonly tabindex="-1" class="form-control form-control-sm" tabindex="-1" value="<?php echo $sId; ?>">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="" class="">Date</label>
                            <input type="date" name="sDate" max="9999-12-31" tabindex="-1"  readonly tabindex="-1" class="form-control contactsOnly  form-control-sm" value="<?php echo $row[1]; ?>" />
                        </div>


                        <div class="form-group col-sm-7">
                            <label for="">Customer Name/Company Name</label>
                            <input type="text" name="sCName" tabindex="-1"  readonly tabindex="-1" value="<?php echo $row[14]; ?>" class="form-control form-control-sm" id="">
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-sm-2 sNewCol mb-0">
                            <label for="">BarcodeNo.</label>
                        </div>

                        <div class="form-group col-sm-4 sNewCol1 mb-0">
                            <label for="">Product Name</label>
                        </div>
                        <div class="form-group col-sm-1 mb-0">
                            <label for="">unit</label>
                        </div>

                        <div class="form-group col-sm-1 sNewCol2 mb-0">
                            <label for="">Qty</label>
                        </div>

                        <div class="form-group col-sm-1 sNewCol3 mb-0">
                            <label for="">Rate</label>
                        </div>

                        <div class="form-group col-sm-1 sNewCol4 mb-0">
                            <label for="">Tax%</label>
                        </div>


                        <div class="form-group col-sm-2 sNewCol5 mb-0">
                            <label for="">Amount</label>
                        </div>

                    </div>



                    <?php 
                         $query_selecting_all_sales1= "SELECT sales.*,batch.product_quantity FROM sales INNER JOIN batch ON sales.sales_barcode_no = batch.product_barcode_no WHERE sales.sales_receipt_id = '$sId'";
           
                         $query_selecting_all_sales_result1  = mysqli_query($connect,$query_selecting_all_sales1);
                    $salesUpdateModal = 0;
                        while($row1= mysqli_fetch_row($query_selecting_all_sales_result1)){
                             $tax_free_value = $row1[4]-($row1[6]/$row1[3]);
                            $tax_free_amount = $row1[3]*$tax_free_value;                          
                        ?>







                    <div class="form-row">

                        <div class="form-group col-sm-2">
                            <input type="text" name="usBarcode[<?php echo $salesUpdateModal; ?>]" tabindex="-1"  readonly tabindex="-1" value="<?php echo $row1[7];?>" class="form-control form-control-sm mb-2" />
                        </div>


                        <div class="form-group col-sm-4">

                            <input type="text" name="usPDes[<?php echo $salesUpdateModal; ?>]" tabindex="-1"  readonly tabindex="-1" value="<?php echo $row1[9]; ?>" class="form-control form-control-sm mb-2" />
                            <input type="hidden" name="usPID[<?php echo $salesUpdateModal; ?>]" value="<?php echo $row1[0]; ?>" class="form-control form-control-sm mb-2" />



                        </div>
                        <div class="form-group col-sm-1">
                            <input type="text" name="usUnit[<?php echo $salesUpdateModal; ?>]" tabindex="-1"  readonly tabindex="-1" class="form-control numbersOnly form-control-sm mb-2" value="<?php echo $row1[8]; ?>" />
                        </div>

                        <div class="form-group col-sm-1">
                            <input type="number" data-toggle="tooltip" name="usQty[<?php echo $salesUpdateModal; ?>]" class="form-control  form-control-sm mb-2" value="<?php echo $row1[3]; ?>" />

                            <input type="hidden" name="imn[<?php echo $salesUpdateModal; ?>]" value="<?php echo $row1[3]; ?>" class="form-control form-control-sm mb-2" />

                            <input type="hidden" name="usQtyOld[<?php echo $salesUpdateModal; ?>]" value="<?php echo $row1[11]; ?>" class="form-control form-control-sm mb-2" />

                        </div>

                        <div class="form-group col-sm-1">
                            <input type="number" name="usRate[<?php echo $salesUpdateModal; ?>]" class="form-control numbersOnly form-control-sm mb-2" value="<?php echo $row1[4]; ?>">
                            <input type="hidden" name="usRate1[<?php echo $salesUpdateModal; ?>]" class="form-control numbersOnly form-control-sm mb-2" value="<?php echo $tax_free_value; ?>" />
                        </div>
                        <div class="form-group col-sm-1">
                            <input type="number" name="usTax[<?php echo $salesUpdateModal; ?>]" tabindex="-1"  readonly tabindex="-1" class="form-control numbersOnly form-control-sm mb-2" value="<?php echo $row1[6]; ?>" />
                            <input type="hidden" name="usTax1[<?php echo $salesUpdateModal; ?>]" tabindex="-1"  readonly tabindex="-1" class="form-control numbersOnly form-control-sm mb-2" value="<?php echo $row1[10]; ?>" />
                          
                        </div>

                        <div class="form-group col-sm-2">
                            <input type="number" name="usAmount[<?php echo $salesUpdateModal; ?>]" tabindex="-1"  readonly tabindex="-1" class="form-control numbersOnly form-control-sm mb-2" value="<?php echo $row1[5]; ?>" />
                            <input type="hidden" name="usAmount1[<?php echo $salesUpdateModal; ?>]" tabindex="-1"  readonly tabindex="-1" class="form-control numbersOnly form-control-sm mb-2" value="<?php echo $tax_free_amount; ?>" />
                        </div>
                    </div>
                    <?php $salesUpdateModal++;  } ?>




                    <div class="form-row">
                        <div class="mt-1">
                            <button type="submit" class="btn btn-dark">Add</button>
                        </div>
                        <div class="form-group col-sm-4 ml-auto">
                            <label for="">Total Amount</label>
                            <input type="number" name="sTotalAmount" tabindex="-1"  readonly tabindex="-1" value="<?php echo $row[8]; ?>" class="form-control numbersOnly form-control-sm" />
                        </div>
                    </div>






                    <div class="form-row">

                        <div class="form-group col-sm-3">
                            <label for="">Payment Mode</label>
                            <div class="input-group">
                                <select class="custom-select custom-select-sm" name="sPMode" required>
                                    <option selected value="<?php echo $row[5]; ?>">
                                        <?php echo $row[5]; ?>
                                    </option>
                                    <option value="cash">Cash</option>
                                    <option value="cheque">Cheque</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="">PersonName</label>
                            <input type="text" name="sPName" value="<?php echo $row[9]; ?>" class="form-control form-control-sm" />
                        </div>

                        <div class="form-group col-sm-2 ml-auto">
                            <label for="">TAX</label>
                            <input type="number" name="sTaxAmount" tabindex="-1"  readonly tabindex="-1" value="<?php echo $row[10]; ?>" class="form-control numbersOnly form-control-sm" />
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-3 ">
                            <label for="">ChequeNo</label>
                            <input type="number" name="sChequeNo" class="form-control form-control-sm" value="<?php echo $row[6]; ?>" />
                        </div>

                        <div class="form-group col-sm-3 ">
                            <label for="">Bank/Branch</label>
                            <input type="text" name="sBDetails" class="form-control form-control-sm" value="<?php echo $row[7]; ?>" />
                        </div>
                        <div class="form-group col-sm-4 ml-auto">
                            <label for="">GRAND TOTAL</label>
                            <input type="number" name="sGrandTAmount" tabindex="-1"  readonly tabindex="-1" class="form-control numbersOnly form-control-sm " value="<?php echo $row[11]; ?>" />
                        </div>

                    </div>

                    <div class="mt-1">
                        <button type="submit" class="btn btn-dark" name="usUpdate">Submit</button>
                    </div>

                </form>

                <?php      
          
         
                if(isset($_POST['usUpdate'])){
                    
                    $sales_counter++;
                    
             $sInvoice = $_POST['sInvoice'];
            $sPMode = $_POST['sPMode'];
            $sDate =  $_POST['sDate'];
            $sPName =  $_POST['sPName'];
            $sChequeNo =  $_POST['sChequeNo'];
            $sBDetails =  $_POST['sBDetails'];
            $sGrandTAmount =  $_POST['sGrandTAmount'];       
            $sTax = $_POST['usTax'];
            $sTaxAmount = $_POST['sTaxAmount'];
            $usPDes =  $_POST['usPDes'];
            $usQty =  $_POST['usQty'];
            $usRate =  $_POST['usRate'];
            $usAmount =  $_POST['usAmount'];
            $usAmount1 =  $_POST['usAmount1'];
            $usPID =  $_POST['usPID'];
            $imn =  $_POST['imn'];
            $usBarcode=$_POST['usBarcode'];
            $sTotalAmount = $_POST['sTotalAmount'];

                
            $query_for_s_update="UPDATE `sales_receipt` SET `sales_receipt_date`='$sDate',`sales_receipt_payment_mode`='$sPMode',`sales_receipt_cheque_no`='$sChequeNo',`sales_receipt_bank_details`='$sBDetails',`sales_receipt_amount`='$sTotalAmount',`sales_receipt_person_name`='$sPName',`sales_receipt_tax`= '$sTaxAmount',`sales_receipt_grand_total`='$sGrandTAmount' WHERE sales_receipt_id = '$sInvoice'";
//            echo $query_for_s_update;
                    
            $query_for_s_update_result = mysqli_query($connect, $query_for_s_update);        
                    

                    foreach($usPDes as $index => $value){  
                        $qty = $imn[$index]-$usQty[$index];


                    
                $raj123 = "UPDATE `sales` SET `sales_quantity`=  '$usQty[$index]',`sales_rate`=  '$usRate[$index]',`sales_amount`=  '$usAmount[$index]' ,`sales_tax` = '$sTax[$index]' WHERE `sales_id` = '$usPID[$index]'";
                    $resultQ = mysqli_query($connect,$raj123);
                    
                    
                    
                    $update_batch_sales="UPDATE `batch` SET `product_quantity` = `product_quantity`+($qty) WHERE `batch`.`product_barcode_no` = '$usBarcode[$index]';";
//                    echo $update_batch_sales."<br>";
                    $update_batch_sales_result = mysqli_query($connect,$update_batch_sales);
                   
                }
                
                if(!$query_for_s_update_result || !$raj123){
                    echo "Error";
                }
                else{
                    header("location:sales.php");
                }
                    }  
                
                
                ?>

            </div>

        </div>
    </div>
</div>
<script>
    $('.salesUpdateModal').on('input', 'input', function(e) {
        
        
        $('.salesUpdateModal').on('hidden.bs.modal', function () {
            window.location = window.location.href;
        });
        
        if ((e.target.name).includes("usQty"))
        {
            
           var id = parseInt((e.target.name).replace(/[^0-9]/g, ''));
        
            $(this).tooltip('dispose');
            
            if (parseInt($('input[name="usQtyOld[' + id + ']"]').val()) < parseInt($('input[name="usQty[' + id + ']"]').val()))
            {
                $(this).val("");
                $(this).attr('title', 'Enter Quantity less than  or equal to ' + $('input[name="usQtyOld[' + id + ']"]').val() + '');
                $(this).focus();
                $(function() {
                        $('input[name="usQty[' + id + ']"]').tooltip('show');
                })
            } 
            else if (parseInt($('input[name="usQty[' + id + ']"]').val()) == 0 || parseInt($('input[name="usQty[' + id + ']"]').val()) == "")
            {
                $(this).val("");
                $(this).attr('title', 'Enter Quantity Greater than or equal to 1');
                $(this).focus();
                $(function() {
                    $('input[name="usQty[' + id + ']"]').tooltip('show');
                })
            }
            else {
                $(this).tooltip('dispose');
            }
        
        }
        
        if ((e.target.name).includes("usRate") || (e.target.name).includes("usQty") ) {
           var id = (parseInt((e.target.name).replace(/[^0-9]/g, '')));
        
      $('input[name="usAmount[' + id + ']"]').val($('input[name="usQty[' + id + ']"]').val() * $('input[name="usRate[' + id + ']"]').val()); 
            
           
      $('input[name="usRate1[' + id + ']"]').val(Math.round(((parseFloat($('input[name="usRate[' + id + ']"]').val()) * 100) / (parseFloat($('input[name="usTax1[' + id + ']"]').val())+100)) * 100) / 100);  
            
            
      $('input[name="usTax[' + id + ']"]').val(parseInt($('input[name="usQty[' + id + ']"]').val()) * Math.round( ($('input[name="usRate1[' + id + ']"]').val() * ($('input[name="usTax1[' + id + ']"]').val()/100)) * 100) /100 ); 
        
      $('input[name="usAmount1[' + id + ']"]').val($('input[name="usQty[' + id + ']"]').val() * $('input[name="usRate1[' + id + ']"]').val());         
     var totalRowCount = $('input[name^="usBarcode"]').length;
            

    var uSum = uSum1 = uSum2 = 0; 
    for(j=0;j<=totalRowCount;j++){
        if($('input[name="usAmount1[' + j + ']"]').val() != null){
        uSum += parseFloat($('input[name="usAmount1[' + j + ']"]').val());
        uSum1 += parseFloat($('input[name="usTax[' + j + ']"]').val());
        uSum2 += parseFloat($('input[name="usAmount[' + j + ']"]').val());
            
            
        }

    } 
     if($('input[name="usAmount1[' + id + ']"]').val() != ""){
         
     $('input[name="sTotalAmount"]').val(Math.round((uSum)*100)/100);     
     $('input[name="sTaxAmount"]').val(Math.round((uSum1)*100)/100);     
     $('input[name="sGrandTAmount"]').val(Math.round((uSum2)*100)/100);     
         
     }
//            
    } 
    });
        
        

        

    

    
</script>

<!--sales modal ends here-->


<!--purchase modal starts>-->


<div class="purchaseUpdateModal modal fade bd-example-modal-lg puModal" id="editPurchase<?php echo $puId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width:1100px;">
        <div class="modal-content container">

            <div class="header my-3 h3">Update Purchase
                <span class="float-right"><button type="button" class="btn btn-dark" style="border-radius:50%;" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button></span>
            </div>


            <div class="header-body my-3">

                <form method="post">


                    <div class="form-row">

                        <div class="form-group col-sm-2">
                            <label for="" class="">InvoiceNo.</label>
                            <input type="text" name="PuInvoice" class=" form-control form-control-sm" value="<?php echo $row[0]; ?>" tabindex="-1"  readonly tabindex="-1">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="" class="">Date</label>
                            <input type="date" max="9999-12-31" name="PuDate" class="form-control contactsOnly  form-control-sm" value="<?php echo $row[8]; ?>" tabindex="-1"  readonly tabindex="-1">
                        </div>


                        <div class="form-group col-sm-7">
                            <label for="">Vendor Name</label>
                            <input type="text" name="PuVName" value="<?php echo $row[12]; ?>" class="form-control form-control-sm" id="" tabindex="-1"  readonly tabindex="-1">
                        </div>
                    </div>
                    <!--                  ...................................................-->

                    <div class="form-row m-0" id="puLabelForModal">
                        <div class="col-sm-6 d-flex">
                            <div class="col-sm-1 ">
                                <label for="">No</label>
                            </div>
                            <div class="col-sm-6 ">
                                <label for="">Product-Name</label>
                            </div>
                            <div class="col-sm-2">
                                <label for="">Weight</label>
                            </div>
                            <div class="col-sm-2">
                                <label for="">Unit</label>
                            </div>
                            <div class="col-sm-1">
                                <label for="">Qty</label>
                            </div>
                        </div>

                        <div class="col-sm-6 d-flex">
                            <div class="col-sm-4">
                                <label for="">Expiry</label>
                            </div>
                            <div class="col-sm-2">
                                <label for="">Pu-Rate</label>
                            </div>
                            <div class="col-sm-2">
                                <label for="">M.R.P</label>
                            </div>
                            <div class="col-sm-2">
                                <label for="">Tax%</label>
                            </div>
                            <div class="col-sm-2">
                                <label for="">Amount</label>
                            </div>
                        </div>

                    </div>





                    <!--...............................................-->

                    <!--////////////////////////////////////////////////////////////////////////////////////-->

                    <?php 
                    
                         $query_selecting_all_purchase1= "SELECT * FROM `purchase` WHERE purchase_receipt_id = '$puId' ";
                         $query_selecting_all_purchase_result1  = mysqli_query($connect,$query_selecting_all_purchase1);
                    $purchaseUpdateModal = 0;
                        while($row1= mysqli_fetch_assoc($query_selecting_all_purchase_result1)){
                            
                            $tax_free_value = $row1['purchase_rate']-($row1['purchase_tax']/$row1['purchase_quantity']);
                            $tax_free_amount = $row1['purchase_quantity']*$tax_free_value; 
                      
                             
                            

    
    ?>

                    <div class="form-row" id="puEditInputs">
                        <div class="col-sm-6 d-flex">
                            <div class="form-group col-sm-1">
                                <input type="text" name="upuProductNo[<?php echo $purchaseUpdateModal; ?>]" name="" class="tabindexfocus form-control form-control-sm" value="<?php echo $row1['purchase_product_id']; ?>" tabindex="-1"  readonly tabindex="-1">
                                <input type="hidden" class="form-control form-control-sm" value="<?php echo $row1['purchase_barcode_no'];?>" name="upuBarcodeNo[]">
                            </div>

                            <div class="form-group col-sm-6">
                                <input type="text" name="upuPDes[<?php echo $purchaseUpdateModal; ?>]" value="<?php echo $row1['purchase_product_name']; ?>" class="form-control form-control-sm" tabindex="-1"  readonly tabindex="-1">
                                <input type="hidden" name="upuPID[<?php echo $purchaseUpdateModal; ?>]" value="<?php echo $row1['purchase_id']; ?>" class="form-control form-control-sm">

                            </div>

                            <div class="form-group col-sm-2 ">
                                <?php $x = preg_replace("/[^0-9]/", "",$row1['purchase_unit']); ?>
                                <input type="number" name="upuW[<?php echo $purchaseUpdateModal; ?>]" class="form-control form-control-sm" value="<?php echo $x; ?>">
                            </div>

                            <div class="form-group col-sm-2 ">
                                <?php  $y = preg_replace("/[0-9]+/","", $row1['purchase_unit']); ?>
                                <select name="upuUnit[<?php echo $purchaseUpdateModal; ?>]" id="upuUnit" class="custom-select custom-select-sm">
                                    <option value="<?php echo $y;?>">
                                        <?php echo $y;?>
                                    </option>
                                    <option value="gm">gm</option>
                                    <option value="kg">kg</option>
                                    <option value="ml">ml</option>
                                    <option value="lt">lt</option>
                                    <option value="U">U</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-1">
                                <input type="number" name="upuQtyNew[<?php echo $purchaseUpdateModal; ?>]" class="form-control form-control-sm" data-toggle="tooltip" value="<?php echo $row1['purchase_quantity']; ?>">
                                <input type="hidden" class="form-control form-control-sm" name="upuQtyOld[<?php echo $purchaseUpdateModal; ?>]" value="<?php echo $row1['purchase_quantity']; ?>">
                            </div>
                        </div>

                        <div class="col-sm-6 d-flex">
                            <div class="form-group col-sm-4 ">
                                <input type="date" max="9999-12-31" name="upuExpDate[]" class="form-control form-control-sm" value="<?php echo $row1['purchase_expiry']; ?>">
                            </div>

                            <div class="form-group col-sm-2">
                                <input type="number" name="upuRate[<?php echo $purchaseUpdateModal; ?>]" class="form-control form-control-sm" value="<?php echo $row1['purchase_rate']; ?>">
                                
                            </div>

                            <div class="form-group col-sm-2 ">
                                <input type="number" name="upuMrpRate[<?php echo $purchaseUpdateModal; ?>]" class="form-control form-control-sm" value="<?php echo $row1['purchase_mrp']; ?>">
                            </div>


                            <div class="form-group col-sm-1">
                                <input type="number" name="upuTax[<?php echo $purchaseUpdateModal; ?>]" class="form-control numbersOnly form-control-sm" value="<?php echo $row1['purchase_tax']; ?>" tabindex="-1"  readonly tabindex="-1">
                                <input type="hidden" name="upuTax1[<?php echo $purchaseUpdateModal; ?>]" class="form-control numbersOnly form-control-sm" tabindex="-1"  readonly tabindex="-1" value="<?php echo $row1['purchase_product_tax_percent']; ?>" >
                            </div>
                            <div class="form-group col-sm-3">
                                <input type="number" name="upuAmount[<?php echo $purchaseUpdateModal; ?>]" class="form-control numbersOnly form-control-sm" value="<?php echo $row1['purchase_amount']; ?>" tabindex="-1"  readonly tabindex="-1">
                                <input type="hidden" name="upuAmount1[<?php echo $purchaseUpdateModal; ?>]" class="form-control numbersOnly form-control-sm"  tabindex="-1"  readonly tabindex="-1" value="<?php echo $tax_free_amount;?>">
                            </div>
                        </div>
                    </div>

                   <?php $purchaseUpdateModal++;  } ?>

                    <!--                    ///////////////////////////////////////////////////////////////////////////////-->



                    <div class="form-row">
                        <div class="mt-1">
                            <button type="button" class="btn btn-dark">Add</button>
                        </div>
                        <div class="form-group col-sm-4 ml-auto">
                            <label for="">Total Amount</label>
                            <input type="number" value="<?php echo $row[7]; ?>" name="PuTotalAmount" class="form-control numbersOnly form-control-sm" tabindex="-1"  readonly tabindex="-1">
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-sm-3">
                            <label for="">Payment Mode</label>
                            <div class="input-group">
                                <select class="custom-select custom-select-sm" name="PuPMode" required>
                                    <option value="<?php echo $row[4]; ?>" selected>
                                        <?php echo $row[4]; ?>
                                    </option>
                                    <option value="cash">Cash</option>
                                    <option value="cheque">Cheque</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="">PersonName</label>
                            <input type="text" name="PuPName" value="<?php echo $row[9]; ?>" class="form-control form-control-sm" />
                        </div>

                        <div class="form-group col-sm-2 ml-auto">
                            <label for="">TAX Amount</label>
                            <input type="number" name="PuTax" value="<?php echo $row[10]; ?>" class="form-control numbersOnly form-control-sm" tabindex="-1"  readonly tabindex="-1">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-3 ">
                            <label for="">ChequeNo</label>
                            <input type="number" name="PuChequeNo" class="form-control form-control-sm" value="<?php echo $row[5]; ?>" />
                        </div>

                        <div class="form-group col-sm-3 ">
                            <label for="">Bank/Branch</label>
                            <input type="text" name="PuBDetails" class="form-control form-control-sm" value="<?php echo $row[6]; ?>" />
                        </div>
                        <div class="form-group col-sm-4 ml-auto">
                            <label for="">GRAND TOTAL</label>
                            <input type="number" name="PuGrandTAmount" class="form-control numbersOnly form-control-sm" value="<?php echo $row[11]; ?>" tabindex="-1"  readonly tabindex="-1">
                        </div>

                    </div>

                    <div class="mt-1">
                        <button type="submit" class="btn btn-dark" name="upuUpdate">Submit</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
<?php  
                if(isset($_POST['upuUpdate'])){

                $purchase_counter++;
                $upuPDes =  $_POST['upuPDes'];
                $upuRate =  $_POST['upuRate'];
                $upuPID =  $_POST['upuPID'];

                $upuProductNo = $_POST['upuProductNo'];
                $upuBarcodeNo = $_POST['upuBarcodeNo'];

                $upuW = $_POST['upuW'];
                $upuUnit = $_POST['upuUnit'];
                $upuExpDate = $_POST['upuExpDate'];
                $upuMrpRate = $_POST['upuMrpRate'];
                $PuPName = $_POST['PuPName'];                   
                $upuTax = $_POST['upuTax'];
                $PuTax = $_POST['PuTax'];
                $upuAmount =  $_POST['upuAmount'];
                $PuGrandTAmount = $_POST['PuGrandTAmount'];
                $PuTotalAmount = $_POST['PuTotalAmount'];        

                $upuQtyOld =  $_POST['upuQtyOld'];
                $upuQtyNew =  $_POST['upuQtyNew'];




                foreach($upuPDes as $index => $value){

                $upuQtyFinal = $upuQtyNew[$index]-$upuQtyOld[$index];
                $upufinalUnit[] = str_replace(" ","",$upuW[$index])." ".str_replace(" ","",$upuUnit[$index]);
                $upu_formatted_barcode[] = str_replace(" ","",$upuProductNo[$index].str_replace("-","",$upuExpDate[$index]).str_replace(" ","",$upufinalUnit[$index]));







                $rajQ =  "UPDATE `purchase` SET `purchase_quantity`='$upuQtyNew[$index]',`purchase_rate`='$upuRate[$index]',`purchase_amount`='$upuAmount[$index]',`purchase_mrp`='$upuMrpRate[$index]',`purchase_tax`='$upuTax[$index]',`purchase_expiry`='$upuExpDate[$index]',`purchase_unit`='$upufinalUnit[$index]',`purchase_barcode_no`='$upu_formatted_barcode[$index]' WHERE `purchase_id` = '$upuPID[$index]';";

                $resultQ = mysqli_query($connect,$rajQ);

                $update_batch_pu_update = "UPDATE `batch` SET `product_unit`= '$upufinalUnit[$index]',`product_rate`='$upuRate[$index]',`product_mrp`='$upuMrpRate[$index]',`product_quantity` =`product_quantity`+'$upuQtyFinal',`product_expiry`='$upuExpDate[$index]',`product_barcode_no`='$upu_formatted_barcode[$index]' WHERE `product_barcode_no` = '$upuBarcodeNo[$index]';";

                echo $update_batch_pu_update;                

                $update_batch_pu_update_result = mysqli_query($connect,$update_batch_pu_update);


                }

                $query_for_pu_update= "UPDATE `purchase_receipt` SET `purchase_receipt_payment_mode`='$_POST[PuPMode]',`purchase_receipt_cheque_no`='$_POST[PuChequeNo]',`purchase_receipt_bank`='$_POST[PuBDetails]',`purchase_receipt_amount`='$PuTotalAmount',`purchase_receipt_date`='$_POST[PuDate]',`purchase_receipt_person_name`='$PuPName',`purchase_receipt_tax`='$PuTax',`purchase_receipt_grand_total`='$PuGrandTAmount' WHERE `purchase_receipt_id`='$_POST[PuInvoice]'";




                $query_for_pu_update_result  =  mysqli_query($connect,$query_for_pu_update); 


                if($query_for_pu_update_result)
                {

                header("location:purchase.php");

                }

                }           

                ?>

<script>
    $('.purchaseUpdateModal').on('input', 'input', function(e) {
        
        
        $('.purchaseUpdateModal').on('hidden.bs.modal', function () {
            window.location = window.location.href;
        });
        
        if ((e.target.name).includes("upuQtyNew"))
        {

           var id = parseInt((e.target.name).replace(/[^0-9]/g, ''));
        
            $(this).tooltip('dispose');
            
            if (parseInt($('input[name="upuQtyNew[' + id + ']"]').val()) == 0 || parseInt($('input[name="upuQtyNew[' + id + ']"]').val()) == "")
            {
                $(this).val("");
                $(this).attr('title', 'Enter Quantity Greater than or equal to 1');
                $(this).focus();
                $(function() {
                    $('input[name="upuQtyNew[' + id + ']"]').tooltip('show');
                })
            }
            else {
                $(this).tooltip('dispose');
            }
        
        }
        
        if ((e.target.name).includes("upuRate") || (e.target.name).includes("upuQtyNew") ) {
           var id = (parseInt((e.target.name).replace(/[^0-9]/g, '')));
//            console.log(id);
            
            var qty = $('input[name="upuQtyNew[' + id + ']"]');
            var rate = $('input[name="upuRate[' + id + ']"]');
            var tax = $('input[name="upuTax[' + id + ']"]');
            var amount = $('input[name="upuAmount[' + id + ']"]');
            var tax1 = $('input[name="upuTax1[' + id + ']"]');
            var amount1 = $('input[name="upuAmount1[' + id + ']"]');
            

            amount.val(Math.round(qty.val()*rate.val()*100)/100);
            amount1.val(Math.round(parseInt(qty.val())*((parseFloat(rate.val())*100)/(parseInt(tax1.val())+100))*100)/100);
            tax.val(Math.round((amount1.val()*tax1.val()/100)*100)/100);
//            
            var totalRowCount = $('input[name^="upuPDes"]').length;
            console.log(totalRowCount);
//           
            
    var uSum = uSum1 = uSum2 = 0; 
    for(j=0;j<=totalRowCount;j++){
        if($('input[name="upuAmount1[' + j + ']"]').val() != null){
        uSum += parseFloat($('input[name="upuAmount1[' + j + ']"]').val());
        uSum1 += parseFloat($('input[name="upuTax[' + j + ']"]').val());
        uSum2 += parseFloat($('input[name="upuAmount[' + j + ']"]').val());
            
            
        }

    } 
//     if($('input[name="usAmount1[' + id + ']"]').val() != ""){
//         
     $('input[name="PuTotalAmount"]').val(Math.round((uSum)*100)/100);     
     $('input[name="PuTax"]').val(Math.round((uSum1)*100)/100);     
     $('input[name="PuGrandTAmount"]').val(Math.round((uSum2)*100)/100);     
//         
//     }
            
            
            
            


    } 
    });
        
        

        

    

    
</script>



<!--purchase modal ends here-->


<!--product edit modal-->


<div class="modal fade bd-example-modal-lg" id="edit<?php echo $pId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Update Products
                <span class="float-right"><button type="button" class="btn btn-dark" style="border-radius:50%;" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button></span>
            </div>


            <div class="header-body my-3">

                <form method="post">
                    <div class="form-row">

                        <div class="form-group col-sm-1">
                            <label for="" class="">No</label>
                            <input type="text" name="pId" class=" form-control form-control-sm disabled" id="" aria-describedby="" value="<?php echo $row[0];?>">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="" class="">ProductCategory</label>
                            <input type="text" name="pCategory" class="form-control contactsOnly  form-control-sm" value="<?php echo $row[1];?>" />
                        </div>


                        <div class="form-group col-sm-2">
                            <label for="">ProductType</label>
                            <input type="text" name="pType" class="form-control form-control-sm" id="" value="<?php echo $row[2];?>">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="">ProductBrand</label>
                            <input type="text" name="pBrand" class="form-control form-control-sm" id="" value="<?php echo $row[3];?>">
                        </div>
                        <div class="form-group col-sm-1">
                            <label for="">unit</label>
                            <input type="number" name="pUnit" class="form-control numbersOnly form-control-sm" value="<?php echo $row[7];?>" />
                        </div>

                        <div class="form-group col-sm-1">
                            <label for="">QTY</label>
                            <input type="number" name="pQuantity" class="form-control numbersOnly form-control-sm" value="<?php echo $row[8];?>" />
                        </div>
                        <div class="form-group col-sm-1">
                            <label for="">Rate</label>
                            <input type="number" name="pRate" class="form-control numbersOnly form-control-sm" value="<?php echo $row[6];?>" />
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-sm-4">
                            <label for="">ProductName</label>
                            <input type="text" name="pName" class="form-control form-control-sm" id="" value="<?php echo $row[4]; ?>">
                        </div>

                        <div class="form-group col-sm-8">
                            <label for="">Product Description</label>
                            <input type="text" name="pDescription" class="form-control form-control-sm" value="<?php echo $row[5];?>" />
                        </div>
                    </div>


                    <div class="mt-1">
                        <button type="submit" class="btn btn-dark" name="pUpdateSubmit">Submit</button>
                    </div>

                </form>


            </div>

        </div>
    </div>
</div>

<?php    
            if(isset($_POST['pUpdateSubmit'])){
                
                
                
            $query_for_update= "UPDATE product SET product_description = '$_POST[pDescription]',product_name='$_POST[pName]',product_category='$_POST[pCategory]',product_type='$_POST[pType]',product_brand='$_POST[pBrand]',product_rate='$_POST[pRate]',product_unit='$_POST[pUnit]',product_quantity='$_POST[pQuantity]' WHERE product_id = '$_POST[pId]' ";
                
            $query_for_update_result  = mysqli_query($connect,$query_for_update); 
                
                if($query_for_update_result){
//                    header("location:products.php");
                }
                                
                                
                            }



?>

<!--product modal end-->

<!--//////////////////////////////////////////////modal end////////////////////////-->

<!--vendor edit modal-->



<div class="modal fade bd-example-modal-lg" id="vendorEdit<?php echo $vId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Update Vendor
                <span class="float-right"><button type="button" class="btn btn-dark" style="border-radius:50%;" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button></span>
            </div>


            <div class="header-body my-3">


                <form method="post">
                    <div class="form-row">
                        <input type="hidden" name="vId" class="form-control numbersOnly form-control-sm" value="<?php echo $row[0];?>" />

                        <div class="form-group col-sm-6">
                            <label for="" class="">Vendor Person Name</label>
                            <input type="text" class=" form-control form-control-sm" name="vPName" id="" aria-describedby="" value="<?php echo $row[2];?>">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Vendor Company Name</label>
                            <input type="text" class="form-control form-control-sm" id="" name="vCName" value="<?php echo $row[1];?>">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="" class="">Contact Number</label>
                            <input type="text" max-length="10" class="form-control contactsOnly  form-control-sm" name="vCNum" value="<?php echo $row[3];?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Email Address</label>
                            <input type="email" name="vEmail" class="form-control  form-control-sm" value="<?php echo $row[4];?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Pan Number</label>
                            <input type="text" name="vPNum" class="form-control form-control-sm" value="<?php echo $row[7];?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Gst Number</label>
                            <input type="text" name="vGNum" class="form-control form-control-sm" value="<?php echo $row[6];?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Credit Amount</label>
                            <input type="text" name="vCAmt" class="form-control numbersOnly form-control-sm" value="<?php echo $row[8];?>" />
                        </div>

                    </div>

                    <div class="mt-1">
                        <button type="submit" name="vUpdateSubmit" class="btn btn-dark">Submit</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['vUpdateSubmit'])){
                
                
                
                
                
            $query_for_v_update= "UPDATE `vendors` SET `vendor_company_name`='$_POST[vCName]',`vendor_person_name`='$_POST[vPName]',`vendor_contact_no`='$_POST[vCNum]',`vendor_email`='$_POST[vEmail]',`vendor_gst_no`='$_POST[vGNum]',`vendor_pan_no`='$_POST[vPNum]',`vendor_credit_amount`='$_POST[vCAmt]' WHERE `vendors_id`='$_POST[vId]'";
                
            $query_for_v_update_result  = mysqli_query($connect,$query_for_v_update); 
                
                if($query_for_v_update_result){
                    header("location:vendor.php");
                }
                                
                                
                            }



?>


<!--vendor edit modal ends here-->



<!--expense edit modal-->

<div class="modal fade bd-example-modal-lg" id="ExpenseEdit<?php echo $eId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Update Expense
                <span class="float-right"><button type="button" class="btn btn-dark" style="border-radius:50%;" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button></span>
            </div>


            <div class="header-body my-3">


                <form method="post">

                    <div class="form-row">

                        <div class="form-group col-sm-1">
                            <label for="" class="">No.</label>
                            <input type="text" name="eNo" class=" form-control form-control-sm" value="<?php echo $row[0]; ?> ">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="" class="">Date</label>
                            <input type="date" max="9999-12-31" name="eDate" class="form-control  form-control-sm" value="<?php echo $row[6]; ?>" />
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="">ExpenseType</label>
                            <div class="input-group">
                                <select class="custom-select custom-select-sm" name="eType">
                                    <option value="<?php echo $row[2]; ?>" selected>
                                        <?php echo $row[2]; ?>
                                    </option>
                                    <option value="Voucher">Voucher</option>
                                    <option value="CashMemo">Cash Memo</option>
                                    <option value="Payment">Payment</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="">Expense Name</label>
                            <input type="text" name="eName" class="form-control form-control-sm" value="<?php echo $row[3]; ?>">
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-sm-12">
                            <label for="">Details</label>
                            <textarea name="eDetails" class="form-control" id="" cols="" rows="2"><?php echo $row[4]; ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-3 ">
                            <label for="">Amount</label>
                            <input type="number" name="eAmount" class="form-control numbersOnly form-control-sm" value="<?php echo $row[5]; ?>" />
                        </div>

                    </div>
                    <div class="mt-1">
                        <button type="submit" name="eUpdateSubmit" class="btn btn-dark">Submit</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['eUpdateSubmit'])){
                
                
                
                
                
            $query_for_e_update= "UPDATE `expense` SET
            `expense_type`='$_POST[eType]',`expense_name`='$_POST[eName]',`expense_comment`='$_POST[eDetails]',`expense_amount`='$_POST[eAmount]',`expense_date`='$_POST[eDate]' WHERE `expense_id`='$_POST[eNo]'";
                
            $query_for_e_update_result  = mysqli_query($connect,$query_for_e_update); 
                
                if($query_for_e_update_result){
                    header("location:expense.php");
                }
                                
                                
                            }



?>



<!--expense edit modal end-->










<!-- customer edit start-->



<div class="modal fade bd-example-modal-lg" id="customerEdit<?php echo $cId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Update Customer
                <span class="float-right"><button type="button" class="btn btn-dark" style="border-radius:50%;" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button></span>
            </div>


            <div class="header-body my-3">

                <form method="post">
                    <div class="form-row">
                        <input type="hidden" name="cNo" value="<?php echo $row[0]; ?>">

                        <div class="form-group col-sm-4">
                            <label for="" class="">Customer Name</label>
                            <input type="text" name="cName" class="form-control form-control-sm" value="<?php echo $row[1] ?>">
                        </div>

                        <div class="form-group col-sm-8">
                            <label for="">Company Name</label>
                            <input type="text" name="cCName" class="form-control form-control-sm" value="<?php echo $row[2] ?>">
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="" class="">Contact Number</label>
                            <input type="text" max-length="10" name="cCnumber" class="form-control contactOnly  form-control-sm" value="<?php echo $row[3] ?>" />
                        </div>

                        <div class="form-group col-sm-8">
                            <label for="">Email Address</label>
                            <input type="email" name="cEmail" class="form-control  form-control-sm" value="<?php echo $row[4] ?>" />
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="">Pan Number</label>
                            <input type="text" name="cPNumber" class="form-control form-control-sm" value="<?php echo $row[7] ?>" />
                        </div>

                        <div class="form-group col-sm-8">
                            <label for="">Gst Number</label>
                            <input type="text" name="cGnumber" class="form-control form-control-sm" value="<?php echo $row[6] ?>" />
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="">Credit Amount</label>
                            <input type="text" name="cCAmt" class="form-control numbersOnly form-control-sm" value="<?php echo $row[10] ?>" />
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="">Credit Limit</label>
                            <input type="text" name="cCLimit" class="form-control numbersOnly form-control-sm" value="<?php echo $row[9] ?>" />
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Credit Days</label>
                            <input type="number" min="0" name="cCDays" class="form-control numbersOnly form-control-sm" value="<?php echo $row[8] ?>" />
                        </div>

                        <div class="form-group col">
                            <label for="">Address</label>
                            <textarea class="form-control" name="cAdd" rows="2"><?php echo $row[5] ?></textarea>
                        </div>

                    </div>

                    <div class="mt-1">
                        <button type="submit" name="cUpdateSubmit" class="btn btn-dark">Submit</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['cUpdateSubmit'])){
                
                
                
                
                
            $query_for_c_update= "UPDATE `customer` SET 
            `customer_name`='$_POST[cName]',`customer_company_name`='$_POST[cCName]',`customer_contact_no`='$_POST[cCnumber]',`customer_email`='$_POST[cEmail]',`customer_address`='$_POST[cAdd]',`customer_gst_no`='$_POST[cGnumber]',`customer_pan_no`='$_POST[cPNumber]',`customer_credit_days`='$_POST[cCDays]',`customer_credit_limit`='$_POST[cCLimit]',`customer_credit_amount`='$_POST[cCAmt]' WHERE `customer_id`='$_POST[cNo]'";
                
            $query_for_c_update_result  = mysqli_query($connect,$query_for_c_update); 
                
                if($query_for_c_update_result){
                    header("location:customer.php");
                }
                                
                                
                            }



?>



<!--customer edit modal end-->










<!--employee edit modal starts?>-->





<div class="modal fade bd-example-modal-lg" id="employeeEdit<?php echo $emId; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Update Employee
                <span class="float-right"><button type="button" class="btn btn-dark" style="border-radius:50%;" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button></span>
            </div>


            <div class="header-body my-3">

                <form method="post">
                    <div class="form-row">
                        <input type="hidden" value="<?php echo $row[0]; ?>" name="emNo">

                        <div class="form-group col-sm-6">
                            <label for="" class="">Employee First Name</label>
                            <input type="text" name="emFName" class=" form-control form-control-sm" value="<?php echo $row[1] ?>">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Employee Last Name</label>
                            <input type="text" name="emLName" class="form-control form-control-sm" value="<?php echo $row[2] ?>">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="" class="">Contact Number</label>
                            <input type="text" max-length="10" name="emCnumber" class="form-control contactsOnly  form-control-sm" value="<?php echo $row[4] ?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Email Address</label>
                            <input type="email" name="emEmail" class="form-control  form-control-sm" value="<?php echo $row[3] ?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Password</label>
                            <input type="password" name="emPass" class="form-control form-control-sm" value="<?php echo $row[2] ?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Designation</label>

                            <div class="input-group">
                                <select class="custom-select custom-select-sm" name="emDesig" required>
                                    <option value="<?php echo $row[6]; ?>" selected>
                                        <?php echo $row[6]; ?>
                                    </option>
                                    <option value="Executive">Executive</option>
                                    <option value="SeniorExecutive">Senior Executive</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>

                            <!--                    <input type="text" name="" class="form-control form-control-sm" />-->
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Joining Date</label>
                            <input type="date" max="9999-12-31" name="emJDate" class="form-control form-control-sm" value="<?php echo $row[7]; ?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Salary</label>
                            <input type="text" name="emSalary" class="form-control numbersOnly form-control-sm" value="<?php echo $row[8]; ?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Aadhar No</label>
                            <input type="text" name="emAadhar" class="form-control numbersOnly form-control-sm" value="<?php echo $row[10]; ?>" />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="">Address</label>
                            <textarea class="form-control" name="emAdd" rows="2"><?php echo $row[9]; ?></textarea>
                        </div>

                    </div>


                    <div class="mt-1">
                        <button type="submit" name="emUpdateSubmit" class="btn btn-dark">Submit</button>
                    </div>


                </form>


            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['emUpdateSubmit'])){
                
                
                
                
                
            $query_for_em_update= "UPDATE `employee` SET `employee_first_name`='$_POST[emFName]',`employee_last_name`='$_POST[emLName]',`employee_email`='$_POST[emEmail]',`employee_contact_no`='$_POST[emCnumber]',`employee_password`='$_POST[emPass]',`employee_designation`='$_POST[emDesig]',`employee_joining_date`='$_POST[emJDate]',`employee_salary`='$_POST[emSalary]',`employee_address`='$_POST[emAdd]',`employee_aadhar`='$_POST[emAadhar]' WHERE `employee_id`='$_POST[emNo]'";
                
            $query_for_em_update_result  = mysqli_query($connect,$query_for_em_update); 
                
                if($query_for_em_update_result){
                    header("location:employee.php");
                }
                                
                                
                            }



?>




<!--employee edit modal ends-->



<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////-->





<!--expense delete modal starts here>?-->






<div class="modal fade bd-example-modal-lg" id="expenseDelete<?php echo $eId; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Delete Expense
                <span class="float-right"><button type="button" class="btn btn-dark" style="border-radius:50%;" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button></span>
            </div>


            <div class="header-body my-3">


                <h5> Are you sure to delete Expense No
                    <?php echo $row[0]; ?>
                </h5>

                <br>
                <form method="post">
                    <div class="mt-1">
                        <input type="hidden" name="deleteExpense" value="<?php echo $row[0]; ?>">
                        <button type="submit" name="eDelete" class="btn btn-danger">Delete</button>
                    </div>

                </form>




            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['eDelete'])){
                
                
                $expense_counter++;
                
                
            $query_for_e_delete= "Update `expense` SET `expense_delete_flag`= '1' WHERE `expense_id`='$_POST[deleteExpense]'";
                
                
            $query_for_e_delete_result  = mysqli_query($connect,$query_for_e_delete); 
                
                      // notification--------------------
                
                $details = $_SESSION['emp_first_name'].' '.$_SESSION['emp_last_name'].'('.$_SESSION['emp_id'].')'.' deleted Expense Record No '.$_POST[deleteExpense];    
                
                if($_SESSION['emp_designation'] == 'admin'){   
                $a =  ','.$_SESSION['emp_first_name'];   
                $noti_query = "INSERT INTO `notifications`(`SR_NO`, `details`, `date,time`, `notification_flag`, `read_flag`) VALUES ('','$details',now(),'$a','')";      
                }
                else{
                $noti_query = "INSERT INTO `notifications`(`SR_NO`, `details`, `date,time`, `notification_flag`, `read_flag`) VALUES ('','$details',now(),'','')";  
                }
                $noti_query_result = mysqli_query($connect,$noti_query);
                
                
                if($query_for_e_delete_result){
                    header("location:expense.php");
                }
                                
                                
                            }



?>


<!--expense delete modal ends here-->










<!--products delete modal starts here-->



<div class="modal fade bd-example-modal-lg" id="productDelete<?php echo $pId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Delete Product
                <span class="float-right"><button type="button" class="btn btn-dark" style="border-radius:50%;" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button></span>
            </div>


            <div class="header-body my-3">


                <h5> Are you sure to delete product No
                    <?php echo $row[0]; ?>
                </h5>

                <br>
                <form method="post">
                    <div class="mt-1">
                        <input type="hidden" name="deleteProduct" value="<?php echo $row[0]; ?>">
                        <button type="submit" name="pDelete" class="btn btn-danger">Delete</button>
                    </div>

                </form>




            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['pDelete'])){
                
                $product_counter++;
                
                
                
            $query_for_p_delete= "DELETE FROM `product` WHERE `product_id`=$_POST[deleteProduct]";
                
            $query_for_p_delete_result  = mysqli_query($connect,$query_for_p_delete); 
                
                 // notification--------------------
                
                $details = $_SESSION['emp_first_name'].' '.$_SESSION['emp_last_name'].'('.$_SESSION['emp_id'].')'.' deleted Product Record No '.$_POST[deleteProduct];    
                
                if($_SESSION['emp_designation'] == 'admin'){   
                $a =  ','.$_SESSION['emp_first_name'];   
                $noti_query = "INSERT INTO `notifications`(`SR_NO`, `details`, `date,time`, `notification_flag`, `read_flag`) VALUES ('','$details',now(),'$a','')";      
                }
                else{
                $noti_query = "INSERT INTO `notifications`(`SR_NO`, `details`, `date,time`, `notification_flag`, `read_flag`) VALUES ('','$details',now(),'','')";  
                }
                $noti_query_result = mysqli_query($connect,$noti_query);
                
                if($query_for_p_delete_result){
                    header("location:products.php");
                }
                                
                                
                            }



?>







<!--products delete modal ends here-->





<!--customer modal delete-->




<div class="modal fade bd-example-modal-lg" id="deleteCustomer<?php echo $cId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Delete Customer
                <span class="float-right"><button type="button" class="btn btn-dark" style="border-radius:50%;" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button></span>
            </div>


            <div class="header-body my-3">


                <h5> Are you sure to delete Customer
                    <?php echo $row[1]; ?>
                </h5>

                <br>
                <form method="post">
                    <div class="mt-1">
                        <input type="hidden" name="deleteCustomer" value="<?php echo $row[0]; ?>">
                        <button type="submit" name="cDelete" class="btn btn-danger">Delete</button>
                    </div>

                </form>




            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['cDelete'])){
                
                $customer_counter++;
                
                
                
            $query_for_c_delete= "UPDATE `customer` SET customer_delete_flag = '1' WHERE `customer_id`=$_POST[deleteCustomer]";
                
            $query_for_c_delete_result  = mysqli_query($connect,$query_for_c_delete); 
                
                 // notification--------------------
                
                $details = $_SESSION['emp_first_name'].' '.$_SESSION['emp_last_name'].'('.$_SESSION['emp_id'].')'.' deleted Customer Record No '.$_POST[deleteCustomer];    
                
                if($_SESSION['emp_designation'] == 'admin'){   
                $a =  ','.$_SESSION['emp_first_name'];   
                $noti_query = "INSERT INTO `notifications`(`SR_NO`, `details`, `date,time`, `notification_flag`, `read_flag`) VALUES ('','$details',now(),'$a','')";      
                }
                else{
                $noti_query = "INSERT INTO `notifications`(`SR_NO`, `details`, `date,time`, `notification_flag`, `read_flag`) VALUES ('','$details',now(),'','')";  
                }
                $noti_query_result = mysqli_query($connect,$noti_query);
                
                if($query_for_c_delete_result){
                    header("location:customer.php");
                }
                                
                                
                            }



?>










<!--customer modal ends here-->




<!--employee modal start here?-->



<div class="modal fade bd-example-modal-lg" id="deleteEmployee<?php echo $emId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Delete Employee
                <span class="float-right"><button type="button" class="btn btn-dark" style="border-radius:50%;" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button></span>
            </div>


            <div class="header-body my-3">


                <h5> Are you sure to delete Employee
                    <?php echo $row[1]; ?>
                </h5>

                <br>
                <form method="post">
                    <div class="mt-1">
                        <input type="hidden" name="deleteEmployee" value="<?php echo $row[0]; ?>">
                        <button type="submit" name="emDelete" class="btn btn-danger">Delete</button>
                    </div>

                </form>




            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['emDelete'])){
                $employee_counter++;
                
                
                
                
            $query_for_em_delete= "UPDATE `employee` SET employee_delete_flag = '1' WHERE `employee_id`=$_POST[deleteEmployee]";
                
            $query_for_em_delete_result  = mysqli_query($connect,$query_for_em_delete); 
                
                
                // notification--------------------
                
                $details = $_SESSION['emp_first_name'].' '.$_SESSION['emp_last_name'].'('.$_SESSION['emp_id'].')'.' deleted Employee Record No '.$_POST[deleteEmployee];    
                
                if($_SESSION['emp_designation'] == 'admin'){   
                $a =  ','.$_SESSION['emp_first_name'];   
                $noti_query = "INSERT INTO `notifications`(`SR_NO`, `details`, `date,time`, `notification_flag`, `read_flag`) VALUES ('','$details',now(),'$a','')";      
                }
                else{
                $noti_query = "INSERT INTO `notifications`(`SR_NO`, `details`, `date,time`, `notification_flag`, `read_flag`) VALUES ('','$details',now(),'','')";  
                }
                $noti_query_result = mysqli_query($connect,$noti_query);
                
                if($query_for_em_delete_result){
                    header("location:employee.php");
                }
                                
                                
                            }



?>





<!--employee modal  delete ends here?-->






<!--vendor delete modal start-->

<div class="modal fade bd-example-modal-lg" id="vendorDelete<?php echo $vId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Delete Vendor
                <span class="float-right"><button type="button" class="btn btn-dark" style="border-radius:50%;" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button></span>
            </div>


            <div class="header-body my-3">


                <h5> Are you sure to delete vendor
                    <?php echo $row[1]; ?>
                </h5>

                <br>
                <form method="post">
                    <div class="mt-1">
                        <input type="hidden" name="deleteVendor" value="<?php echo $row[0]; ?>">
                        <button type="submit" name="vDelete" class="btn btn-danger">Delete</button>
                    </div>

                </form>




            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['vDelete'])){
                
                $vendor_counter++;
                
                
                
                
                
            $query_for_v_delete= "UPDATE `vendors` SET vendor_delete_flag = '1' WHERE `vendors_id`=$_POST[deleteVendor]";
                echo $query_for_v_delete;
                
            $query_for_v_delete_result  = mysqli_query($connect,$query_for_v_delete); 
                
                 // notification--------------------
                
                $details = $_SESSION['emp_first_name'].' '.$_SESSION['emp_last_name'].'('.$_SESSION['emp_id'].')'.' deleted Vendor Record No '.$_POST[deleteVendor];    
                
                if($_SESSION['emp_designation'] == 'admin'){   
                $a =  ','.$_SESSION['emp_first_name'];   
                $noti_query = "INSERT INTO `notifications`(`SR_NO`, `details`, `date,time`, `notification_flag`, `read_flag`) VALUES ('','$details',now(),'$a','')";      
                }
                else{
                $noti_query = "INSERT INTO `notifications`(`SR_NO`, `details`, `date,time`, `notification_flag`, `read_flag`) VALUES ('','$details',now(),'','')";  
                }
                $noti_query_result = mysqli_query($connect,$noti_query);
                
                if($query_for_v_delete_result){
                    header("location:vendor.php");
                }
                                
                                
                            }



?>




<!--vendor delete modal end here>/-->




<!--purchase delete modal starts here-->





<div class="modal fade bd-example-modal-lg" id="purchaseDelete<?php echo $puId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Delete Purchase Receipt
                <span class="float-right"><button type="button" class="btn btn-dark" style="border-radius:50%;" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button></span>
            </div>


            <div class="header-body my-3">


                <h5> Are you sure to delete Purchase Receipt
                    <?php echo $row[0]; ?>
                </h5>

                <br>
                <form method="post">
                    <div class="mt-1">
                        <input type="hidden" name="deletePurchase" value="<?php echo $row[0]; ?>">
                        <button type="submit" name="puDelete" class="btn btn-danger">Delete</button>
                    </div>

                </form>




            </div>

        </div>
    </div>
</div>


<?php    
            if(isset($_POST['puDelete'])){
                
             $dateTimePu = date('d-m-Y').' '.date('h:i a').' '.$_SESSION['emp_first_name'].' '.$_SESSION['emp_last_name'].'('.$_SESSION['emp_id'].')';    
                
                
                
            $query_for_pu_delete= "UPDATE `purchase_receipt` SET `purchase_receipt_delete_flag` = '1',`deleted_item_details` = '$dateTimePu'  WHERE `purchase_receipt_id`='$_POST[deletePurchase]'";
                
            $query_for_pu_delete_result  = mysqli_query($connect,$query_for_pu_delete); 
                
            $imn2 = "SELECT purchase_barcode_no,purchase_quantity FROM purchase WHERE purchase_receipt_id = '$_POST[deletePurchase]'";
                
//                echo $imn2;
                $imn2_result = mysqli_query($connect,$imn2);
                while($row = mysqli_fetch_row($imn2_result)){
                    
                    $imn_u1=  "UPDATE `batch` SET `product_quantity` = `product_quantity` - '$row[1]' WHERE `product_barcode_no` = '$row[0]'";   
                    echo $imn_u1;   
                    $imn_u1_result = mysqli_query($connect,$imn_u1);
                }
                
            // notification--------------------
                
                $details = $_SESSION['emp_first_name'].' '.$_SESSION['emp_last_name'].'('.$_SESSION['emp_id'].')'.' deleted Purchase Receipt No '.$_POST[deletePurchase];    
                
                if($_SESSION['emp_designation'] == 'admin'){   
                $a =  ','.$_SESSION['emp_first_name'];   
                $noti_query = "INSERT INTO `notifications`(`SR_NO`, `details`, `date,time`, `notification_flag`, `read_flag`) VALUES ('','$details',now(),'$a','')";      
                }
                else{
                $noti_query = "INSERT INTO `notifications`(`SR_NO`, `details`, `date,time`, `notification_flag`, `read_flag`) VALUES ('','$details',now(),'','')";  
                }
                $noti_query_result = mysqli_query($connect,$noti_query);
                
 
                if($query_for_pu_delete_result){
                    header("location:purchase.php");
                }
                                
                                
                            }



?>










<!--purchase delete modal ends here-->





<!--sales delete modal starts here-->


<div class="modal fade bd-example-modal-lg" id="salesDelete<?php echo $sId;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3">Delete Sales Receipt
                <span class="float-right"><button type="button" class="btn btn-dark" style="border-radius:50%;" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button></span>
            </div>


            <div class="header-body my-3">


                <h5> Are you sure to delete sales Receipt
                    <?php echo $row[0]; ?>?
                </h5>

                <br>
                <form method="post">
                    <div class="mt-1">
                        <input type="hidden" name="deleteSales" value="<?php echo $row[0]; ?>">
                        <button type="submit" name="sDelete" class="btn btn-danger">Delete</button>
                    </div>

                </form>




            </div>

        </div>
    </div>
</div>


<?php 
            if(isset($_POST['sDelete'])){
                    
                $id = $_POST['deleteSales'];
               $sales_counter++; 
                
            $dateTime_details = date('d-m-Y').' '.date('h:i a').' '.$_SESSION['emp_first_name'].' '.$_SESSION['emp_last_name'].'('.$_SESSION['emp_id'].')'; 
            
            
                $imn1="UPDATE `sales_receipt` SET `sales_receipt_delete_flag` = '1',`deleted_item_details` = '$dateTime_details' WHERE `sales_receipt`.`sales_receipt_id`=$_POST[deleteSales]";
                
            
                
                
                
                
                // notification--------------------
                
                $details = $_SESSION['emp_first_name'].' '.$_SESSION['emp_last_name'].'('.$_SESSION['emp_id'].')'.' deleted Sales Receipt No '.$id;    
                
                if($_SESSION['emp_designation'] == 'admin'){   
                $a =  ','.$_SESSION['emp_first_name'];   
                $noti_query = "INSERT INTO `notifications`(`SR_NO`, `details`, `date,time`, `notification_flag`, `read_flag`) VALUES ('','$details',now(),'$a','')";      
                }
                else{
                $noti_query = "INSERT INTO `notifications`(`SR_NO`, `details`, `date,time`, `notification_flag`, `read_flag`) VALUES ('','$details',now(),'','')";  
                }
                $noti_query_result = mysqli_query($connect,$noti_query);
                
                

                
                $imn2 = "SELECT sales_barcode_no,sales_quantity FROM sales WHERE sales_receipt_id = '$_POST[deleteSales]'";
                $imn2_result = mysqli_query($connect,$imn2);
                while($row = mysqli_fetch_row($imn2_result)){
                    
                    $imn_u1=  "UPDATE `batch` SET `product_quantity` = `product_quantity` + '$row[1]' WHERE `product_barcode_no` = '$row[0]'";   
                    $imn_u1_result = mysqli_query($connect,$imn_u1);
                }
                
                    $imn1_result  = mysqli_query($connect,$imn1); 
                         
                if($imn1_result || $noti_query_result){
                    header("location:sales.php");
                }
                                
                                
                            }



?>








<!--sales delete modal ends here-->



<!--////////////////////// barcode ////////-->





<div class="modal fade bd-example-modal-lg" id="barcode<?php echo $barcodeNo;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">
        <div class="modal-content container">

            <div class="header my-3 h3"><i class="fa fa-barcode fa-3x" aria-hidden="true"></i>
                <span class="float-right"><button type="button" class="btn btn-dark" style="border-radius:50%;" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button></span>
            </div>


            <div class="header-body my-3">


                <br>
                <form method="post" action="includes/barcode.php" target="_blank">
                    <div class="mt-1">
                        <input type="hidden" class="col-1" name="bar" value="<?php echo $barcodeNo; ?>">
                        <input type="text" name="num" value="">
                        <br>
                        <br>
                        <br>
                        <button type="submit" id="printBtn" name="" class="btn btn-primary">Print</button>
                    </div>

                </form>


                <script>
                    $('#printBtn').click(function() {

                        $('.modal').modal('hide');
                    });

                </script>

            </div>

        </div>
    </div>
</div>
