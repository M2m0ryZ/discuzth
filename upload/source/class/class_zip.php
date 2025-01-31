<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: class_zip.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}


class zipfile {
	var $datasec      = array();

	var $ctrl_dir     = array();

	var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";

	var $old_offset   = 0;


	function unix2DosTime($unixtime = 0) {
		$timearray = ($unixtime == 0) ? getdate() : getdate($unixtime);

		if($timearray['year'] < 1980) {
			$timearray['year']    = 1980;
			$timearray['mon']     = 1;
			$timearray['mday']    = 1;
			$timearray['hours']   = 0;
			$timearray['minutes'] = 0;
			$timearray['seconds'] = 0;
		} 

		return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) | ($timearray['mday'] << 16) |
				($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | ($timearray['seconds'] >> 1);
	} 


	function addFile($data, $name, $time = 0) {
		$name     = str_replace('\\', '/', $name);

		$dtime    = dechex($this->unix2DosTime($time));
		$hexdtime = '\x' . $dtime[6] . $dtime[7]
				  . '\x' . $dtime[4] . $dtime[5]
				  . '\x' . $dtime[2] . $dtime[3]
				  . '\x' . $dtime[0] . $dtime[1];
		eval('$hexdtime = "' . $hexdtime . '";');

		$fr   = "\x50\x4b\x03\x04";
		$fr   .= "\x14\x00";            
		$fr   .= "\x00\x00";            
		$fr   .= "\x08\x00";            
		$fr   .= $hexdtime;             

		$unc_len = strlen($data);
		$crc     = crc32($data);
		$zdata   = gzcompress($data);
		$zdata   = substr(substr($zdata, 0, strlen($zdata) - 4), 2); 
		$c_len   = strlen($zdata);
		$fr      .= pack('V', $crc);             
		$fr      .= pack('V', $c_len);           
		$fr      .= pack('V', $unc_len);         
		$fr      .= pack('v', strlen($name));    
		$fr      .= pack('v', 0);                
		$fr      .= $name;

		$fr .= $zdata;


		$this -> datasec[] = $fr;

		$cdrec = "\x50\x4b\x01\x02";
		$cdrec .= "\x00\x00";                
		$cdrec .= "\x14\x00";                
		$cdrec .= "\x00\x00";                
		$cdrec .= "\x08\x00";                
		$cdrec .= $hexdtime;                 
		$cdrec .= pack('V', $crc);           
		$cdrec .= pack('V', $c_len);         
		$cdrec .= pack('V', $unc_len);       
		$cdrec .= pack('v', strlen($name) ); 
		$cdrec .= pack('v', 0 );             
		$cdrec .= pack('v', 0 );             
		$cdrec .= pack('v', 0 );             
		$cdrec .= pack('v', 0 );             
		$cdrec .= pack('V', 32 );            

		$cdrec .= pack('V', $this -> old_offset ); 
		$this -> old_offset += strlen($fr);

		$cdrec .= $name;

		$this -> ctrl_dir[] = $cdrec;
	} 


	function file() {
		$data    = implode('', $this -> datasec);
		$ctrldir = implode('', $this -> ctrl_dir);

		return
			$data .
			$ctrldir .
			$this -> eof_ctrl_dir .
			pack('v', sizeof($this -> ctrl_dir)) .  
			pack('v', sizeof($this -> ctrl_dir)) .  
			pack('V', strlen($ctrldir)) .           
			pack('V', strlen($data)) .              
			"\x00\x00";                             
	} 

} 


class SimpleUnzip {
		var $Comment = '';

		var $Entries = array();

		var $Name = '';

		var $Size = 0;

		var $Time = 0;

		function __construct($in_FileName = '') {
			if($in_FileName !== '') {
				SimpleUnzip::ReadFile($in_FileName);
			}
		} 

		function Count() {
			return count($this->Entries);
		} 

		function GetData($in_Index) {
			return $this->Entries[$in_Index]->Data;
		} 

		function GetEntry($in_Index) {
			return $this->Entries[$in_Index];
		} 

		function GetError($in_Index) {
			return $this->Entries[$in_Index]->Error;
		} 

		function GetErrorMsg($in_Index) {
			return $this->Entries[$in_Index]->ErrorMsg;
		} 

		function GetName($in_Index) {
			return $this->Entries[$in_Index]->Name;
		} 

		function GetPath($in_Index) {
			return $this->Entries[$in_Index]->Path;
		} 

		function GetTime($in_Index) {
			return $this->Entries[$in_Index]->Time;
		} 

