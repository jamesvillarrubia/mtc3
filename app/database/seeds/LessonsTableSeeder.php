<?php

class LessonsTableSeeder extends Seeder {
	
	protected $content1 = 'In mea autem etiam menandri, quot elitr vim ei, eos semper disputationi id? Per facer appetere eu, duo et animal maiestatis. Omnesque invidunt mnesarchum ex mel, vis no case senserit dissentias. Te mei minimum singulis inimicus, ne labores accusam necessitatibus vel, vivendo nominavi ne sed. Posidonium scriptorem consequuntur cum ex? Posse fabulas iudicabit in nec, eos cu electram forensibus, pro ei commodo tractatos reformidans. Qui eu lorem augue alterum, eos in facilis pericula mediocritatem?

		Est hinc legimus oporteat in. Sit ei melius delicatissimi. Duo ex qualisque adolescens! Pri cu solum aeque. Aperiri docendi vituperatoribus has ea!

		Sed ut ludus perfecto sensibus, no mea iisque facilisi.';

		protected $content2 = 'Choro tation melius et mea, ne vis nisl insolens. Vero autem scriptorem cu qui? Errem dolores no nam, mea tritani platonem id! At nec tantas consul, vis mundi petentium elaboraret ex, mel appareat maiestatis at.

		Sed et eros concludaturque. Mel ne aperiam comprehensam! Ornatus delicatissimi eam ex, sea an quidam tritani placerat? Ad eius iriure consequat eam, mazim temporibus conclusionemque eum ex.

		Te amet sumo usu, ne autem impetus scripserit duo, ius ei mutat labore inciderint! Id nulla comprehensam his? Ut eam deleniti argumentum, eam appellantur definitionem ad. Pro et purto partem mucius!

		Cu liber primis sed, esse evertitur vis ad.';


		protected $content3 = 'Ne graeco maiorum mea! In eos nostro docendi conclusionemque. Ne sit audire blandit tractatos? An nec dicam causae meliore, pro tamquam offendit efficiendi ut.

		Te dicta sadipscing nam, denique albucius conclusionemque ne usu, mea eu euripidis philosophia! Qui at vivendo efficiendi! Vim ex delenit blandit oportere, in iriure placerat cum. Te cum meis altera, ius ex quis veri.

		Mutat propriae eu has, mel ne veri bonorum tincidunt. Per noluisse sensibus honestatis ut, stet singulis ea eam, his dicunt vivendum mediocrem ei. Ei usu mutat efficiantur, eum verear aperiam definitiones an! Simul dicam instructior ius ei. Cu ius facer doming cotidieque! Quot principes eu his, usu vero dicat an.

		Ex dicta perpetua qui, pericula intellegam scripserit id vel. Id fabulas ornatus necessitatibus mel. Prompta dolorem appetere ea has. Vel ad expetendis instructior!

		Te his dolorem adversarium? Pri eu rebum viris, tation molestie id pri. Mel ei stet inermis dissentias. Sed ea dolorum detracto vituperata. Possit oportere similique cu nec, ridens animal quo ex?';


    public function run()
    {
        DB::table('lessons')->delete();

      	$user_id = User::first()->id;
		
		
		//in the DB object, build a table object of the lessons table and use command insert
		DB::table('lessons')->insert( array(
            array(
                'creatorID'    	=> $user_id,
                'title'      	=> 'In mea autem etiam menandri',
                'format'    	=> serialize(array('basic')),
                'levels' 		=> serialize(array('1')),
                'description' 	=> 'First basic lesson',
                'created_at' 	=> new DateTime,
                'updated_at' 	=> new DateTime,
                'rawtext'       => $this->content1,
                'tagtext'       => $this->content1,
                'cleantext'     => $this->content1,
            ),
            array(
                'creatorID'    	=> $user_id,
                'title'      	=> 'Vivendo suscipiantur vim te vix',
                'format'    	=> serialize(array('basic')),
                'levels' 		=> serialize(array('1')),
                'description' 	=> 'Second basic lesson',
                'created_at' 	=> new DateTime,
                'updated_at' 	=> new DateTime,
                'rawtext'		=> $this->content2,
                'tagtext'       => $this->content2,
                'cleantext'     => $this->content2,

            ),
            array(
                'creatorID'    	=> $user_id,
                'title'      	=> 'In iisque similique reprimique eum',
                'format'    	=> serialize(array('basic')),
                'levels' 		=> serialize(array('1')),
                'description' 	=> 'Third basic lesson',
                'created_at' 	=> new DateTime,
                'updated_at' 	=> new DateTime,
                'rawtext'       => $this->content3,
                'tagtext'       => $this->content3,
                'cleantext'     => $this->content3,
            ))
        );


    }

}