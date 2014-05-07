<div class="box box-success">
	<div style="cursor: move;" class="box-header">
	    <h3 class="box-title"><i class="fa fa-comments-o"></i> Chat</h3>
	    <div data-original-title="Status" class="box-tools pull-right" data-toggle="tooltip" title="">
		<div class="btn-group" data-toggle="btn-toggle">
		    <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>                                            
		    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
		</div>
	    </div>
	</div>
	<div style="position: relative; overflow: hidden; width: auto; height: 250px;" class="slimScrollDiv"><div style="overflow: hidden; width: auto; height: 250px;" class="box-body chat" id="chat-box">
	    
		<?php
		function showmsgs($msgs){
			foreach($msgs as $msgitem){
				//displaying msg item

				echo    "<div class=\"item\">"
				echo	"<img src=" . $msgitem['avatar'] . "alt=\"user image\" class=" . $msgitem['login-status'] . ">";
				echo	"<p class=\"message\">";
				echo	"    <a href=\"#\" class=\"name\">";
				echo	"	<small class=\"text-muted pull-right\"><i class=\"fa fa-clock-o\"></i>" . $msgitem['time'] ." </small>";
				echo		$msgitem['name'];
				echo	"	</a>";
				echo	    $msgitem['msg'];
				echo	"</p>";
				echo    "</div>";

			}
		}
	?>

	</div><div style="background: none repeat scroll 0% 0% rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 187.126px;" class="slimScrollBar"></div><div style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: none repeat scroll 0% 0% rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;" class="slimScrollRail"></div></div><!-- /.chat -->
	<div class="box-footer">
	    <div class="input-group">
		<input class="form-control" placeholder="Type message...">
		<div class="input-group-btn">
		    <button class="btn btn-success"><i class="fa fa-plus"></i></button>
		</div>
	    </div>
	</div>
</div>
