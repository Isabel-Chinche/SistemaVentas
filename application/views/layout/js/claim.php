<script>
    $(document).ready( function () {
        $('#claimTable').DataTable();
        $(".nav-claim").addClass("active");

        client();
        messages();


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
            url: "<?php echo base_url(); ?>claim/Main/getData",
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


    function messages(){

        data =["Reclamo","Sugerencia"];

        var html=new Array();

        $.each(data,function(key, value){
            if(value == "<?php echo set_value('typeMessage') ? set_value('typeMessage'): (!empty($type_message) ? $type_message: 0) ?>"){
                html.push('<option  value="'+value+'" selected>'+value+'</option>');
            }else{
                html.push('<option  value="'+value+'">'+value+'</option>');
            }
        });

        $("#messages").html(html);
    }
</script>