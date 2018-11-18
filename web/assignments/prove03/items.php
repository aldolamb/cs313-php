<?php
    $items = array();
    //001
    $poke = new stdClass();
    $poke->type = 'shirt';
    $poke->img = 'https://image.freepik.com/free-icon/t-shirt-outline_318-73899.jpg';
    $poke->price = 15.00;
    $items[1001] = $poke;
    //002
    $poke = new stdClass();
    $poke->type = 'polo';
    $poke->img = 'https://image.freepik.com/free-icon/cotton-polo-shirt_318-104041.jpg';
    $poke->price = 20.00;
    $items[1002] = $poke;
    //003
    $poke = new stdClass();
    $poke->type = 'jacket';
    $poke->img = 'https://image.freepik.com/free-icon/sweatshirt_318-132837.jpg';
    $poke->price = 30.00;
    $items[1003] = $poke;
    //004
    $poke = new stdClass();
    $poke->type = 'pants';
    $poke->img = 'https://image.freepik.com/free-icon/chinos-pants_318-104050.jpg';
    $poke->price = 25.00;
    $items[1004] = $poke;
    //005
    $poke = new stdClass();
    $poke->type = 'socks';
    $poke->img = 'https://image.freepik.com/free-icon/women-socks_318-104031.jpg';
    $poke->price = 5;
    $items[1005] = $poke;
    //006
    $poke = new stdClass();
    $poke->type = 'shoes';
    $poke->img = 'https://image.freepik.com/free-icon/soccer-shoe_318-62984.jpg';
    $poke->price = 20;
    $items[1006] = $poke;
    // foreach($pokemon as $p) {
    //     $p->img = '/img/poke/'.$p->number.$p->name.'.jpg';
    //     $p->price = 5.00;
    // }
?>