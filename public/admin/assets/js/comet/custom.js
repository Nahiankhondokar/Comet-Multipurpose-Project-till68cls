(function($){
    $(document).ready(function(){

        // Load CK Editor
        CKEDITOR.replace('post_editor');


        // Select 2
        $('.post_tag_select').select2();




        // Logout Features
        $(document).on('click', '#logout_btn',  function(e){
            e.preventDefault();
            $('#logout_form').submit();
        });
    });



    // Categoy Status
      $(document).on('click', 'input.cat_check', function(){
          
          let checked = $(this).attr('checked');
          let status_id = $(this).attr('status_id');
          
          if(checked == 'checked'){
            $.ajax({
                url : 'category/status-inactive/' + status_id,
                success : function(data){
                    swal('status inactive successfully');
                }
            });
          }else{
            $.ajax({
                url : 'category/status-active/' + status_id,
                success : function(data){
                    swal('status active successfully');
                }
            });
          }
          
      });


      // Delete Button fix for Category
      $(document).on('click', '.delete_btn', function(){

        let conf = confirm('Are you sure ? ');

        if(conf == true){
            return true;
        }else{
            return false;
        }
          
        // swal({
        //     title: "Are you sure?",
        //     text: "Once deleted, you will not be able to recover this imaginary file!",
        //     icon: "warning",
        //     buttons: true,
        //     dangerMode: true,
        // })
        // .then((willDelete) => {
        //     if (willDelete) {
        //     swal("Poof! Your imaginary file has been deleted!", {
        //         icon: "success",
        //     });
        //     } else {
        //     swal("Your imaginary file is safe!");
        //     }
        // });
      });



      // Category Edit
      $('.edit_cat').click(function(e){
          e.preventDefault();

          let id = $(this).attr('edit_id');

          $.ajax({
              url : 'category/' +id+ '/edit',
              success : function(data){
                  $('#edit_category_modal form input[name="name"]').val(data.name);
                  $('#edit_category_modal form input[name="edit_id"]').val(data.id);
                  $('#edit_category_modal').modal('show');
              }
          });

      });




       // Delete Button fix for Tag
       $(document).on('click', '.delete_btn_tag', function(){

        let conf = confirm('Are you sure ? ');

        if(conf == true){
            return true;
        }else{
            return false;
        }
       
      });



      // Tag Edit
      $('.edit_tag').click(function(e){
        e.preventDefault();

        let id = $(this).attr('edit_id');

        $.ajax({
            url : 'tag/' +id+ '/edit',
            success : function(data){
                $('#edit_tag_modal form input[name="name"]').val(data.name);
                $('#edit_tag_modal form input[name="edit_id"]').val(data.id);
                $('#edit_tag_modal').modal('show');
            }
        });

    });



    // Tag Status Switcher Button Fix
     $(document).on('click', 'input.tag_check', function(){

        let id = $(this).attr('status_id');
        let checked = $(this).attr('checked');
         
        if(checked == 'checked'){

            $.ajax({
                url : 'tag/status-inactive/' + id, 
                success : function(data){
                    swal('status inactive successfully');
                }
            });

        }else{

            $.ajax({
                url : 'tag/status-active/' + id, 
                success : function(data){
                    swal('status active successfully');
                }
            });

        }
        
     });
     
     

     // Post img load 
     $('#post_img_select').change(function(e){

        let img_url = URL.createObjectURL(e.target.files[0]);
        $('.post_img_load').attr('src', img_url);

     });


     // Post gallery img load 
     $('#post_img_select_g').change(function(e){

        let img_gall = '';
        for( let i=0; i < e.target.files.length; i++){

            let file_url = URL.createObjectURL(e.target.files[i]);
            img_gall += '<img class="shadow" src="'+ file_url +'">';

        }

        $('.post_gallery_img').html(img_gall);
        
       
     });




     // Select Post Format
     $('#post_format').change(function(){

        let format = $(this).val();
        
        if( format == 'Image' ){
            $('.post_image').show();
        }else{
            $('.post_image').hide();
        }

        if( format == 'Gallery' ){
            $('.post_gallery').show();
        }else{
            $('.post_gallery').hide();
        }

        if( format == 'Video' ){
            $('.post_video').show();
        }else{
            $('.post_video').hide();
        }

        if( format == 'Audio' ){
            $('.post_audio').show();
        }else{
            $('.post_audio').hide();
        }

     });




     // DashBord Menu Fix
     $('#sidebar-menu ul li ul li.ok').parent('ul').slideDown();
     $('#sidebar-menu ul li ul li.ok a').css('color', '#5ae8ff');
     $('#sidebar-menu ul li ul li.ok').parent('ul').parent('li').children('a').css('background-color', 'rgb(90, 232, 255)');
     $('#sidebar-menu ul li ul li.ok').parent('ul').parent('li').children('a').addClass('subdrop');



})(jQuery)
