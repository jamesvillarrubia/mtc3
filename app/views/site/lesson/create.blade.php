@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ String::title('Create a Lesson') }}} ::
@parent
@stop

{{-- Update the Meta Title --}}
@section('meta_title')
@parent

@stop

{{-- Update the Meta Description --}}
@section('meta_description')
@parent

@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')
@parent

@stop

{{-- Content --}}
@section('content')



{{App::environment()}}



<div class="clear-block">
	<div id="lesson-form-base-section">
		<div class="row">
			<div class="col-md-12">
				<h1>
					Basic Information:
				</h1>
			</div>
		</div>
		{{ Form::open( array(
		    'route' => 'lesson.store',
		    'method' => 'post',
		    'id' => 'form-add-lesson'
		) ) }}

		<!-- This element keeps track of the stage of submission -->
		{{ Form::hidden('lesson_stage','')}}
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="node-add-main-item mtc-lesson-label-1 col-md-2">
						<span class="lesson-field-title">
							{{ Form::label( 'lesson_title', 'Lesson Title:' ) }}
						</span>
					</div>
					<div class="node-add-main-item col-md-10">	
						{{ Form::text( 'lesson_title', '', array(
						    'id' => 'lesson_title',
						    'placeholder' => 'Enter Lesson Title',
						    'maxlength' => 20,
						    'required' => true,
						) ) }}
					</div>
				</div>
				<div class="row">
					<div class="node-add-main-item mtc-lesson-label-1 col-md-2">
						<span class="lesson-field-title">
							{{ Form::label( 'lesson_wikikeyword', 'Wikipedia Keyword:' ) }}
						</span>
					</div>
					<div class="node-add-main-item col-md-10">	
						{{ Form::text( 'lesson_wikikeyword', '', array(
						    'id' => 'lesson_wikikeyword',
						    'placeholder' => 'Enter Wikipedia Keyword',
						    'maxlength' => 20,
						) ) }}
					</div>
				</div>
				<div class="row">
					<div class="node-add-main-item col-md-5 col-md-offset-2 form-group">
						{{Form::submit('Get Full Wiki', null, array(
							'type' => 'button',
							'class' => 'btn btn-large btn-primary openbutton',
						));}}
					</div>
					<div class="node-add-main-item col-md-5 form-group">
						{{Form::submit('Get Simple Wiki', null, array(
							'type' => 'button',
							'class' => 'btn btn-large btn-primary openbutton',
						));}}					
					</div>
				</div>
				<div class="row">
					<div class="node-add-main-item  mtc-lesson-label-1 col-md-2">
						<span class="lesson-field-title">
						{{ Form::label( 'lesson_tags', 'Tags:' ) }}
						</span>
					</div>
					<div class="node-add-main-item col-md-10">	
						{{ Form::text( 'lesson_tags', '', array(
						    'id' => 'lesson_tags',
						    'placeholder' => 'Enter Lesson Tags',
						    'maxlength' => 20,
						) ) }}					
					</div>
				</div>
				<div class="row">
					<div class="node-add-main-item  mtc-lesson-label-1 col-md-2">
						<span class="lesson-field-title">
							{{ Form::label( 'lesson_grades', 'Grades:' ) }}
						</span>
					</div>
					<div class="node-add-main-item col-md-2 ">
						{{ Form::select('grade_min', array(
						    '0' => 'K',
						    '1' => '1',
						    '2' => '2',
						    '3' => '3',
						    '4' => '4',
						    '5' => '5',
						    '6' => '6',
						    '7' => '7',
						    '8' => '8',
						    '9' => '9',
						    '10' => '10',
						    '11' => '11',
						    '12' => '12+'), '3');
						}}
					</div>
					<div class="node-add-main-item col-md-6">
						<div id="rangeslider"></div>
					</div>
					<div class="node-add-main-item col-md-2">
						{{ Form::select('grade_max', array(
						    '0' => 'K',
						    '1' => '1',
						    '2' => '2',
						    '3' => '3',
						    '4' => '4',
						    '5' => '5',
						    '6' => '6',
						    '7' => '7',
						    '8' => '8',
						    '9' => '9',
						    '10' => '10',
						    '11' => '11',
						    '12' => '12+'), '10');
						}}
					</div>
				</div>
				<div class="row">
					<div class="node-add-main-item mtc-lesson-label-1 col-md-2">
						<span class="lesson-field-title">
							{{ Form::label( 'lesson_image_caption', 'Main Image Caption:' ) }}
						</span>
					</div>
					<div class="node-add-raw col-md-10">
						{{ Form::text( 'lesson_image_caption', '', array(
						    'id' => 'lesson_image_caption',
						    'placeholder' => 'Enter Main Image Caption',
						    'maxlength' => 20,
						) ) }}
					</div>
				</div>
				<div class="row">
					<div class="node-add-main-item mtc-lesson-label-1  col-md-2">
						<span class="lesson-field-title">
							{{ Form::label( 'lesson_image_credit', 'Main Image Credit:' ) }}
						</span>
					</div>
					<div class="node-add-main-item col-md-10">
						{{ Form::text( 'lesson_image_credit', '', array(
						    'id' => 'lesson_image_credit',
						    'placeholder' => 'Enter Main Image Credit',
						    'maxlength' => 20,
						) ) }}
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div style="text-align:left;    line-height: 1.2em;  font-weight: bold;      margin-top: 10px;margin-bottom: 24px;">Main Image:</div>
				<div class="mtc-lesson-main-image-preview-wrapper">
						{{Form::file('name', array())}}
				</div>
			</div>
		</div>
		{{Form::submit('Save and Continue', null, array(
			'type' => 'button',
			'class' => 'btn btn-large btn-primary openbutton',
		));}}	
	</div>

	<div id="node-ajax-wrap">
		<div class="row mtc-lesson-wrap-stage-1">
			<div class="col-md-12">
				<h1 style="padding-top: 30px;">Lesson Material:</h1>
				<span class="row">ckeditor</span>
				{{Form::textarea('lesson_store_ckeditor',null, array('class'=>'col-md-12'))}}
				<span class="row">Raw:</span>
				{{Form::textarea('lesson_store_raw',null, array('class'=>'col-md-12'))}}
				<span class="row">Tagged:</span>
				{{Form::textarea('lesson_store_tagged',null, array('class'=>'col-md-12'))}}
				<span class="row">Clean:</span>
				{{Form::textarea('lesson_store_clean',null, array('class'=>'col-md-12'))}}
			</div>
			<div id="wiki-text-wrapper"></div>
			<div id="to-tagged-wrapper"></div>
		</div>
		<div class="row mtc-lesson-wrap-stage-2">
			<div class="col-md-12">
				<h1 style="padding-top: 30px;">
					<?php //echo drupal_render($form['mtc_lesson_field_show_title']);?>
				</h1>
			</div>
		</div>
		<div class="row mtc-lesson-wrap-stage-1">
			<div class="node-hold-text col-md-12">

			</div>
		</div>
		<div class="row mtc-lesson-wrap-stage-2">
			<div class="node-hold-text col-md-12">
				<div id="flat-text-wrapper">
					<?php //print drupal_render($form['mtc_lesson_field_flat_show']); ?>
				</div>
			</div>
		</div>
		<div class="row mtc-lesson-wrap-stage-3">
			<div class="panel-group" id="accordion">
				<div class="node-hold-text col-md-12">
					<div id="question-html-wrapper">
						<?php
							//echo print_r($form_state, true);
							//$print_string = '';
						/*	if(isset($form['#full_key_and_sent'])){
								$new_count = 1;
								foreach($form['#full_key_and_sent'] as $u => $tqa){
									ob_start();
									include(drupal_get_path('module', 'mtc_lesson') . '/text_question_temp.php');
									$template = ob_get_clean();
									echo $template;
									$new_count++;
								}
							}*/
						?>
					</div>
					<div id="nontext-html-wrapper">
						<?	
						/*if(isset($form['#full_non_tqs'])){
								$nt_count = $new_count;
								foreach($form['#full_non_tqs'] as $u => $ntq){
									if(!($u === 'last')){
										$type = $ntq['type'];
										ob_start();
										include(drupal_get_path('module', 'mtc_question') . '/types/'.$type.'_question_temp.php');
										$template = ob_get_clean();
										echo $template;
									}
									$nt_count++;
								}
							} */
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
					<? /*
					$button_adds = array();
					foreach($form as $key => $element){
						if(strpos($key, 'mtc_question_button_add') !== FALSE){
							$button_adds[] = $key;
						}
					}
					$count = sizeof($button_adds);
					$mod = $count % 3;
					$rows = (($count-$mod) /3);
					for($x=0; $x<$count; $x++){
						if(($x % 3) === 0){
							echo '<div class="row">';
						}
						echo '<div class="col-md-4">';
						echo drupal_render($form[$button_adds[$x]]);
						echo '</div>';
						if((($x % 3) === 2) || ($x == ($count-1))){
							echo '</div>';
						}
					} */
					?>
			</div>
		</div>
		<div class="row">
			<div id="extra-text-wrapper"></div>
			<div class="node-buttons col-md-12">
				<div class="row">
					<? //$stage_resp = drupal_render($form['mtc_lesson_stage_response']);?>
					<div class="node-button-back col-md-3 col-sm-2"><? //print drupal_render($form['button-back']); ?></div>
					<div class="node-button-response col-md-5 col-sm-8"><? //print $stage_resp;?></div>
					<div class="node-button-next col-md-4 col-sm-8">
						<div id="bottom-button-container">
							<?php //print drupal_render($form['button-clean-text']); ?>
							<?php //print drupal_render($form['button-next']); ?>
							<?php //print drupal_render($form['submit']); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="mtc-lesson-buttons-wrapper">
			<?php //if(isset($form['buttons']['back'])): ?>
				<div class="row">
					<div class="col-md-2" id="mtc-lesson-buttons-back">
						<?php //print drupal_render($form['buttons']['back']);?>
					</div>
					<div class="col-md-9 col-md-offset-1" id="mtc-lesson-buttons-forward">
						<?php //print drupal_render($form['buttons']['forward']);
							  //print drupal_render($form['buttons']['submit']);
						?>
					</div>
				</div>

			<?php //else: ?>
				<div class="row">
					<div class="col-md-12" id="mtc-lesson-buttons-forward">
						<?php //print drupal_render($form['buttons']['forward']);
							  //print drupal_render($form['buttons']['submit']);
						?>
					</div>
				</div>

			<?php //endif; ?>
		</div>
		<div class="row">
			<div class="node-hide-text col-md-12">
				<div id="raw-text-wrapper"><?php //print drupal_render($form['field_raw_text']); ?></div>
				<div id="post-text-wrapper"><?php //print drupal_render($form['field_post_text']); ?></div>
				<div id="flat-text-wrapper"><?php //print drupal_render($form['field_flat_select']); ?></div>
				<div id="flat-hold-wrapper" style="display:none;"><?php //print drupal_render($form['mtc_lesson_field_flat_holder']); ?></div>
				<div id="storage-wrapper"><?php //print drupal_render($form['mtc_lesson_field_storage']); ?></div>
			</div>
		</div>
	</div>
	{{ Form::close() }}
