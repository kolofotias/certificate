/*
Copyright 2011 

Vaios Kolofotias <vkolofot@csd.auth.gr> (Informatics Dept., A.U.TH.)
Apostolos Kritikos <akritiko@csd.auth.gr> (Informatics Dept., A.U.TH.)

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License. 
*/

<?php 

define( '_JEXEC', 1 );
define('JPATH_BASE', dirname(__FILE__) );
define( 'DS', DIRECTORY_SEPARATOR );

require(JPATH_BASE .DS.'certificate'.DS.'files'.DS.'fpdf.php');
require_once( JPATH_BASE .DS.'certificate'.DS.'fonts'.DS.'helvetica.php');
require_once( JPATH_BASE .DS.'certificate'.DS.'fonts'.DS.'helveticab.php');
require_once( JPATH_BASE .DS.'certificate'.DS.'fonts'.DS.'helveticabi.php');
require_once( JPATH_BASE .DS.'certificate'.DS.'fonts'.DS.'helveticai.php');
require(JPATH_BASE .DS.'certificate'.DS.'files'.DS.'gif.php');
require(JPATH_BASE .DS.'certificate'.DS.'files'.DS.'htmltoolkit.php');
require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );

$mainframe =& JFactory::getApplication('site');
$mainframe->initialise();

$mainframe->route();
$user =& JFactory::getUser();

$session =& JFactory::getSession();
global $name;
global $id;
global $url;
$user =& JFactory::getUser();     
$name=$user->get('name');
$id=$user->get('id');

$url = 'http://www.open-ed.eu/index.php?option=com_comprofiler&task=userProfile&user=';
$url .= $id;

global $mod1;
global $mod2;
global $mod3;
global $mod4;
global $mod5;
global $mod6;
global $mod7;
global $mod8;
global $mod9;
global $mod10;
//
global $learn1a;
global $learn1b;
global $learn1c;
global $learn2a;
global $learn2b;
global $learn2c;
global $learn3a;
global $learn3b;
global $learn3c;
global $learn4a;
global $learn4b;
global $learn4c;
global $learn5a;
global $learn5b;
global $learn5c;
global $learn6a;
global $learn6b;
global $learn6c;
global $learn7a;
global $learn7b;
global $learn7c;
global $learn8a;
global $learn8b;
global $learn8c;
global $learn9a;
global $learn9b;
global $learn2c;
global $learn10a;
global $learn10b;
global $learn10c;
global $url;

//modules string
$user =& JFactory::getUser();  //Get current logged-in user
$db =& JFactory::getDBO();
$query = "SELECT * FROM `jos_comprofiler` WHERE `id` = ".$user->id."; ";
$db->setQuery($query);
$user_info = $db->loadObject();
$module = $user_info->cb_mymodules;  //get the modules in which the current user is enrolled
$modules = explode("|*|", $module);

$mod1=$modules[0];
$mod2=$modules[1];
$mod3=$modules[2];
$mod4=$modules[3];  //modules separation
$mod5=$modules[4];
$mod6=$modules[5];
$mod7=$modules[6];
$mod8=$modules[7];
$mod9=$modules[8];
$mod10=$modules[9];

$convert_date=strtotime($selected_date);  //date parser
global $date;
$date=date("d/m/Y");

//*************** Learning Projects (Module 1) 
//query the database for learning projects and separate them to variables(global)
$query = "SELECT a.title FROM #__sobi2_item a LEFT JOIN #__sobi2_cat_items_relations d on d.itemid=a.itemid LEFT JOIN #__sobi2_categories e ON e.catid=d.catid WHERE a.owner = $user->id AND e.catid = 3";   //catid corresponds to the category id of sobi2 database(here module1 category has id 3)
          $db->setQuery($query);
          $row= $db->loadRowList();
          $learn1a = implode(",", $row[0]);  //separates row to variables
          $learn1b = implode(",", $row[1]);
          $learn1c = implode(",", $row[2]);
//************** (Module 2)
$query = "SELECT a.title FROM #__sobi2_item a LEFT JOIN #__sobi2_cat_items_relations d on d.itemid=a.itemid LEFT JOIN #__sobi2_categories e ON e.catid=d.catid WHERE a.owner = $user->id and e.catid = 4 ";  
          $db->setQuery($query);
          $row= $db->loadRowList();
          $learn2a = implode(",", $row[0]);
          $learn2b = implode(",", $row[1]); 
          $learn2c = implode(",", $row[2]); 
