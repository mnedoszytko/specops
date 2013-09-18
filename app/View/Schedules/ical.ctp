<?php
ini_set('memory_limit','128M');
/**
 * iCalcreator class v2.6
 * copyright (c) 2007-2008 Kjell-Inge Gustafsson, kigkonsult
 * www.kigkonsult.se/iCalcreator/index.php
 * ical@kigkonsult.se
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */
App::import('Vendor','vcalendar',array('file'=>'ical/iCalcreator.class.php'));


//echo "Use browser function to show source!<br />\n<br />\n";

$v = new vcalendar();                          // initiate new CALENDAR


 foreach ($schedule['Event'] as $event) {

	$time = strtotime($event['start']);
$etime = strtotime($event['end']." + 1 day");//p???
//debug($event['Reqevent']['name']);
//debug(date("Ymd",$etime));
$description = $event['Reqevent']['name'];
$place = $schedule['Spec']['name'];
$summary = $description."(".$place.")";

//debug($time,$etime,$description,$place);

			$e = new vevent();                             // initiate a new EVENT
			$e->setProperty( 'categories'
	               , 'BUSINESS' );                   // catagorize
// 			$e->setProperty( 'dtstart'
//                //,  date("Y",$time), date("m",$time), date("d",$time), 08, 00, 00 );  
// ,  date("Y",$time), date("m",$time), date("d",$time));

			$e->setProperty(
'dtstart', date("Ymd",$time), array('VALUE' => 'DATE'));//
               //,  date("Y",$time), date("m",$time), date("d",$time), 08, 00, 00 );  
//,  date("Y",$time), date("m",$time), date("d",$time));
			///$e->setProperty( 'duration'
            //   , 0, 0, $duration );                    // 3 hours
//$e->setProperty('dtend'
//,  date("Y",$etime), date("m",$etime), date("d",$etime), 16, 00, 00 );  

			$e->setProperty( "dtend" , date("Ymd",$etime) , array( "VALUE" => "DATE" ));

	
			$e->setProperty( 'description'
               , $description);    // describe the event              
			$e->setProperty( 'summary'
               , $summary );    // describe the event

			$e->setProperty( 'location'
               , $place );                     // locate the event

			$v->addComponent($e); 


 } 



			/* alt. production */
$v->returnCalendar();                       // generate and redirect output to user browser
/* alt. dev. and test */
$str = $v->createCalendar(); 
?>