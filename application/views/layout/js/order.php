<script>
    $(document).ready( function () {
        $('#orderTable').DataTable();
        $(".nav-order").addClass("active");

        client();
        states();
        payments();
        deliverys();

        <?php if($this->session->flashdata("success")):?>
            Swal.fire({
                position: 'top-end',
                type: 'success',
                title: '<?php echo $this->session->flashdata("success"); ?>',
                showConfirmButton: false,
                timer: 2000
            });
        <?php endif; ?>


        <?php if($this->session->flashdata("error")):?>
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: '<?php echo $this->session->flashdata("error") ?>',
            });
        <?php endif; ?>

        <?php $this->session->unset_userdata('success'); ?>
        <?php $this->session->unset_userdata('error'); ?>
    });

    function client() {
        $.ajax({
            url: "<?php echo base_url(); ?>order/Main/getData",
            type:"POST",
            dataType:"json",
            success:function(resp){

                var html=new Array();

                $.each(resp,function(key, value){
                    
                    if(value.id ==<?php echo set_value('clientId') ? set_value('clientId'): (!empty($client_id) ? $client_id: 0) ?>){
                        html.push('<option  value="'+value.id+'" selected>'+value.name+'</option>');
                    }else{
                        html.push('<option  value="'+value.id+'">'+value.name+'</option>');
                    }

                });

                $("#client").html(html);

            }
        });
    }


    function states(){

        data =["Pendiente","Entregado"];

        var html=new Array();

        $.each(data,function(key, value){
            if(value == "<?php echo set_value('typeState') ? set_value('typeState'): (!empty($type_state) ? $type_state: 0) ?>"){
                html.push('<option  value="'+value+'" selected>'+value+'</option>');
            }else{
                html.push('<option  value="'+value+'">'+value+'</option>');
            }
        });

        $("#states").html(html);
    }


    function payments(){

        data =["Tarjeta","Contra Entrega"];

        var html=new Array();

        $.each(data,function(key, value){
            if(value == "<?php echo set_value('typePayment') ? set_value('typePayment'): (!empty($type_payment) ? $type_payment: 0) ?>"){
                html.push('<option  value="'+value+'" selected>'+value+'</option>');
            }else{
                html.push('<option  value="'+value+'">'+value+'</option>');
            }
        });

        $("#payments").html(html);
    }

    function deliverys(){

        data =["Domicilio","Trabajo"];

        var html=new Array();

        $.each(data,function(key, value){
            if(value == "<?php echo set_value('typeDelivery') ? set_value('typeDelivery'): (!empty($type_delivery) ? $type_delivery: 0) ?>"){
                html.push('<option  value="'+value+'" selected>'+value+'</option>');
            }else{
                html.push('<option  value="'+value+'">'+value+'</option>');
            }
        });

        $("#deliverys").html(html);
    }

</script>