//*************** (Module 3)
$query = "SELECT a.title,e.catid FROM #__sobi2_item a LEFT JOIN #__sobi2_cat_items_relations d on d.itemid=a.itemid LEFT JOIN #__sobi2_categories e ON e.catid=d.catid WHERE a.owner = $user->id and e.catid = 5 ";  
          $db->setQuery($query);
          $row= $db->loadRowList();
          $learn3aa = implode(",", $row[0]);
          $learn3a = substr($learn3aa,0,-2);
          $learn3bb = implode(",", $row[1]);
		  $learn3b = substr($learn3bb,0,-2);
		  $learn3cc = implode(",", $row[2]); 	
		  $learn3c = substr($learn3cc,0,-2);	
//*************** (Module 4)
$query = "SELECT a.title,e.catid FROM #__sobi2_item a LEFT JOIN #__sobi2_cat_items_relations d on d.itemid=a.itemid LEFT JOIN #__sobi2_categories e ON e.catid=d.catid WHERE a.owner = $user->id and e.catid = 6 ";  
          $db->setQuery($query);
          $row= $db->loadRowList();
          $learn4aa = implode(",", $row[0]);
			$learn4a = substr($learn4aa,0,-2);
          $learn4bb = implode(",", $row[1]);
			$learn4b = substr($learn4bb,0,-2);
          $learn4cc = implode(",", $row[2]);
			$learn4c = substr($learn4cc,0,-2);
//*************** (Module 5a1)
$query = "SELECT a.title,e.catid FROM #__sobi2_item a LEFT JOIN #__sobi2_cat_items_relations d on d.itemid=a.itemid LEFT JOIN #__sobi2_categories e ON e.catid=d.catid WHERE a.owner = $user->id and e.catid = 7 "; 
          $db->setQuery($query);
          $row= $db->loadRowList();
          $learn5aa = implode(",", $row[0]);
          $learn5a = substr($learn5aa,0,-2);
          $learn5bb = implode(",", $row[1]);
		  $learn5b = substr($learn5bb,0,-2);
		  $learn5cc = implode(",", $row[2]);
		  $learn5c = substr($learn5cc,0,-2);
//*************** (Module 5a2)
$query = "SELECT a.title,e.catid FROM #__sobi2_item a LEFT JOIN #__sobi2_cat_items_relations d on d.itemid=a.itemid LEFT JOIN #__sobi2_categories e ON e.catid=d.catid WHERE a.owner = $user->id and e.catid = 8 ";  
          $db->setQuery($query);
          $row= $db->loadRowList();
          $learn6aa = implode(",", $row[0]);
           $learn6a = substr($learn6aa,0,-2);
          $learn6bb = implode(",", $row[1]);
		   $learn6b = substr($learn6bb,0,-2);
		  $learn6cc = implode(",", $row[2]);	
 			$learn6c = substr($learn6cc,0,-2);
//*************** (Module 5p1)
$query = "SELECT a.title,e.catid FROM #__sobi2_item a LEFT JOIN #__sobi2_cat_items_relations d on d.itemid=a.itemid LEFT JOIN #__sobi2_categories e ON e.catid=d.catid WHERE a.owner = $user->id and e.catid = 10 "; 
          $row= $db->loadRowList();
          $learn7aa = implode(",", $row[0]);
          	$learn7a = substr($learn7aa,0,-2);
          $learn7bb = implode(",", $row[1]);
		  	$learn7b = substr($learn7bb,0,-2);
		  $learn7cc = implode(",", $row[2]);
			$learn7c = substr($learn7cc,0,-2);
//*************** (Module 5p2)
$query = "SELECT a.title,e.catid FROM #__sobi2_item a LEFT JOIN #__sobi2_cat_items_relations d on d.itemid=a.itemid LEFT JOIN #__sobi2_categories e ON e.catid=d.catid WHERE a.owner = $user->id and e.catid = 9 ";  
          $db->setQuery($query);
          $row= $db->loadRowList();
          $learn8aa = implode(",", $row[0]);
          	$learn8a = substr($learn8aa,0,-2);
          $learn8bb = implode(",", $row[1]);
		  	$learn8b = substr($learn8bb,0,-2);
		  $learn8cc = implode(",", $row[2]);
			$learn8c = substr($learn8cc,0,-2);
