// cai element nao duoc sinh ra tu jquery, javascript, ... thi
// cach 1: su dung
// $(document).on('click', '#insert_contract', function(){
//
// cach 2: nguoc lai thi xu ly binh thuong
// $('#insert_contract').on('click', function(){
//

$(document).ready(function() {
    //insert contracts
    $(document).on('click', '#insert_contract', function(){
        var id_worker = $('#id_worker').val();
        var code = $('#code').val();
        var wage = $('#wage').val();
        var effective_date = $('#effective_date').val();
        var expiry_date = $('#expiry_date').val();
        var status = $('#status').val();
        var contract_type_id = $('#contract_type_id').val();
        console.log(contract_type_id);
        if(code == '' || contract_type_id == '' || wage == '' || status == '' || effective_date == '' || expiry_date ==''){
            alert('Không được bỏ trống các trường');
        }else{
            $.ajax({
                url: url_contract_store,
                method: 'POST',
                data:{
                    _token: _csrf,
                    id_worker:id_worker,
                    code:code,
                    contract_type_id:contract_type_id,
                    wage:wage,
                    status:status,
                    effective_date:effective_date,
                    expiry_date:expiry_date
                },
                success : function($data){
                    alert('Insert dữ liệu thành công');
                    $("#insert_data_contracts")[0].reset();

                    // success thi co the reload lai hoac in ra data
                    window.location.reload();
                }
                
            });
        }
    });


    // $('#contract_type_id').on('change', function() {
    //     var contract_type_id = $('#contract_type_id').val();
    //     alert (contract_type_id);
    // });


    // delete contract (AJAX)
    $(document).on('submit', '.frm-contract-delete', function (event) {
        event.preventDefault();

        // process AJAX
        let url = $(this).attr('action');
        let csrf = $(this).find('input[name=_token]').val();
        $.ajax({
            url: url,
            type: 'DELETE',
            data: {
                '_token': csrf
            },
            success: function (response) {
                console.log('response', response);

                // re-generate HTML (data for table contract)
                $('#table-contract-data').html(response.data_table);
                window.location.reload();
                

            },
            error: function (err) {
                console.log('err', err);
            },
            dataType: 'json'
        });
    });



// edit contract
    
});

// $(document).on('submit', '#edit_data_contracts', function (e){
      //     e.preventDefault();
      //     let url = $('#url').val();
      //     let id = $("#id").val();
      //     let code = $("#code1").val();
      //     let start_day = $("#effective_date1").val();
      //     let end_day = $("#expiry_date1").val();
      //     let wage = $("#wage1").val();
      //     let status = $("#status1").val();
      //     let contract_type_id = $("#contract_type_id1").val();  
      //     let _token = $('input[name=_token]').val();
      //     $.ajax({
      //       url: url,
      //       type: "PUT",
      //       data: {
      //         id:id,
      //            id_worker:id_worker,
      //               code:code,
      //               start_day:start_day,
      //               end_day:end_day,
      //               wage:wage,
      //               status:status,
      //               contract_type_id:contract_type_id,
      //               _token: _token,
      //       },
      //       success:function(response){
      //         alert('update thành công');
      //         $('#sid' + response.id + ' td:nth-child(1)').text(response.code);
      //         $('#sid' + response.id + ' td:nth-child(2)').text(response.start_day);
      //         $('#sid' + response.id + ' td:nth-child(3)').text(response.end_day);
      //         $('#sid' + response.id + ' td:nth-child(4)').text(response.wage);
      //         $('#sid' + response.id + ' td:nth-child(5)').text(response.status);
      //         $('#sid' + response.id + ' td:nth-child(6)').text(response.contract_type_id);
              
      //         $("#exampleModal1").modal('toggle');
      //         $("#edit_data_contracts")[0].reset();
      //       }
      //     });
      // });


