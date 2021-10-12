<?php
ob_start();
define('API_KEY',"2076653993:AAEgBJWzL4YpWeFIN7g1f09FfU-KwSUBsT8");
$admin ="854021271";

//Kod @Black_Codercik ga tegishli iltimos mualliflik huquqini o'zgartirmang zero bu birovning mehnati
function bot($method, $datas = []){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$update = json_decode(file_get_contents('php://input'));
$message = $update -> message;
$text = $message -> text;
$cid = $message -> chat -> id;
$mid = $message -> message_id;
$ism = $message -> from-> first_name;
$data = $update->callback_query->data;
$guruhlar = file_get_contents("stat/group.list");
$userlar = file_get_contents("stat/user.txt");
mkdir("stat");
$user = $message -> from -> username;
$modxe = file_get_contents("user.txt");

$kid = 'Yagzon_Guruh1';
$kkid = '@Yagzon_guruh1';
if(isset($update->message->text)){
    $gett = bot('getChatMember',[
    'chat_id' =>$kkid,
    'user_id' => $update->message->chat->id,
    ]);
$gget = $gett->result->status;
if($gget == "member" or $gget == "creator" or $gget == "administrator")
{
}
else{ bot('sendMessage',[
'chat_id'=>$update->message->chat->id,
'message_id'=>$update->message->message_id,
'parse_mode'=>'markdown',
'text'=>"*👋┇ Salom bot xush kelibsiz

🌟┇ Botdan foydalanish uchun kanalimizga a'zo bo'ling

📡┇Kanalimiz
@Yagzon_guruh1  👈

👆👆👆

📌┇ A'zo bolib /start ni bosing *",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"A'zo bo'lish 🎗",'url'=>'http://t.me/'.$kid.'']],
]

])

]);
return true;
}

}
if($text == "/start") {
    file_put_contents("stat/$cid.dat","$kkd");
    bot('sendMessage',[
       'chat_id' => $cid,
       'parse_mode' => 'html',
       'text' => "Assalomu aleykum [$ism]. Xush kelibsiz!\nSizga foydam tegishi mumkinligidan xursandman.
       Marhamat pastdagi tugmalardan birini tanlang:",
       'reply_markup'=> json_encode([
       'inline_keyboard'=>[
       [['text'=>"Yagzon", 'callback_data'=>"yag"],['text'=>'Uzmir', 'callback_data'=>"uzm"]],
       [['text'=>"Doxxim", 'callback_data'=>"dox"],['text'=>"Yolg'izbek", 'callback_data'=>'yol']]
       ]])

    ]);
    if($data=="yag"){
        bot('sendMessage',[
        'chat_id'=>$cid,
        'parse_mode' =>'markdown',
        'text' => "Men siz haqingizda bir ma'lumotga ega bo'ldim.
        Siz Yagzon guruhining muxlisiz :). Demak Yagzonni eshitishni xohlaysiz." ,
        'reply_markup' => json_encode([
        'inline_keyboard' => [
        [['text' => "Yagzonni tinglash", 'callback_data' => "yagmus"]],
        [['text' => "Orqaga", 'callback_data' =>'ort']]
        ]
        ])
        ]);
    }
    if($data=="uzm"){
        bot('sendMessage',[
        'chat_id'=>$cid,
        'parse_mode' =>'markdown',
        'text' => "Men siz haqingizda bir ma'lumotga ega bo'ldim.
        Siz Uzmirning muxlisiz :). Demak Uzmirni eshitishni xohlaysiz." ,
        'reply_markup' => json_encode([
        'inline_keyboard' => [
        [['text' => "Uzmirni tinglash", 'callback_data' => "uzmmus"]],
        [['text' => "Orqaga", 'callback_data' =>'ort']]
        ]
        ])
        ]);
    }
    if($data=="dox"){
        bot('sendMessage',[
        'chat_id'=>$cid,
        'parse_mode' =>'markdown',
        'text' => "Men siz haqingizda bir ma'lumotga ega bo'ldim.
        Siz Doxximning muxlisiz :). Demak Doxximni eshitishni xohlaysiz." ,
        'reply_markup' => json_encode([
        'inline_keyboard' => [
        [['text' => "Doxximni tinglash", 'callback_data' => "doxmus"]],
        [['text' => "Orqaga", 'callback_data' =>'ort']]
        ]
        ])
        ]);
    }
    if($data=="yol"){
        bot('sendMessage',[
        'chat_id'=>$cid,
        'parse_mode' =>'markdown',
        'text' => "Men siz haqingizda bir ma'lumotga ega bo'ldim.
        Siz Yolg'izbekning muxlisiz :). Demak Yolg'izbekni eshitishni xohlaysiz." ,
        'reply_markup' => json_encode([
        'inline_keyboard' => [
        [['text' => "Yolg'izbekni tinglash", 'callback_data' => "yolmus"]],
        [['text' => "Orqaga", 'callback_data' =>'ort']]
        ]
        ])
        ]);
    }
    if($data=="yagmus"){
        bot('sendMessage',[
        'chat_id'=>$cid,
        'parse_mode' =>'html',
        'text' => "Yagzonni eshitamiz ;) \n<a href='https://t.me/Yagzon_guruh1/201'>Oxirgi trekini eshitish</a> " ,
        'reply_markup' => json_encode([
        'inline_keyboard' => [
        [['text' => "Eshitish", 'url' => "https://t.me/Yagzon_guruh1/201"]],
        [['text' => "Orqaga", 'callback_data' =>'ort']]
        ]
        ])
        ]);
    }

    if($data=="uzmmus"){
        bot('sendMessage',[
        'chat_id'=>$cid,
        'parse_mode' =>'html',
        'text' => "Uzmirni eshitamiz ;) \n<a href='https://t.me/Yagzon_guruh1/263'>Oxirgi trekini eshitish</a> " ,
        'reply_markup' => json_encode([
        'inline_keyboard' => [
        [['text' => "Eshitish", 'url' => "https://t.me/Yagzon_guruh1/263"]],
        [['text' => "Orqaga", 'callback_data' =>'ort']]
        ]
        ])
        ]);
    }
    if($data=="doxmus"){
        bot('sendMessage',[
        'chat_id'=>$cid,
        'parse_mode' =>'html',
        'text' => "Doxximni eshitamiz ;) \n<a href='https://t.me/Yagzon_guruh1/270'>Oxirgi trekiga videoni ko'rish</a> " ,
        'reply_markup' => json_encode([
        'inline_keyboard' => [
        [['text' => "Videoni ko'rish", 'url' => "https://t.me/Yagzon_guruh1/270"]],
        [['text' => "Orqaga", 'callback_data' =>'ort']]
        ]
        ])
        ]);
    }
    if($data=="yolmus"){
        bot('sendMessage',[
        'chat_id'=>$cid,
        'parse_mode' =>'html',
        'text' => "Yolg'izbekni eshitamiz ;) \n<a href='https://t.me/Yagzon_guruh1/262'>Video ko'rish</a> " ,
        'reply_markup' => json_encode([
        'inline_keyboard' => [
        [['text' => "Eshitish", 'url' => "https://t.me/Yagzon_guruh1/262"]],
        [['text' => "Orqaga", 'callback_data' =>'ort']]
        ]
        ])
        ]);
    }
    if($data=="ort"){
        bot('sendMessage',[
        'chat_id'=>$cid,
        'parse_mode' =>'html',
        'text' => "Bosh menyuga qaytdingiz. Tanlang *_*: " ,
        'reply_markup' => json_encode([
        'inline_keyboard' => [
        [['text'=>"Yagzon", 'callback_data'=>"yag"],['text'=>'Uzmir', 'callback_data'=>"uzm"]],
    [['text'=>"Doxxim", 'callback_data'=>"dox"],['text'=>"Yolg'izbek", 'callback_data'=>'yol']]
        ]
        ])
        ]);
    }
    $u = explode("\n",file_get_contents("memb.txt"));
    $c = count($u)-1;
    if ($update && !in_array($chat_id, $u)) {
        file_put_contents("user.txt", $chat_id."\n",FILE_APPEND);
  }
   if ($text == "/admin" and $cid == $admin ) {
       bot('sendMessage',[
       'chat_id'=>$cid,
       'text'=>"Hurmatli dasturchi nima qilishni xohlaysiz?",
       'parse_mode'=>"MarkDown",
       'disable_web_page_preview'=>true,
       'reply_markup'=>json_encode([
       'inline_keyboard'=>[
       [['text'=>'Obunachilarga 📧 ','callback_data'=>'ce']],
       [['text'=>'Statistika🧮 ','callback_data'=>'co']],
       ]
       ])
       ]);
}
    if($data == 'off'){
bot('editMessageText',[
'chat_id'=>$callcid,
'message_id'=>$message_id,
            'text'=>"
Xabar
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
                'reply_markup'=>json_encode([
                        'inline_keyboard'=>[
[['text'=>'Hammaga xabar📧 ','callback_data'=>'ce']],
[['text'=>'Statistika🧮 ','callback_data'=>'co']]
]
])
]);
}
if($data == "co" and $update->callback_query->message->chat->id == $admin ){
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
    Bot obunachilari soni📢 : [ $c ] .
        ",
        'show_alert'=>true,
]);
}

if($data == "ce" and $update->callback_query->message->chat->id == $admin){
    file_put_contents("user.txt","yas");
    bot('EditMessageText',[
    'chat_id'=>$update->callback_query->message->chat->id,
    'message_id'=>$update->callback_query->message->message_id,
    'text'=>" Xabar matnini kiriting:
   ",
    'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>'Bekor qilish🚫','callback_data'=>'off']]
        ]
    ])
    ]);
}
if($text and $modxe == "yas" and $cid == $admin ){
    for ($i=0; $i < count($u); $i++) {
        bot('sendMessage',[
          'chat_id'=>$u[$i],
          'text'=>"$text",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,

]);
    file_put_contents("user.txt","no");

}
}
}





?>