//*************** (Module 5p3)
$query = "SELECT a.title,e.catid FROM #__sobi2_item a LEFT JOIN #__sobi2_cat_items_relations d on d.itemid=a.itemid LEFT JOIN #__sobi2_categories e ON e.catid=d.catid WHERE a.owner = $user->id and e.catid = 11 ";  
          $db->setQuery($query);
          $row= $db->loadRowList();
          $learn9aa = implode(",", $row[0]);
           $learn9a = substr($learn9aa,0,-3);
          $learn9bb = implode(",", $row[1]);
		  $learn9b = substr($learn9bb,0,-3);
		  $learn9cc = implode(",", $row[2]);
			$learn9c = substr($learn9cc,0,-3);
//*************** (Module 6)
$query = "SELECT a.title,e.catid FROM #__sobi2_item a LEFT JOIN #__sobi2_cat_items_relations d on d.itemid=a.itemid LEFT JOIN #__sobi2_categories e ON e.catid=d.catid WHERE a.owner = $user->id and e.catid = 12 "; 
          $db->setQuery($query);
         $row= $db->loadRowList();
          $learn10aa = implode(",", $row[0]);
            $learn10a = substr($learn10aa,0,-3);
          $learn10bb = implode(",", $row[1]);
 		    $learn10b = substr($learn10bb,0,-3);
 		  $learn10cc = implode(",", $row[2]);
			$learn10c = substr($learn10cc,0,-3);
//*************** End of learning queries

//**************** URL (too long!!!)
//$user =& JFactory::getUser();   
//$db =& JFactory::getDBO();
//$query = "SELECT data_txt FROM #__sobi2_fields_data WHERE fieldid=18";
//*
//$query = "SELECT MAX(IF(c.fieldid=18,c.data_txt, NULL)) FROM #__sobi2_item a LEFT JOIN #__users b ON a.owner = b.id LEFT JOIN #__sobi2_fields_data c on c.itemid=a.itemid WHERE a.owner = b.id";
//*
//$query = "SELECT data_txt FROM #__SOBI2_fields_data WHERE id = 18";

      //$db->setQuery($query);
      //$url = $db->loadResult();
       // $url = $db->loadObjectList();  
//****************


class PDF extends FPDF
{
  
  public $var="Industry Support:";
  public $var1="Your openEd 2.0 course team";   
  public $var2="Funded by:";
  public $txt="Learning Project:";
  public $modtxt="Assignment(s) successfully submitted for '"; 
  public $mod2txt="'";
  public $nolepr="No available assignements for this module";
  
  //********* Functions Below **********************
  
  //Date
    function setDate($date){
        $this->header_date = $date;
    }

    function getDate(){
        return $this->header_date;
    }
  
      //Name
    function setName($nam){
         $this->header_name = $nam;
     }
     
    function getName(){
         return $this->header_name;
           }

//Learning Projects
 function setLearning($learnin){
         $this->header_learning = $learnin;
     }
     
    function getLearning(){
         return $this->header_learning;
           }


 //mods
 function setMods($mod){
         $this->header_mods = $mod;
    }
     
   function getMods(){
        return $this->header_mods;
          }

//URL(not used)
    function setURL($rl){
         $this->header_url = $rl;
     }
     
    function getURL(){
         return $this->header_url;
           }

