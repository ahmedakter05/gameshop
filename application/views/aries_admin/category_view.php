<div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1><?php echo lang('client_view_heading');?> <small><?php echo lang('client_view_subheading');?></small></h1>
                </div>

                <div class="row-fluid">
				
					<div class="span1"></div>
				
                    <div class="span10">
                        <div class="block">
                            <div class="head blue">
                                <h3><?php echo $message;?></h3>                         
                            </div>                
                            <div class="data-fluid">
                                <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                    <thead>
                                        <tr>
                                            <th width="15%">
                                            <?php echo lang('client_name_th');?>
                                            </th>
                                            <th width="15%">
                                            <?php echo lang('client_agentname_th');?>
                                            </th>
                                            <th width="15%" align="center">
                                            <?php echo lang('client_passportno_th');?>
                                            </th>
                                            <th width="15%">
                                            <?php echo lang('client_fileno_th');?>
                                            </th>
											<th width="15%">
                                            <?php echo lang('client_status_th');?>
                                            </th>
                                            <th width="15%">
                                            <?php echo lang('client_action_th');?>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach ($clients as $client):?>
                                        <tr>
                                            <td>
                                                <?php echo htmlspecialchars($client->firstname,ENT_QUOTES,'UTF-8');?> <?php echo htmlspecialchars($client->lastname,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td>
                                                <?php echo htmlspecialchars($client->agentname,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td>
                                                <?php echo htmlspecialchars($client->passportnoclient,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td>
												<?php echo htmlspecialchars($client->filenumber,ENT_QUOTES,'UTF-8');?>
                                            </td>
                                            <td>
                                                <?php //echo htmlspecialchars($client->status,ENT_QUOTES,'UTF-8');?>
                                                <span><?php echo anchor("apps/client/change_status/".$client->clientid, "$client->status") ;?></span>
                                            </td>
											<td>
                                                <span><!--
												<?php echo ($user->active) ? anchor("users/admin/deactivate/".$user->id, lang('index_active_link')) : anchor("users/admin/activate/". $user->id, lang('index_inactive_link'));?>
												</span> <span style="color:#4692D7;"> | </span>--> <span>
												<?php echo anchor("apps/client/update/".$client->clientid, 'Update') ;?>
												<span style="color:#4692D7;"> | </span> <span>
												<?php echo anchor("apps/payment/view/".$client->clientid, 'Payment') ;?>
												</span>
                                            </td>
                                        </tr>
                                    <?php endforeach;?> 
									</tbody>
                                </table>
                               	<br></br>
                                <div class="block">
                                    <div class="span5">
                                        
                                    </div>
                                    <div class="span2">
                                        <span class="label label-important"><?php echo $links; ?> </span>
                                    </div>
                                    <div class="span5">
                                        
                                    </div>
                                </div>
								<div class="block">
									<div class="span11">
										<span class="label label-info"><?php echo anchor('users/admin/create_user', lang('index_create_user_link'))?> </span> <span class="label label-success" style="color: #FFF; align: right;"> <?php echo anchor('users/admin/create_group', lang('index_create_group_link'))?></span>
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

                <div class="row-fluid">
                    <br></br><br></br><br></br><br></br><br></br>
                    <br></br><br></br>
                </div>
            </div>
            