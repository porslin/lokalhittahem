$('#create-blog-form').on('submit',addObjectEvent);

async function addObjectEvent(e){
    e.preventDefault();

    const formData = new FormData(e.target);
    formData.set('createBtn', true);


    try {
        const response = await fetch('./create.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

    $('#form-messages-success').html(data['success']);
    $('#form-messages-address').html(data['error1']);
    $('#form-messages-zone').html(data['error2']);
    $('#form-messages-city').html(data['error3']);
    $('#form-messages-description').html(data['error4']);
    $('#form-messages-type').html(data['error5']);          
    $('#form-messages-tenure').html(data['error6']);    
    $('#form-messages-room').html(data['error7']);    
    $('#form-messages-size').html(data['error8']);    
    // $('#form-messages-floor').html(data['error']);    
    // $('#form-messages-totalfloor').html(data['error']);    
    $('#form-messages-year').html(data['error9']);    
    // $('#form-messages-cooperative').html(data['error']);    
    // $('#form-messages-monthly').html(data['error']);   
    // $('#form-messages-price').html(data['error']);   
    // $('#form-messages-img').html(data['error']);   
    // $('#form-messages-img1').html(data['error']);   
    // $('#form-messages-img2').html(data['error']);   
    // $('#form-messages-img3').html(data['error']);   
    // $('#form-messages-img4').html(data['error']);   
    // $('#form-messages-floorplan').html(data['error']);   
    // $('#form-messages-map').html(data['error']);   
        
    
} catch(error) {
        console.log(error);
    }
};