 //Header logos & text(fixed positioning)
   function Header()
    {
      $mod1 = $GLOBALS['mod1'];
      $mod2 = $GLOBALS['mod2'];
      $mod3 = $GLOBALS['mod3'];
      $date = $GLOBALS['date']; 
      $name = $GLOBALS['name'];
      $url = $GLOBALS['url'];
      $this->Image(JPATH_BASE .DS.'certificate'.DS.'images'.DS.'openEd_Course_Certificate_template.png',10,8,55); //set image in pdf
      $this->Image(JPATH_BASE .DS.'certificate'.DS.'images'.DS.'2.png',150,8,55); //33
      $this->SetFont('Helvetica','',10);// //set font for module in pdf
      $this->SetXY(50, 10); //set position of text following
      $this->Cell(38);
      $this->Cell(10,5,'The openED 2.0 course:',0,1,''); //Write text in Certain position in pdf
      $this->Ln(1);
      $this->Cell(5);
      $this->Cell(0,10,'Business and management competencies',0,0,'C'); //1,0,C
      $this->Ln(6);
      $this->Cell(5);
      $this->Cell(0,10,'in a Web 2.0 world',0,0,'C'); //1,0,C
      $this->Ln(20);
      $this->SetFont('Helvetica','',30);//B
      $this->Cell(0,10,'Certificate',0,1,'C');  
      $this->Cell(8);
      $this->SetFont('Helvetica','',15);//B
      $this->Cell(0,10,'(Community Certificate Version)',0,1,'C');  
      $this->Cell(5);
      $this->Ln(1);
        $this->setName($name);  //set the name of the logged-in user
        $this->SetFont('Helvetica','',10);
        $this->Write (17, 'This certificate is to confirm that ');
        $this->Ln(6);
        $this->SetFont('Helvetica','',13);
        $this->Write (20, '       Name: '); //1° Write
        $this->SetFont('Helvetica','I',14);
        $this->Write (20, $this->getName()); //2° Write the name of the logged-in user
        $this->Ln(15);
        $this->SetFont('Helvetica','',10);
        $this->Cell(0,5,'has successfully submitted the following assignments for peer-assessment:',0,1,'L');
        $this->Ln(15);
 }