		function ReadFile($in_FileName) {
			$this->Entries = array();

			$this->Name = $in_FileName;
			$this->Time = filemtime($in_FileName);
			$this->Size = filesize($in_FileName);

			$oF = fopen($in_FileName, 'rb');
			$vZ = fread($oF, $this->Size);
			fclose($oF);

			$aE = explode("\x50\x4b\x05\x06", $vZ);


			$aP = unpack('x16/v1CL', $aE[1]);
			$this->Comment = substr($aE[1], 18, $aP['CL']);

			$this->Comment = strtr($this->Comment, array("\r\n" => "\n",
								                         "\r"   => "\n"));

			$aE = explode("\x50\x4b\x01\x02", $vZ);
			$aE = explode("\x50\x4b\x03\x04", $aE[0]);
			array_shift($aE);

			foreach($aE as $vZ) {
				$aI = array();
				$aI['E']  = 0;
				$aI['EM'] = '';
				$aP = unpack('v1VN/v1GPF/v1CM/v1FT/v1FD/V1CRC/V1CS/V1UCS/v1FNL', $vZ);
				$bE = ($aP['GPF'] && 0x0001) ? TRUE : FALSE;
				$nF = $aP['FNL'];

				if($aP['GPF'] & 0x0008) {
					$aP1 = unpack('V1CRC/V1CS/V1UCS', substr($vZ, -12));

					$aP['CRC'] = $aP1['CRC'];
					$aP['CS']  = $aP1['CS'];
					$aP['UCS'] = $aP1['UCS'];

					$vZ = substr($vZ, 0, -12);
				}

				$aI['N'] = substr($vZ, 26, $nF);

				if(substr($aI['N'], -1) == '/') {
					continue;
				}

				$aI['P'] = dirname($aI['N']);
				$aI['P'] = $aI['P'] == '.' ? '' : $aI['P'];
				$aI['N'] = basename($aI['N']);

				$vZ = substr($vZ, 26 + $nF);

				if(strlen($vZ) != $aP['CS']) {
				  $aI['E']  = 1;
				  $aI['EM'] = 'Compressed size is not equal with the value in header information.';
				} else {
					if($bE) {
						$aI['E']  = 5;
						$aI['EM'] = 'File is encrypted, which is not supported from this class.';
					} else {
						switch($aP['CM']) {
							case 0: 
								break;

							case 8: 
								$vZ = gzinflate($vZ);
								break;

							case 12: 
								if(extension_loaded('bz2')) {
								    $vZ = bzdecompress($vZ);
								} else {
								    $aI['E']  = 7;
								    $aI['EM'] = "PHP BZIP2 extension not available.";
								}

								break;

							default:
							  $aI['E']  = 6;
							  $aI['EM'] = "De-/Compression method {$aP['CM']} is not supported.";
						}

						if(! $aI['E']) {
							if($vZ === FALSE) {
								$aI['E']  = 2;
								$aI['EM'] = 'Decompression of data failed.';
							} else {
								if(strlen($vZ) != $aP['UCS']) {
								    $aI['E']  = 3;
								    $aI['EM'] = 'Uncompressed size is not equal with the value in header information.';
								} else {
								    if(crc32($vZ) != $aP['CRC']) {
								        $aI['E']  = 4;
								        $aI['EM'] = 'CRC32 checksum is not equal with the value in header information.';
								    }
								}
							}
						}
					}
				}

				$aI['D'] = $vZ;

				$aI['T'] = mktime(($aP['FT']  & 0xf800) >> 11,
								  ($aP['FT']  & 0x07e0) >>  5,
								  ($aP['FT']  & 0x001f) <<  1,
								  ($aP['FD']  & 0x01e0) >>  5,
								  ($aP['FD']  & 0x001f),
								  (($aP['FD'] & 0xfe00) >>  9) + 1980);

				$this->Entries[] = new SimpleUnzipEntry($aI);
			} 

			return $this->Entries;
	} 
} 

class SimpleUnzipEntry {
		var $Data = '';

		var $Error = 0;

		var $ErrorMsg = '';

		var $Name = '';

		var $Path = '';

		var $Time = 0;

		function __construct($in_Entry) {
		$this->Data     = $in_Entry['D'];
		$this->Error    = $in_Entry['E'];
		$this->ErrorMsg = $in_Entry['EM'];
		$this->Name     = $in_Entry['N'];
		$this->Path     = $in_Entry['P'];
		$this->Time     = $in_Entry['T'];
		} 
} 

?>