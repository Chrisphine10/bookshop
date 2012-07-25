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

if (!defined('XOOPS_ROOT_PATH')) {
	die("XOOPS root path not defined");
}

include_once XOOPS_ROOT_PATH.'/class/xoopsobject.php';
if (!class_exists('Bookshop_XoopsPersistableObjectHandler')) {
	include_once XOOPS_ROOT_PATH.'/modules/bookshop/class/PersistableObjectHandler.php';
}

class bookshop_books extends Bookshop_Object
{
	function bookshop_books()
	{
		$this->initVar('book_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('book_cid',XOBJ_DTYPE_INT,null,false);
		$this->initVar('book_title',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('book_lang_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('book_number',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('book_tome',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('book_format',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('book_url',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('book_image_url',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('book_thumb_url',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('book_submitter',XOBJ_DTYPE_INT,null,false);
		$this->initVar('book_online',XOBJ_DTYPE_INT,null,false);
		$this->initVar('book_date',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('book_submitted',XOBJ_DTYPE_INT,null,false);
		$this->initVar('book_hits',XOBJ_DTYPE_INT,null,false);
		$this->initVar('book_rating',XOBJ_DTYPE_INT,null,false);
		$this->initVar('book_votes',XOBJ_DTYPE_INT,null,false);
		$this->initVar('book_comments',XOBJ_DTYPE_INT,null,false);
		$this->initVar('book_price',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('book_shipping_price',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('book_discount_price',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('book_stock',XOBJ_DTYPE_INT,null,false);
		$this->initVar('book_alert_stock',XOBJ_DTYPE_INT,null,false);
		$this->initVar('book_summary',XOBJ_DTYPE_TXTAREA, null, false);
		$this->initVar('book_description',XOBJ_DTYPE_TXTAREA, null, false);
		$this->initVar('book_attachment',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('book_isbn',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('book_ean',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('book_vat_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('book_pages',XOBJ_DTYPE_INT,null,false);
		$this->initVar('book_pages_collection',XOBJ_DTYPE_INT,null,false);
		$this->initVar('book_volumes_count',XOBJ_DTYPE_INT,null,false);
		$this->initVar('book_recommended',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('book_metakeywords',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('book_metadescription',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('book_metatitle',XOBJ_DTYPE_TXTBOX,null,false);
		// Pour autoriser le html
		$this->initVar('dohtml', XOBJ_DTYPE_INT, 1, false);
	}

	/**
	 * Indique si le livre courant est recommand�.
	 */
	function isRecommended($withDescription = false)
	{
		if($this->getVar('book_recommended') != '0000-00-00') {
			return $withDescription ? _YES : true;
		} else {
			return $withDescription ? _NO : false;
		}
	}

	/**
	 * Place le livre courant dans l'�tat "recommand�"
	 */
	function setRecommended()
	{
		$this->setVar('book_recommended', date("Y-m-d"));
	}

	/**
	 * Enl�ve "l'attribut" recommand� d'un livre
	 */
	function unsetRecommended()
	{
		$this->setVar('book_recommended', '0000-00-00');
	}

	/**
	 * Renvoie l'image qui indique si le livre est recommand� ou pas.
	 */
	function recommendedPicture()
	{
		if($this->isRecommended()) {
			return "<img src='".BOOKSHOP_IMAGES_URL."heart.png' alt='"._BOOKSHOP_IS_RECOMMENDED."' />&nbsp;";
		} else {
			return "<img src='".BOOKSHOP_IMAGES_URL."blank.gif' alt='' />";
		}
	}

    function toArray($format = 's')
    {
		$ret = array();
		foreach ($this->vars as $k => $v) {
			$ret[$k] = $this->getVar($k, $format);
		}
		$ret['book_tooltip'] = bookshop_make_infotips($this->getVar('book_description'));
		$ret['book_url_rewrited'] = BookshopBookshop_booksHandler::GetBookLink($this->getVar('book_id'), $this->getVar('book_title'));
		$ret['book_href_title'] = bookshop_makeHrefTitle($this->getVar('book_title'));
		$ret['book_recommended'] = $this->isRecommended();
		$ret['book_recommended_picture'] = $this->recommendedPicture();
		return $ret;
    }

}


class BookshopBookshop_booksHandler extends Bookshop_XoopsPersistableObjectHandler
{
	function BookshopBookshop_booksHandler($db)
	{	//												Table				Classe			 Id
		$this->BookXoopsPersistableObjectHandler($db, 'bookshop_books', 'bookshop_books', 'book_id');
	}


	/**
	 * Renvoie la liste des x livres les plus vus par les visiteurs
	 *
	 * @param integer $start		D�but des donn�es
	 * @param integer $limit		Nombre maximum d'enregistrements � renvoyer
	 * @param integer $category Identifiant de la cat�gorie (�venutellement)
	 * @return array Tableau de livres (sous la forme d'objets)
	 */
	function getMostViewedBooks($start=0, $limit=0, $category=0)
	{
		$tbl_datas = array();
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('book_online', 1, '='));
		if(bookshop_getmoduleoption('show_unpublished') == 0) {	// Ne pas afficher les livres qui ne sont pas publi�s
			$criteria->add(new Criteria('book_submitted', time(), '<='));
		}
		if(bookshop_getmoduleoption('nostock_display') == 0) {	// Se limiter aux seuls livres encore en stock
			$criteria->add(new Criteria('book_stock', 0, '>'));
		}
		if(is_array($category)) {
			$criteria->add(new Criteria('book_cid', '('.implode(',',$category).')', 'IN'));
		} elseif($category != 0) {
			$criteria->add(new Criteria('book_cid', intval($category), '='));
		}
		// On se limite aux livres qui ont �t� vraiment vus !
		$criteria->add(new Criteria('book_hits', 0, '>'));
		$criteria->setLimit($limit);
		$criteria->setStart($start);
		$criteria->setSort('book_hits');
		$criteria->setOrder('DESC');
		$tbl_datas = $this->getObjects($criteria, true);
		return $tbl_datas;
	}

	/**
	 * Renvoie la liste des x livres les mieux not�s par les visiteurs
	 *
	 * @param integer $start		D�but des donn�es
	 * @param integer $limit		Nombre maximum d'enregistrements � renvoyer
	 * @param integer $category Identifiant de la cat�gorie (�venutellement)
	 * @return array Tableau de livres (sous la forme d'objets)
	 */
	function getBestRatedBooks($start=0, $limit=0, $category=0)
	{
		$tbl_datas = array();
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('book_online', 1, '='));
		if(bookshop_getmoduleoption('show_unpublished') == 0) {	// Ne pas afficher les livres qui ne sont pas publi�s
			$criteria->add(new Criteria('book_submitted', time(), '<='));
		}
		if(bookshop_getmoduleoption('nostock_display') == 0) {	// Se limiter aux seuls livres encore en stock
			$criteria->add(new Criteria('book_stock', 0, '>'));
		}
		if(is_array($category)) {
			$criteria->add(new Criteria('book_cid', '('.implode(',',$category).')', 'IN'));
		} elseif($category != 0) {
			$criteria->add(new Criteria('book_cid', intval($category), '='));
		}
		$criteria->setLimit($limit);
		$criteria->setStart($start);
		$criteria->setSort('book_rating');
		$criteria->setOrder('DESC');
		$tbl_datas = $this->getObjects($criteria, true);
		return $tbl_datas;
	}

	/**
	 * Renvoie la liste des x derniers livres recommand�s
	 *
	 * @param integer $start		Indice de d�part
	 * @param integer $limit		Nombre maximum d'enregistrements � renvoyer
	 * @param integer $category Identifiant de la cat�gorie (�venutellement)
	 * @return array Tableau de livres (sous la forme d'objets)
	 */
	function getRecentRecommendedBooks($start=0, $limit=0, $category=0)
	{
		$tbl_datas = array();
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('book_online', 1, '='));
		$criteria->add(new Criteria('book_recommended', '0000-00-00', '<>'));
		if(bookshop_getmoduleoption('show_unpublished') == 0) {	// Ne pas afficher les livres qui ne sont pas publi�s
			$criteria->add(new Criteria('book_submitted', time(), '<='));
		}
		if(bookshop_getmoduleoption('nostock_display') == 0) {	// Se limiter aux seuls livres encore en stock
			$criteria->add(new Criteria('book_stock', 0, '>'));
		}
		if(is_array($category)) {
			$criteria->add(new Criteria('book_cid', '('.implode(',',$category).')', 'IN'));
		} elseif($category != 0) {
			$criteria->add(new Criteria('book_cid', intval($category), '='));
		}
		$criteria->setLimit($limit);
		$criteria->setStart($start);
		$criteria->setSort('book_recommended');
		$criteria->setOrder('DESC');
		$tbl_datas = $this->getObjects($criteria, true);
		return $tbl_datas;
	}

	/**
	 * Renvoie le nombre total de livres recommand�s
	 *
	 * @return integer Le nombre total de livres recommand�s
	 */
	function getRecommendedCount()
	{
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('book_online', 1, '='));
		$criteria->add(new Criteria('book_recommended', '0000-00-00', '<>'));
		if(bookshop_getmoduleoption('show_unpublished') == 0) {	// Ne pas afficher les livres qui ne sont pas publi�s
			$criteria->add(new Criteria('book_submitted', time(), '<='));
		}
		if(bookshop_getmoduleoption('nostock_display') == 0) {	// Se limiter aux seuls livres encore en stock
			$criteria->add(new Criteria('book_stock', 0, '>'));
		}
		return $this->getCount($criteria);
	}


	/**
	 * Renvoie la liste des x derniers livres parus toutes cat�gories confondues ou dans une cat�gorie sp�cifique
	 *
	 * @param integer $start		D�but des donn�es
	 * @param integer $limit		Nombre maximum d'enregistrements � renvoyer
	 * @param integer $category Identifiant de la cat�gorie (�venutellement)
	 * @return array Tableau de livres (sous la forme d'objets)
	 */
	function getRecentBooks($start=0 , $limit=0, $category=0, $sortField='book_submitted DESC, book_title')
	{
		$tbl_datas = array();
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('book_online', 1, '='));
		if(bookshop_getmoduleoption('show_unpublished') == 0) {	// Ne pas afficher les livres qui ne sont pas publi�s
			$criteria->add(new Criteria('book_submitted', time(), '<='));
		}
		if(bookshop_getmoduleoption('nostock_display') == 0) {	// Se limiter aux seuls livres encore en stock
			$criteria->add(new Criteria('book_stock', 0, '>'));
		}
		if(is_array($category)) {
			$criteria->add(new Criteria('book_cid', '('.implode(',',$category).')', 'IN'));
		} elseif($category > 0 ) {
			$criteria->add(new Criteria('book_cid', intval($category), '='));
		}
		$criteria->setLimit($limit);
		$criteria->setStart($start);
		$criteria->setSort($sortField);
		$tbl_datas = $this->getObjects($criteria, true);
		return $tbl_datas;
	}

	function getBooksForNewsletter($startingDate, $endingDate, $category = 0, $start = 0, $limit = 0)
	{
		$tblDatas = array();
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('book_online', 1, '='));
		$criteria->add(new Criteria('book_submitted', $startingDate, '>='));
		$criteria->add(new Criteria('book_submitted', $endingDate, '<='));
		if(bookshop_getmoduleoption('show_unpublished') == 0) {	// Ne pas afficher les livres qui ne sont pas publi�s
			$criteria->add(new Criteria('book_submitted', time(), '<='));
		}
		if(bookshop_getmoduleoption('nostock_display') == 0) {	// Se limiter aux seuls livres encore en stock
			$criteria->add(new Criteria('book_stock', 0, '>'));
		}
		if(is_array($category)) {
			$criteria->add(new Criteria('book_cid', '('.implode(',',$category).')', 'IN'));
		} elseif($category > 0 ) {
			$criteria->add(new Criteria('book_cid', intval($category), '='));
		}
		$criteria->setLimit($limit);
		$criteria->setStart($start);
		$criteria->setSort('book_title');
		$tblDatas = $this->getObjects($criteria, true);
		return $tblDatas;
	}


	/**
	 * Renvoie le nombre total de livres publi�s dans la base en tenant compte des pr�f�rences du module
	 *
	 * @param intefer $book_cid Cat�gorie du livre
	 * @return integer Le nombre de livres publi�s
	 */
	function getTotalPublishedBooksCount($book_cid = 0)
	{
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('book_online', 1, '='));
		if(bookshop_getmoduleoption('show_unpublished') == 0) {	// Ne pas afficher les livres qui ne sont pas publi�s
			$criteria->add(new Criteria('book_submitted', time(), '<='));
		}
		if(bookshop_getmoduleoption('nostock_display') == 0) {	// Se limiter aux seuls livres encore en stock
			$criteria->add(new Criteria('book_stock', 0, '>'));
		}
		if($book_cid > 0) {
			$criteria->add(new Criteria('book_cid', intval($book_cid), '='));
		}
		return $this->getCount($criteria);
	}

	/**
	 * R�cup�ration de l'ID et du titre d'une s�rie de livres r�pondants � un crit�re
	 *
	 * @param object $criteria	crit�re de s�lection
	 * @return array Tableau dont la cl� = ID livre et la valeur le titre du livre
	 */
	function getIdTitle($criteria)
	{
        global $myts;
        $ret = array();
        $sql = 'SELECT book_id, book_title FROM '.$this->table;
        if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
            $sql .= ' '.$criteria->renderWhere();
            if ($criteria->getSort() != '') {
                $sql .= ' ORDER BY '.$criteria->getSort().' '.$criteria->getOrder();
            }
            $limit = $criteria->getLimit();
            $start = $criteria->getStart();
        }
        $result = $this->db->query($sql, $limit, $start);
        if (!$result) {
            return $ret;
        }
        while ($myrow = $this->db->fetchArray($result)) {
        	$ret[$myrow['book_id']] = $myts->htmlSpecialChars($myrow['book_title']);
        }
        return $ret;
	}

	/**
	 * Renvoie l'URL � utiliser pour acc�der � un livre en tenant compte des pr�f�rences du module
	 *
	 * @param integer $book_id Identifiant du livre
	 * @param string $book_title Titre du livre
	 * @return string L'URL
	 */
	function GetBookLink($book_id, $book_title)
	{
		$url = '';
		if(bookshop_getmoduleoption('urlrewriting') == 1) {	// On utilise l'url rewriting
			$url = BOOKSHOP_URL.'book-'.$book_id.bookshop_makeSEOurl($book_title).'.html';
		} else {	// Pas d'utilisation de l'url rewriting
			$url = BOOKSHOP_URL.'book.php?book_id='.$book_id;
		}
		return $url;
	}

	/**
	 * Mise � jour du compteur de lectures du livre
	 *
	 * @param integer $book_id L'identifiant du livre dont il faut mettre � jour le compteur de lectures
	 * @return boolean Le r�sultat de la mise � jour
	 */
	function addCounter($book_id) {
		$sql = 'UPDATE '.$this->table.' SET book_hits = book_hits + 1 WHERE book_id= '.intval($book_id);
		return $this->db->queryF($sql);
	}


	/**
	 * Mise � jour de la notation d'un livre
	 *
	 * @param integer $book_id Identifiant du livre
	 * @param float $rating la notation
	 * @param integer $votes Le nombre de votes du livre
	 * @return boolean Le r�sultat de la mise � jour
	 */
	function updateRating($book_id, $rating, $votes)
	{
		$sql = 'UPDATE '.$this->table." SET book_rating = $rating, book_votes = $votes WHERE book_id = ".intval($book_id);
		return $this->db->queryF($sql);
	}

	/**
	 * Mise � jour du nombre de commentaires d'un livre
	 *
	 * @param integer $book_id Identifiant du livre
	 * @param integer $commentsCount Nombre total de commentaires
	 */
	function updateCommentsCount($book_id, $commentsCount)
	{
		$book = null;
		$book = $this->get($book_id);
		if(is_object($book)) {
			$criteria = new Criteria('book_id', $book_id, '=');
			$this->updateAll('book_comments', $commentsCount, $criteria, true);
		}
	}

	/**
	 * Renvoie x livres au hasard
	 *
	 * @param integer $start		D�but des donn�es
	 * @param integer $limit		Nombre maximum d'enregistrements � renvoyer
	 * @param integer $category Identifiant de la cat�gorie (�venutellement)
	 * @return array Tableau de livres (sous la forme d'objets)
	 */
	function getRandomBooks($start=0, $limit=0, $category=0)
	{
		$tbl_datas = array();
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('book_online', 1, '='));
		if(bookshop_getmoduleoption('show_unpublished') == 0) {	// Ne pas afficher les livres qui ne sont pas publi�s
			$criteria->add(new Criteria('book_submitted', time(), '<='));
		}
		if(bookshop_getmoduleoption('nostock_display') == 0) {	// Se limiter aux seuls livres encore en stock
			$criteria->add(new Criteria('book_stock', 0, '>'));
		}
		if(is_array($category)) {
			$criteria->add(new Criteria('book_cid', '('.implode(',',$category).')', 'IN'));
		} elseif($category != 0) {
			$criteria->add(new Criteria('book_cid', intval($category), '='));
		}
		$criteria->setLimit($limit);
		$criteria->setStart($start);
		$criteria->setSort('RAND()');
		$tbl_datas = $this->getObjects($criteria, true);
		return $tbl_datas;
	}


	/**
	 * Renvoie x livres en promo
	 *
	 * @param integer $start		D�but des donn�es
	 * @param integer $limit		Nombre maximum d'enregistrements � renvoyer
	 * @param integer $category Identifiant de la cat�gorie (�venutellement)
	 * @return array Tableau de livres (sous la forme d'objets)
	 */
	function getPromotionalBooks($start=0, $limit=0, $category=0)
	{
		$tbl_datas = array();
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('book_online', 1, '='));
		if(bookshop_getmoduleoption('show_unpublished') == 0) {	// Ne pas afficher les livres qui ne sont pas publi�s
			$criteria->add(new Criteria('book_submitted', time(), '<='));
		}
		if(bookshop_getmoduleoption('nostock_display') == 0) {	// Se limiter aux seuls livres encore en stock
			$criteria->add(new Criteria('book_stock', 0, '>'));
		}
		if(is_array($category)) {
			$criteria->add(new Criteria('book_cid', '('.implode(',',$category).')', 'IN'));
		} elseif($category != 0) {
			$criteria->add(new Criteria('book_cid', intval($category), '='));
		}
		$criteria->add(new Criteria('book_discount_price', 0, '>'));
		$criteria->setLimit($limit);
		$criteria->setStart($start);
		$criteria->setSort('book_title');
		$criteria->setOrder('DESC');
		$tbl_datas = $this->getObjects($criteria, true);
		return $tbl_datas;
	}


	/**
	 * Renvoie les livres dont les stocks sont bas
	 *
	 * @param integer $start		D�but des donn�es
	 * @param integer $limit		Nombre maximum d'enregistrements � renvoyer
	 * @return array Tableau de livres (sous la forme d'objets)
	 */
	function getLowStocks($start=0, $limit=0)
	{
		$ret = array();
		$sql = 'SELECT * FROM '.$this->table.' WHERE book_online = 1';
		if(bookshop_getmoduleoption('show_unpublished') == 0) {	// Ne pas afficher les livres qui ne sont pas publi�s
			$sql .= ' AND book_submitted <= '.time();
		}
		$sql .= ' AND book_stock <= book_alert_stock ';
		$sql .= ' AND book_alert_stock > 0';
		$sql .= ' ORDER BY book_stock';
        $result = $this->db->query($sql, $limit, $start);
        if (!$result) {
            return $ret;
        }

        $ret = $this->convertResultSet($result, true, true);
        return $ret;
	}

	/**
	 * Retourne le nombre de livres dont la quantit� en stock est inf�rieure ou �gale � la quantit� d'alerte
	 *
	 * @return integer Le nombre de livres concern�s
	 */
	function getLowStocksCount()
	{
		$ret = array();
		$sql = 'SELECT Count(*) as cpt FROM '.$this->table.' WHERE book_online = 1';
		if(bookshop_getmoduleoption('show_unpublished') == 0) {	// Ne pas afficher les livres qui ne sont pas publi�s
			$sql .= ' AND book_submitted <= '.time();
		}
		$sql .= ' AND book_stock <= book_alert_stock ';
		$sql .= ' AND book_alert_stock > 0';
        $result = $this->db->query($sql);
        if (!$result) {
            return $ret;
        }
        $count = 0;
        list($count) = $this->db->fetchRow($result);
        return $count;
	}

	/**
	 * Augmente les quantit�s en stock d'un livre
	 *
	 * @param object $book Objet livre
	 * @param $quantity $quantity Quantit� � rajouter
	 */
	function increaseStock(&$book, $quantity = 1)
	{
		$book->setVar('book_stock', $book->getVar('book_stock') + 1);
		$this->insert($book, true);
		return true;
	}

	/**
	 * Diminue les quantit�s en stock d'un livre
	 *
	 * @param object $book Objet livre
	 * @param $quantity $quantity Quantit� � soustraire
	 */
	function decreaseStock(&$book, $quantity = 1)
	{
		if($book->getVar('book_stock') - $quantity > 0) {
			$book->setVar('book_stock', $book->getVar('book_stock') - $quantity);
			$this->insert($book, true);
		} else {
			$book->setVar('book_stock', 0);
		}
		return true;
	}


	/**
	 * Indique si la quantit� d'alerte d'un livre est atteinte
	 *
	 * @param object $book L'objet livre concern�
	 * @return boolean Vrai si la quantit� d'alerte est atteinte, sinon faux
	 */
	function isAlertStockReached(&$book)
	{
		if($book->getVar('book_stock') < $book->getVar('book_alert_stock')) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * M�thode charg�e de v�rifier si le stock d'alerte est atteint et si c'est le cas, d'envoyer une alerte
	 *
	 * @param object $book Livre dont il faut faire la v�rification
	 * @return boolean vrai si l'alerte � du �tre g�n�r�e sinon faux
	 */
	function verifyLowStock(&$book)
	{
		if($this->isAlertStockReached($book)) {
			$msg = array();
			$msg['BOOK_NAME'] = $book->getVar('book_title');
			$msg['ACTUAL_QUANTITY'] = $book->getVar('book_stock');
			$msg['ALERT_QUANTITY'] = $book->getVar('book_alert_stock');
			$msg['PUBLIC_URL'] = $this->GetBookLink($book->getVar('book_id'), $book->getVar('book_title'));
			$msg['ADMIN_URL'] = BOOKSHOP_URL.'admin/index.php?op=editbook&id='.$book->getVar('book_id');
			bookshop_send_email_from_tpl('shop_lowstock.tpl', bookshop_getEmailsFromGroup(bookshop_getmoduleoption('stock_alert_email')), _BOOKSHOP_STOCK_ALERT, $msg);
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Renvoie la plus petite date de cr�ation d'un livre ainsi que la "plus grande" date de cr�ation d'un livre
	 *
	 * @param integer $minDate Date mini (parm�tre de sortie)
	 * @param integer $maxDate Date maxi (param�tre de sortie)
	 * @return boolean Vrai si on a pu r�cup�rer ces valeurs, faux sinon
	 */
	function getMinMaxPublishedDate(&$minDate, &$maxDate)
	{
		$sql = 'SELECT Min(book_submitted) as minDate, Max(book_submitted) as maxDate FROM '.$this->table.' WHERE book_online=1';
        $result = $this->db->query($sql);
        if (!$result) {
            return false;
        }
        $myrow = $this->db->fetchArray($result);
        $minDate = $myrow['minDate'];
        $maxDate = $myrow['maxDate'];
		return true;
	}
}
?>