  function Footer()
    {
     $mod1 = $GLOBALS['mod1'];
     $mod2 = $GLOBALS['mod2'];
     $mod3 = $GLOBALS['mod3'];
     $mod4 = $GLOBALS['mod4'];
     $mod5 = $GLOBALS['mod5'];
     $mod6 = $GLOBALS['mod6'];
     $mod7 = $GLOBALS['mod7'];
     $mod8 = $GLOBALS['mod8'];
     $mod9 = $GLOBALS['mod9'];
     $mod10 = $GLOBALS['mod10'];
//     
   $learn1a = $GLOBALS['learn1a']; //passing global to local variable.
   $learn1b = $GLOBALS['learn1b'];
   $learn1c = $GLOBALS['learn1c'];
   $learn2a = $GLOBALS['learn2a'];
   $learn2b = $GLOBALS['learn2b'];
   $learn2c = $GLOBALS['learn2c'];
   $learn3a = $GLOBALS['learn3a'];
   $learn3b = $GLOBALS['learn3b'];
   $learn3c = $GLOBALS['learn3c'];
   $learn4a = $GLOBALS['learn4a'];
   $learn4b = $GLOBALS['learn4b'];
   $learn4c = $GLOBALS['learn4c'];
   $learn5a = $GLOBALS['learn5a'];
   $learn5b = $GLOBALS['learn5b'];
   $learn5c = $GLOBALS['learn5c'];
   $learn6a = $GLOBALS['learn6a'];
   $learn6b = $GLOBALS['learn6b'];
   $learn6c = $GLOBALS['learn6c'];
   $learn7a = $GLOBALS['learn7a'];
   $learn7b = $GLOBALS['learn7b'];
   $learn7c = $GLOBALS['learn7c'];
   $learn8a = $GLOBALS['learn8a'];
   $learn8b = $GLOBALS['learn8b'];
   $learn8c = $GLOBALS['learn8c'];
   $learn9a = $GLOBALS['learn9a'];
   $learn9b = $GLOBALS['learn9b'];
   $learn9c = $GLOBALS['learn9c'];
   $learn10a = $GLOBALS['learn10a'];
   $learn10b = $GLOBALS['learn10b'];
   $learn10c = $GLOBALS['learn10c'];
     $date = $GLOBALS['date']; 
     
     $counter = null;
     $url = $GLOBALS['url'];   
        $this->SetFont('Helvetica','',10);
        $this->setMods($mod1);
        if($mod1 != null){  //check if module has been selected
        $counter = $mod1;
        $this->setLearning($learn1a); //set learning project
        //$this->setURL($url);
       // $this->Write (-19,$this->getURL()); 
        $this->SetFont('Helvetica','B',8); //set font for module in pdf
        $this->Write (-20,$this->getMods()); //Write module name in pdf
        $this->Ln(5);  //space!
        $this->SetFont('Helvetica','I',10);
        $this->SetFont('Helvetica','I',8);
        if($learn1a != null){                     //check if first learning project exists     
        $this->Write (-19,$this->txt);   //"learning project:" text
        $this->Write (-19,$this->getLearning()); //actual learning project name
        $this->Ln(5);//       
        }else{ $this->Write (-19,$this->nolepr);$this->Ln(5);}  //if learning project doesn't exist display "No available assignments"
       $this->setLearning($learn1b);  
        if($learn1b != null){                   //check if second learning project exists       
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
        }
        $this->setLearning($learn1c);    //check if third learning project exists
        if($learn1c != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
        }
       }
       $this->SetFont('Helvetica','B',8);  //the same for second module and the rest..
        $this->setMods($mod2);
        if($mod2 != null){
       $counter= $mod2;
       $this->setLearning($learn2a);
       $this->Write (-20,$this->getMods());
       $this->Ln(5);
       $this->SetFont('Helvetica','I',8);
       if($learn2a != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//       
        }else{ $this->Write (-19,$this->nolepr);$this->Ln(5);}
       $this->setLearning($learn2b);  
        if($learn2ba != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
       }
        $this->setLearning($learn2c); 
        if($learn2c != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
       }
       }
       $this->SetFont('Helvetica','B',8);
       $this->setMods($mod3);
       if($mod3 != null){
       $counter= $mod3;
       $this->setLearning($learn3a);
       $this->Write (-20,$this->getMods());
       $this->Ln(5);
       $this->SetFont('Helvetica','I',8);
         if($learn3a != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//       
        }else{ $this->Write (-19,$this->nolepr);$this->Ln(5);}
       $this->setLearning($learn3b);  
       if($learn3b != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
       }
        $this->setLearning($learn3c); 
        if($learn3c != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
       }
       }
       $this->SetFont('Helvetica','B',8);
       $this->setMods($mod4);
       if($mod4 != null){
       $counter= $mod4;
       $this->setLearning($learn4a);
       $this->Write (-20,$this->getMods());
       $this->Ln(5);
         $this->SetFont('Helvetica','I',8);
        if($learn4a != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//       
        }else{ $this->Write (-19,$this->nolepr);$this->Ln(5);}
        $this->setLearning($learn4b);
        if($learn4b != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning()); 
        $this->Ln(5);//**********
       }
        $this->setLearning($learn4c); 
        if($learn4c != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
       }
       }
       $this->SetFont('Helvetica','B',8);
       $this->setMods($mod5);
        if($mod5 != null){
        $counter= $mod5;
        $this->setLearning($learn5a);
        $this->Write (-20,$this->getMods()); 
        $this->Ln(5);
        $this->SetFont('Helvetica','I',8);
        if($learn5a != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//       
       }else{ $this->Write (-19,$this->nolepr);$this->Ln(5);}
       $this->setLearning($learn5b);  
        if($learn5b != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
       }
        $this->setLearning($learn5c); 
        if($learn5c != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
       }
       }
       $this->SetFont('Helvetica','B',8);
       $this->setMods($mod6);
       if($mod6 != null){
       $counter = $mod6;
       $this->setLearning($learn6a);
       $this->Write (-20,$this->getMods());
       $this->Ln(5);
        $this->SetFont('Helvetica','I',8);
       if($learn6a != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//       
       }else{ $this->Write (-19,$this->nolepr);$this->Ln(5);}
       $this->setLearning($learn6b);  
        if($learn6b != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
       }
        $this->setLearning($learn6c); 
        if($learn6c != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
       }
       }
       $this->SetFont('Helvetica','B',8);
       $this->setMods($mod7);
       if($mod7 != null){
       $counter = $mod7;
       $this->setLearning($learn7a);
       $this->Write (-20,$this->getMods());
        $this->Ln(5);
        $this->SetFont('Helvetica','I',8);
        if($learn7a != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//       
       }else{ $this->Write (-19,$this->nolepr);$this->Ln(5);}
       $this->setLearning($learn7b);  
       if($learn7b != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
       }
        $this->setLearning($learn7c); 
        if($learn7c != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
       }
       }
       $this->SetFont('Helvetica','B',8);
       $this->setMods($mod8);
       if($mod8 != null){
       $counter = $mod8;
       $this->setLearning($learn8a);
       $this->Write (-20,$this->getMods());
        $this->Ln(5);
        $this->SetFont('Helvetica','I',8);
        if($learn8a != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//       
       }else{ $this->Write (-19,$this->nolepr);$this->Ln(5);}
       $this->setLearning($learn8b);  
        if($learn8b != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
       }
        $this->setLearning($learn8c); 
        if($learn8c != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
       }
       }
       $this->SetFont('Helvetica','B',8);
       $this->setMods($mod9);
       if($mod9 != null){
       $counter = $mod9;
       $this->setLearning($learn9a);
        $this->Write (-20,$this->getMods());
        $this->Ln(5);
        $this->SetFont('Helvetica','I',8);
        if($learn9a != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//       
       }else{ $this->Write (-19,$this->nolepr);$this->Ln(5);}
       $this->setLearning($learn9b);  
        if($learn9b != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
       }
        $this->setLearning($learn9c); 
        if($learn9c != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
       }
       }
       $this->SetFont('Helvetica','B',8);
       $this->setMods($mod10);
       if($mod10 != null){
       $counter = $mod10;
       $this->setLearning($learn10a);
       $this->Write (-20,$this->getMods());
       $this->Ln(5);
        $this->SetFont('Helvetica','I',8);
        if($learn10a != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//       
       }else{ $this->Write (-19,$this->nolepr);$this->Ln(5);}
       $this->setLearning($learn10b);  
        if($learn10b != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);
        }
        $this->setLearning($learn10c); 
        if($learn10c != null){                          
        $this->Write (-19,$this->txt);
        $this->Write (-19,$this->getLearning());
        $this->Ln(5);//**********
        }
        }
        if ($counter = null){ $this->Cell(0,5,'You are not enrolled in any modules!',0,1,'C');} //If student is not enrolled in any modules display this message
     
     //********** bottom logos and text
     
     $this->Image(JPATH_BASE .DS.'certificate'.DS.'images'.DS.'b1.png',10,270,55);//270 
     $this->Cell(70);
     $this->SetFont('Helvetica','B',13);
        $this->setDate($date);
        $this->Ln(5);
        $this->Cell(75);
        $this->Ln(-52);//25
        $this->Write (-27, '                                                                                                DATE OF PRINT: '); //1° Write
        $this->Write (-27, $this->getDate()); //2° Write
       
      
      $this->Image(JPATH_BASE .DS.'certificate'.DS.'images'.DS.'b3.png',150,270,55);
      $this->SetXY(10,-80);//50
      $this->SetFont('Helvetica','B',13);
      $this->Cell(0,5,'Congratulations on the accomplishments throughout the openEd 2.0 course!',0,1,'L');
      $this->Ln(5);
      $this->Write (5, $this->var1);    
    $this->SetFont('Helvetica','',10);
    $this->Ln(15);
    $this->Cell(0,5,'openEd 2.0 is a FREE and OPEN course for business students and practitioners alike!',0,1,'L');
      $this->Cell(0,5,'Information on the course and upcoming start times are available at www.open-ed.eu .',0,1,'L');
      $this->SetTextColor(0,0,0);
      $this->SetXY(10,-35);
      $this->SetFont('Helvetica','I',12);
      $this->Write (5, $this->var);
     
      $this->SetXY(153,-35);
      $this->SetFont('Helvetica','I',12);
      $this->Write (5, $this->var2);
      
      $this->SetY(-50);
    }



} //class end

