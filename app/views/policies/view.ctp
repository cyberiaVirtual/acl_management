<?php
	// policies
?>
<!--<style>
@media print {
  html, body {
    display: none!important; /* hide whole page */
  }
}
</style>-->

<?php 

		$path = $this->Html->url('/files/policies/', true);
// 		var_dump($path);
// 		$directory = '../webroot/files/policies'.DS;
		$directory = WWW_ROOT.'files'.DS.'policies'.DS;
// 		var_dump($directory);
		$scanned_directory = array_diff(scandir($directory), array('..', '.'));
		// pr($scanned_directory);
		$dir_paths = array_values($scanned_directory);
			foreach($dir_paths as $id_dir => $dir) {
				$files[$id_dir] = base64_encode($path.$dir);
			}
		// pr($dir_paths);
		// pr($files);
		// echo $html->link('pdf', '/files/policies');

		// e("\n");

		// echo WWW_ROOT . DS . 'files' . DS;

		// echo $this->Html->url('/app/webroot/files/policies', true);
		// echo $this->Html->url('/files/policies', true);
?>


  <!-- In production, only one script (pdf.js) is necessary -->
  <!-- In production, change the content of PDFJS.workerSrc below -->
<script language=JavaScript>
<!--
//Disable right mouse click Script
//By Maximus (maximus@nsimail.com) w/ mods by DynamicDrive
//For full source code, visit http://www.dynamicdrive.com
var message="No se Autoriza la Impresion de este Documento";

///////////////////////////////////
	function clickIE4(){
		if (event.button==2){
		alert(message);
		return false;
		}
	}

	function clickNS4(e){
		if (document.layers||document.getElementById&&!document.all){
			if (e.which==2||e.which==3){
			alert(message);
			return false;
			}
		}
	}

	if (document.layers){
	document.captureEvents(Event.MOUSEDOWN);
	document.onmousedown=clickNS4;
	}else if (document.all&&!document.getElementById){
	document.onmousedown=clickIE4;
	}
	document.oncontextmenu=new Function("alert(message);return false")
// --> 
</script>

<script>
//     PDFJS.workerSrc = '../js/pdf.js/src/worker_loader.js';
    PDFJS.workerSrc = '<?php e($this->Html->url('/js/pdf.js/src/worker_loader.js', true));?>';
	'use strict';
</script>




<div class="row-fluid hidden-print">
<!-- <div class="row"> -->
	<div class="col-xs-6 col-sm-2">
			<ul id="tabbed" class="nav nav-pills nav-stacked">
				<?php foreach ($files as $id => $filename) {?>
					<?php $nameDecodeNav = str_replace('.pdf','',basename(base64_decode($filename)));?>
					<?php if($id === 0) {?>
					<li role="presentation" class="active">
					<?php } else {?>
					<li role="presentation">
					<?php }?>
						<a href="#<?php e($nameDecodeNav);?>" id="<?php e($nameDecodeNav);?>-tab" data-toggle="tab">
							<?php e($nameDecodeNav);?>
						</a>
					</li>
				<?php } ?>
			</ul>
	</div>
	
	<div class="col-xs-6 col-sm-10">
		<div id="tabbedContent" class='tab-content'>
		<?php foreach ($files as $id_file => $file_name) {?>
			<?php $nameDecodeContent = str_replace('.pdf','',basename(base64_decode($file_name)));?>
			<?php if($id_file === 0) {?>
			<div class="tab-pane fade in active" id="<?php e($nameDecodeContent);?>">
			<?php } else {?>
			<div class="tab-pane fade" id="<?php e($nameDecodeContent);?>">
			<?php }?>
				<?php echo $this->element('gst_aviso'); ?>
					<p>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal<?php e($nameDecodeContent);?>">
							<?php e($nameDecodeContent);?>
						</button>
					</p>
				<?php //echo $this->element('gst_modal_policies'); ?>
			</div>
			<?php }?>
		</div>
	</div>
  <!-- Optional: clear the XS cols if their content doesn't match in height -->
<!--   <div class="clearfix visible-xs-block"></div> -->
<!--   <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div> -->
		<?php foreach ($files as $idfile => $fileName) {?>
					<?php $nameDecodeModal = str_replace('.pdf','',basename(base64_decode($fileName)));?>
<!-- 				modal -->
					<div class="modal fade" id="modal<?php e($nameDecodeModal);?>" tabindex="-1" role="dialog" aria-labelledby="modal<?php e($nameDecodeModal);?>">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="modal<?php e($nameDecodeModal);?>">Policies <?php e($nameDecodeModal);?> <?php //e($files[$idfile]);?>
								
								</h4>
							</div>
							<div class="modal-body">
										<div style="text-align:center;">
											<canvas id="canvas_<?php e($nameDecodeModal);?>" style="border:1px solid black">
											</canvas>
										</div>
										
										<div style="text-align:center;">
											<span>Page: 
												<span id="page_num_<?php e($nameDecodeModal);?>">
												</span>
												/ 
												<span id="page_count_<?php e($nameDecodeModal);?>">
												</span>
											</span>
										</div>
										
										<div>
											<a href="javascript:" id="next_<?php e($nameDecodeModal);?>"  rel="next" style="float: right">
												Siguiente &rsaquo;
											</a>
											<a href="javascript:" id="prev_<?php e($nameDecodeModal);?>"  rel="prev">
												&lsaquo; Anterior
											</a>
											&nbsp; &nbsp;
											<?php
// 											   $trace = debug_backtrace();
// 											   echo "calling file was ".$trace[0]['file'];
											?>
											</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
					</div>
<!-- 					modal -->

		<?php }?>

		<div class="alert alert-default" role="alert">
			<a href="<?php e($this->Html->url(array('controller'=>'Policies','action'=>'add'), true));?>" class="alert-link">
				Agregar Politica
			</a>
		<div class="actions">
			<h3><?php __('Actions'); ?></h3>
			<ul>
				<li><?php echo $this->Html->link(__('New Policy', true), array('action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(__('List Policy', true), array('action' => 'index')); ?> </li>
			</ul>
		</div>
		</div>
</div>

		<!-- for legacy browsers add compatibility.js -->
		<!--<script src="../js/pdf.js/compatibility.js"></script>-->
		<!-- <script src="../js/pdf.js/src/pdf.js"></script> -->
	<script>
	<?php foreach($files as $index => $encPath) {?>
	"/*<?php e(base64_decode($encPath));?>*/";
	renderPdf(1.4,'<?php e($encPath);?>','canvas_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>','page_num_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>','prev_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>','next_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>','page_count_<?php e(str_replace('.pdf','',basename(base64_decode($encPath))));?>'
				);
	
	<?php }?>
	</script>
	
		<script>
// 	renderPdf(1.4,'Li4vZmlsZXMvcG9saWNpZXMvcG9ydGFsLnBkZg==','canvas_portal','page_num_portal','prev_portal','next_portal','page_count_portal'
				);

		</script>
    <script>
// 		renderPdf(1.4,"<?php e($url['0']);?>",'the-canvas','page_num','prev','next','page_count');
// 		renderPdf(1.4,"<?php e($url['1']);?>",'policiesB','pageNum','prev-page','next-page','pageCount');
	</script>

<div class="bg-danger visible-print-block">
	<div class="jumbotron">
		<h1 class="text text-center"><span class="label label-danger">Aviso!</span></h1>
		<p class="text text-center">
			<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
			<small>No se autoriza la impresion  de este Documento</small>
		</p>

	</div>
</div>




