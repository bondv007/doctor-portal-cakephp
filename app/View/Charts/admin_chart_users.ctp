<div class="clearfix js-responses admin-chart-block js-loadadmin-chart-users-ctp">
	<?php
		$chart_title = __l('User Registration');
		$chart_y_title = __l('Users');
		$page_title = __l('User');
        $role_id = $this->request->data['Chart']['role_id'];
	    $arrow = "down-arrow";
		if (isset($this->request->params['named']['is_ajax_load'])) {
			$arrow = "up-arrow";
		}
	?>

	<div class="page-title-info clearfix">
		<h2 class="chart-dashboard-title ribbon-title clearfix">
      		<?php echo __l('Registration').' - '.$page_title; ?>
				<span class="js-chart-showhide <?php echo $arrow; ?> {'chart_block':'admin-dashboard-user<?php echo $role_id; ?>', 'dataloading':'div.js-loadadmin-chart-users-ctp',  'dataurl':'admin/charts/chart_users/is_ajax_load:1/role_id:<?php echo $role_id; ?>'}"></span>
		</h2>
	</div>
<div class="admin-center-block clearfix  <?php echo (empty($this->request->params['named']['is_ajax_load']))? 'hide' : ''; ?>" id="admin-dashboard-user<?php  echo $role_id; ?>">
			<div class="clearfix">
				<?php echo $this->Form->create('Chart' , array('class' => 'grid_right language-form', 'action' => 'chart_users')); ?>
				<?php  
					echo $this->Form->input('role_id', array('type' => 'hidden'));
					echo $this->Form->input('is_ajax_load', array('type' => 'hidden', 'value' => 1));
					echo $this->Form->input('select_range_id', array('class' => 'js-chart-autosubmit', 'label' => __l('Select Range')));
				?>
				<div class="hide"> <?php echo $this->Form->submit('Submit');  ?> </div>
				<?php echo $this->Form->end(); ?>
			</div>
			<div class="js-load-line-graph grid_left chart-half-section {'data_container':'user_line_data<?php echo $role_id; ?>', 'chart_container':'user_line_chart<?php echo $role_id; ?>', 'chart_title':'<?php echo $chart_title ;?>', 'chart_y_title': '<?php echo $chart_y_title;?>'}">
				<div class="dashboard-tl">
					<div class="dashboard-tr">
						<div class="dashboard-tc"></div>
					</div>
				</div>
				<div class="dashboard-cl">
					<div class="dashboard-cr">
						<div class="dashboard-cc clearfix">
							<div id="user_line_chart<?php echo $role_id; ?>" class="grid_left admin-dashboard-chart"></div>
							<div class="hide">
								<table id="user_line_data<?php echo $role_id; ?>" class="list">
									<thead>
										<tr>
											<th>Period</th>
											<?php foreach($chart_periods as $_period): ?>
												<th><?php echo $_period['display']; ?></th>
											<?php endforeach; ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach($chart_data as $display_name => $chart_data): ?>
											<tr>
												<th><?php echo $display_name; ?></th>
												<?php foreach($chart_data as $val): ?>
													<td><?php echo $val; ?></td>
												<?php endforeach; ?> 
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="dashboard-bl">
					<div class="dashboard-br">
						<div class="dashboard-bc"></div>
					</div>
				</div>
			</div>
			<?php if(!empty($chart_pie_data)): ?>
				<div class="js-load-pie-chart grid_left chart-half-section {'data_container':'user_pie_data<?php echo $role_id; ?>', 'chart_container':'user_pie_chart<?php echo $role_id; ?>', 'chart_title':'<?php echo $chart_title;?>', 'chart_y_title': '<?php echo $chart_y_title;?>'}">
					<div class="dashboard-tl">
						<div class="dashboard-tr">
							<div class="dashboard-tc"></div>
						</div>
					</div>
					<div class="dashboard-cl">
						<div class="dashboard-cr">
							<div class="dashboard-cc clearfix">
								<div id="user_pie_chart<?php echo $role_id; ?>" class="grid_left admin-dashboard-chart"></div>
								<div class="hide">
									<table id="user_pie_data<?php echo $role_id; ?>" class="list">								
										<tbody>
											<?php foreach($chart_pie_data as $display_name => $val): ?>
												<tr>
													<th><?php echo $display_name; ?></th>
													<td><?php echo $val; ?></td>
												</tr>	
											<?php endforeach; ?>    
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="dashboard-bl">
						<div class="dashboard-br">
							<div class="dashboard-bc"></div>
						</div>
					</div>
				</div>
			<?php endif; ?>				
		</div>

</div>