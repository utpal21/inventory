/**
 * Created by Utpal on 4/26/2017.
 */
$(document).ready(function(){
    var winHeight = $(window).height();
    $("#page-wrapper").css('min-height', winHeight-70 );
    //data table initial
     $('#labell').DataTable();

});

$('.add-label').on('click', function(e) {
  e.preventDefault();
  var ckbox = $("input[name='isset']");
  var chkVal = '';
  if (ckbox.is(':checked')){
    chkVal = ckbox.val();
  }
  var formAction = $('.label-entry').attr("action");
              $.ajax({
                type: 'POST',
                url: formAction,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $('.label_name').val(),
                    'isset': chkVal
                },
                success: function(data) {
                  if(typeof data.error !== 'undefined')                    {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Validation error!', data.error , {timeOut: 5000});
                        }, 500);
                    } else {
                        toastr.success('Successfully added Label!', data[0].msg, {timeOut: 5000});
                        $('#addModal').modal('hide');
                        location.reload();
                    }
                },
            });
        });
