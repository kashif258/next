jQuery(function($){
  $('#creatorhub-upload-form').on('submit', function(e){
    e.preventDefault();
    var formData = new FormData(this);
    $('#creatorhub-upload-response').text('Uploading...');
    $.ajax({
      url: creatorhubData.ajaxUrl,
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response){
        if (response.success) {
          $('#creatorhub-upload-response').text(response.data.message || 'Upload complete.');
        } else {
          $('#creatorhub-upload-response').text(response.data.message || 'Upload failed.');
        }
      },
      error: function(){
        $('#creatorhub-upload-response').text('Upload failed.');
      }
    });
  });

  $.post(creatorhubData.ajaxUrl, { action: 'creatorhub_ping', nonce: creatorhubData.nonce });
});
