$(document).ready(function(){

	lesson = lesson || {
		create: function(){
			$.extend(this, {
				fill_debug_inputs: function(){
					$('#lesson_title').val('Title1');
					$('#lesson_wikikeyword').val('Robin Hood');
					var start_text = '<div class="dablink">For the roller coaster,see<a href="//simple.wikipedia.org/wiki/Robin_Hood_(roller_coaster)"title="Robin Hood (roller coaster)">Robin Hood(roller coaster)</a>.</div><div class="thumb tright"><div class="thumbinner"style="width:222px;"><a class="image"href="//simple.wikipedia.org/wiki/File:Robin_Hood_Memorial.jpg"><img alt=""class="thumbimage"src="//upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Robin_Hood_Memorial.jpg/220px-Robin_Hood_Memorial.jpg"style="height:330px; width:220px"/></a><div class="thumbcaption"><div class="magnify"><a class="internal"href="//simple.wikipedia.org/wiki/File:Robin_Hood_Memorial.jpg"title="Enlarge"><img alt=""src="//bits.wikimedia.org/static-1.23wmf12/skins/common/images/magnify-clip.png"style="height:11px; width:15px"/></a></div>A statue of Robin Hood near the castle in<a class="mw-redirect"href="//simple.wikipedia.org/wiki/Nottingham,_England"title="Nottingham, England">Nottingham</a></div></div><p><strong>Robin Hood</strong>is a<a href="//simple.wikipedia.org/wiki/Folk_hero"title="Folk hero">folk hero</a>from the<a href="//simple.wikipedia.org/wiki/Middle_Ages"title="Middle Ages">Middle Ages</a>.He is a legendary person whom people have told stories about for many years.Robin Hood is one who still remains popular.His story has been featured in books,plays,movies and cartoons as well.</p><p>There are many variations of his stories.Usually,Robin Hood is an<a href="//simple.wikipedia.org/wiki/Outlaw"title="Outlaw">outlaw</a>who lives in<a href="//simple.wikipedia.org/wiki/Sherwood_Forest"title="Sherwood Forest">Sherwood Forest</a>near the town of<a class="mw-redirect"href="//simple.wikipedia.org/wiki/Nottingham,_England"title="Nottingham, England">Nottingham,England</a>.His enemies are<a href="//simple.wikipedia.org/wiki/John_of_England"title="John of England">Prince John</a>(who is temporarily on the throne because his brother,King<a href="//simple.wikipedia.org/wiki/Richard_I_of_England"title="Richard I of England">Richard the Lionheart</a>is away in the<a href="//simple.wikipedia.org/wiki/Middle_East"title="Middle East">Middle East</a>fighting in the<a href="//simple.wikipedia.org/wiki/Crusades"title="Crusades">Crusades</a>),and the corrupt<a class="new"href="//simple.wikipedia.org/w/index.php?title=Sheriff_of_Nottingham&amp;action=edit&amp;redlink=1"title="Sheriff of Nottingham (not yet started)">Sheriff of Nottingham</a>,who abuse their powers and take money from the people who need it.Robin Hood uses his archery skills and his wits to steal the money back,and return it to the poor.Accompanying Robin are his faithful followers(<a class="new"href="//simple.wikipedia.org/w/index.php?title=The_Merry_Men&amp;action=edit&amp;redlink=1"title="The Merry Men (not yet started)">The Merry Men</a>).The most recognized of his merry band include<a class="new"href="//simple.wikipedia.org/w/index.php?title=Little_John&amp;action=edit&amp;redlink=1"title="Little John (not yet started)">Little John</a>,<a class="new"href="//simple.wikipedia.org/w/index.php?title=Much_the_Millers_son&amp;action=edit&amp;redlink=1"title="Much the Millers son (not yet started)">Much the Millers son</a>,<a class="new"href="//simple.wikipedia.org/w/index.php?title=Will_Scarlet&amp;action=edit&amp;redlink=1"title="Will Scarlet (not yet started)">Will Scarlet</a>,<a class="new"href="//simple.wikipedia.org/w/index.php?title=Friar_Tuck&amp;action=edit&amp;redlink=1"title="Friar Tuck (not yet started)">Friar Tuck</a>and<a class="new"href="//simple.wikipedia.org/w/index.php?title=Alan_a_Dale&amp;action=edit&amp;redlink=1"title="Alan a Dale (not yet started)">Alan a Dale</a>.</p><h2>In the media[<a class="mw-editsection-visualeditor"href="//simple.wikipedia.org/w/index.php?title=Robin_Hood&amp;veaction=edit&amp;section=1"title="Change section: In the media">change</a>|<a href="//simple.wikipedia.org/w/index.php?title=Robin_Hood&amp;action=edit&amp;section=1"title="Change section: In the media">edit source</a>]</h2><p>There have been many<a href="//simple.wikipedia.org/wiki/Movie"title="Movie">movies</a>about Robin Hood.In the 1970s,<a href="//simple.wikipedia.org/wiki/Walt_Disney_Pictures"title="Walt Disney Pictures">Disney</a>made a movie where the characters were shown to be animals.Robin and his lover(Marian)are<a href="//simple.wikipedia.org/wiki/Fox"title="Fox">foxes</a>.</p>';
					$('[name="lesson_store_ckeditor"]').val(start_text);
				},
				store: function(form_id){
					var self = this;
					var responses = $(form_id).serializeArray();
					for(var x=0; x < responses.length; x++){
						self[responses[x].name] = (responses[x].value);
					}
				},
				fill: function(returned_data){
					var self = this;
					for(var prop in returned_data){
						if($('[name="'+prop+'"]').length == 1){
							$('[name="'+prop+'"]').val(returned_data[prop]);
						}else if($('#'+prop).length == 1){
							$('#'+prop).html(returned_data[prop]);
						}
					}
				},
				post_lesson: function(form){
					var self = this;
					var send = {};
					for(var prp in self){
						if(typeof self[prp] === 'string'){
							send[prp] = self[prp];
						}
					}
			        $.post(
			            form.prop( 'action' ),
			            send,
			            function(data){
			            	lesson.fill(data);
			            },
			            'json'
			        ).fail(function(xhr) {
					    alert( "There was an error submitting your form." );
					})
				}
			});
		}
	};


	lesson.create();
	lesson.fill_debug_inputs();
	lesson.store('#form-add-lesson');

    $( '#form-add-lesson' ).on( 'submit', function(e) {
 		e.preventDefault();
 		lesson.post_lesson($(this));
    });
 
});