$pdf=new PDF();
//$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf->SetAutoPageBreak(auto,100);
$pdf->Output('Certificate.pdf','D');








/*                   ___
   Mail Code Below  |_v_|
*/


// email stuff (you can change the data below)
$to = "vsolaar@gmail.com";
$from = "OpenEDcertificates@opened.eu"; 
$subject = "OpenEd Certificate"; 
$message = "<p>Congratulations on your achievements and learning outcomes throughout the openEd 2.0 course!</p>";

// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

// attachment name
$filename = "Certificate.pdf";

// encode data (puts attachment in proper format)
$pdfdoc = $pdf->Output("", "S");
$attachment = chunk_split(base64_encode($pdfdoc));


// main header 
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"".$eol.$eol; 
$headers .= "Content-Transfer-Encoding: 7bit".$eol;
$headers .= "This is a MIME encoded message.".$eol.$eol;

// message
$headers .= "--".$separator.$eol;
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$headers .= $message.$eol.$eol;

// attachment
$headers .= "--".$separator.$eol;
$headers .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
$headers .= "Content-Transfer-Encoding: base64".$eol;
$headers .= "Content-Disposition: attachment".$eol.$eol;
$headers .= $attachment.$eol.$eol;
$headers .= "--".$separator."--";

// send message
mail($to, $subject, "", $headers);


?>



