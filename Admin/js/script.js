function checkCredential()
{
    var username=$('#username').val();
    var password=$('#password').val();

    if(username=='' || password=='')
    {
        alert("Please Insert UserName & Password!");
    }
    else{
    
        var dataString="username="+username+"&password="+password;

        $.ajax({
            type: "POST",
            url: "API/checkCredential.php",
            data: dataString,
            cache: false,
            success: function(html) {
                //alert(html);
               if(html=="1"){
                window.location.href = "Home.php";
               }
               else{
                alert("Wrong Username or Password!");
               }
               
            }
            });

    }
}



function GetBasicInfo()
{
    $.ajax({
        type: "POST",
        url: "API/getBasicInfo.php",
        data: '',
        cache: false,
        success: function(html) {
           $('.content-wrapper').html(html)
        }
        });
}


function SaveBasicInfo()
{
    var npn=$('#npn').val();
    var wa=$('#wa').val();
    var ea=$('#ea').val();
    var a=$('#a').val();
    var mn=$('#mn').val();
    var fb=$('#fb').val();
    var yt=$('#yt').val();

    var dataString='npn='+npn+'&wa='+wa+'&ea='+ea+'&a='+a+'&mn='+mn+'&fb='+fb+'&yt='+yt;

    $.ajax({
        type: "POST",
        url: "API/saveBasicInfo.php",
        data: dataString,
        cache: false,
        success: function(html) {
           alert(html);
        }
    });
   
}


function GetCategory()
{
    $.ajax({
        type: "POST",
        url: "API/getCategory.php",
        data: '',
        cache: false,
        success: function(html) {
           $('.content-wrapper').html(html);
           let table = new DataTable('#categoryTbl');
           $("html, body").animate({ scrollTop: 0 }, "slow");
        }
        });
}

var CategoryId=0;
function SaveCategory()
{
    var name=$('#name').val();
    var is_active=$('#isactive').is(":checked");
    if(is_active)
    {
        is_active=1;
    }
    else{
        is_active=0;
    }
    var dataString='name='+name+'&is_active='+is_active+'&id='+CategoryId;

    $.ajax({
        type: "POST",
        url: "API/saveCategory.php",
        data: dataString,
        cache: false,
        success: function(html) {
           alert(html);
           CategoryId=0;
           GetCategory();
        }
    });
}

function EditCategory(id,e)
{
    CategoryId=id;
    var row = $(e).closest('tr');
    var name=row.find('.name').text();
    var is_active=row.find('.is_active').text();

    $('#name').val(name);
    if(is_active=="Inactive"){
       $( "#isactive" ).prop( "checked", false );
    }
    else
    {
        $( "#isactive" ).prop( "checked", true );
    }
    $("html, body").animate({ scrollTop: $(document).height()-$(window).height() });
    
}

function Delete(id,table)
{
    dataString='id='+id+'&table='+table;

    $.ajax({
        type: "POST",
        url: "API/delete.php",
        data: dataString,
        cache: false,
        success: function(html) {
           alert(html);
           if(table=='category'){
              GetCategory();
           }
           if(table=='sub_category'){
             GetSubCategory();
          }
           else{
             
           }
        }
    });
}

function GetNews()
{
    $.ajax({
        type: "POST",
        url: "API/getNews.php",
        data: '',
        cache: false,
        success: function(html) {
           $('.content-wrapper').html(html);
           let table = new DataTable('#newsTbl');
           $("html, body").animate({ scrollTop: 0 }, "slow");
        }
        });
}

var NewsId=0;
function SaveNews(image_url)
{
    var headline=$('#headline').val();
    var news=$('#news').val();
    var category_id=$('#category_id').val();
    var reporter=$('#reporter').val();
    var is_active=$('#isactive').is(":checked");
    if(is_active)
    {
        is_active=1;
    }
    else{
        is_active=0;
    }
    var dataString='headline='+headline+'&is_active='+is_active+'&id='+NewsId+"&news="+news+"&category_id="+category_id+"&image_url="+image_url+"&reporter="+reporter;

    $.ajax({
        type: "POST",
        url: "API/saveNews.php",
        data: dataString,
        cache: false,
        success: function(html) {
           alert(html);
           NewsId=0;
           GetNews();
        }
    });
}

function EditNews(id,e)
{
    NewsId=id;
    var row = $(e).closest('tr');
    var headline=row.find('.headline').text();
    var news=row.find('.news').text();
    var reporter=row.find('.reporter').text();
    var category_name=row.find('.category_name').text();
    var is_active=row.find('.is_active').text();

    $('#headline').val(headline);
    $('#news').val(news);
    $('#reporter').val(reporter);
    if(is_active=="Inactive"){
       $( "#isactive" ).prop( "checked", false );
    }
    else
    {
        $( "#isactive" ).prop( "checked", true );
    }
    
     $('#category_id option').each(function() {
        if ($(this).text() === category_name) {
          $(this).prop('selected', true);
        }
     });
  
    $("html, body").animate({ scrollTop: $(document).height()-$(window).height() });
}


function saveImage(){

    var file = $("#imageInput")[0].files[0];
    var formData = new FormData();
    formData.append('image', file);

    $.ajax({
      url: 'API/saveImage.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        console.log("Image uploaded successfully. URL: " + response);
        SaveNews(response);
        // You can do something with the URL, like display it to the user
      },
      error: function(xhr, status, error) {
        console.error("Error uploading image: " + error);
      }
    });
}

function GetSubCategory()
{
    $.ajax({
        type: "POST",
        url: "API/getSubCategory.php",
        data: '',
        cache: false,
        success: function(html) {
           $('.content-wrapper').html(html);
           let table = new DataTable('#subcategoryTbl');
           $("html, body").animate({ scrollTop: 0 }, "slow");
        }
        });
}

var SubCategoryId=0;
function SaveSubCategory()
{
    var name=$('#name').val();
    var is_active=$('#isactive').is(":checked");
    var categoryid=$('#categoryid').val();
    if(is_active)
    {
        is_active=1;
    }
    else{
        is_active=0;
    }
    var dataString='name='+name+'&is_active='+is_active+'&categoryid='+categoryid+"&id="+SubCategoryId;

    $.ajax({
        type: "POST",
        url: "API/saveSubCategory.php",
        data: dataString,
        cache: false,
        success: function(html) {
           alert(html);
           SubCategoryId=0;
           GetSubCategory();
        }
    });
}

function EditSubCategory(id,e)
{
    SubCategoryId=id;
    var row = $(e).closest('tr');
    var name=row.find('.name').text();
    var is_active=row.find('.is_active').text();

    $('#name').val(name);
    if(is_active=="Inactive"){
       $( "#isactive" ).prop( "checked", false );
    }
    else
    {
        $( "#isactive" ).prop( "checked", true );
    }
    $("html, body").animate({ scrollTop: $(document).height()-$(window).height() });
    
}