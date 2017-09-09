<div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1><?php echo $heading;?> <small><?php echo $subheading;?></small></h1>
                </div>

                <div class="row-fluid">
				
					<div class="span1"></div>
				
                    <div class="span10">
                        <div class="block">
                            <div class="span11">
                                <span class="label"> <a style="color:white;" href="<?php echo "www.google.com";?>"><?php echo "Link1";?></a> </span>
                                <span class="label label-info" style="align: right;"> <a style="color:white;" href="<?php echo "www.google.com";?>"><?php echo "Link1";?></a></span>
                                <span class="label label-success" style="align: right;"> <a style="color:white;" href="<?php echo "www.google.com";?>"><?php echo "Link1";?></a></span>
                            </div>
                            <div class="span1"></div>
                        </div>
                        <div class="block">
                            <div class="head blue">
                                <h5><?php echo $message;?></h5>                         
                            </div>                
                            <div class="data-fluid">
                                <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                    <thead>
                                        <tr>
                                            <th width="5%" style="vertical-align: text-top;">
                                            <?php echo "ID";?>
                                            </th>
                                            <th width="15%" style="vertical-align: text-top;">
                                            <?php echo "Order Time";?>
                                            </th>
                                            <th width="15%" style="vertical-align: text-top;">
                                            <?php echo "Order No.";?>
                                            </th>
                                            <th width="5%" style="vertical-align: text-top;">
                                            <?php echo "Discount";?>
                                            </th>
											<th width="10%" style="vertical-align: text-top;">
                                            <?php echo "Amount";?>
                                            </th>
                                            <th width="10%" style="vertical-align: text-top;">
                                            <?php echo "User";?>
                                            </th>
                                            <th width="10%" style="vertical-align: text-top;">
                                            <?php echo "Payment Mode";?>
                                            </th>
                                            <th width="5%" style="vertical-align: text-top;">
                                            <?php echo "Status";?>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach ($orderlist as $list):?>
                                        <tr>
                                            <td style="text-align: left;">
                                                <?php echo anchor("apps/level/view/".$list->id, $list->id);?>
                                            </td>
                                            <td style="text-align: left;">
                                                <?php echo htmlspecialchars($list->ordertime,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td style="text-align: left;">
                                                <?php echo anchor("admin/gameshop/order_view/".$list->orderno, htmlspecialchars($list->orderno,ENT_QUOTES,'UTF-8'));?>
                                            </td>
                                            <td style="text-align: left;">
                                                <?php echo number_format((float)htmlspecialchars($list->discount,ENT_QUOTES,'UTF-8'), 2, '.', '');?>%
                                            </td>
                                            <td style="text-align: left;">
                                                BDT <?php echo number_format((float)htmlspecialchars($list->totalprice,ENT_QUOTES,'UTF-8'), 2);?>
                                            </td>
                                            <td style="text-align: left;">
                                                <?php echo htmlspecialchars($list->userid,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td style="text-align: left;">
                                                <?php echo htmlspecialchars($list->userid,ENT_QUOTES,'UTF-8');?>
                                            </td>
											<td style="text-align: left;">
                                                <span><!--
												<?php echo ($user->active) ? anchor("users/admin/deactivate/".$user->id, lang('index_active_link')) : anchor("users/admin/activate/". $user->id, lang('index_inactive_link'));?>
												</span> <span style="color:#4692D7;"> | </span>--> <span>
												<?php echo anchor("apps/level/edit/".$list->status, $list->statusname) ;?>
												<!--span style="color:#4692D7;"> | </span> <span>
												<?php echo anchor("apps/level/add/".$list->status, 'Add') ;?>
												</span-->
                                            </td>
                                        </tr>
                                    <?php endforeach;?> 
									</tbody>
                                </table>
                               	<br></br><!--
                                <div class="block">
                                    <div class="span5">
                                        
                                    </div>
                                    <div class="span2">
                                        <span class="label label-important"><?php echo $links; ?> </span> 
                                    </div>
                                    <div class="span5">
                                        
                                    </div>
                                </div>-->
								<div class="block">
                                    <div class="span11">
                                        <span class="label"> <a style="color:white;" href="<?php echo "www.google.com";?>"><?php echo "Link1";?></a></span>
                                        <span class="label label-info" style="align: right;"> <a style="color:white;" href="<?php echo "www.google.com";?>"><?php echo "Link1";?></a></span>
                                        <span class="label label-success" style="align: right;"> <a style="color:white;" href="<?php echo "www.google.com";?>"><?php echo "Link1";?></a></span>
                                    </div>
                                    <div class="span1">
                                        <span class="label label-important"><?php echo anchor('users/admin/logout', lang('logout_heading'))?> </span>
                                    </div>
                                </div>
							</div>                
                        </div>


                    </div>
                
					<div class="span1"></div>
				</div>  
                <div style="margin-bottom: 100px;">
                    <br />
                </div>

                <div class="row-fluid">
                    <br></br>
                </div>
            </div>
            