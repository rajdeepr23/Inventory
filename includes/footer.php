</div>
</div>

<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="assests/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
    function submitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form    
        btn.form.submit();
    }
</script>
<script type="text/javascript" id="rajdeep">
    //if(localStorage.getItem('sidebarStatus')=='sidebarChanged'){
    if (sessionStorage.getItem('sidebarStatus') == 'sidebarChanged') {
        $('#sidebar').addClass('active');
        $('#content').addClass('adjustContentDiv');
    }


    $('.click_blocker').click(function() {
//            $('.click_blocker').attr('disabled');
        $('#clickMe').reset();
        alert("dv");
        });
    
    
    $(document).ready(function() {
        //        notification 
        $('#notification_icon').on('click', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: "aaa.php",
                method: "POST",
                data: id,
                success: function(data) {
                    data1 = JSON.parse(data);
                    $('.noti_div').html('<h6 class="dropdown-header text-center text-danger py-1"><span class="h6 my-0">Crititcal Notifications</span></h6><div class="dropdown-divider"></div>' + data1 + '<a class="dropdown-item text-warning text-center" href="notifications.php"><span style="font-size:15px;">Show All Notifications<span></a>');
                }
            });



        });

        <?php if($_SESSION['emp_designation'] == 'admin'){ ?>


        setInterval(function() {
            $.ajax({
                url: "aaa.php",
                success: function(data) {
                    data1 = JSON.parse(data);
                    toastr.options.timeOut = 2000;
                    toastr.options.progressBar = true;
                    for (i = 0; i < data1.length; i++)
                        toastr.success(data1[i]);
                },
            });
        }, 5000);

        <?php    }?>

        $('.xy').hide();
        $("select.payment").change(function() {
            var pM = $(".payment option:selected").val();
            if (pM == "Cash" || pM == "") {
                $('.xy').fadeOut();
                $("input[name='insertSChequeNo']").removeAttr('required');
                $("input[name='insertSBDetails']").removeAttr('required');

                $("input[name='insertPuChequeNo']").removeAttr('required');
                $("input[name='insertPuDetails']").removeAttr('required');
            }
            if (pM == "Cheque") {
                $("input[name='insertSChequeNo']").attr('required', true);
                $("input[name='insertSBDetails']").attr('required', true);

                $("input[name='insertPuChequeNo']").attr('required', true);
                $("input[name='insertPuDetails']").attr('required', true);
                $('.xy').fadeIn();
            }

        });


        $('.dropdown-menu').on('show.bs.dropdown', function() {
            $('.profiledrop').fadeIn();
        });



        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });


        $('.numbersOnly').keyup(function() {
            this.value = this.value.replace(/[^0-9\.]/g, '');
        });

        $('.contactOnly').keyup(function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        $('#table_id,.table_id').DataTable();



        //        $('#myTab a').on('click', function(e) {
        //            e.preventDefault();
        //            $(this).tab('show');
        //        });






    }); /*ready function ends here */




    //        storing tab status in local storage




    //    sidebar active on reload as well
    $('#sidebarCollapse').on('click', function() {

        if ($('#sidebar').hasClass('active')) {
            //localStorage.removeItem('sidebarStatus');
            sessionStorage.removeItem('sidebarStatus');
            $('#content').removeClass('adjustContentDiv');
        } else {
            //localStorage.setItem('sidebarStatus', 'sidebarChanged');
            sessionStorage.setItem('sidebarStatus', 'sidebarChanged');
            $('#content').addClass('adjustContentDiv');
        }
    });


    $(window).on('load', function() { // makes sure the whole site is loaded 
        $('#status').fadeOut(); // will first fade out the loading animation 
        $('#preloader').delay(100).fadeOut('slow'); // will fade out the white DIV that covers the website. 
        $('body').delay(100).css({
            'overflow': 'visible'
        });

        $('.focusClass').focus();

    });





    //    $(window).on('keydown', function(e) {
    //        if (e.keyCode == 123) {
    //            alert('Entered F12');
    //            return false;
    //        } else if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
    //            alert('Entered ctrl+shift+i');
    //            return false; //Prevent from ctrl+shift+i
    //        } else if (e.ctrlKey && e.keyCode == 73) {
    //            alert('Entered ctrl+shift+i');
    //            return false; //Prevent from ctrl+shift+i
    //        } else if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
    //            alert('Entered ctrl+shift+j');
    //            return false; //Prevent from ctrl+shift+i
    //        }
    //    });
    //    $(document).on("contextmenu", function(e) {
    //        alert('Right Click Not Allowed');
    //        e.preventDefault();
    //    });
    //    
    //            if ( $('[type="date"]').prop('type') != 'date' ) {
    //    $('[type="date"]').datepicker();
    //}

</script>
</body>

</html>
