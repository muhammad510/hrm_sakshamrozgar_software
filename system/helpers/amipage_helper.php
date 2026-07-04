<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2019 - 2022, CodeIgniter Foundation
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @copyright	Copyright (c) 2019 - 2022, CodeIgniter Foundation (https://codeigniter.com/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Email Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/userguide3/helpers/email_helper.html
 */

// ------------------------------------------------------------------------
function pagination($current,$tno_page,$targetUrl)
{
	 if($tno_page)
	 {
			$amiPg='<nav><ul class="pagination justify-content-end" id="amiPagination">';
						for($x = 1; $x <= $tno_page; $x++)
						{
							//$current=6;
							$prev=$current-1;
							$next=$current+1;
							if($x==1)
							{
								if($current==1){$amiPg.='<li class="page-item disabled" id="amiPrev"><a class="page-link" href="javascript:void(0);">Prev</a></li>';}
								else
								{
									$amiPg.='<li class="page-item" id="amiPrev">
												<a class="page-link amiPg amiPrev" href="javascript:void(0);" id="'.$prev.'" data-id="'.$targetUrl.'">Prev</a>
										 	 </li>';
										}
								}
							 if($current==$x)
							{
								$amiPg.='<li class="page-item active" id="aml'.$x.'">
											<a class="page-link amiPg" id="'.$x.'" href="javascript:void(0);" data-id="'.$targetUrl.'">'.$x.'</a>
									 	 </li>';
								}
								else
								{	
								  $amiPg.='<li class="page-item" id="aml'.$x.'">
								  		  		 <a class="page-link amiPg" id="'.$x.'" href="javascript:void(0);" data-id="'.$targetUrl.'">'.$x.'</a>
										   </li>';
						 		}
							}
						 if($current==$tno_page)
						{
							$amiPg.='<li class="page-item disabled" id="amiNext"><a class="page-link" href="javascript:void(0);">Next</a></li>';
							}
						else 
						{
							$amiPg.='<li class="page-item" id="amiNext">
										<a class="page-link amiPg amiNext" id="'.$next.'" href="javascript:void(0);" data-id="'.$targetUrl.'">Next</a>
								     </li>';
							}
							$amiPg.='</ul></nav>';
					return $amiPg;
		 }
	
	
}
