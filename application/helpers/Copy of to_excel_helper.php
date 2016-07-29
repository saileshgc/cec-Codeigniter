<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Excel library for Code Igniter applications
* Author: Derek Allard, Dark Horse Consulting, www.darkhorse.to, April 2006
*/

function to_excel($query, $filename="")
{
     $headers = ''; // just creating the var for field headers to append to below
     $data = ''; // just creating the var for field data to append to below
     
     $obj =& get_instance();
	
	
     $fields = $query->field_data();
	 //pre($fields);
	 //$test = $fields[4]->name;
	 /*$fields[4]->name = "Date of Birth";
	 $fields[7]->name = "City/Suburb";*/
	 //$test = array_push($fields[0],$fields[2],$fields[3],$change_field,$fields[5],$fields[6]);
	 //  pre($change_field);
	  //pre($fields);
	 //pre($test);
     if ($query->num_rows() == 0) {
          $this->session->set_flashdata("err_msg", "The table appears to have no data.");
     } else {
          foreach ($fields as $field) {
             $headers .= ucwords(str_replace("_", " ", $field->name)) . "\t";
			 
          }
     
          foreach ($query->result() as $row) {
               //pre($row);
			   $line = '';
               foreach($row as $value) {                                            
					if ((!isset($value)) OR ($value == "")) {
                         $value = "\t";
                    } else {
                         $value = str_replace('"', '""', $value);
                         $value = '"' . $value . '"' . "\t";
						 
                    }
                    $line .= $value;
					
               }
               $data .= trim($line)."\n";
          }
          
          $data = str_replace("\r","",$data);
		  header("Content-type: application/x-msdownload");
	      header("Content-Disposition: attachment; filename=$filename.xls");
		  echo "$headers\n$data";  
	   
	 }
  }
  
  
 function create_save_excel($query, $directiory="", $filename="")
  {
     
     $headers = ''; // just creating the var for field headers to append to below
     $data = ''; // just creating the var for field data to append to below
     $obj =& get_instance();
	 $user_id = $obj->session->userdata('user_id');
	 
     $fields = $query->field_data();
	 if ($query->num_rows() == 0) {
          $this->session->set_flashdata("err_msg", "The table appears to have no data.");
     } else {
          foreach ($fields as $field) {
             $headers .= ucwords(str_replace("_", " ", $field->name)) . "\t";
	      }
     
          foreach ($query->result() as $row) {
               //pre($row);
			   $line = '';
               foreach($row as $value) {                                            
					if ((!isset($value)) OR ($value == "")) {
                         $value = "\t";
                    } else {
                         $value = str_replace('"', '""', $value);
                         $value = '"' . $value . '"' . "\t";
						 
                    }
                    $line .= $value;
					
               }
               $data .= trim($line)."\n";
          }
          $data = str_replace("\r","",$data);
		  
		 //return $data;
		  
		  $obj->load->helper('file');
		  $file_path = $obj->config->item('documentRoot')."uploads/temp_xls/".$user_id.'/MYDATA/';
		  //$file_path = '';
		  mkdir($file_path.$directiory,0777,true);  
		  
		// die($file_path);
		  write_file($file_path.$directiory."/$filename.xls", $data);
		
	  }
  
  }
  
  
function destroy($dir) 
 {
    $mydir = opendir($dir);
    while(false !== ($file = readdir($mydir))) {
        if($file != "." && $file != "..") {
            chmod($dir.$file, 0777);
            if(is_dir($dir.$file)) {
                chdir('.');
                destroy($dir.$file.'/');
                rmdir($dir.$file) or DIE("couldn't delete $dir$file<br />");
            }
            else
                unlink($dir.$file) or DIE("couldn't delete $dir$file<br />");
        }
    }
    closedir($mydir);
}



    
 function save_excel($query, $filename="")
   {
  
   
  	    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");    
		header ("Pragma: no-cache");    
		header ('Content-type: application/x-msexcel');
		header ("Content-Disposition: attachment; filename=EmplList.xls" ); 
		header ("Content-Description: PHP/INTERBASE Generated Data" );
		xlsBOF();   // begin Excel stream
		
		//write the header
		$fields = $query->field_data();
	    if ($query->num_rows() == 0) {
          $this->session->set_flashdata("err_msg", "The table appears to have no data.");
         }
		 else{
		  $col_count = 0;
          foreach ($fields as $field) {
		     
             xlsWriteLabel(0,$col_count,$field->name);
			 $col_count++;
			 //$headers .= ucwords(str_replace("_", " ", $field->name)) . "\t";
		  }
		}
		
		//write the content
		$in_row_count = 1;
        foreach ($query->result() as $row) 
		 {
               //pre($row);
			   $in_coll_count = 0;
			   $line = '';
               foreach($row as $value) {                                            
					if ((!isset($value)) OR ($value == ""))
					 {
                         $value = " ";
                    } else {
                      /*   $value = str_replace('"', '""', $value);
                         $value = '"' . $value . '"' . "\t";*/
						
						 
                    }
                    $line .= $value;
					writeXlsCol($in_row_count,$in_coll_count,$value);  
					$in_coll_count++;
               }
			   
			   
			   $in_row_count++;
               //$data .= trim($line)."\n";
         
		 }
		
		// write a number B1
		
		$this->xlsEOF(); // close the stream 
	    
   }
  function xlsBOF()
	{
	   echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0); 
		return;
	}
	 // Excel end of file footer
	function xlsEOF()
	{
	  echo pack("ss", 0x0A, 0x00);
	  return;
	}
	//Function to write a Number (double) into Row, Col
	function xlsWriteNumber($Row, $Col, $Value)
	 {
	   echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
	   echo pack("d", $Value);
	   return;
	  }
	//Function to write a label (text) into Row, Col
	function xlsWriteLabel($Row, $Col, $Value )
	 {
	  $L = strlen($Value);
	  echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
	  echo $Value;
	   return;
	} 
	
	function writeXlsCol($Row, $Col, $Value )
 {
   $Value=stripslashes($Value);
   if(is_numeric($Value))
     xlsWriteNumber($Row, $Col, $Value);
   else
   xlsWriteLabel($Row, $Col, $Value);
   
 }
	 
