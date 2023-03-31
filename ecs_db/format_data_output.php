<?php

// http://localhost/ecs_db/format_data_output.php
// http://localhost/elixir/ecs_bd/format_data_output.php

$db_sqlite = new PDO('sqlite:db.sqlite3');

$sql = "SELECT * FROM `order_resend`";
$results = $db_sqlite->query($sql);
$order_resend = $results->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT order_id FROM `order_resend`";
$results = $db_sqlite->query($sql);
$order_resend_ids = $results->fetchAll(PDO::FETCH_COLUMN);

$order_resend_ids_str = implode("','", $order_resend_ids);

$sql = "SELECT * FROM `order_order` WHERE `order_id` IN ('$order_resend_ids_str')";
$results = $db_sqlite->query($sql);
$order_order = $results->fetchAll(PDO::FETCH_ASSOC);

$tmp = [];
foreach ($order_order as $rec) {
    $tmp[$rec['order_id']] = $rec;
}
$order_order = $tmp;


$sql = "SELECT id,name FROM `courier_courier`";
$results = $db_sqlite->query($sql);
$courier_courier = $results->fetchAll(PDO::FETCH_KEY_PAIR);

$sql = "SELECT id,name FROM `source_source`";
$results = $db_sqlite->query($sql);
$source_source = $results->fetchAll(PDO::FETCH_KEY_PAIR);

$sql = "SELECT id,name FROM `order_reason`";
$results = $db_sqlite->query($sql);
$order_reason = $results->fetchAll(PDO::FETCH_KEY_PAIR);

$sql = "SELECT id,name FROM `order_option`";
$results = $db_sqlite->query($sql);
$order_option = $results->fetchAll(PDO::FETCH_KEY_PAIR);

$sql = "SELECT id,name FROM `order_room`";
$results = $db_sqlite->query($sql);
$order_room = $results->fetchAll(PDO::FETCH_KEY_PAIR);

$sql = "SELECT id,name FROM `order_warehouse`";
$results = $db_sqlite->query($sql);
$order_warehouse = $results->fetchAll(PDO::FETCH_KEY_PAIR);


$resends = [];
foreach ($order_resend as $rec) {
    $picker = isset($order_warehouse[$rec['picker_id']]) ? $order_warehouse[$rec['picker_id']] : 'Unknown';
    $packer = isset($order_warehouse[$rec['packer_id']]) ? $order_warehouse[$rec['packer_id']] : 'Unknown';
    
    $resends[] = [
        'order'       => $rec['order_id'],
        'source'      => $source_source[$order_order[$rec['order_id']]['source_id']],
        'courier'     => $courier_courier[$order_order[$rec['order_id']]['courier_id']],
        'tracking_id' => $order_order[$rec['order_id']]['tracking_id'],
        'name'        => $order_order[$rec['order_id']]['name'],
        'reason'      => $order_reason[$rec['reason_id']],
        'option'      => $order_option[$rec['option_id']],
        'room'        => $order_room[$rec['room_id']],
        'picker'      => $picker,
        'packer'      => $packer,
        'created'     => $rec['created'],
        'dor'         => $rec['dor'] ? 'true' : 'false',
        'notes'       => $rec['notes'],
    ];
}

$resends = array_slice($resends,0,100);

$js_formatted = [];
foreach ($resends as $rec) {
   $js_formatted[] = "{
         order: '{$rec['order']}',
         source: '{$rec['source']}',
         courier: '{$rec['courier']}',
         tracking_id: '{$rec['tracking_id']}',
         name: '{$rec['name']}',
         reason: '{$rec['reason']}',
         option: '{$rec['option']}',
         room: '{$rec['room']}',
         picker: '{$rec['picker']}',
         packer: '{$rec['packer']}',
         created: '{$rec['created']}',
         dor: '{$rec['dor']}',
         notes: '{$rec['notes']}',
      }";
}

$js_formatted_str = implode(",", $js_formatted);
$js_formatted_str = "const main = {\n   'orders': [\n      " . $js_formatted_str . "\n   ]\n}";


echo '<pre style="background:#111; color:#b5ce28; font-size:11px;">'; print_r($js_formatted_str); echo '</pre>';