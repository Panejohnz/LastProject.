<div id="show_modal" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i> Details</h3>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped">
          <thead class="btn-primary">
            <tr>
              <th>Number Room</th>
              <th>Categetory</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><p id="roomnum"></p></td> //here i am showing the data with the help of id
              <td><p id="roomcate"></p></td>//here i am showing the data with the help of id
              
              <td><p id="roomprice"></p></td>//here i am showing the data with the help of id
            </tr>
          </tbody>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

      $('.view_detail').click(function(){
          
          var id = $(this).attr('relid'); //get the attribute value
          
          $.ajax({
              url : "<?php echo base_url(); ?>roomcontroller/get_room",
              data:{id : id},
              method:'GET',
              dataType:'json',
              success:function(response) {
                $('#roomnum').html(response.name); //hold the response in id and show on popup
                $('#roomcate').html(response.email);
                $('#roomprice').html(response.phone);
                $('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
            }
          });
      });
    });
</script>