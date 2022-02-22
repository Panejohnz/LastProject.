<div>

    <input type="text" name="ku" id="ku">
    <a  href="#" class="btn btn-danger" id ="sendButton" disabled >kuu</a>
</div>
<script>
    var end = 0;
    $('#ku').change(function (){
    end = $("#ku").val()
    console.log(end);
    if(end != ''){
        $('#sendButton').attr('disabled',false)
        
    }else{
        $('#sendButton').attr('disabled',true)
    }

  });

</script>