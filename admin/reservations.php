<?php  require("header.php");
require("../classes/dataaccess.class.php");
$dao=new DataAccess();
$f=array('res_id','res_uname','d_name','res_date','res_status');
$c="reservation.res_did=doctor.d_id order by 'res_id' DESC";
$msg=$dao->getHtmlRows($f,"reservation,doctor",$c );
?>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Reservations</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Chart No</th>
                      <th>Patient Id</th>
                      <th>Doctor</th>
                      <th>Date</th>
                      <th>Status</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
<?php $msg=chop($msg,"<tr></tr>");echo $msg; ?>
                   
                 
                
                
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted"></div>
          </div>

          

        </div>

<?php
//echo $msg;
?>	
						</tbody>
						</table>
             </div></div></div>	
<?php  require("footer.php");
?>