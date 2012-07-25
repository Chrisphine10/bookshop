<?php
//  ------------------------------------------------------------------------ //
//                      BOOKSHOP - MODULE FOR XOOPS 2                		 //
//                  Copyright (c) 2007, 2008 Instant Zero                    //
//                     <http://www.instant-zero.com/>                        //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
/**
 * Plan des cat�gories
 */
include 'header.php';
$GLOBALS['current_category'] = -1;
$xoopsOption['template_main'] = 'bookshop_map.html';
include_once XOOPS_ROOT_PATH.'/header.php';
include_once XOOPS_ROOT_PATH.'/class/tree.php';
include_once BOOKSHOP_PATH.'class/tree.php';

$xoopsTpl->assign('mod_pref', $mod_pref);	// Pr�f�rences du module
$tbl_categories = array();
$select_categ =  '';
$tbl_categories = $h_bookshop_cat->GetAllCategories();
$mytree = new Bookshop_XoopsObjectTree($tbl_categories, 'cat_cid', 'cat_pid');

$select_categ = $mytree->makeSelBox('cat_pid', 'cat_title', '-');
$select_categ = str_replace("<select id='cat_pid' name='cat_pid'>", '', $select_categ);
$select_categ = str_replace('</select>', '', $select_categ);
$select_categ = explode("</option>",$select_categ);

$tbl_categories = array();
$cpt = $catId = 0;
foreach($select_categ as $item) {
	$array = array();
	preg_match("/<option value=\'([0-9]*)\'>/", $item, $array);	// Pour r�cup�rer l'ID de chaque cat�gorie
	$libelle = preg_replace("/<option value=\'([0-9]*)\'>/", '', $item);	// Pour ne conserver que le libell�
	if(isset($array[1])) {
		$catId = intval($array[1]);
		$libelleForURL = preg_replace("/(^-)*(.*)/i","$2",$libelle);	// Pour supprimer les doubles tirets
		$url = $h_bookshop_cat->GetCategoryLink($catId, $libelleForURL);
		$href = bookshop_makeHrefTitle($libelle);
		$xoopsTpl->append('categories', array('cat_url_rewrited' => $url, 'cat_href_title' => $href, 'cat_title' => $libelle));
	}
}

bookshop_setCSS();
if (file_exists( BOOKSHOP_PATH.'language/'.$xoopsConfig['language'].'/modinfo.php')) {
	include_once  BOOKSHOP_PATH.'language/'.$xoopsConfig['language'].'/modinfo.php';
} else {
	include_once  BOOKSHOP_PATH.'language/english/modinfo.php';
}

$title = _MI_BOOKSHOP_SMNAME4.' - '.bookshop_get_module_name();
bookshop_set_metas($title, $title);
include_once XOOPS_ROOT_PATH.'/footer.php';
?>