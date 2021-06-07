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

    $(document).on('submit', '.frm-contract-edit', function (event) {
        event.preventDefault();

        // process AJAX
        let url = $(this).attr('action');
        let csrf = $(this).find('input[name=_token]').val();
        $.ajax({
            url: url,
            type: 'POST',
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
});


$('#frm-contract-edit').click(function() {
    var id_hd = $('.id_wk').val();
    console.log(id_hd);
    $.ajax({
        
    });
});

