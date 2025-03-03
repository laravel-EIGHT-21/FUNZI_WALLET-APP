$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
  
  
                  Swal.fire({
                    title: 'Are you sure you want to Delete This Data?',
                    text: "Once Deleted, You will not be able to Undo !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  }) 
  
  
    });
  
  });
  
  
  
  
  
  
  
  
  
  
  $(function(){
    $(document).on('click','#activate',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
  
  
                  Swal.fire({
                    title: 'Are you sure you want to Activate This User?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Activate User Status!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Activated!',
                        'User Account Has Been Activated.',
                        'success'
                      )
                    }
                  }) 
  
  
    });
  
  });
  
  
  
  
  
  
  
  $(function(){ 
    $(document).on('click','#deactivate',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
  
  
                  Swal.fire({
                    title: 'Are you sure you want to Deactivate This User?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Deactivate User Status!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Activated!',
                        'User Account Has Been Deactivated.',
                        'success'
                      )
                    }
                  }) 
  
  
    });
  
  });
  













  
  
  $(function(){
    $(document).on('click','#activate_tour',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
  
  
                  Swal.fire({
                    title: 'You are about To Activate Tour Package...',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Activate Tour Package!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Activated!',
                        'Tour Package Has Been Activated.',
                        'success'
                      )
                    }
                  }) 
  
  
    });
  
  });
  
  
  
  
  
  
  
  $(function(){ 
    $(document).on('click','#deactivate_tour',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
  
  
                  Swal.fire({
                    title: 'You are about to Deactivate Tour Package...',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Deactivate Tour Package!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Activated!',
                        'Tour Package Has Been Deactivated.',
                        'success'
                      )
                    }
                  }) 
  
  
    });
  
  });
  
  
  
  
  
  
  
  
  
  
  
// Confirm 

$(function(){
  $(document).on('click','#confirm',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Order Status To Confirm?',
                  text: "Once Confirmed, You will not be able to Undo !",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Confirm Order!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Confirm Order!',
                      'Confirm Changes',
                      'success'
                    )
                  }
                }) 


  });

});



// shipped


$(function(){
  $(document).on('click','#shipped',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Order Status To Shipped?',
                  text: "Once Shipped, You will not be able to Undo !",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Order Shipped!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Order Shipped!',
                      'Shipped Changes',
                      'success'
                    )
                  }
                }) 


  });

});

//delivered



$(function(){
  $(document).on('click','#delivered',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Order Status To Delievered !',
                  text: "Once Delivered, You will not be able to Undo !",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Order Delivered!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Order Delivered!',
                      'Delivered Changes',
                      'success'
                    )
                  }
                }) 


  });

});


// Confirming 

$(function(){
  $(document).on('click','#cancelled',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Are You Sure To Cancel Order?',
                  text: "Once Cancelled, You will not be able to Undo again!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Cancel Order!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Order Cancelled!',
                      'Cancelled Changes',
                      'danger'
                    )
                  }
                }) 


  });

});

  


//Tours Confirmed

  
// Confirm 

$(function(){
  $(document).on('click','#confirm2',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Confirm Tour Booking?',
                  text: "Once Confirmed, You will not be able to Undo !",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Confirm Booking!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Confirm Bookings!',
                      'Confirm Changes',
                      'success'
                    )
                  }
                }) 


  });

});

