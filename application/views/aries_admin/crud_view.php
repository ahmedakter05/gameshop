           <?php 
            foreach($crud->css_files as $file): ?>
                <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
            <?php endforeach; ?>
            <?php foreach($crud->js_files as $file): ?>
                <script src="<?php echo $file; ?>"></script>
            <?php endforeach; ?>
           <div class="content">
                
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-arrow-right"></span>
                    </div>
                    <h1><?php echo $activepage;?> <small>TechFocus Ltd.</small></h1>
                </div>
                
				
				<div class="row-fluid">
                    <div class="span12">
                        <div class="widgets">
							<br></br>
							<?php echo $crud->output; ?>
                        </div>
                    </div>
                </div>
                
                <div class="row-fluid">
                    <br></br><br></br><br></br><br></br><br></br>
                </div>
                
				
                 
				
            </div>
  