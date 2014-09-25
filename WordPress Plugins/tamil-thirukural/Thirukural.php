<?php
/*
Plugin Name: Tamil Thirukural
Description: A simple widget that displays a random Thirukural in tamil with a brief explaination for each kural.
Version: 1.0
Author: Sandeep Ramamoorthy
License: GPL2
*/

/*  Copyright 2012  Sandeep Ramamorthy (r.sandeep@live.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/
function thirukural_install()
	{
	  global $wpdb;
	  $table_name = $wpdb->prefix . "thirukural";

	  // if table name already exists
	 if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name)
	  {
   		$wpdb->query("DROP TABLE `{$table_name}` ");
	
	  }

		//Creating the table ... fresh!
		$sql = "CREATE TABLE " . $table_name . " (
			id INTEGER NOT NULL AUTO_INCREMENT,
			chapter_name VARCHAR(50),
			section_name VARCHAR(50),
			kural TEXT,
			explaination TEXT,
			PRIMARY KEY(id)
			)ENGINE=InnoDB DEFAULT CHARSET=utf8;";
		$results = $wpdb->query( $sql );

      $kural_query= "INSERT INTO ". $table_name ." (`chapter_name`, `section_name`, `kural`, `explaination`) VALUES
('கடவுள் வாழ்த்து', 'அறத்துப்பால்', 'அகர முதல எழுத்தெல்லாம் ஆதி<br>\nபகவன் முதற்றே உலகு', 'எழுத்துக்கள் எல்லாம் அகரத்தை அடிப்படையாக கொண்டிருக்கின்றன. அதுபோல உலகம் கடவுளை அடிப்படையாக கொண்டிருக்கிறது.'),
('கடவுள் வாழ்த்து', 'அறத்துப்பால்', 'கற்றதனால் ஆய பயனென்கொல் வாலறிவன்<br>\nநற்றாள் தொழாஅர் எனின்.', 'தன்னைவிட அறிவில் மூத்த பெருந்தகையாளரின் முன்னே வணங்கி நிற்கும் பண்பு இல்லாவிடில் என்னதான் ஒருவர் கற்றுஇருந்தாலும் அதனால் என்ன பயன்?. ஒன்றுமில்லை.'),
('கடவுள் வாழ்த்து', 'அறத்துப்பால்', 'மலர்மிசை ஏகினான் மாணடி சேர்ந்தார்<br>\nநிலமிசை நீடுவாழ் வார்.', 'மனமாகிய மலர்மீது சென்று இருப்பவனாகிய கடவுளின் சிறந்த திருவடிகளை எப்போதும் நினைப்பவர் இப்பூமியில் நெடுங்காலம் வாழ்வர்.'),
('கடவுள் வாழ்த்து', 'அறத்துப்பால்', 'வேண்டுதல் வேண்டாமை இலானடி சேர்ந்தார்க்கு<br>\nயாண்டும் இடும்பை இல.', 'எதிலும் விருப்பு வெறுப்பு இல்லாத கடவுளின் திருவடிகளை மனத்தால் எப்போதும் நினைப்பவருக்கு உலகத் துன்பம் ஒருபோதும் இல்லை.'),
('கடவுள் வாழ்த்து', 'அறத்துப்பால்', 'இருள்சேர் இருவினையும் சேரா இறைவன்<br>\nபொருள்சேர் புகழ்புரிந்தார் மாட்டு.', 'மயக்கத்தைச் சேர்ந்த நல்வினை தீவினையென்னு மிரண்டு வினையுஞ் சேரா; தலைவனது ஆகிய மெய்ப்பொருள் சேர்ந்த புகழ்ச்சிச் சொற்களைப் பொருந்தினார் மாட்டு.'),
('கடவுள் வாழ்த்து', 'அறத்துப்பால்', 'பொறிவாயில் ஐந்தவித்தான் பொய்தீர் ஒழுக்க<br>\nநெறிநின்றார் நீடுவாழ் வார்.', 'மெய், வாய், கண், மூக்கு, செவி ஆகிய ஐந்து பொறிகளின் வழிப் பிறக்கும் தீய ஆசைகளை அழித்து கடவுளின் பொய்யற்ற ஒழுக்க வழியிலே நின்றவர் நெடுங்காலம் வாழ்வார்.'),
('கடவுள் வாழ்த்து', 'அறத்துப்பால்', 'தனக்குவமை இல்லாதான் தாள்சேர்ந்தார்க் கல்லால்<br>\nமனக்கவலை மாற்றல் அரிது.', 'தனக்கு ஒப்புமை இல்லாத தலைவனுடைய திருவடிகளைப் பொருந்தி நினைக்கின்றவர் அல்லாமல், மற்றவர்க்கு மனக்கவலையை மாற்ற முடியாது.'),
('கடவுள் வாழ்த்து', 'அறத்துப்பால்', 'அறவாழி அந்தணன் தாள்சேர்ந்தார்க் கல்லால்<br>\nபிறவாழி நீந்தல் அரிது.', 'அந்தணர் என்பதற்குப் பொருள் சான்றோர் என்பதால், அறக்கடலாகவே விளங்கும் அந்தச் சான்றோரின் அடியொற்றி நடப்பவர்க்கேயன்றி, மற்றவர்களுக்குப் பிற துன்பக் கடல்களைக் கடப்பது என்பது எளிதான காரியமல்ல.'),
('கடவுள் வாழ்த்து', 'அறத்துப்பால்', 'கோளில் பொறியின் குணமிலவே எண்குணத்தான்<br>\nதாளை வணங்காத் தலை.', 'உடல், கண், காது, மூக்கு, வாய் எனும் ஐம்பொறிகள் இருந்தும், அவைகள் இயங்காவிட்டால் என்ன நிலையோ அதே நிலைதான் ஈடற்ற ஆற்றலும் பண்பும் கொண்டவனை வணங்கி நடக்காதவனின் நிலையும் ஆகும்.'),
('கடவுள் வாழ்த்து', 'அறத்துப்பால்', 'பிறவிப் பெருங்கடல் நீந்துவர் நீந்தார்<br>\nஇறைவன் அடிசேரா தார்.', 'இறைவனுடைய திருவடிகளை பொருந்தி நினைக்கின்றவர் பிறவியாகிய பெரிய கடலைக் கடக்க முடியும். மற்றவர் கடக்க முடியாது.'),
('வான்சிறப்பு', 'அறத்துப்பால்', 'வான்நின்று உலகம் வழங்கி வருதலால<br>தான்அமிழ்தம் என்றுணரற் பாற்று.', 'உரிய காலத்தில் இடைவிடாது மழை பெய்வதால்தான் உலகம் நிலைபெற்று வருகிறது; அதனால் மழையே அமிழ்தம் எனலாம்.'),
('வான்சிறப்பு', 'அறத்துப்பால்', 'துப்பார்க்குத் துப்பாய துப்பாக்கித் துப்பார்க்குத்<br>துப்பாய தூஉம் மழை.', 'உண்பவர்க்குத் தக்க உணவுப் பொருள்களை விளைவித்துத் தருவதோடு, பருகுவோர்க்குத் தானும் ஓர் உணவாக இருப்பது மழையாகும்.'),
('வான்சிறப்பு', 'அறத்துப்பால்', 'விண்இன்று பொய்ப்பின் விரிநீர் வியனுலகத்து<br>உள்நின்று உடற்றும் பசி.', 'உரிய காலத்தே மழை பெய்யாது பொய்க்குமானால், கடல் சூழ்ந்த இப்பேருலகத்தில் வாழும் உயிர்களைப் பசி வருத்தும்.'),
('வான்சிறப்பு', 'அறத்துப்பால்', 'ஏரின் உழாஅர் உழவர் புயல்என்னும்<br>வாரி வளங்குன்றிக் கால்.', 'ஏரினுழுதலைத் தவிர்வாருழவர், புயலாகிய வாரியினுடைய வளங்குறைந்தகாலத்து. இஃது உழவாரில்லை யென்றது.'),
('வான்சிறப்பு', 'அறத்துப்பால்', 'கெடுப்பதூஉம் கெட்டார்க்குச் சார்வாய்மற் றாங்கே<br>எடுப்பதூஉம் எல்லாம் மழை.', 'பெய்யாமல் வாழ்வைக் கெடுக்க வல்லதும் மழை; மழையில்லாமல் வளம் கெட்டு நொந்தவர்க்கும் துணையாய் அவ்வாறே காக்க வல்லதும் மழையாகும்.'),
('வான்சிறப்பு', 'அறத்துப்பால்', 'விசும்பின் துளிவீழின் அல்லால்மற் றாங்கே<br>பசும்புல் தலைகாண்பு அரிது.', 'விண்ணிலிருந்து மழைத்துளி விழுந்தாலன்றி மண்ணில் பசும்புல் தலை காண்பது அரிதான ஒன்றாகும்.'),
('வான்சிறப்பு', 'அறத்துப்பால்', 'நெடுங்கடலும் தன்நீர்மை குன்றும் தடிந்தெழிலி<br>தான்நல்கா தாகி விடின்.', 'மேகம் கடலிலிருந்து நீரைக் கொண்டு அதனிடத்திலேயே பெய்யாமல் விடுமானால், பெரிய கடலும் தன் வளம் குன்றிப் போகும்.'),
('வான்சிறப்பு', 'அறத்துப்பால்', 'சிறப்பொடு பூசனை செல்லாது வானம்<br>வறக்குமேல் வானோர்க்கும் ஈண்டு.', 'மழை பெய்யாமல் போகுமானால் இவ்வுலகத்தில் வானோர்க்காக நடைபெறும் திருவிழாவும் நடைபெறாது; நாள் வழிபாடும் நடைபெறாது.'),
('வான்சிறப்பு', 'அறத்துப்பால்', 'தானம் தவம்இரண்டும் தங்கா வியன்உலகம்<br>வானம் வழங்கா தெனின்.', 'தானமும் தவமுமாகிய விரண்டறமு முளவாகா; அகன்ற வுலகத்துக்கண் மழை பெய்யாதாயின். இது தானமும் தவமுங் கெடுமென்றது.'),
('வான்சிறப்பு', 'அறத்துப்பால்', 'நீர்இன்று அமையாது உலகெனின் யார்யார்க்கும்<br>வான்இன்று அமையாது ஒழுக்கு.', 'எத்தனை பெரியவரானாலும் நீர் இல்லாமல் வாழமுடியாது; அந்த நீரோ மழை இல்லாமல் கிடைக்காது.');";
       $result=$wpdb->query($kural_query);
    }

register_activation_hook( __FILE__, 'thirukural_install' );	

function thirukural_css_head()
 {
	global $quotescollection_version;
	if ( !is_admin() ) 
	{
		wp_register_style( 'thirukural_style', plugins_url('thirukural_style.css', __FILE__), false, 1 );
		wp_enqueue_style( 'thirukural_style' );
	}
 }
add_action( 'wp_enqueue_scripts', 'thirukural_css_head' );

class Kural_Widget extends WP_Widget 
{   
    // Register widget with WordPress.	
	public function __construct() 
	{
		parent::__construct
		(
	 		'kural_widget', // Base ID
			'Thirukural', // Name
			array( 'description' => __( 'Displays Thirukural in random with a brief explaination in tamil on each page refresh', 'text_domain' ), ) // Args
		);
	}
	
/**
 * Front-end display of widget.
 *
 * @see WP_Widget::widget()
 *
 * @param array $args     Widget arguments.
 * @param array $instance Saved values from database.
 */
 public function widget( $args, $instance )
    {
	 extract( $args );
	 $title = apply_filters( 'widget_title', $instance['title'] );
	 global $wpdb;
	 $table_name = $wpdb->prefix . "thirukural";
	 $kuralid=rand(1, 20);
	 $sqlKural= "SELECT * FROM `".$table_name."` WHERE `id` =".$kuralid;
	 $Kural=$wpdb->get_row( $sqlKural );
	 
	 echo $before_widget;
	 echo $before_title . $title . $after_title;
	  
	 echo"<p>$Kural->kural<span class=dropt >பொருள் விளக்கம்<span style=width:300px;>$Kural->explaination</span></span></p>";
	 echo"<p align=right>$Kural->section_name : $Kural->chapter_name</p>";
	
		
	 echo $after_widget;
	}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) 
	{
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}
	public function form( $instance ) 
	{
		if ( isset( $instance[ 'title' ] ) ) 
		{
			$title = $instance[ 'title' ];
		}
		else 
		{
			$title = __( 'திருக்குறள்', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}

} 
add_action( 'widgets_init', create_function( '', 'register_widget( "Kural_Widget" );' ) );
?>