</div>


  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<!--  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
<!--<script>
/*
	if(!jQuery_1_9_1){
		var jQuery_1_9_1 = $.noConflict(true);
	}
	jQuery_1_9_1(function($){
	//(function($){
		var min = $( "#edit-mtc-lesson-field-grades-min" );
		var max = $( "#edit-mtc-lesson-field-grades-max" );
		//alert($().jquery);
		var slideme = $('#rangeslider').slider({
    		range: true,
    		min: 0,
    		max: 12,
			step: 1,
			values: [0, 12],
			slide: function( event, ui ) {
				max[0].selectedIndex = ui.values[1];
				min[0].selectedIndex = ui.values[0];
			}
		});
		min.change(function() {
			newmin = min[0].selectedIndex;
			oldmax = max[0].selectedIndex;
			if(newmin > oldmax){
				slideme.slider('values', 1, newmin);
				max[0].selectedIndex = newmin;
			}
			slideme.slider('values', 0, newmin);

			//slideme.slider( "values", array(min[0].selectedIndex + 1, max[0].selectedIndex +1));
		});
		max.change(function() {
			newmax = max[0].selectedIndex;
			oldmin = min[0].selectedIndex;
			if(newmax < oldmin){
				slideme.slider('values', 0, newmax);
				min[0].selectedIndex = newmax;
			}
			slideme.slider('values', 1, newmax);
			//slideme.slider( "values", array(min[0].selectedIndex + 1, max[0].selectedIndex +1));
		});
	});
</script>
 <script src="/sites/all/libraries/ckeditor/ckeditor.js"></script>
  <script src="/sites/all/libraries/ckeditor/adapters/jquery.js"></script>
-->


@stop