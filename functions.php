<?php

use \Hcode\Model\User;
use \Hcode\Model\Cart;
use \Hcode\Model\Products;

function formatPrice($vlprice)
{

    if(!$vlprice > 0) $vlprice = 0;

    return number_format($vlprice,2,",",".");
}

function checkLogin($inadmin = true)
{
    return User::checkLogin($inadmin);
}

function getUserName(){
    $user = User::getFromSession();
    return $user->getdesperson();
}

function getCartVlSubTotal()
{
    $cart = Cart::getFromSession();

    $totals = $cart->getProductsTotals();

    return formatPrice($totals['vlprice']);
}

function getCartNrQtd()
{
    $cart = Cart::getFromSession();

    $totals = $cart->getProductsTotals();

    return $totals['nrqtd'];
}

function formatDate($date)
{
    return date('d/m/Y',strtotime($date));
}
