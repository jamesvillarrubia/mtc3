@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ String::title($lesson->title) }}} ::
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

{{-- Content --}}
@section('content')


<h3>{{ $lesson->title() }}</h3>

<h5>Basic Variables</h5>
<span>Format:</span>{{implode($lesson->format())}}
<br>
<span>Levels:</span>{{implode($lesson->levels())}}


<h4>Raw Text</h4>

<p>{{ $lesson->getRaw() }}</p>

<h4>Tagged Text</h4>

<p>{{ $lesson->getTagged() }}</p>

<h4>Clean Text</h4>

<p>{{ $lesson->getClean() }}</p>



<style>
.mtc-quiz-stage-1{display:none;}
.mtc-quiz-stage-2-3-4{display:none;}
.mtc-quiz-stage-3{display:none;}
.mtc-quiz-stage-5{display:none;}
</style>

<div id="mtc-quiz-display-state"><style type="text/css">.mtc-quiz-stage-1{display:block;}</style></div>


<div class="row mtc-quiz-stage-1">
	<div class="col-md-12">
		<div class="row top_section" style="min-height:300px; height:300px; position:relative;">
			<div class="col-md-2 quiz-author-section-wrapper" style="height:100%">
				<div class="author-headshot" style="
					background-image: url(<? //echo file_create_url($file->uri)?>); 
					height: 50%;
					background-size: cover;
					background-position: center center;
					background-repeat: no-repeat;
					border: 0px;
													">
				</div>

				<div style="height:20%;padding-top: 5px;" class="author-set">
					<div class="author-name"><?  ?></div> 
					<div class="author-credentials"><? ?></div>
				</div>
				<div style="height:15%" class="author-rating"><span>Points:</span><span><?  ?></span></div>
				<div style="height:15%" class="author-course-count"><span>Courses:</span><span><?  ?></span></div> 
			</div>
			<div class="col-md-3 quiz-quiz-section-wrapper" style="height:100%">
				<div style="height:15%"><span>Questions:</span><span><?  ?></span></div>
				<div style="height:15%"><span>Grades:</span><span><?  ?>-<?  ?></span></div>
				<div style="height:40%"><span>Types:</span><span><? ?></span></div>
				<div style="height:15%">
					<span>TR:</span>
					<span class="star-icon full">&#9734;</span>
					<span class="star-icon full">&#9734;</span>
					<span class="star-icon full">&#9734;</span>
					<span class="star-icon half">&#9734;</span>
					<span class="star-icon">&#9734;</span>
				</div> 
				<div style="height:15%">
					<span>SR:</span>
					<span class="star-icon full">&#9734;</span>
					<span class="star-icon full">&#9734;</span>
					<span class="star-icon full">&#9734;</span>
					<span class="star-icon half">&#9734;</span>
					<span class="star-icon">&#9734;</span>

				</div>
			</div>
			<div class="col-md-6 quiz-image-section-wrapper" style="height:100%">
			<!--	<div class="quiz-image-imagediv" style="background-image: url(<? //echo isset($form['quiz_main_image']['#markup'])?$form['quiz_main_image']['#markup']:'';?>)">-->
				<div class="quiz-image-imagediv" style="
					background-image: url(<? //echo $form['#image_url'];?>); 
					height: 100%;
					background-size: cover;
					background-position: center center;
					background-repeat: no-repeat;">
					<div style="width:100%; float:left; ">
						<div style="
							margin-top: 20px;  
							padding: 5px 15px;  
							background-color: #803794;
							color: white;
							font-family: Century Gothic;
							font-size: 10pt;
							">
							<span><? ?></span>
						</div>
						<div style="
								margin-top: 10px;  
								padding: 3px 10px;  
								background-color: #803794; 
								color: white;  
								font-family: Century Gothic;  
								font-size: 8pt;
								width: 300px;
								float: right;
							"><span><? ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-1 quiz-button-section-wrapper" style="height:100%">
				<!--<button class="btn btn-success btn-block quiz-quiz-me-button">-->
					<? ?>
				<!--</button>-->
			</div>
		</div>
		<div class="row" style="margin-top:50px;">
			<div class="col-md-12">
				<h1>
					<?  ?> :
				</h1>
			</div>
		</div>

		<hr>
		<div class="row mtc-quiz-lesson-content">
			<div class="col-md-12">
				<? ?>
			</div>
		</div>
		<div class="row" id="mtc-quiz-lesson-buttons">
			<div class="col-md-12" style="height:100px;">
				<?  ?>
			</div>
		</div>
	</div>
</div>

<div class="row mtc-quiz-stage-2-3-4">
	<div class="col-md-12">
		<div class="row" style="">
			<div class="col-md-2 mtc-quiz-timer">
				<div id="quiz-timer-holder">
					<?  ?>
				</div>
			</div>
			<div class="col-md-8">
				<div id="mtc-quiz-scores">
					<?
					?>
				</div>
			</div>
			<div class="col-md-2">
				<div class="mtc-quiz-health" id="mtc-quiz-health">lk
					<?
						//echo drupal_render($form['hearts_html']);
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row mtc-quiz-stage-2-3-4">
	<div class="col-md-12">
		<div id="mtc-quiz-question-wrapper">
			<?
				//echo drupal_render($form['question_html']);
			?>
		</div>
	</div>
</div>
<div class="row mtc-quiz-stage-3">
	<div class="col-md-12">
	</div>
</div>

<div class="row mtc-quiz-stage-5">
	<div class="col-md-12">
		<div id="mtc-quiz-splash">
		</div>
		<div id="mtc-quiz-splash-text">
		</div>
		<div id="mtc-quiz-splash-buttons">
		</div>
	</div>
</div>
<div class="row mtc-quiz-buttons mtc-quiz-stage-2-3-4" id="mtc-quiz-buttons">
	<div class="col-lg-8 col-md-6">
		<div id="mtc-quiz-response">
			Test start
		</div>
	</div>
	<div class="col-lg-2 col-md-3">
		<? //echo drupal_render($form['buttons']['flag']);?>
	</div>
	<div class="col-lg-2 col-md-3">
		<? //echo drupal_render($form['buttons']['submit']);?>
	</div>
</div>

  <div class="node-column-main">
	<div id="display-wrapper" style="display:none">
<!--	<div id="display-wrapper">-->
	</div>
  </div>



@stop