<!-- Created by Instant Zero (http://www.instant-zero.com), Design XoopsDesign (http://www.xoopsdesign.com) -->
<div id="bookshop-logo">
    <img src="<{$smarty.const.BOOKSHOP_IMAGES_URL}>bookshop.png" width="235" height="45" alt="" border="0"/>
</div>
<h2><{$smarty.const._BOOKSHOP_BILL}></h2>
<br>
<div class="bookshop_otherinf">
    <{$smarty.const._DATE}> : <{$commande.cmd_date|date_format:"%d/%m/%Y"}>
    <br><{$smarty.const._BOOKSHOP_COMMAND}> : <{$commande.cmd_id}>
    <br><{$commande.cmd_firstname}> <{$commande.cmd_lastname}>
    <br><{$commande.cmd_adress}>
    <br><{$commande.cmd_zip}> <{$commande.cmd_town}>
    <br><{$commande.country_label}>
    <br><{$commande.cmd_telephone}> - <{$commande.cmd_email}>
    <br><{$smarty.const._BOOKSHOP_INVOICE}> <{if $commande.cmd_bill == 1 }><{$smarty.const._YES}><{else}><{$smarty.const._NO}><{/if}>
</div>

<br><br>
<table border="0" id="bookshop_caddy">
    <tr>
        <th align="center"><{$smarty.const._BOOKSHOP_ITEMS}></th>
        <th align="center"><{$smarty.const._BOOKSHOP_QUANTITY}></th>
        <th align="center"><{$smarty.const._BOOKSHOP_PRICE}></th>
        <th align="center"><{$smarty.const._BOOKSHOP_SHIPPING_PRICE}></th>
    </tr>
    <{foreach item=book from=$books}>
        <tr>
            <td>
                <div class="bookshop_booktitle"><a href="<{$book.book_url_rewrited}>" title="<{$book.book_href_title}>"><{$book.book_title}></a></div>
                <div class="bookshop_bookauthor"><{if $book.book_joined_authors != ''}><{$smarty.const._BOOKSHOP_BY}> <{$book.book_joined_authors}><{/if}></div>
            </td>
            <td align="right">
                <div class="bookshop_bookprice"><{$book.book_qty}></div>
            </td>
            <td align="right">
                <div class="bookshop_bookprice"><{$book.book_price_ttc}>&nbsp;<{$mod_pref.money_short}></div>
            </td>
            <td align="right"><{$book.book_shipping_amount}></td>
        </tr>
    <{/foreach}>
    <tr class="bookshop_carttotal">
        <td>
            <h3><{$smarty.const._BOOKSHOP_TOTAL}><h3>
        </td>
        <td align="right" valign="middle"><{$commandAmountTTC}> <{$mod_pref.money_short}></td>
        <td>&nbsp;</td>
        <td align="right" valign="middle"><{$shippingAmount}> <{$mod_pref.money_short}></td>
    </tr>
</table>

<{if $discountsDescription != ''}>
    <div class="bookshop_discounts">
        <h4><{$smarty.const._BOOKSHOP_CART4}><h4>
                <{$discountsDescription}>
    </div>
<{/if}>

